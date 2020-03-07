<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta name="_token" content="{{csrf_token()}}" />
  <title>{{__('layout.name_app')}} -  {{__('layout.description_page')}} </title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{asset('img/favicon-32x32.png')}}">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">
    
</head>
<body data-ng-controller="poste-controller">
  <!-- Header Section Start -->
  <div id="loading" style="display:none;">
    <img src="{{asset('img/loading.gif')}}">
  </div> 
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
                <a class="navbar-brand logo" href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
            <!-- brand and toggle menu for mobile End -->

            <!-- Navbar Start -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/home"><i class="fa fa-user"></i> {{Auth::user()->nom}}</a></li>
                    <li class="{{ (request()->is('my-ads')) ? 'active' : '' }}" id="profile">
                          <a href="/my-ads"><i class="fa fa-credit-card" ></i> {{__('layout.my_ads_menu')}}<span class="badge"></span></a>
                        </li>
                        <li class="{{ (request()->is('favorites')) ? 'active' : '' }}" id="profile">
                          <a href="/favorites"><i class="fa fa-heart-o"></i> {{__('layout.my_favorits_menu')}} <span class="badge"></span></a>
                        </li>
                        <li class="{{ (request()->is('archives')) ? 'active' : '' }}" id="profile">
                           <a href="/archives"><i class="fa fa-folder-o"></i> {{__('layout.archives_menu')}} <span class="badge"></span></a>
                        </li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i> {{__('layout.logout_button')}}</a></li>
                    <li class="postadd">
                        <a class="btn btn-danger btn-post" href="/add-Ad"><span class="fa fa-plus-circle"></span> {{__('layout.post_button')}}</a>
                    </li>
                </ul>
            </div>
            <!-- Navbar End -->
        </div>
    </nav>
   <!-- Search wrapper Start -->
   <div id="search-row-wrapper">
      <div class="container">
        <div class="search-inner">
    <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
              <form class="search-form" method="post" action="/categorie">
                <div class="col-md-5 col-sm-12 search-col">
                    <input class="form-control keyword keyword-laptop" id="search-input" name="keyword" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}">
                    <input class="form-control keyword keyword-phone" id="search-input" name="keyword" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}" style="display:none;" onclick="showinput()">
                   
                </div>
                <div class="col-md-3 col-sm-12 search-col">
                    <input class="form-control keyword wilaya" name="wilaya" id="wilaya" placeholder="Wilaya" type="text" value="{{isset($_POST['wilaya']) ? $_POST['wilaya'] : ''}}">
                    <!-- <i class="fa fa-map-marker"></i> -->
                </div>

                <div class="col-md-3 col-sm-12 search-col search-category">
                    <div class="input-group-addon search-category-container search-container">
                        <select class="form-control selectpicker" name="categorie">
                          <option value="">Toutes les catégories</option>
                          @if (isset($_POST['categorie']))
                          @foreach ($search as $key => $value)                                
                              @if($_POST['categorie'] == $value->idCat)
                                <option value="{{$value->idCat}}" selected="">{{ $value->categories }}</option>
                              @else 
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                              @endif
                          @endforeach
                          @else
                          @foreach ($search as $key => $value)  
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                          @endforeach
                          @endif                                 
                       </select>                                    
                    </div>
                  </div>

                  @csrf
                  <div class="col-md-1 search-col">
                  <button class="btn-search"><strong id="text-search"> Recherche</strong><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Search box -->   
        </div>
      </div>
    </div>
    <!-- Search wrapper End -->
