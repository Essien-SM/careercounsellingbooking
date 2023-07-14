<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
include('../connection.php')
?>



<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Counsellor Details</h1>

    </div>
    <div class="d-flex justify-content-center">

        <div class="card" style="width: 40rem;">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>


</div>




<?php
include('includes/scripts.php');
include('includes/footer.php');
?>