
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
                <p class="item-intro"><span class="poster">{{__('details.publish_info')}} <span class="ui-bubble is-member">{{$user->username}} - </span> <span class="date"> {{\Carbon\Carbon::parse($annonce->created_at)->diffForHumans()}}</span> - <span class="location">{{$annonce->wilaya}}</span></p>
                @if ($annonce->etat <> "")
                  <p class="item-intro"><strong> {{__('details.state_info')}} : </strong> <span class="poster"> {{$annonce->etat}}</span></p>
                @endif             
                <div class="fotorama">
                @if ($annonce->hasPicture == '1')
                  @foreach ($images as $image)
                  <img src="{{Storage::disk('s3')->url($image->imagename)}}">
                  @endforeach
                @else 
                <img src="{{asset('img/nopicture.png')}}" alt=""></a>
                @endif
                </div>

              </div>

              <div class="box">
                <h2 class="title-2"><strong>{{__('details.details_title')}}</strong></h2>
                  <div class="row">
                  <div class="ads-details-info col-md-7">
                    <p class="mb15">{{$annonce->description}}</p>
                    <ul class="list-circle">
                      @if ($categorie == '3')

                       <li>{{$result->typeBien ? __('details.type_property_info').' : '.$result->typeBien : '' }}</li>
                       <li>{{$result->superficie ? __('details.surface_info'). ' : ' .$result->superficie  : '' }}</li>
                       <li>{{$result->nbrePiece ? __('details.number_piece_info').' : '.$result->nbrePiece  : '' }}</li>
                       <li>{{$result->etage ? __('details.etage_info').' : '.$result->etage : '' }}</li>

                       @elseif ($sousCategorie == '2')

                       <li>{{$result->dateHeureEvent ? __('details.date_event_info').' : '.$result->dateHeureEvent : '' }}</li>
                       <li>{{$result->du ? __('details.from_event_info').' : '.$result->du  : '' }}</li>
                       <li>{{$result->au ? __('details.to_event_info').' : '.$result->au  : '' }}</li>

                       @elseif ($sousCategorie == '53')

                       <li>{{$result->domaine ? __('details.work_domain').' : '.$result->domaine : '' }}</li>
                       <li>{{$result->entreprise ? __('details.entreprise').' : '.$result->entreprise : '' }}</li>
                       <li>{{$result->adresse ? __('details.adresse').' : '.$result->adresse : '' }}</li>
                       <li>{{$result->poste ? __('details.poste').' : '.$result->poste : '' }}</li>
                       <li>{{$result->salaire ? __('details.salaire').' : '.$result->salaire : '' }}</li>
                       <li>{{$result->diplomeRequis ? __('details.diplome_requis').' : '.$result->diplomeRequis : '' }}</li>

                       @elseif ($sousCategorie == '54')

                       <li>{{$result->sexe ? __('details.sexe').' : '.$result->sexe  : '' }}</li>
                       <li>{{$result->domaine ?  __('details.work_domain').' : '.$result->domaine  : '' }}</li>
                       <li>{{$result->age ? __('details.age_info').' : '.$result->age  : '' }}</li>
                       <li>{{$result->poste ? __('details.poste').' : '.$result->poste  : '' }}</li>
                       <li>{{$result->niveau ? __('details.niveau_education').' : '.$result->niveau  : '' }}</li>
                       <li>{{$result->diplome ? __('details.diplome_info').' : '.$result->diplome  : '' }}</li>
                       <li>{{$result->anneExp ? __('details.year_experience').' : '.$result->anneExp : '' }}</li>

                       @elseif ($sousCategorie <> '14' and $categorie == '4')
                       
                       <li>{{$result->marque ? __('details.marque').' : '.$result->marque  : '' }}</li>
                       <li>{{$result->modele ? __('details.modele').' : '.$result->modele  : '' }}</li>
                       <li>{{$result->annee ? __('details.year').' : '.$result->annee  : '' }}</li>
                       <li>{{$result->kilometrage ? __('details.kilom_info').' : '.$result->kilometrage  : '' }}</li>
                       <li>{{$result->typeCarb ? __('details.type_carb').' : '.$result->typeCarb  : '' }}</li>

                       @elseif ($sousCategorie == '16')

                       <li>{{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                       <li>{{$result->modele ? __('details.modele').' : '.$result->modele : '' }}</li>

                       @elseif ($sousCategorie == '36')

                       <li>{{$result->type ? __('details.type_info').' : '.$result->type : '' }}</li>
                       <li>{{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                       <li>{{$result->capacite ? __('details.capacite_info').' : '.$result->capacite : '' }}</li>

                       @elseif ($sousCategorie == '37')

                       <li>{{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                       <li>{{$result->tailleEcran ? __('details.taille_ecran').' : '.$result->tailleEcran : '' }}</li>                       
                       <li>{{$result->processeur ? __('details.processeur').' : '.$result->processeur : '' }}</li>
                       <li>{{$result->ram ? __('details.memoire_ram').' : '.$result->ram : '' }}</li>
                       <li>{{$result->tailleDisque ? __('details.taille_disque').' : '.$result->tailleDisque : '' }}</li>
                       
                      @endif
                    </ul>
                  </div>
                  <div class="col-md-5">
                    <aside class="panel panel-body panel-details">
                      <ul>
                        @if ($annonce->prix <> "")
                          <li>
                            <p class="no-margin"><strong> {{__('details.price_info')}} : </strong> {{$annonce->prix}} DA</a></li>
                          <li>
                        @endif
                        @if ($annonce->phoneHide == "0" and $annonce->phoneNumber <> "")
                         <li>
                          <p class="no-margin"><i class=" fa fa-phone"></i> <strong> {{__('details.phone_info')}} : </strong> {{$annonce->phoneNumber}} </a>
                        </li>
                        @endif
                        <li>
                        @if ($annonce->email <> "")
                          <li>
                            <p class="no-margin"><i class="fa fa-envelope"></i> <strong> {{__('details.email_info')}} : </strong> {{$annonce->email}} </a></li>
                          <li>
                        @endif
                        <li>
                            <p class="no-margin"><i class="fa fa-eye"></i> <strong> {{__('details.number_visit_info')}} : </strong> {{$annonce->numberViews}} </a></li>
                          <li>
                        <li>
                          <p class=" no-margin "><i class=" fa fa-user"></i> {{__('details.publish_info')}} {{$user->username}}</a>
                        </li>

                        <li>
                        <a href="#" title="{{__('details.favorits_add')}}" onclick="addToFav({{$annonce->id}})"> <i class=" fa fa-heart"></i> {{__('details.favorits')}}</a>
                        </li>
                      </ul>
                    </aside>                    
                  </div>
                </div>                
              </div>
            </div>
             <div class="col-sm-4">
              <div class="inner-box">
                
                <img src="{{asset('img/pub/pubmobilis.jpg')}}" alt="">
              </div>        
            </div>
          </div>
      </div>         
    </div>

    <!-- End Content -->

    @endsection