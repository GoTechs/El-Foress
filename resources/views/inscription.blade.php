
    @extends('layout')

    @section('content')

    <!-- Page Header Start -->
    <div class="page-header" style="background: url({{asset('img/banner1.jpg')}}">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">Rejoignez-nous</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page Header End --> 

    <!-- Content section Start --> 
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                Inscription
              </h3>
              <form class="login-form" id="formValidation" method="post" action="/inscription">
                @csrf
                <div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="nom" class="form-control" name="nom" placeholder="Nom" value="{{old('nom')}}">
                  </div>
                  @error('nom')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('prenom') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="prenom" class="form-control" name="prenom" placeholder="Prénom" value="{{old('prenom')}}">
                  </div>
                  @error('prenom')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('adresse') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" id="adresse" class="form-control" name="adresse" placeholder="Adresse" value="{{old('adresse')}}">
                  </div>
                  @error('adresse')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-phone"></i>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="N° Téléphone" value="{{old('phone')}}">
                  </div>
                  @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input  id="email" class="form-control" name="email" placeholder="Adresse mail" value="{{old('email')}}">
                  </div>
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Nom d'utilisateur" value="{{old('username')}}">
                  </div>
                  @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" value="{{old('password')}}">
                  </div>
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('confirmPassword') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmer Mot de passe" value="{{old('confirmPassword')}}">
                  </div>
                  @error('confirmPassword')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button class="btn btn-common log-btn" type="submit" name="addMember">Inscription</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

    @endsection
