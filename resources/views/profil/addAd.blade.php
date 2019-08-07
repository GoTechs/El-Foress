<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>Foress -  Notre mission vous simplifier la vie </title>
  <link href="assets/img/favicon.png" rel="shortcut icon"><!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="assets/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Material CSS -->
  <link href="assets/css/material-kit.css" rel="stylesheet" type="text/css"><!-- Font Awesome CSS -->
  <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- Line Icons CSS -->
  <link href="assets/fonts/line-icons/line-icons.css" rel="stylesheet" type="text/css"><!-- Line Icons CSS -->
  <link href="assets/fonts/line-icons/line-icons.css" rel="stylesheet" type="text/css"><!-- Main Styles -->
  <link href="assets/css/main.css" rel="stylesheet" type="text/css"><!-- Animate CSS -->
  <link href="assets/extras/animate.css" rel="stylesheet" type="text/css"><!-- Owl Carousel -->
  <link href="assets/extras/owl.carousel.css" rel="stylesheet" type="text/css">
  <link href="assets/extras/owl.theme.css" rel="stylesheet" type="text/css">
  <link href="assets/extras/settings.css" rel="stylesheet" type="text/css"><!-- Responsive CSS Styles -->
  <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"><!-- Bootstrap Select -->
  <link href="assets/css/bootstrap-select.min.css" rel="stylesheet"><!-- File Input -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body data-ng-controller="poste-controller">
  <!-- Header Section Start -->
  <div class="header">
    <nav class="navbar navbar-default main-navigation" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- Stat Toggle Nav Link For Mobiles -->
           <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <!-- End Toggle Nav Link For Mobiles -->
           <a class="navbar-brand logo" href="index.php"><img alt="" src="assets/img/logo.png"></a>
        </div><!-- brand and toggle menu for mobile End -->
        <!-- Navbar Start -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="connexion.php"><i class="lnr lnr-enter"></i> Connexion</a>
            </li>
            <li>
              <a href="inscription.php"><i class="lnr lnr-user"></i> Inscription</a>
            </li>
            <li class="postadd">
              <a class="btn btn-danger btn-post" href="ajouter-annonce.php"><span class="fa fa-plus-circle"></span> Poster une annonce</a>
            </li>
          </ul>
        </div><!-- Navbar End -->
      </div>
    </nav><!-- Off Canvas Navigation -->
    <div class="navmenu navmenu-default navmenu-fixed-left offcanvas">
      <!--- Off Canvas Side Menu -->
      <div class="close" data-target=".navmenu" data-toggle="offcanvas">
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
  </div><!-- Header Section End -->
  <!-- Content section Start -->
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
          <div class="page-ads box">
            <h2 class="title-2">Poster une annonce</h2><!-- Start Search box -->
            <div class="row search-bar mb30 red-bg">
              <div class="advanced-search">
                <form class="search-form" method="post" action="insertadds.php">
                  <div class="col-md-4 col-sm-12 search-col">
                    <div class="input-group-addon search-category-container">
                        <select class="form-control" onchange="loadSousCat(this.value)" id="categorie" name="categorie" required>
                            <option value="0">Catégories</option>
                            <?php
                                $selectCat = "SELECT * FROM categories";
                                $result = $conn->query($selectCat);

                                if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {
                                        echo "<option value='".$row['idCat']."'>".$row['nomCategorie']."</option>";
                                    }
                                } 
                            
                            ?>
                        </select>
                 </div>
                  </div>
                 <div class="col-md-4 col-sm-12 search-col">
                    <div class="input-group-addon search-category-container">
                      <select class="form-control" id="sousCat" name="sousCat" onchange="field()" required>
                         <option value="0">Sous Catégories</option>
                      </select>
                    </div>
                  </div>
                     <div class="col-md-4 col-sm-12 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select location-select"><span class="hidden-sm hidden-xs"> </span>
                          <input class="form-control dropdown-product selectpicker" name="wilaya" id="wilaya" placeholder="Wilaya" required>
                          </label>
                    </div>
                  </div>

                </form>
              </div>
            </div><!-- End Search box -->            
              <div class="form-group mb30">
                <label class="control-label">Titre de l'annonce</label> <input class="form-control input-md" name="Adtitle" placeholder="Écrivez un titre approprié pour votre annonce" required="" type="text">
              </div>
              <div class="form-group state">
                <label class="control-label" for="textarea">État</label> 
                <select class="form-control" name="etat">
                    <option value="">Sélectionner</option>
                    <option>Produit neuf jamais utilisé</option>
                    <option>État neuf (Sous emballage)</option>
                    <option>État moyen</option>
                </select>
              </div>
              <div class="form-group mb30">
                <label class="control-label">Description</label> <textarea class="form-control" rows="5" name="descrp" id="descrp"></textarea>
              </div>
           
            <!--<div class="content" ng-if="form.template">
             <div data-ng-include="'templates/' + form.template + '.php'"></div>
            </div>-->
          </div>
            
 <!-- ********************************************* VEHICULES ********************************************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="vehicule">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <div class="checkbox">
                <label><input type="checkbox"> Je vends </label><br>
                <label><input type="checkbox"> Je recherche </label>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label> <input class="form-control" name="marqueVeh" type="text">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modeleVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Année</label> <input class="form-control" name="anneVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Kilomètrage</label> <input class="form-control" name="kilomVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Type carburant</label>
            <select class="form-control" name="typeCarb">
                    <option value="">Sélectionner</option>
                    <option>Essence</option>
                    <option>Gas oil</option>
                    <option>GPL</option>
                    <option>Eléctrique</option>
                </select>
            </div>
          </div>
            
