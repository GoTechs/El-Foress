@extends('../../layout')

    @section('content')

    <!-- Content section Start --> 
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                {{__('authentication.reset_password_title')}}
              </h3>
              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
              <form role="form" class="login-form" method="POST" action="{{ route('password.reset') }}" id="form">
                @csrf
                <!--<div class="form-group">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="E-mail">
                  </div>
                </div> -->

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <div class="input-icon">
                      <i class="icon fa fa-envelope"></i>
                      <input type="text" class="form-control" id="email" name="email" placeholder="{{__('authentication.email_input')}}"/>
                    </div>
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" id="password" name="password" placeholder="{{__('authentication.password_input')}}"/>
                  </div>
                  @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{__('authentication.confirm_password_input')}}"/>
                  </div>
                  @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                  @endif
                </div>


                <button type="submit" class="btn btn-common log-btn">{{__('authentication.reset_button')}}</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section> 
    <!-- Content section End -->

    @endsection