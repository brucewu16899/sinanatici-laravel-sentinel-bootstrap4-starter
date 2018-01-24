@extends('master')


@section('content')


  <form class="form-signin" action="" method="POST">
    {{ csrf_field() }}
    @include('_partials.messages')
    <h4 class="form-signin-heading">Şifreyi yenile</h4>
    
    <p class="text-muted">Lütfen yeni şifrenizi aşağıya iki kez giriniz.</p>
    
    <label for="password" class="sr-only">Yeni şifreniz</label>
    <input type="password" name="password" class="form-control rounded-0 rounded-top mb-0" placeholder="Şifre" required>
    
    <label for="password" class="sr-only">Yeni şifreniz tekrar</label>
    <input type="password" name="password_confirmation" class="form-control rounded-0 rounded-bottom border-top-0" placeholder="Şifre tekrarı" required>
    
    <button class="btn btn-lg btn-success btn-block" type="submit">Şifreyi yenile</button>
    
  </form>


@endsection