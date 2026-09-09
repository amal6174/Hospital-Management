<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Skydash Admin — Edit Term</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <style>
        .ck-editor__editable_inline { min-height: 200px; }
        .ck.ck-toolbar { flex-wrap: wrap !important; }
        .ck.ck-editor { max-width: 100%; }
    </style>
</head>
<body>
<div class="container-scroller">

    @include('adminPartial.navbar')

    <div class="container-fluid page-body-wrapper">

        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div><div class="tiles warning"></div>
                    <div class="tiles danger"></div><div class="tiles info"></div>
                    <div class="tiles dark"></div><div class="tiles default"></div>
                </div>
            </div>
        </div>

        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="chats-section" role="tabpanel">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                    </div>
                </div>
            </div>
        </div>

        @include('adminPartial.sidebar')

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Edit Term &amp; Condition</h4>
                                <p class="card-description">Update the selected term</p>

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <h6>Validation Errors:</h6>
                                        @foreach($errors->all() as $error)
                                            <p class="mb-0">{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <form class="forms-sample"
                                      action="{{ route('admin.terms.update', $term->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                               id="title"
                                               name="title"
                                               value="{{ old('title', $term->title) }}"
                                               class="form-control @error('title') is-invalid @enderror"
                                               placeholder="e.g. Acceptance of Terms">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description <span class="text-danger">*</span></label>
                                        <textarea id="editor"
                                                  name="description"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  placeholder="Enter term description">{{ old('description', $term->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="order">Display Order</label>
                                        <input type="number"
                                               id="order"
                                               name="order"
                                               value="{{ old('order', $term->order) }}"
                                               class="form-control @error('order') is-invalid @enderror"
                                               min="0"
                                               style="width:150px;"
                                               placeholder="0">
                                        <small class="form-text text-muted">Lower number = shown first on frontend.</small>
                                        @error('order')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="1"
                                                {{ old('status', $term->status) == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label">Active</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" value="0"
                                                {{ old('status', $term->status) == '0' ? 'checked' : '' }}>
                                            <label class="form-check-label">Inactive</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary mr-2">
                                        <i class="ti-save mr-1"></i> Update Term
                                    </button>
                                    <a href="{{ route('admin.terms.index') }}" class="btn btn-light">Cancel</a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('adminPartial.footer')
        </div>
        <!-- main-panel ends -->

    </div>
    <!-- page-body-wrapper ends -->
</div>

<script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#editor')).catch(error => console.error(error));
</script>
<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>
<script src="{{ asset('admin/js/settings.js') }}"></script>
<script src="{{ asset('admin/js/todolist.js') }}"></script>
<script src="{{ asset('admin/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
</body>
</html>
