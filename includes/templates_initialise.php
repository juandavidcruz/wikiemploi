<?php
// inclusion des variables de templates
include($parent_back . 'includes/templates_vars.php');
// initialisation du template
require_once $parent_back . 'libs/smarty/Smarty.class.php';
$smarty = new Smarty;
// Localisation des répertoires de bases de Smarty
$smarty->template_dir = $parent_back . 'templates/' . $chemin_relatif;
if (!file_exists($parent_back . 'templates_c/' . $chemin_relatif)) {
	mkdir($parent_back . 'templates_c/' . $chemin_relatif, 0704);
}
$smarty->compile_dir = $parent_back . 'templates_c/' . $chemin_relatif;
// Assignation des valeurs aux variables de templates
$smarty->assign('head_static', $meta . $css . $js);
$smarty->assign('ligne_body',$ligne_body);
$smarty->assign('titre', $titre);
$smarty->assign('menu', $menu);
$smarty->assign('foot', $foot);
$smarty->assign("facebook_like_head", $facebook_like_head);
$smarty->assign('facebook_like', $facebook_like);
$smarty->assign("googleplus_like_head", $googleplus_like_head);
$smarty->assign("googleplus_like_call", $googleplus_like_call);
$smarty->assign("googleplus_like", $googleplus_like);
$smarty->assign("rechercher", $formulaire_recherche);
$smarty->assign("logout", $logout);