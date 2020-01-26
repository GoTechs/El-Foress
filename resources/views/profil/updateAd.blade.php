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
                    <li><a href="/my-ads"><i class="fa fa-user"></i> {{Auth::user()->nom}}</a></li>
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
                  @csrf
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="categorie" >
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
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="wilaya" id="wilaya" placeholder="Wilaya" type="text" value="{{isset($_POST['wilaya']) ? $_POST['wilaya'] : ''}}">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}">
                    <i class="fa fa-search"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <button class="btn btn-common btn-search btn-block"><strong>Recherche</strong></button>
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
                        <h2 class="title-2">Modification</h2><!-- Start Search box -->
                        <div class="row search-bar mb30 red-bg">
                            <div class="advanced-search">
                                <form class="search-form" method="post" action="/update-AD/{{$annonce->id}}" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PATCH') }}                              

                            <div class="form-group">
                                <select class="form-control"  id="categorie" name="categorie" disabled>
                                  <option value="">Catégories</option>
                                     @foreach ($categorie as $key => $value)
                                        @if ($annonce->id_Cat == $value->idCat)
                                            <option value="{{$value->idCat}}" selected>{{ $value->categories }}</option>
                                        @else
                                            <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>                 
                        </div>
                    </div>
                    <div class="form-group sub_cat">
                      <label class="control-label" for="textarea">Sous Catégories</label> 
                      <select class="form-control" id="sousCat" name="sousCat" onchange="field()" disabled>
                         <option value="">Sous Catégories</option>
                         @foreach ($sousCategorie as $key => $value)
                            @if ($annonce->id_sous_Cat == $value->idSousCat)
                                <option value="{{$value->idSousCat}}" selected>{{ $value->sousCat }}</option>
                            @else
                                <option value="{{$value->idSousCat}}">{{ $value->sousCat }}</option>
                            @endif
                        @endforeach
                      </select>
                    </div>
                </div>
                
          <div class="mb30"></div>
          <div class="box">
           <div class="form-group mb30 {{ $errors->has('Adtitle') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Titre de l'annonce</label>
                  <input class="form-control input-md" name="Adtitle" placeholder="Écrivez un titre approprié pour votre annonce" type="text" value="{{$annonce->titre}}">
              </div>
              <div class="form-group state">
                <label class="control-label" for="textarea">État</label> 
                <select class="form-control" name="etat">
                    <option value="">Sélectionner</option>
                                @if ($annonce->etat == 'Produit neuf jamais utilisé')
                                    <option selected>Produit neuf jamais utilisé</option>
                                    <option>État neuf (Sous emballage)</option>
                                    <option>État moyen</option>
                                @elseif ($annonce->etat == 'État neuf (Sous emballage)')
                                    <option>Produit neuf jamais utilisé</option>
                                    <option selected>État neuf (Sous emballage)</option>
                                    <option>État moyen</option>
                                @elseif ($annonce->etat == 'État moyen')
                                    <option>Produit neuf jamais utilisé</option>
                                    <option>État neuf (Sous emballage)</option>
                                    <option selected>État moyen</option>
                                @endif
                </select>
              </div>
              <div class="form-group mb30 {{ $errors->has('descrp') ? ' has-error' : '' }} has-feedback">
                <label class="control-label">Description</label> <textarea class="form-control" rows="5" name="descrp" id="descrp">{{$annonce->description}}</textarea>
              </div>
          </div> 

