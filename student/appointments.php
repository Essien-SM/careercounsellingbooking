<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3 gap-4">
        <button class="h3 mb-2 btn btn-primary" type="button">
            < Back </button>
                <div class="" style="display:flex; flex-direction:row; margin:auto;">
                    <input class="form-control" type="text" aria-label="default input example" style="width: 20rem; margin-right:0.4rem">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#essien">
                        Search
                    </button>
                </div>
                <p class="text-center">Today's Date</p>
    </div>
    <!-- <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Counsellors(0)</h5>
        </div>
        <div class="card-body container">
            <div class="row gap-4">
                <div class="col-md-5 themed-grid-col p-2">
                    <input class="form-control" type="date" placeholder="Default input" aria-label="default input example">
                </div>
                <div class="col-md-5 themed-grid-col p-2">
                    <select class="form-control form-select" aria-label="Default select example">
                        <option selected>Choose Counsellor name from the list</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-md-2 themed-grid-col p-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#essien">
                        Filter
                    </button>
                </div>
            </div>
        </div>
    </div> -->
    <div class="card shadow mb-2">

        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Counsellors(0)</h5>
        </div>

        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Counsellor's Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Specialties</th>
                            <th scope="col">Events</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>