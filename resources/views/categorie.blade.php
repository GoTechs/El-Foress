

    @extends('layout')

    @section('content')
    <!-- Search wrapper Start -->
    <div id="search-row-wrapper">
      <div class="container">
        <div class="search-inner">
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
                    <input class="form-control keyword" name="wilaya" id="wilaya" placeholder="Wilaya" type="text">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" placeholder="Mots clés" type="text">
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
    <!-- Search wrapper End -->

    <!-- Main container Start -->
    <div class="main-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 page-sidebar">
            <aside>
              <div class="inner-box">
                @if ($catégorie == 'Catégorie')
                <div class="categories">                  
                  <div class="widget-title">
                    <i class="fa fa-align-justify"></i>
                    <h4> Toutes les catégories</h4>
                  </div>
                  <div class="categories-list">
                    <ul>
                      <li>
                        <a href="/search/Catégorie/1">
                          <i class="lnr lnr-users"></i>
                          Communauté <span class="category-counter"></span>
                        </a>
                      </li>

                      <li>
                        <a href="/search/Catégorie/2">
                          <i class="lnr lnr-briefcase"></i>
                          Emplois <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/3">
                          <i class="lnr lnr-apartment"></i>
                          Immobiliers <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/4">
                          <i class="lnr lnr-car"></i>
                          Véhicules <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/5">
                          <i class="lnr lnr-cart"></i>
                          Boutiques <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/6">
                          <i class="lnr lnr-coffee-cup"></i>
                          Électroménagers <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/7">
                          <i class="lnr lnr-cog"></i>
                          Services <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/8">
                          <i class="lnr lnr-laptop-phone"></i>
                          Matériel informatique <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/9">
                          <i class="lnr lnr-rocket"></i>
                          Voyages <span class="category-counter"></span>
                        </a>
                      </li>
                      <li>
                        <a href="/search/Catégorie/10">
                          <i class="lnr lnr-paw"></i>
                          Animaux <span class="category-counter"></span>
                        </a>
                      </li>
                    </ul>
                  </div>
                  </div>
                  @elseif ($catégorie == 'sousCatégorie')
                    @if ($filter == '53')
                    <div class="categories">   
                    <div class="widget-title">                    
                        <h6> Emplois</h6>
                      </div>
                      <div class="categories-list">
                        <ul>
                          <li>
                            <select class="form-control" name="domaineOffre" size="14">
                              <option>Assistanat, secrétariat</option>
                              <option>Comptabilité, Finance</option>
                              <option>Banque et assurances</option>
                              <option>Juridique, Fiscal, Audit, Conseil</option>
                              <option>RH, personnel, formation</option>
                              <option>Education, Enseignement</option>
                              <option>Commercial, Technico Commercial, Service client</option>
                              <option>Marketing, Communication</option>
                              <option>Journalisme, Médias, Traduction</option>
                              <option>Informatique, Systèmes d'information, Réseaux</option>
                              <option>Chantier, Métiers BTP, Architecture</option>
                              <option>Santé, Médical, Pharmacie</option>
                              <option>Hôtellerie, Tourisme, Restauration, Loisirs</option>
                              <option>Autres</option>
                            </select>
                          </li>  
                        </ul>
                      </div>
                    </div>
                @elseif ($filter == '16')
                  <div class="categories">   
                    <div class="widget-title">                    
                        <h6> Boutiques</h6>
                    </div>
                    <div class="categories-list">
                      <ul>
                        <li>
                          <label class="control-label" for="textarea">Prix</label>
                          <input type="text" class="form-control" name="priceDe" placeholder="de">  
                          <input type="text" class="form-control" name="priceA" placeholder="à">
                        </li>
                        <li>
                          <label>Marque</label>
                          <select class="form-control" name="marquePhone" size="10">
                              <option>Apple</option>
                              <option>BlackBerry</option>
                              <option>Ericsson</option>
                              <option>Huawei</option>
                              <option>LG</option>
                              <option>Motorola</option>
                              <option>Nokia</option>
                              <option>Samsung</option>
                              <option>Sony</option>
                              <option>Autres</option>
                          </select>
                          <button type="button" class="btn btn-primary" id="Add" onclick="filter()">Mettre à jour</button>
                        </li>  
                      </ul>
                    </div>
                  </div>
                  @elseif ($filter == '36')
                      <div class="categories">   
                        <div class="widget-title">                    
                            <h6> Matériel Informatique</h6>
                        </div>
                        <div class="categories-list">
                          <ul>
                            <li>
                              <label class="control-label" for="textarea">Prix</label>
                              <input type="text" class="form-control" name="priceDe" placeholder="de">  
                              <input type="text" class="form-control" name="priceA" placeholder="à">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Type</label>
                                <select class="form-control" name="typeStockage" size="4">
                                    <option>Flash disque</option>
                                    <option>Disque dur externe</option>
                                    <option>Disque dur interne</option>
                                    <option>Carte mémoire</option>
                                </select>
                                <button type="button" class="btn btn-primary" id="Add" onclick="filter()">Mettre à jour</button>
                               </li>               
                          </ul>
                        </div>
                      </div>
                  @elseif ($filter == '55' or $filter == '56' or $filter == '57' or $filter == '58')
                      <div class="categories">   
                        <div class="widget-title">                    
                            <h6> Immobiliers</h6>
                        </div>
                        <div class="categories-list">
                          <ul>
                            <li>
                              <label class="control-label" for="textarea">Prix</label>
                              <input type="text" class="form-control" name="priceDe" placeholder="de">  
                              <input type="text" class="form-control" name="priceA" placeholder="à">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Type du Bien</label>
                              <select class="form-control" name="typeBien" size="9">
                                  <option>Appartement</option>
                                  <option>Studio</option>
                                  <option>Villa</option>
                                  <option>Local</option>
                                  <option>Terrain</option>
                                  <option>Carcasse</option>
                                  <option>Usine</option>
                                  <option>Immeuble</option>
                                  <option>Autres</option>
                              </select>
                            </li> 
                            <li>
                              <input class="form-control" name="superficie" type="text" placeholder="Superficie en M²">
                            </li>
                            <li>
                              <input class="form-control" name="nbrePiece" type="text" placeholder="Nombre de pièces">
                            </li> 
                            <li>
                              <input class="form-control" name="etage" type="text" placeholder="Étage">
                              <button type="button" class="btn btn-primary" id="Add" onclick="filter()">Mettre à jour</button>
                            </li> 
                          </ul>
                        </div>
                      </div>
                  @elseif ($filter == '6' or $filter == '7' or $filter == '8' or $filter == '9' or $filter == '10' or $filter == '11' or $filter == '12' or $filter == '13')
                      <div class="categories">   
                        <div class="widget-title">                    
                            <h6> Véhicules</h6>
                        </div>
                        <div class="categories-list">
                            <ul>
                              <li>
                                <label class="control-label" for="textarea">Prix</label>
                                <input type="text" class="form-control" name="priceDe" placeholder="de">  
                                <input type="text" class="form-control" name="priceA" placeholder="à">
                              </li>
                              <li>
                                <label class="control-label" for="textarea">Type d'offre</label><br>
                                <label><input type="radio" name="vente" value="selling"> Offres </label><br>
                                <label><input type="radio" name="vente" value="searching"> Recherché </label>
                              </li>
                              <li>
                                <label class="control-label" for="textarea">Marque</label>
                                <select class="form-control" name="marque" size="8">
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Cadillac</option>
                                    <option>Chevrolet</option>
                                    <option>Citroen</option>
                                    <option>Dacia</option>
                                    <option>Honda</option>
                                    <option>Hyundai</option>
                                    <option>Isuzu</option>
                                    <option>Kia</option>
                                    <option>Seat</option>
                                    <option>Skoda</option>
                                    <option>Volkswagen</option>
                                    <option>Baic</option>
                                    <option>Nissan</option>
                                    <option>Peugeot</option>
                                    <option>Renault</option>
                                    <option>Toyota</option>
                                    <option>Autres</option>
                                </select>                  
                              </li>
                              <li>
                                <input class="form-control" name="anne" id="anne" type="text" placeholder="Année">
                              </li> 
                              <li>
                                <input class="form-control" name="kilom" id="kilom" type="text" placeholder="Kilomètrage">
                              </li>
                              <li>
                                <label class="control-label" for="textarea">Type carburant</label>
                                <select class="form-control" name="typeCarb" size="4"> 
                                    <option>Essence</option>
                                    <option>Gas oil</option>
                                    <option>GPL</option>
                                    <option>Eléctrique</option>
                                </select>
                                <button type="button" class="btn btn-primary" id="Add" onclick="filter()">Mettre à jour</button>
                              </li>
                           </ul>
                        </div>
                      </div>
                      @elseif ($filter == '37')
                      <div class="categories">   
                        <div class="widget-title">                    
                            <h6> Matèriel Informatique</h6>
                        </div>
                        <div class="categories-list">
                          <ul>
                            <li>
                              <label class="control-label" for="textarea">Prix</label>
                              <input type="text" class="form-control" name="priceDe" placeholder="de">  
                              <input type="text" class="form-control" name="priceA" placeholder="à">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Marque</label>
                              <select class="form-control" name="marqueOrd" size="10">
                                    <option>Acer</option>
                                    <option>Apple</option>
                                    <option>Asus</option>
                                    <option>Dell</option>
                                    <option>HP</option>
                                    <option>Lenovo</option>
                                    <option>Samsung</option>
                                    <option>Sony</option>
                                    <option>Toshiba</option>
                                    <option>Autres</option>
                                </select> 
                            </li>                            
                            <li>
                              <label class="control-label" for="textarea">Taille de l'écran</label>
                              <select class="form-control" name="tailleOrd" size="4">
                                  <option>14 po ou moins</option>
                                  <option>15 po</option>
                                  <option>16 po</option>
                                  <option>17 po ou plus</option>
                              </select>  
                              <button type="button" class="btn btn-primary" id="Add" onclick="filter()">Mettre à jour</button>
                            </li>
                         </ul>
                        </div>
                      </div>
                      @elseif ($filter == '2')
                      <div class="categories">   
                        <div class="widget-title">                    
                            <h6> Communauté</h6>
                        </div>
                        <div class="categories-list">
                          <ul>
                            <li>
                              <label class="control-label" for="textarea">Date et heure de l'événement</label>
                              <input class="form-control" name="datetimeEvent" type="datetime-local">
                            </li>
                            <li>
                              <label class="control-label" for="textarea">Du</label>
                              <input class="form-control" name="du" type="date">
                              <label class="control-label" for="textarea">Au</label>
                              <input class="form-control" name="au" type="date">
                              <button type="button" class="btn btn-primary" id="Add" onclick="filter()">Mettre à jour</button>
                            </li>   
                         </ul>
                        </div>
                      </div>
                      @else
                      <div class="categories">                  
                        <div class="widget-title">
                          <i class="fa fa-align-justify"></i>
                          <h4> Toutes les catégories</h4>
                        </div>
                        <div class="categories-list">
                          <ul>
                            <li>
                              <a href="/search/Catégorie/1">
                                <i class="lnr lnr-users"></i>
                                Communauté <span class="category-counter"></span>
                              </a>
                            </li>

                            <li>
                              <a href="/search/Catégorie/2">
                                <i class="lnr lnr-briefcase"></i>
                                Emplois <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/3">
                                <i class="lnr lnr-apartment"></i>
                                Immobiliers <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/4">
                                <i class="lnr lnr-car"></i>
                                Véhicules <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/5">
                                <i class="lnr lnr-cart"></i>
                                Boutiques <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/6">
                                <i class="lnr lnr-coffee-cup"></i>
                                Électroménagers <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/7">
                                <i class="lnr lnr-cog"></i>
                                Services <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/8">
                                <i class="lnr lnr-laptop-phone"></i>
                                Matériel informatique <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/9">
                                <i class="lnr lnr-rocket"></i>
                                Voyages <span class="category-counter"></span>
                              </a>
                            </li>
                            <li>
                              <a href="/search/Catégorie/10">
                                <i class="lnr lnr-paw"></i>
                                Animaux <span class="category-counter"></span>
                              </a>
                            </li>
                          </ul>
                        </div>
                        </div>
                    @endif
                    @endif
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
                        {{$result->created_at}}
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
              if (data == 'Unauthenticated'){
                document.location.href = "/connexion";
              } else {

                     swal("L'annonce a été ajoutée aux favoris", "", "success");

              }
              
            }
          })       
      }

      function filter(){
          /*var csrf_token = $('meta[name="csrf-token"]').attr('content');
          var testObject = [];*/

          var anne = document.getElementById("anne").value;
          var kilom = document.getElementById("kilom").value;
         /*var  namesWrapper = $('.adds-wrapper');

            testObject.push({
                  anne: anne.value,
              kilom: kilom.value
              })
            console.log(testObject);
                $.ajax({
                  url : "/advancedSearch",
                  type : "POST",
                  data : {'_method' : 'GET','_token':csrf_token,'anne':anne,'kilom':kilom},
                  success : function(data){
                  
                  namesWrapper.html('');
                  namesWrapper.append('<div class="item-list"><div class="col-sm-2 no-padding photobox"><div class="add-image"><a href="/details/'+data[0].id+'">Image</a><span class="photo-count"><i class="fa fa-camera"></i>2</span></div></div><div class="col-sm-7 add-desc-box"><div class="add-details"><h5 class="add-title"><a href="/details/'+data[0].id+'">'+data[0].titre+'</a></h5><div class="info"><span class="date"><i class="fa fa-clock"></i>'+data[0].created_at+'</span> - <span class="item-location"><i class="fa fa-map-marker"></i> '+data[0].wilaya+'</span></div><div class="item_desc"><a href="#">'+data[0].description+'</a></div></div></div><div class="col-sm-3 text-right  price-box"> <h2 class="item-price"> 20000 </h2> <a class="btn btn-danger btn-sm" title="Cliquez pour ajouter à mes favoris" onclick="addToFav('+data[0].id+')"><i class="fa fa-heart"></i> <span>Favori</span></a> <a class="btn btn-common btn-sm" title="Nombre de vues"> <i class="fa fa-eye"></i> <span>215</span> </a></div></div> ');
                  console.log(data[0].annee);
                   
                  }
                })*/

                $('.adds-wrapper').hide();

            // Search 
            $('.adds-wrapper .add-title:contains("'+anne+'"), .adds-wrapper .item_desc:contains("'+kilom+'")').closest('.adds-wrapper').show();
        }

        

    </script>