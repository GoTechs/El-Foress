<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>Foress -  Notre mission vous simplifier la vie </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jasny-bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jasny-bootstrap.min.css')}}" type="text/css">
    <!-- Material CSS -->

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Main Styles -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}" type="text/css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{asset('css/extras/animate.css')}}" type="text/css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('css/extras/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/extras/owl.theme.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/extras/settings.css')}}" type="text/css">
    <!-- Responsive CSS Styles -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}" type="text/css">
    <!-- Slicknav js -->
    <link rel="stylesheet" href="{{asset('css/slicknav.css')}}" type="text/css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

</head>
<body data-ng-controller="poste-controller">
  <!-- Header Section Start -->
  <div class="header">
    <nav class="navbar navbar-default main-navigation" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- Stat Toggle Nav Link For Mobiles -->
           <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <!-- End Toggle Nav Link For Mobiles -->
           <a class="navbar-brand logo" href=""><img alt="" src="{{asset('img/Capture.PNG')}}"></a>
        </div><!-- brand and toggle menu for mobile End -->
        <!-- Navbar Start -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/home"><i class="fa fa-home"></i> Accueil</a>
            </li>
            <li>
                <a href="/logout"><i class="fa fa-sign-out"></i> Déconnexion</a>
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
              <li><a href="/">Accueil</a></li>
              <li><a href="/Apropos">À Propos</a></li>
              <li><a href="/categorie">Catégorie</a></li>
              <li><a href="/contact">Contact</a></li>
              <li><a href="/faq">Faq</a></li>
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
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <strong>Whoops!</strong> Veuillez corriger les erreurs sur cette page.<br><br>
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <h2 class="title-2">Poster une annonce</h2><!-- Start Search box -->
            <div class="row search-bar mb30 red-bg">
              <div class="advanced-search">
                <form class="search-form" method="post" action="/insertAd" enctype="multipart/form-data">
                    @csrf
                  <div class="col-md-4 col-sm-12 search-col">
                    <div class="input-group-addon search-category-container">
                        <select class="form-control"  id="categorie" name="categorie">
                            <option value="">Catégories</option>
                            @foreach ($categorie as $key => $value)
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                            @endforeach
                        </select>
                 </div>
                  </div>
                 <div class="col-md-4 col-sm-12 search-col">
                    <div class="input-group-addon search-category-container">
                      <select class="form-control" id="sousCat" name="sousCat" onchange="field()">
                         <option value="">Sous Catégories</option>
                      </select>
                    </div>
                  </div>
                     <div class="col-md-4 col-sm-12 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select location-select"><span class="hidden-sm hidden-xs"> </span>
                          <input class="form-control dropdown-product selectpicker" name="wilaya" id="wilaya" placeholder="Wilaya" value="{{old('wilaya')}}">
                          </label>
                    </div>
                  </div>


              </div>
            </div><!-- End Search box -->            
              <div class="form-group mb30 {{ $errors->has('Adtitle') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Titre de l'annonce</label>
                  <input class="form-control input-md" name="Adtitle" placeholder="Écrivez un titre approprié pour votre annonce" type="text" value="{{old('Adtitle')}}">
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
              <div class="form-group mb30 {{ $errors->has('descrp') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Description</label> <textarea class="form-control" rows="5" name="descrp" id="descrp" value="{{old('descrp')}}"></textarea>
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
                <label><input type="checkbox" name="vente" value="selling"> Je vends </label><br>
                <label><input type="checkbox" name="vente" value="searching"> Je recherche </label>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label> <input class="form-control" name="marqueVeh" type="text" value="{{old('marqueVeh')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modeleVeh" type="text" value="{{old('modeleVeh')}}">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Année</label> <input class="form-control" name="anneVeh" type="text" value="{{old('anneVeh')}}">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Kilomètrage</label> <input class="form-control" name="kilomVeh" type="text" value="{{old('kilomVeh')}}">
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
            <select class="form-control" name="marquePhone">
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
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modelePhone" type="text" value="{{old('modelePhone')}}">
          </div>
          </div>
            
<!-- ********************************************* STOCKAGE ********************************************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="stockage">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Type</label>
            <select class="form-control" name="typeStockage">
                    <option value="">Sélectionner</option>
                    <option>Flash disque</option>
                    <option>Disque dur externe</option>
                    <option>Disque dur interne</option>
                    <option>Carte mémoire</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <input class="form-control" name="marqueStockage" type="text" value="{{old('marqueStockage')}}">
          </div>
          <div class="form-group">
              <label class="control-label" for="textarea">Capacité (Go)</label>
              <input class="form-control" name="capaciteStock" type="text" value="{{old('capaciteStock')}}">
          </div>
          </div>

<!-- ********************************************* EVENEMENT ********************************************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="event">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Date et heure de l'événement</label>
                    <input class="form-control" name="datetimeEvent" type="datetime-local" value="{{old('datetimeEvent')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Du</label>
                    <input class="form-control" name="du" type="date" value="{{old('du')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Au</label>
                    <input class="form-control" name="au" type="date" value="{{old('au')}}">
                </div>
            </div>
            
