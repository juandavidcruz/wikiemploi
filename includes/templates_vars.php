<?php
// var_dump($_SESSION);
// var_dump(hash_algos());
// echo($url_complete);
// var_dump($_COOKIE);
include("$parent_back"."includes/bb.php");

// préparation pour l'affichage des variables de templates
$meta.='
<meta charset="UTF-8">
<META http-equiv="Content-Language" content="fr">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
' . $page_description . '
<META NAME="Category" CONTENT="">
<meta name="Keywords" content="">
<META name="Author" content="">
<META NAME="Publisher" CONTENT="">
<META NAME="Identifier-URL" CONTENT="' . $url_base . '">
' . $robot;

$css.='
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" media="screen" type="text/css" href="' . $parent_back . 'css/style.css" title="default" />
';

$js.='
<noscript> 
<meta http-equiv="refresh" content="0; URL=' . $parent_back . 'no_js.php"> 
</noscript>
<!--[if lt IE 9]>
<script type="text/javascript" src="' . $parent_back . 'js/html5shiv-printshiv.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="' . $parent_back . 'js/fonctions_general.js"></script>
<script type="text/javascript" src="' . $parent_back . 'js/fonctions_admin.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="' . $parent_back . 'js/jquery-1.11.0.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
';

$ligne_body.='
onload="chargeVisibility();
';

$titre.='
<img src="/' . $project_name . '/logo.png" alt="Logo" >
<h1>Wiki emploi</h1>
<div style="text-align: center;">
<input type="button" accesskey="1" id="btn_togle_menu" name="btn_togle_menu" value="Masquer le menu" onclick="togleMenu();">
<input type="button" accesskey="2" id="btn_togle_foot" name="btn_togle_foot" value="Masquer le pied de page" onclick="togleFoot();">
</div>
';

$menu.='<menu>
<a href="#contenu">Aller au contenu</a>
<br/>
<h2>Menu</h2>
<ul>
<li><a accesskey="h" href="' . $parent_back . 'index.php">Revenir à l\'accueil</a></li>
<li><a accesskey="c" href="' . $parent_back . 'login_page.php">Mon compte</a></li>
<li><a accesskey="h" href="' . $parent_back . 'aides.php">Demandes d\'aide</a></li>
<li><a accesskey="w" href="' . $parent_back . 'Wiki.php">Wiki</a></li>
<li><a accesskey="u" href="' . $parent_back . 'who.php">Qui sommes nous</a></li>
</ul>
<br/></menu>
';

$foot.='
<p>
<a href="#menu">Revenir au menu</a>
<br/>
<a href="#contenu">Revenir en haut du contenu</a>
<br/>
</p>
<div id="copyright">
<p>
<a href="' . $parent_back . 'confidentiality.php">Voir les règles de confidentialité du site</a>
<br/>
Copyright Wiki Emploi 2016, V' . $project_version .', tous droits réservés.
<br/>
</p>
</div>
<div id="alerte_cookies" class="alerte_cookies">
<strong>Ce site utilise des cookies et la loi française impose d\'avertir l\'utilisateur quand ceux-ci sont utilisés.
<br/>
En navigant sur ce site, vous reconnaissez que vous acceptez l\'utilisation de ceux-ci.
<br/>
Pour en savoir plus sur l\'utilisation des cookies et du Javascript, consulter <a href="' . $parent_back . 'confidentiality.php">cette page.</a>
</strong>
<input type="button" id="btn_alerte_cookies" name="btn_alerte_cookies" value="Accepter et cacher ce message" onclick="document.getElementById(\'alerte_cookies\').style.display=\'none\';
setcookie(\'h_alerte_cookies\',\'h\');">
</div>
';

// variable du bouton Like de Facebook
$url_id=(isset($_GET['h_id'])) ? '?h_id=' . (int)mysql_escape_string(htmlentities($_GET['h_id'])) : '';
$facebook_like_head='
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
';
$facebook_like='<div class="fb-like" data-href="' . urlencode($url_base . $url_relative . $complet_file_name . $url_id) . '" data-layout="standard" data-show-faces="false" data-width="450" data-action="like" data-colorscheme="light" data-share="true" style="border:none; overflow:hidden; width:450px; height:25px"></div>';

// bouton de +1 de GooglePlus
$googleplus_like_head='<script type="text/javascript" src="https://apis.google.com/js/platform.js" async defer>
{lang: \'fr\', parsetags: \'explicit\'}
</script>
';
$googleplus_like='<div id="gplus" class="g-plusone" data-size="tall"></div>
';
$googleplus_like_call='gapi.plusone.go();';

// Variable du formulaire de recherche
$formulaire_recherche='<div id="rechercher" name="rechercher">
<form name="frm_recherche" id="frm_recherche" method="get" action="' . $parent_back . 'recherche.php">
<br/>
<p>Rechercher sur le site.</p>
<br/>
<label for="txt_rechercher">Chercher:
<input type="text" id="txt_rechercher" name="txt_rechercher">
</label>
<br/>
<label for="lst_type_recherche">Recherche dans:
<select id="lst_type_recherche" name="lst_type_recherche">
<option value="1">Demandes d\'aide</option>
<option value="2">Articles du wiki</option>

</select>
</label>
<label for="lst_trier_recherche">Trier par:
<select id="lst_trier_recherche" name="lst_trier_recherche">
<option value="1">Nom</option>

</select>
</label>
<br/>
<input type="submit" id="btn_recherche" value="Rechercher">
</form>
</div>
';