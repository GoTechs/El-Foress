<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title>{{__('layout.name_app')}} -  {{__('layout.description_page')}} </title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
    
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('css/fonts/line-icons/line-icons.css')}}" type="text/css">

</head>
<body data-ng-controller="poste-controller">
  <!-- Header Section Start -->
  <div class="header">
    <nav class="navbar navbar-default main-navigation" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- Stat Toggle Nav Link For Mobiles -->
           <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <!-- End Toggle Nav Link For Mobiles -->
           <a class="navbar-brand logo" href="/"><img alt="" src="{{asset('img/Capture.PNG')}}"></a>
        </div><!-- brand and toggle menu for mobile End -->
        <!-- Navbar Start -->
        <div class="collapse navbar-collapse" id="navbar">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="/my-ads"><i class="fa fa-home"></i> {{__('layout.index_menu')}}</a>
            </li>
            <li>
                <a href="/logout"><i class="fa fa-sign-out"></i> {{__('layout.logout_button')}}</a>
            </li>
          </ul>
        </div><!-- Navbar End -->
      </div>
    </nav>
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
                  <div class="form-group">
                    <select class="form-control"  id="categorie" name="categorie">
                      <option value="">Catégories</option>
                          @foreach ($categorie as $key => $value)    
                            <option @if(old('categorie') == $value->idCat) {{ 'selected' }} @endif value="{{$value->idCat}}">{{ $value->categories }}</option>
                          @endforeach
                    </select>
                  </div>                 
              </div>
            </div>

            <div class="form-group sub_cat">
              <label class="control-label" for="textarea">Sous Catégories</label> 
              <select class="form-control" id="sousCat" name="sousCat" onchange="field()">
                 <option value="">Sous Catégories</option>
              </select>
            </div>
          </div>
          <input type="hidden" id="id_subcat" value="{{old('sousCat')}}">  
          <div class="mb30"></div>
          <div class="box">
           <div class="form-group mb30 {{ $errors->has('Adtitle') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Titre de l'annonce</label>
                  <input class="form-control input-md" name="Adtitle" placeholder="Écrivez un titre approprié pour votre annonce" type="text" value="{{old('Adtitle')}}">
              </div>
              <div class="form-group state">
                <label class="control-label" for="textarea">État</label> 
                <select class="form-control" name="etat">
                    <option value="">Sélectionner</option>
                    <option {{ old('etat') == 'Produit neuf jamais utilisé' ? 'selected' : ''}}>Produit neuf jamais utilisé</option>
                    <option {{ old('etat') == 'État neuf (Sous emballage)' ? 'selected' : ''}}>État neuf (Sous emballage)</option>
                    <option {{ old('etat') == 'État moyen' ? 'selected' : ''}}>État moyen</option>
                </select>
              </div>
              <div class="form-group mb30 {{ $errors->has('descrp') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Description</label> <textarea class="form-control" rows="5" name="descrp" id="descrp">{{old('descrp')}}</textarea>
              </div>
          </div> 

 <!-- *************************************** VEHICULES ************************************** -->
            
          <div class="mb30"></div>
          <div class="box details" id="vehicule">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <div class="checkbox">
                @if (old('vente') == 'selling')
                    <label><input type="radio" name="vente" value="selling" checked> Je vends </label><br>
                    <label><input type="radio" name="vente" value="searching"> Je recherche </label>
                @elseif (old('vente') == 'searching')
                    <label><input type="radio" name="vente" value="selling"> Je vends </label><br>
                    <label><input type="radio" name="vente" value="searching" checked> Je recherche </label>
                @else 
                    <label><input type="radio" name="vente" value="selling"> Je vends </label><br>
                    <label><input type="radio" name="vente" value="searching"> Je recherche </label>
                @endif
              </div>
          </div>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueVeh">
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
            <select class="form-control" name="marquePhone">
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
            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modelePhone" type="text" value="{{old('modelePhone')}}">
          </div>
          </div>
            
<!-- ************************************** STOCKAGE ******************************************* -->
            
          <div class="mb30"></div>
          <div class="box details" id="stockage">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Type</label>
            <select class="form-control" name="typeStockage">
              <option value="">Sélectionner</option>
              <option {{old('typeStockage')== 'Flash disque' ? 'selected' : ''}}>Flash disque</option>
              <option {{old('typeStockage')== 'Disque dur externe' ? 'selected' : ''}}>Disque dur externe</option>
              <option {{old('typeStockage')== 'Disque dur interne' ? 'selected' : ''}}>Disque dur interne</option>
              <option {{old('typeStockage')== 'Carte mémoire' ? 'selected' : ''}}>Carte mémoire</option>
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

<!-- *************************************** EVENEMENT **************************************** -->

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
            
<!-- ******************************** ORDINATEURS ******************************************* -->
            
          <div class="mb30"></div>    
          <div class="box details" id="ordinateurs">
          <h2 class="title-2">Détails de l'annonce</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Marque</label>
            <select class="form-control" name="marqueOrd">
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
            <select class="form-control" name="tailleOrd">
              <option value="">Sélectionner</option>
              <option {{old('tailleOrd')== '14 po ou moins' ? 'selected' : ''}}>14 po ou moins</option>
              <option {{old('tailleOrd')== '15 po' ? 'selected' : ''}}>15 po</option>
              <option {{old('tailleOrd')== '16 po' ? 'selected' : ''}}>16 po</option>
              <option {{old('tailleOrd')== '17 po ou plus' ? 'selected' : ''}}>17 po ou plus</option>
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

