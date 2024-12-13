<?php
// Heading
$_['heading_title']                = 'Playful Sparkle - Google Base';
$_['heading_categories']           = 'Kategória társítások';
$_['heading_authentication']       = 'Hitelesítés';
$_['heading_tax_deffinitions']     = 'Adódefiníciók';
$_['heading_getting_started']      = 'Kezdő lépések';
$_['heading_setup']                = 'Google Base beállítása';
$_['heading_troubleshot']          = 'Gyakori hibakeresési lépések';
$_['heading_faq']                  = 'GYIK';
$_['heading_contact']              = 'Terméktámogatás';

// Text
$_['text_extension']               = 'Bővítmények';
$_['text_success']                 = 'Siker: Sikeresen módosította a Google Base feed-et!';
$_['text_import_success']          = 'Siker: Sikeresen importálta a Google kategóriák listáját!';
$_['text_add_category_success']    = 'Siker: Sikeresen hozzáadta a kategória-asszociációt!';
$_['text_remove_category_success'] = 'Siker: Sikeresen eltávolította a kategória-asszociációt!';
$_['text_edit']                    = 'Google Base szerkesztése';
$_['text_import']                  = 'A legfrissebb Google kategóriák lista letöltéséhez <a href="https://support.google.com/merchants/answer/160081?hl=hu" target="_blank" rel="external noopener noreferrer" class="alert-link">kattintson ide</a>, és válassza a taxonómiát numerikus azonosítókkal rendelkező sima szöveg (.txt) fájlt. Ezután a letöltött fájlt töltse fel a zöld gomb segítségével.';
$_['text_getting_started']         = '<p><strong>Áttekintés:</strong> A "Google Base" kiterjesztés az OpenCart 3-hez lehetővé teszi a felhasználók számára, hogy termékeiket könnyedén exportálják a <a href="https://merchants.google.com" target="_blank" rel="external noopener noreferrer">Google Merchant Center</a>be XML formátumban. Ez az alapvető eszköz növeli a termékek láthatóságát a Google Shoppingon, megkönnyítve ezzel a potenciális vásárlók számára a termékek felfedezését és megvásárlását.</p><p><strong>Követelmények:</strong> A kiterjesztés használatához győződjön meg arról, hogy az OpenCart 3.x+, PHP 7.3 telepítve és konfigurálva van. Emellett aktív Google Merchant Center fiók szükséges a terméklisták hatékony kezeléséhez.</p>';
$_['text_setup']                   = '<ul><li>Töltse le a legfrissebb Google kategóriák listáját a <a href="https://support.google.com/merchants/answer/160081?hl=hu" target="_blank" rel="external noopener noreferrer">Google Merchant Center Támogatás</a> oldaláról.</li><li>Kösse össze webshop kategóriáit a megfelelő Google kategóriákkal.</li><li>Állítsa be a kiterjesztést úgy, hogy kihagyja a készleten nem lévő termékeket, ha kívánja.</li><li>Használjon nettó árakat a feedben az adott opció engedélyezésével, és testreszabhatja az adódefiníciókat ennek megfelelően.</li></ul>';
$_['text_troubleshot']             = '<ul><li><strong>Google kategóriák nem jelennek meg:</strong> Győződjön meg arról, hogy letöltötte a legfrissebb Google kategóriák listáját, és importálta azokat a rendszerébe. Ez elengedhetetlen a webshop és a Google Merchant Center közötti helyes térképezéshez.</li><li><strong>Nincs termék feed kimenet:</strong> Ellenőrizze, hogy a Google Base kiterjesztés engedélyezve van-e az OpenCart admin panelen. Ha engedélyezve van, és még mindig nem lát kimenetet, nézze át a kiterjesztés beállításait, hogy nincs-e hiba a konfigurációban.</li><li><strong>Termékek nem jelennek meg a Google Merchant Centerben:</strong> Ellenőrizze, hogy termékei helyesen kategorizálva vannak-e, és hogy nincsenek-e hibák a termékadataiban. Győződjön meg arról, hogy megfelel a Google Merchant Center terméklistázási irányelveinek.</li></ul>';
$_['text_faq']                     = '<details><summary>Mi az a Google Base kiterjesztés?</summary><p>A Google Base kiterjesztés segít az OpenCart 3.x felhasználóknak exportálni termékadataikat a Google Merchant Centerbe, növelve ezzel a láthatóságot a Google Shoppingon.</p></details><details><summary>Hogyan tudom engedélyezni a Google Base kiterjesztést?</summary><p>A kiterjesztést az OpenCart admin panelen, az Extensions szekció alatt tudja engedélyezni. Győződjön meg arról, hogy a beállításokat szükség szerint konfigurálta.</p></details><details><summary>Testreszabhatom a termék feedemet?</summary><p>Igen, a kiterjesztés lehetővé teszi különböző beállítások testreszabását, beleértve a nettó árak használatát és az adódefiníciókat, biztosítva ezzel, hogy a feed megfeleljen az igényeinek.</p></details><details><summary>Miért nem jelenik meg a termék feedem a Google Merchant Centerben?</summary><p>Győződjön meg arról, hogy a Google Base kiterjesztés engedélyezve van, és hogy termékkategóriái helyesen vannak társítva a Google kategóriákhoz. Ezenkívül ellenőrizze, hogy nincsenek-e hibák a feed konfigurációjában.</p></details>';
$_['text_contact']                 = '<p>További segítségért kérjük, lépjen kapcsolatba támogatási csapatunkkal:</p><ul><li><strong>Kapcsolat:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentáció:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Felhasználói dokumentáció</a></li></ul>';

