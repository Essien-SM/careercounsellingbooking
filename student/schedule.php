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
                        <label for="exampleInputEmail1" class="text-gray-900">Session Title:</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Counsellor's Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Select Counnsellor:</label>
                        <select class="form-control">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Number of Student/Appointment Numbers:</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Email Address" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Session Date:</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" placeholder="ID Number" name="staffid">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Schedule Time:</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" placeholder="Telephone Number" name="tel">
                    </div>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset</button>
                <button type="button" class="btn btn-primary" name="addbtn">Place this Session</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <button class="btn btn-primary" type="button">
            < Back </button>
                <h5 class="font-weight-bold mb-0 text-gray-800">My Sessions</h5>
                <p>Today's Date</p>
    </div>
    <div class="card mb-2">        
        <div class="card-body">
        <h5 class="card-title mb-4" style="font-weight:700">Career Session</h5>
                <p class="card-text" style="font-weight:600">Stephen Essien</p>
                <p class="card-text">2023-09-23</p>
                <p class="card-text" >Starts: <span style="font-weight:600">@18:00</span> (24h)</p>
                <button type="button" class="btn btn-primary btn-lg btn-block">Book Now</button>
                
            </div>
        </div>
    </div>
    


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>





































