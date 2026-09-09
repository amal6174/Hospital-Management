<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
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
                                    <button type="submit" class="add btn btn-primary todo-list-add-btn"
                                        id="add-task">Add</button>
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
                            <small
                                class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See
                                All</small>
                        </div>
                        <ul class="chat-list">
                            <li class="list active">
                                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Thomas Douglas</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">19 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span
                                        class="offline"></span></div>
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
                                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Daniel Russell</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">14 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span
                                        class="offline"></span></div>
                                <div class="info">
                                    <p>James Richardson</p>
                                    <p>Away</p>
                                </div>
                                <small class="text-muted my-auto">2 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span
                                        class="online"></span></div>
                                <div class="info">
                                    <p>Madeline Kennedy</p>
                                    <p>Available</p>
                                </div>
                                <small class="text-muted my-auto">5 min</small>
                            </li>
                            <li class="list">
                                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span
                                        class="online"></span></div>
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
                                    <h4 class="card-title">Doctor Form Elements</h4>
                                    <p class="card-description">Basic form elements</p>

                                    @if ($errors->any())

                                        <div class="alert alert-danger">

                                            <h5>Validation Errors:</h5>

                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach

                                        </div>

                                    @endif
                                    <form class="forms-sample" action="{{ route('admin.doctor.insert') }}"
                                        method="POST" enctype="multipart/form-data">


                                        @csrf

                                        <div class="form-group">
                                            <label for="exampleInputImage">Image <span style="color: red;">*</span></label>
                                            <input type="file" id="exampleInputImage" name="image"
                                                value="{{ old('image') }}"
                                                class="form-control @error('image') is-invalid @enderror"
                                                placeholder="upload image">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>






                                        <div class="form-group">
                                            <label for="exampleInputName1">Name<span style="color: red;">*</span></label>
                                            <input type="text" id="name" name="name"
                                                value="{{ old('name') }}"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter Doctor Name">

                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>







                                        <div class="form-group">
                                            <label for="exampleInputName1">Slug</label>
                                            <input type="text" id="slug" name="slug"
                                                value="{{ old('slug') }}"
                                                class="form-control"
                                                >

                                        </div>






                                        <div class="form-group">
                                            <label for="exampleInputName1">Gender<span style="color: red;">*</span></label><br>
                                            <label>Male:</label>
                                            <input type="radio" id="exampleInputName1" name="gender"
                                                value="Male">

                                            <label>Female:</label>
                                            <input type="radio" id="exampleInputName1" name="gender"
                                                value="Female">
                                            <label>Other:</label>
                                            <input type="radio" id="exampleInputName1" name="gender"
                                                value="Other">

                                            @error('gender')
                                                <div class="text-danger mt-1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>








                                        <div class="form-group">
                                            <label for="exampleInputName1">Specialization</label>

                                            <select name="category_id" class="form-control">

                                                <option value="">Select Specialization</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name }}</option>
                                                    {{-- <option value="" class="form-control">B</option> --}}
                                                @endforeach

                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputName1">Qualificat</label><br>
                                            @foreach ($qualifications as $qualification)
                                                <label class="form-label"></label>
                                                <input type="checkbox" name="qualification_name[]"
                                                    value="{{ $qualification->id }}">
                                                <label class="form-check-label"
                                                    for="qualification_{{ $qualification->id }}">
                                                    {{ $qualification->qualification_name }}
                                                </label>
                                            @endforeach
                                            {{-- <label>MD </label>
                       <input type="checkbox" name="qualification[]" value=""> --}}


                                        </div>










                                        {{--
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text"  id="exampleInputName1"
                             name="category_name"
                                       value="{{ old('category_name') }}"
                        class="form-control @error('category_name') is-invalid @enderror"
                        placeholder="Enter Category Name">
                        @error('category_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div> --}}





                                        <div class="form-group">
                                            <label for="exampleInputName1">Experience</label>
                                            <input type="text" id="exampleInputName1" name="experience"
                                                value=""
                                                class="form-control @error('experience') is-invalid @enderror"
                                                placeholder="Enter experience">
                                            @error('experience')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>






                                        <div class="form-group">
                                            <label for="exampleInputName1">Email<span style="color: red;">*</span></label>
                                            <input type="text" id="exampleInputName1" name="email"
                                                value=""
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Enter Doctor Name">

                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputName1">Phone<span style="color: red;">*</span></label>
                                            <input type="text" id="exampleInputName1" name="phone"
                                                value=""
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Enter Doctor Phone">
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                            {{-- @error('category_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputName1">Designation</label>
                                            <input type="text" id="exampleInputName1" name="designation"
                                                value=""
                                                class="form-control @error('designation') is-invalid @enderror"
                                                placeholder="Enter Doctor Phone">
                                            @error('category_name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputName1">Addres</label>
                                            <input type="text" id="exampleInputName1" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                placeholder="Enter Doctor address">
                                            @error('address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        {{--
                    <div class="form-group">
                      <label for="exampleInputName1">Image</label>
                      <input type="file"  id="exampleInputName1"
                             name="image"

                             class="form-control @error('image') is-invalid @enderror"
                        >
                        @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                    </div> --}}


                                        {{--
                    <div class="form-group">
                      <label for="exampleInputName1">status</label>
                      <label>Status</label><br>
                      <label>Active</label>
                      <input type="radio"  id="exampleInputName1"
                             name="status"
                             value="1">
                      <label>Inactive</label>
                      <input type="radio"
                             name="status"
                             value="0">

                    </div> --}}











                                        <div class="form-group">
                                            <label for="exampleTextarea1">Textarea</label>
                                            <textarea name="description" class="form-control" id="exampleTextarea1" rows="4">{{ old('description') }}</textarea>
                                        </div>

                                        <div class="form-group">

                                            <label>Status</label>

                                            <div class="form-check">

                                                <input type="radio" name="status" value="1" checked>

                                                <label>Active</label>

                                            </div>

                                            <div class="form-check">

                                                <input type="radio" name="status" value="0">

                                                <label>Inactive</label>

                                            </div>

                                        </div>






                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        <a href="{{ route('admin.doctor.index') }}" class="btn btn-light">Cancel</a>
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


    <script>

        const name = document.getElementById('name');
        const slug  = document.getElementById('slug');

        name.addEventListener('input', function () {
            slug.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });


    </script>
</body>

</html>
