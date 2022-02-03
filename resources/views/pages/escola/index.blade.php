
@extends('layouts.app', ['elementActive' => 'escolas'])
@section('content')

<!-- Modal novo usuário-->
<div class="modal modal-slide-in new-escola-modal fade" id="modals-slide-in">
    <div class="modal-dialog">
        <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <form class="add-new-escola  pt-0">
                @csrf 
                <input type="hidden" value="" name="id_geral" id="id_geral">
                
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel"><span class="ediadi">Adicionar</span> Escola</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="row"> 
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="fullname">Nome</label>
                                <input type="text" class="form-control dt-full-name" id="fullname" placeholder="Nome do Usuário" name="fullname" aria-label="John Doe" aria-describedby="fullname2" />
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" class="form-control dt-email" placeholder="usuario@example.com" aria-label="usuario@example.com" aria-describedby="email2" name="email" />                            
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label" for="status">Status</label>
                                <select id="status" name="status" class="form-control select2" > 
                                    <option value="1">Ativo</option>
                                    <option value="2">Inativo</option>                           
                                </select>
                            </div>
                        </div>  
                    </div>                                             
                    
                    <button type="submit" class="btn btn-primary mr-1 data-submit add waves-effect"><i data-feather='check-circle'></i> Salvar</button>
                    <button type="reset" class="btn btn-outline-secondary waves-effect" data-dismiss="modal"> <i data-feather='x'></i> Cancelar</button>
                    <a href="" class="btn btn-outline-primary waves-effect btdetalhe" style="margin-left: 10px;"> <i data-feather='archive'></i> Detalhes</a> 

                </div>
            </form>         
        </div>

    </div>
</div>
<!-- Modal Fim-->


                
<div class="content-wrapper" data-aos=fade-left data-aos-delay=0>

    <button type="button" class="btn btn-outline-primary"  data-toggle="modal", data-target= "#modals-slide-in"> 
        <i data-feather="home" class="mr-25"></i>
        <span>Nova Escola</span>
    </button>
    
    <!-- Profile Card -->
    <div class="row" style="margin-top: 20px">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="card card-profile">
            <img
                src="{{asset('app-assets/images/banner-escola.jpg')}}"
                class="img-fluid card-img-top"
                alt="Profile Cover Photo"
            />
            <div class="card-body">
                <div class="profile-image-wrapper">
                <div class="profile-image">
                    <div class="avatar">
                        <img src="{{asset('app-assets/images/escola-drummond.png')}}" />
                    </div>
                </div>
                </div>
                <h3>Carlos Drummond de Andrade</h3>
                <h6 class="text-muted">JD. Florida</h6>
                <div class="badge badge-light-primary profile-badge">Ativo</div>
                <hr class="mb-2" />
                <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="text-muted font-weight-bolder">Alunos</h6>
                    <h3 class="mb-0">2.5k</h3>
                </div>

                <div>
                    <h6 class="text-muted font-weight-bolder">Professores</h6>
                    <h3 class="mb-0">12</h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        
    </div>

</div>
@endsection

@push('css_vendor')
    
@endpush

@push('css_page')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-escola.css">
@endpush

@push('js_page')
    <script src="../../../app-assets/js/scripts/pages/app-escola.js"></script>
@endpush

@push('js_vendor')

@endpush


