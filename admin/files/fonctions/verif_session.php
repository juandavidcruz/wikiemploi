<?php

// fonction de d�marrage d'une session
function start() {
/* Configure le limiteur de cache � 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* Configure le d�lai d'expiration � 10 minutes */
session_cache_expire(10);
$cache_expire = session_cache_expire();
ini_set('session.use_strict_mode', 1);
/* D�marre la session */
session_start();
}

function new_session() {
	//pr�paration niveau 1 #
	//une session n'existe donc pas nous la param�trons ici
	$ip=$_SERVER['REMOTE_ADDR'];
	$url_page=$_SERVER['PHP_SELF'];
	$session=session_id();
	$timestamp=time();
	/* requete pour garder une trace du passage
	mysql_query("INSERT INTO connexion_serveur (id_num,date,ip,url,id_ses) 
	VALUES ('','$timestamp','$ip','$url_page','$session')");
	
	//post insertion on r�cup�re l'id de la session
	$id_sql=mysql_insert_id(); */
	if (empty($session)) { die("Erreur debut session"); }
	//enregistrement de la variable de session
	$_SESSION['url']=$url_page;
	$_SESSION['ip']=$ip;
	$_SESSION['id']=$session;
	$_SESSION['date']=$timestamp;
	
}

function test_session() {
	if (!$_SESSION['url']) {
		session_destroy();
		die("La session que vous utilisiez a expir� ou n'est pas valide. Veuillez vous reconnecter");
	}
}

//debut de test session
start();
//controle de session -----------------------------------------------------##
if (isset($_REQUEST['_SESSION'])) die("Get lost Muppet!");
if(!isset($_SESSION['url'])) {
	// enregistrement de session
	new_session();
} else {
	// test session valide
	test_session();
	}