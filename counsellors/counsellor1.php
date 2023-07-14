<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>


<!-- Modal -->
<div class="modal fade" id="essien" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Add Counsellor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add-new.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-gray-900">Name:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Counsellor's Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Email:</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email Address" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Staff ID:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ID Number" name="staffid">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Telephone:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telephone Number" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Choose Specialties:</label>
                        <select class="form-control">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Password:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Define a Password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Conform Password:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Conform Password" name="cpassword">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" name="addbtn">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <p>Essien</p>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
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



    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="font-weight-bold mb-0 text-gray-800">Add Counsellor</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#essien">
            + Add New
        </button>
    </div>

    <div class="card shadow mb-1 ">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Counsellors</h5>
        </div>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless table-striped text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Counsellor's Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Specialties</th>
                            <th scope="col">Events</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td class="">
                                <a class="btn btn-info btn-sm">View</a>
                                <a class="btn btn-success btn-sm">Edit</a>
                                <form action="code.php" method="POST" class="d-inline">
                                    <button type="submit" name="delete_student" value="" class="btn btn-danger btn-sm">Delete</button>
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