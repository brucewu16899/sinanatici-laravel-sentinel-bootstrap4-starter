@extends('master-authentication')
@section('content')

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
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

<form class="form-signin text-center" action="{{ route('login') }}" method="POST">
    @include('_partials.messages')
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-bold">Giriş yapın</h1>
    <label for="email" class="sr-only">E-Mail adresiniz</label>
    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@email.com" required autofocus>
    <label for="inputPassword" class="sr-only">Şifreniz</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Şifre" required>
    <div class="checkbox mb-1 text-left">
        <label>
            <input type="checkbox" id="remember_me" name="remember_me"> Beni hatırla
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş yap</button>
    <p class="mt-5 mb-3 text-muted">
        <a href="{{ route('home') }}">Anasayfa</a> /
        <a href="{{ route('forgotPassword') }}">Şifremi unuttum</a> /
        <a href="{{ route('register') }}">Kayıt ol</a>
    </p>
</form>

@endsection
