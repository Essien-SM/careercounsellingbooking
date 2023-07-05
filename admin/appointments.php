<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <h5 class="font-weight-bold mb-0 text-gray-800">Appointment Manager</h5>
    </div>
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Appointments</h5>
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
    </div>
    <div class="card shadow mb-1 ">

        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">Appointment Number</th>
                            <th scope="col">Counsellor</th>
                            <th scope="col">Session Title</th>
                            <th scope="col">Session Date & Time</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Events</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td class="">
                                <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_student" value="<?= $student['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>