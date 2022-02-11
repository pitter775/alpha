    <!-- BEGIN: Main Menu-->
    <style>
        .menu_lateral { background-color: #FFF !important; background-image: url("{{asset('app-assets/images/bglateral.png')}} " ) !important; 
        background-repeat: no-repeat !important; 
        background-attachment: fixed !important; 
        background-position: bottom left !important;  
        }
    </style>
    <div class="main-menu menu_lateral menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header" >
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/home"><span class="brand-logo">
                    <img src="{{ asset('assets') }}/img/ge_logo.png" alt="" class="img-fluid"></span>
                        <!-- <h2 class="brand-text">Gestão</h2> -->
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/home" onclick="link('/home')">
                    <i data-feather='home'></i><span class="menu-title text-truncate" data-i18n="deshboard">Dashboard</span></a>
                </li>
                <li class="{{ $elementActive == 'usuario' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/usuario" onclick="link('/usuario')">
                    <i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Usuários">Usuários</span></a>
                </li>
                <li class="{{ $elementActive == 'matricula' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/matriculas" onclick="link('/matriculas')">
                    <i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Usuários">Matrículas</span></a>
                </li>
                <li class="{{ $elementActive == 'escolas' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/escolas" onclick="link('/escolas')">
                    <i data-feather='codesandbox'></i><span class="menu-title text-truncate" data-i18n="Escolas">Escolas</span></a>
                </li>
                <li class="{{ $elementActive == 'cardapio' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/cardapio" onclick="link('/cardapio')">
                    <i data-feather='coffee'></i><span class="menu-title text-truncate" data-i18n="Cardápio">Cardápios</span></a>
                </li>
                <li class="{{ $elementActive == 'series' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/series" onclick="link('/series')">
                    <i data-feather='edit'></i><span class="menu-title text-truncate" data-i18n="Séries">Séries</span></a>
                </li>
                <li class="{{ $elementActive == 'diciplina' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/diciplina" onclick="link('/diciplina')">
                        <i data-feather='command'></i><span class="menu-title text-truncate" data-i18n="disciplinas">Disciplinas</span></a>
                </li>
                
                <!-- <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Dependências  do Usuário</span><i data-feather="more-horizontal"></i></li> -->

            

                <li class="nav-item"><a class="d-flex align-items-center" href="#">
                    <i data-feather='git-pull-request'></i><span class="menu-title text-truncate" data-i18n="Invoice">Relacionamentos</span></a>
                    <ul class="menu-content">
                        <li class="{{ $elementActive == 'professores' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/professores" onclick="link('/professores')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Professores">Professores</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'series' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/series" onclick="link('/series')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Séries">Séries</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'diciplina' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/diciplina" onclick="link('/diciplina')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Disciplinas">Disciplinas</span></a>
                        </li>                                              
                    </ul>
                </li>


               
                
             
              
                               
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->