<!DOCTYPE HTML>
<html lang="fr-FR">
<head>
    <title>Wiki emploi - Accueil</title>
    <!-- Transmition des informations d'entête statiques -->
    {$head_static}
</head>
<body {$ligne_body}
{$googleplus_like_call}
">
<div id="superglobal">
    <div id="global">
        <!-- L'en-tête -->
        <!--<div id="en_tete" class="en_tete">
            {$titre}
        </div>->
        <!-- Les menus -->
        <!--<div id="menu" class="menu">
            {$menu}
        </div>-->
        <!-- Le corps -->
        <div id="contenu" class="contenu">
            <!--{$rechercher}
            <h1>Wiki emploi - Accueil&nbsp;</h1>
            <p>
                Ceci est la page d'accueil du site.
                <br/>
                Pour naviguer au travers de ce site, veuillez utiliser le menu à gauche qui vous permettra d'accéder aux
                différentes informations.
                <br/>
                Bonne visite.
            </p>-->
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
                        <form class="navbar-form navbar-right" role="form" action="login.php"
                              method="post">
                            <div class="form-group"><input placeholder="Email" class="form-control"
                                                           name="txt_uname_email"
                                                           type="text">
                            </div>
                            <div class="form-group"><input placeholder="Password" class="form-control"
                                                           name="txt_password"
                                                           type="password">
                            </div>
                            <button type="submit" name="btn-login" class="btn btn-success">Sign in</button>
                            <a href="register.php" class="btn btn-primary">Register</a></form>
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
                <!-- Le pied de page -->
                <div id="pied_de_page" class="pied_de_page">
                    {$foot}
                </div>
                {$facebook_like_head}
                {$googleplus_like_head}
                {$facebook_like}
                <br/>
                {$googleplus_like}
            </div>
        </div>

    </div>
</div>


</body>
</html>