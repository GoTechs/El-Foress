
@extends('profil.layout')

@section('content')

<!-- Start Content -->
      <div class="col-sm-9 page-content">
        <div class="inner-box">
          <div class="usearadmin">
            <h3><a href="#"><img class="userimg" src="{{asset('img/picto-user.png')}}" alt=""> {{Auth::user()->nom}}</a></h3>
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
              <span class="page-sub-header-sub small"><!--Dernier accès au Web le: 01-03-2017 à 02:55 PM--></span>  
            @endif

          </div>
          <div id="accordion" class="panel-group">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> {{__('home_profil.home_page_title')}}</a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="collapseB1">
                <div class="panel-body">
                  <form role="form" method="post" action="/updateInfoUser/{{Auth::user()->id}}">
                    @csrf
                    {{ method_field('PATCH') }}
                    <div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">{{__('home_profil.last_name_input')}}</label>
                      <input class="form-control" value="{{Auth::user()->nom}}" type="text" name="nom">
                      @error('nom')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label class="control-label">{{__('home_profil.email_input')}}</label>
                      <input class="form-control" value="{{Auth::user()->email}}" type="email" name="email" disabled>
                    </div>
                    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} has-feedback">
                      <label for="Phone" class="control-label">{{__('home_profil.phone_input')}}</label>
                      <input class="form-control" id="Phone" value="{{Auth::user()->phone}}" type="text" name="phone">
                      @error('phone')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">{{__('home_profil.update_button')}}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="panel panel-default" id="error">
              <div class="panel-heading">
              @if ($errors->any())
                <h4 class="panel-title"> <a href="#collapseB2" data-toggle="collapse"> {{__('home_profil.setting_title')}} </a> </h4>
              </div>
              <div class="panel-collapse collapse in" id="collapseB2">
              @else 
              <h4 class="panel-title"> <a aria-expanded="false" class="collapsed" href="#collapseB2" data-toggle="collapse"> {{__('home_profil.setting_title')}} </a> </h4>
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
                    <div class="form-group {{ $errors->has('currentpassword') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">Mot de passe actuel</label>
                      <input class="form-control" placeholder="" name="currentpassword" type="password" value="{{old('currentpassword')}}">
                       @error('currentpassword')
                      <div class="invalid-feedback">{!! $message !!}</div>
                      @enderror
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">{{__('home_profil.password_input')}}</label>
                      <input class="form-control" placeholder="" name="password" type="password" value="{{old('password')}}">
                       @error('password')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group {{ $errors->has('confirmPassword') ? ' has-error' : '' }} has-feedback">
                      <label class="control-label">{{__('home_profil.confirm_password_input')}}</label>
                      <input class="form-control" placeholder="" name="confirmPassword" type="password" value="{{old('confirmPassword')}}">
                       @error('confirmPassword')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-common">{{__('home_profil.update_button')}}</button>
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