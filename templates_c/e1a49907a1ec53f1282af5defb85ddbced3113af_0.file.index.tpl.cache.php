<?php
/* Smarty version 3.1.30, created on 2016-11-27 12:43:21
  from "/Users/juandavidcruzgomez/PhpstormProjects/wikiemploi/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583ac6d9b44217_72041801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1a49907a1ec53f1282af5defb85ddbced3113af' => 
    array (
      0 => '/Users/juandavidcruzgomez/PhpstormProjects/wikiemploi/templates/index.tpl',
      1 => 1480180996,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583ac6d9b44217_72041801 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1243155550583ac6d9a59568_04452697';
?>
<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
<title>Wiki emploi - Accueil</title>
<!-- Transmition des informations d'entête statiques -->
<?php echo $_smarty_tpl->tpl_vars['head_static']->value;?>

</head>
<body <?php echo $_smarty_tpl->tpl_vars['ligne_body']->value;?>

<?php echo $_smarty_tpl->tpl_vars['googleplus_like_call']->value;?>

">
<div id="superglobal">
<div id="global">
<!-- L'en-tête -->
<div id="en_tete" class="en_tete">
<?php echo $_smarty_tpl->tpl_vars['titre']->value;?>

</div>
<!-- Les menus -->
<div id="menu" class="menu">
<?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

</div>
<!-- Le corps -->
<div id="contenu" class="contenu">
<?php echo $_smarty_tpl->tpl_vars['rechercher']->value;?>

<h1>Wiki emploi - Accueil&nbsp;</h1>
<p>
Ceci est la page d'accueil du site.
<br/>
Pour naviguer au travers de ce site, veuillez utiliser le menu à gauche qui vous permettra d'accéder aux différentes informations.
<br/>
Bonne visite.
</p>
<?php echo $_smarty_tpl->tpl_vars['facebook_like']->value;?>

<br/>
<?php echo $_smarty_tpl->tpl_vars['googleplus_like']->value;?>

</div>
</div>

<!-- Le pied de page -->
<div id="pied_de_page" class="pied_de_page">
<?php echo $_smarty_tpl->tpl_vars['foot']->value;?>

</div>
</div>
<?php echo $_smarty_tpl->tpl_vars['facebook_like_head']->value;?>

<?php echo $_smarty_tpl->tpl_vars['googleplus_like_head']->value;?>

</body>
</html><?php }
}