</div>
<!-- Header Section End -->
  <!-- Content section Start -->
  <section id="content">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
          <div class="page-ads box">
                  <div class="alert alert-danger" style="display:none">
                      <strong>Whoops!</strong> Veuillez corriger les erreurs sur cette page.<br><br>                      
                  </div>
             
            <h2 class="title-2">Poster une annonce</h2><!-- Start Search box -->
            <div class="row search-bar mb30 red-bg">            
              <div class="advanced-search">                
                <form class="search-form" enctype="multipart/form-data" method="post" action="javascript:void(0)" id="contact_us">
                    @csrf
                  <div class="form-group">
                    <select class="form-control" id="categorie" name="categorie">
                      <option value="">Catégories</option>
                          @foreach ($categorie as $key => $value)    
                            <option @if(old('categorie') == $value->idCat) {{ 'selected' }} @endif value="{{$value->idCat}}">{{ $value->categories }}</option>
                          @endforeach
                    </select>
                  </div>                 
              </div>
            </div>

            <div class="form-group sub_cat">
              <label class="control-label" for="textarea">Sous Catégories <span class="required">*</span></label> 
              <select class="form-control" id="sousCat" name="sousCat" onchange="field()">
                 <option value="">Sous Catégories</option>
              </select>
            </div>
          </div>
          <input type="hidden" id="id_subcat" value="{{old('sousCat')}}">  
          <div class="mb30"></div>
          <div class="box">
           <div class="form-group mb30 {{ $errors->has('Adtitle') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Titre de l'annonce <span class="required">*</span></label>
                  <input class="form-control input-md" name="Adtitle" id="Adtitle" placeholder="Écrivez un titre approprié pour votre annonce" type="text" value="{{old('Adtitle')}}">
              </div>
              <div class="form-group state">
                <label class="control-label" for="textarea">État</label> 
                <select class="form-control" name="etat" id="etat">
                    <option value="">Sélectionner</option>
                    <option {{ old('etat') == 'Produit neuf jamais utilisé' ? 'selected' : ''}}>Produit neuf jamais utilisé</option>
                    <option {{ old('etat') == 'État neuf (Sous emballage)' ? 'selected' : ''}}>État neuf (Sous emballage)</option>
                    <option {{ old('etat') == 'État moyen' ? 'selected' : ''}}>État moyen</option>
                </select>
              </div>
              <div class="form-group mb30 {{ $errors->has('descrp') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Description <span class="required">*</span></label> <textarea class="form-control" rows="5" name="descrp" id="descrp">{{old('descrp')}}</textarea>
              </div>
          </div> 

 <!-- *************************************** VEHICULES ************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="vehicule">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <div class="checkbox">
                    <label><input type="radio" name="vente" id="vente" value="selling"> Je vends </label><br>
                    <label><input type="radio" name="vente" id="vente1" value="searching"> Je recherche </label>
              </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueVeh" id="marqueVeh">
                <option value="">Sélectionner</option>
                <option {{ old('marqueVeh') == 'Audi' ? 'selected' : ''}}>Audi</option>
                <option {{ old('marqueVeh') == 'BMW' ? 'selected' : ''}}>BMW</option>
                <option {{ old('marqueVeh') == 'Cadillac' ? 'selected' : ''}}>Cadillac</option>
                <option {{ old('marqueVeh') == 'Chevrolet' ? 'selected' : ''}}>Chevrolet</option>
                <option {{ old('marqueVeh') == 'Citroen' ? 'selected' : ''}}>Citroen</option>
                <option {{ old('marqueVeh') == 'Dacia' ? 'selected' : ''}}>Dacia</option>
                <option {{ old('marqueVeh') == 'Honda' ? 'selected' : ''}}>Honda</option>
                <option {{ old('marqueVeh') == 'Hyundai' ? 'selected' : ''}}>Hyundai</option>
                <option {{ old('marqueVeh') == 'Isuzu' ? 'selected' : ''}}>Isuzu</option>
                <option {{ old('marqueVeh') == 'Kia' ? 'selected' : ''}}>Kia</option>
                <option {{ old('marqueVeh') == 'Seat' ? 'selected' : ''}}>Seat</option>
                <option {{ old('marqueVeh') == 'Skoda' ? 'selected' : ''}}>Skoda</option>
                <option {{ old('marqueVeh') == 'Volkswagen' ? 'selected' : ''}}>Volkswagen</option>
                <option {{ old('marqueVeh') == 'Baic' ? 'selected' : ''}}>Baic</option>
                <option {{ old('marqueVeh') == 'Nissan' ? 'selected' : ''}}>Nissan</option>
                <option {{ old('marqueVeh') == 'Peugeot' ? 'selected' : ''}}>Peugeot</option>
                <option {{ old('marqueVeh') == 'Renault' ? 'selected' : ''}}>Renault</option>
                <option {{ old('marqueVeh') == 'Toyota' ? 'selected' : ''}}>Toyota</option>
                <option {{ old('marqueVeh') == 'Autres' ? 'selected' : ''}}>Autres</option>
              </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modeleVeh" id="modeleVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Année</label> <input class="form-control" name="anneVeh" id="anneVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Kilomètrage</label> <input class="form-control" name="kilomVeh" id="kilomVeh" type="text">
            </div>
            <div class="form-group">
            <label class="control-label" for="textarea">Type carburant</label>
            <select class="form-control" name="typeCarb" id="typeCarb">
                    <option value="">Sélectionner</option>
                    <option {{ old('typeCarb') == 'Essence' ? 'selected' : ''}}>Essence</option>
                    <option {{ old('typeCarb') == 'Gas oil' ? 'selected' : ''}}>Gas oil</option>
                    <option {{ old('typeCarb') == 'GPL' ? 'selected' : ''}}>GPL</option>
                    <option {{ old('typeCarb') == 'Eléctrique' ? 'selected' : ''}}>Eléctrique</option>
                </select>
            </div>
          </div>
  
            
