<?php
class ControllerExtensionFeedPSProductDataFeed extends Controller
{
    /**
     * @var string The support email address.
     */
    const EXTENSION_EMAIL = 'support@playfulsparkle.com';

    /**
     * @var string The documentation URL for the extension.
     */
    const EXTENSION_DOC = 'https://github.com/playfulsparkle/oc3_product_data_feed.git';

    private $error = array();

    /**
     * Displays the Google Product Data Feed feed settings page.
     *
     * This method initializes the settings page for the Google Product Data Feed feed extension.
     * It loads the necessary language files, sets the page title, prepares breadcrumb
     * navigation, and collects configuration data. It also retrieves available languages
     * and tax rates, and passes all relevant data to the view for rendering.
     *
     * The method performs the following steps:
     * - Loads language definitions for the Google Product Data Feed feed.
     * - Sets the document title based on the language strings.
     * - Constructs breadcrumb links for navigation.
     * - Prepares the action URL for saving settings and a back link.
     * - Loads available languages and generates data feed URLs for each language.
     * - Collects configuration options related to the Google Product Data Feed feed.
     * - Loads tax rates and prepares them for display.
     * - Renders the settings view with all the collected data.
     *
     * @return void
     */
    public function index()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            if (!(bool) $this->request->post['feed_ps_product_data_feed_tax']) {
                $this->request->post['feed_ps_product_data_feed_taxes'] = [];
            }

