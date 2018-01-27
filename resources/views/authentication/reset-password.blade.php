@extends('master-authentication')

@section('head-after')
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .checkbox {
            font-weight: 400;
        }
        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin .pass-1 {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin .pass-2 {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')


  <form class="form-signin text-center" action="" method="POST">

    @include('_partials.messages')
    {{ csrf_field() }}

    <h1 class="h3 mb-3 font-weight-bold">Şifreyi yenile</h1>

    <p class="text-muted">Lütfen yeni şifrenizi aşağıya iki kez giriniz.</p>
    
    <label for="password" class="sr-only">Yeni şifreniz</label>
    <input type="password" name="password" class="form-control mb-0 border-bottom-0 pass-1" placeholder="Şifre" required>
    
    <label for="password" class="sr-only">Yeni şifreniz tekrar</label>
    <input type="password" name="password_confirmation" class="form-control pass-2" placeholder="Şifre tekrarı" required>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Şifreyi yenile</button>
    <p class="mt-5 mb-3 text-muted">
        <a href="{{ route('home') }}">Anasayfa</a> /
        <a href="{{ route('login') }}">Giriş yap</a> /
        <a href="{{ route('register') }}">Kayıt ol</a>
    </p>
  </form>


@endsection