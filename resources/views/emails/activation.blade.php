@component('mail::message')

# {{ $user->email }} için Hesap Aktifleştirme

@component('mail::button', ['url' => $activationUrl, 'color' => 'green'])
Hesabınızı Aktifleştirin
@endcomponent

@component('mail::panel')
{{ $activationUrl }}
@endcomponent

- Buton çalışmıyorsa butonun altındaki urlyi kopyalayıp tarayıcınıza yapıştırın ve enter a basın.

- Bu isteği siz gerçekleştirmediyseniz bu maili görmezden gelebilirsiniz.

<br>
Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
