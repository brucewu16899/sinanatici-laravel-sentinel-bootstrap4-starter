@component('mail::message')

# {{ $user->email }} için Şifre Yenileme

@component('mail::button', ['url' => $forgotPasswordUrl, 'color' => 'green'])
Şifreyi Yenile
@endcomponent

@component('mail::panel')
{{ $forgotPasswordUrl }}
@endcomponent

- Buton çalışmıyorsa butonun altındaki urlyi kopyalayıp tarayıcınıza yapıştırın ve enter a basın.

- Bu isteği siz gerçekleştirmediyseniz bu maili görmezden gelebilirsiniz.

<br>
Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
