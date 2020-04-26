@extends('profil.layout')

@section('content')
<!-- Main container Start -->
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 page-sidebar">
        <aside>
          <div class="inner-box">
            <!-- <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a type="button" class='btn btn-success btn-block btn-filter' data-toggle="collapse"  data-target='#filter' style="display:none;" aria-expanded="false">
                          Préciser la recherche
                      </a>
                    </h4>
                  </div> -->
            <button type='button' class='btn btn-success btn-block btn-filter' data-toggle='collapse'
              data-target='#filter' aria-expanded='false' style="display:none;">
              Préciser la recherche
            </button>
            <div class="categories" id="filter">
              <div class="widget-title title">
                Annonces correspondantes
              </div>

              @if ($catégorie == 'Catégorie')
              <div class="panel-group" id="accordion">
                @foreach ($search as $searchCat)
                @if ($searchCat->idCat == $filter)
                <div class="panel panel-default">
                  <div class="panel-heading" id="panel-selected">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#{{$searchCat ->idCat}}"
                        aria-expanded="true" id="title-selected">
                        {{$searchCat ->categories}}
                      </a>
                    </h4>
                  </div>
                  <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <ul>
                        @foreach ($sousCat as $sousCategorie)
                        @if ($sousCategorie->categories == $searchCat ->categories and $sousCategorie->sousCat <>
                          'Autres')
                          <li><a
                              href="/search/{{$sousCategorie->idCat}}/{{$sousCategorie->idSousCat}}">{{$sousCategorie->sousCat}}</a>
                          </li>
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
                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                        href="#{{$searchCat ->idCat}}" aria-expanded="false">
                        {{$searchCat ->categories}}
                      </a>
                    </h4>
                  </div>
                  <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse">
                    <div class="panel-body">
                      <ul>
                        @foreach ($sousCat as $sousCategorie)
                        @if ($sousCategorie->categories == $searchCat ->categories and $sousCategorie->sousCat <>
                          'Autres')
                          <li><a
                              href="/search/{{$sousCategorie->idCat}}/{{$sousCategorie->idSousCat}}">{{$sousCategorie->sousCat}}</a>
                          </li>
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
                <form method="get" action="/advanced-Search">
                  <ul>
                    <li>
                      <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                      <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                      <label>Domaine d'emploi</label>
                      <select class="form-control" name="domaine-emploi" size="10">
                        <option value="">Sélectionner</option>
                        @foreach ($dataSelected as $domaine)
                        @if (isset($_GET['domaine-emploi']))
                        @if ($_GET['domaine-emploi'] == $domaine->nomDomaine)
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
                    <div class="panel-heading" id="panel-selected">
                      <h4 class="panel-title">
                        <a id="title-selected" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                          aria-expanded="false">
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
                            <li class="active"><a
                                href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                            </li>
                            @else
                            <li><a
                                href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                            </li>
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
                  <form method="get" action="/advanced-Search">
                    <ul>
                      <li>
                        <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                        <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                        <hr>
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
                        <select class="form-control" name="domaine-emploi" size="10">
                          <option value="">Sélectionner</option>
                          @foreach ($dataSelected as $domaine)
                          @if (isset($_GET['domaine-emploi']))
                          @if ($_GET['domaine-emploi'] == $domaine->nomDomaine)
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
                      <div class="panel-heading" id="panel-selected">
                        <h4 class="panel-title">
                          <a id="title-selected" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                            aria-expanded="false">
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
                              <li class="active"><a
                                  href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                              </li>
                              @else
                              <li><a
                                  href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                              </li>
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
                    <form method="get" action="/advanced-Search">
                      <ul>
                        <li>
                          <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                          <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                          <label class="control-label" for="textarea">Prix</label>
                          <input type="text" class="form-control" name="prix-de" placeholder="de"
                            value="{{ isset($_GET['prix-de']) ? $_GET['prix-de'] : '' }}">
                          <input type="text" class="form-control" name="prix-a" placeholder="à"
                            value="{{ isset($_GET['prix-a']) ? $_GET['prix-a'] : '' }}">
                        </li>
                        <li>
                          <label>Marque</label>
                          <select class="form-control" name="marque-telephone" size="10">
                            <option value="">Sélectionner</option>
                            @foreach ($dataSelected as $marque)
                            @if (isset($_GET['marque-telephone']))
                            @if ($_GET['marque-telephone'] == $marque->marque)
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
                        <div class="panel-heading" id="panel-selected">
                          <h4 class="panel-title">
                            <a id="title-selected" data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                              aria-expanded="false">
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
                                <li class="active"><a
                                    href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                </li>
                                @else
                                <li><a
                                    href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                </li>
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
                      <form method="get" action="/advanced-Search">
                        <ul>
                          <li>
                            <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                            <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                            <label class="control-label" for="textarea">Prix</label>
                            <input type="text" class="form-control" name="prix-de" placeholder="de"
                              value="{{isset($_GET['prix-de']) ? $_GET['prix-de'] : ''}}">
                            <input type="text" class="form-control" name="prix-a" placeholder="à"
                              value="{{isset($_GET['prix-a']) ? $_GET['prix-a'] : ''}}">
                          </li>
                          <li>
                            <label class="control-label" for="textarea">Type</label>
                            <select class="form-control" name="type-Stockage" size="5">
                              <option value="">Sélectionner</option>
                              @if (isset($_GET['type-Stockage']))
                              <option {{ $_GET['type-Stockage'] == 'Flash disque' ? 'selected' : ''}}>Flash disque
                              </option>
                              <option {{ $_GET['type-Stockage'] == 'Disque dur externe' ? 'selected' : ''}}>Disque dur
                                externe</option>
                              <option {{ $_GET['type-Stockage'] == 'Disque dur interne' ? 'selected' : ''}}>Disque dur
                                interne</option>
                              <option {{ $_GET['type-Stockage'] == 'Carte mémoire' ? 'selected' : ''}}>Carte mémoire
                              </option>
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
                          <div class="panel-heading" id="panel-selected">
                            <h4 class="panel-title">
                              <a id="title-selected" data-toggle="collapse" data-parent="#accordion"
                                href="#collapseFive" aria-expanded="false">
                                Matériel informatique
                              </a>
                            </h4>
                          </div>
                          <div id="collapseFive" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <ul>
                                @foreach ($sousCat as $sousCategories)
                                @if ($sousCategories->categories == 'Matériel informatique' and $sousCategories->sousCat
                                <> 'Autres')
                                  @if ($sousCategories->idSousCat == $idSousCat)
                                  <li class="active"><a
                                      href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                  </li>
                                  @else
                                  <li><a
                                      href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                  </li>
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
                        <form method="get" action="/advanced-Search">
                          <ul>
                            <li>
                              <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                              <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                              <label class="control-label" for="textarea">Prix</label>
                              <input type="text" class="form-control" name="prix-de" placeholder="de"
                                value="{{isset($_GET['prix-de']) ? $_GET['prix-de'] : ''}}">
                              <input type="text" class="form-control" name="prix-a" placeholder="à"
                                value="{{isset($_GET['prix-a']) ? $_GET['prix-a'] : ''}}">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Type du Bien</label>
                              <select class="form-control" name="type-bien" size="9">
                                <option value="">Sélectionner</option>
                                @foreach ($dataSelected as $typeBien)
                                @if (isset($_GET['type-bien']))
                                @if ($_GET['type-bien'] == $typeBien->typeBien)
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
                              <input class="form-control" name="superficie" type="text" placeholder="Superficie en M²"
                                value="{{isset($_GET['superficie']) ? $_GET['superficie'] : ''}}">
                            </li>
                            <li>
                              <input class="form-control" name="nbre-piece" type="text" placeholder="Nombre de pièces"
                                value="{{isset($_GET['nbre-piece']) ? $_GET['nbre-piece'] : ''}}">
                            </li>
                            <li>
                              <input class="form-control" name="etage" type="text" placeholder="Étage"
                                value="{{isset($_GET['etage']) ? $_GET['etage'] : ''}}">
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
                            <div class="panel-heading" id="panel-selected">
                              <h4 class="panel-title">
                                <a id="title-selected" data-toggle="collapse" data-parent="#accordion"
                                  href="#collapseFive" aria-expanded="false">
                                  Immobiliers
                                </a>
                              </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse in">
                              <div class="panel-body">
                                <ul>
                                  @foreach ($sousCat as $sousCategories)
                                  @if ($sousCategories->categories == 'Immobiliers' and $sousCategories->sousCat <>
                                    'Autres')
                                    @if ($sousCategories->idSousCat == $idSousCat)
                                    <li class="active"><a
                                        href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                    </li>
                                    @else
                                    <li><a
                                        href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                    </li>
                                    @endif
                                    @endif
                                    @endforeach
                                    <li><a href="/search/Catégorie/3">Autres</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>

                        @elseif ($idSousCat == '6' or $idSousCat == '7' or $idSousCat == '8' or $idSousCat == '9' or
                        $idSousCat == '10' or $idSousCat == '11' or $idSousCat == '12' or $idSousCat == '13')
                        <div class="categories-list">
                          <form method="get" action="/advanced-Search">
                            <ul>
                              <li>
                                <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                                <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                                <label class="control-label" for="textarea">Prix</label>
                                <input type="text" class="form-control" name="prix-de" placeholder="de"
                                  value="{{ isset($_GET['prix-de']) ? $_GET['prix-de'] : '' }}">
                                <input type="text" class="form-control" name="prix-a" placeholder="à"
                                  value="{{ isset($_GET['prix-a']) ? $_GET['prix-a'] : '' }}">
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
                                <input class="form-control" name="anne" id="anne" type="text" placeholder="Année"
                                  value="{{ isset($_GET['anne']) ? $_GET['anne'] : '' }}">
                              </li>
                              <li>
                                <input class="form-control" name="kilom" id="kilom" type="text"
                                  placeholder="Kilomètrage" value="{{ isset($_GET['kilom']) ? $_GET['kilom'] : '' }}">
                              </li>
                              <li>
                                <label class="control-label" for="textarea">Type carburant</label>
                                <select class="form-control" name="type-Carburant" size="5">
                                  <option value="">Sélectionner</option>
                                  @if (isset($_GET['type-Carburant']))
                                  <option {{ $_GET['type-Carburant'] == 'Essence' ? 'selected' : '' }}>Essence</option>
                                  <option {{ $_GET['type-Carburant'] == 'Gas oil' ? 'selected' : '' }}>Gas oil</option>
                                  <option {{ $_GET['type-Carburant'] == 'GPL' ? 'selected' : '' }}>GPL</option>
                                  <option {{ $_GET['type-Carburant'] == 'Eléctrique' ? 'selected' : '' }}>Eléctrique
                                  </option>
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
                              <div class="panel-heading" id="panel-selected">
                                <h4 class="panel-title">
                                  <a id="title-selected" data-toggle="collapse" data-parent="#accordion"
                                    href="#collapseFive" aria-expanded="false">
                                    Véhicules
                                  </a>
                                </h4>
                              </div>
                              <div id="collapseFive" class="panel-collapse collapse in">
                                <div class="panel-body">
                                  <ul>
                                    @foreach ($sousCat as $sousCategories)
                                    @if ($sousCategories->categories == 'Véhicules' and $sousCategories->sousCat <>
                                      'Autres')
                                      @if ($sousCategories->idSousCat == $idSousCat)
                                      <li class="active"><a
                                          href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                      </li>
                                      @else
                                      <li><a
                                          href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                      </li>
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
                            <form method="get" action="/advanced-Search">
                              <ul>
                                <li>
                                  <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                                  <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                                  <label class="control-label" for="textarea">Prix</label>
                                  <input type="text" class="form-control" name="prix-de" placeholder="de"
                                    value="{{ isset($_GET['prix-de']) ? $_GET['prix-de'] : '' }}">
                                  <input type="text" class="form-control" name="prix-a" placeholder="à"
                                    value="{{ isset($_GET['prix-a']) ? $_GET['prix-a'] : '' }}">
                                </li>
                                <li>
                                  <label class="control-label" for="textarea">Marque</label>
                                  <select class="form-control" name="marque-ordinateur" size="10">
                                    <option value="">Sélectionner</option>
                                    @foreach ($dataSelected as $marque)
                                    @if (isset($_GET['marque-ordinateur']))
                                    @if ($_GET['marque-ordinateur'] == $marque->marque)
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
                                  <select class="form-control" name="taille-ordinateur" size="5">
                                    <option value="">Sélectionner</option>
                                    @if (isset($_GET['taille-ordinateur']))
                                    <option {{ $_GET['taille-ordinateur'] == '14 po ou moins' ? 'selected' : '' }}>14 po
                                      ou moins</option>
                                    <option {{ $_GET['taille-ordinateur'] == '15 po' ? 'selected' : '' }}>15 po</option>
                                    <option {{ $_GET['taille-ordinateur'] == '16 po' ? 'selected' : '' }}>16 po</option>
                                    <option {{ $_GET['taille-ordinateur'] == '17 po ou plus' ? 'selected' : '' }}>17 po
                                      ou plus</option>
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
                                <div class="panel-heading" id="panel-selected">
                                  <h4 class="panel-title">
                                    <a id="title-selected" data-toggle="collapse" data-parent="#accordion"
                                      href="#collapseFive" aria-expanded="false">
                                      Matériel informatique
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                    <ul>
                                      @foreach ($sousCat as $sousCategories)
                                      @if ($sousCategories->categories == 'Matériel informatique' and
                                      $sousCategories->sousCat <> 'Autres')
                                        @if ($sousCategories->idSousCat == $idSousCat)
                                        <li class="active"><a
                                            href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                        </li>
                                        @else
                                        <li><a
                                            href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                        </li>
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
                              <form method="get" action="/advanced-Search">
                                <ul>
                                  <li>
                                    <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                                    <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
                                    <label class="control-label" for="textarea">Date et heure de l'événement</label>
                                    <input class="form-control" name="datetimeEvent" type="datetime-local"
                                      value="{{ isset($_GET['datetimeEvent']) ? $_GET['datetimeEvent'] : '' }}">
                                  </li>
                                  <li>
                                    <label class="control-label" for="textarea">Du</label>
                                    <input class="form-control" name="du" type="date"
                                      value="{{ isset($_GET['du']) ? $_GET['du'] : '' }}">
                                    <label class="control-label" for="textarea">Au</label>
                                    <input class="form-control" name="au" type="date"
                                      value="{{ isset($_GET['au']) ? $_GET['au'] : '' }}">
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
                                  <div class="panel-heading" id="panel-selected">
                                    <h4 class="panel-title">
                                      <a id="title-selected" data-toggle="collapse" data-parent="#accordion"
                                        href="#collapseFive" aria-expanded="false">
                                        Communauté
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapseFive" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                      <ul>
                                        @foreach ($sousCat as $sousCategories)
                                        @if ($sousCategories->categories =='Communauté' and $sousCategories->sousCat<>
                                          'Autres')
                                          @if ($sousCategories->idSousCat == $idSousCat)
                                          <li class="active"><a
                                              href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                          </li>
                                          @else
                                          <li><a
                                              href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                          </li>
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
                                  <div class="panel-heading" id="panel-selected">
                                    <h4 class="panel-title">
                                      <a id="title-selected" data-toggle="collapse" data-parent="#accordion"
                                        href="#{{$searchCat ->idCat}}" aria-expanded="false">
                                        {{$searchCat ->categories}}
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                      <ul>
                                        @foreach ($sousCat as $sousCategories)
                                        @if ($sousCategories->categories == $searchCat ->categories and
                                        $sousCategories->sousCat <> 'Autres')
                                          @if ($sousCategories->idSousCat == $idSousCat)
                                          <li class="active"><a
                                              href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}"><strong>{{$sousCategories->sousCat}}</strong></a>
                                          </li>
                                          @else
                                          <li><a
                                              href="/search/{{$sousCategories->idCat}}/{{$sousCategories->idSousCat}}">{{$sousCategories->sousCat}}</a>
                                          </li>
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
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion"
                                          href="#{{$searchCat ->idCat}}">
                                          {{$searchCat ->categories}}
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="{{$searchCat ->idCat}}" class="panel-collapse collapse">
                                      <div class="panel-body">
                                        <ul>
                                          @foreach ($sousCat as $sousCategorie)
                                          @if ($sousCategorie->categories == $searchCat ->categories and
                                          $sousCategorie->sousCat <> 'Autres')
                                            <li><a
                                                href="/search/{{$sousCategorie->idCat}}/{{$sousCategorie->idSousCat}}">{{$sousCategorie->sousCat}}</a>
                                            </li>
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
                              <!-- </div> 
                </div> -->
                            </div>




        </aside>
        {{-- <div class="page-sideabr">
                <img data-src="{{asset('img/pub/helpiste.jpg')}}" alt="" loading="lazy" class="lazyload" />
      </div> --}}
    </div>

    <div class="col-sm-9 page-content">
      @if ($data->count() <> '0')
        <!-- Product idSousCat Start -->
        <div class="product-filter">
          <div class="grid-list-count list-grid-view">
            <a class="list switchToGrid" href="#"><i class="fa fa-list"></i></a>
            <a class="grid switchToList" href="#"><i class="fa fa-th-large"></i></a>
          </div>
          <div class="Show-item">
            <form class="woocommerce-ordering" method="get" action="/advanced-Search">
              @if ($catégorie == 'sousCatégorie')
              <div class="input-hide">
                <input type="hidden" class="form-control" name="idSousCat" value="{{$idSousCat}}">
                <input type="hidden" class="form-control" name="idCat" value="{{$idCat}}">
              </div>
              @if ($idSousCat == '55' or $idSousCat == '56' or $idSousCat == '57' or $idSousCat == '58')
              <div class="input-hide">
                <input type="hidden" class="form-control" name="prix-de" placeholder="de"
                  value="{{isset($_GET['prix-de']) ? $_GET['prix-de'] : ''}}">
                <input type="hidden" class="form-control" name="prix-a" placeholder="à"
                  value="{{isset($_GET['prix-a']) ? $_GET['prix-a'] : ''}}">
                <select class="form-control" name="type-bien" size="9" style="display:none;">
                  <option value="">Sélectionner</option>
                  @foreach ($dataSelected as $typeBien)
                  @if (isset($_GET['type-bien']))
                  @if ($_GET['type-bien'] == $typeBien->typeBien)
                  <option selected>{{ $typeBien->typeBien}}</option>
                  @else
                  <option>{{ $typeBien->typeBien }}</option>
                  @endif
                  @else
                  <option>{{ $typeBien->typeBien }}</option>
                  @endif
                  @endforeach
                </select>
                <input class="form-control" name="superficie" type="hidden" placeholder="Superficie en M²"
                  value="{{isset($_GET['superficie']) ? $_GET['superficie'] : ''}}">
                <input class="form-control" name="nbre-piece" type="hidden" placeholder="Nombre de pièces"
                  value="{{isset($_GET['nbre-piece']) ? $_GET['nbre-piece'] : ''}}">
                <input class="form-control" name="etage" type="hidden" placeholder="Étage"
                  value="{{isset($_GET['etage']) ? $_GET['etage'] : ''}}">
              </div>
              @elseif ($idSousCat == '53')
              <div class="input-hide" style="position:absolute;">
                <select class="form-control" name="domaine-emploi">
                  <option value="">Sélectionner</option>
                  @foreach ($dataSelected as $domaine)
                  @if (isset($_GET['domaine-emploi']))
                  @if ($_GET['domaine-emploi'] == $domaine->nomDomaine)
                  <option selected>{{ $domaine->nomDomaine}}</option>
                  @else
                  <option>{{ $domaine->nomDomaine }}</option>
                  @endif
                  @else
                  <option>{{ $domaine->nomDomaine }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              @elseif ($idSousCat == '54')
              <div class="input-hide" style="position:absolute;">
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
                <select class="form-control" name="domaine-emploi">
                  <option value="">Sélectionner</option>
                  @foreach ($dataSelected as $domaine)
                  @if (isset($_GET['domaine-emploi']))
                  @if ($_GET['domaine-emploi'] == $domaine->nomDomaine)
                  <option selected>{{ $domaine->nomDomaine}}</option>
                  @else
                  <option>{{ $domaine->nomDomaine }}</option>
                  @endif
                  @else
                  <option>{{ $domaine->nomDomaine }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              @elseif ($idSousCat == '16')
              <div class="input-hide" style="position:absolute;">
                <input type="text" class="form-control" name="prix-de" placeholder="de"
                  value="{{ isset($_GET['prix-de']) ? $_GET['prix-de'] : '' }}">
                <input type="text" class="form-control" name="prix-a" placeholder="à"
                  value="{{ isset($_GET['prix-a']) ? $_GET['prix-a'] : '' }}">
                <select class="form-control" name="marque-telephone" size="10">
                  <option value="">Sélectionner</option>
                  @foreach ($dataSelected as $marque)
                  @if (isset($_GET['marque-telephone']))
                  @if ($_GET['marque-telephone'] == $marque->marque)
                  <option selected>{{ $marque->marque}}</option>
                  @else
                  <option>{{ $marque->marque }}</option>
                  @endif
                  @else
                  <option>{{ $marque->marque }}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              @elseif ($idSousCat == '36')
              <div class="input-hide" style="position:absolute;">
                <input type="text" class="form-control" name="prix-de" placeholder="de"
                  value="{{isset($_GET['prix-de']) ? $_GET['prix-de'] : ''}}">
                <input type="text" class="form-control" name="prix-a" placeholder="à"
                  value="{{isset($_GET['prix-a']) ? $_GET['prix-a'] : ''}}">
                <select class="form-control" name="type-Stockage">
                  <option value="">Sélectionner</option>
                  @if (isset($_GET['type-Stockage']))
                  <option {{ $_GET['type-Stockage'] == 'Flash disque' ? 'selected' : ''}}>Flash disque</option>
                  <option {{ $_GET['type-Stockage'] == 'Disque dur externe' ? 'selected' : ''}}>Disque dur externe
                  </option>
                  <option {{ $_GET['type-Stockage'] == 'Disque dur interne' ? 'selected' : ''}}>Disque dur interne
                  </option>
                  <option {{ $_GET['type-Stockage'] == 'Carte mémoire' ? 'selected' : ''}}>Carte mémoire</option>
                  @else
                  <option>Flash disque</option>
                  <option>Disque dur externe</option>
                  <option>Disque dur interne</option>
                  <option>Carte mémoire</option>
                  @endif
                </select>
              </div>
              @elseif ($idSousCat == '6' or $idSousCat == '7' or $idSousCat == '8' or $idSousCat == '9' or $idSousCat ==
              '10' or $idSousCat == '11' or $idSousCat == '12' or $idSousCat == '13')
              <div class="input-hide" style="position:absolute;">
                <input type="text" class="form-control" name="prix-de" placeholder="de"
                  value="{{ isset($_GET['prix-de']) ? $_GET['prix-de'] : '' }}">
                <input type="text" class="form-control" name="prix-a" placeholder="à"
                  value="{{ isset($_GET['prix-a']) ? $_GET['prix-a'] : '' }}">
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
                <input class="form-control" name="anne" id="anne" type="text" placeholder="Année"
                  value="{{ isset($_GET['anne']) ? $_GET['anne'] : '' }}">
                <input class="form-control" name="kilom" id="kilom" type="text" placeholder="Kilomètrage"
                  value="{{ isset($_GET['kilom']) ? $_GET['kilom'] : '' }}">
                <select class="form-control" name="type-Carburant">
                  <option value="">Sélectionner</option>
                  @if (isset($_GET['type-Carburant']))
                  <option {{ $_GET['type-Carburant'] == 'Essence' ? 'selected' : '' }}>Essence</option>
                  <option {{ $_GET['type-Carburant'] == 'Gas oil' ? 'selected' : '' }}>Gas oil</option>
                  <option {{ $_GET['type-Carburant'] == 'GPL' ? 'selected' : '' }}>GPL</option>
                  <option {{ $_GET['type-Carburant'] == 'Eléctrique' ? 'selected' : '' }}>Eléctrique</option>
                  @else
                  <option>Essence</option>
                  <option>Gas oil</option>
                  <option>GPL</option>
                  <option>Eléctrique</option>
                  @endif
                </select>
              </div>
              @elseif ($idSousCat == '37')
              <div class="input-hide" style="position:absolute;">
                <input type="text" class="form-control" name="prix-de" placeholder="de"
                  value="{{ isset($_GET['prix-de']) ? $_GET['prix-de'] : '' }}">
                <input type="text" class="form-control" name="prix-a" placeholder="à"
                  value="{{ isset($_GET['prix-a']) ? $_GET['prix-a'] : '' }}">
                <select class="form-control" name="marque-ordinateur" size="10">
                  <option value="">Sélectionner</option>
                  @foreach ($dataSelected as $marque)
                  @if (isset($_GET['marque-ordinateur']))
                  @if ($_GET['marque-ordinateur'] == $marque->marque)
                  <option selected>{{ $marque->marque}}</option>
                  @else
                  <option>{{ $marque->marque }}</option>
                  @endif
                  @else
                  <option>{{ $marque->marque }}</option>
                  @endif
                  @endforeach
                </select>
                <select class="form-control" name="taille-ordinateur" size="5">
                  <option value="">Sélectionner</option>
                  @if (isset($_GET['taille-ordinateur']))
                  <option {{ $_GET['taille-ordinateur'] == '14 po ou moins' ? 'selected' : '' }}>14 po ou moins</option>
                  <option {{ $_GET['taille-ordinateur'] == '15 po' ? 'selected' : '' }}>15 po</option>
                  <option {{ $_GET['taille-ordinateur'] == '16 po' ? 'selected' : '' }}>16 po</option>
                  <option {{ $_GET['taille-ordinateur'] == '17 po ou plus' ? 'selected' : '' }}>17 po ou plus</option>
                  @else
                  <option>14 po ou moins</option>
                  <option>15 po</option>
                  <option>16 po</option>
                  <option>17 po ou plus</option>
                  @endif
                </select>
              </div>
              @elseif ($idSousCat == '2')
              <div class="input-hide" style="position:absolute;">
                <input class="form-control" name="datetimeEvent" type="datetime-local"
                  value="{{ isset($_GET['datetimeEvent']) ? $_GET['datetimeEvent'] : '' }}">
                <input class="form-control" name="du" type="date" value="{{ isset($_GET['du']) ? $_GET['du'] : '' }}">
                <input class="form-control" name="au" type="date" value="{{ isset($_GET['au']) ? $_GET['au'] : '' }}">
              </div>
              @endif
              @elseif ($catégorie == 'Catégorie')
              <div class="input-hide" style="position:absolute;">
                <input type="hidden" class="form-control" name="filterPerCat" value="filterPerCat">
                <input class="form-control" name="wilaya" value="{{isset($_POST['wilaya']) ? $_POST['wilaya'] : ''}}">
                @if ($filter <> '')
                  <input type="hidden" class="form-control" name="filterKey" value="{{$filter}}">
                  @endif
              </div>
              @endif
              <label>
                <select name="order" class="orderby" onchange="this.form.submit()">
                  @if ($orderSelected <> '')
                    <option value="menu-order">Ordre de tri</option>
                    <option {{ $orderSelected == 'mostrecent' ? 'selected' : '' }} value="mostrecent">Les plus récentes
                    </option>
                    <option {{ $orderSelected == 'lessrecent' ? 'selected' : '' }} value="lessrecent">Les moins récentes
                    </option>
                    <option {{ $orderSelected == 'popularity' ? 'selected' : '' }} value="popularity">Les plus
                      populaires</option>
                    <option {{ $orderSelected == 'priceAsc' ? 'selected' : '' }} value="priceAsc">Prix: Faible à élevé
                    </option>
                    <option {{ $orderSelected == 'priceDesc' ? 'selected' : '' }} value="priceDesc">Prix: Elevé à faible
                    </option>
                    @else
                    <option selected="selected" value="menu-order">Ordre de tri</option>
                    <option value="mostrecent">Les plus récentes</option>
                    <option value="lessrecent">Les moins récentes</option>
                    <option value="popularity">Les plus populaires</option>
                    <option value="priceAsc">Prix: Faible à élevé</option>
                    <option value="priceDesc">Prix: Elevé à faible</option>
                    @endif
                </select>
              </label>
            </form>
          </div>
        </div>
        <!-- Product filter End -->

        <!-- Adds wrapper Start -->
        <div class="adds-wrapper">
          @foreach ($data as $result)
          <div class="item-list" data-store="{{$result->prix.$result->id}}" data-price="{{$result->prix}}"
            data-views="{{$result->numberViews}}" data-date="{{$result->created_at}}">
            <div class="col-sm-2 no-padding photobox">
              <div class="add-image">
                @foreach ($search as $cat)
                @if ($cat->idCat == $result->id_Cat)
                <a
                  href="/details/{{$result->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $result->titre)}}/{{str_replace(' ', '-', $result->wilaya)}}">
                  @endif
                  @endforeach
                  @if ($result->hasPicture == '1')
                  @foreach ($imageAd as $img)
                  @if ($result->id == $img->id_annonce)
                  <img data-src="{{Storage::disk('s3')->url($img->imagename)}}" alt="" loading="lazy"
                    class="lazyload" />
                  @endif
                  @endforeach
                  @else
                  <img data-src="{{asset('img/nopicture.png')}}" alt="" loading="lazy" class="lazyload" /></a>
                @endif
                <span class="photo-count"><i class="fa fa-camera"></i></span>
              </div>
            </div>
            <div class="col-sm-7 add-desc-box">
              <div class="add-details">
                @foreach ($search as $cat)
                @if ($cat->idCat == $result->id_Cat)
                <h5 class="add-title" id="details-title"><a
                    href="/details/{{$result->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $result->titre)}}/{{str_replace(' ', '-', $result->wilaya)}}">{{$result->titre}}</a>
                </h5>
                @endif
                @endforeach
                <div class="info">
                  <span class="date">
                    <i class="fa fa-clock"></i>
                    {{\Carbon\Carbon::parse($result->created_at)->diffForHumans()}}
                  </span> -
                  <span class="item-location"><i class="fa fa-map-marker"></i> {{$result->wilaya}}</span>
                </div>
                <div class="item_desc">
                  @foreach ($search as $cat)
                  @if ($cat->idCat == $result->id_Cat)
                  <a
                    href="/details/{{$result->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $result->titre)}}/{{str_replace(' ', '-', $result->wilaya)}}">{{Str::limit($result->description, 30)}}</a>
                  @endif
                  @endforeach
                </div>
              </div>
            </div>
            <div class="col-sm-3 text-right  price-box">
              <h2 class="item-price" data-test="{{$result->prix}}"> {{$result->prix <> '' ? $result->prix.'DA' : '' }}
              </h2>
              @auth
              @if (App\favoris::where('idUser', Auth::user()->id)->where('id_annonce', $result->id)->count() <> 0)
                <a disabled="disabled" class="btn btn-danger btn-sm" title="L'annonce a déjà été ajoutée aux favoris"><i
                    class="fa fa-heart"></i>
                  <span>Favori</span></a>
                @elseif (App\annonce::where('id_user', Auth::user()->id)->where('id', $result->id)->count() <> 0)
                  <a disabled="disabled" class="btn btn-danger btn-sm"
                    title="Vous êtes le propriétaire de cette annonce!"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @else
                  <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris"
                    onclick="namespaceActions.addToFav({{$result->id}})"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @endif
                  @else
                  <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris"
                    onclick="namespaceActions.addToFav({{$result->id}})"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @endauth
                  <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i>
                    <span>{{$result->numberViews}}</span> </a>
            </div>
          </div>
          @endforeach
        </div>
        <!-- Adds wrapper End -->

        <div class="row" id="pagination">
          <div class="col-sm-12">

            <!-- Start Pagination -->
            {{ $data->appends(request()->input())->links() }}
            <!-- End Pagination -->

          </div>
        </div>
        @else

        <div class="alert alert-warning" role="alert">
          <i class="fa fa-exclamation-triangle"> Désolé, aucun résultat n'a été trouvé </i>
        </div>

        @endif

        <div class="post-promo text-center">
          <h2> Avez-vous quelque chose à vendre ?</h2>
          <h5>Vendez vos produits en ligne GRATUITEMENT. C'est plus facile que vous ne le pensez!</h5>
          <a href="/add-Ad" class="btn btn-post btn-danger">Publier une annonce </a>
        </div>
    </div>
  </div>
</div>
</div>
<!-- Main container End -->
@endsection