<?php
// Heading
$_['heading_title']                = 'Playful Sparkle - Google Product Data Feed';
$_['heading_categories']           = 'Category Associations';
$_['heading_authentication']       = 'Authentication';
$_['heading_tax_deffinitions']     = 'Tax definitions';
$_['heading_getting_started']      = 'Getting Started';
$_['heading_setup']                = 'Setting Up Google Product Data Feed';
$_['heading_troubleshot']          = 'Common Troubleshooting';
$_['heading_faq']                  = 'FAQ';
$_['heading_contact']              = 'Contact Support';

// Text
$_['text_extension']               = 'Extensions';
$_['text_success']                 = 'Success: You have modified Google Product Data Feed feed!';
$_['text_import_success']          = 'Success: You have successfully imported Google category list!';
$_['text_add_category_success']    = 'Success: You have successfully added category association!';
$_['text_remove_category_success'] = 'Success: You have successfully removed category association!';
$_['text_edit']                    = 'Edit Google Product Data Feed';
$_['text_import']                  = 'To download the latest list of Google categories, <a href="https://support.google.com/merchants/answer/160081?hl=en" target="_blank" rel="external noopener noreferrer" class="alert-link">click here</a> and select the taxonomy with numeric IDs in a Plain Text (.txt) file. Then, upload the downloaded file using the green button.';
$_['text_getting_started']         = '<p><strong>Overview:</strong> The Google Product Data Feed  for OpenCart 3.x allows users to effortlessly export their products to <a href="https://merchants.google.com" target="_blank" rel="external noopener noreferrer">Google Merchant Center</a> in XML format. This essential tool enhances product visibility on Google Shopping, facilitating easier discovery and purchase by potential customers.</p><p><strong>Requirements:</strong> To utilize this extension, ensure you have OpenCart 3.x+, PHP 7.3 installed and configured. Additionally, an active Google Merchant Center account is required to manage your product listings effectively.</p>';
$_['text_setup']                   = '<ul><li>Download the latest list of Google categories from <a href="https://support.google.com/merchants/answer/160081?hl=en" target="_blank" rel="external noopener noreferrer">Google Merchant Center Support</a>.</li><li>Associate your webshop categories with the appropriate Google categories.</li><li>Configure the extension to skip out-of-stock products if desired.</li><li>Use pre-tax prices in the feed by enabling the respective option and customize tax definitions accordingly.</li></ul>';
$_['text_troubleshot']             = '<ul><li><strong>Google categories not displaying:</strong> Ensure you have downloaded the latest list of Google categories and imported them into your system. This is essential for proper mapping between your webshop and Google Merchant Center.</li><li><strong>No product feed output:</strong> Confirm that the Google Product Data Feed extension is enabled in your OpenCart admin panel. If it is enabled and you still don\'t see any output, check the extension settings for any misconfigurations.</li><li><strong>Products not appearing in Google Merchant Center:</strong> Verify that your products are correctly categorized and that there are no errors in your product data. Ensure that you comply with Google Merchant Center policies regarding product listings.</li></ul>';
$_['text_faq']                     = '<details><summary>What is the Google Product Data Feed extension?</summary><p>The Google Product Data Feed extension helps OpenCart 3.x users export their product data to Google Merchant Center, enhancing visibility on Google Shopping.</p></details><details><summary>How do I enable the Google Product Data Feed extension?</summary><p>You can enable the extension from the OpenCart admin panel under the Extensions section. Make sure to configure the settings as needed.</p></details><details><summary>Can I customize my product feed?</summary><p>Yes, the extension allows you to customize various settings, including the use of pre-tax prices and tax definitions, ensuring your feed meets your needs.</p></details><details><summary>Why isn’t my product feed showing in Google Merchant Center?</summary><p>Ensure that the Google Product Data Feed extension is enabled and that your product categories are correctly associated with Google categories. Additionally, check for any errors in your feed configuration.</p></details>';
$_['text_contact']                 = '<p>For further assistance, please reach out to our support team:</p><ul><li><strong>Contact:</strong> <a href="mailto:%s">%s</a></li><li><strong>Documentation:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">User Documentation</a></li></ul>';
$_['text_gbc2c_restore']           = 'Before importing Google Product Data Feed category to store category associations, please ensure that you have selected the correct store for importing. The backup file you upload (gbc2c_backup_store_x.txt) must end with the store ID (x) of the store you are restoring into.';

// Column
$_['column_google_category']       = 'Google Category';
$_['column_category']              = 'Category';
$_['column_action']                = 'Action';

// Tab
$_['tab_general']                  = 'General';
$_['tab_help_and_support']         = 'Help &amp; Support';

// Entry
$_['entry_google_category']        = 'Google Category';
$_['entry_category']               = 'Category';
$_['entry_data_feed_url']          = 'Data Feed Url';
$_['entry_status']                 = 'Status';
$_['entry_login']                  = 'Username';
$_['entry_password']               = 'Password';
$_['entry_skip_out_of_stock']      = 'Skip Out of Stock';
$_['entry_tax']                    = 'Use pre-tax prices';
$_['entry_country']                = 'Country';
$_['entry_region']                 = 'Region';
$_['entry_tax_rate']               = 'Tax Rate';
$_['entry_tax_ship']               = 'Shipping tax';
$_['entry_active_store']           = 'Active Store';
$_['entry_additional_images']      = 'Include Additional Images';
$_['entry_backup_restore']         = 'Backup/Restore';

// Button
$_['button_backup']                = 'Backup';
$_['button_restore']               = 'Restore';

// Help
$_['help_copy']                    = 'Copy URL';
$_['help_open']                    = 'Open URL';
$_['help_additional_images']       = 'Toggling this option will add additional images to your Google Product Data Feed feed. Note that enabling this may slow down the feed generation process and increase the size of the generated XML file.';

// Error
$_['error_permission']             = 'Warning: You do not have permission to modify Google Product Data Feed feed!';
$_['error_store_id']               = 'Warning: Form does not contain store_id!';
$_['error_currency']               = 'Warning: Select a currency from the list';
$_['error_upload']                 = 'File could not be uploaded!';
$_['error_filetype']               = 'Invalid file type!';
$_['error_tax_country']            = 'Please select country for the tax.';
$_['error_tax_region']             = 'The tax region field cannot be left empty.';
$_['error_tax_rate_id']            = 'Please select tax rate for the tax';
$_['error_no_data_to_backup']      = 'No category associations data available to backup.';
