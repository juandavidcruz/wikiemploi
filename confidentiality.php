<?php
// script de vérification d'erreurs
include('administrer/files/fonctions_erreurs.php');
// inclusion des variables de templates et initialisation de celui-ci
include($parent_back . 'includes/templates_initialise.php');
$smarty->display($template_file_name);
include($parent_back . 'includes/execution_time_display.php');
?>