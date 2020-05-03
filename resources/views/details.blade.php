@extends('profil.layout')

@section('content')

<!-- Start Content -->
<div class="main-container">
  <div class="container">
    <div class="row">
      <!-- Product Info Start -->
      <div class="col-sm-9  ads-details-wrapper">
        <div class="header-details">
          <div class="left-side">
            <h4 id="details-title">{{$annonce->titre}}</h4>
            @if ($annonce->prix <> "") <h3 id="details-price">{{$annonce->prix}} DA</h3> @endif

          </div>
          <div class="right-side">
            <p class="item-intro"><span class="poster">{{__('details.publish_info')}} <span
                  class="ui-bubble is-member">{{$user->nom}} - </span> <span class="date">
                  {{\Carbon\Carbon::parse($annonce->created_at)->diffForHumans()}}</span> - <span
                  class="location">{{$annonce->wilaya}}</span></p>
            <div class="options-btn">
              @auth
              @if (App\Models\favoris::where('idUser', Auth::user()->id)->where('id_annonce', $annonce->id)->count() <> 0)
                <a disabled="disabled" class="btn btn-danger btn-sm" title="L'annonce a déjà été ajoutée aux favoris"><i
                    class="fa fa-heart"></i>
                  <span>Favori</span></a>
                @elseif (App\Models\annonce::where('id_user', Auth::user()->id)->where('id', $annonce->id)->count() <> 0)
                  <a disabled="disabled" class="btn btn-danger btn-sm"
                    title="Vous êtes le propriétaire de cette annonce!"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @else
                  <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris"
                    onclick="namespaceActions.addToFav({{$annonce->id}})"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @endif
                  @else
                  <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris"
                    onclick="namespaceActions.addToFav({{$annonce->id}})"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @endauth
                  <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i>
                    <span>{{$annonce->numberViews}}</span> </a>
            </div>
          </div>
        </div>

        @if ($annonce->hasPicture == '1')
        <div class="inner-box" id="details-left">
          <div id="details-img">
            @if ($images->count() == '1')
            <a class="single" id="principal-image" data-fancybox="images-preview"
              href="{{Storage::disk('s3')->url($images[0]->imagename)}}">
              <img id="details-pricipale-img" data-src="{{Storage::disk('s3')->url($images[0]->imagename)}}"
                loading="lazy" class="lazyload" />
            </a>
            @else
            @foreach ($images as $key => $value)
            @if ($key == 0)
            <a id="principal-image" data-fancybox="images-preview"
              href="{{Storage::disk('s3')->url($value->imagename)}}">
              <img id="details-pricipale-img" data-src="{{Storage::disk('s3')->url($value->imagename)}}" loading="lazy"
                class="lazyload" />
            </a>
            @elseif($key < 4) <a id="secondary-image" href="{{Storage::disk('s3')->url($value->imagename)}}"
              data-fancybox="images-preview">
              <img data-src="{{Storage::disk('s3')->url($value->imagename)}}"
                style="max-width: 200px; max-height: 200px;" loading="lazy" class="lazyload" />
              </a>
              @else
              <a id="secondary-image" href="{{Storage::disk('s3')->url($value->imagename)}}"
                data-fancybox="images-preview" style="display: none;">
                <img data-src="{{Storage::disk('s3')->url($value->imagename)}}"
                  style="max-width: 200px; max-height: 200px;" loading="lazy" class="lazyload" />
              </a>
              @endif
              @endforeach
              @endif
          </div>
        </div>
        @endif

        <div class="inner-box" id="details">
          <div class="row" id="right-details">
            <div class="user-details col-md-12">
              @if ($annonce->phoneHide == "0" and $annonce->phoneNumber <> "" or $annonce->email <> "" or
                  $annonce->address <> "")
                    <div class="panel panel-body panel-details">

                      @if ($annonce->phoneHide == "0" and $annonce->phoneNumber <> "")

                        <a class="btn btn-success" id="btn-phone" href="tel:{{$annonce->phoneNumber}}">
                          <i class=" fa fa-phone"></i> {{$annonce->phoneNumber}}</a>

                        @endif
                        @if ($annonce->email <> "")

                          <a class="btn btn-success" id="btn-email" href="mailto:{{$annonce->email}}"><i
                              class="fa fa-envelope"></i> {{$annonce->email}}
                          </a>

                          @endif
                          @if ($annonce->address <> "")
                            <p class="item-intro"><i class="fa fa-map-marker"></i><strong> Adresse : </strong> <span
                                class="poster">
                                {{$annonce->address}}</span></p>
                            @endif
                    </div>
                    @endif
            </div>
            <div class="ads-details-info col-md-12 status-body-text">
              <div class="panel panel-body panel-details details-description">
                @if ($annonce->etat <> "")
                  <p class="item-intro"><strong> {{__('details.state_info')}} : </strong> <span class="poster">
                      {{$annonce->etat}}</span></p>
                  @endif
                  <h4 id="details-title">Description</h4>
                  <p class="mb15">{{$annonce->description}}</p>
                  <ul class="list-circle">
                    @if ($categorie == '3')
                    <li id="details-description">
                      {{$result->typeBien ? __('details.type_property_info').' : '.$result->typeBien : '' }}</li>
                    <li id="details-description">
                      {{$result->superficie ? __('details.surface_info'). ' : ' .$result->superficie  : '' }}</li>
                    <li id="details-description">
                      {{$result->nbrePiece ? __('details.number_piece_info').' : '.$result->nbrePiece  : '' }}</li>
                    <li id="details-description">
                      {{$result->etage ? __('details.etage_info').' : '.$result->etage : '' }}</li>

                    @elseif ($sousCategorie == '2')

                    <li id="details-description">
                      {{$result->dateHeureEvent ? __('details.date_event_info').' : '.$result->dateHeureEvent : '' }}
                    </li>
                    <li id="details-description"
                      {{$result->du ? __('details.from_event_info').' : '.$result->du  : '' }}</li> <li
                      id="details-description">{{$result->au ? __('details.to_event_info').' : '.$result->au  : '' }}
                    </li>

                    @elseif ($sousCategorie == '53')

                    <li id="details-description">
                      {{$result->domaine ? __('details.work_domain').' : '.$result->domaine : '' }}</li>
                    <li id="details-description">
                      {{$result->entreprise ? __('details.entreprise').' : '.$result->entreprise : '' }}</li>
                    <li id="details-description">
                      {{$result->adresse ? __('details.adresse').' : '.$result->adresse : '' }}</li>
                    <li id="details-description">{{$result->poste ? __('details.poste').' : '.$result->poste : '' }}
                    </li>
                    <li id="details-description">
                      {{$result->salaire ? __('details.salaire').' : '.$result->salaire : '' }}</li>
                    <li id="details-description">
                      {{$result->diplomeRequis ? __('details.diplome_requis').' : '.$result->diplomeRequis : '' }}</li>

                    @elseif ($sousCategorie == '54')

                    <li id="details-description">{{$result->sexe ? __('details.sexe').' : '.$result->sexe  : '' }}</li>
                    <li id="details-description">
                      {{$result->domaine ?  __('details.work_domain').' : '.$result->domaine  : '' }}</li>
                    <li id="details-description">{{$result->age ? __('details.age_info').' : '.$result->age  : '' }}
                    </li>
                    <li id="details-description">{{$result->poste ? __('details.poste').' : '.$result->poste  : '' }}
                    </li>
                    <li id="details-description">
                      {{$result->niveau ? __('details.niveau_education').' : '.$result->niveau  : '' }}</li>
                    <li id="details-description">
                      {{$result->diplome ? __('details.diplome_info').' : '.$result->diplome  : '' }}</li>
                    <li id="details-description">
                      {{$result->anneExp ? __('details.year_experience').' : '.$result->anneExp : '' }}</li>

                    @elseif ($sousCategorie <> '14' and $categorie == '4')

                      <li id="details-description">
                        {{$result->marque ? __('details.marque').' : '.$result->marque  : '' }}</li>
                      <li id="details-description">
                        {{$result->modele ? __('details.modele').' : '.$result->modele  : '' }}</li>
                      <li id="details-description">{{$result->annee ? __('details.year').' : '.$result->annee  : '' }}
                      </li>
                      <li id="details-description">
                        {{$result->kilometrage ? __('details.kilom_info').' : '.$result->kilometrage  : '' }}</li>
                      <li id="details-description">
                        {{$result->typeCarb ? __('details.type_carb').' : '.$result->typeCarb  : '' }}</li>

                      @elseif ($sousCategorie == '16')

                      <li id="details-description">
                        {{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                      <li id="details-description">
                        {{$result->modele ? __('details.modele').' : '.$result->modele : '' }}</li>

                      @elseif ($sousCategorie == '36')

                      <li id="details-description">{{$result->type ? __('details.type_info').' : '.$result->type : '' }}
                      </li>
                      <li id="details-description">
                        {{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                      <li id="details-description">
                        {{$result->capacite ? __('details.capacite_info').' : '.$result->capacite : '' }}</li>

                      @elseif ($sousCategorie == '37')

                      <li id="details-description">
                        {{$result->marque ? __('details.marque').' : '.$result->marque : '' }}</li>
                      <li id="details-description">
                        {{$result->tailleEcran ? __('details.taille_ecran').' : '.$result->tailleEcran : '' }}</li>
                      <li id="details-description">
                        {{$result->processeur ? __('details.processeur').' : '.$result->processeur : '' }}</li>
                      <li id="details-description">{{$result->ram ? __('details.memoire_ram').' : '.$result->ram : '' }}
                      </li>
                      <li id="details-description">
                        {{$result->tailleDisque ? __('details.taille_disque').' : '.$result->tailleDisque : '' }}</li>

                      @endif
                  </ul>
              </div>
            </div>
          </div>

          <a class="btn-overflow page-link"  style="color: #337ab7;" href="#">Afficher plus...</a>
        </div>


        @if ($relatedAds->count() <> '0')
          <!-- Adds wrapper Start -->

          <h3 class="section-title">Annonces Correspondantes</h3>
          <div class="adds-wrapper">
            @foreach ($relatedAds as $relatedAd)
            <div class="item-list" data-store="{{$relatedAd->prix.$relatedAd->id}}" data-price="{{$relatedAd->prix}}"
              data-views="{{$relatedAd->numberViews}}" data-date="{{$relatedAd->created_at}}">
              <div class="col-sm-2 no-padding photobox">
                <div class="add-image">
                  @foreach ($search as $cat)
                  @if ($cat->idCat == $relatedAd->id_Cat)
                  <a
                    href="/details/{{$relatedAd->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $relatedAd->titre)}}/{{str_replace(' ', '-', $relatedAd->wilaya)}}">
                    @endif
                    @endforeach
                    @if ($relatedAd->hasPicture == '1')
                    @foreach ($imageAd as $img)
                    @if ($relatedAd->id == $img->id_annonce)
                    <img data-src="{{Storage::disk('s3')->url($img->imagename)}}" alt="" loading="lazy"
                      class="lazyload" /></a>
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
                  @if ($cat->idCat == $relatedAd->id_Cat)
                  <h5 class="add-title" id="details-title"><a
                      href="/details/{{$relatedAd->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $relatedAd->titre)}}/{{str_replace(' ', '-', $relatedAd->wilaya)}}">{{$relatedAd->titre}}</a>
                  </h5>
                  @endif
                  @endforeach
                  <div class="info">
                    <span class="date">
                      <i class="fa fa-clock"></i>
                      {{\Carbon\Carbon::parse($relatedAd->created_at)->diffForHumans()}}
                    </span> -
                    <span class="item-location"><i class="fa fa-map-marker"></i> {{$relatedAd->wilaya}}</span>
                  </div>
                  <div class="item_desc">
                    @foreach ($search as $cat)
                    @if ($cat->idCat == $relatedAd->id_Cat)
                    <a
                      href="/details/{{$relatedAd->id}}/{{str_replace(' ', '-', $cat->categories)}}/{{str_replace(' ', '-', $relatedAd->titre)}}/{{str_replace(' ', '-', $relatedAd->wilaya)}}">{{Str::limit($relatedAd->description, 30)}}</a>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
              <div class="col-sm-3 text-right  price-box">
                <h2 class="item-price" data-test="{{$relatedAd->prix}}">
                  {{$relatedAd->prix <> '' ? $relatedAd->prix.'DA' : '' }}</h2>
                @auth
                @if (App\Models\favoris::where('idUser', Auth::user()->id)->where('id_annonce', $relatedAd->id)->count() <> 0)
                  <a disabled="disabled" class="btn btn-danger btn-sm"
                    title="L'annonce a déjà été ajoutée aux favoris"><i class="fa fa-heart"></i>
                    <span>Favori</span></a>
                  @elseif (App\Models\annonce::where('id_user', Auth::user()->id)->where('id', $relatedAd->id)->count() <> 0)
                    <a disabled="disabled" class="btn btn-danger btn-sm"
                      title="Vous êtes le propriétaire de cette annonce!"><i class="fa fa-heart"></i>
                      <span>Favori</span></a>
                    @else
                    <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris"
                      onclick="namespaceActions.addToFav({{$relatedAd->id}})"><i class="fa fa-heart"></i>
                      <span>Favori</span></a>
                    @endif
                    @else
                    <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris"
                      onclick="namespaceActions.addToFav({{$relatedAd->id}})"><i class="fa fa-heart"></i>
                      <span>Favori</span></a>
                    @endauth
                    <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i>
                      <span>{{$relatedAd->numberViews}}</span> </a>
              </div>
            </div>
            @endforeach
          </div>
          <div class="row" id="pagination">
            <div class="col-sm-12">
              {{ $relatedAds->links() }}
            </div>
          </div>
          <!-- Adds wrapper End -->
          @endif
          <div class="post-promo text-center">
            <h2> Avez-vous quelque chose à vendre ?</h2>
            <h5>Vendez vos produits en ligne GRATUITEMENT. C'est plus facile que vous ne le pensez!</h5>
            <a href="/add-Ad" class="btn btn-post btn-danger">Publier une annonce </a>
          </div>
      </div>
      <div class="col-sm-3 page-sideabr">
        <img data-src="{{asset('img/pub/helpiste.jpg')}}" alt="" loading="lazy" class="lazyload" />
      </div>
      <div class="col-sm-3 page-sideabr">
        <img data-src="{{asset('img/pub/SaidIlaKheir.jpg')}}" alt="" loading="lazy" class="lazyload" />
      </div>
    </div>
  </div>
</div>

<!-- End Content -->

@endsection