<?php
// Heading
$_['heading_title']                = 'Playful Sparkle - Google Base';
$_['heading_categories']           = 'Ассоциации категорий';
$_['heading_authentication']       = 'Аутентификация';
$_['heading_tax_deffinitions']     = 'Определения налогов';
$_['heading_getting_started']      = 'Начало работы';
$_['heading_setup']                = 'Настройка Google Base';
$_['heading_troubleshot']          = 'Общие проблемы';
$_['heading_faq']                  = 'Часто задаваемые вопросы';
$_['heading_contact']              = 'Контактная поддержка';

// Text
$_['text_extension']               = 'Расширения';
$_['text_success']                 = 'Успех: Вы успешно изменили ленту Google Base!';
$_['text_import_success']          = 'Успех: Вы успешно импортировали список категорий Google!';
$_['text_add_category_success']    = 'Успех: Вы успешно добавили ассоциацию категории!';
$_['text_remove_category_success'] = 'Успех: Вы успешно удалили ассоциацию категории!';
$_['text_edit']                    = 'Редактировать Google Base';
$_['text_import']                  = 'Чтобы скачать актуальный список категорий Google, <a href="https://support.google.com/merchants/answer/160081?hl=en" target="_blank" rel="external noopener noreferrer" class="alert-link">нажмите здесь</a> и выберите таксономию с числовыми идентификаторами в формате Plain Text (.txt). Затем загрузите скачанный файл, используя зеленую кнопку.';
$_['text_getting_started']         = '<p><strong>Обзор:</strong> Google Base для OpenCart 3.x позволяет пользователям легко экспортировать свои товары в <a href="https://merchants.google.com" target="_blank" rel="external noopener noreferrer">Google Merchant Center</a> в формате XML. Этот инструмент улучшает видимость товаров на Google Shopping, облегчая их поиск и покупку потенциальными клиентами.</p><p><strong>Требования:</strong> Для использования этого расширения убедитесь, что у вас установлены и настроены OpenCart 3.x+ и PHP 7.3. Также требуется активная учетная запись в Google Merchant Center для эффективного управления вашими товарами.</p>';
$_['text_setup']                   = '<ul><li>Скачайте последний список категорий Google с <a href="https://support.google.com/merchants/answer/160081?hl=en" target="_blank" rel="external noopener noreferrer">Google Merchant Center Support</a>.</li><li>Ассоциируйте категории вашего интернет-магазина с соответствующими категориями Google.</li><li>Настройте расширение для пропуска товаров, которых нет в наличии, если необходимо.</li><li>Используйте цены до налога в ленте, включив соответствующую опцию, и настройте определения налогов в соответствии с этим.</li></ul>';
$_['text_troubleshot']             = '<ul><li><strong>Категории Google не отображаются:</strong> Убедитесь, что вы загрузили последний список категорий Google и импортировали его в вашу систему. Это необходимо для правильного сопоставления между вашим магазином и Google Merchant Center.</li><li><strong>Нет вывода ленты товаров:</strong> Убедитесь, что расширение Google Base включено в панели управления OpenCart. Если оно включено и вы все равно не видите вывода, проверьте настройки расширения на наличие ошибок конфигурации.</li><li><strong>Товары не отображаются в Google Merchant Center:</strong> Убедитесь, что ваши товары правильно классифицированы и что нет ошибок в данных о товарах. Также проверьте, что вы соблюдаете политику Google Merchant Center для размещения товаров.</li></ul>';
$_['text_faq']                     = '<details><summary>Что такое расширение Google Base?</summary><p>Расширение Google Base помогает пользователям OpenCart 3.x экспортировать данные о своих товарах в Google Merchant Center, улучшая видимость на Google Shopping.</p></details><details><summary>Как включить расширение Google Base?</summary><p>Вы можете включить расширение через панель управления OpenCart в разделе "Расширения". Убедитесь, что настроили параметры по мере необходимости.</p></details><details><summary>Могу ли я настроить свою ленту товаров?</summary><p>Да, расширение позволяет настроить различные параметры, включая использование цен до налога и определения налогов, чтобы ваша лента соответствовала вашим требованиям.</p></details><details><summary>Почему моя лента товаров не отображается в Google Merchant Center?</summary><p>Убедитесь, что расширение Google Base включено и что ваши товарные категории правильно ассоциированы с категориями Google. Также проверьте наличие ошибок в конфигурации ленты.</p></details>';
$_['text_contact']                 = '<p>Для получения дополнительной помощи, пожалуйста, свяжитесь с нашей службой поддержки:</p><ul><li><strong>Контакт:</strong> <a href="mailto:%s">%s</a></li><li><strong>Документация:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Документация пользователя</a></li></ul>';
$_['text_gbc2c_restore']           = 'Процесс восстановления является разрушительным и удалит текущие ассоциации категорий для выбранного магазина. Убедитесь, что вы выбрали правильный магазин для импорта, и что загружаемый вами файл резервной копии (gbc2c_backup_store_x.txt) заканчивается на идентификатор магазина (x), в который вы хотите восстановить данные.';

// Column
$_['column_google_category']       = 'Категория Google';
$_['column_category']              = 'Категория';
$_['column_action']                = 'Действие';

// Tab
$_['tab_general']                  = 'Общее';
$_['tab_help_and_support']         = 'Помощь и поддержка';

// Entry
$_['entry_google_category']        = 'Категория Google';
$_['entry_category']               = 'Категория';
$_['entry_data_feed_url']          = 'URL ленты данных';
$_['entry_status']                 = 'Статус';
$_['entry_login']                  = 'Имя пользователя';
$_['entry_password']               = 'Пароль';
$_['entry_skip_out_of_stock']      = 'Пропускать товары, отсутствующие на складе';
$_['entry_tax']                    = 'Использовать цены до налога';
$_['entry_country']                = 'Страна';
$_['entry_region']                 = 'Регион';
$_['entry_tax_rate']               = 'Налоговая ставка';
$_['entry_tax_ship']               = 'Налог на доставку';
$_['entry_active_store']           = 'Активный магазин';
$_['entry_additional_images']      = 'Включить дополнительные изображения';
$_['entry_backup_restore']         = 'Резервировать/Восстановить';

// Button
$_['button_backup']                = 'Резервное копирование';
$_['button_restore']               = 'Восстановить';

// Help
$_['help_copy']                    = 'Копировать URL';
$_['help_open']                    = 'Открыть URL';
$_['help_additional_images']       = 'Включение этой опции добавит дополнительные изображения в ваш фид Google Base. Обратите внимание, что это может замедлить процесс генерации фида и увеличить размер создаваемого XML-файла.';

// Error
$_['error_permission']             = 'Предупреждение: У вас нет прав для изменения ленты Google Base!';
$_['error_store_id']               = 'Предупреждение: В форме отсутствует store_id!';
$_['error_currency']               = 'Предупреждение: Выберите валюту из списка';
$_['error_upload']                 = 'Не удалось загрузить файл!';
$_['error_filetype']               = 'Неверный тип файла!';
$_['error_tax_country']            = 'Пожалуйста, выберите страну для налога.';
$_['error_tax_region']             = 'Поле региона налога не может быть пустым.';
$_['error_tax_rate_id']            = 'Пожалуйста, выберите налоговую ставку для налога';
$_['error_no_data_to_backup']      = 'Нет данных о назначениях категорий для резервного копирования.';
