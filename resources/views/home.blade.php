
@extends('layouts.app', [
    'elementActive' => 'criacao'
])
@section('content')

<div class="content-wrapper" >
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Drag &amp; Drop</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Extensions</a>
                            </li>
                            <li class="breadcrumb-item active">Drag &amp; Drop
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <div class="form-group breadcrumb-right">
                <div class="dropdown">
                    <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <!-- Draggable cards section start -->
        <section id="draggable-cards">
            <div class="row" id="card-drag-area">
                <div class="col-xl-3 col-md-6 col-sm-12 draggable" data-aos=fade-left data-aos-delay=0>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Card 1</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie
                                powder.Donut sweet roll marzipan pastry cookie cake tootsie roll oat cake cookie.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 draggable"data-aos=fade-left data-aos-delay=20>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Card 2</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie
                                powder.Donut sweet roll marzipan pastry cookie cake tootsie roll oat cake cookie.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 draggable" data-aos=fade-left data-aos-delay=80>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Card 3</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie
                                powder.Donut sweet roll marzipan pastry cookie cake tootsie roll oat cake cookie.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12 draggable" data-aos=fade-left data-aos-delay=50>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Draggable Card 4</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie
                                powder.Donut sweet roll marzipan pastry cookie cake tootsie roll oat cake cookie.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Draggable cards section end -->

        <!-- Sortable lists section start -->
        <section id="sortable-lists" data-aos=fade-left data-aos-delay=100>
            <div class="row">
                <!-- Basic List Group starts -->
                <div class="col-sm-12">
                    <div class="card" >
                        <div class="card-header">
                            <h4 class="card-title">Basic List Group Sortable</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                The most basic list group is simply an unordered list with list items, and the proper classes.
                            </p>
                            <ul class="list-group" id="basic-list-group">
                                <li class="list-group-item draggable">
                                    <div class="media">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                        <div class="media-body">
                                            <h5>Mary S. Navarre</h5>
                                            <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon toffee icing.</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item draggable">
                                    <div class="media">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                        <div class="media-body">
                                            <h5>Samuel M. Ellis</h5>
                                            <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item draggable">
                                    <div class="media">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                        <div class="media-body">
                                            <h5>Sandra C. Toney</h5>
                                            <span>Sugar plum fruitcake gummies marzipan liquorice tiramisu. Pastry liquorice chupa chupsake</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item draggable">
                                    <div class="media">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                        <div class="media-body">
                                            <h5>Cleveland C. Goins</h5>
                                            <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item draggable">
                                    <div class="media">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                        <div class="media-body">
                                            <h5>Linda M. English</h5>
                                            <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon toffee icing.</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Basic List Group ends -->

                <!-- Multiple List Group starts -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Multiple Lists</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Drag and drop items of more than one list. Add same group to group prop</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <h4 class="my-1">People Group 1</h4>
                                    <ul class="list-group list-group-flush" id="multiple-list-group-a">
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Mary S. Navarre</h5>
                                                    <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Samuel M. Ellis</h5>
                                                    <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Sandra C. Toney</h5>
                                                    <span>Sugar plum fruitcake gummies marzipan liquorice tiramisu.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Cleveland C. Goins</h5>
                                                    <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Linda M. English</h5>
                                                    <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon.</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h4 class="my-1">People Group 2</h4>
                                    <ul class="list-group list-group-flush" id="multiple-list-group-b">
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-12.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Mary S. Navarre</h5>
                                                    <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-1.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Samuel M. Ellis</h5>
                                                    <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-2.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Sandra C. Toney</h5>
                                                    <span>Sugar plum fruitcake gummies marzipan liquorice tiramisu</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Cleveland C. Goins</h5>
                                                    <span>Toffee powder marzipan tiramisu. Cake cake dessert danish.</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item draggable">
                                            <div class="media">
                                                <img src="../../../app-assets/images/portrait/small/avatar-s-4.jpg" class="rounded-circle mr-2" alt="img-placeholder" height="50" width="50" />
                                                <div class="media-body">
                                                    <h5>Linda M. English</h5>
                                                    <span>Chupa chups tiramisu apple pie biscuit sweet roll bonbon macaroon.</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Multiple List Group ends -->
            </div>
        </section>
        <!-- Sortable lists section end -->

        <!-- Clone List Starts -->
        <section id="clone-lists">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Clone List</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Clone list items from another existing list.</p>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <h4 class="my-1">Badge Source 1</h4>
                                    <div id="badge-list-1" class="demo-inline-spacing">
                                        <div class="badge badge-pill badge-secondary draggable">Youtube</div>
                                        <div class="badge badge-pill badge-primary draggable">Facebook</div>
                                        <div class="badge badge-pill badge-success draggable">Google</div>
                                        <div class="badge badge-pill badge-danger draggable">Instagram</div>
                                        <div class="badge badge-pill badge-info draggable">Twitter</div>
                                        <div class="badge badge-pill badge-warning draggable">Discord</div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <h4 class="my-1">Badge Source 2</h4>
                                    <div id="badge-list-2" class="demo-inline-spacing">
                                        <div class="badge badge-pill badge-light-secondary draggable">Github</div>
                                        <div class="badge badge-pill badge-light-primary draggable">Gitlab</div>
                                        <div class="badge badge-pill badge-light-success draggable">Slack</div>
                                        <div class="badge badge-pill badge-light-danger draggable">Pintrest</div>
                                        <div class="badge badge-pill badge-light-info draggable">Tinder</div>
                                        <div class="badge badge-pill badge-light-warning draggable">Amazon</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Clone List Ends -->

        <!-- With Handle Starts -->
        <section id="dd-with-handle">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Drag And Drop With Handle</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">You have to customize drag handle yourself using class <code>.handle</code>.</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4 class="my-1">List One</h4>
                                    <ul class="list-group" id="handle-list-1">
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Cras justo odio</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Dapibus ac facilisis in</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Morbi leo risus</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Porta ac consectetur ac</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Vestibulum at eros</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <h4 class="my-1">List Two</h4>
                                    <ul class="list-group" id="handle-list-2">
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Cras justo odio</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Dapibus ac facilisis in</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Morbi leo risus</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Porta ac consectetur ac</li>
                                        <li class="list-group-item"><span class="handle mr-50">+</span>Vestibulum at eros</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- With Handle Ends -->

    </div>
</div>
@endsection

@push('css_vendor')
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/extensions/dragula.min.css">
@endpush

@push('css_page')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-drag-drop.css">
@endpush

@push('js_page')
    <script src="../../../app-assets/js/scripts/extensions/ext-component-drag-drop.js"></script>
@endpush

@push('js_vendor')
<script src="../../../app-assets/vendors/js/extensions/dragula.min.js"></script>
@endpush


