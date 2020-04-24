
    @extends('layout')

    @section('content')

    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">{{__('layout.about_title')}}</h2>
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
            <img src="{{asset('img/opportunit%C3%A9.jpg')}}" alt="" loading="lazy">
            <div class="ad-detail-content">
              <p>{{__('layout.app_presentation')}}
                </p>
              <blockquote><p>{{__('layout.description_page')}}</p></blockquote>              
              <p>{{__('layout.app_definition')}}</p>
            </div>
          </div>
          <div class="col-sm-4 page-sidebar">
            <aside>
              <div class="inner-box">
                <img src="{{asset('img/pub/helpiste.jpg')}}" alt="" loading="lazy>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
    <!-- Main container End -->

    @endsection