<!-- ********************************************* PHONE ********************************************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="phone">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marquePhone" required>
                    <option value="">Sélectionner</option>
                    <option>Apple</option>
                    <option>BlackBerry</option>
                    <option>Ericsson</option>
                    <option>Huawei</option>
                    <option>LG</option>
                    <option>Motorola</option>
                    <option>Nokia</option>
                    <option>Samsung</option>
                    <option>Sony</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" placeholder="" type="text">
          </div>
          </div>
            
<!-- ********************************************* STOCKAGE ********************************************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="stockage">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Type</label>
            <select class="form-control" name="typeStockage" required>
                    <option value="">Sélectionner</option>
                    <option>Flash disque</option>
                    <option>Disque dur externe</option>
                    <option>Disque dur interne</option>
                    <option>Carte mémoire</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <input class="form-control" name="marqueStockage" type="text">
          </div>
          </div>
            
<!-- ********************************************* ORDINATEURS ********************************************************************** -->
            
          <div class="mb30"></div>    
          <div class="box details" id="ordinateurs">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueOrd" required>
                    <option value="">Sélectionner</option>
                    <option>Acer</option>
                    <option>Apple</option>
                    <option>Asus</option>
                    <option>Dell</option>
                    <option>HP</option>
                    <option>Lenovo</option>
                    <option>Samsung</option>
                    <option>Sony</option>
                    <option>Toshiba</option>
                    <option>Autre</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille de l'écran</label>
            <select class="form-control" name="tailleOrd" required>
                    <option value="">Sélectionner</option>
                    <option>14 po ou moins</option>
                    <option>15 po</option>
                    <option>16 po</option>
                    <option>17 po ou plus</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Processeur</label>
            <input class="form-control" name="processeur" type="text">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Mémoire RAM</label>
            <input class="form-control" name="memoireRAM" type="text">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille du disque (Go)</label>
            <input class="form-control" name="tailleDisque" type="text">
          </div>
          </div>
            
