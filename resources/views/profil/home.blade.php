
@extends('profil.layout')

@section('content')

<!-- Start Content -->
      <div class="col-sm-9 page-content">
        <div class="inner-box">
          <div class="usearadmin">
            <h3><a href="#"><img class="userimg" src="{{asset('img/picto-user.png')}}" alt=""> {{Auth::user()->nom ." ". Auth::user()->prenom}}</a></h3>
          </div>
        </div>
        <div class="inner-box">
          <div class="welcome-msg">

            @if(Session('message'))
              <div class="row">
                  <div class="alert alert-success col-xs-5 col-xs-offset-4">
                      <strong>{{Session::get('message')}}</strong>
                  </div>
              </div>
            @else 
              <span class="page-sub-header-sub small">Dernier accès au Web le: 01-03-2017 à 02:55 PM</span>  
            @endif

          </div>
          <div id="accordion" class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Informations personnels </a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="collapseB1">
                <div class="panel-body">
                  <form role="form" method="post" action="/updateInfoUser/{{Auth::user()->id}}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">Nom</label>
                      <input class="form-control" value="{{Auth::user()->nom}}" type="text" name="nom">
                      @error('nom')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group {{ $errors->has('prenom') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">Prénom</label>
                      <input class="form-control" value="{{Auth::user()->prenom}}" type="text" name="prenom">
                      @error('prenom')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">Email</label>
                      <input class="form-control" value="{{Auth::user()->email}}" type="email" name="email">
                      @error('email')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="control-label">Adresse</label>
                      <input class="form-control" value="{{Auth::user()->adresse}}" type="text" name="adresse">
                    </div>
                    <div class="form-group">
                      <label for="Phone" class="control-label">Numéro de téléphone</label>
                      <input class="form-control" id="Phone" value="{{Auth::user()->phone}}" type="text" name="phone">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">Modifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default" id="error">
              <div class="panel-heading">
              @if ($errors->any())
                <h4 class="panel-title"> <a href="#collapseB2" data-toggle="collapse"> Paramètres </a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="collapseB2">
              @else 
              <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB2" data-toggle="collapse"> Paramètres </a> </h4>
              </div>
              <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
              @endif
                <div class="panel-body">
                  <form role="form" method="post" action="/updatePassword/{{Auth::user()->id}}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group">
                      <!--<div class="checkbox">
                        <label><input type="checkbox">Activés les commentaires sur mes annonces </label>
                      </div>-->
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">Nouveau mot de passe</label>
                      <input class="form-control" placeholder="" name="password" type="password">
                       @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group {{ $errors->has('confirmPassword') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">Confirmation</label>
                      <input class="form-control" placeholder="" name="confirmPassword" type="password">
                       @error('confirmPassword')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">Modifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--<div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB3" data-toggle="collapse">
                    Options de compte et de notification </a> </h4>
              </div>
              <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB3">
                <div class="panel-body">
                  <div class="form-group">
                    <div class="col-sm-12">
                      <div class="checkbox">
                        <label><input type="checkbox">Je souhaite activer les notifications par E-mail. </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
          </div>
        </div>
      </div>

<!-- End Content -->

@endsection