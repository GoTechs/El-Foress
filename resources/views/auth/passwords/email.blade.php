
    @extends('../../profil/layout')

    @section('content')

    <!-- Content section Start --> 
    <section class="main-container">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                {{__('authentication.reset_password_title')}}
              </h3>
              @if (session('status'))
                <div class="alert alert-success col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
                    {{ session('status') }}
                </div>
                @endif
              <form role="form" class="login-form" method="POST" action="{{ route('password.email') }}" id="form">
                @csrf
                <!--<div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="E-mail">
                  </div>
                </div> -->

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                    
                    <input type="text" class="form-control" id="email" name="email" placeholder="{{__('authentication.email_input')}}""/>
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