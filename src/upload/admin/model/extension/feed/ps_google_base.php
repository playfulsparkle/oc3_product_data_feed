<?php
class ModelExtensionFeedPSGoogleBase extends Model
{
    /**
     * Installs the necessary database tables for the Google Base extension.
     *
     * This method creates two tables: `ps_google_base_category` for storing
     * Google Base category information and `ps_google_base_category_to_category`
     * for mapping Google Base categories to internal category IDs. The tables
     * are created with the appropriate structure and indexes.
     *
     * @return void
     */
    public function install()
    {
        $this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "ps_google_base_category` (
				`google_base_category_id` INT(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(255) NOT NULL,
                PRIMARY KEY (`google_base_category_id`),
                KEY `name` (`name`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
		");

        $this->db->query("
			CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "ps_google_base_category_to_category` (
                `google_base_category_id` int(11) NOT NULL,
                `category_id` int(11) NOT NULL,
                `store_id` int(11) NOT NULL,
                PRIMARY KEY (`google_base_category_id`,`category_id`,`store_id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
		");
    }

    /**
     * Uninstalls the Google Base extension by dropping its database tables.
     *
     * This method removes the tables `ps_google_base_category` and
     * `ps_google_base_category_to_category` from the database if they exist.
     *
     * @return void
     */
    public function uninstall()
    {
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "ps_google_base_category`");
        $this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "ps_google_base_category_to_category`");
    }

    public function backup_gbc2c($store_id)
    {
        $query = $this->db->query("SELECT `google_base_category_id`, `category_id`, `store_id` FROM `" . DB_PREFIX . "ps_google_base_category_to_category` WHERE `store_id` = '" . (int) $store_id . "'");

        if ($query->num_rows) {
            return $query->rows;
        }

        return array();
    }

    public function restore_gbc2c($string, $store_id)
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "ps_google_base_category_to_category");

        $lines = explode("\n", $string);

        foreach ($lines as $line) {
            $part = explode(',', $line, 3);

            if (isset($part[2]) && (int) $part[2] === $store_id) {
                $this->db->query("INSERT INTO `" . DB_PREFIX . "ps_google_base_category_to_category` (`google_base_category_id`, `category_id`, `store_id`)
                    SELECT '" . (int) $part[0] . "', '" . (int) $part[1] . "', '" . (int) $store_id . "'
                    WHERE
                        EXISTS (SELECT 1 FROM `" . DB_PREFIX . "ps_google_base_category` WHERE `google_base_category_id` = '" . (int) $part[0] . "') AND
                        EXISTS (SELECT 1 FROM `" . DB_PREFIX . "category` WHERE `category_id` = '" . (int) $part[1] . "')");
            }
        }
    }

    /**
     * Imports Google Base categories from a string input.
     *
     * This method deletes all existing records in the `ps_google_base_category` table
     * and then parses the provided string input to extract Google Base category data.
     * Each line should contain a Google Base category ID and name separated by " - ".
     *
     * @param string $string The input string containing category data.
     * @return void
     */
    public function import_gbc($string)
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "ps_google_base_category");

        $lines = explode("\n", $string);

        foreach ($lines as $line) {
            if (substr($line, 0, 1) != '#') {
                $part = explode(' - ', $line, 2);

                if (isset($part[1])) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "ps_google_base_category SET google_base_category_id = '" . (int) $part[0] . "', name = '" . $this->db->escape($part[1]) . "'");
                }
            }
        }
    }

    /**
     * Retrieves Google Base categories with optional filtering.
     *
     * This method retrieves categories from the `ps_google_base_category` table
     * that match the specified filter name. It supports pagination through the
     * `start` and `limit` parameters in the provided data array.
     *
     * @param array $data Optional filtering parameters.
     * @return array An array of matching Google Base categories.
     */
    public function getGoogleBaseCategories($data = array())
    {
        $sql = "SELECT * FROM `" . DB_PREFIX . "ps_google_base_category` WHERE name LIKE '%" . $this->db->escape($data['filter_name']) . "%' ORDER BY name ASC";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * Adds a mapping between a Google Base category and an internal category.
     *
     * This method removes any existing mapping for the specified category ID and
     * then inserts a new mapping between the provided Google Base category ID and
     * the internal category ID.
     *
     * @param array $data An array containing 'google_base_category_id' and 'category_id'.
     * @return void
     */
    public function addCategory($data)
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "ps_google_base_category_to_category WHERE `category_id` = '" . (int) $data['category_id'] . "' AND `store_id` = '" . (int) $data['store_id'] . "'");

        $this->db->query("INSERT INTO " . DB_PREFIX . "ps_google_base_category_to_category SET `google_base_category_id` = '" . (int) $data['google_base_category_id'] . "', `category_id` = '" . (int) $data['category_id'] . "', `store_id` = '" . (int) $data['store_id'] . "'");
    }

    /**
     * Deletes a mapping for the specified category ID.
     *
     * This method removes any mapping entries from the `ps_google_base_category_to_category`
     * table that are associated with the given category ID.
     *
     * @param int $category_id The ID of the category to be deleted from mappings.
     * @return void
     */
    public function deleteCategory($data)
    {
        $this->db->query("DELETE FROM " . DB_PREFIX . "ps_google_base_category_to_category WHERE `category_id` = '" . (int) $data['category_id'] . "' AND `store_id` = '" . (int) $data['store_id'] . "'");
    }

    /**
     * Retrieves all category mappings with optional pagination.
     *
     * This method retrieves mappings from the `ps_google_base_category_to_category`
     * table and joins it with the `ps_google_base_category` and `category_description`
     * tables to fetch the corresponding category names. It supports pagination through
     * the `start` and `limit` parameters in the provided data array.
     *
     * @param array $data Optional pagination parameters.
     * @return array An array of category mappings.
     */
    public function getCategories($data = array())
    {
        $sql = "SELECT
                gbc2c.`google_base_category_id`,
                gbc.`name` AS google_base_category,
                gbc2c.`category_id`,
                GROUP_CONCAT(cd1.`name` ORDER BY cp.`level` SEPARATOR ' > ') AS category
            FROM `" . DB_PREFIX . "ps_google_base_category_to_category` gbc2c
            LEFT JOIN `" . DB_PREFIX . "ps_google_base_category` gbc ON (gbc.`google_base_category_id` = gbc2c.`google_base_category_id`)
            LEFT JOIN `" . DB_PREFIX . "category_path` cp ON (cp.`category_id` = gbc2c.`category_id`)
            LEFT JOIN `" . DB_PREFIX . "category_description` cd1 ON (cd1.`category_id` = cp.`path_id` AND cd1.`language_id` = '" . (int) $this->config->get('config_language_id') . "')
            WHERE gbc2c.`store_id` = '" . (int) $data['store_id'] . "'
            GROUP BY gbc2c.`google_base_category_id`, gbc2c.`category_id`
            ORDER BY google_base_category ASC";

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        $query = $this->db->query($sql);

        return $query->rows;
    }

    /**
     * Gets the total count of category mappings.
     *
     * This method returns the total number of mappings stored in the
     * `ps_google_base_category_to_category` table.
     *
     * @return int The total number of category mappings.
     */
    public function getTotalCategories()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "ps_google_base_category_to_category`");

        return $query->row['total'];
    }

    public function getCountries(array $data = array()): array
    {
        $sql = "SELECT * FROM `" . DB_PREFIX . "country`";

        $implode = array();

        if (!empty($data['filter_name'])) {
            $implode[] = "`name` LIKE '" . $this->db->escape((string) $data['filter_name'] . '%') . "'";
        }

        if ($implode) {
            $sql .= " WHERE " . implode(" AND ", $implode);
        }

        $sort_data = array(
            'name',
            'iso_code_2',
            'iso_code_3'
        );

        if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
            $sql .= " ORDER BY " . $data['sort'];
        } else {
            $sql .= " ORDER BY `name`";
        }

        if (isset($data['order']) && ($data['order'] == 'DESC')) {
            $sql .= " DESC";
        } else {
            $sql .= " ASC";
        }

        if (isset($data['start']) || isset($data['limit'])) {
            if ($data['start'] < 0) {
                $data['start'] = 0;
            }

            if ($data['limit'] < 1) {
                $data['limit'] = 20;
            }

            $sql .= " LIMIT " . (int) $data['start'] . "," . (int) $data['limit'];
        }

        $country_data = $this->cache->get('country.' . md5($sql));

        if (!$country_data) {
            $query = $this->db->query($sql);

            $country_data = $query->rows;

            $this->cache->set('country.' . md5($sql), $country_data);
        }

        return $country_data;
    }
}
