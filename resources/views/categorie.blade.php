
    @extends('layout')

    @section('content')
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
                    <input class="form-control keyword" name="keyword" placeholder="Mot clé" type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}">
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

    <!-- Main container Start -->
    <div class="main-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 page-sidebar">
            <aside>
              <div class="inner-box">
                <div class="categories">                  
                  <div class="widget-title">
                    <h4><a href="#"> Annonces correspondantes </a></h4>
                  </div>

                @if ($catégorie == 'Catégorie')
                  <div class="panel-group" id="accordion">
                  @foreach ($search as $searchCat)
                    @if ($searchCat->idCat == $filter)                    
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$searchCat ->idCat}}" aria-expanded="true">
                              {{$searchCat ->categories}} 
                            </a>
                          </h4>
                        </div>
                        <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <ul>
                              @foreach ($sousCat as $sousCategorie)
                                @if ($sousCategorie->categories == $searchCat ->categories and $sousCategorie->sousCat <> 'Autres')
                                  <li><a href="/search/{{$sousCategorie->idCat}}/{{$sousCategorie->idSousCat}}">{{$sousCategorie->sousCat}}</a></li>
                                @endif 
                              @endforeach
                              <li><a href="/search/{{$searchCat->idCat}}">Autres</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    @else 
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$searchCat ->idCat}}">
                              {{$searchCat ->categories}} 
                            </a>
                          </h4>
                        </div>
                        <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <ul>
                              @foreach ($sousCat as $sousCategorie)
                                @if ($sousCategorie->categories == $searchCat ->categories and $sousCategorie->sousCat <> 'Autres')
                                  <li><a href="/search/{{$sousCategorie->idCat}}/{{$sousCategorie->idSousCat}}">{{$sousCategorie->sousCat}}</a></li>
                                @endif 
                              @endforeach
                              <li><a href="/search/{{$searchCat->idCat}}">Autres</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                  </div>
                  @elseif ($catégorie == 'sousCatégorie')

                    @if ($idSousCat == '53')
                    <div class="categories-list">
                      <form method="get" action="/advancedSearch">
                      <ul>
                        <li>
                          <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                          <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                          <label>Domaine d'emploi</label>
                          <select class="form-control" name="domaineEmolploi" size="10">
                              <option value="">Sélectionner</option>
                                @foreach ($dataSelected as $domaine)
                                    @if (isset($_GET['domaineEmolploi']))
                                      @if ($_GET['domaineEmolploi'] == $domaine->nomDomaine)
                                          <option selected>{{ $domaine->nomDomaine}}</option>
                                      @else
                                        <option>{{ $domaine->nomDomaine }}</option>
                                      @endif
                                    @else
                                      <option>{{ $domaine->nomDomaine }}</option>
                                    @endif
                                @endforeach
                          </select>
                          <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                        </li>  
                      </ul>
                      </form>
                    </div>
                    <div class="widget-title">
                      <h4><a href="/categorie"> Catégories </a></h4>
                    </div>
                    <div class="panel-group" id="accordion">
                    <div class="panel panel-default">                
                      <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                            Emplois
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <ul> 
                            @foreach ($sousCat as $sousCategories)
                             @if ($sousCategories->categories == 'Emplois' and $sousCategories->sousCat <> 'Autres')
                              @if ($sousCategories->idSousCat == $idSousCat)
                                <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                              @else 
                                <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                             @endif
                             @endif
                            @endforeach
                            <li><a href="/search/Catégorie/53">Autres</a></li>
                          </ul>
                        </div>
                      </div>
                      </div>
                    </div>
                @elseif ($idSousCat == '54')
                    <div class="categories-list">
                      <form method="get" action="/advancedSearch">
                      <ul>
                        <li>
                          <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                          <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}"><hr>
                          @if (isset($_GET['sexe'])) 
                            @if ($_GET['sexe'] == 'Homme')
                              <label><input type="radio" name="sexe" value="Homme" checked> Homme </label><br>
                              <label><input type="radio" name="sexe" value="Femme"> Femme </label>
                            @else
                              <label><input type="radio" name="sexe" value="Homme"> Homme </label><br>
                              <label><input type="radio" name="sexe" value="Femme" checked> Femme </label>
                            @endif
                          @else
                              <label><input type="radio" name="sexe" value="Homme"> Homme </label><br>
                              <label><input type="radio" name="sexe" value="Femme"> Femme </label>
                          @endif
                        </li>
                        <li>
                          <label>Domaine d'emploi</label>
                          <select class="form-control" name="domaineEmolploi" size="10">
                              <option value="">Sélectionner</option>
                                @foreach ($dataSelected as $domaine)
                                    @if (isset($_GET['domaineEmolploi']))
                                      @if ($_GET['domaineEmolploi'] == $domaine->nomDomaine)
                                          <option selected>{{ $domaine->nomDomaine}}</option>
                                      @else
                                        <option>{{ $domaine->nomDomaine }}</option>
                                      @endif
                                    @else
                                      <option>{{ $domaine->nomDomaine }}</option>
                                    @endif
                                @endforeach
                          </select>
                          <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                        </li>  
                      </ul>
                      </form>
                    </div>
                    <div class="widget-title">
                      <h4><a href="/categorie"> Catégories </a></h4>
                    </div>
                    <div class="panel-group" id="accordion">
                    <div class="panel panel-default">                
                      <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                            Emplois
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <ul> 
                            @foreach ($sousCat as $sousCategories)
                             @if ($sousCategories->categories == 'Emplois' and $sousCategories->sousCat <> 'Autres')
                              @if ($sousCategories->idSousCat == $idSousCat)
                                <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                              @else 
                                <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                             @endif
                             @endif
                            @endforeach
                            <li><a href="/search/Catégorie/53">Autres</a></li>
                          </ul>
                        </div>
                      </div>
                      </div>
                    </div>
                @elseif ($idSousCat == '16')
                    <div class="categories-list">
                      <form method="get" action="/advancedSearch">
                      <ul>
                        <li>
                          <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                          <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                          <label class="control-label" for="textarea">Prix</label>
                          <input type="text" class="form-control" name="priceDe" placeholder="de" value="{{ isset($_GET['priceDe']) ? $_GET['priceDe'] : '' }}">  
                          <input type="text" class="form-control" name="priceA" placeholder="à" value="{{ isset($_GET['priceA']) ? $_GET['priceA'] : '' }}">
                        </li>
                        <li>
                          <label>Marque</label>
                          <select class="form-control" name="marquePhone" size="10">
                              <option value="">Sélectionner</option>
                                @foreach ($dataSelected as $marque)
                                    @if (isset($_GET['marquePhone']))
                                      @if ($_GET['marquePhone'] == $marque->marque)
                                          <option selected>{{ $marque->marque}}</option>
                                      @else
                                        <option>{{ $marque->marque }}</option>
                                      @endif
                                    @else
                                      <option>{{ $marque->marque }}</option>
                                    @endif
                                @endforeach
                          </select>
                          <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                        </li>  
                      </ul>
                      </form>
                    </div>
                    <div class="widget-title">
                      <h4><a href="/categorie"> Catégories </a></h4>
                    </div>
                    <div class="panel-group" id="accordion">
                    <div class="panel panel-default">                
                      <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                            Boutiques
                          </a>
                        </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <ul> 
                            @foreach ($sousCat as $sousCategories)
                             @if ($sousCategories->categories == 'Boutiques' and $sousCategories->sousCat <> 'Autres')
                              @if ($sousCategories->idSousCat == $idSousCat)
                                <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                              @else 
                                <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                             @endif
                             @endif
                            @endforeach
                            <li><a href="/search/Catégorie/5">Autres</a></li>
                          </ul>
                        </div>
                      </div>
                      </div>
                    </div>
                   @elseif ($idSousCat == '36')
                      <div class="categories-list">
                        <form method="get" action="/advancedSearch">
                        <ul>
                          <li>
                            <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                            <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                            <label class="control-label" for="textarea">Prix</label>
                            <input type="text" class="form-control" name="priceDe" placeholder="de" value="{{isset($_GET['priceDe']) ? $_GET['priceDe'] : ''}}">  
                            <input type="text" class="form-control" name="priceA" placeholder="à" value="{{isset($_GET['priceA']) ? $_GET['priceA'] : ''}}">
                          </li>
                          <li>
                            <label class="control-label" for="textarea">Type</label>
                              <select class="form-control" name="typeStockage" size="4">
                                  <option value="">Sélectionner</option>
                                  @if (isset($_GET['typeStockage']))
                                  <option {{ $_GET['typeStockage'] == 'Flash disque' ? 'selected' : ''}}>Flash disque</option>
                                  <option {{ $_GET['typeStockage'] == 'Disque dur externe' ? 'selected' : ''}}>Disque dur externe</option>
                                  <option {{ $_GET['typeStockage'] == 'Disque dur interne' ? 'selected' : ''}}>Disque dur interne</option>
                                  <option {{ $_GET['typeStockage'] == 'Carte mémoire' ? 'selected' : ''}}>Carte mémoire</option>
                                  @else
                                  <option>Flash disque</option>
                                  <option>Disque dur externe</option>
                                  <option>Disque dur interne</option>
                                  <option>Carte mémoire</option>
                                  @endif
                              </select>
                              <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                             </li>               
                        </ul>
                        </form>
                      </div>
                      <div class="widget-title">
                        <h4><a href="/categorie"> Catégories </a></h4>
                      </div>
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">                
                          <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                                Matériel informatique
                              </a>
                            </h4>
                          </div>
                          <div id="collapseFive" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <ul> 
                                @foreach ($sousCat as $sousCategories)
                                 @if ($sousCategories->categories == 'Matériel informatique' and $sousCategories->sousCat <> 'Autres')
                                  @if ($sousCategories->idSousCat == $idSousCat)
                                    <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                                  @else 
                                    <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                                 @endif
                                 @endif
                                @endforeach
                                <li><a href="/search/Catégorie/8">Autres</a></li>
                              </ul>
                            </div>
                          </div>
                          </div>
                        </div>

                  @elseif ($idSousCat == '55' or $idSousCat == '56' or $idSousCat == '57' or $idSousCat == '58')
                      <div class="categories-list">
                        <form method="get" action="/advancedSearch">
                        <ul>
                          <li>
                            <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                            <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                            <label class="control-label" for="textarea">Prix</label>
                            <input type="text" class="form-control" name="priceDe" placeholder="de" value="{{isset($_GET['priceDe']) ? $_GET['priceDe'] : ''}}">  
                            <input type="text" class="form-control" name="priceA" placeholder="à" value="{{isset($_GET['priceA']) ? $_GET['priceA'] : ''}}">
                          </li>
                          <li>
                            <label class="control-label" for="textarea">Type du Bien</label>
                            <select class="form-control" name="typeBien" size="9">
                              <option value="">Sélectionner</option>
                              @foreach ($dataSelected as $typeBien)
                                  @if (isset($_GET['typeBien']))
                                    @if ($_GET['typeBien'] == $typeBien->typeBien)
                                        <option selected>{{ $typeBien->typeBien}}</option>
                                    @else
                                      <option>{{ $typeBien->typeBien }}</option>
                                    @endif
                                  @else
                                    <option>{{ $typeBien->typeBien }}</option>
                                  @endif
                              @endforeach
                            </select>
                          </li> 
                          <li>
                            <input class="form-control" name="superficie" type="text" placeholder="Superficie en M²" value="{{isset($_GET['superficie']) ? $_GET['superficie'] : ''}}">
                          </li>
                          <li>
                            <input class="form-control" name="nbrePiece" type="text" placeholder="Nombre de pièces" value="{{isset($_GET['nbrePiece']) ? $_GET['nbrePiece'] : ''}}">
                          </li> 
                          <li>
                            <input class="form-control" name="etage" type="text" placeholder="Étage" value="{{isset($_GET['etage']) ? $_GET['etage'] : ''}}">
                            <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                          </li> 
                        </ul>
                        </form>
                      </div>
                      <div class="widget-title">
                        <h4><a href="/categorie"> Catégories </a></h4>
                      </div>
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">                
                          <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                                Immobiliers
                              </a>
                            </h4>
                          </div>
                          <div id="collapseFive" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <ul> 
                                @foreach ($sousCat as $sousCategories)
                                 @if ($sousCategories->categories == 'Immobiliers' and $sousCategories->sousCat <> 'Autres')
                                  @if ($sousCategories->idSousCat == $idSousCat)
                                    <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                                  @else 
                                    <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                                 @endif
                                 @endif
                                @endforeach
                                <li><a href="/search/Catégorie/3">Autres</a></li>
                              </ul>
                            </div>
                          </div>
                          </div>
                        </div>

                  @elseif ($idSousCat == '6' or $idSousCat == '7' or $idSousCat == '8' or $idSousCat == '9' or $idSousCat == '10' or $idSousCat == '11' or $idSousCat == '12' or $idSousCat == '13')
                      <div class="categories-list">
                        <form method="get" action="/advancedSearch">
                          <ul>
                            <li>
                              <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}"> 
                              <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                              <label class="control-label" for="textarea">Prix</label>
                              <input type="text" class="form-control" name="priceDe" placeholder="de" value="{{ isset($_GET['priceDe']) ? $_GET['priceDe'] : '' }}">  
                              <input type="text" class="form-control" name="priceA" placeholder="à" value="{{ isset($_GET['priceA']) ? $_GET['priceA'] : '' }}">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Type d'offre</label><br>
                              @if (isset($_GET['vente'])) 
                                @if ($_GET['vente'] == 'selling')
                                  <label><input type="radio" name="vente" value="selling" checked> Offres </label><br>
                                  <label><input type="radio" name="vente" value="searching"> Recherché </label>
                                @else
                                  <label><input type="radio" name="vente" value="selling"> Offres </label><br>
                                  <label><input type="radio" name="vente" value="searching" checked> Recherché </label>
                                @endif
                              @else
                                  <label><input type="radio" name="vente" value="selling"> Offres </label><br>
                                  <label><input type="radio" name="vente" value="searching"> Recherché </label>
                              @endif
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Marque</label>
                              <select class="form-control" name="marque" size="8">
                                <option value="">Sélectionner</option>
                                @foreach ($dataSelected as $marque)
                                    @if (isset($_GET['marque']))
                                      @if ($_GET['marque'] == $marque->marqueVeh)
                                          <option selected>{{ $marque->marqueVeh}}</option>
                                      @else
                                        <option>{{ $marque->marqueVeh }}</option>
                                      @endif
                                    @else
                                      <option>{{ $marque->marqueVeh }}</option>
                                    @endif
                                @endforeach
                              </select>               
                            </li>
                            <li>
                              <input class="form-control" name="anne" id="anne" type="text" placeholder="Année" value="{{ isset($_GET['anne']) ? $_GET['anne'] : '' }}">
                            </li> 
                            <li>
                              <input class="form-control" name="kilom" id="kilom" type="text" placeholder="Kilomètrage" value="{{ isset($_GET['kilom']) ? $_GET['kilom'] : '' }}">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Type carburant</label>
                              <select class="form-control" name="typeCarb" size="4"> 
                                  <option value="">Sélectionner</option>
                                  @if (isset($_GET['typeCarb']))
                                  <option {{ $_GET['typeCarb'] == 'Essence' ? 'selected' : '' }}>Essence</option>
                                  <option {{ $_GET['typeCarb'] == 'Gas oil' ? 'selected' : '' }}>Gas oil</option>
                                  <option {{ $_GET['typeCarb'] == 'GPL' ? 'selected' : '' }}>GPL</option>
                                  <option {{ $_GET['typeCarb'] == 'Eléctrique' ? 'selected' : '' }}>Eléctrique</option>
                                  @else
                                  <option>Essence</option>
                                  <option>Gas oil</option>
                                  <option>GPL</option>
                                  <option>Eléctrique</option>
                                  @endif
                              </select>
                              <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                            </li>
                         </ul>
                        </form>
                      </div>
                      <div class="widget-title">
                        <h4><a href="/categorie"> Catégories </a></h4>
                      </div>
                      <div class="panel-group" id="accordion">
                        <div class="panel panel-default">                
                          <div class="panel panel-default">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                                Véhicules
                              </a>
                            </h4>
                          </div>
                          <div id="collapseFive" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <ul> 
                                @foreach ($sousCat as $sousCategories)
                                 @if ($sousCategories->categories == 'Véhicules' and $sousCategories->sousCat <> 'Autres')
                                  @if ($sousCategories->idSousCat == $idSousCat)
                                    <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                                  @else 
                                    <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                                 @endif
                                 @endif
                                @endforeach
                                <li><a href="/search/Catégorie/4">Autres</a></li>
                              </ul>
                            </div>
                          </div>
                          </div>
                        </div>

                      @elseif ($idSousCat == '37')
                        <div class="categories-list">
                          <form method="get" action="/advancedSearch">
                          <ul>
                            <li>
                              <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                              <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                              <label class="control-label" for="textarea">Prix</label>
                              <input type="text" class="form-control" name="priceDe" placeholder="de" value="{{ isset($_GET['priceDe']) ? $_GET['priceDe'] : '' }}">  
                              <input type="text" class="form-control" name="priceA" placeholder="à" value="{{ isset($_GET['priceA']) ? $_GET['priceA'] : '' }}">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Marque</label>
                              <select class="form-control" name="marqueOrd" size="10">
                                <option value="">Sélectionner</option>
                                  @foreach ($dataSelected as $marque)
                                      @if (isset($_GET['marqueOrd']))
                                        @if ($_GET['marqueOrd'] == $marque->marque)
                                            <option selected>{{ $marque->marque}}</option>
                                        @else
                                          <option>{{ $marque->marque }}</option>
                                        @endif
                                      @else
                                        <option>{{ $marque->marque }}</option>
                                      @endif
                                  @endforeach
                              </select> 
                            </li>                            
                            <li>
                              <label class="control-label" for="textarea">Taille de l'écran</label>
                              <select class="form-control" name="tailleOrd" size="4">
                                  <option value="">Sélectionner</option>
                                  @if (isset($_GET['tailleOrd']))
                                  <option {{ $_GET['tailleOrd'] == '14 po ou moins' ? 'selected' : '' }}>14 po ou moins</option>
                                  <option {{ $_GET['tailleOrd'] == '15 po' ? 'selected' : '' }}>15 po</option>
                                  <option {{ $_GET['tailleOrd'] == '16 po' ? 'selected' : '' }}>16 po</option>
                                  <option {{ $_GET['tailleOrd'] == '17 po ou plus' ? 'selected' : '' }}>17 po ou plus</option>
                                  @else
                                  <option>14 po ou moins</option>
                                  <option>15 po</option>
                                  <option>16 po</option>
                                  <option>17 po ou plus</option>
                                  @endif
                              </select>  
                              <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                            </li>
                          </ul>
                          </form>
                        </div>
                        <div class="widget-title">
                            <h4><a href="/categorie"> Catégories </a></h4>
                          </div>
                        <div class="panel-group" id="accordion">
                          <div class="panel panel-default">                
                            <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                                  Matériel informatique
                                </a>
                              </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse in">
                              <div class="panel-body">
                                <ul> 
                                  @foreach ($sousCat as $sousCategories)
                                 @if ($sousCategories->categories == 'Matériel informatique' and $sousCategories->sousCat <> 'Autres')
                                    @if ($sousCategories->idSousCat == $idSousCat)
                                      <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                                    @else 
                                      <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                                   @endif
                                   @endif
                                  @endforeach
                                  <li><a href="/search/Catégorie/8">Autres</a></li>
                                </ul>
                              </div>
                            </div>
                            </div>
                          </div>
                      @elseif ($idSousCat == '2')
                          <div class="categories-list">
                            <form method="get" action="/advancedSearch">
                            <ul>
                              <li>
                                <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                                <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                                <label class="control-label" for="textarea">Date et heure de l'événement</label>
                                <input class="form-control" name="datetimeEvent" type="datetime-local" value="{{ isset($_GET['datetimeEvent']) ? $_GET['datetimeEvent'] : '' }}">
                              </li>
                              <li>
                                <label class="control-label" for="textarea">Du</label>
                                <input class="form-control" name="du" type="date" value="{{ isset($_GET['du']) ? $_GET['du'] : '' }}">
                                <label class="control-label" for="textarea">Au</label>
                                <input class="form-control" name="au" type="date" value="{{ isset($_GET['au']) ? $_GET['au'] : '' }}">
                                <button type="submit" class="btn btn-primary" id="Add">Mettre à jour</button>
                              </li>   
                            </ul>
                            </form>
                          </div>
                          <div class="widget-title">
                            <h4><a href="/categorie"> Catégories </a></h4>
                          </div>
                          <div class="panel-group" id="accordion">
                            <div class="panel panel-default">                
                              <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="true">
                                    Communauté
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse in">
                                <div class="panel-body">
                                  <ul> 
                                    @foreach ($sousCat as $sousCategories)
                                   @if ($sousCategories->categories =='Communauté' and $sousCategories->sousCat<> 'Autres')
                                      @if ($sousCategories->idSousCat == $idSousCat)
                                        <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                                      @else 
                                        <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                                     @endif
                                     @endif
                                    @endforeach
                                    <li><a href="/search/Catégorie/1">Autres</a></li>
                                  </ul>
                                </div>
                              </div>
                              </div>
                            </div>
                          
                      @else
                        <div class="panel-group" id="accordion">
                          @foreach ($search as $searchCat)
                            @if ($searchCat->idCat == $idCat)                    
                              <div class="panel panel-default">
                                <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#{{$searchCat ->idCat}}" aria-expanded="true">
                                      {{$searchCat ->categories}} 
                                    </a>
                                  </h4>
                                </div>
                                <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                    <ul>
                                      @foreach ($sousCat as $sousCategories)
                                      @if ($sousCategories->categories == $searchCat ->categories and $sousCategories->sousCat <> 'Autres')
                                          @if ($sousCategories->idSousCat == $idSousCat)
                                              <li class="active"><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a></li>
                                            @else 
                                              <li><a href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a></li>
                                          @endif
                                        @endif 
                                      @endforeach
                                      <li><a href="/search/{{$searchCat->idCat}}">Autres</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            @endif
                          @endforeach
                        
                      @endif

                  
                  @foreach ($search as $searchCat)
                    @if ($searchCat->idCat <> $idCat)                    
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{$searchCat ->idCat}}">
                              {{$searchCat ->categories}} 
                            </a>
                          </h4>
                        </div>
                        <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse">
                          <div class="panel-body">
                            <ul>
                              @foreach ($sousCat as $sousCategorie)
                                @if ($sousCategorie->categories == $searchCat ->categories and $sousCategorie->sousCat <> 'Autres')
                                  <li><a href="/search/{{$sousCategorie->idCat}}/{{$sousCategorie->idSousCat}}">{{$sousCategorie->sousCat}}</a></li>
                                @endif 
                              @endforeach
                              <li><a href="/search/{{$searchCat->idCat}}">Autres</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    @endif
                  @endforeach
                  </div>

                    @endif
                  </div>
                </div>       
            </aside>
          </div>
          <div class="col-sm-9 page-content">

         @if ($data->count() <> '0')
            <!-- Product idSousCat Start -->
            <div class="product-filter">
              <div class="grid-list-count">
                <a class="list switchToGrid" href="#"><i class="fa fa-list"></i></a>
                <a class="grid switchToList" href="#"><i class="fa fa-th-large"></i></a>
              </div>
              <div class="Show-item">
                <span>Trier par</span>
                <form class="woocommerce-ordering" method="post">
                  <label>
                    <select name="order" class="orderby">
                      <option selected="selected" value="menu-order">Trier par</option>
                      <!--<option value="mostrecent">Les plus récentes</option>
                      <option value="lessrecent">Les moins récentes</option>-->
                      <option value="asc">Prix: Faible à élevé</option>
                      <option value="desc">Prix: Elevé à faible</option>
                    </select>
                  </label>
                </form>
              </div>
            </div>
            <!-- Product filter End -->

            <!-- Adds wrapper Start -->
            <div class="adds-wrapper">              
               @foreach ($data as $result)
              <div class="item-list" data-store="{{$result->prix.$result->id}}" data-price="{{$result->prix}}">
                <div class="col-sm-2 no-padding photobox">
                  <div class="add-image">
                    <a href="/details/{{$result->id}}">
                     @foreach ($imageAd as $img) 
                      @if ($result->id == $img->id_annonce)
                        <img src="{{asset('images/'.$img->imagename)}}" alt=""></a>
                      @endif
                      @endforeach
                    <span class="photo-count"><i class="fa fa-camera"></i></span>
                  </div>
                </div>
                <div class="col-sm-7 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"><a href="/details/{{$result->id}}">{{$result->titre}}</a></h5>
                    <div class="info">
                      
                      <span class="date">
                        <i class="fa fa-clock"></i>
                        {{$result->created_at}}
                      </span> -
                      <span class="item-location"><i class="fa fa-map-marker"></i> {{$result->wilaya}}</span>
                    </div>
                    <div class="item_desc">
                      <a href="#">{{$result->description}}</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 text-right  price-box">
                  <h2 class="item-price" data-test="{{$result->prix}}"> {{$result->prix <> '' ? $result->prix.'DA' : '' }}</h2>
                  <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris" onclick="addToFav({{$result->id}})"><i class="fa fa-heart"></i>
                  <span>Favori</span></a>
                  <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i> <span>{{$result->numberViews}}</span> </a>
                </div>
              </div>    
              @endforeach
            </div>
            <!-- Adds wrapper End -->

            <!-- Start Pagination -->
            {{ $data->appends(request()->input())->links() }}
            <!-- End Pagination -->
          @else 

          <div class="alert alert-warning" role="alert">
           <i class="fa fa-exclamation-triangle"> Désolé, aucun résultat n'a été trouvé </i>
          </div>

          @endif

            <div class="post-promo text-center">
              <h2> Avez-vous quelque chose à vendre ?</h2>
              <h5>Vendez vos produits en ligne GRATUITEMENT. C'est plus facile que vous ne le pensez!</h5>
              @auth
                <a href="/addAd" class="btn btn-post btn-danger">Poster une annonce </a>
              @else
                <a href="/connexion" class="btn btn-post btn-danger">Poster une annonce </a>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container End -->

    @endsection

    <script type="text/javascript">

/* ******************************   Advanced Filter *************************************** */ 

     /* function filter(){
          
           var sites = {!! json_encode($data->toArray()) !!};
           var test = sites.data;
           
           console.log(sites);
        }*/

        

    </script>