<!-- ************************************* PHONE ********************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="phone">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marquePhone" id="marquePhone">
                    <option value="">Sélectionner</option>
                    <option {{ old('marquePhone') == 'Apple' ? 'selected' : ''}}>Apple</option>
                    <option {{old('marquePhone')== 'BlackBerry' ? 'selected' : ''}}>BlackBerry</option>
                    <option {{ old('marquePhone') == 'Condor' ? 'selected' : ''}}>Condor</option>
                    <option {{ old('marquePhone') == 'Ericsson' ? 'selected' : ''}}>Ericsson</option>
                    <option {{ old('marquePhone') == 'Huawei' ? 'selected' : ''}}>Huawei</option>
                    <option {{ old('marquePhone') == 'LG' ? 'selected' : ''}}>LG</option>
                    <option {{ old('marquePhone') == 'Motorola' ? 'selected' : ''}}>Motorola</option>
                    <option {{ old('marquePhone') == 'Nokia' ? 'selected' : ''}}>Nokia</option>
                    <option {{ old('marquePhone') == 'Samsung' ? 'selected' : ''}}>Samsung</option>
                    <option {{ old('marquePhone') == 'Sony' ? 'selected' : ''}}>Sony</option>
                    <option {{ old('marquePhone') == 'Autres' ? 'selected' : ''}}>Autres</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modelePhone" id="modelePhone" type="text">
          </div>
          </div>
            
<!-- ************************************** STOCKAGE ******************************************* -->
            
          <div class="mb30"></div>
          <div class="box details" id="stockage">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Type</label>
            <select class="form-control" name="typeStockage" id="typeStockage">
              <option value="">Sélectionner</option>
              <option {{old('typeStockage')== 'Flash disque' ? 'selected' : ''}}>Flash disque</option>
              <option {{old('typeStockage')== 'Disque dur externe' ? 'selected' : ''}}>Disque dur externe</option>
              <option {{old('typeStockage')== 'Disque dur interne' ? 'selected' : ''}}>Disque dur interne</option>
              <option {{old('typeStockage')== 'Carte mémoire' ? 'selected' : ''}}>Carte mémoire</option>
          </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <input class="form-control" name="marqueStockage" id="marqueStockage" type="text">
          </div>
          <div class="form-group">
              <label class="control-label" for="textarea">Capacité (Go)</label>
              <input class="form-control" name="capaciteStock" id="capaciteStock" type="text">
          </div>
          </div>

<!-- *************************************** EVENEMENT **************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="event">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Date et heure de l'événement</label>
                    <input class="form-control" name="datetimeEvent" id="datetimeEvent" type="datetime-local">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Du</label>
                    <input class="form-control" name="du" id="du" type="date">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Au</label>
                    <input class="form-control" name="au" id="au" type="date">
                </div>
            </div>
            
