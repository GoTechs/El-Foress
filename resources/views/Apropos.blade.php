
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
                <img src="{{asset('img/pub/pubmobilis.jpg')}}" alt="">
              </div>
              <div class="inner-box">
                <div class="categories">
                  <div class="widget-title">
                    <i class="fa fa-align-justify"></i>
                    <h4>Toutes les catégories</h4>
                  </div>
                  <div class="categories-list">
                  <div class="panel-group" id="accordion">
                  @foreach ($search as $searchCat)
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
                  @endforeach
                  </div>
                  </div>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container End -->

    @endsection