<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Skydash Admin — Terms &amp; Conditions</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
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

                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div>
                                        <h4 class="card-title mb-1">Terms &amp; Conditions</h4>
                                        <p class="card-description mb-0">Manage all terms and conditions shown on the frontend</p>
                                    </div>
                                    <a href="{{ route('admin.terms.create') }}" class="btn btn-primary btn-sm">
                                        <i class="ti-plus mr-1"></i> Add New Term
                                    </a>
                                </div>

                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                    </div>
                                @endif

                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width:5%">#</th>
                                                <th style="width:5%">Order</th>
                                                <th style="width:25%">Title</th>
                                                <th style="width:45%">Description</th>
                                                <th style="width:10%">Status</th>
                                                <th style="width:10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($terms as $term)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $term->order }}</td>
                                                    <td>{{ $term->title }}</td>
                                                    <td>
                                                        <span title="{{ strip_tags($term->description) }}">
                                                            {{ Str::limit(strip_tags($term->description), 100) }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($term->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.terms.edit', $term->id) }}"
                                                           class="btn btn-sm btn-primary mb-1">
                                                            <i class="ti-pencil"></i> Edit
                                                        </a>
                                                        <form action="{{ route('admin.terms.destroy', $term->id) }}"
                                                              method="POST"
                                                              style="display:inline-block;"
                                                              onsubmit="return confirm('Delete this term?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger mb-1">
                                                                <i class="ti-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted py-4">
                                                        No terms found. <a href="{{ route('admin.terms.create') }}">Add the first one</a>.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

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
<script src="{{ asset('admin/js/off-canvas.js') }}"></script>
<script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('admin/js/template.js') }}"></script>
<script src="{{ asset('admin/js/settings.js') }}"></script>
<script src="{{ asset('admin/js/todolist.js') }}"></script>
<script src="{{ asset('admin/js/dashboard.js') }}"></script>
<script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
</body>
</html>
