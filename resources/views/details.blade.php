
    @extends('layout')

    @section('content')

    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <!-- Product Info Start -->          
            <div class="col-sm-8">
              <div class="inner-box ads-details-wrapper">
                <h2>{{$annonce->titre}}</h2>
                <p class="item-intro"><span class="poster">Publié par <span class="ui-bubble is-member">{{$user->username}} - </span> <span class="date"> {{$annonce->created_at}}</span> - <span class="location">{{$annonce->wilaya}}</span></p>
                @if ($annonce->etat <> "")
                  <p class="item-intro"><strong> État : </strong> <span class="poster"> {{$annonce->etat}}</span></p>
                @endif             
                <div class="fotorama">
                  @foreach ($images as $image)
                  <img src="{{asset('images/'.$image->imagename)}}">
                  @endforeach
                </div>

              </div>

              <div class="box">
                <h2 class="title-2"><strong>Détails</strong></h2>
                  <div class="row">
                  <div class="ads-details-info col-md-7">
                    <p class="mb15">{{$annonce->description}}</p>
                    <ul class="list-circle">
                      @if ($categorie == '3')

                       <li>{{$result->typeBien ? ' Type du bien : '.$result->typeBien : '' }}</li>
                       <li>{{$result->superficie ? ' Superficie : '.$result->superficie  : '' }}</li>
                       <li>{{$result->nbrePiece ? ' Nombre de pièces : '.$result->nbrePiece  : '' }}</li>
                       <li>{{$result->etage ? ' Étage : '.$result->etage : '' }}</li>

                       @elseif ($sousCategorie == '2')

                       <li>{{$result->dateHeureEvent ? ' Date et heure de l\'événement : '.$result->dateHeureEvent : '' }}</li>
                       <li>{{$result->du ? ' Du : '.$result->du  : '' }}</li>
                       <li>{{$result->au ? ' Au : '.$result->au  : '' }}</li>

                       @elseif ($sousCategorie == '53')

                       <li>{{$result->domaine ? ' Domaine d\'emploi : '.$result->domaine : '' }}</li>
                       <li>{{$result->entreprise ? ' Entreprise : '.$result->entreprise : '' }}</li>
                       <li>{{$result->adresse ? ' Adresse : '.$result->adresse : '' }}</li>
                       <li>{{$result->poste ? ' Poste : '.$result->poste : '' }}</li>
                       <li>{{$result->salaire ? ' Salaire : '.$result->salaire : '' }}</li>
                       <li>{{$result->diplomeRequis ? ' Diplôme requis : '.$result->diplomeRequis : '' }}</li>

                       @elseif ($sousCategorie == '54')

                       <li>{{$result->sexe ? ' Sexe : '.$result->sexe  : '' }}</li>
                       <li>{{$result->domaine ? ' Domaine d\'emploi : '.$result->domaine  : '' }}</li>
                       <li>{{$result->age ? ' Âge : '.$result->age  : '' }}</li>
                       <li>{{$result->poste ? ' Poste : '.$result->poste  : '' }}</li>
                       <li>{{$result->niveau ? ' Niveau d\'éducation : '.$result->niveau  : '' }}</li>
                       <li>{{$result->diplome ? ' Diplôme : '.$result->diplome  : '' }}</li>
                       <li>{{$result->anneExp ? ' Année d\'expérience : '.$result->anneExp : '' }}</li>

                       @elseif ($sousCategorie <> '14' and $categorie == '4')
                       
                       <li>{{$result->marque ? ' Marque : '.$result->marque  : '' }}</li>
                       <li>{{$result->modele ? ' Modèle : '.$result->modele  : '' }}</li>
                       <li>{{$result->annee ? ' Année : '.$result->annee  : '' }}</li>
                       <li>{{$result->kilometrage ? ' Kilomètrage : '.$result->kilometrage  : '' }}</li>
                       <li>{{$result->typeCarb ? ' Type carburant : '.$result->typeCarb  : '' }}</li>

                       @elseif ($sousCategorie == '16')

                       <li>{{$result->marque ? ' Marque : '.$result->marque : '' }}</li>
                       <li>{{$result->modele ? ' Modèle : '.$result->modele : '' }}</li>

                       @elseif ($sousCategorie == '36')

                       <li>{{$result->type ? ' Type : '.$result->type : '' }}</li>
                       <li>{{$result->marque ? ' Marque : '.$result->marque : '' }}</li>
                       <li>{{$result->capacite ? ' Capacité : '.$result->capacite : '' }}</li>

                       @elseif ($sousCategorie == '37')

                       <li>{{$result->marque ? ' Marque : '.$result->marque : '' }}</li>
                       <li>{{$result->tailleEcran ? ' Taille de l\'écran : '.$result->tailleEcran : '' }}</li>                       
                       <li>{{$result->processeur ? ' Processeur : '.$result->processeur : '' }}</li>
                       <li>{{$result->ram ? ' Mémoire RAM : '.$result->ram : '' }}</li>
                       <li>{{$result->tailleDisque ? ' Taille du disque : '.$result->tailleDisque : '' }}</li>
                       
                      @endif
                    </ul>
                  </div>
                  <div class="col-md-5">
                    <aside class="panel panel-body panel-details">
                      <ul>
                        @if ($annonce->prix <> "")
                          <li>
                            <p class="no-margin"><strong> Prix : </strong> {{$annonce->prix}} DA</a></li>
                          <li>
                        @endif
                        @if ($annonce->phoneHide == "0" and $annonce->phoneNumber <> "")
                         <li>
                          <p class="no-margin"><i class=" fa fa-phone"></i> <strong> N° Téléphone : </strong> {{$annonce->phoneNumber}} </a>
                        </li>
                        @endif
                        <li>
                        @if ($annonce->email <> "")
                          <li>
                            <p class="no-margin"><i class="fa fa-envelope"></i> <strong> Email : </strong> {{$annonce->email}} </a></li>
                          <li>
                        @endif
                        <li>
                            <p class="no-margin"><i class="fa fa-eye"></i> <strong> Nombre de visiteurs : </strong> {{$annonce->numberViews}} </a></li>
                          <li>
                        <li>
                          <p class=" no-margin "><i class=" fa fa-user"></i> Publié par {{$user->username}}</a>
                        </li>

                        <li>
                        <a href="#" title="Cliquez pour ajouter à mes favoris" onclick="addToFav({{$annonce->id}})"> <i class=" fa fa-heart"></i> Favoris</a>
                        </li>
                      </ul>
                    </aside>                    
                  </div>
                </div>                
              </div>
            </div>
             <div class="col-sm-4">
              <div class="inner-box">
                
                <img src="{{asset('img/pubmobilis.jpg')}}" alt="">
              </div>        
            </div>
          </div>
      </div>         
    </div>

    <!-- End Content -->

    @endsection