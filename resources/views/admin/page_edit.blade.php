<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Skydash Admin</title>
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
    <!-- partial:partials/_navbar.html -->

    @include('adminPartial.navbar')



    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
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
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
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
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->


      @include('adminPartial.sidebar')

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Page</h4>
                  <p class="card-description">Update page details</p>

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <h5>Validation Errors:</h5>
                      @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                      @endforeach
                    </div>
                  @endif

                  <form class="forms-sample"
                        action="{{ route('admin.page.update', $page_management->id) }}"
                        method="POST"
                        enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Page Information --}}
                    <div class="card mb-4">
                      <div class="card-header"><h4 class="card-title">Page Information</h4></div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Page Name</label>
                          <input type="text" name="page_name"
                                 value="{{ old('page_name', $page_management->page_name) }}"
                                 class="form-control @error('page_name') is-invalid @enderror"
                                 placeholder="Enter Page Name">
                          @error('page_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Section Name</label>
                          <input type="text" name="section_name"
                                 value="{{ old('section_name', $page_management->section_name) }}"
                                 class="form-control @error('section_name') is-invalid @enderror"
                                 placeholder="Enter Section Name">
                          @error('section_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>

                    {{-- Hero Section --}}
                    <div class="card mb-4">
                      <div class="card-header"><h4 class="card-title">Hero Section</h4></div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Hero Image</label>
                          @if($page_management->image_1)
                            <div class="mb-2"><img src="{{ asset('storage/' . $page_management->image_1) }}" width="150" height="100" style="object-fit:cover;"></div>
                          @endif
                          <input type="file" name="image_1" class="form-control @error('image_1') is-invalid @enderror">
                          @error('image_1')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Hero Small Title</label>
                          <input type="text" name="small_title_1"
                                 value="{{ old('small_title_1', $page_management->small_title_1) }}"
                                 class="form-control @error('small_title_1') is-invalid @enderror"
                                 placeholder="Enter Hero Small Title">
                          @error('small_title_1')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Hero Title</label>
                          <input type="text" name="title_1"
                                 value="{{ old('title_1', $page_management->title_1) }}"
                                 class="form-control @error('title_1') is-invalid @enderror"
                                 placeholder="Enter Hero Title">
                          @error('title_1')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>

                    {{-- Banner 1 --}}
                    <div class="card mb-4">
                      <div class="card-header"><h4 class="card-title">Banner 1</h4></div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Banner Image 1</label>
                          @if($page_management->image_2)
                            <div class="mb-2"><img src="{{ asset('storage/' . $page_management->image_2) }}" width="150" height="100" style="object-fit:cover;"></div>
                          @endif
                          <input type="file" name="image_2" class="form-control @error('image_2') is-invalid @enderror">
                          @error('image_2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Small Title 1</label>
                          <input type="text" name="small_title_2"
                                 value="{{ old('small_title_2', $page_management->small_title_2) }}"
                                 class="form-control @error('small_title_2') is-invalid @enderror"
                                 placeholder="Enter Banner Small Title">
                          @error('small_title_2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Title 1</label>
                          <input type="text" name="title_2"
                                 value="{{ old('title_2', $page_management->title_2) }}"
                                 class="form-control @error('title_2') is-invalid @enderror"
                                 placeholder="Enter Banner Title">
                          @error('title_2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>

                    {{-- Banner 2 --}}
                    <div class="card mb-4">
                      <div class="card-header"><h4 class="card-title">Banner 2</h4></div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Banner Image 2</label>
                          @if($page_management->image_3)
                            <div class="mb-2"><img src="{{ asset('storage/' . $page_management->image_3) }}" width="150" height="100" style="object-fit:cover;"></div>
                          @endif
                          <input type="file" name="image_3" class="form-control @error('image_3') is-invalid @enderror">
                          @error('image_3')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Small Title 2</label>
                          <input type="text" name="small_title_3"
                                 value="{{ old('small_title_3', $page_management->small_title_3) }}"
                                 class="form-control @error('small_title_3') is-invalid @enderror"
                                 placeholder="Enter Banner Small Title">
                          @error('small_title_3')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Title 2</label>
                          <input type="text" name="title_3"
                                 value="{{ old('title_3', $page_management->title_3) }}"
                                 class="form-control @error('title_3') is-invalid @enderror"
                                 placeholder="Enter Banner Title">
                          @error('title_3')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>

                    {{-- Banner 3 --}}
                    <div class="card mb-4">
                      <div class="card-header"><h4 class="card-title">Banner 3</h4></div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Banner Image 3</label>
                          @if($page_management->image_4)
                            <div class="mb-2"><img src="{{ asset('storage/' . $page_management->image_4) }}" width="150" height="100" style="object-fit:cover;"></div>
                          @endif
                          <input type="file" name="image_4" class="form-control @error('image_4') is-invalid @enderror">
                          @error('image_4')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Small Title 3</label>
                          <input type="text" name="small_title_4"
                                 value="{{ old('small_title_4', $page_management->small_title_4) }}"
                                 class="form-control @error('small_title_4') is-invalid @enderror"
                                 placeholder="Enter Banner Small Title">
                          @error('small_title_4')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Title 3</label>
                          <input type="text" name="title_4"
                                 value="{{ old('title_4', $page_management->title_4) }}"
                                 class="form-control @error('title_4') is-invalid @enderror"
                                 placeholder="Enter Banner Title">
                          @error('title_4')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>

                    {{-- Banner 4 --}}
                    <div class="card mb-4">
                      <div class="card-header"><h4 class="card-title">Banner 4</h4></div>
                      <div class="card-body">
                        <div class="form-group">
                          <label>Banner Image 4</label>
                          @if($page_management->image_5)
                            <div class="mb-2"><img src="{{ asset('storage/' . $page_management->image_5) }}" width="150" height="100" style="object-fit:cover;"></div>
                          @endif
                          <input type="file" name="image_5" class="form-control @error('image_5') is-invalid @enderror">
                          @error('image_5')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Small Title 4</label>
                          <input type="text" name="small_title_5"
                                 value="{{ old('small_title_5', $page_management->small_title_5) }}"
                                 class="form-control @error('small_title_5') is-invalid @enderror"
                                 placeholder="Enter Banner Small Title">
                          @error('small_title_5')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="form-group">
                          <label>Banner Title 4</label>
                          <input type="text" name="title_5"
                                 value="{{ old('title_5', $page_management->title_5) }}"
                                 class="form-control @error('title_5') is-invalid @enderror"
                                 placeholder="Enter Banner Title">
                          @error('title_5')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ url()->previous() }}" class="btn btn-light">Cancel</a>
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

  <!-- plugins:js -->
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
