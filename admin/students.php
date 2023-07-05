<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">
    <div class="card shadow mb-1 ">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Students</h5>
        </div>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Student ID Number</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Events</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                            <td>@mdo</td><td class="">
                                <a class="btn btn-info btn-sm">View</a>
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