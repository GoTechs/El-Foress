<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('layout.name_app')}} -  {{__('layout.description_page')}} </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
   
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('fonts/line-icons/line-icons.css')}}" type="text/css">
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157732278-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157732278-1');
</script>



</head>

<body>

<!-- Header Section Start -->
<div class="header">
    <nav class="navbar navbar-default main-navigation" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- Stat Toggle Nav Link For Mobiles -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- End Toggle Nav Link For Mobiles -->
                <a class="navbar-brand logo" href="/"><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
            <!-- brand and toggle menu for mobile End -->

            <!-- Navbar Start -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    @auth
                        <li><a href="/my-ads"><i class="fa fa-user"></i> {{Auth::user()->nom}}</a></li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                    @else
                        <li><a href="/admin/inscription"><i class="fa fa-user"></i> {{__('layout.register_button')}}</a></li>
                        <li><a href="/connexion"><i class="fa fa-sign-in"></i> {{__('layout.login_button')}}</a></li>
                        
                    @endauth
                        <li class="postadd">
                            <a class="btn btn-danger btn-post" href="/add-Ad"><span class="fa fa-plus-circle"></span> {{__('layout.post_button')}}</a>
                        </li>
                </ul>
            </div>
            <!-- Navbar End -->
        </div>
    </nav>
   <!-- Search wrapper Start -->
   <div id="search-row-wrapper">
      <div class="container">
        <div class="search-inner">
    <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" method="post" action="/categorie">
                <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}">
                    <i class="fa fa-search"></i>
                  </div>
                  @csrf
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="categorie" >
                          <option value="">Toutes les catégories</option>
                          @if (isset($_POST['categorie']))
                          @foreach ($search as $key => $value)                                
                              @if($_POST['categorie'] == $value->idCat)
                                <option value="{{$value->idCat}}" selected="">{{ $value->categories }}</option>
                              @else 
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                              @endif
                          @endforeach
                          @else
                          @foreach ($search as $key => $value)  
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                          @endforeach
                          @endif                                 
                       </select>                                    
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="wilaya" id="wilaya" placeholder="Wilaya" type="text" value="{{isset($_POST['wilaya']) ? $_POST['wilaya'] : ''}}">
                    <i class="fa fa-map-marker"></i>
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
   
</div>
<!-- Header Section End -->

    @yield('content')

<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">Foress</h3>
                        <ul class="menu">
                         <li><a href="/contact">{{__('layout.contact_menu')}}</a></li>
                         <li><a href="/centre-aide/avantages-de-l-inscription">Avantages de l’inscription</a></li>
                         <li><a href="/centre-aide/publicite-sur-foress">Publicité sur Foress</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                    <h3 class="block-title"> RENSEIGNEMENTS</h3>
                       
                            <ul class="menu">
                            <li><a href="/centre-aide/conditions-d-utilisation">Conditions d’utilisation</a></li>
                            <li><a href="/centre-aide/politique-de-confidentialite">Politique de confidentialité</a></li>
                            <li><a href="/centre-aide/regles-d-affichage">Règles d’affichage</a></li> 
                            </ul>
                        
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">{{__('layout.recently_add')}}</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                @if ($recent->hasPicture == '1')
                                    @foreach ($imageAd as $img)
                                        @if ($recent->id == $img->id_annonce)
                                            <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                                        @endif
                                    @endforeach
                                  @else 
                                    <img src="{{asset('img/nopicture.png')}}" alt=""></a>
                                  @endif                                   
                                    <div class="hover">
                                        <a href="/details/{{$recent->id}}"><i class="fa fa-eye views"> {{ $recent->numberViews}}</i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <div class="bottom-social-icons social-icon ">
                            <a class="facebook" target="_blank" href="https://www.facebook.com/Foress-111899207061171/?__tn__=%2Cd%2CP-R&eid=ARASPotcXhYJOJ-wvJjPnuBDvDZC9CphhqUNtRhQComsB1AHbq0T-NPd6fFC6FeEArdE9mewa5dmrfc_"><i class="fa fa-facebook"></i></a>
                            <a class="instagram" target="_blank" href="https://www.instagram.com/foress_dz/?hl=fr-ca"><i class="fa fa-instagram"></i></a>
                            <a class="youtube" target="_blank" href="https://www.youtube.com/channel/UCuvPoCDLC9ido1GDafDexiQ?fbclid=IwAR3_lUl-W8JX107T3RQF-U4lw5_n1QDRxQd_W6ZX1ng5XxsJVBhHgsRmrQg"><i class="fa fa-youtube"></i></a>    
                            <a class="linkedin" target="_blank" href="https://www.linkedin.com/company/foress-dz"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12 copyright">
                  <p> ©2014-2019 GoTechs</p><br/>
                  <p>Tous droits réservés. Google, Google Play, You Tube et autres marques sont des marques déposées de Google Inc.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

