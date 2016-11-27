<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 17:27
 */


//require_once('session.php');


if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $logout->logout();
    $logout->redirect('index.php');
}