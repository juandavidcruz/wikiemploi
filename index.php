<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 16:05
 */

/*require './libs/smarty/Smarty.class.php';



$smarty = new Smarty;

$smarty->caching = true;
$smarty->cache_lifetime = 120;

$smarty->display('index.tpl');*/

// script de vérification d'erreurs
include('admin/files/fonctions_erreurs.php');
$page_description='<meta name="description" content="Se connecter">';
// inclusion des variables de templates et initialisation de celui-ci

include($parent_back . 'includes/templates_initialise.php');
$smarty->display($template_file_name);