</footer>
<!-- Footer Section End -->

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="fa fa-angle-up"></i>
</a>

<!-- Main JS  -->
<script src="{{asset('js/libs.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

<script type="text/javascript">

/* ******************************   AutoComplete Field Wilaya *************************************** */    
    
    $( function() {
        var wilaya = [
            "ADRAR","AIN DEFLA","AIN TEMOUCHENT","AL TARF","ALGER","ANNABA","B.B.ARRERIDJ","BATNA","BECHAR","BEJAIA",           "BISKRA","BLIDA","BOUIRA","BOUMERDES","CHLEF","CONSTANTINE","DJELFA","EL BAYADH","EL OUED","GHARDAIA",             "GUELMA","ILLIZI","JIJEL","KHENCHELA","LAGHOUAT","MASCARA","MEDEA","MILA","MOSTAGANEM","M’SILA","NAAMA",               "ORAN","OUARGLA","OUM ELBOUAGHI","RELIZANE","SAIDA","SETIF","SIDI BEL ABBES","SKIKDA","SOUKAHRAS",               "TAMANGHASSET","TEBESSA","TIARET","TINDOUF","TIPAZA","TISSEMSILT","TIZI.OUZOU","TLEMCEN"
        ];
        $( "#wilaya" ).autocomplete({
          source: wilaya
        });
      } );

    /* ******************************   Add post to favorits *************************************** */            

    function addToFav(idAnnonce){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url : "/addtofav/"+idAnnonce,
            type : "POST",
            data : {'_method' : 'PATCH','_token':csrf_token},
            success : function(data){
              if (data == 'Unauthenticated'){
                document.location.href = "/connexion";

                  } else if (data == '1') {
                    swal("L'annonce a déjà été ajoutée aux favoris", "", "warning");

                    } else if (data == 'owner') {
                        swal("Vous êtes le propriétaire de cette annonce!", "", "warning");
                    }  else {
                        swal("L'annonce a été ajoutée aux favoris", "", "success");
                    }             
            }
        })       
    } 


       $(document).on("change", ".orderby", function() {

            var sortingMethod = $(this).val();

            if(sortingMethod == 'asc')
            {
                sortProductsPriceAscending();
            }
            else if(sortingMethod == 'desc')
            {
                sortProductsPriceDescending();
            } 
            else if(sortingMethod == 'popularity')
            {
                sortByPopularity();
            }
            else if (sortingMethod == 'mostrecent')
            {
                sortByDateDesc();
            }
            else if (sortingMethod == 'lessrecent')
            {
                sortByDateAsc();
            }

        });

        function sortProductsPriceAscending()
        {
            var products = $('.item-list');
            products.sort(function(a, b){ return $(a).data("price")-$(b).data("price")});
            $(".adds-wrapper").html(products);

        }

        function sortProductsPriceDescending()
        {
            var products = $('.item-list');
            products.sort(function(a, b){ return $(b).data("price") - $(a).data("price")});
            $(".adds-wrapper").html(products);

        }

        function sortByPopularity()
        {
            var products = $('.item-list');
            products.sort(function(a, b){ return $(b).data("views") - $(a).data("views")});
            $(".adds-wrapper").html(products);

        }
        function sortByDateDesc()
        {
            var products = $('.item-list');
            products.sort(function(a, b){ return new Date($(b).data("date")) - new Date($(a).data("date"))});
            $(".adds-wrapper").html(products);

        }
         function sortByDateAsc()
        {
            var products = $('.item-list');
            products.sort(function(a, b){ return new Date($(a).data("date")) - new Date($(b).data("date"))});
            $(".adds-wrapper").html(products);
        }
 

  </script>

</body>
</html>


