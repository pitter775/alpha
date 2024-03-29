
@extends('layouts.app', [
    'elementActive' => 'blog'
])
@section('content')

<div class="content-wrapper" data-aos=fade-left data-aos-delay=50>
    <div class="content-body">
        <!-- Blog Edit -->
        <div class="blog-edit-wrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="avatar mr-75">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-9.jpg" width="38" height="38" alt="Avatar" />
                                </div>
                                <div class="media-body">
                                    <h6 class="mb-25">Chad Alexander</h6>
                                    <p class="card-text">May 24, 2020</p>
                                </div>
                            </div>
                            <!-- Form -->
                            <form action="javascript:;" class="mt-2">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-title">Title</label>
                                            <input type="text" id="blog-edit-title" class="form-control" value="The Best Features Coming to iOS and Web design" />
                                        </div>
                                    </div>
                                  
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-slug">Slug</label>
                                            <input type="text" id="blog-edit-slug" class="form-control" value="the-best-features-coming-to-ios-and-web-design" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group mb-2">
                                            <label for="blog-edit-status">Status</label>
                                            <select class="form-control" id="blog-edit-status">
                                                <option value="Published">Published</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Draft">Draft</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-2">
                                            <label>Content</label>
                                            <div id="blog-editor-wrapper">
                                                <div id="blog-editor-container">
                                                    <div class="editor">
                                                        <p>
                                                            Cupcake ipsum dolor sit. Amet dessert donut candy chocolate bar cotton dessert candy
                                                            chocolate. Candy muffin danish. Macaroon brownie jelly beans marzipan cheesecake oat cake.
                                                            Carrot cake macaroon chocolate cake. Jelly brownie jelly. Marzipan pie sweet roll.
                                                        </p>
                                                        <p><br /></p>
                                                        <p>
                                                            Liquorice dragée cake chupa chups pie cotton candy jujubes bear claw sesame snaps. Fruitcake
                                                            chupa chups chocolate bonbon lemon drops croissant caramels lemon drops. Candy jelly cake
                                                            marshmallow jelly beans dragée macaroon. Gummies sugar plum fruitcake. Candy canes candy
                                                            cupcake caramels cotton candy jujubes fruitcake.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="border rounded p-2">
                                            <h4 class="mb-1">Featured Image</h4>
                                            <div class="media flex-column flex-md-row">
                                                <img src="../../../app-assets/images/slider/03.jpg" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                                <div class="media-body">
                                                    <small class="text-muted">Required image resolution 800x400, image size 10mb.</small>
                                                    <p class="my-50">
                                                        <a href="javascript:void(0);" id="blog-image-text">C:\fakepath\banner.jpg</a>
                                                    </p>
                                                    <div class="d-inline-block">
                                                        <div class="form-group mb-0">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="blogCustomFile" accept="image/*" />
                                                                <label class="custom-file-label" for="blogCustomFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-50">
                                        <button type="submit" class="btn btn-primary mr-1">Save Changes</button>
                                        <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Blog Edit -->
    </div>
</div>
@endsection

@push('css_vendor')
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/select/select2.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/katex.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/editors/quill/quill.snow.css">
@endpush

@push('css_page')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/forms/form-quill-editor.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-blog.css">
@endpush

@push('js_page')
<script src="../../../app-assets/js/scripts/pages/page-blog-edit.js"></script>
@endpush

@push('js_vendor')
<script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<script src="../../../app-assets/vendors/js/editors/quill/katex.min.js"></script>
<script src="../../../app-assets/vendors/js/editors/quill/highlight.min.js"></script>
<script src="../../../app-assets/vendors/js/editors/quill/quill.min.js"></script>
@endpush


