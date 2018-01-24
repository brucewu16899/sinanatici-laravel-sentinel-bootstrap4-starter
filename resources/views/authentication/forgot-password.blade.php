@extends('master')
@section('content')
  <form class="form-signin" action="{{ route('forgotPassword') }}" method="POST">

    {{ csrf_field() }}
    @include('_partials.messages')
    <h4 class="form-signin-heading">Şifremi unuttum</h4>
    
    <p class="text-muted">Mail adresinizi girin. Size bir şifre yenileme maili yollayacağız.</p>
    
    <label for="email" class="sr-only">Email Adresiniz</label>
    
    <input type="email" id="email" name="email" class="form-control form-control-lg rounded mb-2" value="{{ old('email') }}" placeholder="email@email.com" required>
    <button class="btn btn-lg btn-success btn-block" type="submit">Yenileme Kodu Gönder</button>
    
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
