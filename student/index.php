<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Home</h1>
        <p class="text-center">Today's Date</p>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="card text-gray-900" style="width: 100vw; background-color: #e6edfc;">
            <div class="card-body">
                <h5 class="card-title mb-4" style="font-weight:700">Welcome!</h5>
                <h3 class="card-subtitle mb-4" style="font-weight:800">Stephen Essien Mensah.</h3>
                <p class="h6 card-text mb-5" style="font-weight:600">Thanks for joining us. We always trying to get you a complete service. <br>
                    You can view your daily schedule, reach student Appointments at Home</p>
                <div class="mb-4">
                    <h5 class="font-weight-bold">Channel a Counsellor Here</h5>
                    <div class="" style="display:flex; flex-direction:row; margin:auto;">
                        <input class="form-control" type="date" aria-label="default input example" style="width: 30rem; margin-right:0.4rem">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#essien">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="container mt-5">
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 text-gray-900 font-weight-bolder">Dashboard</h4>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                    <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                2</div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">All <br> Counsellor</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                2</div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">All <br> student</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                2</div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">New <br> Booking</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                2</div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">Today <br> Session</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 text-gray-900 font-weight-bolder">Your Up Coming Booking</h4>
                    </div>
                    <div class="card mb-1 ">
                        <div class="card-body" style="height: 250px;">
                            <div style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr>
                                            <th scope="col">Appoint. Number</th>
                                            <th scope="col">Session Title</th>
                                            <th scope="col">Counsellor</th>
                                            <th scope="col">Scheduled Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                        </tr>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>EMenS</td>
                                        </tr>
                                        <tr>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>EMenS</td>
                                        </tr>
                                        <tr>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>EMenS</td>
                                        </tr>
                                        <tr>
                                            <td>Larry the Bird</td>
                                            <td>@twitter</td>
                                            <td>EMenS</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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