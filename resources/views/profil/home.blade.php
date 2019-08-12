
@extends('layout')

@section('content')

<!-- Start Content -->
<div id="content">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 page-sideabr">
        <aside>
          <div class="inner-box">
            <div class="user-panel-sidebar">
              <div class="collapse-box">
                <h5 class="collapset-title no-border">Mon profil <a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myclassified"><i class="fa fa-angle-down"></i></a></h5>
                <div aria-expanded="true" id="myclassified" class="panel-collapse collapse in">
                  <ul class="acc-list">
                    <li class="active">
                      <a href="/home"><i class="fa fa-home"></i> {{Auth::user()->username}} </a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="collapse-box">
                <h5 class="collapset-title">Mon compte<a aria-expanded="true" class="pull-right" data-toggle="collapse" href="#myads"><i class="fa fa-angle-down"></i></a></h5>
                <div aria-expanded="true" id="myads" class="panel-collapse collapse in">
                  <ul class="acc-list">
                    <li>
                      <a href="/myads"><i class="fa fa-credit-card"></i> Mes Annonces <span class="badge">44</span></a>
                    </li>
                    <li>
                      <a href="/favorites"><i class="fa fa-heart-o"></i> Mes Favoris <span class="badge">19</span></a>
                    </li>
                    <li>
                      <a href="/archives"><i class="fa fa-folder-o"></i> Archives <span class="badge">49</span></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="collapse-box">
                <div aria-expanded="true" id="close" class="panel-collapse collapse in">
                  <ul class="acc-list">
                    <li>
                      <a href="/logout"><i class="fa fa-close"></i> Déconnexion</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          
        </aside>
      </div>
      <div class="col-sm-9 page-content">
        <div class="inner-box">
          <div class="usearadmin">
            <h3><a href="#"><img class="userimg" src="{{asset('img/picto-user.png')}}" alt=""> {{Auth::user()->username}}</a></h3>
          </div>
        </div>
        <div class="inner-box">
          <div class="welcome-msg">

            <span class="page-sub-header-sub small">Dernier accès au Web le: 01-03-2017 à 02:55 PM</span>
          </div>
          <div id="accordion" class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> Informations personnels </a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="collapseB1">
                <div class="panel-body">
                  <form role="form">
                    <div class="form-group">
                      <label class="control-label">Nom</label>
                      <input class="form-control" placeholder="{{Auth::user()->nom}}" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Prénom</label>
                      <input class="form-control" placeholder="{{Auth::user()->prenom}}" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Email</label>
                      <input class="form-control" placeholder="{{Auth::user()->email}}" type="email">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Adresse</label>
                      <input class="form-control" placeholder="{{Auth::user()->adresse}}" type="text">
                    </div>
                    <div class="form-group">
                      <label for="Phone" class="control-label">Numéro de téléphone</label>
                      <input class="form-control" id="Phone" placeholder="{{Auth::user()->phone}}" type="text">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">Modifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB2" data-toggle="collapse"> Paramètres </a> </h4>
              </div>
              <div style="height: 0px;" aria-expanded="false" class="panel-collapse collapse" id="collapseB2">
                <div class="panel-body">
                  <form role="form">
                    <div class="form-group">
                      <div class="checkbox">
                        <label><input type="checkbox">Activés les commentaires sur mes annonces </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Nouveau mot de passe</label>
                      <input class="form-control" placeholder="" type="password">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Confirmation</label>
                      <input class="form-control" placeholder="" type="password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">Modifier</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default">
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
                      <div class="checkbox">
                        <label><input type="checkbox">Je souhaite reçevoir des conseils sur l'achat et la vente. </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End Content -->

@endsection