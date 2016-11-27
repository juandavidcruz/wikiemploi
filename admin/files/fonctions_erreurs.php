<?php
// Initialisation de la date de début du script
$timestart=microtime(true); 
header('Content-type: text/html; charset=UTF-8');
ini_set('allow_url_include', 0);
ini_set('register_globals', 0);
ini_set('magic_quotes_gpc', 0);
setlocale(LC_ALL,'french');
// Vérification du Referer pour les variables passées en POST
if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!='' && substr($_SERVER['HTTP_REFERER'], 7, strlen($_SERVER['SERVER_NAME'])) != $_SERVER['SERVER_NAME']) {
	$_POST = array();
}

// Inclusion des sessions
require_once ('fonctions/verif_session.php');
require_once ('fonctions/pagination.php');
require_once ('fonctions/convertir_long_texte.php');
// nom du projet, doit correspondre au nom du dossier de base du site, sans "/" ni "\".
$project_name='wikiemploi';
// Version du projet
$project_version='0.0.1';
// extention des fichiers de templates
$templates_extention=".tpl";
// variables de templates
$meta="";
$page_description='';
$robot='<meta name="robot" content="index,follow">';
$css="";
$js="";
$ligne_body="";
$titre="";
$menu="";
$foot="";
// variables de gestion des dates/heures
$jours_text=array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
$mois_text=array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
$liste_jours="";
$liste_num_jours="";
$liste_mois="";
$heures_liste="";
$minutes_liste="";
$c=count($jours_text);
for ($i=0; $i<$c; $i++) {
	$liste_jours .="<option value='$i'>$jours_text[$i]</option>";
}
// $jours_num=array(0,1,2,3,4,5,6);
for ($i=1; $i<=9; $i++) {
	$liste_num_jours .="<option id='lst_jour_$i' value='0$i'>0$i</option>";
}
for ($i=10; $i<=31; $i++) {
	$liste_num_jours .="<option id='lst_jour_$i' value='$i'>$i</option>";
}
$c=count($mois_text);
for ($i=0; $i<$c; $i++) {
	if ($i<9) {
		$j='0';
		$j.=$i+1;
	} else {
		$j=$i+1;
	}
	$liste_mois .="<option value='$j'>$mois_text[$i]</option>";
}
// $mois_num=array(0,1,2,3,4,5,6,7,8,9,10,11);
for ($i=0; $i<=9; $i++) {
	$heures_liste .="<option value='0$i'>0$i</option>";
	$minutes_liste .="<option value='0$i'>0$i</option>";
}
for ($i=10; $i<=23; $i++) {
	$heures_liste .="<option value='$i'>$i</option>";
}
for ($i=10; $i<=59; $i++) {
	$minutes_liste .="<option value='$i'>$i</option>";
}
$elements_status=array('privé', 'public');
$liste_status_elements='';
$c=count($elements_status);
for ($i=0; $i<$c; $i++) {
	$liste_status_elements .='<option value="' . $i . '">' . $elements_status[$i] . '</option>';
}
$liste_nb_elements='<label for="lst_nb_elements">Nombre d\'éléments par page:
<select id="lst_nb_elements" name="lst_nb_elements">
<option value="10">10</option>
<option value="20">20</option>
<option value="40">40</option>
<option value="80">80</option>
<option value="100">100</option>
<option value="150">150</option>
<option value="200">200</option>
</select>
</label>
';

// traitements et récupération des variables pour gérer les chemins
// Les variables importantes sont:
// global $project_name, $project_version, $chemin_actuel, $chemin_base, $sep_rep, $chemin_relatif, $parent_back;
// Ces variables peuvent être appelée dans des fonctions avec le mot clé "global" au moment de leur déclaration, comme présenté ci-dessus ou à voir plus bas dans ce fichier, fonction ecrire_fichier().

// url de base du site, avec le délimiteur
$url_base='http://localhost/wikiemploi/';
// déclaration de la variable pour obtenir l'url relative, sera modifiée par programmation ensuite
$url_relative='';
// récupération du chemin courant
$chemin_actuel=getcwd();

