
@extends('layouts.app', ['elementActive' => 'dashboard'])
@section('content')


                
<div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
    
    <div class="content-header row">
        <div class="col-md-12"><h4>Dashboard</h4> </div>        
    </div>

</div>
@endsection

@push('css_vendor')
    
@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-dashboard.css">
@endpush

@push('js_page')
    <script src="../../../app-assets/js/scripts/pages/app-dashboard.js"></script>
@endpush

@push('js_vendor')

@endpush


