
    @extends('layout')

    @section('content')

    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <!-- Product Info Start -->
          <div class="product-info">
            <div class="col-sm-8">
              <div class="inner-box ads-details-wrapper">
                <h2>{{$annonce->titre}}</h2>
                <p class="item-intro"><span class="poster">Publié par <span class="ui-bubble is-member">{{$user->username}} - </span> <span class="date"> {{$annonce->created_at}}</span> - <span class="location">{{$annonce->wilaya}}</span></p>             
                <div class="fotorama">
                  @foreach ($images as $image)
                  <img src="{{asset('images/'.$image->imagename)}}">
                  @endforeach
                </div>

              </div>

              <div class="box">
                <h2 class="title-2"><strong>Détails</strong></h2>
                  <div class="row">
                  <div class="ads-details-info col-md-8">
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

                       <li>{{$result->vente ? $result->vente  : '' }}</li>
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
                  <div class="col-md-4">
                    <aside class="panel panel-body panel-details">
                      <ul>
                        <li>
                        <p class=" no-margin "><strong>Price:</strong> $1,245</p>
                        </li>
                        <li>
                        <p class="no-margin"><strong>Type:</strong> <a href="#">Electronics</a>, <a href="#">For sale</a></p>
                        </li>
                        <li>
                        <p class="no-margin"><strong>Location:</strong> <a href="#">New York</a></p>
                        </li>
                        <li>
                        <p class=" no-margin "><strong>Condition:</strong> New</p>
                        </li>
                        <li>
                        <p class="no-margin"><strong>Brand:</strong> <a href="#">Apple</a></p>
                        </li>
                      </ul>
                    </aside>

                    <div class="ads-action">
                      <ul class="list-border">
                        <li>
                          <a href="#"> <i class=" fa fa-phone"></i> 022445167532 </a></li>
                        <li>
                        <li>
                          <a href="#">Posted by <i class=" fa fa-user"></i> John</a></li>
                        <li>
                          <a href="#"> <i class=" fa fa-heart"></i> Save ad</a></li>
                        <li>
                          <a href="#"> <i class="fa fa-share-alt"></i> Share </a>
                      <div class="social-link">  
                      <a class="twitter" target="_blank" data-original-title="twitter" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
                      <a class="facebook" target="_blank" data-original-title="facebook" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
                      <a class="google" target="_blank" data-original-title="google-plus" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
                      <a class="linkedin" target="_blank" data-original-title="linkedin" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
                      </div>

                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>         
    </div>

    <!-- End Content -->

    @endsection