

    @extends('layout')

    @section('content')
    <!-- Search wrapper Start -->
    <div id="search-row-wrapper">
      <div class="container">
        <div class="search-inner">
            <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" method="get">
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="product-cat" >
                          <option value="0">Toutes les catégories</option>
                          <option class="subitem" value="Emplois"> Emplois</option>
                          <option value="Immobiliers"> Immobiliers</option>
                          <option value="Véhicules"> Véhicules</option>
                          <option value="Elec"> Boutiques</option>
                          <option value="Services"> Services</option>
                          <option value="Autres"> Matériels Informatiques</option>
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
                        </select>
                      </label>
                    </div>


                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" value="" placeholder="Mots Clés" type="text">
                    <i class="fa fa-search"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <button class="btn btn-common btn-search btn-block"><strong>Recherches</strong></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Search box -->
        </div>
      </div>
    </div>
    <!-- Search wrapper End -->

    <!-- Main container Start -->
    <div class="main-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 page-sidebar">
            <aside>
              <div class="inner-box">
                <div class="categories">
                  <div class="widget-title">
                    <i class="fa fa-align-justify"></i>
                    <h4> Toutes les catégories</h4>
                  </div>
                  <div class="categories-list">
                    <ul>
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
                  <h4>Publicité</h4>
                </div>
                <img src="{{asset('img/img1.jpg')}}" alt="">
              </div>
            </aside>
          </div>
          <div class="col-sm-9 page-content">
            <!-- Product filter Start -->
            <div class="product-filter">
              <div class="grid-list-count">
                <a class="list switchToGrid" href="#"><i class="fa fa-list"></i></a>
                <a class="grid switchToList" href="#"><i class="fa fa-th-large"></i></a>
              </div>
              <div class="short-name">
                <span>Trier par</span>
                <form class="name-ordering" method="post">
                  <label>
                    <select name="order" class="orderby">
                      <option selected="selected" value="menu-order">Trier par</option>
                      <option value="popularity">Prix: Faible à élevé </option>
                      <option value="popularity">Prix: Elevé à faible</option>
                    </select>
                  </label>
                </form>
              </div>
              <div class="Show-item">
                <span>Show Items</span>
                <form class="woocommerce-ordering" method="post">
                  <label>
                    <select name="order" class="orderby">
                      <option selected="selected" value="menu-order">49 items</option>
                      <option value="popularity">popularity</option>
                      <option value="popularity">Average ration</option>
                      <option value="popularity">newness</option>
                      <option value="popularity">price</option>
                    </select>
                  </label>
                </form>
              </div>
            </div>
            <!-- Product filter End -->

            <!-- Adds wrapper Start -->
            <div class="adds-wrapper">
               @foreach ($data as $result)
              <div class="item-list">
                <div class="col-sm-2 no-padding photobox">
                  <div class="add-image">
                    <a href="/details/{{$result->id}}">
                     @foreach ($imageAd as $img) 
                      @if ($result->id == $img->id_annonce)
                        <img src="{{asset('images/'.$img->imagename)}}" alt=""></a>
                      @endif
                      @endforeach
                    <span class="photo-count"><i class="fa fa-camera"></i>2</span>
                  </div>
                </div>
                <div class="col-sm-7 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"><a href="/details/{{$result->id}}">{{$result->titre}}</a></h5>
                    <div class="info">
                      
                      <span class="date">
                        <i class="fa fa-clock"></i>
                        16:22:13 2017-02-29
                      </span> -
                      <span class="item-location"><i class="fa fa-map-marker"></i> {{$result->wilaya}}</span>
                    </div>
                    <div class="item_desc">
                      <a href="#">{{$result->description}}</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3 text-right  price-box">
                  <h2 class="item-price"> {{$result->prix <> '' ? $result->prix.'DA' : '' }} </h2>
                  <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris" onclick="addToFav({{$result->id}})"><i class="fa fa-heart"></i>
                  <span>Favori</span></a>
                  <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i> <span>215</span> </a>
                </div>
              </div>    
              @endforeach
            </div>
            <!-- Adds wrapper End -->

            <!-- Start Pagination -->
            {{ $data->links() }}
            <!-- End Pagination -->

            <div class="post-promo text-center">
              <h2> Avez-vous quelque chose à vendre ?</h2>
              <h5>Vendez vos produits en ligne GRATUITEMENT. C'est plus facile que vous ne le pensez!</h5>
              @auth
                <a href="/addAd" class="btn btn-post btn-danger">Poster une annonce </a>
              @else
                <a href="/connexion" class="btn btn-post btn-danger">Poster une annonce </a>
              @endauth
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container End -->

    @endsection

    <script type="text/javascript">
      
      function addToFav(idAnnonce){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url : "/addtofav/"+idAnnonce,
            type : "POST",
            data : {'_method' : 'PATCH','_token':csrf_token},
            success : function(data){
              if (data == 'connexion'){
                document.location.href = "/connexion";
              }
              
            }
          })       
      }

    </script>