<!-- ******************************** ORDINATEURS ******************************************* -->
            
          <div class="mb30"></div>    
          <div class="box details" id="ordinateurs">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueOrd" id="marqueOrd">
                    <option value="">Sélectionner</option>
                    <option {{old('marqueOrd')== 'Acer' ? 'selected' : ''}}>Acer</option>
                    <option {{old('marqueOrd')== 'Apple' ? 'selected' : ''}}>Apple</option>
                    <option {{old('marqueOrd')== 'Asus' ? 'selected' : ''}}>Asus</option>
                    <option {{old('marqueOrd')== 'Dell' ? 'selected' : ''}}>Dell</option>
                    <option {{old('marqueOrd')== 'HP' ? 'selected' : ''}}>HP</option>
                    <option {{old('marqueOrd')== 'Lenovo' ? 'selected' : ''}}>Lenovo</option>
                    <option {{old('marqueOrd')== 'Samsung' ? 'selected' : ''}}>Samsung</option>
                    <option {{old('marqueOrd')== 'Sony' ? 'selected' : ''}}>Sony</option>
                    <option {{old('marqueOrd')== 'Toshiba' ? 'selected' : ''}}>Toshiba</option>
                    <option {{old('marqueOrd')== 'Autre' ? 'selected' : ''}}>Autre</option>
                </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille de l'écran</label>
            <select class="form-control" name="tailleOrd" id="tailleOrd">
              <option value="">Sélectionner</option>
              <option {{old('tailleOrd')== '14 po ou moins' ? 'selected' : ''}}>14 po ou moins</option>
              <option {{old('tailleOrd')== '15 po' ? 'selected' : ''}}>15 po</option>
              <option {{old('tailleOrd')== '16 po' ? 'selected' : ''}}>16 po</option>
              <option {{old('tailleOrd')== '17 po ou plus' ? 'selected' : ''}}>17 po ou plus</option>
          </select>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Processeur</label>
            <input class="form-control" name="processeur" id="processeur" type="text" value="{{old('processeur')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Mémoire RAM</label>
            <input class="form-control" name="memoireRAM" id="memoireRAM" type="text" value="{{old('memoireRAM')}}">
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Taille du disque (Go)</label>
            <input class="form-control" name="tailleDisque" id="tailleDisque" type="text" value="{{old('tailleDisque')}}">
          </div>
          </div>

