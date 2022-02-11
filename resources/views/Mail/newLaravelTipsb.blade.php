@component('mail::message')
        

<h4>Clique no link abaixo para fazer o cadastro da matrícula, ou continuar um cadastro.</h4>
{{-- <h1>envio de emial {{$user->name}}</h1> --}}
@component('mail::button',['url' => route('telamatricula',['id'=>$user->token])])
        Abrir a matrícula
@endcomponent
@endcomponent