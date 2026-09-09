<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Skydash Admin — General Settings</title>
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    <style>
        .settings-table th { background-color: #f4f4f4; font-weight: 600; }
        .settings-table td { vertical-align: middle; }
        .preview-img { width: 70px; height: 55px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd; }
        .field-name-label { font-weight: 500; text-transform: capitalize; }
    </style>
</head>

<body>
<div class="container-scroller">

    @include('adminPartial.navbar')

    <div class="container-fluid page-body-wrapper">

        {{-- Theme Settings Panel --}}
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>

        {{-- Right Sidebar --}}
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab"
                        aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab"
                        aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
                    aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info"><p>Thomas Douglas</p><p>Available</p></div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info"><p>Catherine</p><p>Away</p></div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                    </ul>
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

                                <h4 class="card-title">General Settings</h4>
                                <p class="card-description">Manage general site settings</p>

                                {{-- Success / Error alerts --}}
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form class="forms-sample"
                                      action="{{ route('general_setting_update') }}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover settings-table">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">#</th>
                                                    <th style="width:25%">Field Name</th>
                                                    <th style="width:40%">Value</th>
                                                    <th style="width:15%">Current</th>
                                                    <th style="width:15%">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($general_response as $key => $response)
                                                    <tr>
                                                        {{-- Hidden id --}}
                                                        <input type="hidden"
                                                               name="settings[{{ $key }}][id]"
                                                               value="{{ $response->id }}">

                                                        {{-- # --}}
                                                        <td>{{ $loop->iteration }}</td>

                                                        {{-- Field Name --}}
                                                        <td>
                                                            <span class="field-name-label">
                                                                {{ formatLabel($response->field_name) }}
                                                            </span>
                                                            <br>
                                                            <small class="text-muted">{{ $response->field_name }}</small>
                                                        </td>

                                                        {{-- Value input --}}
                                                        <td>
                                                            @if($response->type === 'file')
                                                                <input type="file"
                                                                       name="settings[{{ $key }}][value]"
                                                                       class="form-control-file">
                                                            @elseif($response->type === 'textarea')
                                                                <textarea name="settings[{{ $key }}][value]"
                                                                          class="form-control"
                                                                          rows="2">{{ $response->value }}</textarea>
                                                            @else
                                                                <input type="{{ $response->type }}"
                                                                       name="settings[{{ $key }}][value]"
                                                                       value="{{ $response->value }}"
                                                                       class="form-control"
                                                                       placeholder="Enter {{ formatLabel($response->field_name) }}">
                                                            @endif
                                                        </td>

                                                        {{-- Current value preview --}}
                                                        <td class="text-center">
                                                            @if($response->type === 'file' && $response->value)
                                                                <img src="{{ asset('storage/' . $response->value) }}"
                                                                     alt="{{ $response->field_name }}"
                                                                     class="preview-img">
                                                            @elseif($response->value)
                                                                <small class="text-muted" style="word-break:break-all;">
                                                                    {{ Str::limit($response->value, 30) }}
                                                                </small>
                                                            @else
                                                                <span class="text-muted">—</span>
                                                            @endif
                                                        </td>

                                                        {{-- Status --}}
                                                        <td>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input"
                                                                       type="radio"
                                                                       name="settings[{{ $key }}][status]"
                                                                       value="1"
                                                                       {{ $response->status == 1 ? 'checked' : '' }}>
                                                                <label class="form-check-label">
                                                                    <span class="badge badge-success">Active</span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input"
                                                                       type="radio"
                                                                       name="settings[{{ $key }}][status]"
                                                                       value="0"
                                                                       {{ $response->status == 0 ? 'checked' : '' }}>
                                                                <label class="form-check-label">
                                                                    <span class="badge badge-danger">Inactive</span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted py-4">
                                                            No settings found. Please seed the general_settings table.
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr class="my-4">
                                    <button type="submit" class="btn btn-primary mr-2">
                                        <i class="ti-save mr-1"></i> Update Settings
                                    </button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-light">Cancel</a>

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
<!-- container-scroller -->

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
