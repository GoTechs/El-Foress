@extends('profil.layout')

@section('content')

<!-- Start Contact Us Section -->
<section class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h2 class="section-title">
          {{__('contact.contact_message')}}
        </h2>

        @if(Session('message'))
        <div class="row">
          <div class="alert alert-success col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4" role="alert">
            <strong>{{Session::get('message')}}</strong>
          </div>
        </div>
        @endif

        <!-- Form -->
        <form class="contact-form" data-toggle="validator" method="post" action="/contact">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                    <input type="text" class="form-control" id="name" name="name"
                      placeholder="{{__('contact.name_input')}}" value="{{old('name')}}">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-12">
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input type="text" class="form-control" id="email" name="email"
                      placeholder="{{__('contact.adresse_email_input')}}" value="{{old('email')}}">
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-md-12">
                  @error('subject')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }} has-feedback">
                    <input type="text" class="form-control" id="subject" name="subject"
                      placeholder="{{__('contact.subject_input')}}" value="{{old('subject')}}">
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
                    <textarea class="form-control" placeholder="{{__('contact.message_input')}}" rows="10"
                      name="message" id="message">{{old('message')}}</textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" id="submit" class="btn btn-common">{{__('contact.submit_input')}}</button>
              <div id="msgSubmit" class="h3 text-center hidden"></div>
              <div class="clearfix"></div>
            </div>

          </div>
        </form>
      </div>
      <div class="col-sm-4">
        <div class="inner-box">
          <img data-src="{{asset('img/pub/helpiste.jpg')}}" alt="" loading="lazy" class="lazyload" />
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Contact Us Section  -->
@endsection