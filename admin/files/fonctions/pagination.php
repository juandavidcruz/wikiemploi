<?php
function paginer($messagesParPage, $nom_var, $url, $db, $rq='', $total=0) {
if($rq!='') {
$rq=$db->query($rq) or die('Erreur pagination.');
$rq=$rq->fetchAll();
// $rq=$rq[0];
$total=count($rq);
}
$nombreDePages=($total<=0) ? 1 : ceil($total/$messagesParPage);
if(isset($_GET[$nom_var])) // Si la variable $_GET['page'] existe...
{
$pageActuelle=intval($_GET[$nom_var]);
if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
{
$pageActuelle=$nombreDePages;
}
}
else // Sinon
{
$pageActuelle=1; // La page actuelle est la n°1
}
$premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire
$retour=array();
$retour['premiereEntree']=$premiereEntree;
$retour['messages_par_page']=$messagesParPage;
$retour['sql_limit']='limit ' . $premiereEntree . ', ' . $messagesParPage;
$retour['rq_paginer']=array();
for ($i=$premiereEntree; $i<$premiereEntree+$messagesParPage; $i++) {
	if (isset($rq[$i])) $retour['rq_paginer'][]=$rq[$i];
}
$_get_texte='';
$c_get=count($_GET);
if ($c_get>0) {
	foreach ($_GET as $key => $value) {
		if ($key!=$nom_var) $_get_texte .=$key . '=' . $value . '&';
	}
}
$retour['display']='<p align="center" class="pagination">Page :<br/>'; //Pour l'affichage, on centre la liste des pages
if ($pageActuelle==1) {
$retour['display'] .='Première page<br/>';
$retour['display'] .='Page précédente<br/>';
} else {
$retour['display'] .='<a href="' . $url . '?' . $_get_texte . $nom_var . '=1">Première page</a><br/>';
$retour['display'] .='<a href="' . $url . '?' . $_get_texte . $nom_var . '=' . ($pageActuelle-1) . '">Page précédente</a><br/>';
}
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
//On va faire notre condition
if($i==$pageActuelle) //Si il s'agit de la page actuelle...
{
$retour['display'] .=' [ ' . $i . ' ] ';
}
else //Sinon...
{
$retour['display'] .=' <a href="' . $url . '?' . $_get_texte . $nom_var . '=' . $i . '">' . $i . '</a> ';
}
}
if ($pageActuelle==$nombreDePages) {
$retour['display'] .='<br/>Page suivante<br/>';
$retour['display'] .='Dernière page<br/>';
} else {
$retour['display'] .='<br/><a href="' . $url . '?' . $_get_texte . $nom_var . '=' . ($pageActuelle+1) . '">Page suivante</a><br/>';
$retour['display'] .='<a href="' . $url . '?' . $_get_texte . $nom_var . '=' . $nombreDePages . '">Dernière page</a><br/>';
}
$retour['display'] .='</p>';
return ($retour);
}