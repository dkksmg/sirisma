@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Halo!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Salam'),<br>
{{-- {{ config('app.name') }} --}}
Seksi Infokes DKK Semarang
<br><br>
<p style="font-size: 10px; font-weight: bold">Dinas Kesehatan Kota Semarang<br>
  Jl. Pandanaran No.79, Mugassari, Kec. Semarang Selatan, Kota Semarang, Jawa Tengah 50249<br>
  No. Telp : (024) 8318070</p>
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
"Jika Anda tidak dapat mengklik tombol \":actionText\" silakan copy dan paste URL\n".
'berikut ke browser Anda :',
[
'actionText' => $actionText,
]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent
