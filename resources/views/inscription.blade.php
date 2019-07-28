
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
              <form class="login-form" id="formValidation" method="post" action="">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="nomuser" class="form-control" name="nomuser" placeholder="Nom" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="prenomuser" class="form-control" name="prenomuser" placeholder="Prénom" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="text" id="adresse" class="form-control" name="adresse" placeholder="Adresse">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input type="email" id="email" class="form-control" name="email" placeholder="Adresse mail">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-phone"></i>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="N° Téléphone">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="username" class="form-control" name="username" placeholder="Nom d'utilisateur" required>
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required>
                  </div>
                </div>  
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Confirmer Mot de passe" required>
                  </div>
                </div>                 
                <div class="checkbox">
                  <input type="checkbox" id="terms" name="terms" style="float: left;">
                  <label for="remember">En créant un compte, vous acceptez nos conditions</label>
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
