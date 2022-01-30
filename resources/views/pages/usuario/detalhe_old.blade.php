@extends('layouts.app', [
'elementActive' => 'usuario'
])
@section('content')
<style>
   .dropzone .dz-preview {
      zoom: 0.8;
   }
</style>
<!-- BEGIN: Content-->
<div class="content-wrapper" data-aos=fade-left data-aos-delay=0>
   <input type="hidden" value="{{$user->id}}" name="iduser" id="iduser">

   <div class="content-body">
      <section class="app-user-view-account">
         <div class="row">
            <!-- User Sidebar -->
            <div class="col-xl-3 col-lg-4 col-md-4 order-1 order-md-0">
               <!-- User Card -->
               <div id="divcarduser">

               </div>

               <!-- /User Card -->
            </div>
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-9 col-lg-8 col-md-7 order-0 order-md-1">
               <!-- Project table -->
               <section class="app-user-edit">
                  <div class="card">
                     <div class="card-body">
                        <ul class="nav nav-pills" role="tablist">
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                 <i data-feather="user"></i><span class="d-none d-sm-block">Conta</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                 <i data-feather="info"></i><span class="d-none d-sm-block">Informações</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="controle-tab" data-toggle="tab" href="#controle" aria-controls="controle" role="tab" aria-selected="false">
                                 <i data-feather='activity'></i><span class="d-none d-sm-block">Controle</span>
                              </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" id="arquivos-tab" data-toggle="tab" href="#arquivos" aria-controls="arquivos" role="tab" aria-selected="false">
                                 <i data-feather='file'></i><span class="d-none d-sm-block">Arquivos</span>
                              </a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                              <form class="form-conta">
                                 @csrf
                                 <input type="hidden" value="{{$user->id}}" name="id_geral" id="id_geral" />
                                 <div class="row">
                                    <div class="col-md-8">
                                       <div class="media mb-2">
                                          @if($user->foto == null)
                                          <img src=" {{asset('app-assets/images/avatars/avatar.png')}}" alt="users avatar" data-tipo="avatar" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                          <input type="hidden" value="" name="foto" id="foto" />
                                          @endif
                                          @if($user->foto !== null)
                                          <img src=" {{$user->foto}}" alt="users avatar" data-tipo="nova" id="fotouser" class="user-avatar users-avatar-shadow rounded mr-2 my-25 cursor-pointer" height="90" width="90" />
                                          <input type="hidden" value="{{$user->foto}}" name="foto" id="foto" />
                                          @endif

                                          <div class="media-body mt-50">
                                             <h4>{{$user->name}}</h4>
                                             <div class="col-12 d-flex mt-1 px-0">
                                                <label class="btn btn-primary mr-75 mb-0" for="change-picture">
                                                   <span class="d-none d-sm-block btmudar">Mudar</span>
                                                   <input class="form-control" type="file" id="change-picture" hidden accept="image/png, image/jpeg, image/jpg" />
                                                   <span class="d-block d-sm-none">
                                                      <i class="mr-0" data-feather="edit"></i>
                                                   </span>
                                                </label>
                                                <button class="btn btn-outline-secondary d-none d-sm-block btreset">Reset</button>
                                                <button class="btn btn-outline-secondary d-block d-sm-none">
                                                   <i class="mr-0" data-feather="trash-2"></i>
                                                </button>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label class="form-label" for="alteracao">Data Alteração</label>
                                          <input type="text" id="alteracao" name="alteracao" class="form-control flatpickr-basic" value="" />
                                          <small class="text-muted">Se a alteração for retroativa, altere a data.</small>
                                       </div>
                                    </div>

                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="fullname">Nome</label>
                                          <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" name="fullname" id="fullname" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="email">E-mail</label>
                                          <input type="email" class="form-control" placeholder="Email" value="{{$user->email}}" name="email" id="email" />
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="status">Status</label>
                                          <select id="status" name="status" class="form-control select2">
                                             <option value="1" @if($user->status == 1) selected @endif >Ativo</option>
                                             <option value="2" @if($user->status == 2) selected @endif >Inativo</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="perfil">Perfil</label>
                                          <select id="perfil" name="perfil" class="form-control select2">
                                             <option value="1" @if($user->perfil == 1) selected @endif>Usuário</option>
                                             <option value="10" @if($user->perfil == 10) selected @endif>ADM</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label for="empresa">Empresa</label>
                                          <input type="hidden" id="hempresa" value="{{$user->empresas_id}}">
                                          <select id="empresa" name="empresa" class="form-control select2">
                                             @foreach($empresa as $key => $value)
                                             <option value="{{ $value->id }}" @if($user->empresas_id == $value->id) selected @endif >{{ $value->name }}</option>
                                             @endforeach
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                          <label class="form-label" id="senhalabel" for="senha">Nova Senha</label>
                                          <input type="text" id="senha" class="form-control dt-uname" placeholder="Senha" aria-label="jdoe1" aria-describedby="senha" name="senha" />
                                       </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                       <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Salvar Alterações</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="tab-pane fade " id="information" aria-labelledby="information-tab" role="tabpanel">
                              <form class="form-validate">
                                 <div class="row mt-1">
                                    <div class="col-12">
                                       <h4 class="mb-1">
                                          <i data-feather="user" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Informações Pessoais</span>
                                       </h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="birth">Data de Nascimento</label>
                                          <input id="birth" type="text" class="form-control birthdate-picker" name="dob" placeholder="YYYY-MM-DD" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="mobile">Mobile</label>
                                          <input id="mobile" type="text" class="form-control" value="&#43;6595895857" name="phone" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="website">Website</label>
                                          <input id="website" type="text" class="form-control" placeholder="Website here..." value="https://rowboat.com/insititious/Angelo" name="website" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="languages">Languages</label>
                                          <select id="languages" class="form-control">
                                             <option value="English">English</option>
                                             <option value="Spanish">Spanish</option>
                                             <option value="French" selected>French</option>
                                             <option value="Russian">Russian</option>
                                             <option value="German">German</option>
                                             <option value="Arabic">Arabic</option>
                                             <option value="Sanskrit">Sanskrit</option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label class="d-block mb-1">Gender</label>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="male" name="gender" class="custom-control-input" />
                                             <label class="custom-control-label" for="male">Male</label>
                                          </div>
                                          <div class="custom-control custom-radio custom-control-inline">
                                             <input type="radio" id="female" name="gender" class="custom-control-input" checked />
                                             <label class="custom-control-label" for="female">Female</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label class="d-block mb-1">Contact Options</label>
                                          <div class="custom-control custom-checkbox custom-control-inline">
                                             <input type="checkbox" class="custom-control-input" id="email-cb" checked />
                                             <label class="custom-control-label" for="email-cb">Email</label>
                                          </div>
                                          <div class="custom-control custom-checkbox custom-control-inline">
                                             <input type="checkbox" class="custom-control-input" id="message" checked />
                                             <label class="custom-control-label" for="message">Message</label>
                                          </div>
                                          <div class="custom-control custom-checkbox custom-control-inline">
                                             <input type="checkbox" class="custom-control-input" id="phone" />
                                             <label class="custom-control-label" for="phone">Phone</label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-12">
                                       <h4 class="mb-1 mt-2">
                                          <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                                          <span class="align-middle">Endereço</span>
                                       </h4>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="address-1">Address Line 1</label>
                                          <input id="address-1" type="text" class="form-control" value="A-65, Belvedere Streets" name="address" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="address-2">Address Line 2</label>
                                          <input id="address-2" type="text" class="form-control" placeholder="T-78, Groove Street" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="postcode">Postcode</label>
                                          <input id="postcode" type="text" class="form-control" placeholder="597626" name="zip" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="city">City</label>
                                          <input id="city" type="text" class="form-control" value="New York" name="city" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="state">State</label>
                                          <input id="state" type="text" class="form-control" name="state" placeholder="Manhattan" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                       <div class="form-group">
                                          <label for="country">Country</label>
                                          <input id="country" type="text" class="form-control" name="country" placeholder="United States" />
                                       </div>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                       <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                       <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="tab-pane fade " id="controle" aria-labelledby="controle-tab" role="tabpanel">
                              <form class="form-validate">
                                 <div class="row">
                                    <div class="col-lg-4 col-md-6 form-group">
                                       <label for="twitter-input">Twitter</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon3">
                                                <i data-feather="twitter" class="font-medium-2"></i>
                                             </span>
                                          </div>
                                          <input id="twitter-input" type="text" class="form-control" value="https://www.twitter.com/adoptionism744" placeholder="https://www.twitter.com/" aria-describedby="basic-addon3" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                       <label for="facebook-input">Facebook</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon4">
                                                <i data-feather="facebook" class="font-medium-2"></i>
                                             </span>
                                          </div>
                                          <input id="facebook-input" type="text" class="form-control" value="https://www.facebook.com/adoptionism664" placeholder="https://www.facebook.com/" aria-describedby="basic-addon4" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                       <label for="instagram-input">Instagram</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon5">
                                                <i data-feather="instagram" class="font-medium-2"></i>
                                             </span>
                                          </div>
                                          <input id="instagram-input" type="text" class="form-control" value="https://www.instagram.com/adopt-ionism744" placeholder="https://www.instagram.com/" aria-describedby="basic-addon5" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                       <label for="github-input">Github</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon9">
                                                <i data-feather="github" class="font-medium-2"></i>
                                             </span>
                                          </div>
                                          <input id="github-input" type="text" class="form-control" value="https://www.github.com/madop818" placeholder="https://www.github.com/" aria-describedby="basic-addon9" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                       <label for="codepen-input">Codepen</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon12">
                                                <i data-feather="codepen" class="font-medium-2"></i>
                                             </span>
                                          </div>
                                          <input id="codepen-input" type="text" class="form-control" value="https://www.codepen.com/adoptism243" placeholder="https://www.codepen.com/" aria-describedby="basic-addon12" />
                                       </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 form-group">
                                       <label for="slack-input">Slack</label>
                                       <div class="input-group input-group-merge">
                                          <div class="input-group-prepend">
                                             <span class="input-group-text" id="basic-addon11">
                                                <i data-feather="slack" class="font-medium-2"></i>
                                             </span>
                                          </div>
                                          <input id="slack-input" type="text" class="form-control" value="@adoptionism744" placeholder="https://www.slack.com/" aria-describedby="basic-addon11" />
                                       </div>
                                    </div>

                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                       <button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
                                       <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                           <div class="tab-pane fade " id="arquivos" aria-labelledby="arquivos-tab" role="tabpanel">
                              <form action="{{ route('dropzoneFileUpload') }}" class="dropzone" id="file-upload" enctype="multipart/form-data" style="height: 200px;">
                                 @csrf
                                 <div class="dz-message">
                                    Clique ou solte os arquivos aqui.<br>
                                 </div>
                                 <input type="hidden" value="{{$user->id}}" name="id_geral" id="id_geral">
                              </form>

                              <div class="card" style="padding-right: 0;">
                                 <!-- <h4 class="fw-bolder border-bottom pb-50 mb-1 mt-75">Todos os Arquivos</h4> -->
                                 <div id="cardArquivos">

                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
               </section>
               <!-- /Project table -->

               <!-- Activity Timeline -->
               <div class="card" id="divcarhistory">
                  <h4 class="card-header">Histórico de Alterações</h4>
                  <div class="card-body pt-1">
                     <form class="historico">
                        @csrf
                        <table class="history-list-table table table-sm table-responsive-lg">
                           <thead class="thead-light">
                              <tr>
                                 <th></th>
                                 <th>Tipo</th>
                                 <th>Alteração</th>
                                 <th>Data</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                        </table>
                     </form>
                  </div>
               </div>
               <!-- /Activity Timeline -->
            </div>
            <!--/ User Content -->
         </div>
      </section>


   </div>
</div>

<!-- END: Content-->
@endsection

@push('css_vendor')
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/toastr.min.css">

<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/pickadate/pickadate.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">


@endpush

@push('css_page')

<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-user.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/pickers/form-pickadate.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-validation.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/file-uploaders/dropzone.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-file-uploader.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-file-manager.css">



@endpush

@push('js_page')
<script src="../../../app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>


<script src="../../../app-assets/js/scripts/forms/form-select2.js"></script>
<script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
<script src="../../../app-assets/js/scripts/pages/app-usuario-detalhe.js"></script>
<script src="../../../app-assets/js/scripts/forms/pickers/form-pickers.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
<script src="../../../app-assets/js/scripts/forms/form-file-uploader.js"></script>


@endpush

@push('js_vendor')
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script src="../../../app-assets/vendors/js/extensions/polyfill.min.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
<script src="../../../app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
<script src="../../../app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
<!-- <script src="../../../app-assets/vendors/js/extensions/dropzone.min.js"></script> -->


@endpush