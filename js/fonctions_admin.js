function liste_object_property(obj) {
	// var obj=document.getElementById("lst_jour_30");
	var props="";
	for (prop in obj) { props+= prop +  " => " +obj[prop] + "\n"; }
	alert (props);
}

function check_del(ids_id, chk_id, hidden_name) {
	document.getElementById(ids_id).value="";
	ids=document.getElementsByName(hidden_name);
	for (i=0; i<ids.length; i++) {
		if (document.getElementById(chk_id + ids[i].value).checked==true) {
			document.getElementById(ids_id).value = document.getElementById(ids_id).value + document.getElementById(hidden_name+ids[i].value).value + ';';
		}
	}
}

function heure_visibility() {
	if (document.getElementById("lst_heure").value!=-1) {
		document.getElementById("lst_minute").style.display="block";
	} else {
		document.getElementById("lst_minute").style.display="none";
	}
}

function date_visibility() {
	if (document.getElementById("lst_jour").value!=-1) {
		document.getElementById("lst_mois").style.display="block";
		document.getElementById("txt_annee").style.display="inline";
	document.getElementById("lst_heure").style.display="block";
heure_visibility()
	} else {
		document.getElementById("lst_mois").style.display="none";
		document.getElementById("txt_annee").style.display="none";
	document.getElementById("lst_heure").style.display="none";
	document.getElementById("lst_minute").style.display="none";
	}
}

Number.prototype.isBissextile=function() {
	return (new Date(this,2,0).getDate()>=29);
}

function gest_lst_jour(liste_jours, mois, annee) {
	if (liste_jours.options[0].value==-1) {
		if (mois==2) {
			liste_jours.options[30].hidden=true;
			liste_jours.options[31].hidden=true;
			if ((Number(annee)).isBissextile()) {
				liste_jours.options[29].hidden=false;
			} else {
				liste_jours.options[29].hidden=true;
			}
		} else if (mois==4 || mois==6 || mois==9 || mois==11) {
			liste_jours.options[31].hidden=true;
			liste_jours.options[29].hidden=false;
			liste_jours.options[30].hidden=false;
		} else {
			liste_jours.options[29].hidden=false;
			liste_jours.options[30].hidden=false;
			liste_jours.options[31].hidden=false;
		}
	} else {
		if (mois==2) {
			liste_jours.options[29].hidden=true;
			liste_jours.options[30].hidden=true;
			if ((Number(annee)).isBissextile()) {
				liste_jours.options[28].hidden=false;
			} else {
				liste_jours.options[28].hidden=true;
			}
		} else if (mois==4 || mois==6 || mois==9 || mois==11) {
			liste_jours.options[30].hidden=true;
			liste_jours.options[28].hidden=false;
			liste_jours.options[29].hidden=false;
		} else {
			liste_jours.options[28].hidden=false;
			liste_jours.options[29].hidden=false;
			liste_jours.options[30].hidden=false;
		}
	}
	while (liste_jours.selectedOptions[0].hidden==true) {
		liste_jours.selectedIndex=liste_jours.selectedIndex-1;
	}
}

/* fonction affichant le jour dans le contenu html d'une balise
// @annee: l'année de la date
// mois: le mois de la date
// jour: le jour de la date
// id_objet: l'id de la balise html dans laquelle sera inséré le jour de la semaine concerné par la date des trois paramètres précédents
*/
function set_jour(annee, mois, jour, id_objet) {
mois=mois-1;
var les_jours=new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
	if (jour!=-1) {
		var la_date=new Date(annee, mois, jour);
		document.getElementById(id_objet).innerHTML=les_jours[la_date.getDay()];
	} else {
		document.getElementById(id_objet).innerHTML='          ';
	}
}