<!-- ********************************************* INFO COMMUNE ********************************************************************** -->
            
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Prix</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Prix</label> <input class="form-control" placeholder="Prix en DA" name="prix" id="prix" type="text">
          </div>
          </div>
            
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Coordonnées</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">E-mail</label> <input class="form-control" placeholder="Votre E-mail" name="email" id="email" type="text">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Numéro de téléphone</label> <input class="form-control" placeholder="Votre numéro de téléphone" name="phone" id="phone" type="text">
            <div class="checkbox">
              <label><input type="checkbox"> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
            </div>
            </div>
          </div>
         <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Média</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Ajoutez des photos pour attirer l'attention sur votre annonce</label> <input class="form-control" name="fileToUpload[]" type="file" multiple> <br>
          </div>
          </div>
          <div class="mb30"></div>
          <div class="form-group">
            <div class="page-ads box">
              <div class="checkbox">
                <label><input type="checkbox"> En affichant cette annonce, vous acceptez nos <a href="">Conditions d’utilisation</a></label>
              </div><br>
              <button class="btn btn-common" type="submit">Poster</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- Content section End -->

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

  <script src="assets/js/jquery-min.js" type="text/javascript">
  </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="assets/js/bootstrap.min.js" type="text/javascript">
  </script>
  <script src="assets/js/material.min.js" type="text/javascript">
  </script>
  <script src="assets/js/material-kit.js" type="text/javascript">
  </script>
  <script src="assets/js/jquery.parallax.js" type="text/javascript">
  </script>
  <script src="assets/js/owl.carousel.min.js" type="text/javascript">
  </script>
  <script src="assets/js/wow.js" type="text/javascript">
  </script>
  <script src="assets/js/main.js" type="text/javascript">
  </script>
  <script src="assets/js/jquery.counterup.min.js" type="text/javascript">
  </script>
  <script src="assets/js/waypoints.min.js" type="text/javascript">
  </script>
  <script src="assets/js/jasny-bootstrap.min.js" type="text/javascript">
  </script>
  <script src="assets/js/form-validator.min.js" type="text/javascript">
  </script>
  <script src="assets/js/contact-form-script.js" type="text/javascript">
  </script>
  <script src="assets/js/jquery.themepunch.revolution.min.js" type="text/javascript">
  </script>
  <script src="assets/js/jquery.themepunch.tools.min.js" type="text/javascript">
  </script>
  <script src="assets/js/bootstrap-select.min.js">
  </script>
  <script src="assets/js/fileinput.js">
  </script>
      <script>
          
          $(document).ready(function() {
                $('.details').hide();

            });
          
          function field(){
              
              var nameSousCat;             
              var categorie = $( "#categorie option:selected" ).text();
              
              if (categorie == "Animaux" || categorie == "Services" || categorie == "Communauté" || categorie == "Emplois" || categorie == "Voyages"){
                  
                nameSousCat = "hideState";
                  
              } else {  
                  
                nameSousCat = $( "#sousCat option:selected" ).text();
                  
              }
              
              // Récupérer le nom de la SOus Catégories pour afficher ces champs appropriés
              
              switch (nameSousCat)  {

                case "Automobiles":
                case "Camions":
                case "Remorques":
                case "Engin":
                case "Tracteurs":
                case "Motos - Scooters":
                case "Bus":
                case "Bateaux":
                    $('#vehicule, .state').show();    
                    $('#phone, #stockage, #ordinateurs').hide();    
                    break;
                      
                case "Téléphones":
                    $('#phone, .state').show();
                    $('#vehicule, #stockage, #ordinateurs').hide();
                    break;
                      
                case "Stockage":
                    $('#stockage, .state').show();
                    $('#vehicule, #phone, #ordinateurs').hide();
                    break;
                      
                case "Ordinateurs":
                    $('#ordinateurs, .state').show();
                    $('#vehicule, #stockage, #phone').hide();
                    break;
                      
                case "hideState":
                    $('.state').hide();
                    $('.details').hide();
                    break;

                default:
                      // Hiding All Elements
                      $('.details').hide();
                      $('.state').show();
                    break;
              }
              
          }
          
          function loadSousCat(enterCat){	
            var idCategorie = enterCat;
                $.ajax({ 
                    url: 'upload.php?idCategorie='+idCategorie, 
                    success: function(data){
                        var dataSplit = data.split("-%-");

                        var select = document.getElementById("sousCat");

                        $('#sousCat').empty();

                        var Option = document.createElement("OPTION");
                        newOption = document.createTextNode("Sous Catégories");

                        Option.appendChild(newOption);
                        Option.setAttribute("value","0");
                        select.insertBefore(Option,select.firstChild);

                        for(var i = 0; i < dataSplit.length; i++) {
                            
                            var spliting = dataSplit[i].split("-");
                            var IDsousCat = spliting[0];
                            var sousCat = spliting[1];
                            
                            var Option = document.createElement("OPTION");
                            newOption = document.createTextNode(sousCat);

                            Option.appendChild(newOption);
                            Option.setAttribute("value",IDsousCat);
                            select.insertBefore(Option,select.lastChild);
                        }
                    }
                });
            }
          
          
          $( function() {
            var wilaya = [
                "ADRAR","AIN DEFLA","AIN TEMOUCHENT","AL TARF","ALGER","ANNABA","B.B.ARRERIDJ","BATNA","BECHAR","BEJAIA",           "BISKRA","BLIDA","BOUIRA","BOUMERDES","CHLEF","CONSTANTINE","DJELFA","EL BAYADH","EL OUED","GHARDAIA",             "GUELMA","ILLIZI","JIJEL","KHENCHELA","LAGHOUAT","MASCARA","MEDEA","MILA","MOSTAGANEM","M’SILA","NAAMA",               "ORAN","OUARGLA","OUM ELBOUAGHI","RELIZANE","SAIDA","SETIF","SIDI BEL ABBES","SKIKDA","SOUKAHRAS",               "TAMANGHASSET","TEBESSA","TIARET","TINDOUF","TIPAZA","TISSEMSILT","TIZI.OUZOU","TLEMCEN"
            ];
            $( "#wilaya" ).autocomplete({
              source: wilaya
            });
          } );
      
      </script>
</body>
</html>
