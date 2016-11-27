<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 17:03
 */

//require_once 'dbconfig.php';

session_start();

$user = new USER();

if($user->is_loggedin()!="")
{
    $user->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $uname = $_POST['txt_uname_email'];
    $umail = $_POST['txt_uname_email'];
    $upass = $_POST['txt_password'];

    $login = $user->login($uname,$umail,$upass);

    if($login)
    {
        $user->redirect('home.php');
    }
    else
    {
        $error = "Wrong Details !";
        var_dump($error);
    }
}