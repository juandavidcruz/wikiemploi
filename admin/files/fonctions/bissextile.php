<?php
// vérifie qu'une année est bisextile ou non
function estbisextile($annee) {
$base=2000;
if ($annee>$base)
	while (annee>base) annee-=4;
else
	while (annee<base) annee+=4;
if ($annee==$base) return true; else return false;
}