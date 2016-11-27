<?php
/* Smarty version 3.1.30, created on 2016-11-27 15:47:30
  from "/Users/juandavidcruzgomez/PhpstormProjects/wikiemploi/templates/home.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583af2021e6134_63795392',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2a26fdd6726d6b4dbeae5d7925e032d6932ba29' => 
    array (
      0 => '/Users/juandavidcruzgomez/PhpstormProjects/wikiemploi/templates/home.tpl',
      1 => 1480258049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583af2021e6134_63795392 (Smarty_Internal_Template $_smarty_tpl) {
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
        <!--<div id="en_tete" class="en_tete">
            <?php echo $_smarty_tpl->tpl_vars['titre']->value;?>

        </div>->
        <!-- Les menus -->
        <!-- <div id="menu" class="menu">
            <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

        </div>-->
        <!-- Le corps -->
        <div id="contenu" class="contenu">
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                            <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Wiki emploi</a>
                    </div>
                    <div class="navbar-collapse collapse">
                        <?php echo $_smarty_tpl->tpl_vars['rechercher']->value;?>

                        <?php echo $_smarty_tpl->tpl_vars['logout']->value;?>

                    </div>
                    <!--/.navbar-collapse --> </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>Welcome </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p class="text-center"><h3>Actions</h3></p>
                    <div class="list-unstyled">
                        <?php echo $_smarty_tpl->tpl_vars['menu']->value;?>

                    </div>
                </div>
                <div class="col-md-9">
                    <p class="text-center"><h3>News &amp; Events</h3></p>
                    <div style="overflow-y:auto; height:380px">
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p class="bg-success">07-03-2014, 04:00: <a href="#">User K has removed a CV</a></p>
                        <p>05-03-2014, 14:00: <a href="#">User Dupond has published a CV</a></p>
                        <p>04-03-2014, 10:00: <a href="#">User Dupond has published a cover letter</a></p>
                        <p class="bg-success">04-03-2014, 05:00: <a href="#">User H has modified a CV</a></p>
                        <p>03-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>02-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>01-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                        <p>07-03-2014, 05:00: <a href="#">User Pepe has published a CV</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
</html>
<?php }
}
