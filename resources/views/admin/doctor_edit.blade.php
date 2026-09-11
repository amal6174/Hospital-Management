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
                  <h4 class="card-title">Edit Doctor</h4>
                  <p class="card-description">Update doctor details</p>

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <h5>Validation Errors:</h5>
                      @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                      @endforeach
                    </div>
                  @endif

                  <form class="forms-sample" action="{{ route('admin.doctor.update',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                      <label>Current Image</label><br>
                      @if($doctor->image)
                        <img src="{{ asset('storage/'.$doctor->image) }}" width="100" height="100" class="img-thumbnail mb-2" style="object-fit:cover;">
                      @else
                        <p class="text-danger">No Image</p>
                      @endif
                      <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div>
                        <input type="hidden" name="page" value="{{$page}}">
                    </div>

                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name"
                             value="{{ old('name', $doctor->name) }}"
                             class="form-control @error('name') is-invalid @enderror"
                             placeholder="Enter Doctor Name">
                      @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Gender</label><br>
                      <label class="mr-2">Male:
                        <input type="radio" name="gender" value="Male" {{ old('gender', $doctor->gender) == 'Male' ? 'checked' : '' }}>
                      </label>
                      <label class="mr-2">Female:
                        <input type="radio" name="gender" value="Female" {{ old('gender', $doctor->gender) == 'Female' ? 'checked' : '' }}>
                      </label>
                      <label>Other:
                        <input type="radio" name="gender" value="Other" {{ old('gender', $doctor->gender) == 'Other' ? 'checked' : '' }}>
                      </label>
                      @error('gender')
                        <div class="text-danger mt-1">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Specialization</label>
                      <select name="category_id" class="form-control">
                        <option value="">Select Specialization</option>
                        @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ old('category_id', $doctor->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->category_name }}
                          </option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Qualifications</label><br>
                      @foreach($qualifications as $qualification)
                        <input type="checkbox" name="qualification_name[]" value="{{ $qualification->id }}"
                          {{ in_array($qualification->id, old('qualification_name', $selectedQualifications)) ? 'checked' : '' }}>
                        <label class="form-check-label mr-3">{{ $qualification->qualification_name }}</label>
                      @endforeach
                    </div>

                    <div class="form-group">
                      <label for="experience">Experience</label>
                      <input type="text" id="experience" name="experience"
                             value="{{ old('experience', $doctor->experience) }}"
                             class="form-control @error('experience') is-invalid @enderror"
                             placeholder="Enter Experience">
                      @error('experience')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" id="email" name="email"
                             value="{{ old('email', $doctor->email) }}"
                             class="form-control @error('email') is-invalid @enderror"
                             placeholder="Enter Doctor Email">
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" name="phone"
                             value="{{ old('phone', $doctor->phone) }}"
                             class="form-control @error('phone') is-invalid @enderror"
                             placeholder="Enter Doctor Phone">
                      @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="designation">Designation</label>
                      <input type="text" id="designation" name="designation"
                             value="{{ old('designation', $doctor->designation) }}"
                             class="form-control @error('designation') is-invalid @enderror"
                             placeholder="Enter Designation">
                      @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" id="address" name="address"
                             value="{{ old('address', $doctor->address) }}"
                             class="form-control @error('address') is-invalid @enderror"
                             placeholder="Enter Doctor Address">
                      @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Status</label>
                      <div class="form-check">
                        <input type="radio" name="status" value="1" {{ $doctor->status == 1 ? 'checked' : '' }}>
                        <label class="form-check-label">Active</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" name="status" value="0" {{ $doctor->status == 0 ? 'checked' : '' }}>
                        <label class="form-check-label">Inactive</label>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('admin.doctor.index') }}?page={{ $page}}" class="btn btn-light">Cancel</a>
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