<!-- ************************************** VEHICULES ****************************************** -->
                @if ($annonce->id_sous_Cat <> '14' and $annonce->id_Cat == '4')
                    <div class="mb30"></div>
                    <div class="box details" id="vehicule">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <div class="checkbox">
                                @if ($result->vente == 'selling')
                                    <label><input type="radio" name="vente" value="selling" checked> Je vends </label><br>
                                    <label><input type="radio" name="vente" value="searching"> Je recherche </label>
                                @else
                                    <label><input type="radio" name="vente" value="selling"> Je vends </label><br>
                                    <label><input type="radio" name="vente" value="searching" checked> Je recherche </label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Marque</label>
                            <select class="form-control" name="marqueVeh">
                                <option value="">Sélectionner</option>
                                @foreach ($marqueVeh as $marque)
                                    @if ($result->marque == $marque->marqueVeh)
                                        <option selected>{{ $marque->marqueVeh}}</option>
                                    @else
                                        <option>{{ $marque->marqueVeh }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modeleVeh" type="text" value="{{$result->modele}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Année</label> <input class="form-control" name="anneVeh" type="text" value="{{$result->annee}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Kilomètrage</label> <input class="form-control" name="kilomVeh" type="text" value="{{$result->kilometrage}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Type carburant</label>
                            <select class="form-control" name="typeCarb">
                                <option value="">Sélectionner</option>
                                @if ($result->typeCarb == 'Essence')
                                    <option selected>Essence</option>
                                    <option>Gas oil</option>
                                    <option>GPL</option>
                                    <option>Eléctrique</option>
                                @elseif ($result->typeCarb == 'Gas oil')
                                    <option>Essence</option>
                                    <option selected>Gas oil</option>
                                    <option>GPL</option>
                                    <option>Eléctrique</option>
                                @elseif ($result->typeCarb == 'GPL')
                                    <option>Essence</option>
                                    <option>Gas oil</option>
                                    <option selected>GPL</option>
                                    <option>Eléctrique</option>
                                @elseif ($result->typeCarb == 'Eléctrique')
                                    <option>Essence</option>
                                    <option>Gas oil</option>
                                    <option>GPL</option>
                                    <option selected>Eléctrique</option>
                                @endif
                            </select>
                        </div>
                    </div>

<!-- ************************************ PHONE ******************************************** -->
                @elseif ($annonce->id_sous_Cat == 16)
                    <div class="mb30"></div>
                    <div class="box details" id="phone">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Marque</label>
                            <select class="form-control" name="marquePhone">
                                <option value="">Sélectionner</option>
                                @foreach ($marquePhone as $marque)
                                    @if ($result->marque == $marque->marque)
                                        <option selected>{{ $marque->marque}}</option>
                                    @else
                                        <option>{{ $marque->marque }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Modèle</label> <input class="form-control" name="modelePhone" type="text" value="{{$result->modele}}">
                        </div>
                    </div>

<!-- **************************************** STOCKAGE ********************************* -->
                    @elseif ($annonce->id_sous_Cat == 36)
                    <div class="mb30"></div>
                    <div class="box details" id="stockage">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Type</label>
                            <select class="form-control" name="typeStockage">
                                <option value="">Sélectionner</option>
                                @if ($result->type == 'Flash disque')
                                    <option selected>Flash disque</option>
                                    <option>Disque dur externe</option>
                                    <option>Disque dur interne</option>
                                    <option>Carte mémoire</option>
                                @elseif ($result->type == 'Disque dur externe')
                                    <option>Flash disque</option>
                                    <option selected>Disque dur externe</option>
                                    <option>Disque dur interne</option>
                                    <option>Carte mémoire</option>
                                @elseif ($result->type == 'Disque dur interne')
                                    <option>Flash disque</option>
                                    <option>Disque dur externe</option>
                                    <option selected>Disque dur interne</option>
                                    <option>Carte mémoire</option>
                                @elseif ($result->type == 'Carte mémoire')
                                    <option>Flash disque</option>
                                    <option>Disque dur externe</option>
                                    <option>Disque dur interne</option>
                                    <option selected>Carte mémoire</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Marque</label>
                            <input class="form-control" name="marqueStockage" type="text" value="{{$result->marque}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Capacité (Go)</label>
                            <input class="form-control" name="capaciteStock" type="text" value="{{$result->capacite}}">
                        </div>
                    </div>

<!-- ********************************************* EVENEMENT ********************************* -->
                    @elseif ($annonce->id_sous_Cat == 2)
                    <div class="mb30"></div>
                    <div class="box details" id="event">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Date et heure de l'événement</label>
                            <input class="form-control" name="datetimeEvent" type="datetime-local" value="{{$result->dateHeureEvent}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Du</label>
                            <input class="form-control" name="du" type="date" value="{{$result->du}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Au</label>
                            <input class="form-control" name="au" type="date" value="{{$result->au}}">
                        </div>
                    </div>

<!-- **************************************** ORDINATEURS **************************************** -->
                    @elseif ($annonce->id_sous_Cat == 37)
                    <div class="mb30"></div>
                    <div class="box details" id="ordinateurs">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Marque</label>
                            <select class="form-control" name="marqueOrd">
                                <option value="">Sélectionner</option>
                                @foreach ($marqueComputer as $marque)
                                    @if ($result->marque == $marque->marque)
                                        <option selected>{{ $marque->marque}}</option>
                                    @else
                                        <option>{{ $marque->marque }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Taille de l'écran</label>
                            <select class="form-control" name="tailleOrd">
                                <option value="">Sélectionner</option>
                                @if ($result->tailleEcran == '14 po ou moins')
                                    <option selected>14 po ou moins</option>
                                    <option>15 po</option>
                                    <option>16 po</option>
                                    <option>17 po ou plus</option>
                                @elseif ($result->tailleEcran == '15 po')
                                    <option>14 po ou moins</option>
                                    <option selected>15 po</option>
                                    <option>16 po</option>
                                    <option>17 po ou plus</option>
                                @elseif ($result->tailleEcran == '16 po')
                                    <option>14 po ou moins</option>
                                    <option>15 po</option>
                                    <option selected>16 po</option>
                                    <option>17 po ou plus</option>
                                @elseif ($result->tailleEcran == '17 po ou plus')
                                    <option>14 po ou moins</option>
                                    <option>15 po</option>
                                    <option>16 po</option>
                                    <option selected>17 po ou plus</option>
                                            @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Processeur</label>
                            <input class="form-control" name="processeur" type="text" value="{{$result->processeur}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Mémoire RAM</label>
                            <input class="form-control" name="memoireRAM" type="text" value="{{$result->ram}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Taille du disque (Go)</label>
                            <input class="form-control" name="tailleDisque" type="text" value="{{$result->tailleDisque}}">
                        </div>
                    </div>

<!-- ********************************** Offres d'emploi ************************************* -->
                    @elseif ($annonce->id_sous_Cat == 53)
                    <div class="mb30"></div>
                    <div class="box details" id="offresEmploi">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Domaine d'emploi</label>
                            <select class="form-control" name="domaineOffre">
                                <option value="">Sélectionner</option>
                                @foreach ($domaineEmploi as $domaine)
                                    @if ($result->domaine == $domaine->nomDomaine)
                                        <option selected>{{ $domaine->nomDomaine}}</option>
                                    @else
                                        <option>{{ $domaine->nomDomaine }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Entreprise</label>
                            <input class="form-control" name="entreprise" type="text" value="{{$result->entreprise}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Adresse</label>
                            <input class="form-control" name="adresse" type="text" value="{{$result->adresse}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Poste</label>
                            <input class="form-control" name="posteOffre" type="text" value="{{$result->poste}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Salaire</label>
                            <input class="form-control" name="salaire" type="text" value="{{$result->salaire}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Diplôme requis</label>
                            <input class="form-control" name="diplomeRequis" type="text" value="{{$result->diplomeRequis}}">
                        </div>
                    </div>

<!-- ************************************** Demandes d'emploi ************************************ -->
                    @elseif ($annonce->id_sous_Cat == 54)
                    <div class="mb30"></div>
                    <div class="box details" id="demandesEmploi">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <div class="checkbox">
                                @if ($result->sexe == 'Femme')
                                    <label><input type="radio" value="Femme" name="sexe" checked> Femme </label><br>
                                    <label><input type="radio" value="Homme" name="sexe"> Homme </label>
                                @else
                                    <label><input type="radio" value="Femme" name="sexe"> Femme </label><br>
                                    <label><input type="radio" value="Homme" name="sexe" checked> Homme </label>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Domaine d'emploi</label>
                            <select class="form-control" name="domaineDemande">
                                <option value="">Sélectionner</option>
                                @foreach ($domaineEmploi as $domaine)
                                    @if ($result->domaine == $domaine->nomDomaine)
                                        <option selected>{{ $domaine->nomDomaine}}</option>
                                    @else
                                        <option>{{ $domaine->nomDomaine }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Âge</label>
                            <input class="form-control" name="age" type="text" value="{{$result->age}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Poste</label>
                            <input class="form-control" name="posteDemande" type="text" value="{{$result->poste}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Niveau d'éducation</label>
                            <input class="form-control" name="niveauEducation" type="text" value="{{$result->niveau}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Diplôme</label>
                            <input class="form-control" name="diplomeDemande" type="text" value="{{$result->diplome}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Année d'expérience</label>
                            <input class="form-control" name="anneExp" type="text" value="{{$result->anneExp}}">
                        </div>
                    </div>

<!-- ********************************** Immobilier ******************************************** -->
                    @elseif ($annonce->id_Cat == 3)
                    <div class="mb30"></div>
                    <div class="box details" id="immobilier">
                        <h2 class="title-2">Détails de l'annonce</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Type du Bien</label>
                            <select class="form-control" name="typeBien">
                                <option value="">Sélectionner</option>
                                @foreach ($typeBien as $type)
                                    @if ($result->typeBien == $type->typeBien)
                                        <option selected>{{ $type->typeBien}}</option>
                                    @else
                                        <option>{{ $type->typeBien }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Superficie</label>
                            <input class="form-control" name="superficie" type="text" placeholder="En M²" value="{{$result->superficie}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Nombre de pièces</label>
                            <input class="form-control" name="nbrePiece" type="text" value="{{$result->nbrePiece}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Étage</label>
                            <input class="form-control" name="etage" type="text" value="{{$result->etage}}">
                        </div>
                    </div>

<!-- *************************************** INFO COMMUNE ************************************ -->
                    @endif
                    <div class="mb30"></div>
                    <div class="box">
                        <h2 class="title-2">Prix</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Prix</label>
                            <input class="form-control" placeholder="Prix en DA" name="prix" type="number" value="{{$annonce->prix}}">
                        </div>
                    </div>

                    <div class="mb30"></div>
                      <div class="box">
                      <h2 class="title-2">Emplacement</h2>
                      <div class="form-group {{ $errors->has('wilaya') ? ' has-error' : '' }} has-feedback">
                        <label class="control-label" for="textarea">Wilaya</label>
                          <input class="form-control dropdown-product selectpicker" name="wilaya" id="wilaya" placeholder="Wilaya" value="{{$annonce->wilaya}}">
                      </div>
                      </div>

                    <div class="mb30"></div>
                    <div class="box">
                        <h2 class="title-2">Coordonnées</h2>
                        <div class="form-group">
                            <label class="control-label" for="textarea">E-mail</label>
                            <input class="form-control" placeholder="Votre E-mail" name="email" id="email" type="text" value="{{$annonce->email}}">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="textarea">Numéro de téléphone</label>
                            <input class="form-control" placeholder="Votre numéro de téléphone" name="phone" type="text" value="{{$annonce->phoneNumber}}">
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="phoneHide" value="0" />
                                    @if ($annonce->phoneHide == 1)
                                        <input type="checkbox" value="1" name="phoneHide" checked> <small>Masquer le numéro de téléphone sur cette annonce.</small></label>
                                    @else
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
                            <input class="form-control" name="fileToUpload[]" type="file" multiple value="{{old('fileToUpload[]')}}"> <br>
                        </div>
                    </div>
                    <div class="mb30"></div>
                    <div class="form-group">
                        <div class="page-ads box">
                            <button class="btn btn-common" type="submit">Modifier</button>
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
                         <li><a href="/">Avantages de l’inscription</a></li>
                         <li><a href="/">Publicité sur Foress</a></li> 
                         <li><a href="/">Contactez-nous</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                    <h3 class="block-title"> RENSEIGNEMENTS</h3>
                       
                            <ul class="menu">
                            <li><a href="/">Conditions d’utilisation</a></li>
                            <li><a href="/">Politique de confidentialité</a></li>
                            <li><a href="/">Règles d’affichage</a></li> 
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">{{__('layout.recently_add')}}</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                @foreach ($imageAd as $img)
                                    @if ($recent->id == $img->id_annonce)
                                        <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                                    @endif
                                @endforeach
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
                            <a class="instagram" target="_blank" href=""><i class="fa fa-instagram"></i></a>
                            <a class="youtube" target="_blank" href=""><i class="fa fa-youtube"></i></a>    
                            <a class="linkedin" target="_blank" href=""><i class="fa fa-linkedin"></i></a>
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
<!-- Footer Section End -->

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Main JS  -->
    <script src="{{asset('js/libs.js')}}"></script>

    <script>



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
