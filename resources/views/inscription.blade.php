
    @extends('layout')

    @section('content')

    <!-- Content section Start --> 
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
            <div class="page-login-form box">
              <h3>
                {{__('authentication.register_description')}}
              </h3>
              <form class="login-form" method="post" action="/admin/inscription">
                @csrf
                <div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-user"></i>
                    <input type="text" id="nom" class="form-control" name="nom" placeholder="{{__('authentication.last_name_input')}}" value="{{old('nom')}}">
                  </div>
                  @error('nom')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-envelope"></i>
                    <input  id="email" class="form-control" name="email" placeholder="{{__('authentication.email_input')}}" value="{{old('email')}}">
                  </div>
                  @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" id="password" name="password" class="form-control" placeholder="{{__('authentication.password_input')}}" value="{{old('password')}}">
                  </div>
                  @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group {{ $errors->has('confirmPassword') ? ' has-error' : '' }} has-feedback">
                  <div class="input-icon">
                    <i class="icon fa fa-unlock-alt"></i>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="{{__('authentication.confirm_password_input')}}" value="{{old('confirmPassword')}}">
                  </div>
                  @error('confirmPassword')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <button class="btn btn-common log-btn" type="submit" name="addMember">{{__('authentication.register_submit_button')}}</button>
              </form>
              <ul class="form-links">
                <li>  <a href="/connexion">Vous avez déjà un compte ?</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content section End -->

    @endsection
