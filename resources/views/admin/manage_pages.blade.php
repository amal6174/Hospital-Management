<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="vendors/feather/feather.css"> -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}">
    <!--
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"> -->
    <link rel="stylesheet" href="{{ 'admin/vendors/ti-icons/css/themify-icons.css' }}">

    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">



    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->




    <!-- inject:css -->

    <!-- <link rel="stylesheet" href="css/vertical-layout-light/style.css"> -->
    <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}">

    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    {{--
    <!-- {{ asset('admin/css/admin.css') }} --> --}}

    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />


    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const statusSelects = document.querySelectorAll('.status-select');

            statusSelects.forEach(function(select) {

                select.addEventListener('change', async function() {

                    const appointmentId = this.dataset.id;
                    const status = this.value;


                    const previousStatus = this.dataset.previousStatus;

                    try {

                        const csrfToken =
                            document.querySelector(
                                'meta[name="csrf-token"]'
                            ).getAttribute('content');


                        const response = await fetch(
                            `/admin/admin-appointment-status/${appointmentId}`, {
                                method: 'PUT',

                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },

                                body: JSON.stringify({
                                    status: status
                                })
                            }
                        );


                        const data = await response.json();


                        if (!response.ok) {

                            throw new Error(
                                data.message ||
                                'Something went wrong'
                            );

                        }


                        if (data.success) {

                            console.log(data.message);



                            const updatedByCell = document.querySelector(
                                `.status-updated-by[data-id="${appointmentId}"]`);

                            if (updatedByCell) {

                                updatedByCell.textContent = data.status_updated_by ||
                                    'Not Updated';

                            }



                            const updatedAtCell =
                                document.querySelector(
                                    `.status-updated-at[data-id="${appointmentId}"]`
                                );

                            if (updatedAtCell) {

                                updatedAtCell.textContent =
                                    data.status_updated_at ||
                                    'Not Updated';

                            }



                            this.dataset.previousStatus =
                                data.status;


                            console.log('Status:', data.status);

                            console.log(
                                'Updated By:',
                                data.status_updated_by
                            );

                            console.log(
                                'Updated At:',
                                data.status_updated_at
                            );

                        }

                    } catch (error) {

                        console.error(error);

                        alert(error.message);


                        if (previousStatus) {
                            this.value = previousStatus;
                        }

                    }

                });



                select.dataset.previousStatus = select.value;

            });

        });
    </script>



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
                                            {{-- <input class="checkbox" type="checkbox" checked> --}}
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


            {{-- <div class="col-lg-12 grid-margin stretch-card"> --}}
                <div class="main-panel">

                    <div class="content-wrapper">

                        <div class="row">

                            <div class="col-lg-12 grid-margin stretch-card">


                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Page Module</h4>
                                        <p class="card-description">
                                            Add class <code>.table-bordered</code>
                                        </p>


                                        {{-- <form action="#" method="GET">
                                            <div class="input-group input-group-sm" style="width:260px;">
                                                <input type="text" class="form-control" placeholder="Search..."
                                                    class="form-control">

                                                <button class="btn btn-primary" type="submit">
                                                    <i class="search">Search</i>
                                                </button>
                                            </div>
                                        </form> --}}
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">

                                        {{-- <a href="{{ route('admin.doctor.create.page') }}"
                                            class="btn btn-success btn-sm">
                                            <i class="ti-plus"></i> Add
                                        </a> --}}

                                    </div>
                                    <div class="table-responsive">

                                         <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>#</th>
                <th>Page Name</th>
                <th>Section</th>

                <th>Hero Image</th>
                <th>Hero Small Title</th>
                <th>Hero Title</th>

                <th>Banner Image 1</th>
                <th>Banner Image 2</th>
                <th>Banner Image 3</th>
                <th>Banner Image 4</th>

                <th>Banner Small Title 1</th>
                <th>Banner Small Title 2</th>
                <th>Banner Small Title 3</th>

                <th>Banner Title 1</th>
                <th>Banner Title 2</th>
                <th>Banner Title 3</th>

                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($pages as $page)

                <tr>

                    {{-- ID / Serial Number --}}
                    <td>
                        {{ $loop->iteration }}
                    </td>


                    {{-- Page Name --}}
                    <td>
                        {{ $page->page_name }}
                    </td>


                    {{-- Section Name --}}
                    <td>
                        {{ $page->section_name }}
                    </td>


                    {{-- Hero Image --}}
                    <td>
                        @if ($page->image_1)

                            <img src="{{ asset('storage/' . $page->image_1) }}"
                                 width="80"
                                 height="60"
                                 style="object-fit: cover;">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif
                    </td>


                    {{-- Hero Small Title --}}
                    <td>
                        {{ $page->small_title_1 ?? 'N/A' }}
                    </td>


                    {{-- Hero Title --}}
                    <td>
                        {{ $page->title_1 ?? 'N/A' }}
                    </td>


                    {{-- Banner Image 1 --}}
                    <td>
                        @if ($page->image_2)

                            <img src="{{ asset('storage/' . $page->image_2) }}"
                                 width="80"
                                 height="60"
                                 style="object-fit: cover;">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif
                    </td>


                    {{-- Banner Image 2 --}}
                    <td>
                        @if ($page->image_3)

                            <img src="{{ asset('storage/' . $page->image_3) }}"
                                 width="80"
                                 height="60"
                                 style="object-fit: cover;">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif
                    </td>


                    {{-- Banner Image 3 --}}
                    <td>
                        @if ($page->image_4)

                            <img src="{{ asset('storage/' . $page->image_4) }}"
                                 width="80"
                                 height="60"
                                 style="object-fit: cover;">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif
                    </td>





                     <td>
                        @if ($page->image_4)

                            <img src="{{ asset('storage/' . $page->image_5) }}"
                                 width="80"
                                 height="60"
                                 style="object-fit: cover;">

                        @else

                            <span class="text-muted">No Image</span>

                        @endif
                    </td>



                    {{-- Banner Small Title 1 --}}
                    <td>
                        {{ $page->small_title_2 ?? 'N/A' }}
                    </td>


                    {{-- Banner Small Title 2 --}}
                    <td>
                        {{ $page->small_title_3 ?? 'N/A' }}
                    </td>


                    {{-- Banner Small Title 3 --}}
                    <td>
                        {{ $page->small_title_4 ?? 'N/A' }}
                    </td>


                    {{-- Banner Title 1 --}}
                    <td>
                        {{ $page->title_2 ?? 'N/A' }}
                    </td>


                    {{-- Banner Title 2 --}}
                    <td>
                        {{ $page->title_3 ?? 'N/A' }}
                    </td>


                    {{-- Banner Title 3 --}}
                    <td>
                        {{ $page->title_4 ?? 'N/A' }}
                    </td>


                    {{-- Action --}}
                    <td>

                        <a href="{{ route('admin.page.edit',$page->id) }}"
                           class="btn btn-sm btn-info">
                            Edit
                        </a>


                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>
                                        <div class="mt-3">
                                            {{-- {{ $doctors->links() }}
                                        </div> --}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('adminPartial.footer')


                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <!-- <script src="vendors/js/vendor.bundle.base.js"></script> -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- <script src="/admin/vendors/chart.js/Chart.min.js"></script>
  <script src="/admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script> -->


    <script src="{{ asset('admin/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/js/dataTables.select.min.js') }}"></script>






    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <!-- <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script> -->
    <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <script src="{{ asset('admin/js/settings.js') }}"></script>
    <script src="{{ asset('admin/js/todolist.js') }}"></script>




    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script> -->
    <script src="{{ asset('admin/js/dashboard.js') }}"></script>
    <script src="{{ asset('admin/js/Chart.roundedBarCharts.js') }}"></script>
    {{-- <script src="{{ asset('admin/js/category.js') }}"></script> --}}
    <script src="{{ asset('js/ category.js') }}"></script>
    <!--
  <script src="/admin/js/dashboard.js"></script>
<script src="/admin/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
</body>

</html>
