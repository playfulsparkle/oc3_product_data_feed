<?php
// Heading
$_['heading_title']                = 'Playful Sparkle - Google Base';
$_['heading_categories']           = 'Przypisania kategorii';
$_['heading_authentication']       = 'Uwierzytelnianie';
$_['heading_tax_deffinitions']     = 'Definicje podatków';
$_['heading_getting_started']      = 'Rozpoczęcie pracy';
$_['heading_setup']                = 'Konfiguracja Google Base';
$_['heading_troubleshot']          = 'Typowe problemy i rozwiązania';
$_['heading_faq']                  = 'FAQ';
$_['heading_contact']              = 'Kontakt z pomocą techniczną';

// Text
$_['text_extension']               = 'Rozszerzenia';
$_['text_success']                 = 'Sukces: Pomyślnie zmodyfikowano kanał Google Base!';
$_['text_import_success']          = 'Sukces: Pomyślnie zaimportowano listę kategorii Google!';
$_['text_add_category_success']    = 'Sukces: Pomyślnie dodano przypisanie kategorii!';
$_['text_remove_category_success'] = 'Sukces: Pomyślnie usunięto przypisanie kategorii!';
$_['text_edit']                    = 'Edytuj Google Base';
$_['text_import']                  = 'Aby pobrać najnowszą listę kategorii Google, <a href="https://support.google.com/merchants/answer/160081?hl=en" target="_blank" rel="external noopener noreferrer" class="alert-link">kliknij tutaj</a> i wybierz taksonomię z numerycznymi identyfikatorami w pliku tekstowym (.txt). Następnie załaduj pobrany plik przy użyciu zielonego przycisku.';
$_['text_getting_started']         = '<p><strong>Przegląd:</strong> Moduł Google Base dla OpenCart w wersji 3.x umożliwia użytkownikom bezproblemowy eksport swoich produktów do <a href="https://merchants.google.com" target="_blank" rel="external noopener noreferrer">Google Merchant Center</a> w formacie XML. To istotne narzędzie zwiększa widoczność produktów w Zakupach Google, ułatwiając potencjalnym klientom łatwiejsze odkrywanie i zakup.</p><p><strong>Wymagania:</strong> Aby móc korzystać z tego rozszerzenia, należy upewnić się, że posiadają Państwo zainstalowane i skonfigurowane oprogramowanie OpenCart w wersji 3.x lub nowszej oraz PHP w wersji 7.3. Dodatkowo, wymagane jest aktywne konto Google Merchant Center do efektywnego zarządzania Państwa ofertami produktów.</p>';
$_['text_setup']                   = '<ul><li>Pobierz najnowszą listę kategorii Google z <a href="https://support.google.com/merchants/answer/160081?hl=en" target="_blank" rel="external noopener noreferrer">pomocy Google Merchant Center</a>.</li><li>Skojarz kategorie swojego sklepu z odpowiednimi kategoriami Google.</li><li>Skonfiguruj rozszerzenie, aby pomijało produkty niedostępne w magazynie.</li><li>Używaj cen przed opodatkowaniem w kanale, włączając odpowiednią opcję i dostosowując definicje podatków.</li></ul>';
$_['text_troubleshot']             = '<ul><li><strong>Brak wyświetlania kategorii Google:</strong> Sprawdź, czy zaimportowano najnowszą listę kategorii Google.</li><li><strong>Brak danych w kanale:</strong> Upewnij się, że rozszerzenie jest aktywne w panelu administracyjnym OpenCart.</li><li><strong>Produkty nie pojawiają się w Google Merchant Center:</strong> Zweryfikuj poprawność kategoryzacji produktów i zgodność z politykami Google.</li></ul>';
$_['text_faq']                     = '<details><summary>Czym jest rozszerzenie Google Base?</summary><p>Rozszerzenie umożliwia eksport danych produktowych z OpenCart 3.x do Google Merchant Center w celu zwiększenia widoczności w Google Shopping.</p></details><details><summary>Jak aktywować rozszerzenie?</summary><p>Aktywuj rozszerzenie w panelu administracyjnym OpenCart w sekcji "Rozszerzenia" i skonfiguruj ustawienia.</p></details><details><summary>Czy mogę dostosować kanał produktowy?</summary><p>Tak, rozszerzenie pozwala dostosować ustawienia podatkowe oraz wykorzystanie cen przed opodatkowaniem.</p></details><details><summary>Dlaczego kanał nie jest widoczny w Google Merchant Center?</summary><p>Sprawdź aktywność rozszerzenia oraz poprawność przypisań kategorii. Zweryfikuj również konfigurację kanału.</p></details>';
$_['text_contact']                 = '<p>W celu uzyskania pomocy skontaktuj się z naszym zespołem:</p><ul><li><strong>Kontakt:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentacja:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Dokumentacja użytkownika</a></li></ul>';
$_['text_gbc2c_restore']           = 'Przed przywracaniem przypisań kategorii, upewnij się że wybrano właściwy sklep. Plik kopii zapasowej (gbc2c_backup_store_x.txt) musi zawierać identyfikator sklepu (x), do którego przywracasz dane.';

// Column
$_['column_google_category']       = 'Kategoria Google';
$_['column_category']              = 'Kategoria';
$_['column_action']                = 'Akcja';

// Tab
$_['tab_general']                  = 'Ogólne';
$_['tab_help_and_support']         = 'Pomoc i wsparcie';

// Entry
$_['entry_google_category']        = 'Kategoria Google';
$_['entry_category']               = 'Kategoria';
$_['entry_data_feed_url']          = 'Adres URL kanału danych';
$_['entry_status']                 = 'Status';
$_['entry_login']                  = 'Nazwa użytkownika';
$_['entry_password']               = 'Hasło';
$_['entry_skip_out_of_stock']      = 'Pomiń produkty niedostępne';
$_['entry_tax']                    = 'Używaj cen przed opodatkowaniem';
$_['entry_country']                = 'Kraj';
$_['entry_region']                 = 'Region';
$_['entry_tax_rate']               = 'Stawka podatku';
$_['entry_tax_ship']               = 'Podatek od dostawy';
$_['entry_active_store']           = 'Aktywny sklep';
$_['entry_additional_images']      = 'Załącz dodatkowe obrazy';
$_['entry_backup_restore']         = 'Kopia zapasowa/Przywracanie';

// Button
$_['button_backup']                = 'Utwórz kopię zapasową';
$_['button_restore']               = 'Przywróć';

// Help
$_['help_copy']                    = 'Kopiuj URL';
$_['help_open']                    = 'Otwórz URL';
$_['help_additional_images']       = 'Włączenie tej opcji doda dodatkowe obrazy do kanału Google Base. Może to spowolnić generowanie kanału i zwiększyć rozmiar pliku XML.';

// Error
$_['error_permission']             = 'Ostrzeżenie: Brak uprawnień do modyfikacji kanału Google Base!';
$_['error_store_id']               = 'Ostrzeżenie: Brak identyfikatora sklepu w formularzu!';
$_['error_currency']               = 'Ostrzeżenie: Wybierz walutę z listy!';
$_['error_upload']                 = 'Nie udało się przesłać pliku!';
$_['error_filetype']               = 'Nieprawidłowy typ pliku!';
$_['error_tax_country']            = 'Wybierz kraj dla podatku.';
$_['error_tax_region']             = 'Pole regionu podatkowego nie może być puste.';
$_['error_tax_rate_id']            = 'Wybierz stawkę podatkową.';
$_['error_no_data_to_backup']      = 'Brak danych przypisań kategorii do utworzenia kopii zapasowej.';
