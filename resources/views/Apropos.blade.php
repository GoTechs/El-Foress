
    @extends('layout')

    @section('content')

    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">À Propos</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Main container Start -->  
    <div class="main-container">
      <div class="container">
        <div class="row">          
          <div class="col-sm-8">
            <img src="{{asset('img/opportunit%C3%A9.jpg')}}" alt="">
            <div class="ad-detail-content">
              <p>Foress est un nom arabe "فرص" qui veut dire opportunités, ainsi nous voulons vous offrir une qui facilitera votre vie.
                </p>
              <blockquote><p>Notre Mission Vous Simplifier La Vie</p></blockquote>              
              <p>Vous cherchez un emploi, une location, vous voulez vendre ou achetez quelque chose, alors vous êtes au bon endroit.
                Foress vous permet de trouver tout ce dont vous avez besoin.</p>
            </div>
          </div>
          <div class="col-sm-4 page-sidebar">
            <aside>
              <div class="inner-box">
                <div class="categories">
                  <div class="widget-title">
                    <i class="fa fa-align-justify"></i>
                    <h4>Toutes les catégories</h4>
                  </div>
                  <div class="categories-list">
                    <ul>
                      <li>
                        <a href="#">
                          <i class="fa fa-desktop"></i>
                          Communauté <span class="category-counter">(9)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-desktop"></i>
                          Emplois <span class="category-counter">(9)</span>
                        </a>
                      </li>
                      
                      <li>
                        <a href="#">
                          <i class="fa fa-wrench"></i>
                          Immobiliers <span class="category-counter">(8)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-github-alt"></i>
                          Véhicules <span class="category-counter">(2)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-leaf"></i>
                          Boutiques <span class="category-counter">(3)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-leaf"></i>
                          Électroménagers <span class="category-counter">(3)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-home"></i>
                          Services <span class="category-counter">(4)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-black-tie"></i>
                          Matériels Informatiques <span class="category-counter">(5)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-black-tie"></i>
                          Voyages <span class="category-counter">(5)</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-black-tie"></i>
                          Animaux <span class="category-counter">(5)</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="inner-box">
                <div class="widget-title">
                  <h4>Les dernières annonces</h4>
                </div>
                <div class="advimg">
                  <ul class="featured-list">
                    <li>
                      <img alt="" src="{{asset('img/featured/img1.jpg')}}">
                      <div class="hover">
                        <a href="#"><span>$49</span></a>
                      </div>
                    </li>
                    <li>
                      <img alt="" src="{{asset('img/featured/img2.jpg')}}">
                      <div class="hover">
                        <a href="#"><span>$49</span></a>
                      </div>
                    </li>
                    <li>
                      <img alt="" src="{{asset('img/featured/img3.jpg')}}">
                      <div class="hover">
                        <a href="#"><span>$49</span></a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="inner-box">
                <div class="widget-title">
                  <h4>Ici on laissera cette espace vide, pour les publicités</h4>
                </div>
                <img src="{{asset('img/img1.jpg')}}" alt="">
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container End -->

    @endsection