<!-- ******************************** Offres d'emploi ****************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="offresEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineOffre" id="domaineOffre">
                      <option value="">Sélectionner</option>
                        @foreach ($domaineEmploi as $domaine)
                            @if (old('domaineOffre') == $domaine->nomDomaine)
                                <option selected>{{ $domaine->nomDomaine}}</option>
                            @else
                                <option>{{ $domaine->nomDomaine }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Entreprise</label>
                    <input class="form-control" name="entreprise" id="entreprise" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Adresse</label>
                    <input class="form-control" name="adresse" id="adresse" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Poste</label>
                    <input class="form-control" name="posteOffre" id="posteOffre"  type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Salaire</label>
                    <input class="form-control" name="salaire" id="salaire" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Diplôme requis</label>
                    <input class="form-control" name="diplomeRequis" id="diplomeRequis" type="text" value="{{old('diplomeRequis')}}">
                </div>
            </div>

 <!-- ******************************* Demandes d'emploi ************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="demandesEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <div class="checkbox">
                            <label><input type="radio" value="Femme" name="sexe"> Femme </label><br>
                            <label><input type="radio" value="Homme" name="sexe"> Homme </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineDemande" id="domaineDemande">
                      <option value="">Sélectionner</option>
                        @foreach ($domaineEmploi as $domaine)
                            @if (old('domaineDemande') == $domaine->nomDomaine)
                                <option selected>{{ $domaine->nomDomaine}}</option>
                            @else
                                <option>{{ $domaine->nomDomaine }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Âge</label>
                    <input class="form-control" name="age" id="age" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Poste</label>
                    <input class="form-control" name="posteDemande" id="posteDemande" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Niveau d'éducation</label>
                    <input class="form-control" name="niveauEducation" id="niveauEducation" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Diplôme</label>
                    <input class="form-control" name="diplomeDemande" id="diplomeDemande" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Année d'expérience</label>
                    <input class="form-control" name="anneExp" id="anneExp" type="text">
                </div>
            </div>

<!-- *********************************** Immobilier ***************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="immobilier">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Type du Bien</label>
                    <select class="form-control" name="typeBien" id="typeBien">
                        <option value="">Sélectionner</option>
                        <option {{old('typeBien')== 'Appartement' ? 'selected' : ''}}>Appartement</option>
                        <option {{old('typeBien')== 'Studio' ? 'selected' : ''}}>Studio</option>
                        <option {{old('typeBien')== 'Villa' ? 'selected' : ''}}>Villa</option>
                        <option {{old('typeBien')== 'Local' ? 'selected' : ''}}>Local</option>
                        <option {{old('typeBien')== 'Terrain' ? 'selected' : ''}}>Terrain</option>
                        <option {{old('typeBien')== 'Carcasse' ? 'selected' : ''}}>Carcasse</option>
                        <option {{old('typeBien')== 'Usine' ? 'selected' : ''}}>Usine</option>
                        <option {{old('typeBien')== 'Immeuble' ? 'selected' : ''}}>Immeuble</option>
                        <option {{old('typeBien')== 'Autre' ? 'selected' : ''}}>Autre</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Superficie</label>
                    <input class="form-control" name="superficie" id="superficie" type="text" placeholder="En M²">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Nombre de pièces</label>
                    <input class="form-control" name="nbrePiece" id="nbrePiece" type="text">
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Étage</label>
                    <input class="form-control" name="etage"  id="etage" type="text">
                </div>
            </div>

<!-- *************************************** INFO COMMUNE ************************************** -->
      
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Prix</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Prix</label>
              <input class="form-control" placeholder="Prix en DA" name="prix" id="prix" type="text">
          </div>
          </div>

          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Emplacement</h2>
          <div class="form-group {{ $errors->has('wilaya') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">Wilaya <span class="required">*</span></label>
              <input class="form-control dropdown-product selectpicker" name="wilaya" id="wilaya2" placeholder="Wilaya" value="{{old('wilaya')}}">
          </div>
          </div>
            
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Coordonnées</h2>
          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">E-mail</label>
              <input class="form-control" placeholder="Votre E-mail" name="email" id="email" type="text" value="{{old('email')}}">
          </div>
          <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">Numéro de téléphone</label>
              <input class="form-control" placeholder="Votre numéro de téléphone" name="phone" id="phone2" type="text">
            <div class="checkbox">
              <label>
                  <input type="hidden" name="phoneHide" id="phoneHide" value="0" />
                  <input type="checkbox" value="1" name="phoneHide" id="phoneHide1"> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
            </div>
            </div>
          </div>
         <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Média</h2>
          <div class="form-group has-feedback">            
          <label class="control-label" >Ajoutez des photos pour attirer l'attention sur votre annonce</label>
            <input class="pro-image" name="fileToUpload[]" type="file" multiple accept="image/png,image/gif,image/jpeg, image/jpg, image/dvg"/> <br>          
          </div>
          <div class="preview-images-zone">
            <div class="preview-image preview-show-1" onClick="$('.pro-image').click()">
                <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>
            </div>
          </div>
          </div>
          <div class="mb30"></div>
          <div class="form-group">
            <div class="page-ads box">
              <div class="checkbox {{ $errors->has('condition') ? ' has-error' : '' }} has-feedback">
                <label>
                    <input type="checkbox" name="condition">  En affichant cette annonce, vous acceptez nos <a onclick="acceptCondition()">Conditions d’utilisation</a>
                </label>
              </div><br>
              <button class="btn btn-common" type="submit" id="submit">Poster</button>
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
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                         <div class="widget">
                        <h3 class="block-title">Foress</h3>
                        <ul class="menu">
                         <li><a href="/contact">{{__('layout.contact_menu')}}</a></li>
                         <li><a href="/centre-aide/avantages-de-l-inscription">Avantages de l’inscription</a></li>
                         <li><a href="/centre-aide/publicite-sur-foress">Publicité sur Foress</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                    <h3 class="block-title"> RENSEIGNEMENTS</h3>
                       
                            <ul class="menu">
                            <li><a href="/centre-aide/conditions-d-utilisation">Conditions d’utilisation</a></li>
                            <li><a href="/centre-aide/politique-de-confidentialite">Politique de confidentialité</a></li>
                            <li><a href="/centre-aide/regles-d-affichage">Règles d’affichage</a></li> 
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">{{__('layout.recently_add')}}</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                @if ($recent->hasPicture == '1')
                                    @foreach ($imageAd as $img)
                                        @if ($recent->id == $img->id_annonce)
                                            <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                                        @endif
                                    @endforeach
                                  @else 
                                    <img src="{{asset('img/nopicture.png')}}" alt=""></a>
                                  @endif                                   
                                    <div class="hover">
                                    @foreach ($search as $cat)
                                        @if ($cat->idCat == $recent->id_Cat)  
                                            <a href="/details/{{$recent->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $recent->titre)}}/{{str_replace(' ', '-', $recent->wilaya)}}"><i class="fa fa-eye views"> {{ $recent->numberViews}}</i></a>
                                        @endif
                                    @endforeach
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="bottom-social-icons social-icon ">
                            <a class="facebook" target="_blank" href="https://www.facebook.com/Foress-111899207061171/?__tn__=%2Cd%2CP-R&eid=ARASPotcXhYJOJ-wvJjPnuBDvDZC9CphhqUNtRhQComsB1AHbq0T-NPd6fFC6FeEArdE9mewa5dmrfc_1"><i class="fa fa-facebook"></i></a>
                            <a class="instagram" target="_blank" href="https://www.instagram.com/foress_dz/?hl=fr-ca"><i class="fa fa-instagram"></i></a>
                            <a class="youtube" target="_blank" href="https://www.youtube.com/channel/UCuvPoCDLC9ido1GDafDexiQ?fbclid=IwAR3_lUl-W8JX107T3RQF-U4lw5_n1QDRxQd_W6ZX1ng5XxsJVBhHgsRmrQg"><i class="fa fa-youtube"></i></a>    
                            <a class="linkedin" target="_blank" href="https://www.linkedin.com/company/foress-dz"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12 copyright">
                  <p> ©2014-2019 GoTechs</p><br/>
                  <p>Tous droits réservés. Google, Google Play, You Tube et autres marques sont des marques déposées de Google Inc.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer area End -->

</footer>

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>
      <!-- Main JS  -->
      <script src="{{asset('js/libs.js')}}"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

      <script>

          // $(window).load(function(){
          //         $('#loading').fadeOut("slow");
          //     });

          function showinput() {
              $('.wilaya, .btn-search').show();
          }
          
          $(document).ready(function() {

                var categorie = $( "#categorie option:selected" ).text();

                if (categorie != 'Catégories'){
                  var cat_id = $( "#categorie option:selected" ).val();
                  var subcat_id = $('#id_subcat').val();

                  $.get('/json-sousCategorie?idCat=' + cat_id,function(data) {

                      $('#sousCat').empty();
                      $('#sousCat').append('<option value="" disable="true" selected="true">Sous Catégories</option>');

                      $.each(data, function(index, sousCatObj){
                        if (subcat_id != ''){
                          if (subcat_id == sousCatObj.idSousCat ){
                            $('#sousCat').append('<option selected value="'+ sousCatObj.idSousCat +'">'+ sousCatObj.sousCat +'</option>');
                          } else {
                            $('#sousCat').append('<option value="'+ sousCatObj.idSousCat +'">'+ sousCatObj.sousCat +'</option>');
                          }

                          } else {
                            $('#sousCat').append('<option value="'+ sousCatObj.idSousCat +'">'+ sousCatObj.sousCat +'</option>');
                          }
                      })

                      $('.sub_cat').show();
                      var nameSousCat = $( "#sousCat option:selected" ).text();
                switch (nameSousCat)  {

                case "Automobiles":
                case "Camions":
                case "Remorques":
                case "Engin":
                case "Tracteurs":
                case "Motos - Scooters":
                case "Bus":
                case "Bateaux":
                    $('#vehicule').show();    
                    $('#phone, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    $('.state').hide();
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
                    $('#vehicule, #stockage, #phone, #ordinateurs, #demandesEmploi, #immobilier, #event').hide();
                    $('.state').hide();
                    break;

                 case "Demandes d'emploi":
                      $('#demandesEmploi').show();
                      $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #event').hide();
                      $('.state').hide();
                      break;

                 case "Événements":
                      $('#event').show();
                      $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #demandesEmploi').hide();
                      $('.state').hide();
                      break;

                 case "Vente":
                 case "Cherche Achat":
                 case "Location":
                 case "Cherche Location":
                      $('#immobilier').show();
                      $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #event').hide();
                      $('.state').hide();
                      break;


                case "hideState":
                    $('.state').hide();
                    $('.details').hide();
                    break;

                default:
                      // Hiding All Elements
                      $('.details').hide();
                      $('.state').hide();
                    break;
              }

                  });

                } else {
                    $('.details, .sub_cat').hide();
                    $('.state').hide();
                  }
         

            });

         function acceptCondition(){
          swal("Conditions d'utilisation", "Nos services sont entièrement gratuits et réservés aux personnes juridiquement capables de souscrire des contrats en droit algérien. Nos services ne sont pas disponibles pour les mineurs de moins de 18 ans. Si vous ne remplissez pas ces conditions, vous ne devez pas utiliser nos services.");
         }   
          
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
                    $('#vehicule').show();    
                    $('#phone, #stockage, #ordinateurs, #offresEmploi, #demandesEmploi, #immobilier, #event').hide();
                    $('.state').hide();   
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
                      $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #immobilier, #demandesEmploi').hide();
                      $('.state').hide();
                      break;

                 case "Vente":
                 case "Cherche Achat":
                 case "Location":
                 case "Cherche Location":
                      $('#immobilier').show();
                      $('#vehicule, #stockage, #phone, #ordinateurs, #offresEmploi, #demandesEmploi, #event').hide();
                      $('.state').hide();
                      break;


                case "hideState":
                    $('.state').hide();
                    $('.details').hide();
                    break;

                default:
                      // Hiding All Elements
                      $('.details').hide();
                      $('.state').hide();
                    break;
              }

          }

       // Load Sous catégorie from catégorie

          $('#categorie').on('change', function(e){
              var cat_id = e.target.value;
              $.get('/json-sousCategorie?idCat=' + cat_id,function(data) {

                  $('#sousCat').empty();
                  $('#sousCat').append('<option value="" disable="true" selected="true">Sous Catégories</option>');

                  $.each(data, function(index, sousCatObj){
                      $('#sousCat').append('<option value="'+ sousCatObj.idSousCat +'">'+ sousCatObj.sousCat +'</option>');
                  })
                  $('.sub_cat').show();
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


          $(document).ready(function() {
            document.querySelector('.pro-image').addEventListener('change', readImage, false);
          
            $( ".preview-images-zone" ).sortable();
            
            $(document).on('click', '.image-cancel', function() {

                let no = $(this).data('no');
                $(".preview-image.preview-show-"+no).remove();
            });
        });


        var num = 2;
        function readImage() {
        var element = $(".preview-images-zone");
            if (window.File && window.FileList && window.FileReader) {
                var files = event.target.files; //FileList object
                var output = $(".preview-images-zone");

                for (let i = 0; i < files.length; i++) {
        
                  if(i < 14){
                    var file = files[i];
                    if (!file.type.match('image')) continue;
                    
                    var picReader = new FileReader();
                    
                    picReader.addEventListener('load', function (event) {
                        var picFile = event.target;
                        var html =  '<div class="preview-image preview-show-' + num + '">' +
                                    '<div class="image-cancel" data-no="' + num + '">x</div>' +
                                    '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                                    '</div>';

                        output.prepend(html);
                        num = num + 1;
                    });

                    picReader.readAsDataURL(file);
                  }
                  
                }
                $("#pro-image").val('');
            } 
        }      

  // **************************   SUBMIT FORM AJAX *******************************

        $(document).ready(function(){

          
            $('#submit').click(function(e){
               e.preventDefault();
               var myForm = document.getElementById('contact_us');
                formData = new FormData(myForm);
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ url('/insertAd') }}",
                  method: 'post',
                  contentType: false,
                  processData: false,
                  data: formData,
                  beforeSend: function(){
                    // Show image container
                    $("#loading").show();
                  },
                  success: function(data){
                    if ($.isEmptyObject(data.success)){   
                      $('.alert-danger').empty();                 
                        $.each(data.errors, function(key, value){
                          $('.alert-danger').show();
                          $('.alert-danger').append('<p>'+value+'</p>');
                          $("html, body").animate({ 
                              scrollTop: 0 
                          }, "slow");
                        });  
                    } else {
                        document.location.href = "/my-ads";
                    }            
                    
                  },
                  complete:function(data){
                    // Hide image container
                    $("#loading").hide();
                  }
                    
                  });
               });
            });
      </script>
</body>
</html>
