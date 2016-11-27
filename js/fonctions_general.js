// JavaScript Document
var uneFois=true;

function liste_object_property(obj) {
	// var obj=document.getElementById("lst_jour_30");
	var props="";
	for (prop in obj) { props+= prop +  " => " +obj[prop] + "\n"; }
	alert (props);
}

function selectComboValue(comboId, comboval) {
	comboBox=document.getElementById(comboId);
	if (comboBox) {
		for(var i=0;i<=comboBox.length-1;i=i+1) {
			var text=comboBox.options[i].value;
			if(text==comboval) {
				comboBox.selectedIndex=i;
				break;
			}
		}
	}
}

// fonction équivalente à htmlentities en php
function htmlentities(string, quote_style, charset, double_encode) {
	//  discuss at: http://phpjs.org/functions/htmlentities/
	// original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	//  revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	//  revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// improved by: nobbler
	// improved by: Jack
	// improved by: Rafal Kukawski (http://blog.kukawski.pl)
	// improved by: Dj (http://phpjs.org/functions/htmlentities:425#comment_134018)
	// bugfixed by: Onno Marsman
	// bugfixed by: Brett Zamir (http://brett-zamir.me)
	//    input by: Ratheous
	//  depends on: get_html_translation_table
	//   example 1: htmlentities('Kevin & van Zonneveld');
	//   returns 1: 'Kevin &amp; van Zonneveld'
	//   example 2: htmlentities("foo'bar","ENT_QUOTES");
	//   returns 2: 'foo&#039;bar'

	var hash_map = this.get_html_translation_table('HTML_ENTITIES', quote_style),
	symbol = '';
	string = string == null ? '' : string + '';
	if (!hash_map) {
		return false;
	}
	if (quote_style && quote_style === 'ENT_QUOTES') {
		hash_map["'"] = '&#039;';
	}
	if ( !! double_encode || double_encode == null) {
		for (symbol in hash_map) {
			if (hash_map.hasOwnProperty(symbol)) {
				string = string.split(symbol).join(hash_map[symbol]);
			}
		}
	} else {
		string = string.replace(/([\s\S]*?)(&(?:#\d+|#x[\da-f]+|[a-zA-Z][\da-z]*);|$)/g, function(ignore, text, entity) {
		for (symbol in hash_map) {
			if (hash_map.hasOwnProperty(symbol)) {
				text = text.split(symbol).join(hash_map[symbol]);
			}
		}
		return text + entity;
	});
	}
	return string;
}

// fonction renvoyant vrai si le navigateur est IE
function estIE(){
	return (navigator.appName.indexOf("Microsoft")!=-1);
}

/* fonction ajoutant une valeur à une balise SELECT
** frm : formulaire contenant la balise SELECT
** sl : l'élément SELECT à modifier
** txt : Le texte à afficher dans la liste
** vl : valeur à ajouter
*/
function ajoutOption(frm,sl,txt,vl){
	var leForm=null;
	var leSelect=null;
	if(typeof frm=="string") leForm=document.getElementById(frm); else leForm=frm;
	if(typeof sl=="string") leSelect=document.getElementById(sl); else leSelect=sl;
	if(leSelect.options[0].value!=vl){
		var opt = document.createElement("option");
		opt.text=txt;
		opt.value=vl;
		if(estIE()) leSelect.add(opt,0); else leSelect.add(opt,leSelect.options[0]);
	}
	leSelect.selectedIndex=0;
}

/* fonction renvoyant
** la référence à la feuille de styles active
*/
function chercherStyleActif(){
	var styles=new Array();
	for(var i=0;i<document.styleSheets.length;i++) {
		if(!document.styleSheets[i].disabled && document.styleSheets[i].title!='') {
			// liste_object_property(document.styleSheets[i]);
			styles[i]=document.styleSheets[i];
			return(styles[i]);
		}
	}
	return null;
}

/* fonction renvoyant une référence à une règle de style
** sh : feuille de styles
** rl : nom de la règle recherchée ( selectorText)
*/
function chercherRegleCSS(sh,rl){
	var reglesCSS=null;
	if(estIE()) reglesCSS=sh.rules; else reglesCSS=sh.cssRules;
	for(var i=0;i<reglesCSS.length;i++) {
		if (reglesCSS[i].selectorText.toUpperCase()==rl.toUpperCase()) {
			return reglesCSS[i];
		}
	}
	return null;
}

/* fonction de changement de style
** rl : règle contenant l'attribut à modifier
** it : attribut à modifier
** vl : valeur à donner à l'attribut
** u : unité pour compatibilité avec FireFox pour les attributs de mesure (px/%/em/ex)
*/
function changeRegle(rl,it,vl,u){
	var css=chercherStyleActif();
	var st=chercherRegleCSS(css,rl);
	try{st.style[it]=vl+((u)? u : "");}catch(e){st.style[it]="";}
}


function getcookie(variable) {
	if (document.cookie) {
		var moncookie=document.cookie;
		var i=moncookie.indexOf(variable);
		if (i!=-1) {
			var ideb=moncookie.indexOf("=", i)+1;
			var ifin=moncookie.indexOf(";", ideb);
			if (ifin==-1) {
				ifin=moncookie.length;
			}
			var nom=moncookie.substring(ideb, ifin);
			return nom;
		}
	}
}

function togleMenu() {
	if (document.getElementById('menu').style.visibility=="hidden" || document.getElementById('menu').style.display=="none") {
		document.getElementById('menu').style.display="block";
		document.getElementById('menu').style.visibility="visible";
		document.getElementById('menu').style.width=chercherRegleCSS(chercherStyleActif(),'#menu').style.width;
		document.getElementById('contenu').style.marginLeft=chercherRegleCSS(chercherStyleActif(),'#contenu').style.marginLeft;
		document.getElementById('en_tete').style.marginLeft=chercherRegleCSS(chercherStyleActif(),'#en_tete').style.marginLeft;
		document.getElementById('contenu').style.width=chercherRegleCSS(chercherStyleActif(),'#contenu').style.width;
		document.getElementById('en_tete').style.width=chercherRegleCSS(chercherStyleActif(),'#en_tete').style.width;
		document.getElementById('pied_de_page').style.width=chercherRegleCSS(chercherStyleActif(),'#pied_de_page').style.width;
		document.getElementById("btn_togle_menu").value="Masquer le menu";
		setcookie("h_menu","v");
	} else {
		document.getElementById('menu').style.display="none";
		document.getElementById('menu').style.visibility="hidden";
		document.getElementById('menu').style.width="0%";
		document.getElementById('contenu').style.marginLeft="0%";
		document.getElementById('en_tete').style.marginLeft="0%";
		document.getElementById('pied_de_page').style.marginLeft="0%";
		document.getElementById('contenu').style.width="100%";
		document.getElementById('en_tete').style.width="100%";
		document.getElementById('pied_de_page').style.width="100%";
		document.getElementById("btn_togle_menu").value="Montrer le menu";
		setcookie("h_menu","h");
	}
}

function togleFoot() {
	if (document.getElementById('pied_de_page').style.visibility=="hidden" || document.getElementById('pied_de_page').style.display=="none") {
		document.getElementById('pied_de_page').style.display="block";
		document.getElementById('pied_de_page').style.visibility="visible";
		document.getElementById("btn_togle_foot").value="Masquer le pied de page";
		setcookie("h_foot","v");
	} else {
		document.getElementById('pied_de_page').style.display="none";
		document.getElementById('pied_de_page').style.visibility="hidden";
		document.getElementById("btn_togle_foot").value="Montrer le pied de page";
		setcookie("h_foot","h");
	}
}

function togleElementMenu(objet) {
	div_id=objet.id;
	if (document.getElementById(div_id).style.display=="none") {
		// document.getElementById(div_id).style.visibility="visible";
		// document.getElementById(div_id).style.display="block";
		// document.getElementById(div_id).style.height="auto";
		setcookie("h_" + objet.id,"v");
	} else {
		// document.getElementById(div_id).style.visibility="hidden";
		// document.getElementById(div_id).style.display="none";
		// document.getElementById(div_id).style.height="0%";
		setcookie("h_" + objet.id,"h");
	}
	window.location.reload();
}

function setcookie(nom, valeur) {
	var exp=new Date();
	var delay=exp.getTime()+(365*(24*60*60*1000));
	exp.setTime(delay);
	document.cookie=nom + "=" + valeur + ";expires=" + exp.toGMTString() + ";path=/";
}

function chargeVisibility() {
	var cookienom=new Array("h_menu","h_foot","h_alerte_cookies");
	var lesvaleurs=new Array();
	for (var i=0; i<cookienom.length; i++) {
		if (!getcookie(cookienom[i])) {
			lesvaleurs[i]="v";
		} else {
			lesvaleurs[i]=getcookie(cookienom[i]);
		}
	}
	if (lesvaleurs[0]=="h") {
		document.getElementById('menu').style.display="none";
		document.getElementById('menu').style.visibility="hidden";
		document.getElementById('menu').style.width="0%";
		document.getElementById('contenu').style.marginLeft="0%";
		document.getElementById('en_tete').style.marginLeft="0%";
		document.getElementById('pied_de_page').style.marginLeft="0%";
		document.getElementById('contenu').style.width="100%";
		document.getElementById('en_tete').style.width="100%";
		document.getElementById('pied_de_page').style.width="100%";
		document.getElementById("btn_togle_menu").value="Montrer le menu";
		} else {
		document.getElementById('menu').style.display="block";
		document.getElementById('menu').style.visibility="visible";
		document.getElementById('menu').style.width=chercherRegleCSS(chercherStyleActif(),'#menu').style.width;
		document.getElementById('contenu').style.marginLeft=chercherRegleCSS(chercherStyleActif(),'#contenu').style.marginLeft;
		document.getElementById('en_tete').style.marginLeft=chercherRegleCSS(chercherStyleActif(),'#en_tete').style.marginLeft;
		document.getElementById('contenu').style.width=chercherRegleCSS(chercherStyleActif(),'#contenu').style.width;
		document.getElementById('en_tete').style.width=chercherRegleCSS(chercherStyleActif(),'#en_tete').style.width;
		document.getElementById('pied_de_page').style.width=chercherRegleCSS(chercherStyleActif(),'#pied_de_page').style.width;
		document.getElementById("btn_togle_menu").value="Masquer le menu";
	}
	if(lesvaleurs[1]=="h") {
		document.getElementById('pied_de_page').style.display="none";
		document.getElementById('pied_de_page').style.visibility="hidden";
		document.getElementById("btn_togle_foot").value="Montrer le pied de page";
	} else {
		document.getElementById('pied_de_page').style.display="block";
		document.getElementById('pied_de_page').style.visibility="visible";
		document.getElementById("btn_togle_foot").value="Masquer le pied de page";
	}
	if (lesvaleurs[2]=="h") {
		document.getElementById('alerte_cookies').style.display='none';
		document.getElementById('alerte_cookies').style.visibility='hidden';
	} else {
		document.getElementById('alerte_cookies').style.display='block';
		document.getElementById('alerte_cookies').style.visibility='visible';
	}
}

// fonction qui vérifie que le lien soit interne ou externe au site, retourne "false" si le lien est un lien externe
function isNewWindow(href) {
	if (href.indexOf('http://') != -1 || href.indexOf('https://') != -1) {
		var host = href.substr(href.indexOf(':')+3);
		if (host.indexOf('/') != -1) {
			host = host.substring(0, host.indexOf('/'));
		}
		if (host != window.location.host) {
			return true;
		}
	}
}

// fonction de modification du contenu des liens externes au site
function setLinks() {
	links=document.getElementsByTagName("a");
var c=links.length;
	for (i=0; i<c; i++) {
		if (isNewWindow(links[i].href)) {
			// document.getElementsByTagName("a")[i].innerHTML +=" (Page externe à ce site, s'ouvrira dans un nouvel onglet.)";
			document.getElementsByTagName("a")[i].target="_blank";
		}
	}
}

function save_tri_preferences() {
	setcookie('ordre_tri', document.getElementById('lst_ordre').value);
	setcookie('nb_elements', document.getElementById('lst_nb_elements').value);
}

function select_tri_preferences() {
	if (!getcookie('ordre_tri')) {
		selectComboValue('lst_ordre', -1);
	} else {
		selectComboValue('lst_ordre', getcookie('ordre_tri'));
	}
	if (!getcookie('nb_elements')) {
		selectComboValue('lst_nb_elements', 10);
	} else {
		selectComboValue('lst_nb_elements', getcookie('nb_elements'));
	}
}