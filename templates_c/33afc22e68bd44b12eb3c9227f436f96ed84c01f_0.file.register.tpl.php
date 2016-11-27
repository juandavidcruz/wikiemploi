<?php
/* Smarty version 3.1.30, created on 2016-11-26 18:53:37
  from "/Users/juandavidcruzgomez/PhpstormProjects/wikiemploi/templates/register.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5839cc21c73f61_39589064',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33afc22e68bd44b12eb3c9227f436f96ed84c01f' => 
    array (
      0 => '/Users/juandavidcruzgomez/PhpstormProjects/wikiemploi/templates/register.tpl',
      1 => 1480182812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5839cc21c73f61_39589064 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
    <title>Register page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="templates/styles/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="templates/styles/general_template.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><?php echo '<script'; ?>
 src="../../assets/js/ie8-responsive-file-warning.js"><?php echo '</script'; ?>
><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header"> <button type="button" class="navbar-toggle"
            data-toggle="collapse"
            data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="#">Social CV</a> </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Register</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> </div>
    </div>
    <div class="container">
      <div class="starter-template">
        <h1>Welcome!</h1>
        <p class="lead">Thanks for registering on the community.<br>
          We hope you will have a nice experience with us!</p>
      </div>
      <div class="col-sm-2">&nbsp;</div>
      <form class="horizontal-form col-sm-8" role="form" action="register.php" method="post">
        <div class="form-group"> <label for="name-input" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9"> <input class="form-control" id="name-input" placeholder="Name"
                                        name="txt_firstname"
                                        type="text">
          </div>
        </div>
        <div class="form-group"> <label for="surname-input" class="col-sm-3 control-label">Given
            Name</label>
          <div class="col-sm-9"> <input class="form-control" id="surname-input"
                                        placeholder="Given Name"
                                        name="txt_lasttname"
                                        type="text">
          </div>
        </div>
        <div class="form-group"> <label for="nickname-input" class="col-sm-3 control-label">Nickame*</label>
          <div class="col-sm-9"> <input class="form-control" id="nickname-input"
                                        placeholder="Nickname"
                                        name="txt_uname"
                                        type="text">
          </div>
        </div>
        <div class="form-group"> <label for="email-input" class="col-sm-3 control-label">Email*</label>
          <div class="col-sm-9"> <input class="form-control" id="email-input" placeholder="Email"
                                        name="txt_umail"
                                        type="email">
          </div>
        </div>
        <div class="form-group"> <label for="passwd-input" class="col-sm-3 control-label">Password*</label>
          <div class="col-sm-9"> <input class="form-control" id="passwd-input"
                                        placeholder="Password"
                                        name="txt_upass"
                                        type="password">
          </div>
        </div>
        <div class="form-group"> <label for="passwdconf-input" class="col-sm-3 control-label">Password
            confirm*</label>
          <div class="col-sm-9"> <input class="form-control" id="passwdconf-input"
                                        placeholder="Password confirm"
                                        name="txt_upass_conf"
                                        type="password">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="btn-signup" class="btn btn-success">Register!</button>
          <button type="reset" class="btn btn-danger">Cancel</button>
        </div>
      </form>
      <div class="col-sm-2">&nbsp;</div>
      <hr>
      <footer>
        <p>&copy; KR, JMD, SRR, JDC 2014</p>
      </footer>
    </div>
    
    <!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/styles/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
</html>
<?php }
}
