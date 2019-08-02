<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Foress -  Notre mission vous simplifier la vie </title>

     <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">    
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jasny-bootstrap.min.css" type="text/css">
    <!-- Material CSS -->
    <link rel="stylesheet" href="assets/css/material-kit.css" type="text/css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
        <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="assets/fonts/line-icons/line-icons.css" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/css/main.css" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/extras/animate.css" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="assets/extras/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="assets/extras/settings.css" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="assets/css/responsive.css" type="text/css">
        <!-- Bootstrap Select -->
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">  
    
  </head>

  <body>  
    <!-- Header Section Start -->
    <div class="header">    
      <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <!-- Stat Toggle Nav Link For Mobiles -->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <!-- End Toggle Nav Link For Mobiles -->
            <a class="navbar-brand logo" href="index.php"><img src="assets/img/logo.png" alt=""></a>
          </div>
          <!-- brand and toggle menu for mobile End -->

          <!-- Navbar Start -->
          <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
              <li class="postadd">
                <a class="btn btn-danger btn-post" href="ajouter-annonce.php"><span class="fa fa-plus-circle"></span> Poster une Annonce</a>
              </li>
            </ul>
          </div>
          <!-- Navbar End -->
        </div>
      </nav>
      <!-- Off Canvas Navigation -->
      <div class="navmenu navmenu-default navmenu-fixed-left offcanvas"> 
      <!--- Off Canvas Side Menu -->
        <div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <i class="fa fa-close"></i>
        </div>
          <h3 class="title-menu">Menu</h3>
          <ul class="nav navmenu-nav"> <!--- Menu -->
            <li><a href="index.php">Accueil</a></li>
            <li><a href="Apropos.php">À Propos</a></li>            
            <li><a href="categorie.php">Catégorie</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="faq.php">Faq</a></li>
        </ul><!--- End Menu -->
      </div> <!--- End Off Canvas Side Menu -->
      <div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms" data-toggle="offcanvas" data-target=".navmenu">
        <p><i class="fa fa-file-text-o"></i> Menu</p>
      </div>
    </div>
    <!-- Header Section End -->

    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 page-sideabr">
            <aside>
              <div class="inner-box">
                <div class="user-panel-sidebar">
                  <div class="collapse-box">
                    <h5 class="collapset-title no-border">Mon profil <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li class="active">
                          <a href="compte-accueil.php"><i class="fa fa-home"></i> username </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="collapse-box">
                    <h5 class="collapset-title">Mon compte<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
                    <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li>
                          <a href="compte-mes-annonces.php"><i class="fa fa-credit-card"></i> Mes Annonces <span class="badge">44</span></a>
                        </li>
                        <li>
                          <a href="compte-favoris.php"><i class="fa fa-heart-o"></i> Mes Favoris <span class="badge">19</span></a>
                        </li>
                        <li>
                          <a href="compte-archives.php"><i class="fa fa-folder-o"></i> Archives <span class="badge">49</span></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="collapse-box">
                    <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                      <ul class="acc-list">
                        <li>
                          <a href="deconnexion.php"><i class="fa fa-close"></i> Déconnexion</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inner-box">
                <div class="widget-title">
                  <h4>On dépose les publicité</h4>
                </div>
                <img src="assets/img/img1.jpg" alt="">
              </div>
            </aside>
          </div>
          <div class="col-sm-9 page-content">
            <div class="inner-box">
              <div class="usearadmin">
               <h3><a href="#"><img class="userimg" src="assets/img/user.jpg" alt=""> username </a></h3>
              </div>
            </div>
            <div class="inner-box">
              <div class="welcome-msg">
                <h3 class="page-sub-header2 clearfix no-padding">Bonjour username </h3>
                <span class="page-sub-header-sub small">Dernier accès au Web le: 01-03-2017 à 02:55 PM</span> 
              </div>
              <div id="accordion" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Informations personnels </a> </h4>
                  </div>
                  <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                      <form role="form">
                        <div class="form-group">
                          <label class="control-label">Nom</label>
                          <input class="form-control" placeholder="" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Prénom</label>
                          <input class="form-control" placeholder="" type="text">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Email</label>
                          <input class="form-control" placeholder="" type="email">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Adresse</label>
                          <input class="form-control" placeholder="" type="text">
                        </div>
                        <div class="form-group">
                          <label for="Phone" class="control-label">Numéro de téléphone</label>
                          <input class="form-control" id="Phone" placeholder="" type="text">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-common">Modifier</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB2" data-toggle="collapse"> Paramètres </a> </h4>
                  </div>
                  <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
                    <div class="panel-body">
                      <form role="form">
                        <div class="form-group">
                          <div class="checkbox">
                            <label><input type="checkbox">Activés les commentaires sur mes annonces </label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Nouveau mot de passe</label>
                          <input class="form-control" placeholder="" type="password">
                        </div>
                        <div class="form-group">
                          <label class="control-label">Confirmation</label>
                          <input class="form-control" placeholder="" type="password">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-common">Modifier</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB3" data-toggle="collapse"> 
                        Options de compte et de notification </a> </h4>
                  </div>
                  <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB3">
                    <div class="panel-body">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <div class="checkbox">
                            <label><input type="checkbox">Je souhaite activer les notifications par E-mail. </label>
                          </div>
                          <div class="checkbox">
                            <label><input type="checkbox">Je souhaite reçevoir des conseils sur l'achat et la vente. </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>      
    </div>

    <!-- End Content -->

    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <section class="footer-Content">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
              <div class="widget">
                <h3 class="block-title">à propos de <span style="color:#3188c2;">foress</span></h3>
                <div class="textwidget">
                  <p>Lancé en 2017, l'idée était d'offrir aux gens une opportunité qui va leur faciliter la façon dont ils vendent, achètent et échangent des articles, des véhicules, des services, de l'immobilier ou du travail.</p>
                </div>
              </div>
            </div>
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
    					<div class="widget">
    						<h3 class="block-title">Liens Utiles</h3>
  							<ul class="menu">
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="contact.php">Contact</a></li>
                  <li><a href="Apropos.php">À Propos</a></li>
                  <li><a href="connexion.php">Connexion</a></li>
                  <li><a href="categorie.php">Catégories</a></li>
                  <li><a href="inscription.php">Inscription</a></li>
                  <li><a href="faq.php">FAQ</a></li>
                </ul>
    					</div>
    				</div>
                    <div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
    					<div class="widget">
                <h3 class="block-title">DERNIERS TWEETS</h3>
                <div class="twitter-content clearfix">
                  <ul class="twitter-list">
                    <li class="clearfix">
                      <span>
                        Suivez nous sur le nouveau site d'annonce FORESS
                        <a href="#">http://t.co/cLo2w7rWOx</a>
                      </span>
                    </li>
                    <li class="clearfix">
                      <span>
                        Cherchez, Trouvez !
                        <a href="#">http://t.co/cLo2w7rWOx</a>
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
    				</div>
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
    					<div class="widget">
    						<h3 class="block-title">récemment ajoutés</h3>
                <ul class="featured-list">
                  <li>
                    <img alt="" src="assets/img/featured/img1.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img2.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img3.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img4.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img5.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                  <li>
                    <img alt="" src="assets/img/featured/img6.jpg">
                    <div class="hover">
                      <a href="#"><span>$49</span></a>
                    </div>
                  </li>
                </ul> 						
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>
    	<!-- Footer area End -->
    	
    	<!-- Copyright Start  -->
    	<div id="copyright">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-12">    					
              <div class="bottom-social-icons social-icon pull-right">  
                <a class="facebook" target="_blank" href=""><i class="fa fa-facebook"></i></a> 
                <a class="twitter" target="_blank" href=""><i class="fa fa-twitter"></i></a>
                <a class="dribble" target="_blank" href=""><i class="fa fa-dribbble"></i></a>
                <a class="flickr" target="_blank" href=""><i class="fa fa-flickr"></i></a>
                <a class="youtube" target="_blank" href=""><i class="fa fa-youtube"></i></a>
                <a class="google-plus" target="_blank" href=""><i class="fa fa-google-plus"></i></a>
                <a class="linkedin" target="_blank" href=""><i class="fa fa-linkedin"></i></a>
              </div>
    				</div>
    			</div>
    		</div>
    	</div>
      <!-- Copyright End -->

    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a> 
      
    <!-- Main JS  -->
    <script type="text/javascript" src="assets/js/jquery-min.js"></script>      
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/material.min.js"></script>
    <script type="text/javascript" src="assets/js/material-kit.js"></script>
    <script type="text/javascript" src="assets/js/jquery.parallax.js"></script>
    <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="assets/js/wow.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/jquery.counterup.min.js"></script>
    <script type="text/javascript" src="assets/js/waypoints.min.js"></script>
    <script type="text/javascript" src="assets/js/jasny-bootstrap.min.js"></script>
    
  </body>
</html>