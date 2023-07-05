<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">
    <!-- Sidebar Toggle (Topbar) -->

    <div class="d-sm-flex align-items-center justify-content-between mb-3 gap-4">
        <div class="" style="display:flex; flex-direction:row; margin:auto;">
            <input class="form-control" type="text" aria-label="default input example" style="width: 20rem; margin-right:0.4rem">
            <button type="button" class="btn btn-primary">
                Search
            </button>
        </div>
        <div>
            <p class="text-center">Today's Date</p>
        </div>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Status</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                2</div>
                            <div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">Advisors</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                3</div>
                            <div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">Students</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                1</div>
                            <div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">New Booking</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                3</div>
                            <div class="h5 text-xs font-weight-bold text-gray-900 text-uppercase mb-1">Today Session</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-6">
                            <h2 class="text-gray-900">Upcoming Appointments until Next Monday</h2>
                            <p>Here's Quick access to Upcoming Appointments until 7 days
                                More details available in @Appointment section.</p>
                            <div class="card border-left-primary shadow" style="width: 28rem; max-height: 300px; overflow-y: auto;">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                            <div class="d-grid gap-2" style="width: 28rem;">
                                <button class="btn btn-primary btn-block" type="button">Button</button>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                            <h2 class="text-gray-900">Upcoming Sessions until Next Monday</h2>
                            <p>Here's Quick access to Upcoming Sessions that Scheduled until 7 days
                                Add,Remove and Many features available in @Schedule section.</p>
                            <div class="card" style="width: 28rem;">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-block" type="button">Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->



        <!-- Content Row -->
        <div class="container mt-5">
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <h4 class="text-primary font-weight-bold">Upcoming Appointments until Next Monday</h4>
                    <p>Here's Quick access to Upcoming Appointments until 7 days
                        More details available in @Appointment section.</p>

                    <!-- Project Card Example -->
                    <div class="card shadow mb-1 ">
                        <div class="card-body" style="height: 250px;">
                            <div class="table-responsive-sm" style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr class="border-bottom border-primary">
                                            <th scope="col">Appointment Number</th>
                                            <th scope="col">Students Name</th>
                                            <th scope="col">Counsellor</th>
                                            <th scope="col">Session</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block" type="button">Show all Appointments</button>
                    </div>


                    <!-- Color System -->


                </div>
                <div class="col-lg-6 mb-4">
                    <h4 class="text-primary font-weight-bold">Upcoming Sessions until Next Wednesday</h4>
                    <p>Here's Quick access to Upcoming Sessions that Scheduled until 7 days
                        Add,Remove and Many features available in @Schedule section.</p>

                    <!-- Project Card Example -->
                    <div class="card shadow mb-1">
                        <div class="card-body" style="height: 250px;">
                            <div class="table-responsive-sm" style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr class="border-bottom border-primary">
                                            <th scope="col">Session Title</th>
                                            <th scope="col">Counsellor</th>
                                            <th scope="col">Scheduled Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block" type="button">Show all Sessions</button>
                    </div>

                    <!-- Color System -->


                </div>


            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    <!-- Begin Page Content -->

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>