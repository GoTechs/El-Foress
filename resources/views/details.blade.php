
    @extends('layout')

    @section('content')

    <!-- Start Content -->
    <div id="content">
      <div class="container">
        <div class="row">
          <!-- Product Info Start -->          
            <div class="col-sm-12  col-lg-10 ads-details-wrapper">
              <div class="inner-box" id="details-left">
                @if ($annonce->etat <> "")
                  <p class="item-intro"><strong> {{__('details.state_info')}} : </strong> <span class="poster"> {{$annonce->etat}}</span></p>
                @endif
              <div id="details-img">
                @if ($annonce->hasPicture == '1')
                    @foreach ($images as $key => $value) 
                  @if ($key == 0)                   
                    <p>
                      <a href="{{Storage::disk('s3')->url($value->imagename)}}" 
                        data-fancybox="images-preview" 
                        data-width="1500" data-height="1000">
                        <img src="{{Storage::disk('s3')->url($value->imagename)}}" />
                      </a>
                    </p>
                  @else                   
                  <div style="display: none;">
                    <a href="{{Storage::disk('s3')->url($value->imagename)}}" data-fancybox="images-preview" 
                      data-width="1500" data-height="1000"><img src="{{Storage::disk('s3')->url($value->imagename)}}" /></a>
                  </div>
                  @endif
              
                    @endforeach
                  @else 
                  <img id="details-img" src="{{asset('img/nopicture.png')}}" alt="">
                @endif 
              </div>   
            </div>
              <div class="inner-box" id="details">
                <h4 id="details-title">{{$annonce->titre}}</h4>
                @if ($annonce->prix <> "") <h3 id="details-price" >{{$annonce->prix}} DA</h3> @endif
                <p class="item-intro"><span class="poster">{{__('details.publish_info')}} <span class="ui-bubble is-member">{{$user->username}} - </span> <span class="date"> {{\Carbon\Carbon::parse($annonce->created_at)->diffForHumans()}}</span> - <span class="location">{{$annonce->wilaya}}</span></p>
                  
                <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris" onclick="addToFav({{$annonce->id}})"><i class="fa fa-heart"></i>
                  <span>Favori</span></a>
                <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i> <span>{{$annonce->numberViews}}</span> </a>
                <div class="row" id="right-details">
                <div class="user-details col-md-12">
                  @if ($annonce->phoneHide == "0" and $annonce->phoneNumber <> "" or $annonce->email <> "")
                      <aside class="panel panel-body panel-details">
                        <ul>  
                        @if ($annonce->phoneHide == "0" and $annonce->phoneNumber <> "") 
                          <li>
                            <p class="no-margin"><i class=" fa fa-phone"></i> <strong> {{__('details.phone_info')}} : </strong> {{$annonce->phoneNumber}}
                            <a href="tel:{{$annonce->phoneNumber}}"></a>
                          </li>
                          @endif
                          <li>
                          @if ($annonce->email <> "")
                            <li>
                              <p class="no-margin"><i class="fa fa-envelope"></i> <strong> {{__('details.email_info')}} : </strong> {{$annonce->email}} </a></li>
                            <li>
                            @endif                  
                        </ul>
                      </aside> 
                      @endif                    
                    </div>
                    <div class="ads-details-info col-md-12">
                    <aside class="panel panel-body panel-details">
                      <h4 id="details-title">Description</h4>
                      <p class="mb15" id="details-description">{{$annonce->description}}</p>
                      <ul class="list-circle">
                        @if ($categorie == '3')

                        <li id="details-description">{{$result->typeBien ? __('details.type_property_info').' : '.$result->typeBien : '' }}</li>
                        <li id="details-description">{{$result->superficie ? __('details.surface_info'). ' : ' .$result->superficie  : '' }}</li>
                        <li id="details-description">{{$result->nbrePiece ? __('details.number_piece_info').' : '.$result->nbrePiece  : '' }}</li>
                        <li id="details-description">{{$result->etage ? __('details.etage_info').' : '.$result->etage : '' }}</li>

                        @elseif ($sousCategorie == '2')

                        <li id="details-description">{{$result->dateHeureEvent ? __('details.date_event_info').' : '.$result->dateHeureEvent : '' }}</li>
                        <li id="details-description"{{$result->du ? __('details.from_event_info').' : '.$result->du  : '' }}</li>
                        <li id="details-description">{{$result->au ? __('details.to_event_info').' : '.$result->au  : '' }}</li>

                        @elseif ($sousCategorie == '53')

                        <li id="details-description">{{$result->domaine ? __('details.work_domain').' : '.$result->domaine : '' }}</li>
                        <li id="details-description"> {{$result->entreprise ? __('details.entreprise').' : '.$result->entreprise : '' }}</li>
                        <li id="details-description">{{$result->adresse ? __('details.adresse').' : '.$result->adresse : '' }}</li>
                        <li id="details-description">{{$result->poste ? __('details.poste').' : '.$result->poste : '' }}</li>
                        <li id="details-description">{{$result->salaire ? __('details.salaire').' : '.$result->salaire : '' }}</li>
                        <li id="details-description">{{$result->diplomeRequis ? __('details.diplome_requis').' : '.$result->diplomeRequis : '' }}</li>

                        @elseif ($sousCategorie == '54')

                        <li id="details-description">{{$result->sexe ? __('details.sexe').' : '.$result->sexe  : '' }}</li>
                        <li id="details-description">{{$result->domaine ?  __('details.work_domain').' : '.$result->domaine  : '' }}</li>
                        <li id="details-description">{{$result->age ? __('details.age_info').' : '.$result->age  : '' }}</li>
                        <li id="details-description">{{$result->poste ? __('details.poste').' : '.$result->poste  : '' }}</li>
                        <li id="details-description">{{$result->niveau ? __('details.niveau_education').' : '.$result->niveau  : '' }}</li>
                        <li id="details-description">{{$result->diplome ? __('details.diplome_info').' : '.$result->diplome  : '' }}</li>
                        <li id="details-description">{{$result->anneExp ? __('details.year_experience').' : '.$result->anneExp : '' }}</li>

                        @elseif ($sousCategorie <> '14' and $categorie == '4')
                        
                        <li id="details-description">{{$result->marque ? __('details.marque').' : '.$result->marque  : '' }}</li>
                        <li id="details-description">{{$result->modele ? __('details.modele').' : '.$result->modele  : '' }}</li>
                        <li id="details-description">{{$result->annee ? __('details.year').' : '.$result->annee  : '' }}</li>
                        <li id="details-description"> {{$result->kilometrage ? __('details.kilom_info').' : '.$result->kilometrage  : '' }}</li>
                        <li id="details-description"> {{$result->typeCarb ? __('details.type_carb').' : '.$result->typeCarb  : '' }}</li>

                        @elseif ($sousCategorie == '16')

                        <li id="details-description">{{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                        <li id="details-description">{{$result->modele ? __('details.modele').' : '.$result->modele : '' }}</li>

                        @elseif ($sousCategorie == '36')

                        <li id="details-description">{{$result->type ? __('details.type_info').' : '.$result->type : '' }}</li>
                        <li id="details-description">{{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                        <li id="details-description">{{$result->capacite ? __('details.capacite_info').' : '.$result->capacite : '' }}</li>

                        @elseif ($sousCategorie == '37')

                        <li id="details-description">{{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                        <li id="details-description">{{$result->tailleEcran ? __('details.taille_ecran').' : '.$result->tailleEcran : '' }}</li>                       
                        <li id="details-description">{{$result->processeur ? __('details.processeur').' : '.$result->processeur : '' }}</li>
                        <li id="details-description">{{$result->ram ? __('details.memoire_ram').' : '.$result->ram : '' }}</li>
                        <li id="details-description">{{$result->tailleDisque ? __('details.taille_disque').' : '.$result->tailleDisque : '' }}</li>
                        
                        @endif
                      </ul>
                    </aside>
                    </div>                  
                  </div>                
                </div>
            </div>
             <div class="col-sm-12 col-lg-2">
              <div class="inner-box">                
                <img src="{{asset('img/pub/pubmobilis.jpg')}}" alt="">
              </div>        
            </div>
          @if ($relatedAd <> [])
            <!-- Adds wrapper Start -->                     
            <div class="row"> 
              <div class="col-sm-12  col-lg-10">                 
                <div class="adds-wrapper">              
                  @foreach ($relatedAd as $relatedAd)
                  <div class="item-list" data-store="{{$relatedAd->prix.$relatedAd->id}}" data-price="{{$relatedAd->prix}}" data-views="{{$relatedAd->numberViews}}" data-date="{{$relatedAd->created_at}}">
                    <div class="col-sm-2 no-padding photobox">
                      <div class="add-image">
                        <a href="/details/{{$relatedAd->id}}">
                          
                        @if ($relatedAd->hasPicture == '1')
                        @foreach ($imageAd as $img) 
                          @if ($relatedAd->id == $img->id_annonce)
                            <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                          @endif
                        @endforeach
                      @else 
                        <img src="{{asset('img/nopicture.png')}}" alt=""></a>
                      @endif
                  
                        <span class="photo-count"><i class="fa fa-camera"></i></span>
                      </div>
                    </div>
                    <div class="col-sm-7 add-desc-box">
                      <div class="add-details">
                        <h5 class="add-title"><a href="/details/{{$relatedAd->id}}">{{$relatedAd->titre}}</a></h5>
                        <div class="info">
                          
                          <span class="date">
                            <i class="fa fa-clock"></i>
                            {{\Carbon\Carbon::parse($relatedAd->created_at)->diffForHumans()}}
                          </span> -
                          <span class="item-location"><i class="fa fa-map-marker"></i> {{$relatedAd->wilaya}}</span>
                        </div>
                        <div class="item_desc">
                          <a href="/details/{{$relatedAd->id}}">{{Str::limit($relatedAd->description, 30)}}</a>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3 text-right  price-box">
                      <h2 class="item-price" data-test="{{$relatedAd->prix}}"> {{$relatedAd->prix <> '' ? $relatedAd->prix.'DA' : '' }}</h2>
                      <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris" onclick="addToFav({{$relatedAd->id}})"><i class="fa fa-heart"></i>
                      <span>Favori</span></a>
                      <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i> <span>{{$relatedAd->numberViews}}</span> </a>
                    </div>
                  </div>    
                  @endforeach
                </div>                          
              </div>
            </div>
            <!-- Adds wrapper End -->
          @endif
          </div>
      </div>         
    </div>

    <!-- End Content -->

    @endsection