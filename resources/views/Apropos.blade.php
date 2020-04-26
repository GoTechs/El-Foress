@extends('profil.layout')

@section('content')

<!-- Main container Start -->
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-sm-8">
        <img data-src="{{asset('img/opportunit%C3%A9.jpg')}}" alt="" loading="lazy" class="lazyload" />
        <div class="ad-detail-content">
          <p>{{__('layout.app_presentation')}}
          </p>
          <blockquote>
            <p>{{__('layout.description_page')}}</p>
          </blockquote>
          <p>{{__('layout.app_definition')}}</p>
        </div>
      </div>
      <div class="col-sm-4 page-sidebar">
        <aside>
          <div class="inner-box">
            <img data-src="{{asset('img/pub/helpiste.jpg')}}" alt="" loading="lazy" class="lazyload" />
          </div>
        </aside>
      </div>
    </div>
  </div>
</div>
<!-- Main container End -->
@endsection