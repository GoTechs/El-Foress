
    @extends('../../profil/layout')

    @section('content')

    <!-- Content section Start --> 
    <section class="main-container">
      <div class="container">
        @if (session('status'))
        <div class="row">
          <div class="alert alert-success col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
              {{ session('status') }}
          </div>
        </div>
        @endif
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                {{__('authentication.reset_password_title')}}
              </h3>
              <form role="form" class="login-form" method="POST" action="{{ route('password.email') }}" id="form">
                @csrf
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}  has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" class="form-control" id="email" name="email" placeholder="{{__('authentication.email_input')}}"/>
                  </div>
                  @error('email')
                  <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                  @enderror                 
                </div>
                <button type="submit" class="btn btn-common log-btn">{{__('authentication.send_email_button')}}</button>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="/admin/inscription">{{__('authentication.register_redirect')}}</a></li>
                <li class="pull-right"><a href="/connexion">{{__('authentication.login_redirect')}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
   

    <!-- Content section End -->

    @endsection