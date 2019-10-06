
    @extends('layout')

    @section('content')

      <!-- Google Maps -->
      <style>
        #google-map,
        body,
        html {
          padding: 0;
          height: 460px;
        }
      </style>

          <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">contactez nous</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 
      
      <!-- Start Contact Us Section -->
      <section id="content">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <h2 class="title-2">
                Si vous avez des questions, n'hésitez pas à nous contacter.
              </h2>

              @if(Session('message'))
                <div class="row">
                  <div class="alert alert-success" role="alert">
                    <strong>{{Session::get('message')}}</strong>
                  </div>
                </div>
              @endif

              <!-- Form -->
              <form id="contactForm" class="contact-form" data-toggle="validator" method="post" action="/contact">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror       
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Nom complet" value="{{old('name')}}">
                          <div class="help-block with-errors"></div>
                        </div>             
                      </div>

                      <div class="col-md-12">
                        @error('email')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">  
                          <input type="text" class="form-control" id="email" name="email" placeholder="Adresse mail" value="{{old('email')}}">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        @error('subject')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                        <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }} has-feedback"> 
                          <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" value="{{old('subject')}}">
                          <div class="help-block with-errors"></div>
                        </div>
                      </div> 
                    </div>
                  </div>  

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-12">
                        @error('message')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror 
                        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }} has-feedback"> 
                          <textarea class="form-control" placeholder="Message" rows="10" name="message" id="message">{{old('message')}}</textarea>
                          <div class="help-block with-errors"></div>
                        </div>                        
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" id="submit" class="btn btn-common">Envoyez votre message</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div> 
                    <div class="clearfix"></div>   
                  </div>

                </div> 
              </form>
            </div>
            <div class="col-md-4">
              <h2 class="title-2">
                Contact Information
              </h2>
              <div class="information">
                <div class="contact-datails">
                  <div class="icon">
                    <i class="fa fa-map-marker icon-radius"></i>
                  </div>
                  <div class="info">
                    <h3>Adresse</h3>
                    <span class="detail">9 Rue des 8 mètres coop.el.nasr point du jour.</span>
                    <span class="datail">Oran, Algérie</span>
                  </div>
                </div>                
                <div class="contact-datails">
                  <div class="icon">
                    <i class="fa fa-phone icon-radius"></i>
                  </div>
                  <div class="info">
                    <h3>Numéro de téléphone</h3>
                    <span class="detail">0669-57-69-08</span>
                  </div>
                </div>
                <div class="contact-datails">
                  <div class="icon">
                    <i class="fa fa-location-arrow icon-radius"></i>
                  </div>
                  <div class="info">
                    <h3>Adresse Mail</h3>
                    <span class="detail"> contact.foress@gmail.com</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Contact Us Section  -->  
        
         <div id="google-map"></div>
      <!-- End Map Section -->

    @endsection
    

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.expsensor=false&key=AIzaSyCLH3AD_WG8oWXUlIbrxywtkbo3EYkEFOo&">
    </script>
    <!-- Google Maps JS Only for Contact Pages -->
    <script type="text/javascript">
    var map;
    var plain = new google.maps.LatLng(35.71023, -0.6103925);
    var mapCoordinates = new google.maps.LatLng(35.71023, -0.6103925);       
    var markers = [];
    var image = new google.maps.MarkerImage(
      'assets/img/map-marker.png',
      new google.maps.Size(84, 70),
      new google.maps.Point(0, 0),
      new google.maps.Point(60, 60)
    );    
    function addMarker() {
      markers.push(new google.maps.Marker({
        position: plain,
        raiseOnDrag: false,
        icon: image,
        map: map,
        draggable: false
      }));      
    }    
    function initialize() {
      var mapOptions = {
        backgroundColor: "#ffffff",
        zoom: 15,
        disableDefaultUI: true,
        center: mapCoordinates,
        zoomControl: false,
        scaleControl: false,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{
          "featureType": "landscape.natural",
          "elementType": "geometry.fill",
          "stylers": [{
            "color": "#ffffff"
          }
                     ]
        }
                 , {
                   "featureType": "landscape.man_made",
                   "stylers": [{
                     "color": "#ffffff"
                   }
                               , {
                                 "visibility": "off"
                               }
                              ]
                 }
                 , {
                   "featureType": "water",
                   "stylers": [{
                     "color": "#80C8E5"
                   }
                               , {
                                 "saturation": 0
                               }
                              ]
                 }
                 , {
                   "featureType": "road.arterial",
                   "elementType": "geometry",
                   "stylers": [{
                     "color": "#999999"
                   }
                              ]
                 }
                 , {
                   "elementType": "labels.text.stroke",
                   "stylers": [{
                     "visibility": "off"
                   }
                              ]
                 }
                 , {
                   "elementType": "labels.text",
                   "stylers": [{
                     "color": "#333333"
                   }
                              ]
                 }
                 
                 , {
                   "featureType": "road.local",
                   "stylers": [{
                     "color": "#dedede"
                   }
                              ]
                 }
                 , {
                   "featureType": "road.local",
                   "elementType": "labels.text",
                   "stylers": [{
                     "color": "#666666"
                   }
                              ]
                 }
                 , {
                   "featureType": "transit.station.bus",
                   "stylers": [{
                     "saturation": -57
                   }
                              ]
                 }
                 , {
                   "featureType": "road.highway",
                   "elementType": "labels.icon",
                   "stylers": [{
                     "visibility": "off"
                   }
                              ]
                 }
                 , {
                   "featureType": "poi",
                   "stylers": [{
                     "visibility": "off"
                   }
                              ]
                 }
                 
                ]
        
      }
          ;
      map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
      addMarker();
      
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
