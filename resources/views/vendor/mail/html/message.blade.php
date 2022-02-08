@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
Instituto Educação para o Futuro
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
{{-- © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.') --}}
<img src="{{url('/paper/assets/img/lgo-g.png')}}" style="height: 160px;"/>  
@endcomponent
@endslot
@endcomponent