// récupération du nom du fichier courant
$path = htmlentities($_SERVER['PHP_SELF']);
$complet_file_name=basename ($path);
$count_extention_file_name=strlen(strrchr($complet_file_name, '.'));
$file_name=substr($complet_file_name, 0, -$count_extention_file_name);
$template_file_name=$file_name . $templates_extention;
// Extraction du chemin de base et du chemin relatif, un peu galaire à cause de la version de PHP en place chez Free qui n'accepte pas le troisième argument booléen de la fonction strstr().
$chemin_base=strstr($chemin_actuel, $project_name);
$i=0-strlen($chemin_base);
$chemin_base=substr($chemin_actuel, 0, $i);
// tant qu'on y est on récupère le délimiteur de répertoire "/" ou "\" en se servant de la valeur actuel de $chemin_base qui sera forcément le délimiteur recherché
$sep_rep=substr($chemin_base, -1, 1);
$j=(strlen($chemin_base)+strlen($project_name)+1);
// valeur finale $chemin_base, avec le délimiteur.
$chemin_base =sprintf("%s%s%s", $chemin_base, $project_name, $sep_rep);
// au tour du deuxième chemin, celui qui vient après le nom du projet, sans le délimiteur
$chemin_relatif=substr($chemin_actuel, $j);
// On peut maintenant définir la variable $parent_back, qui permet de revenir à la base du site en mettant "./" ou le nombre de "../" nécessaire(s) dans cette variable de chaîne de caractère. Cette variable est utile en concaténation avec une autre chaîne de caractères, par exemple pour les "include" ou l'appel aux scripts Javascript ou aux feuilles de style CSS, comme présenté dans le fichier "include/templates_vars.php".
if ($chemin_relatif=="") {
	$parent_back="./";
	// $chemin_relatif='';
	$url_relative .='./';
} else {
	$url_relative .=str_replace('\\', '/', $chemin_relatif . '/');
	$parent_back="";
	$count_sep_rep=1;
	$c=strlen($chemin_relatif);
	for ($l=0; $l<$c; $l++) {
		if ($chemin_relatif[$l]==$sep_rep) {
			$count_sep_rep++;
		}
	}
	// Sinon on peut faire ça, ne fonctionne pas online chez Free
	// $count_sep_rep=substr_count($chemin_relatif, $sep_rep, 0, strlen($chemin_relatif))+1;
	for ($k=0; $k<$count_sep_rep; $k++) {
		$parent_back .= "../";
	}
}
// récupération de l'url relative, celle qui vient après l'adresse de base, avec le délimiteur
$url_complete=$url_base . $url_relative . $complet_file_name;
// fin des définitions de chemins

// fonctions qui convertissent une date en une chaîne contenant le jour textuel, le numéro du jour, le mois textuel et l'année. Pour la seconde fonction, l'heure est ajoutée.
// Par exemple, le retour pourra êtr sous la forme "jeudi 13 janvier 2016"
// Le paramètre passé devra être un timestamp. S'il est vide ou égal au timestamp actuel, une chaîne vide sera retournée

function convertir_date($timestamp) {
	$day=array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$month=array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	if ($timestamp!=null) {
		if ($timestamp!=time()) {
			$day=$day[date('w', $timestamp)];
			$nday=date('j', $timestamp);
			$month=$month[date('n', $timestamp)-1];
			$year=date('Y', $timestamp);
			return ($day . ' ' . $nday . ' ' . $month . ' ' . $year);
		} else {
			return('');
		}
	}
}

function convertir_date_et_heure($timestamp) {
	$day=array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	$month=array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
	if ($timestamp!=null) {
		if ($timestamp!=time() || $timestamp!='') {
			$day=$day[date('w', $timestamp)];
			$nday=date('j', $timestamp);
			$month=$month[date('n', $timestamp)-1];
			$year=date('Y', $timestamp);
			$hour=date('H', $timestamp);
			$minute=date('i', $timestamp);
			return ($day . ' ' . $nday . ' ' . $month . ' ' . $year . ' à ' . $hour . ':' . $minute);
		} else {
			return ('');
		}
	}
}

// fonction qui retourne un nom de fichier safe en supprimant certains caractères non autorisés
/* function filename_safe($name) {
	$except = array('\\', '/', ':', '*', '?', '"', '<', '>', '|');
	return str_replace($except, '', $name); 
}*/

// fonction de suppression récursive de répertoire
function deleteAll($directory, $empty = false) {
	if(substr($directory,-1) == "/") {
		$directory = substr($directory,0,-1);
	}
	if(!file_exists($directory) || !is_dir($directory)) {
		return false;
	} elseif(!is_readable($directory)) {
		return false;
	} else {
		$directoryHandle = opendir($directory);
		while ($contents = readdir($directoryHandle)) {
			if($contents != '.' && $contents != '..') {
				$path = $directory . "/" . $contents;
				if(is_dir($path)) {
					deleteAll($path);
				} else {
					unlink($path);
				}
			}
		}
		closedir($directoryHandle);
		if($empty == false) {
			if(!rmdir($directory)) {
				return false;
			}
		}
		return true;
	}
}

// Fonction qui convertit les accents d'une chaîne de caractère en code HTML
function convertir_accents($text) {
	$text = htmlentities($text, ENT_NOQUOTES, "UTF-8");
	$text = htmlspecialchars_decode($text);
	return $text;
}

//Fonction qui reçoit les erreurs en argument
function erreurphp( $errno , $errmsg , $errfichier , $errligne , $errcontext ){
	$date = date( 'd/m/Y H:i:s' );
	switch( $errno ){
		//Si l'erreur est assez importante et nécessite l'arrêt du script :
		case 1:
		case 16:
		case 64:
		case 256:
			//On marque l'erreur
			ecrire_fichier( "[" . $date . "] -- [ " . $errno . " ] E_ERROR : " . $errmsg . " --- fichier : '" . $errfichier . "' --- Ligne : " . $errligne );
			//Et on arrête le script
			die( '<b><span style="color: #FF0000;">Erreur</span></b> : R&eacute;&eacute;ssayez plus tard.' );
		//Sinon, si l'erreur est moindre, mais assez importante tout de même
		case 2:
		case 4:
		case 32:
		case 128:
		case 512:
			//On écrit l'erreur
			ecrire_fichier( "[" . $date . "] -- [" . $errno . "] E_WARNING : " . $errmsg . " --- fichier : '" . $errfichier . "' --- Ligne : " . $errligne );
			break;
		//Sinon, si c'est juste un 'Notice' (avertissement)
		case 8:
		case 1024:
			ecrire_fichier( "[" . $date . "] -- [" . $errno . "] E_NOTICE : " . $errmsg . " --- fichier : '" . $errfichier . "' --- Ligne : " . $errligne );
			break;
	}
}

//toutes les erreurs doivent être reportées
error_reporting( E_ALL );
//Quand on rencontre une erreur, on appelle la fonction erreurphp()
$error_handler = set_error_handler("erreurphp");

//La fonction qui écrit dans le fichier
function ecrire_fichier( $msg ){
	// On déclare les variables en mode global pour avoir le chemin de base et le délimiteur, permettant ainsi de créer simplement le chemin à partir de la base du projet pour le fichier d'erreur et quelque soit la structure du système
	global $chemin_base, $sep_rep;
	//Vous pouvez renommer ce fichier comme vous voulez, il est conseillé de le mettre dans un répertoire innaccessible depuis HTTP (accessible seulement par FTP et PHP)
	$fichier = sprintf("%sadmin%sfiles%serror.log", $chemin_base, $sep_rep, $sep_rep);
	//si le fichier n'existe pas
	if( !file_exists( $fichier ) ) {
		//on l'ouvre en mode 'création'
		$mode = 'x+'; 
		// $msg contient ce qui sera écrit en plus dans le fichier
		$msg .= "\n";
		//Sinon (si il existe)
	} else {
		//on l'ouvre en mode 'écriture'
		$mode = 'a+';
		//On récupère le contenu du fichier
		$contenu = file_get_contents( $fichier );
		//On récupère le message d'erreur en enlevant la date
		$message = substr( $msg , strpos( $msg , ']' ) + 5 );
		//Si le message d'erreur existe déjà dans le fichier
		if( preg_match('(\[[0-9]{2}\/[0-9]{2}\/[0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}\] -- ' . preg_quote($message) . ')', $contenu, $regs)) {
			//On remplace le message d'erreur du fichier par notre message d'erreur, avec la date actuelle
			$msg = preg_replace('(' . preg_quote($regs[0]) . ')', $msg, $contenu);
			//on décide d'ouvrir le fichier en 'remise à zéro', car on a remplacé ce qu'il fallait.
			$mode = 'w';
		} else {
			$msg .= "\n";
		}
	}
	//On ouvre le fichier avec le mode choisi
	$fp = fopen( $fichier , $mode );
	//On écrit le message
	fwrite( $fp , $msg );
	// On note un petit message à l'écran
	echo("Une erreur de code s'est produite. Regarder le fichier d'erreurs.");
	//On ferme le fichier
	fclose( $fp );
}

// include("baseconf.php5");
include('fonctions/uploads.php');
include('fonctions/no_cache.php');
// include($parent_back . 'includes/messages.php');
include('fonctions/gestion_sitemaps.php');
include('fonctions/trier.php');