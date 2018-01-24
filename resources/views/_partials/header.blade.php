<nav class="navbar navbar-expand-md navbar-dark bg-primary">
  <div class="container">
    <a href="{{ config('app.url') }}" class="navbar-brand">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
        Anasayfa
        </a>
        </li>
        @if(Sentinel::check())
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="document.getElementById('logout-form').submit()">Çıkış</a>
            </li>
        @else
            <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
        Giriş
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">
        Kayıt
        </a>
        </li>
        @endif
    </ul>
    </div>
  </div>
</nav>
@if(Sentinel::check())
<form class="navbar-form hidden" action="{{ route('logout') }}" method="POST" id="logout-form">
{{ csrf_field() }}
</form>
@endif
