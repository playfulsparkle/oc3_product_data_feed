<?php
// Heading
$_['heading_title']                = 'Playful Sparkle - Product Data Feed';
$_['heading_categories']           = 'Asociace kategorií';
$_['heading_authentication']       = 'Ověřování';
$_['heading_tax_deffinitions']     = 'Definice daní';
$_['heading_getting_started']      = 'Začínáme';
$_['heading_setup']                = 'Nastavení Product Data Feed';
$_['heading_troubleshot']          = 'Běžné problémy';
$_['heading_faq']                  = 'Často kladené dotazy';
$_['heading_contact']              = 'Kontaktujte podporu';

// Text
$_['text_extension']               = 'Rozšíření';
$_['text_success']                 = 'Úspěch: Úspěšně jste upravili Product Data Feed feed!';
$_['text_import_success']          = 'Úspěch: Úspěšně jste importovali seznam kategorií Google!';
$_['text_add_category_success']    = 'Úspěch: Úspěšně jste přidali asociaci kategorie!';
$_['text_remove_category_success'] = 'Úspěch: Úspěšně jste odstranili asociaci kategorie!';
$_['text_edit']                    = 'Upravit Product Data Feed';
$_['text_import']                  = 'Pro stažení nejnovějšího seznamu kategorií Google <a href="https://support.google.com/merchants/answer/160081?hl=cs" target="_blank" rel="external noopener noreferrer" class="alert-link">klikněte sem</a> a vyberte taxonomii s číselnými identifikátory v textovém (.txt) souboru. Poté soubor nahrajte pomocí zeleného tlačítka.';
$_['text_getting_started']         = '<p><strong>Přehled:</strong> Rozšíření "Product Data Feed" pro OpenCart 3.x umožňuje uživatelům snadno exportovat své produkty do <a href="https://merchants.google.com" target="_blank" rel="external noopener noreferrer">Google Merchant Center</a> ve formátu XML. Tento nezbytný nástroj zvyšuje viditelnost produktů na Google Nákupy, což usnadňuje jejich objevování a nákup potenciálními zákazníky.</p><p><strong>Požadavky:</strong> Pro využití tohoto rozšíření se ujistěte, že máte nainstalovaný a nakonfigurovaný OpenCart 3.x+, PHP 7.3. Dále je vyžadován aktivní účet Google Merchant Center pro efektivní správu vašich produktových seznamů.</p>';
$_['text_setup']                   = '<ul><li>Stáhněte si nejnovější seznam kategorií Google z <a href="https://support.google.com/merchants/answer/160081?hl=cs" target="_blank" rel="external noopener noreferrer">nápovědy Google Merchant Center</a>.</li><li>Přiřaďte kategorie vašeho webového obchodu k odpovídajícím kategoriím Google.</li><li>Pokud si to přejete, nakonfigurujte rozšíření tak, aby vynechalo produkty, které nejsou skladem.</li><li>Používejte ceny bez DPH ve feedu tím, že aktivujete příslušnou volbu, a přizpůsobte definice daně podle potřeby.</li></ul>';
$_['text_troubleshot']             = '<ul><li><strong>Kategorie Google se nezobrazují:</strong> Ujistěte se, že jste stáhli nejnovější seznam kategorií Google a importovali je do vašeho systému. To je nezbytné pro správné mapování mezi vaším webovým obchodem a Google Merchant Center.</li><li><strong>Žádný výstup produktového feedu:</strong> Ověřte, že je rozšíření Product Data Feed povoleno v administračním panelu OpenCart. Pokud je povoleno a stále nevidíte žádný výstup, zkontrolujte nastavení rozšíření na možné chyby konfigurace.</li><li><strong>Produkty se nezobrazují v Google Merchant Center:</strong> Ověřte, že jsou vaše produkty správně kategorizovány a že neexistují chyby v datech vašich produktů. Ujistěte se, že splňujete zásady Google Merchant Center týkající se seznamů produktů.</li></ul>';
$_['text_faq']                     = '<details><summary>Co je rozšíření Product Data Feed?</summary><p>Rozšíření Product Data Feed pomáhá uživatelům OpenCart 3.x exportovat jejich produktová data do Google Merchant Center, čímž zvyšuje viditelnost na Google Nákupy.</p></details><details><summary>Jak aktivuji rozšíření Product Data Feed?</summary><p>Rozšíření můžete aktivovat v administračním panelu OpenCart v sekci Rozšíření. Ujistěte se, že jste nastavili potřebná nastavení.</p></details><details><summary>Mohu si přizpůsobit svůj produktový feed?</summary><p>Ano, rozšíření vám umožňuje přizpůsobit různá nastavení, včetně použití cen bez DPH a definic daně, což zajišťuje, že váš feed splňuje vaše potřeby.</p></details><details><summary>Proč se můj produktový feed nezobrazuje v Google Merchant Center?</summary><p>Ujistěte se, že je rozšíření Product Data Feed povoleno a že jsou vaše produktové kategorie správně přiřazeny k kategoriím Google. Dále zkontrolujte, zda v konfiguraci vašeho feedu nejsou žádné chyby.</p></details>';
$_['text_contact']                 = '<p>Pro další pomoc se prosím obraťte na náš tým podpory:</p><ul><li><strong>Kontakt:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentace:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Dokumentace pro uživatele</a></li></ul>';
$_['text_gbc2c_restore']           = 'Před importem asociací kategorie Product Data Feed do kategorií obchodu se ujistěte, že jste vybrali správný obchod pro import. Záložní soubor, který nahráváte (gbc2c_backup_store_x.txt), musí končit ID obchodu (x), do kterého obnovujete.';

