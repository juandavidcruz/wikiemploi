<?php
/**
 * Created by PhpStorm.
 * User: juandavidcruzgomez
 * Date: 26/11/2016
 * Time: 16:55
 */

include('admin/files/fonctions_erreurs.php');
$page_description='<meta name="description" content="Se connecter">';
// inclusion des variables de templates et initialisation de celui-ci

include($parent_back . 'includes/templates_initialise.php');


if(isset($user) && $user->is_loggedin()!="")
{
    $user->redirect('home.php');
}
else if(isset($_POST['btn-signup']))
{

    $uname = trim($_POST['txt_uname']);
    $umail = trim($_POST['txt_umail']);
    $upass = trim($_POST['txt_upass']);

    if($uname=="") {
        $error[] = "provide username !";
    }
    else if($umail=="") {
        $error[] = "provide email id !";
    }
    else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
    }
    else if($upass=="") {
        $error[] = "provide password !";
    }
    else if(strlen($upass) < 6){
        $error[] = "Password must be atleast 6 characters";
    }
    else
    {
        try
        {
            $stmt = $DB_con->prepare("SELECT pseudo, email FROM utilisateur WHERE pseudo=:uname OR email=:umail");
            $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
            $row=$stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_name']==$uname) {
                $error[] = "sorry username already taken !";
            }
            else if($row['user_email']==$umail) {
                $error[] = "sorry email id already taken !";
            }
            else
            {
                $reg_result = $user->register($fname,$lname,$uname,$umail,$upass);
                if($reg_result)
                {
                    $user->redirect('register.php?joined');
                }
            }
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
} else if(isset($_GET['joined'])) {
    $user->redirect('index.php?joined');
}
else
{
    $smarty->display($template_file_name);
}

