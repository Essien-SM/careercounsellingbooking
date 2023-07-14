<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="modal fade" id="essien" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit User Account Details.</h5>
                <p>User ID : 3 (Auto Generated)</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add-new.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-gray-900">Email:</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Counsellor's Name" name="name" value="stephenymensah@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Name:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Email Address"
                        value="Stephen Essien Mensah" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Staff ID:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ID Number" name="staffid"
                        value="10829102">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Telephone:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telephone Number" name="tel"
                        value="0553053239">
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
<div class="modal fade" id="essien1" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">View Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-1">Name:</p>
                <p>Stephen Essien</p>
                <p class="mb-1">Email:</p>
                <p>stephenyessien@gmail.com</p>
                <p class="mb-1">Staff ID number:</p>
                <p>10829102</p>
                <p class="mb-1">Telephone:</p>
                <p>0553053239</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" name="addbtn">Add</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <button class="btn btn-primary" type="button">
            < Back </button>
                <h5 class="font-weight-bold mb-0 text-gray-800">Settings</h5>
                <p>Today's Date</p>
    </div>
    <div class="mb-3">
        <div class="mb-3">
            <div class="container">
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#essien" style="width: 100%; height: 8rem; ">
                    <div class="text-left" style="display:flex; gap:1rem">
                        <div style="background: gray; width:5rem; height: 70px;"></div>
                        <div>
                            <h3>Account Settings</h3>
                            <p>Edit your Account Details & Change Password</p>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        <div class="mb-3">
            <div class="">
                <div class="container">
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#essien1" style="width: 100%; height: 8rem">
                        <div class="text-left" style="display:flex; gap:1rem">
                            <div style="background: gray; width:5rem; height: 70px;"></div>
                            <div>
                                <h3>View Account Details</h3>
                                <p>View Personal information About Your Account</p>
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="">
            <div class="container">
                <button type="button" class="btn btn-outline-secondary" style="width: 100%; height: 8rem">
                    <div class="text-left" style="display:flex; gap:1rem">
                        <div style="background: gray; width:5rem; height: 70px;"></div>
                        <div>
                            <h3>Delete Account</h3>
                            <p>Will Permanently Remove your Account</p>
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
    <!-- <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Students</h5>
        </div>
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

    <div class="card shadow mb-1 ">

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
                    </tbody>
                </table>
            </div>
        </div> -->
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>