<!-- ********************************************* ORDINATEURS ********************************************************************** -->
            
          <div class="mb30"></div>    
          <div class="box details" id="ordinateurs">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueOrd">
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
            <select class="form-control" name="tailleOrd">
                    <option value="">Sélectionner</option>
                    <option>14 po ou moins</option>
                    <option>15 po</option>
                    <option>16 po</option>
                    <option>17 po ou plus</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Processeur</label>
            <input class="form-control" name="processeur" type="text" value="{{old('processeur')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Mémoire RAM</label>
            <input class="form-control" name="memoireRAM" type="text" value="{{old('memoireRAM')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille du disque (Go)</label>
            <input class="form-control" name="tailleDisque" type="text" value="{{old('tailleDisque')}}">
          </div>
          </div>

<!-- ********************************************* Offres d'emploi ********************************************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="offresEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineOffre">
                        <option value="">Sélectionner</option>
                        <option>Assistanat, secrétariat</option>
                        <option>Comptabilité, Finance</option>
                        <option>Banque et assurances</option>
                        <option>Juridique, Fiscal, Audit, Conseil</option>
                        <option>RH, personnel, formation</option>
                        <option>Education, Enseignement</option>
                        <option>Commercial, Technico Commercial, Service client</option>
                        <option>Marketing, Communication</option>
                        <option>Journalisme, Médias, Traduction</option>
                        <option>Informatique, Systèmes d'information, Réseaux</option>
                        <option>Chantier, Métiers BTP, Architecture</option>
                        <option>Santé, Médical, Pharmacie</option>
                        <option>Hôtellerie, Tourisme, Restauration, Loisirs</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Entreprise</label>
                    <input class="form-control" name="entreprise" type="text" value="{{old('entreprise')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Adresse</label>
                    <input class="form-control" name="adresse" type="text" value="{{old('adresse')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Poste</label>
                    <input class="form-control" name="posteOffre" type="text" value="{{old('posteOffre')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Salaire</label>
                    <input class="form-control" name="salaire" type="text" value="{{old('salaire')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Diplôme requis</label>
                    <input class="form-control" name="diplomeRequis" type="text" value="{{old('diplomeRequis')}}">
                </div>
            </div>

 <!-- ********************************************* Demandes d'emploi ********************************************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="demandesEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <div class="checkbox">
                        <label><input type="checkbox" value="Femme" name="sexe"> Femme </label><br>
                        <label><input type="checkbox" value="Homme" name="sexe"> Homme </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineDemande">
                        <option value="">Sélectionner</option>
                        <option>Assistanat, secrétariat</option>
                        <option>Comptabilité, Finance</option>
                        <option>Banque et assurances</option>
                        <option>Juridique, Fiscal, Audit, Conseil</option>
                        <option>RH, personnel, formation</option>
                        <option>Education, Enseignement</option>
                        <option>Commercial, Technico Commercial, Service client</option>
                        <option>Marketing, Communication</option>
                        <option>Journalisme, Médias, Traduction</option>
                        <option>Informatique, Systèmes d'information, Réseaux</option>
                        <option>Chantier, Métiers BTP, Architecture</option>
                        <option>Santé, Médical, Pharmacie</option>
                        <option>Hôtellerie, Tourisme, Restauration, Loisirs</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Âge</label>
                    <input class="form-control" name="age" type="text" value="{{old('age')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Poste</label>
                    <input class="form-control" name="posteDemande" type="text" value="{{old('posteDemande')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Niveau d'éducation</label>
                    <input class="form-control" name="niveauEducation" type="text" value="{{old('niveauEducation')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Diplôme</label>
                    <input class="form-control" name="diplomeDemande" type="text" value="{{old('diplomeDemande')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Année d'expérience</label>
                    <input class="form-control" name="anneExp" type="text" value="{{old('anneExp')}}">
                </div>
            </div>

<!-- ********************************************* Immobilier ********************************************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="immobilier">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Type du Bien</label>
                    <select class="form-control" name="typeBien">
                        <option value="">Sélectionner</option>
                        <option>Appartement</option>
                        <option>Studio</option>
                        <option>Villa</option>
                        <option>Local</option>
                        <option>Terrain</option>
                        <option>Carcasse</option>
                        <option>Usine</option>
                        <option>Immeuble</option>
                        <option>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Superficie</label>
                    <input class="form-control" name="superficie" type="text" placeholder="En M²" value="{{old('superficie')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Nombre de pièces</label>
                    <input class="form-control" name="nbrePiece" type="text" value="{{old('nbrePiece')}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Étage</label>
                    <input class="form-control" name="etage" type="text" value="{{old('etage')}}">
                </div>
            </div>