<!-- ******************************** Offres d'emploi ****************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="offresEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineOffre">
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

 <!-- ******************************* Demandes d'emploi ************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="demandesEmploi">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <div class="checkbox">
                        @if (old('sexe') == 'Femme')
                            <label><input type="radio" value="Femme" name="sexe" checked> Femme </label><br>
                            <label><input type="radio" value="Homme" name="sexe"> Homme </label>
                        @elseif (old('sexe') == 'Homme')
                            <label><input type="radio" value="Femme" name="sexe"> Femme </label><br>
                            <label><input type="radio" value="Homme" name="sexe" checked> Homme </label>
                        @else
                            <label><input type="radio" value="Femme" name="sexe"> Femme </label><br>
                            <label><input type="radio" value="Homme" name="sexe"> Homme </label>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label" for="textarea">Domaine d'emploi</label>
                    <select class="form-control" name="domaineDemande">
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

<!-- *********************************** Immobilier ***************************************** -->

            <div class="mb30"></div>
            <div class="box details" id="immobilier">
                <h2 class="title-2">Détails de l'annonce</h2>
                <div class="form-group">
                    <label class="control-label" for="textarea">Type du Bien</label>
                    <select class="form-control" name="typeBien">
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

<!-- *************************************** INFO COMMUNE ************************************** -->
      
          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Prix</h2>
          <div class="form-group">
            <label class="control-label" for="textarea">Prix</label>
              <input class="form-control" placeholder="Prix en DA" name="prix" type="text" value="{{old('prix')}}">
          </div>
          </div>

          <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Emplacement</h2>
          <div class="form-group {{ $errors->has('wilaya') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">Wilaya</label>
              <input class="form-control dropdown-product selectpicker" name="wilaya" id="wilaya" placeholder="Wilaya" value="{{old('wilaya')}}">
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
              <input class="form-control" placeholder="Votre numéro de téléphone" name="phone" type="text" value="{{old('phone')}}">
            <div class="checkbox">
              <label>
                @if (old('phoneHide') == '0')
                  <input type="hidden" name="phoneHide" value="0" />
                  <input type="checkbox" value="1" name="phoneHide"> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
                @elseif (old('phoneHide') == '1')
                  <input type="hidden" name="phoneHide" value="0" />
                  <input type="checkbox" value="1" name="phoneHide" checked> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
                @else
                  <input type="hidden" name="phoneHide" value="0" />
                  <input type="checkbox" value="1" name="phoneHide"> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
                @endif
            </div>
            </div>
          </div>
         <div class="mb30"></div>
          <div class="box">
          <h2 class="title-2">Média</h2>
          <div class="form-group {{ $errors->has('fileToUpload') ? ' has-error' : '' }} has-feedback">
            <label class="control-label" for="textarea">Ajoutez des photos pour attirer l'attention sur votre annonce</label>
              <input class="form-control" name="fileToUpload[]" type="file" multiple> <br>
          </div>
          </div>
          <div class="mb30"></div>
          <div class="form-group">
            <div class="page-ads box">
              <div class="checkbox {{ $errors->has('condition') ? ' has-error' : '' }} has-feedback">
                <label>
                  @if (old('condition') == 'on')
                    <input type="checkbox" name="condition" checked> En affichant cette annonce, vous acceptez nos <a href="">Conditions d’utilisation</a>
                  @else 
                    <input type="checkbox" name="condition"> En affichant cette annonce, vous acceptez nos <a href="">Conditions d’utilisation</a>
                  @endif
                </label>
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
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">Foress</h3>
                        <ul class="menu">
                         <li><a href="/a-propos">À propos de nous</a></li>
                         <li><a href="/">Avantages de l’inscription</a></li>
                         <li><a href="/">Publicité sur Foress</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
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
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">{{__('layout.recently_add')}}</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                    <img alt="" src="{{asset('img/nondisponible.jpg')}}">
                                    <div class="hover">
                                        <a href="/details/{{$recent->id}}"><i class="fa fa-eye views"> {{ $recent->numberViews}}</i></a>
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
            <div class="row">
                <div class="col-md-12">
                <p> ©2014-2019 GoTechs</p><br/>
                <p>Tous droits réservés. Google, Google Play, You Tube et autres marques sont des marques déposées de Google Inc.</p>
                    </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

</footer>
    	<!-- Footer Area Start -->
    	<section class="footer-Content">
    		<div class="container">
    			<div class="row">
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
              <div class="widget">
                <h3 class="block-title">{{__('layout.description_title_footer')}} <span style="color:#3188c2;">{{__('layout.name_app')}}</span></h3>
                <div class="textwidget">
                  <p>{{__('layout.description_text_footer')}}</p>
                </div>
              </div>
            </div>
    				<div class="col-md-3 col-sm-6 col-xs-12 wow fadeIn">
    					<div class="widget">
    						<h3 class="block-title">{{__('layout.title_menu')}}</h3>
  							<ul class="menu">
                     <li><a href="/a-propos">À propos de nous</a></li>
                     <li><a href="/">Avantages de l’inscription</a></li>
                    <li><a href="/">Publicité sur Foress</a></li>                    
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
    						<h3 class="block-title">{{__('layout.recently_add')}}</h3>
                <ul class="featured-list">
                    @foreach($recentlyAdd as $recent)
                        <li>
                            <img alt="" src="{{asset('img/nondisponible.jpg')}}">
                            <div class="hover">
                                <a href="/details/{{$recent->id}}"><i class="fa fa-eye views"> {{ $recent->numberViews}}</i></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
    					</div>
    				</div>
    			</div>
    		</div>
    	</section>
    	<!-- Footer area End -->
    </footer>
    <!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="fa fa-angle-up"></i>
    </a>
      <!-- Main JS  -->
      <script src="{{asset('js/libs.js')}}"></script>

      <script>
          
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
      
      </script>
</body>
</html>
