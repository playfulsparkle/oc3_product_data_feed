<?php
class ControllerExtensionFeedPSGoogleBase extends Controller
{
    /**
     * @var string The support email address.
     */
    const EXTENSION_EMAIL = 'support@playfulsparkle.com';

    /**
     * @var string The documentation URL for the extension.
     */
    const EXTENSION_DOC = 'https://github.com/playfulsparkle/oc3_google_base.git';

    private $error = array();

    /**
     * Displays the Google Base feed settings page.
     *
     * This method initializes the settings page for the Google Base feed extension.
     * It loads the necessary language files, sets the page title, prepares breadcrumb
     * navigation, and collects configuration data. It also retrieves available languages
     * and tax rates, and passes all relevant data to the view for rendering.
     *
     * The method performs the following steps:
     * - Loads language definitions for the Google Base feed.
     * - Sets the document title based on the language strings.
     * - Constructs breadcrumb links for navigation.
     * - Prepares the action URL for saving settings and a back link.
     * - Loads available languages and generates data feed URLs for each language.
     * - Collects configuration options related to the Google Base feed.
     * - Loads tax rates and prepares them for display.
     * - Renders the settings view with all the collected data.
     *
     * @return void
     */
    public function index()
    {
        $this->load->language('extension/feed/ps_google_base');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('feed_ps_google_base', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', true));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
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
            'href' => $this->url->link('extension/feed/ps_google_base', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/feed/ps_google_base', 'user_token=' . $this->session->data['user_token'], true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=feed', true);

        $data['user_token'] = $this->session->data['user_token'];

        $data['data_feed'] = HTTP_CATALOG . 'index.php?route=extension/feed/ps_google_base';

        if (isset($this->request->post['feed_ps_google_base_status'])) {
            $data['feed_ps_google_base_status'] = $this->request->post['feed_ps_google_base_status'];
        } else {
            $data['feed_ps_google_base_status'] = $this->config->get('feed_ps_google_base_status');
        }

        if (isset($this->request->post['feed_ps_google_base_skip_out_of_stock'])) {
            $data['feed_ps_google_base_skip_out_of_stock'] = $this->request->post['feed_ps_google_base_skip_out_of_stock'];
        } else {
            $data['feed_ps_google_base_skip_out_of_stock'] = $this->config->get('feed_ps_google_base_skip_out_of_stock');
        }

        if (isset($this->request->post['feed_ps_google_base_tax'])) {
            $data['feed_ps_google_base_tax'] = $this->request->post['feed_ps_google_base_tax'];
        } else {
            $data['feed_ps_google_base_tax'] = $this->config->get('feed_ps_google_base_tax');
        }

        if (isset($this->request->post['feed_ps_google_base_taxes'])) {
            $data['feed_ps_google_base_taxes'] = (array) $this->request->post['feed_ps_google_base_taxes'];
        } else {
            $data['feed_ps_google_base_taxes'] = (array) $this->config->get('feed_ps_google_base_taxes');
        }

        if (isset($this->request->post['feed_ps_google_base_login'])) {
            $data['feed_ps_google_base_login'] = $this->request->post['feed_ps_google_base_login'];
        } else {
            $data['feed_ps_google_base_login'] = $this->config->get('feed_ps_google_base_login');
        }

        if (isset($this->request->post['feed_ps_google_base_password'])) {
            $data['feed_ps_google_base_password'] = $this->request->post['feed_ps_google_base_password'];
        } else {
            $data['feed_ps_google_base_password'] = $this->config->get('feed_ps_google_base_password');
        }

        $this->load->model('localisation/language');

        $languages = $this->model_localisation_language->getLanguages();

        $data['languages'] = $languages;

        $data['data_feed_urls'] = [];

        foreach ($languages as $language) {
            $data['data_feed_urls'][$language['language_id']] = HTTP_CATALOG . 'index.php?route=extension/feed/ps_google_base&language=' . $language['code'];
        }

        $this->load->model('localisation/tax_rate');

        $tax_rates = $this->model_localisation_tax_rate->getTaxRates();

        foreach ($tax_rates as $tax_rate) {
            $data['tax_rates'][] = [
                'tax_rate_id' => $tax_rate['tax_rate_id'],
                'name' => $tax_rate['name'],
            ];
        }

        $data['text_contact'] = sprintf($this->language->get('text_contact'), self::EXTENSION_EMAIL, self::EXTENSION_EMAIL, self::EXTENSION_DOC);

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/feed/ps_google_base', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/feed/ps_google_base')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        return !$this->error;
    }

    /**
     * Install the Google Base feed extension.
     *
     * This method is called to perform any setup required when the Google Base
     * feed extension is installed. It loads the appropriate model and calls
     * the model's install method to handle the installation logic, which may
     * include database schema updates or initial setup tasks.
     *
     * @return void
     */
    public function install()
    {
        $this->load->model('extension/feed/ps_google_base');

        $this->model_extension_feed_ps_google_base->install();
    }