            $this->model_setting_setting->editSetting('feed_ps_product_data_feed', $this->request->post, $this->request->get['store_id']);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', true));
        }

        if (isset($this->session->data['error'])) {
            $data['error_warning'] = $this->session->data['error'];

            unset($this->session->data['error']);
        } else if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['input_tax_country'])) {
            $data['error_input_tax_country'] = $this->error['input_tax_country'];
        } else {
            $data['error_input_tax_country'] = array();
        }

        if (isset($this->error['input_tax_region'])) {
            $data['error_input_tax_region'] = $this->error['input_tax_region'];
        } else {
            $data['error_input_tax_region'] = array();
        }

        if (isset($this->error['input_tax_rate_id'])) {
            $data['error_input_tax_rate_id'] = $this->error['input_tax_rate_id'];
        } else {
            $data['error_input_tax_rate_id'] = array();
        }

        if (isset($this->request->get['store_id'])) {
            $store_id = (int) $this->request->get['store_id'];
        } else {
            $store_id = 0;
        }


        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/feed/ps_product_data_feed', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $store_id, true)
        );

        $data['action'] = $this->url->link('extension/feed/ps_product_data_feed', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $store_id, true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', true);

        $data['user_token'] = $this->session->data['user_token'];

        if (isset($this->request->post['feed_ps_product_data_feed_status'])) {
            $data['feed_ps_product_data_feed_status'] = (bool) $this->request->post['feed_ps_product_data_feed_status'];
        } else {
            $data['feed_ps_product_data_feed_status'] = (bool) $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_status', $store_id);
        }

        if (isset($this->request->post['feed_ps_product_data_feed_additional_images'])) {
            $data['feed_ps_product_data_feed_additional_images'] = (bool) $this->request->post['feed_ps_product_data_feed_additional_images'];
        } else {
            $data['feed_ps_product_data_feed_additional_images'] = (bool) $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_additional_images', $store_id);
        }

        if (isset($this->request->post['feed_ps_product_data_feed_skip_out_of_stock'])) {
            $data['feed_ps_product_data_feed_skip_out_of_stock'] = (bool) $this->request->post['feed_ps_product_data_feed_skip_out_of_stock'];
        } else {
            $data['feed_ps_product_data_feed_skip_out_of_stock'] = (bool) $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_skip_out_of_stock', $store_id);
        }

        if (isset($this->request->post['feed_ps_product_data_feed_login'])) {
            $data['feed_ps_product_data_feed_login'] = (string) $this->request->post['feed_ps_product_data_feed_login'];
        } else {
            $data['feed_ps_product_data_feed_login'] = (string) $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_login', $store_id);
        }

        if (isset($this->request->post['feed_ps_product_data_feed_password'])) {
            $data['feed_ps_product_data_feed_password'] = (string) $this->request->post['feed_ps_product_data_feed_password'];
        } else {
            $data['feed_ps_product_data_feed_password'] = (string) $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_password', $store_id);
        }

        if (isset($this->request->post['feed_ps_product_data_feed_tax'])) {
            $data['feed_ps_product_data_feed_tax'] = (bool) $this->request->post['feed_ps_product_data_feed_tax'];
        } else {
            $data['feed_ps_product_data_feed_tax'] = (bool) $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_tax', $store_id);
        }

        if (isset($this->request->post['feed_ps_product_data_feed_taxes'])) {
            $data['feed_ps_product_data_feed_taxes'] = (array) $this->request->post['feed_ps_product_data_feed_taxes'];
        } else {
            $base_taxes = $this->model_setting_setting->getSettingValue('feed_ps_product_data_feed_taxes', $store_id);

            /**
             * @var array $base_taxes
             */
            $base_taxes = json_decode((string) $base_taxes, true);

            $data['feed_ps_product_data_feed_taxes'] = json_last_error() === JSON_ERROR_NONE ? $base_taxes : array();
        }

        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        $data['languages'] = $languages;

        $data['store_id'] = $store_id;

        $data['stores'] = array();

        $data['stores'][] = array(
            'store_id' => 0,
            'name' => $this->config->get('config_name') . '&nbsp;' . $this->language->get('text_default'),
            'href' => $this->url->link('extension/feed/ps_product_data_feed', 'user_token=' . $this->session->data['user_token'] . '&store_id=0'),
        );

        $this->load->model('setting/store');

        $stores = $this->model_setting_store->getStores();

        $store_url = HTTP_CATALOG;

        foreach ($stores as $store) {
            $data['stores'][] = array(
                'store_id' => $store['store_id'],
                'name' => $store['name'],
                'href' => $this->url->link('extension/feed/ps_product_data_feed', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $store['store_id']),
            );

            if ((int) $store['store_id'] === $store_id) {
                $store_url = $store['url'];
            }
        }

        $data['data_feed_urls'] = array();

        foreach ($languages as $language) {
            $data['data_feed_urls'][$language['language_id']] = rtrim($store_url, '/') . '/index.php?route=extension/feed/ps_product_data_feed&language=' . $language['code'];
        }

        $this->load->model('localisation/tax_rate');

        $tax_rates = $this->model_localisation_tax_rate->getTaxRates();

        foreach ($tax_rates as $tax_rate) {
            $data['tax_rates'][] = array(
                'tax_rate_id' => $tax_rate['tax_rate_id'],
                'name' => $tax_rate['name'],
            );
        }

        $data['backup_gbc2c'] = $this->url->link('extension/feed/ps_product_data_feed/backup_gbc2c', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $store_id, true);

        $data['text_contact'] = sprintf($this->language->get('text_contact'), self::EXTENSION_EMAIL, self::EXTENSION_EMAIL, self::EXTENSION_DOC);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/feed/ps_product_data_feed', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/feed/ps_product_data_feed')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error && (!isset($this->request->post['store_id']) || !isset($this->request->get['store_id']))) {
            $this->error['warning'] = $this->language->get('error_store_id');
        }

        if (!$this->error) {
            foreach ($this->request->post['feed_ps_product_data_feed_taxes'] as $row_id => $data) {
                if (utf8_strlen(trim($data['country'])) === 0 || utf8_strlen(trim($data['country_id'])) === 0) {
                    $this->error['input_tax_country'][$row_id] = $this->language->get('error_tax_country');
                }

                if (utf8_strlen(trim($data['region'])) === 0) {
                    $this->error['input_tax_region'][$row_id] = $this->language->get('error_tax_region');
                }

                if (utf8_strlen(trim($data['tax_rate_id'])) === 0) {
                    $this->error['input_tax_rate_id'][$row_id] = $this->language->get('error_tax_rate_id');
                }
            }
        }


        return !$this->error;
    }

    /**
     * Install the Google Product Data Feed feed extension.
     *
     * This method is called to perform any setup required when the Google Product Data Feed
     * feed extension is installed. It loads the appropriate model and calls
     * the model's install method to handle the installation logic, which may
     * include database schema updates or initial setup tasks.
     *
     * @return void
     */
    public function install()
    {
        $this->load->model('extension/feed/ps_product_data_feed');

        $this->model_extension_feed_ps_product_data_feed->install();
    }

    /**
     * Uninstall the Google Product Data Feed feed extension.
     *
     * This method is called to perform any cleanup required when the Google Product Data Feed
     * feed extension is uninstalled. It loads the appropriate model and calls
     * the model's uninstall method to handle the uninstallation logic, which may
     * include removing database entries or reverting changes made during installation.
     *
     * @return void
     */
    public function uninstall()
    {
        $this->load->model('extension/feed/ps_product_data_feed');

        $this->model_extension_feed_ps_product_data_feed->uninstall();
    }

    public function backup_gbc2c()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        if (!$this->user->hasPermission('modify', 'extension/feed/ps_product_data_feed')) {
            $this->session->data['error'] = $this->language->get('error_permission');

            $this->response->redirect($this->url->link('extension/feed/ps_product_data_feed', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id'], true));
        }

        if (isset($this->request->get['store_id'])) {
            $store_id = (int) $this->request->get['store_id'];
        } else {
            $store_id = 0;
        }

        $this->load->model('extension/feed/ps_product_data_feed');

        $data = $this->model_extension_feed_ps_product_data_feed->backup_gbc2c($store_id);

        if (!$data) {
            $this->session->data['error'] = $this->language->get('error_no_data_to_backup');

            $this->response->redirect($this->url->link('extension/feed/ps_product_data_feed', 'user_token=' . $this->session->data['user_token'] . '&store_id=' . $this->request->get['store_id'], true));
        }

        $results = '';

        foreach ($data as $row) {
            $results .= $row['google_base_category_id'] . ',' . $row['category_id'] . ',' . $row['store_id'] . PHP_EOL;
        }

        $this->response->addheader('Pragma: public');
        $this->response->addheader('Expires: 0');
        $this->response->addheader('Content-Description: File Transfer');
        $this->response->addheader('Content-Type: application/octet-stream');
        $this->response->addheader('Content-Disposition: attachment; filename="gbc2c_backup_store_' . $store_id . '.txt"');
        $this->response->addheader('Content-Transfer-Encoding: binary');

        $this->response->setOutput($results);
    }

    public function restore_gbc2c()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        $json = array();

        // Check user has permission
        if (!$this->user->hasPermission('modify', 'extension/feed/ps_product_data_feed')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
                // Sanitize the filename
                $filename = basename(html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8'));

                // Allowed file extension types
                if (utf8_strtolower(utf8_substr(strrchr($filename, '.'), 1)) != 'txt') {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Allowed file mime types
                if ($this->request->files['file']['type'] != 'text/plain') {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Return any upload error
                if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
                    $json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
                }
            } else {
                $json['error'] = $this->language->get('error_upload');
            }
        }

        if (!$json) {
            $json['success'] = $this->language->get('text_success');

            $this->load->model('extension/feed/ps_product_data_feed');

            // Get the contents of the uploaded file
            $content = file_get_contents($this->request->files['file']['tmp_name']);

            if (isset($this->request->get['store_id'])) {
                $store_id = (int) $this->request->get['store_id'];
            } else {
                $store_id = 0;
            }

            $this->model_extension_feed_ps_product_data_feed->restore_gbc2c($content, $store_id);

            unlink($this->request->files['file']['tmp_name']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Import Google categories from a text file into the database.
     *
     * This method handles the importation of Google categories for use in
     * autocomplete functionality within the extension. It checks user permissions,
     * validates the uploaded file, and processes the contents of the file to
     * import categories into the database.
     *
     * The method performs the following steps:
     * 1. Checks if the user has permission to modify the Google Product Data Feed feed settings.
     * 2. Validates the uploaded file for the correct format (must be a .txt file).
     * 3. Handles any upload errors and prepares error messages.
     * 4. Reads the content of the uploaded file and invokes the import method
     *    from the model to store the categories in the database.
     * 5. Cleans up by deleting the temporary uploaded file.
     *
     * If the import is successful, a success message is returned in JSON format.
     * Otherwise, appropriate error messages are included in the response.
     *
     * @return void
     */
    public function import_gbc()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        $json = array();

        // Check user has permission
        if (!$this->user->hasPermission('modify', 'extension/feed/ps_product_data_feed')) {
            $json['error'] = $this->language->get('error_permission');
        }

        if (!$json) {
            if (!empty($this->request->files['file']['name']) && is_file($this->request->files['file']['tmp_name'])) {
                // Sanitize the filename
                $filename = basename(html_entity_decode($this->request->files['file']['name'], ENT_QUOTES, 'UTF-8'));

                // Allowed file extension types
                if (utf8_strtolower(utf8_substr(strrchr($filename, '.'), 1)) != 'txt') {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Allowed file mime types
                if ($this->request->files['file']['type'] != 'text/plain') {
                    $json['error'] = $this->language->get('error_filetype');
                }

                // Return any upload error
                if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
                    $json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
                }
            } else {
                $json['error'] = $this->language->get('error_upload');
            }
        }

        if (!$json) {
            $json['success'] = $this->language->get('text_success');

            $this->load->model('extension/feed/ps_product_data_feed');

            // Get the contents of the uploaded file
            $content = file_get_contents($this->request->files['file']['tmp_name']);

            $this->model_extension_feed_ps_product_data_feed->import_gbc($content);

            unlink($this->request->files['file']['tmp_name']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Retrieves and displays Google Product Data Feed categories for the feed.
     *
     * This method handles the retrieval and display of Google Product Data Feed categories
     * within the extension. It supports pagination and prepares data to be rendered
     * in the corresponding view. The method performs the following actions:
     *
     * 1. Loads the required language file for localization.
     * 2. Retrieves the current page number from the request; defaults to page 1 if not set.
     * 3. Sets a limit for the number of categories displayed per page.
     * 4. Loads the model responsible for Google Product Data Feed feed operations.
     * 5. Fetches the categories from the model based on the current page and limit.
     * 6. Populates an array with the retrieved categories for output.
     * 7. Calculates the total number of categories and prepares pagination data.
     * 8. Constructs the results string to indicate the current pagination state.
     * 9. Renders the view with the prepared data for displaying the categories.
     *
     * @return void
     */
    public function category()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        if (isset($this->request->get['store_id'])) {
            $store_id = (int) $this->request->get['store_id'];
        } else {
            $store_id = 0;
        }

        if (isset($this->request->get['page'])) {
            $page = (int) $this->request->get['page'];
        } else {
            $page = 1;
        }

        $limit = 10;

        $filter_data = array(
            'store_id' => $store_id,
            'start' => ($page - 1) * $limit,
            'limit' => $limit
        );

        $this->load->model('extension/feed/ps_product_data_feed');

        $results = $this->model_extension_feed_ps_product_data_feed->getCategories($filter_data);

        $data['google_base_categories'] = array();

        foreach ($results as $result) {
            $data['google_base_categories'][] = array(
                'google_base_category_id' => $result['google_base_category_id'],
                'google_base_category' => $result['google_base_category'],
                'category_id' => $result['category_id'],
                'category' => $result['category']
            );
        }

        $category_total = $this->model_extension_feed_ps_product_data_feed->getTotalCategories();

        $pagination = new Pagination();
        $pagination->total = $category_total;
        $pagination->page = $page;
        $pagination->limit = $limit;
        $pagination->url = $this->url->link('extension/feed/ps_product_data_feed/category', 'store_id= ' . $store_id . '&user_token=' . $this->session->data['user_token'] . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($category_total - $limit)) ? $category_total : ((($page - 1) * $limit) + $limit), $category_total, ceil($category_total / $limit));

        $this->response->setOutput($this->load->view('extension/feed/ps_product_data_feed_category', $data));
    }

    /**
     * Adds a Google Product Data Feed category to the feed.
     *
     * This method handles the addition of a Google Product Data Feed category based on
     * the provided POST data. It checks if the user has permission to modify
     * the feed and if the required category IDs are present. If successful,
     * it invokes the model to add the category and returns a success message.
     *
     * @return void
     */
    public function addCategory()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/feed/ps_product_data_feed')) {
            $json['error'] = $this->language->get('error_permission');
        } elseif (!empty($this->request->post['google_base_category_id']) && !empty($this->request->post['category_id'])) {
            $this->load->model('extension/feed/ps_product_data_feed');

            $this->model_extension_feed_ps_product_data_feed->addCategory($this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Removes a Google Product Data Feed category from the feed.
     *
     * This method handles the removal of a specified Google Product Data Feed category
     * from the feed. It checks if the user has the necessary permissions
     * to modify the feed. If the user has permission, the specified category
     * is deleted through the model and a success message is returned.
     *
     * @return void
     */
    public function removeCategory()
    {
        $this->load->language('extension/feed/ps_product_data_feed');

        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/feed/ps_product_data_feed')) {
            $json['error'] = $this->language->get('error_permission');
        } else {
            $this->load->model('extension/feed/ps_product_data_feed');

            $this->model_extension_feed_ps_product_data_feed->deleteCategory($this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Autocompletes Google Product Data Feed category names based on user input.
     *
     * This method provides autocomplete suggestions for Google Product Data Feed categories
     * based on the input from the user. It retrieves category data from the
     * model, filtering based on the provided name, and returns a JSON response
     * with the matching categories.
     *
     * @return void
     */
    public function autocomplete()
    {
        $json = array();

        if (isset($this->request->get['filter_name'])) {
            $this->load->model('extension/feed/ps_product_data_feed');

            if (isset($this->request->get['filter_name'])) {
                $filter_name = $this->request->get['filter_name'];
            } else {
                $filter_name = '';
            }

            $filter_data = array(
                'filter_name' => html_entity_decode($filter_name, ENT_QUOTES, 'UTF-8'),
                'start' => 0,
                'limit' => 5
            );

            $results = $this->model_extension_feed_ps_product_data_feed->getGoogleBaseCategories($filter_data);

            foreach ($results as $result) {
                $json[] = array(
                    'google_base_category_id' => $result['google_base_category_id'],
                    'name' => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Autocomplete country names based on the user's input.
     *
     * This method retrieves a list of countries that match the provided filter name
     * from the request. It returns a JSON-encoded array of country names and their
     * ISO codes. The method performs the following steps:
     *
     * - Checks if the 'filter_name' parameter is set in the request and trims it.
     * - If the trimmed filter name is not empty, it loads the country model and
     *   retrieves a list of countries that match the filter name.
     * - For each country returned, it constructs an array with the country's name
     *   and ISO code.
     * - Finally, it sets the response header to indicate JSON content and outputs
     *   the JSON-encoded array.
     *
     * @return void
     */
    public function countryautocomplete()
    {
        $json = array();

        if (isset($this->request->get['filter_name'])) {
            $filter_name = trim($this->request->get['filter_name']);
        } else {
            $filter_name = '';
        }

        if (utf8_strlen($filter_name) > 0) {
            $this->load->model('extension/feed/ps_product_data_feed');

            $filter_data = array(
                'filter_name' => $filter_name,
                'start' => 0,
                'limit' => 5,
            );

            $results = $this->model_extension_feed_ps_product_data_feed->getCountries($filter_data);

            foreach ($results as $key => $value) {
                $json[] = array(
                    'name' => $value['name'],
                    'iso_code_2' => $value['iso_code_2'],
                );
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

}
