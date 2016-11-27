<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 21:36
 */
include('admin/files/fonctions_erreurs.php');
require_once('includes/class.dbconfig.php');
require_once('includes/class.user.php');
$page_description='<meta name="description" content="Se connecter">';
// inclusion des variables de templates et initialisation de celui-ci

include($parent_back . 'includes/templates_initialise.php');

$user = new USER();

if(!$user->is_loggedin())
{
    $user->redirect('index.php');
}
$db = new Database();
$conn = $db->dbConnection();

$user_id = $_SESSION['user_session'];
$stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id_utilisateur=:user_id");
$stmt->execute(array(":user_id"=>$user_id));
$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

var_dump($userRow);

$smarty->display($template_file_name);