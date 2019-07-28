
    @extends('layout')

    @section('content')

    <!-- Content section Start --> 
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                MOT DE PASSE OUBLIÉ
              </h3>
              <form role="form" class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="E-mail">
                  </div>
                </div>     
                <button class="btn btn-common log-btn">Envoyer</button>
              </form>
              <ul class="form-links">
                <li class="pull-left"><a href="/inscription">Vous n'avez pas de compte ?</a></li>
                <li class="pull-right"><a href="/connexion">Connexion</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Content section End -->

    @endsection