// Column
$_['column_google_category']       = 'Kategorie Google';
$_['column_category']              = 'Kategorie';
$_['column_action']                = 'Akce';

// Tab
$_['tab_general']                  = 'Obecné';
$_['tab_help_and_support']         = 'Pomoc a podpora';

// Entry
$_['entry_google_category']        = 'Kategorie Google';
$_['entry_category']               = 'Kategorie';
$_['entry_data_feed_url']          = 'URL datového feedu';
$_['entry_status']                 = 'Stav';
$_['entry_login']                  = 'Uživatelské jméno';
$_['entry_password']               = 'Heslo';
$_['entry_skip_out_of_stock']      = 'Přeskočit vyprodáno';
$_['entry_tax']                    = 'Používání cen bez daně';
$_['entry_country']                = 'Země';
$_['entry_region']                 = 'Kraj';
$_['entry_tax_rate']               = 'Sazba daně';
$_['entry_tax_ship']               = 'Doprava daně';
$_['entry_active_store']           = 'Aktivní obchod';
$_['entry_additional_images']      = 'Zahrnout další obrázky';
$_['entry_backup_restore']         = 'Zálohovat/Obnovit';

// Button
$_['button_backup']                = 'Zálohovat';
$_['button_restore']               = 'Obnovit';

// Help
$_['help_copy']                    = 'Zkopírovat URL';
$_['help_open']                    = 'Otevřít URL';
$_['help_additional_images']       = 'Povolením této možnosti přidáte do svého Product Data Feed feedu další obrázky. Mějte na paměti, že povolení této funkce může zpomalit proces generování feedu a zvýšit velikost generovaného XML souboru.';

// Error
$_['error_permission']             = 'Upozornění: Nemáte oprávnění upravovat Product Data Feed feed!';
$_['error_store_id']               = 'Upozornění: Formulář neobsahuje identifikátor obchodu!';
$_['error_currency']               = 'Upozornění: Vyberte měnu ze seznamu';
$_['error_upload']                 = 'Soubor se nepodařilo nahrát!';
$_['error_filetype']               = 'Neplatný typ souboru!';
$_['error_tax_country']            = 'Prosím, vyberte zemi pro daň.';
$_['error_tax_region']             = 'Pole pro daňový kraj nesmí být prázdné.';
$_['error_tax_rate_id']            = 'Prosím, vyberte sazbu daně pro daň.';
$_['error_no_data_to_backup']      = 'Není k dispozici žádná data o přiřazeních kategorií pro zálohování.';