<!-- ********************************************* INFO COMMUNE ********************************************************************** -->
            
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Prix</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Prix</label>
              <input class="form-control" placeholder="Prix en DA" name="prix" type="number" value="{{old('prix')}}">
          </div>
          </div>
            
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Coordonnées</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">E-mail</label>
              <input class="form-control" placeholder="Votre E-mail" name="email" id="email" type="text" value="{{old('email')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Numéro de téléphone</label>
              <input class="form-control" placeholder="Votre numéro de téléphone" name="phone" type="text" value="{{old('phone')}}">
            <div class="checkbox">
              <label>
                  <input type="hidden" name="phoneHide" value="0" />
                  <input type="checkbox" value="1" name="phoneHide"> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
            </div>
            </div>
          </div>
         <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Média</h2>
          <div class="form-group {{ $errors->has('fileToUpload') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">Ajoutez des photos pour attirer l'attention sur votre annonce</label>
              <input class="form-control" name="fileToUpload[]" type="file" multiple value="{{old('fileToUpload[]')}}"> <br>
          </div>
          </div>
          <div class="mb30"></div>
          <div class="form-group">
            <div class="page-ads box">
              <div class="checkbox {{ $errors->has('Adtitle') ? ' has-error' : '' }} has-feedback">
                <label><input type="checkbox" name="condition"> En affichant cette annonce, vous acceptez nos <a href="">Conditions d’utilisation</a></label>
              </div><br>
              <button class="btn btn-common" type="submit">Poster</button>
            </div>
          </div>
        </div>
      </form>
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
                                <li><a href="/">Accueil</a></li>
                                <li><a href="/contact">Contact</a></li>
                                <li><a href="/Apropos">À Propos</a></li>
                                <li><a href="/connexion">Connexion</a></li>
                                <li><a href="/categorie">Catégories</a></li>
                                <li><a href="/inscription">Inscription</a></li>
                                <li><a href="/faq">FAQ</a></li>
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
                        <img alt="" src="{{asset('img/featured/img1.jpg')}}">
                        <div class="hover">
                            <a href="#"><span>$49</span></a>
                        </div>
                    </li>
                    <li>
                        <img alt="" src="{{asset('img/featured/img2.jpg')}}">
                        <div class="hover">
                            <a href="#"><span>$49</span></a>
                        </div>
                    </li>
                    <li>
                        <img alt="" src="{{asset('img/featured/img3.jpg')}}">
                        <div class="hover">
                            <a href="#"><span>$49</span></a>
                        </div>
                    </li>
                    <li>
                        <img alt="" src="{{asset('img/featured/img4.jpg')}}">
                        <div class="hover">
                            <a href="#"><span>$49</span></a>
                        </div>
                    </li>
                    <li>
                        <img alt="" src="{{asset('img/featured/img5.jpg')}}">
                        <div class="hover">
                            <a href="#"><span>$49</span></a>
                        </div>
                    </li>
                    <li>
                        <img alt="" src="{{asset('img/featured/img6.jpg')}}">
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
      <script type="text/javascript" src="{{asset('js/jquery-min.js')}}"></script>
      <script src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/material.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/material-kit.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/jquery.parallax.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/wow.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/jquery.counterup.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/waypoints.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/jasny-bootstrap.min.js')}}"></script>
      <script type="text/javascript"  src="{{asset('js/bootstrap-select.min.js')}}"></script>

      <script>
          
          $(document).ready(function() {
                $('.details').hide();

            });
          
         function field(){
              
              var nameSousCat;             
              var categorie = $( "#categorie option:selected" ).text();
              
              if (categorie == "Animaux" || categorie == "Services" || categorie == "Voyages"){
                  
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
                    $('#phone, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;
                      
                case "Téléphones":
                    $('#phone, .state').show();
                    $('#vehicule, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;
                      
                case "Stockage":
                    $('#stockage, .state').show();
                    $('#vehicule, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;
                      
                case "Ordinateurs":
                    $('#ordinateurs, .state').show();
                    $('#vehicule, #stockage, #phone, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    break;

                case "Offres d'emploi":
                    $('#offresEmploi').show();
                    $('#vehicule, #stockage, #phone, .state, #ordinateurs, #demandesEmploi, #immobilier, #event').hide();
                    break;

                 case "Demandes d'emploi":
                      $('#demandesEmploi').show();
                      $('#vehicule, #stockage, #phone, .state, #ordinateurs, #offresEmploi, #immobilier, #event').hide();
                      break;

                 case "Événements":
                      $('#event').show();
                      $('#vehicule, #stockage, #phone, .state, #ordinateurs, #offresEmploi, #immobilier, #demandesEmploi').hide();
                      break;

                 case "Vente":
                 case "Cherche Achat":
                 case "Location":
                 case "Cherche Location":
                      $('#immobilier, .state').show();
                      $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #event').hide();
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

       // Load Sous catégorie from catégorir

          $('#categorie').on('change', function(e){
              var cat_id = e.target.value;
              $.get('/json-sousCategorie?idCat=' + cat_id,function(data) {
console.log(data);
                  $('#sousCat').empty();
                  $('#sousCat').append('<option value="0" disable="true" selected="true">Sous Catégories</option>');

                  $.each(data, function(index, sousCatObj){
                      $('#sousCat').append('<option value="'+ sousCatObj.idSousCat +'">'+ sousCatObj.sousCat +'</option>');
                  })
              });
          });



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
