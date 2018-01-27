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

@section('content')


  <form class="form-signin text-center" action="{{ route('register') }}" method="POST">
    @include('_partials.messages')
    {{ csrf_field() }}

    <h1 class="h3 mb-3 font-weight-bold">Lütfen bilgilerinizi giriniz</h1>

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



@endsection

