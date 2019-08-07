
    @extends('layout')

    @section('content')

    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Connectez-vous</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

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
          
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Connexion
              </h3>
              <form class="login-form" method="post" action="/connexion">
                @csrf
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Nom d'utilisateur" value="{{old('username')}}">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" value="{{old('password')}}">
                  </div>
                </div>                  
                <div class="checkbox">
                  <input type="checkbox" id="remember" name="rememberme" value="{{ old('remember') ? 'checked' : '' }}" style="float: left;">
                  <label for="remember">Se souvenir de moi</label>
                </div>
                <button class="btn btn-common log-btn" name="connect" type="submit">Envoyer</button>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="/inscription">Vous n'avez pas de compte?</a></li>
                <li class="pull-right"><a href="/forgetPassword">Mot de passe oublier?</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

    @endsection