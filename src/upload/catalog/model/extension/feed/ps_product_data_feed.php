<?php
class ModelExtensionFeedPSGoogleBase extends Model
{
    /**
     * Retrieves all categories associated with Product Data Feed categories.
     *
     * This method queries the database to get a list of categories
     * linked to Product Data Feed categories along with their names in the
     * current language. The results are sorted by the Product Data Feed
     * category name in ascending order.
     *
     * @return array An array of categories with the following keys:
     *               - google_base_category_id: ID of the Product Data Feed category
     *               - google_base_category: Name of the Product Data Feed category
     *               - category_id: ID of the associated category
     *               - category: Name of the associated category
     */
    public function getCategories()
    {
        $query = $this->db->query("SELECT
                gbc2c.`google_base_category_id`,
                (SELECT name FROM `" . DB_PREFIX . "ps_product_data_feed_category` gbc WHERE gbc.`google_base_category_id` = gbc2c.`google_base_category_id`) AS google_base_category,
                gbc2c.`category_id`,
                (SELECT name FROM `" . DB_PREFIX . "category_description` cd WHERE cd.`category_id` = gbc2c.`category_id` AND cd.`language_id` = '" . (int) $this->config->get('config_language_id') . "') AS category
            FROM `" . DB_PREFIX . "ps_product_data_feed_category_to_category` gbc2c
            WHERE gbc2c.`store_id` = '" . (int) $this->config->get('config_store_id') . "'
            ORDER BY `google_base_category` ASC");

        return $query->rows;
    }

    /**
     * Gets the total number of Product Data Feed categories.
     *
     * This method queries the database to count the total number of
     * records in the `ps_product_data_feed_category_to_category` table,
     * which represents the number of Product Data Feed categories.
     *
     * @return int The total number of Product Data Feed categories.
     */
    public function getTotalCategories()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total FROM `" . DB_PREFIX . "ps_product_data_feed_category_to_category` WHERE `store_id` = '" . (int) $this->config->get('config_store_id') . "'");

        return $query->row['total'];
    }

    /**
     * Retrieves the special price dates for a specific product.
     *
     * This method fetches the start and end dates for special pricing
     * associated with the given product ID. It checks if the special
     * price is currently active based on the customer group ID and the
     * validity of the date range.
     *
     * @param int $product_id The ID of the product to fetch special price dates for.
     *
     * @return array An associative array containing:
     *               - date_start: The start date of the special price
     *               - date_end: The end date of the special price
     *               If no active special price is found, an empty array is returned.
     */
    public function getSpecialPriceDatesByProductId(int $product_id): array
    {
        $query = $this->db->query("SELECT `date_start`, `date_end` FROM `" . DB_PREFIX . "product_special` WHERE `product_id` = '" . (int) $product_id . "' AND `customer_group_id` = '" . (int) $this->config->get('config_customer_group_id') . "' AND ((`date_start` = '0000-00-00' OR `date_start` < NOW()) AND (`date_end` = '0000-00-00' OR `date_end` > NOW()))");

        if ($query->num_rows) {
            return [
                'date_start' => $query->row['date_start'],
                'date_end' => $query->row['date_end']
            ];
        }

        return [];
    }

    /**
     * Retrieves the tax rate information for a given tax rate ID.
     *
     * This method queries the database to get details of the specified
     * tax rate, including its name, rate, type, associated geo zone,
     * and dates of addition/modification.
     *
     * @param int $tax_rate_id The ID of the tax rate to retrieve.
     *
     * @return array An associative array containing the tax rate details:
     *               - tax_rate_id: The ID of the tax rate
     *               - name: The name of the tax rate
     *               - rate: The tax rate percentage
     *               - type: The type of tax
     *               - geo_zone_id: The ID of the geo zone
     *               - geo_zone: The name of the geo zone
     *               - date_added: The date the tax rate was added
     *               - date_modified: The date the tax rate was last modified
     */
    public function getTaxRate(int $tax_rate_id): array
    {
        $query = $this->db->query("SELECT tr.`tax_rate_id`, tr.`name` AS name, tr.`rate`, tr.`type`, tr.`geo_zone_id`, gz.`name` AS geo_zone, tr.`date_added`, tr.`date_modified` FROM `" . DB_PREFIX . "tax_rate` tr LEFT JOIN `" . DB_PREFIX . "geo_zone` gz ON (tr.`geo_zone_id` = gz.`geo_zone_id`) WHERE tr.`tax_rate_id` = '" . (int) $tax_rate_id . "'");

        return $query->row;
    }
}
