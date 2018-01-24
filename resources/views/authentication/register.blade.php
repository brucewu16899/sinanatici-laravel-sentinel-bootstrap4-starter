@extends('master')


@section('content')


  <form class="form-signin" action="{{ route('register') }}" method="POST">
    {{ csrf_field() }}
    @include('_partials.messages')
    <h4 class="form-signin-heading">Lütfen bilgilerinizi giriniz</h4>
    <label for="email" class="sr-only">Email Adresiniz</label>
    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@email.com" required>
    
    <label for="first_name" class="sr-only">İsminiz</label>
    <input type="text" name="first_name" class="form-control rounded-0 border-bottom-0"  value="{{ old('first_name') }}" placeholder="İsminiz">
    
    <label for="last_name" class="sr-only">Soy isminiz</label>
    <input type="text" name="last_name" class="form-control rounded-0 border-bottom-0"  value="{{ old('last_name') }}" placeholder="Soy isminiz">
    
    <label for="password" class="sr-only">Şifre</label>
    <input type="password" name="password" class="form-control rounded-0 border-bottom-0 mb-0" placeholder="Şifre" required>
    
    <label for="password_confirmation" class="sr-only">Şifre</label>
    <input type="password" name="password_confirmation" class="form-control" placeholder="Şifre tekrarı" required>
    
    <div class="checkbox">
      <label>
        <input type="checkbox" value="sozlesme" checked> <u><a class="text-default" href="#">Kullanıcı sözleşmesi</a></u>ni okudum ve kabul ediyorum.
      </label>
    </div>

    <button class="btn btn-lg btn-success btn-block" type="submit">Kayıt ol</button>
    
  </form>
  
  <hr>
  
  <div class="form-bottom">
      <div class="row">
          <div class="col">
              <a href="{{ route('home') }}" class="btn btn-light btn-block">Anasayfa</a>
          </div>
          <div class="col">
              <a href="{{ route('login') }}" class="btn btn-light btn-block">Giriş Sayfası</a>
          </div>
      </div>
  </div>
  


@endsection

