
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social CV project - We have to change this title</title>
    <!-- Bootstrap -->
    {block name="css"}
    <link href="templates/styles/css/bootstrap.min.css" rel="stylesheet">
    {/block}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header"> 
        	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            	<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
            	<span class="icon-bar"></span> <span class="icon-bar"></span> 
            </button>
          	<a class="navbar-brand" href="#">Social CV project</a> 
        </div>
        <div class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form" action="login.php"
            method="post">
            <!--<?php
              if(isset($error))
              {
            ?>
              <div class="alert alert-danger">
                <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>!
              </div>
            <?php
              }
            ?>-->
            <div class="form-group"> <input placeholder="Email" class="form-control"
                name="txt_uname_email"
                type="text">
            </div>
            <div class="form-group"> <input placeholder="Password" class="form-control"
                name="txt_password"
                type="password">
            </div>
            <button type="submit" name="btn-login" class="btn btn-success">Sign in</button>
            <a href="register.php" class="btn btn-primary">Register</a> </form>
        </div>
        <!--/.navbar-collapse --> </div>
    </div>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome!</h1>
        <p>In this site you may find a group of people willing to help you in
          enhancing and polishing your CV and motivation letters. We hope you
          become also a social reviewer.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Publish your CV</h2>
          <p>Write your CV down and ask for reviews and advice! </p>
          <p>In this project it is the community that will help you to improve
            your CV from their experience and your context. </p>
          <p><a class="btn btn-default" href="publish_cv.html" role="button">Take me there &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Publish your cover letter</h2>
          <p>Publish your cover letter and ask for reviews and advice! </p>
          <p>It is your cover letter way too long? It is too short or out of
            scope? Ask the community. People in the community have experience
            and advices to help you. </p>
          <p><a class="btn btn-default" href="publish_ml.html" role="button">Take me there &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Look for examples</h2>
          <p>Don't know where to start? Take a look of examples of CVs and cover
            letters from our users!</p>
          <p><a class="btn btn-default" href="#" role="button">Let's take a look &raquo;</a></p>
        </div>
      </div>
      <hr>
      <footer>
        <p>&copy; KR, JMD, SRR, JDC 2014</p>
      </footer>
    </div>
    <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="templates/styles/js/bootstrap.min.js"></script>
    
  </body>
</html>
