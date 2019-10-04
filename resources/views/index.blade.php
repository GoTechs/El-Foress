
  @extends('layout')

  @section('content')
    <!-- Start intro section -->
    <section id="intro" class="section-intro">
      <div class="overlay">
        <div class="container">
          <div class="main-text">
            <h1 class="intro-title">Bienvenue à <span style="color: #3498DB">Foress</span></h1>
            <p class="sub-title">Notre mission vous simplifier la vie </p>
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
                          @foreach ($search as $key => $value)
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                            @endforeach
                       </select>                                    
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="wilaya" id="wilaya" placeholder="Wilaya" type="text" value="{{old('wilaya')}}">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" placeholder="Mot clé" type="text" value="{{old('keyword')}}">
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
    </section>
    <!-- end intro section -->

    <div class="wrapper">
      <!-- Categories Homepage Section Start -->
      
      <!-- Categories Homepage Section End -->

        <section id="categories-homepage">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="section-title">Parcourir toutes les catégories</h3>
            </div> 
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-1 wow fadeInUpQuick" data-wow-delay="0.3s">
                <div class="icon">
                  <a href="/search/1"><i class="lnr lnr-users color-1"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/1"><h4>Communauté</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Communauté' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/1">Autres →</a>
                      <sapn class="category-counter"></sapn>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-2 wow fadeInUpQuick" data-wow-delay="0.6s">
                <div class="icon">
                  <a href="/search/2"><i class="lnr lnr-briefcase color-2"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/2"><h4>Emplois</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Emplois')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
             <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-3 wow fadeInUpQuick" data-wow-delay="0.9s">
                <div class="icon">
                  <a href="/search/3"><i class="lnr lnr-apartment color-3"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/3"><h4>Immobiliers</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Immobiliers')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-4 wow fadeInUpQuick" data-wow-delay="1.2s">
                <div class="icon">
                  <a href="/search/4"><i class="lnr lnr-car color-4"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/4"><h4>Véhicules</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)

                      @break($cat->sousCat == 'Motos - Scooters')
                      @if ($cat->categories == 'Véhicules' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/4">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-5 wow fadeInUpQuick" data-wow-delay="1.4s">
                <div class="icon">
                  <a href="/search/5"><i class="lnr lnr-cart color-5"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/5"><h4>Boutiques</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Boutiques' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/5">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-6 wow fadeInUpQuick" data-wow-delay="1.8s">
                <div class="icon">
                  <a href="/search/6"><i class="lnr lnr-coffee-cup color-6"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/6"><h4>Électroménagers</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Électroménager' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/6">Autres →</a>
                      <sapn class="category-counter"></sapn>
                    </li>
                  </ul>
                </div>
              </div>
            </div>                      
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-7 wow fadeInUpQuick" data-wow-delay="2.1s">
                <div class="icon">
                  <a href="/search/7"><i class="lnr lnr-cog color-7"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/7"><h4>Services</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Services' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/7">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-8 wow fadeInUpQuick" data-wow-delay="2.4s">
                <div class="icon">
                  <a href="/search/8"><i class="lnr lnr-laptop-phone color-8"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/8"><h4>Matériel informatique</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Matériel informatique' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/8">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>   
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div ></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-9 wow fadeInUpQuick" data-wow-delay="2.4s">
                <div class="icon">
                  <a href="/search/9"><i class="lnr lnr-rocket color-9"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/9"><h4>Voyages</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Voyages' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/9">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> 
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-10 wow fadeInUpQuick" data-wow-delay="2.5s">
                <div class="icon">
                  <a href="/search/10"><i class="lnr lnr-paw color-10"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search/10"><h4>Animaux</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    @foreach ($categorie as $cat)
                      @if ($cat->categories == 'Animaux' and $cat->sousCat <> 'Autres')
                      <li>
                        <a href="/search/{{$cat->idCat}}/{{$cat->idSousCat}}">{{$cat->sousCat}}</a>
                        <sapn class="category-counter"></sapn>
                      </li>
                      @endif
                    @endforeach
                    <li>
                      <a href="/search/10">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

        
        
      <!-- Featured Listings Start -->
      <section class="featured-lis" >
        <div class="container">
          <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.5s">
              <h3 class="section-title">Annonces les plus visités</h3>
              <div id="new-products" class="owl-carousel">
               @foreach ($annonces as $result) 
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/nopicture.png')}}" alt="">
                      <div class="overlay">
                        <a href="/details/{{$result->id}}"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>    
                    <a href="/details/{{$result->id}}" class="item-name">{{$result->titre}}</a>
                    <span class="price">{{$result->prix <> '' ? $result->prix.'DA' : ''}}</span>  
                  </div>
                </div>
              @endforeach  
              </div>
            </div> 
          </div>
        </div>
      </section>
      <!-- Featured Listings End -->
      </div>

    <!-- Counter Section Start -->
    <section id="counter">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-users"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">100</h3>
                <p>Nombre de visiteurs</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="1s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-tag"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">{{$nbrAds}}</h3>
                <p>Nombre d'annonces</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="2s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-license"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">150</h3>
                <p>Annonces Premium</p>
              </div>
            </div>
          </div>
          <!--<div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="1.5s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-users"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">23453</h3>
                <p>Nombre de visiteurs</p>
              </div>
            </div>
          </div>-->
        </div>
      </div>
    </section>
    <!-- Counter Section End -->

@endsection

