<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
include('../connection.php')
?>



<!-- Modal -->
<div class="modal fade" id="viewcoun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="removecoun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<div class="modal fade" id="editcoun" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="edit-coun.php" method="POST">
            <?php

            $query = "select * from counsellor";
            $query_run = mysqli_query($database, $query);                           

            ?>

                <div class="modal-header">
                    <?php

                    if(mysqli_num_rows($query_run)){
                        while($row=mysqli_fetch_assoc($query_run)){
                            echo $row['counid'];
                            echo $row['counname'];
                        }                        
                    }                    
                    
                    ?>
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Counsellor Details</h5>
                    <br>
                    <p>Counsellor ID: <?php echo $row['counid']; ?> (Auto Generated)</p>
                    <br><br>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-gray-900">Name:</label>
                        
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Counsellor's Name" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Email:</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email Address" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Counsellor's ID:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ID Number" name="counidnum">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Telephone:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telephone Number" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Choose Specialties:</label>
                        <select class="form-control" name="spec" id="">
                            <?php
                            $list11 = $database->query("select  * from  specialties order by sname asc;");

                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $sn = $row00["sname"];
                                $id00 = $row00["id"];
                                echo "<option value=" . $id00 . ">$sn</option><br/>";
                            };

                            ?>
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addcoun">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addcoun" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                        <label for="exampleInputPassword1" class="text-gray-900">Counsellor's ID:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="ID Number" name="counidnum">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Telephone:</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Telephone Number" name="tel">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-gray-900">Choose Specialties:</label>
                        <select class="form-control" name="spec" id="">
                            <?php
                            $list11 = $database->query("select  * from  specialties order by sname asc;");

                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $sn = $row00["sname"];
                                $id00 = $row00["id"];
                                echo "<option value=" . $id00 . ">$sn</option><br/>";
                            };

                            ?>
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addcoun">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php"><button class="h3 mb-2 btn btn-primary" type="button">
                < Back </button></a>
        <form action="" method="post">
            <div class="" style="display:flex; flex-direction:row; margin:auto;">
                <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 20rem; margin-right:0.4rem" placeholder="Search Counsellor name or Email" list="doctors">&nbsp;&nbsp;

                <?php
                echo '<datalist id="counsellors">';
                $list11 = $database->query("select  counname,counemail from  counsellor;");

                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $d = $row00["counname"];
                    $c = $row00["counemail"];
                    echo "<option value='$d'><br/>";
                    echo "<option value='$c'><br/>";
                };

                echo ' </datalist>';
                ?>
                <button type="Submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
        <p class="text-center">
            <?php
            date_default_timezone_set('Asia/Kolkata');

            $date = date('Y-m-d');
            echo $date;

            ?>
        </p>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="font-weight-bold mb-0 text-gray-800">Add New Counsellor</h4>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcoun">
            + Add New
        </button>
    </div>

    <div class="card shadow mb-1 ">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Counsellors(<?php echo $list11->num_rows; ?>)</h5>
        </div>
        <?php
        if ($_POST) {
            $keyword = $_POST["search"];

            $sqlmain = "select * from counsellor where counemail='$keyword' or counname='$keyword' or counname like '$keyword%' or counname like '%$keyword' or counname like '%$keyword%'";
        } else {
            $sqlmain = "select * from counsellor order by counid asc";
        }



        ?>
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
                        <?php


                        $result = $database->query($sqlmain);

                        if ($result->num_rows == 0) {
                            echo '
                            <tr>
                                <td colspan="4">
                                <br><br><br><br>
                                <center>
                                    <img src="../img/notfound.svg" width="5%">

                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldn\'t find anything related to your keywords !</p>
                                    <a class="non-style-link" href="counsellor.php">
                                        <button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Counsellors &nbsp;</font></button>
                                    </a>
                                </center>
                                <br><br><br><br>
                                </td>
                            </tr>';
                        } else {
                            for ($x = 0; $x < $result->num_rows; $x++) {
                                $row = $result->fetch_assoc();
                                $counid = $row["counid"];
                                $name = $row["counname"];
                                $email = $row["counemail"];
                                $spe = $row["specialties"];
                                $spcil_res = $database->query("select sname from specialties where id='$spe'");
                                $spcil_array = $spcil_res->fetch_assoc();
                                $spcil_name = $spcil_array["sname"];
                                echo '
                                <tr>
                                    <td> &nbsp;' .
                                    substr($name, 0, 30)
                                    . '</td>
                                    <td>
                                    ' . substr($email, 0, 20) . '
                                    </td>
                                    <td>
                                    ' . substr($spcil_name, 0, 20) . '
                                    </td>
                                    <td>
                                        <div style="display:flex;justify-content: center;">
                                        <a href="?id=' . $counid . '" data-toggle="modal" data-target="#editcoun" class="non-style-link">   
                                        <button type="button" class="btn btn-outline-info mx-2" >Edit</button></a>
                                            <button type="button" class="btn btn-outline-info mx-2" data-toggle="modal" data-target="#viewcoun" id="">View</button>
                                            <button type="button" class="btn btn-outline-info mx-2" data-toggle="modal" data-target="#removecoun">Remove</button>
                                        </div>
                                    </td>

                                    
                                </tr>';
                            }
                        }

                        ?>


                    </tbody>
                </table>
            </div>
        </div>


    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>