
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
                <form class="search-form" method="get">
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="product-cat" >
                          <option value="0">Toutes les catégories</option>
                          <option value="">Communauté</option> 
                          <option value="">Emplois</option>
                          <option value=""> Immobiliers</option>
                          <option value=""> Véhicules</option>
                          <option value=""> Boutiques</option>
                          <option value="">Électroménagers</option>
                          <option value="">Services</option>
                          <option value="">Matériels Informatiques</option>
                          <option value="">Voyages</option>
                          <option value="">Animaux</option>
                       </select>                                    
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select location-select">
                        <select class="dropdown-product selectpicker" name="product-cat" >
                          <option value="0">Wilaya</option>
                          <option value="Alger">Alger</option>
                          <option value="Oran">Oran</option>
                          <option value="Blida">Blida</option>
                          <option value="Adrar">Adrar</option>
                          <option value="Batna">Batna</option>
                          <option value="Biskra">Biskra</option>
                          <option value="Chlef">Chlef</option>
                          <option value="Jijel">Jijel</option>
                          <option value="Skikda">Skikda</option>
                          <option value="Tiaret">Tiaret</option>
                        </select>
                      </label>
                    </div>


                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" value="" placeholder="Mots clés" type="text">
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
                  <a href="categorie.php"><i class="lnr lnr-users color-1"></i></a>
                </div>
                <div class="category-header">  
                  <a href="/search"><h4>Communauté</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Bénévoles</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Événements</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Amis perdus</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Amitié</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-2 wow fadeInUpQuick" data-wow-delay="0.6s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-briefcase color-2"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Emplois</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php" style="color:#ff5353;text-decoration:underline;">Demandes / Offres :</a>
                    </li>
                    <li>
                      <a href="categorie.php">Informatique</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Comptabilité - Audit</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Commerce - Vente</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Santé - Pharmacie</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Hôtellerie - Restauration</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
             <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-3 wow fadeInUpQuick" data-wow-delay="0.9s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-apartment color-3"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Immobiliers</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php" style="color:#1dd2af;text-decoration:underline;">Achat :</a>
                    </li>
                    <li>
                      <a href="categorie.php">Appartement</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Terrain</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                    <li>
                      <a href="categorie.php"  style="color:#1dd2af;text-decoration:underline;">Location :</a>
                    </li>
                    <li>
                      <a href="categorie.php">Espace commerciaux, bureaux</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-4 wow fadeInUpQuick" data-wow-delay="1.2s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-car color-4"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Véhicules</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Automobiles</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Motos - Scooters</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Bateaux</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Remorques</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Camions</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Pièces détachées</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>            
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-5 wow fadeInUpQuick" data-wow-delay="1.4s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-cart color-5"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Boutiques</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Téléphones</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Appareils Photo</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Bijoux - Montres</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Meubles de maison</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Articles de sport</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-6 wow fadeInUpQuick" data-wow-delay="1.8s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-coffee-cup color-6"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Électroménagers</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Réfrigérateur - Congélateur</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Cuisinière</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Machine à laver</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Fours - Micro onde</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Mixeurs - Batteurs</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                  </ul>
                </div>
              </div>
            </div>                      
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-7 wow fadeInUpQuick" data-wow-delay="2.1s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-cog color-7"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Services</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Ecole et formation</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                      <li>
                      <a href="categorie.php">Construction et travaux</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Réparation Éléctroniques </a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Traiteurs et gateaux</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Transport</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Esthétique et beauté</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-8 wow fadeInUpQuick" data-wow-delay="2.4s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-laptop-phone color-8"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Matériels informatiques</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Périphériques et accessoires</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Stockage</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Ordinateurs</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Imprimantes</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Son</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
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
                  <a href="categorie.php"><i class="lnr lnr-rocket color-9"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Voyages</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Hadj et Omra</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Voyage organisé</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Réservation et visa</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Location de vacances</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div> 
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="category-box border-10 wow fadeInUpQuick" data-wow-delay="2.5s">
                <div class="icon">
                  <a href="categorie.php"><i class="lnr lnr-paw color-10"></i></a>
                </div>
                <div class="category-header">  
                  <a href="categorie.php"><h4>Animaux</h4></a>
                </div>
                <div class="category-content">
                  <ul>
                    <li>
                      <a href="categorie.php">Oiseaux à adopter</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Chats, chatons à adopter</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Chiens à adopter</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Animaux de ferme</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Accessoires</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                     <li>
                      <a href="categorie.php">Services pour animaux</a>
                      <sapn class="category-counter">3</sapn>
                    </li>
                    <li>
                      <a href="categorie.php">Autres →</a>
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
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img1.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>    
                    <a href="details.blade.php" class="item-name">Lorem ipsum dolor sit</a>
                    <span class="price">$150</span>  
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img2.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div> 
                    <a href="details.blade.php" class="item-name">Sed diam nonummy</a>
                    <span class="price">$67</span> 
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img3.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>
                    <a href="details.blade.php" class="item-name">Feugiat nulla facilisis</a>
                    <span class="price">$300</span>  
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img4.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div> 
                    <a href="details.blade.php" class="item-name">Lorem ipsum dolor sit</a>
                    <span class="price">$149</span> 
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img5.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>
                    <a href="details.blade.php" class="item-name">Sed diam nonummy</a>
                    <span class="price">$90</span> 
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img6.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>                     
                    <a href="details.blade.php" class="item-name">Praesent luptatum zzril</a>
                    <span class="price">$169</span> 
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img7.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>  
                    <a href="details.blade.php" class="item-name">Lorem ipsum dolor sit</a>
                    <span class="price">$79</span> 
                  </div>
                </div>
                <div class="item">
                  <div class="product-item">
                    <div class="carousel-thumb">
                      <img src="{{asset('img/product/img8.jpg')}}" alt="">
                      <div class="overlay">
                        <a href="details.blade.php"><i class="fa fa-link"></i></a>
                      </div> 
                    </div>
                    <a href="details.blade.php" class="item-name">Sed diam nonummy</a>
                    <span class="price">$149</span>   
                  </div>
                </div>
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
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay=".5s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-tag"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">12090</h3>
                <p>Regular Ads</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="1s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-map"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">350</h3>
                <p>Locations</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
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
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="counting wow fadeInDownQuick" data-wow-delay="2s">
              <div class="icon">
                <span>
                  <i class="lnr lnr-license"></i>
                </span>
              </div>
              <div class="desc">
                <h3 class="counter">150</h3>
                <p>Premium Ads</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Counter Section End -->

  @endsection
