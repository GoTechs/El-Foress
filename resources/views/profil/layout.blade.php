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

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('fonts/line-icons/line-icons.css')}}" type="text/css">
    

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
                <a class="navbar-brand logo" href="/"><img src="{{asset('img/Capture.PNG')}}" alt=""></a>
            </div>
            <!-- brand and toggle menu for mobile End -->

            <!-- Navbar Start -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/home"><i class="fa fa-user"></i> {{Auth::user()->nom}}</a></li>
                    <li><a href="/logout"><i class="fa fa-sign-out"></i> {{__('layout.logout_button')}}</a></li>
                    <li class="postadd">
                        <a class="btn btn-danger btn-post" href="/add-Ad"><span class="fa fa-plus-circle"></span> {{__('layout.post_button')}}</a>
                    </li>
                </ul>
            </div>
            <!-- Navbar End -->
        </div>
    </nav>
     <!-- Start intro section -->
     <section id="intro" class="sub-header">
      <div class="overlay">
        <div class="container">
          <div class="main-text">
    <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" method="post" action="/categorie">
                  @csrf
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="categorie" >
                          <option value="">{{__('index.categorie_input')}}</option>
                          @foreach ($search as $key => $value)
                                <option value="{{$value->idCat}}">{{ $value->categories }}</option>
                            @endforeach
                       </select>                                    
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="wilaya" id="wilaya" placeholder="{{__('index.wilaya_input')}}" type="text" value="{{old('wilaya')}}">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <input class="form-control keyword" name="keyword" placeholder="{{__('index.keyword_input')}}" type="text" value="{{old('keyword')}}">
                    <i class="fa fa-search"></i>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <button class="btn btn-common btn-search btn-block"><strong>{{__('index.search_button')}}</strong></button>
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
    <!-- Off Canvas Navigation -->
    <!--<div class="navmenu navmenu-default navmenu-fixed-left offcanvas">-->
        <!--- Off Canvas Side Menu -->
        <!--<div class="close" data-toggle="offcanvas" data-target=".navmenu">
            <i class="fa fa-close"></i>
        </div>
        <h3 class="title-menu">Menu</h3>
        <ul class="nav navmenu-nav"> 
            <li><a href="/">Accueil</a></li>
            <li><a href="/a-propos">À Propos</a></li>
            <li><a href="/categorie">Toutes les annonces</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/faq">Faq</a></li>
        </ul>--><!--- End Menu -->
    <!--</div>--> <!--- End Off Canvas Side Menu -->
    <!--<div class="tbtn wow pulse" id="menu" data-wow-iteration="infinite" data-wow-duration="500ms" data-toggle="offcanvas" data-target=".navmenu">
        <p><i class="fa fa-file-text-o"></i> Menu</p>
    </div>-->
</div>
<!-- Header Section End -->

<!-- Aside Section -->

<div id="content">
<div class="container">
<div class="row">
  <div class="col-sm-3 page-sideabr">
    <aside>
      <div class="inner-box">
        <div class="user-panel-sidebar">
          <div class="collapse-box">
            <h5 class="collapset-title no-border">{{__('layout.profil_menu')}} <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
            <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
              <ul class="acc-list">
                <li class="{{ (request()->is('home')) ? 'active' : '' }}">
                  <a href="/home"><i class="fa fa-home"></i> {{Auth::user()->nom}}  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="collapse-box">
            <h5 class="collapset-title">{{__('layout.account_menu')}}<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
            <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
              <ul class="acc-list">
                <li class="{{ (request()->is('my-ads')) ? 'active' : '' }}">
                  <a href="/my-ads"><i class="fa fa-credit-card"></i> {{__('layout.my_ads_menu')}}<span class="badge"></span></a>
                </li>
                <li class="{{ (request()->is('favorites')) ? 'active' : '' }}">
                  <a href="/favorites"><i class="fa fa-heart-o"></i> {{__('layout.my_favorits_menu')}} <span class="badge"></span></a>
                </li>
                <li class="{{ (request()->is('archives')) ? 'active' : '' }}">
                  <a href="/archives"><i class="fa fa-folder-o"></i> {{__('layout.archives_menu')}} <span class="badge"></span></a>
                </li>
              </ul>
            </div>
          </div>
          <div class="collapse-box">
            <div aria-expanded="true" id="close" class="panel-collapse collapse in">
              <ul class="acc-list">
                <li>
                  <a href="/logout"><i class="fa fa-close"></i> {{__('layout.logout_button')}}</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="inner-box">
        <img src="{{asset('img/pub/pubhabbache.gif')}}" alt="">
      </div>
    </aside>
  </div>

@yield('content')

</div>  
</div>      
</div>

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
                         <li><a href="/a-propos">À propos de nous</a></li>
                         <li><a href="/">Avantages de l’inscription</a></li>
                         <li><a href="/">Publicité sur Foress</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">DERNIERS TWEETS</h3>
                        <div class="twitter-content clearfix">
                            <ul class="twitter-list">
                                <li class="clearfix">
                      <span>
                        Suivez nous sur le nouveau site d'annonce FORESS
                        <a href="#">http://t.co/cLo2w7rWOx</a>
                      </span>
                                </li>
                                <li class="clearfix">
                      <span>
                        Cherchez, Trouvez !
                        <a href="#">http://t.co/cLo2w7rWOx</a>
                      </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                    <div class="widget">
                        <h3 class="block-title">{{__('layout.recently_add')}}</h3>
                        <ul class="featured-list">
                            @foreach($recentlyAdd as $recent)
                                <li>
                                @foreach ($imageAd as $img)
                                    @if ($recent->id == $img->id_annonce)
                                        <img src="{{Storage::disk('s3')->url($img->imagename)}}" alt=""></a>
                                    @endif
                                @endforeach
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
                            <a class="facebook" target="_blank" href=""><i class="fa fa-facebook"></i></a>
                            <a class="twitter" target="_blank" href=""><i class="fa fa-twitter"></i></a>
                            <a class="dribble" target="_blank" href=""><i class="fa fa-dribbble"></i></a>
                            <a class="flickr" target="_blank" href=""><i class="fa fa-flickr"></i></a>
                            <a class="youtube" target="_blank" href=""><i class="fa fa-youtube"></i></a>
                            <a class="google-plus" target="_blank" href=""><i class="fa fa-google-plus"></i></a>
                            <a class="linkedin" target="_blank" href=""><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
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
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript">
    
    

    $('#filter').keyup(function(){
       
        // Search text
        var text = $(this).val().toLowerCase();;
       
        // Hide all content class element
        $('.filter').hide();

        // Search 
        $('.filter .title').each(function(){
     
            if($(this).text().toLowerCase().indexOf(""+text+"") != -1 ){
             $(this).closest('.filter').show();
            }
          });

       
       });

    $('#checkAll').click(function(){
              $('.selectbox').prop('checked',$(this).prop('checked'));
        });

    $('.selectbox').click(function(){

        var total = $('.selectbox').length;
        var number = $('.selectbox:checked').length;
        if (total == number) {
          $('#checkAll').prop('checked', true);
        } else {
          $('#checkAll').prop('checked', false);
        }
    });     

</script>

</body>
</html>