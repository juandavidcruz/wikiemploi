<?php
// script de vérification d'erreurs
include('admin/files/fonctions_erreurs.php');
$page_description='<meta name="description" content="Se connecter">';
// inclusion des variables de templates et initialisation de celui-ci

include($parent_back . 'includes/templates_initialise.php');
$smarty->display($template_file_name);
?>