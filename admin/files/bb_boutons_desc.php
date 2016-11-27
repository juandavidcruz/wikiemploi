<?php
$b_lien_desc='<input class="b_mise_en_page" type="button" value="Insérer un lien" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[url=]\', \'[/url]\')">';
$b_couleur_rouge='<input class="b_mise_en_page" type="button" value="Mettre le texte en rouge" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[color=red]\', \'[/color]\')">';
$b_gras='<input class="b_mise_en_page" type="button" value="Mettre le texte en gras" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[b]\', \'[/b]\')">';
$b_italic='<input class="b_mise_en_page" type="button" value="Mettre le texte en italic" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[i]\', \'[/i]\')">';
$b_souligne='<input class="b_mise_en_page" type="button" value="Souligner le texte" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[u]\', \'[/u]\')">';
$b_youtube='<input class="b_mise_en_page" type="button" value="Insérer une vidéo Youtube" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[youtubeEmbed]\', \'[/youtubeEmbed]\')">';
$b_image='<input class="b_mise_en_page" type="button" value="Insérer une image" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[img=]\', \'[/img]\')">';
$b_titres=array();
for ($i=1; $i<=6; $i++) {
	$b_titres[$i]='<input class="b_mise_en_page" type="button" value="titre ' . $i . '" onClick="insertion(document.getElementById(\'frm_db\').id, document.getElementById(\'txt_desc\').id, \'[h' . $i . ']\', \'[/h' . $i . ']\')">';
	$smarty->assign('b_titre_' . $i, $b_titres[$i]);
}
$smarty->assign("b_lien_desc", $b_lien_desc);
$smarty->assign("b_couleur_rouge", $b_couleur_rouge);
$smarty->assign("b_gras", $b_gras);
$smarty->assign("b_italic", $b_italic);
$smarty->assign("b_souligne", $b_souligne);
$smarty->assign("b_youtube", $b_youtube);
$smarty->assign("b_image", $b_image);