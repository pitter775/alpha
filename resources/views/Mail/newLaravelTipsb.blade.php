@component('mail::message')
        

<h2>Clique no link abaixo para fazer o cadastro da Matricula, ou continuar um cadastro.</h2>
{{-- <h1>envio de emial {{$user->name}}</h1> --}}
@component('mail::button',['url' => 'https://pitterweb.com.br'])
        Cadastro de Matriculas
@endcomponent
@endcomponent