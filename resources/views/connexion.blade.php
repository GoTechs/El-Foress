
    @extends('layout')

    @section('content')

    <!-- Content section Start --> 
    <section id="content">
      <div class="container">

        @if(Session::has('error'))
        <div class="row">
            <div class="alert alert-danger col-xs-4 col-xs-offset-4">
             <strong>{{Session::get('error')}}</strong>
            </div>
        </div>
        @endif

        @if(Session('message'))
            <div class="row">
                <div class="alert alert-success col-xs-4 col-xs-offset-4">
                    <strong>{{Session::get('message')}}</strong>
                </div>
            </div>
        @endif

        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                {{__('authentication.connect_description')}}
              </h3>
              <form class="login-form" method="post" action="/connexion">
                @csrf
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="username" class="form-control" name="email" placeholder="{{__('authentication.email_input')}}" value="{{old('username')}}">
                  </div>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div> 
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="password" placeholder="{{__('authentication.password_input')}}" value="{{old('password')}}">
                  </div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>                  
                <div class="checkbox">
                  <input type="checkbox" id="remember" name="rememberme" value="1" style="float: left;">
                  <label for="remember">{{__('authentication.remember_input')}}</label>
                </div>
                <button class="btn btn-common log-btn" name="connect" type="submit">{{__('authentication.connect_submit_button')}}</button>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="/admin/inscription">{{__('authentication.register_redirect')}}</a></li>
                <li class="pull-right"><a href="{{route('password.reset')}}">{{__('authentication.reset_password_redirect')}}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

    @endsection