// Column
$_['column_google_category']       = 'Google Kategória';
$_['column_category']              = 'Kategória';
$_['column_action']                = 'Művelet';

// Tab
$_['tab_general']                  = 'Általános';
$_['tab_help_and_support']         = 'Segítség &amp; támogatás';

// Entry
$_['entry_google_category']        = 'Google Kategória';
$_['entry_category']               = 'Kategória';
$_['entry_data_feed_url']          = 'Adatfeed URL';
$_['entry_status']                 = 'Állapot';
$_['entry_login']                  = 'Felhasználónév';
$_['entry_password']               = 'Jelszó';
$_['entry_skip_out_of_stock']      = 'Kihagyás, ha nincs készleten';
$_['entry_tax']                    = 'Adó nélküli árak használata';
$_['entry_country']                = 'Ország';
$_['entry_region']                 = 'Régió';
$_['entry_tax_rate']               = 'Adókulcs';
$_['entry_tax_ship']               = 'Szállítási adó';
$_['entry_active_store']           = 'Aktív áruház';
$_['entry_additional_images']      = 'További képek hozzáadása';

// Help
$_['help_copy']                    = 'URL másolása';
$_['help_open']                    = 'URL megnyitása';
$_['help_additional_images']       = 'Ennek az opciónak az engedélyezésével további képeket adhat hozzá a Google Base feedhez. Vegye figyelembe, hogy ez lassíthatja a feed generálási folyamatát, és növelheti a generált XML fájl méretét.';

// Error
$_['error_permission']             = 'Figyelmeztetés: Nincs jogosultsága a Google Base feed módosításához!';
$_['error_store_id']               = 'Figyelmeztetés: A űrlap nem tartalmazza a áruház azonosítóját!';
$_['error_currency']               = 'Figyelmeztetés: Válasszon pénznemet a listából';
$_['error_upload']                 = 'A fájl feltöltése nem sikerült!';
$_['error_filetype']               = 'Érvénytelen fájltípus!';
$_['error_tax_country']            = 'Kérem, válassza ki az adó országát.';
$_['error_tax_region']             = 'Az adóregionális mező nem maradhat üresen.';
$_['error_tax_rate_id']            = 'Kérem, válassza ki az adókulcsot az adóhoz.';