    /**
     * Uninstall the Google Base feed extension.
     *
     * This method is called to perform any cleanup required when the Google Base
     * feed extension is uninstalled. It loads the appropriate model and calls
     * the model's uninstall method to handle the uninstallation logic, which may
     * include removing database entries or reverting changes made during installation.
     *
     * @return void
     */
    public function uninstall()
    {
        $this->load->model('extension/feed/ps_google_base');

        $this->model_extension_feed_ps_google_base->uninstall();
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
     * 1. Checks if the user has permission to modify the Google Base feed settings.
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
    public function import()
    {
        $this->load->language('extension/feed/ps_google_base');

        $json = array();

        // Check user has permission
        if (!$this->user->hasPermission('modify', 'extension/feed/ps_google_base')) {
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

            $this->load->model('extension/feed/ps_google_base');

            // Get the contents of the uploaded file
            $content = file_get_contents($this->request->files['file']['tmp_name']);

            $this->model_extension_feed_ps_google_base->import($content);

            unlink($this->request->files['file']['tmp_name']);
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Retrieves and displays Google Base categories for the feed.
     *
     * This method handles the retrieval and display of Google Base categories
     * within the extension. It supports pagination and prepares data to be rendered
     * in the corresponding view. The method performs the following actions:
     *
     * 1. Loads the required language file for localization.
     * 2. Retrieves the current page number from the request; defaults to page 1 if not set.
     * 3. Sets a limit for the number of categories displayed per page.
     * 4. Loads the model responsible for Google Base feed operations.
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
        $this->load->language('extension/feed/ps_google_base');

        if (isset($this->request->get['page'])) {
            $page = (int) $this->request->get['page'];
        } else {
            $page = 1;
        }

        $limit = 10;

        $filter_data = array(
            'start' => ($page - 1) * $limit,
            'limit' => $limit
        );

        $this->load->model('extension/feed/ps_google_base');

        $results = $this->model_extension_feed_ps_google_base->getCategories($filter_data);

        $data['google_base_categories'] = array();

        foreach ($results as $result) {
            $data['google_base_categories'][] = array(
                'google_base_category_id' => $result['google_base_category_id'],
                'google_base_category' => $result['google_base_category'],
                'category_id' => $result['category_id'],
                'category' => $result['category']
            );
        }

        $category_total = $this->model_extension_feed_ps_google_base->getTotalCategories();

        $pagination = new Pagination();
        $pagination->total = $category_total;
        $pagination->page = $page;
        $pagination->limit = $limit;
        $pagination->url = $this->url->link('extension/feed/ps_google_base/category', 'user_token=' . $this->session->data['user_token'] . '&page={page}', true);

        $data['pagination'] = $pagination->render();

        $data['results'] = sprintf($this->language->get('text_pagination'), ($category_total) ? (($page - 1) * $limit) + 1 : 0, ((($page - 1) * $limit) > ($category_total - $limit)) ? $category_total : ((($page - 1) * $limit) + $limit), $category_total, ceil($category_total / $limit));

        $this->response->setOutput($this->load->view('extension/feed/ps_google_base_category', $data));
    }

    /**
     * Adds a Google Base category to the feed.
     *
     * This method handles the addition of a Google Base category based on
     * the provided POST data. It checks if the user has permission to modify
     * the feed and if the required category IDs are present. If successful,
     * it invokes the model to add the category and returns a success message.
     *
     * @return void
     */
    public function addCategory()
    {
        $this->load->language('extension/feed/ps_google_base');

        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/feed/ps_google_base')) {
            $json['error'] = $this->language->get('error_permission');
        } elseif (!empty($this->request->post['google_base_category_id']) && !empty($this->request->post['category_id'])) {
            $this->load->model('extension/feed/ps_google_base');

            $this->model_extension_feed_ps_google_base->addCategory($this->request->post);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Removes a Google Base category from the feed.
     *
     * This method handles the removal of a specified Google Base category
     * from the feed. It checks if the user has the necessary permissions
     * to modify the feed. If the user has permission, the specified category
     * is deleted through the model and a success message is returned.
     *
     * @return void
     */
    public function removeCategory()
    {
        $this->load->language('extension/feed/ps_google_base');

        $json = array();

        if (!$this->user->hasPermission('modify', 'extension/feed/ps_google_base')) {
            $json['error'] = $this->language->get('error_permission');
        } else {
            $this->load->model('extension/feed/ps_google_base');

            $this->model_extension_feed_ps_google_base->deleteCategory($this->request->post['category_id']);

            $json['success'] = $this->language->get('text_success');
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

    /**
     * Autocompletes Google Base category names based on user input.
     *
     * This method provides autocomplete suggestions for Google Base categories
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
            $this->load->model('extension/feed/ps_google_base');

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

            $results = $this->model_extension_feed_ps_google_base->getGoogleBaseCategories($filter_data);

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
        $json = [];

        if (isset($this->request->get['filter_name'])) {
            $filter_name = trim($this->request->get['filter_name']);
        } else {
            $filter_name = '';
        }

        if (utf8_strlen($filter_name) > 0) {
            $this->load->model('extension/feed/ps_google_base');

            $filter_data = [
                'filter_name' => $filter_name,
                'start' => 0,
                'limit' => 5,
            ];

            $results = $this->model_extension_feed_ps_google_base->getCountries($filter_data);

            foreach ($results as $key => $value) {
                $json[] = [
                    'name' => $value['name'],
                    'iso_code_2' => $value['iso_code_2'],
                ];
            }
        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }

}
