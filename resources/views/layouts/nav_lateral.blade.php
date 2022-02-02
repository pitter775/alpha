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
                
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Dependências  do Usuário</span><i data-feather="more-horizontal"></i></li>

                <li class="{{ $elementActive == 'usuario' ? 'active' : '' }} nav-item">
                    <a class="d-flex align-items-center" href="/usuario" onclick="link('/usuario')">
                    <i data-feather="users"></i><span class="menu-title text-truncate" data-i18n="Pessoas">Usuários</span></a>
                </li>

                <li class="nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Variáveis</span></a>
                    <ul class="menu-content">
                        <!-- <li class="{{ $elementActive == 'usuario' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/usuario" onclick="link('/usuario')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Pessoas">Pessoas</span></a>
                        </li>                         -->
                        <li class="{{ $elementActive == 'supervisao' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/supervisao" onclick="link('/supervisao')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Supervisões">Supervisões</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'tarifa' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/tarifa" onclick="link('/tarifa')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Tarifas">Tarifas</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'cargo' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/cargo" onclick="link('/cargo')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Cargos">Cargos</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'regime' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/regime" onclick="link('/regime')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Regimes">Regimes</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'empresa' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/empresa" onclick="link('/empresa')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Empresas">Empresas</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'alocacao' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/alocacao" onclick="link('/alocacao')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Alocaçãos">Alocaçãos</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'setor' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/setor" onclick="link('/setor')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Setores">Setores</span></a>
                        </li>                        
                        <li class="{{ $elementActive == 'frente' ? 'active' : '' }}">
                            <a class="d-flex align-items-center"  href="/frente" onclick="link('/frente')"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Frentes">Frentes</span></a>
                        </li>                        
                    </ul>
                </li>


               
                
             
              
                               
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->