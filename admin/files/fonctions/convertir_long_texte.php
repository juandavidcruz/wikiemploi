<?php
function retirer_html_texte($text, $html_code_name) {
	$pos_ouverture=strpos($text, '<' . $html_code_name . '>');
	if ($pos_ouverture!==false) {
		$pos_fermeture=strpos($text, '</' . $html_code_name . '>');
		$text=substr_replace($text, ' ', $pos_ouverture, ($pos_fermeture+strlen('</' . $html_code_name . '>'))-$pos_ouverture);
		retirer_html_texte($text, $html_code_name);
	}
	return($text);
}

function convertir_long_texte($chaine, $nb_chars_max=300, $delimiter="\n") {
	$retour='';
	if ($chaine!='') {
		/* $longueur_chaine=strlen($chaine);
		$chaine=addslashes($chaine);
		*/
		if ($nb_chars_max>strlen($chaine)) return ($chaine);
		$tableau=explode($delimiter, $chaine);
		$c=count($tableau);
		if ($tableau[0]!='' && $c>0) {
			$j=0;
			while ($j<=$nb_chars_max) {
				for ($i=0; $i<$c; $i++) {
					$j+=strlen($tableau[$i]);
					$longueur_restante=$nb_chars_max-$j;
					if ($longueur_restante>0) {
						$retour.=$tableau[$i] . "\n";
					} else {
						if (trim(substr($tableau[$i], $longueur_restante-1, 1))=="") {
							$retour.=substr($tableau[$i], 0, $longueur_restante);
							$retour .='...';
						} else {
							$k=0;
							while (trim(substr($tableau[$i], $longueur_restante+$k, 1))!="") {
								$k++;
							}
							$retour.=substr($tableau[$i], 0, $longueur_restante+$k);
							$retour .='...';
						}
						break;
					}
				}
			}
		}
	}
	return (htmlentities($retour));
	}