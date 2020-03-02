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
    <link rel="shortcut icon" href="{{asset('img/favicon-32x32.png')}}">

    <link href="{{asset('css/libs.css')}}" rel="stylesheet">
   
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    
    <!-- Line Icons CSS -->
    <link rel="stylesheet" href="{{asset('fonts/line-icons/line-icons.css')}}" type="text/css">   

</head>

<body>
<div id="loading">
  <img src="{{asset('img/loading.gif')}}">
</div> 
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
                    <li><a href="/home"><i class="fa fa-user"></i> {{Auth::user()->nom}}</a></li>
                    <li class="{{ (request()->is('my-ads')) ? 'active' : '' }}" id="profile">
                          <a href="/my-ads"><i class="fa fa-credit-card" ></i> {{__('layout.my_ads_menu')}}<span class="badge"></span></a>
                        </li>
                        <li class="{{ (request()->is('favorites')) ? 'active' : '' }}" id="profile">
                          <a href="/favorites"><i class="fa fa-heart-o"></i> {{__('layout.my_favorits_menu')}} <span class="badge"></span></a>
                        </li>
                        <li class="{{ (request()->is('archives')) ? 'active' : '' }}" id="profile">
                           <a href="/archives"><i class="fa fa-folder-o"></i> {{__('layout.archives_menu')}} <span class="badge"></span></a>
                        </li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i> {{__('layout.logout_button')}}</a></li>
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
                  @csrf
                  <div class="col-md-3 col-sm-12 search-col">
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
                  <div class="col-md-3 col-sm-12 search-col">
                    <input class="form-control keyword" name="wilaya" id="wilaya" placeholder="Wilaya" type="text" value="{{isset($_POST['wilaya']) ? $_POST['wilaya'] : ''}}">
                    <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="col-md-3 col-sm-12 search-col">
                    <input class="form-control keyword" name="keyword" placeholder="Rechercher n'importe quoi..." type="text" value="{{isset($_POST['keyword']) ? $_POST['keyword'] : ''}}">
                    <i class="fa fa-search"></i>
                  </div>
                  <div class="col-md-3 col-sm-12 search-col">
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

<!-- Aside Section -->

<div id="content">
<div class="container">
<div class="row" id="ads">
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
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript">


    $(window).load(function(){
        $('#loading').fadeOut("slow");
    });
    

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
    
    $(document).ready(function(){
            $('#submit').click(function(e){
               e.preventDefault();
               swal({
                title: "Êtes-vous sûr?",
                text: "Une fois supprimé, vous ne pourrez plus récupérer vos annonces!",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  var myForm = document.getElementById('deleteAll');
                    formData = new FormData(myForm);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                      url: "{{ url('/deleteAll') }}",
                      method: 'post',
                      contentType: false,
                      processData: false,
                      data: formData,
                      beforeSend: function(){
                        // Show image container
                        $("#loading").show();
                      },
                      success: function(data){
                        if ($.isEmptyObject(data.success)){   
                          console.log("error")
                        } else {
                            document.location.href = "/my-ads";
                        }            
                        
                      },
                      complete:function(data){
                        // Hide image container
                        $("#loading").hide();
                      }
                        
                      });
                    }
                });    
               });
            });

           

</script>

</body>
</html>