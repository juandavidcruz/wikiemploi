<?php
$b_lien_sites='<input class="b_mise_en_page" type="button" value="Insérer un lien" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_sites\').id, \'[url]\', \'[/url]\')">';
$smarty->assign("b_lien_sites", $b_lien_sites);