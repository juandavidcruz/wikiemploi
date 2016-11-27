<?php
// fonction qui retourne un nom de fichier safe en supprimant certains caractères non autorisés
function filename_safe($name) {
	$except = array('\\', '/', ':', '*', '?', '"', '<', '>', '|');
	$name_modif=str_replace($except, '', $name);
	if ($name==$name_modif) {
	return $name;
	} else {
	return $name_modif;
	}
}

// fonction d'upload de fichier
function upload($index,$destination,$maxsize=FALSE,$extensions=FALSE) {
	//Test1: fichier correctement uploadé
	if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
	//Test2: taille limite
	if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
	//Test3: extension
	$ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
	if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
	//Déplacement
	return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}

/* fonction d'upload d'une image avec création d'une miniature
* @nom_champ: le nom du champ de formulaire dans lequel les informations sur l'image à uploadée se trouve
* @directory: le répertoire de base, à partir de la racine du site
* @nom_fichier: permet de nomer le fichier uploadé, sans l'extention. Si un fichier possède le même nom que celui choisi, il sera écrasé. Si le nom est vide, le fichier sera créé en utilisant $_FILE et le fichier ne sera pas écrasé s'il a le même nom qu'un autre fichier
* @image_directory: le sous-répertoire dans lequel sera placé l'image uploadée
* @create_thumb: si true, cré une miniature. Si false, ne la cré pas.
* @ratio: le ratio de conversion pour la miniature
* @thumb_directory: le sous_répertoire dans lequel créer la miniature
*/
function upload_image($nom_champ='txt_image', $directory='.', $nom_fichier=NULL, $image_directory='.', $create_thumb=false, $ratio=150, $thumb_directory='.') {
	global $parent_back;
	$directory=(substr($directory, -1, 1)=='/') ? $directory : $directory . '/';
	$image_directory=(substr($image_directory, -1, 1)=='/') ? $image_directory : $image_directory . '/';
	$thumb_directory=(substr($thumb_directory, -1, 1)=='/') ? $thumb_directory : $thumb_directory . '/';
	$image='';
	$miniature='';
	$erreurs='';
	if ($_FILES[$nom_champ]['name']!="") {
		$tableau = @getimagesize($_FILES[$nom_champ]['tmp_name']);
		if ($tableau == FALSE) {
			// si le fichier uploadé n'est pas une image, on efface le fichier uploadé et on affiche un petit message d'erreur
			unlink($_FILES[$nom_champ]['tmp_name']);
			$erreurs='Votre fichier n\'est pas une image.';
		} else {
			// on teste le type de notre image : jpeg ou png
			if ($tableau[2] == 2 || $tableau[2] == 3) {
				if (!isset($nom_fichier) || $nom_fichier=='') {
					// si on a déjà un fichier qui porte le même nom que le fichier que l'on tente d'uploader, on modifie le nom du fichier que l'on upload
					$nom_fichier = $_FILES[$nom_champ]['name'];
					$k='_';
					while (is_file($parent_back . $directory . $image_directory . $nom_fichier)) {
						$nom_fichier = $k . $_FILES[$nom_champ]['name'];
						$k.='_';
					}
				} else {
					$nom_fichier=$nom_fichier . '.' . substr(strrchr($_FILES[$nom_champ]['name'],'.'),1);
				}
				if (!is_dir($parent_back . $directory)) {
					mkdir($parent_back . $directory, 0704);
				}
				if ((!is_dir($parent_back . $directory . $image_directory)) && $image_directory!='..') {
					mkdir($parent_back . $directory . $image_directory, 0704);
				}
				if (upload($nom_champ, $parent_back . $directory . $image_directory . $nom_fichier, false, array('jpg', 'jpeg', 'png'))) {
					$image=$directory . $image_directory . $nom_fichier;
					// il nous reste maintenant à générer la miniature
					if ($create_thumb==true) {
						// si le chemin de l'image est le même que celui des miniatures etc
						$thumb_name=($image_directory!=$thumb_directory xor $thumb_directory=='.') ? $nom_fichier : '_t_' . $nom_fichier;
						// on vérifie le répertoire
						if ((!is_dir($parent_back . $directory . $thumb_directory)) && $thumb_directory!='..') {
							mkdir($parent_back . $directory . $thumb_directory, 0704);
						}
						// on initialise le chemin de la miniature
						$miniature=$directory . $thumb_directory . $thumb_name;
						// si notre image est de type jpeg
						if ($tableau[2] == 2) {
							// on crée une image à partir de notre grande image à l'aide de la librairie GD
							$src = imagecreatefromjpeg($parent_back . $directory . $image_directory . $nom_fichier);
							// on teste si notre image est de type paysage ou portrait
							if ($tableau[0] > $tableau[1]) {
								$im = imagecreatetruecolor(round(($ratio/$tableau[1])*$tableau[0]), $ratio);
								imagecopyresampled($im, $src, 0, 0, 0, 0, round(($ratio/$tableau[1])*$tableau[0]), $ratio, $tableau[0], $tableau[1]);
							} else {
								$im = imagecreatetruecolor($ratio, round(($ratio/$tableau[0])*$tableau[1]));
								imagecopyresampled($im, $src, 0, 0, 0, 0, $ratio, round($tableau[1]*($ratio/$tableau[0])), $tableau[0], $tableau[1]);
							}
							// on copie notre fichier généré dans le répertoire des miniatures
							imagejpeg ($im, $parent_back . $directory . $thumb_directory . $thumb_name);
						} elseif ($tableau[2] == 3) {
							$src = imagecreatefrompng($parent_back . $directory . $image_directory . $nom_fichier);
							if ($tableau[0] > $tableau[1]) {
								$im = imagecreatetruecolor(round(($ratio/$tableau[1])*$tableau[0]), $ratio);
								imagecopyresampled($im, $src, 0, 0, 0, 0, round(($ratio/$tableau[1])*$tableau[0]), $ratio, $tableau[0], $tableau[1]);
							} else {
								$im = imagecreatetruecolor($ratio, round(($ratio/$tableau[0])*$tableau[1]));
								imagecopyresampled($im, $src, 0, 0, 0, 0, $ratio, round($tableau[1]*($ratio/$tableau[0])), $tableau[0], $tableau[1]);
							}
							imagepng ($im, $parent_back . $directory . $thumb_directory . $thumb_name);
						}
					}
				} else {
					// si notre image n'est pas de type jpeg ou png, on supprime le fichier uploadé et on affiche un petit message d'erreur
					unlink($_FILES[$nom_champ]['tmp_name']);
					$erreurs='Votre image est d\'un format non supporté.';
				}
			}
		}
	} else {
		$image='';
		$miniature='';
		$nom_fichier='';
	}
	$return=array();
	$return['image_path']=$image;
	$return['thumb_path']=$miniature;
	if (isset($nom_fichier)) {
		$return['file_name']=$nom_fichier;
		chmod($parent_back . $image, 0604);
	}
	if (isset($thumb_name)) {
		$return['thumb_name']=$thumb_name;
		chmod($parent_back . $miniature, 0604);
	}
	$return['errors']=$erreurs;
	return ($return);
}