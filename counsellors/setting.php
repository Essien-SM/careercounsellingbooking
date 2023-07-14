<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>



<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <button class="btn btn-primary" type="button">
            < Back </button>
                <h5 class="font-weight-bold mb-0 text-gray-800">Settings</h5>
                <p>
                    <?php
                    date_default_timezone_set('Asia/Kolkata');

                    $today = date('Y-m-d');
                    echo $today;


                    $studentrow = $database->query("select  * from  student;");
                    $counsellorrow = $database->query("select  * from  counsellor;");
                    $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                    $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                    ?>
                </p>
    </div>
    <div class="mb-3">
        <div class="mb-3">
            <div class="container">
                <a href="?action=edit&id=<?php echo $userid ?>&error=0">
                    <button type="button" class="btn btn-outline-secondary" style="width: 100%; height: 8rem; ">
                        <div class="text-left" style="display:flex; gap:1rem">
                            <div style="background: gray; width:5rem; height: 70px;"></div>
                            <div>
                                <h3>Account Settings</h3>
                                <p>Edit your Account Details & Change Password</p>
                            </div>
                        </div>
                    </button>
                </a>
            </div>
        </div>
        <div class="mb-3">
            <div class="">
                <div class="container">
                    <a href="?action=view&id=<?php echo $userid ?>">
                        <button type="button" class="btn btn-outline-secondary" style="width: 100%; height: 8rem">
                            <div class="text-left" style="display:flex; gap:1rem">
                                <div style="background: gray; width:5rem; height: 70px;"></div>
                                <div>
                                    <h3>View Account Details</h3>
                                    <p>View Personal information About Your Account</p>
                                </div>
                            </div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <div class="">
            <div class="container">
                <a href="?action=drop&id=<?php echo $userid . '&name=' . $username ?>">
                    <button type="button" class="btn btn-outline-secondary" style="width: 100%; height: 8rem">
                        <div class="text-left" style="display:flex; gap:1rem">
                            <div style="background: gray; width:5rem; height: 70px;"></div>
                            <div>
                                <h3>Delete Account</h3>
                                <p>Will Permanently Remove your Account</p>
                            </div>
                        </div>
                    </button>
                </a>
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
if ($_GET) {

    $id = $_GET["id"];
    $action = $_GET["action"];
    if ($action == 'drop') {
        $nameget = $_GET["name"];
        echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="setting.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>(' . substr($nameget, 0, 40) . ').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-counsellor.php?id=' . $id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="setting.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
    } elseif ($action == 'view') {
        $sqlmain = "select * from counsellor where counid='$id'";
        $result = $database->query($sqlmain);
        $row = $result->fetch_assoc();
        $name = $row["counname"];
        $email = $row["counemail"];
        $spe = $row["specialties"];

        $spcil_res = $database->query("select sname from specialties where id='$spe'");
        $spcil_array = $spcil_res->fetch_assoc();
        $spcil_name = $spcil_array["sname"];
        $idnum = $row['counidnum'];
        $tele = $row['countel'];
        echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        
                        <a class="close" href="setting.php">&times;</a>
                        <div class="content">
                            eDoc Web App<br>                   
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0" ">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin-bottom: 3;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $name . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $email . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">ID: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $idnum . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $tele . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Specialties: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            ' . $spcil_name . '<br><br>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="setting.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
    } elseif ($action == 'edit') {
        $sqlmain = "select * from counsellor where counid='$id'";
        $result = $database->query($sqlmain);
        $row = $result->fetch_assoc();
        $name = $row["counname"];
        $email = $row["counemail"];
        $spe = $row["specialties"];

        $spcil_res = $database->query("select sname from specialties where id='$spe'");
        $spcil_array = $spcil_res->fetch_assoc();
        $spcil_name = $spcil_array["sname"];
        $idnum = $row['counidnum'];
        $tele = $row['countel'];

        $error_1 = $_GET["error"];
        $errorlist = array(
            '1' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>',
            '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Conformation Error! Reconform Password</label>',
            '3' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>',
            '4' => "",
            '0' => '',

        );

        if ($error_1 != '4') {
            echo '
                    <div id="popup1" class="overlay">
                            <div class="popup">
                            <center>                 
                                <a class="close" href="setting.php">&times;</a> 
                                <div style="display: flex;justify-content: center;">
                                <div class="abc">
                                <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                                <tr>
                                        <td class="label-td" colspan="2">' .
                $errorlist[$error_1]
                . '</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Edit Counsellor Details.</p>
                                        Counsellor ID : ' . $id . ' (Auto Generated)<br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <form action="edit-coun.php" method="POST" class="add-new-form">
                                            <label for="Email" class="form-label">Email: </label>
                                            <input type="hidden" value="' . $id . '" name="id00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                        <input type="hidden" name="oldemail" value="' . $email . '" >
                                        <input type="email" name="email" class="input-text" placeholder="Email Address" value="' . $email . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        
                                        <td class="label-td" colspan="2">
                                            <label for="name" class="form-label">Name: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="name" class="input-text" placeholder="Counsellor Name" value="' . $name . '" required><br>
                                        </td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="nic" class="form-label">ID: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="counidnum" class="input-text" placeholder="ID" value="' . $idnum . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="Tele" class="form-label">Telephone: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="tel" name="Tele" class="input-text" placeholder="Telephone Number" value="' . $tele . '" required><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="spec" class="form-label">Choose specialties: (Current' . $spcil_name . ')</label>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <select name="spec" id="" class="box">';


            $list11 = $database->query("select  * from  specialties;");

            for ($y = 0; $y < $list11->num_rows; $y++) {
                $row00 = $list11->fetch_assoc();
                $sn = $row00["sname"];
                $id00 = $row00["id"];
                echo "<option value=" . $id00 . ">$sn</option><br/>";
            };




            echo     '       </select><br><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <label for="password" class="form-label">Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="password" class="input-text" placeholder="Defind a Password" required><br>
                                        </td>
                                    </tr><tr>
                                        <td class="label-td" colspan="2">
                                            <label for="cpassword" class="form-label">Conform Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="cpassword" class="input-text" placeholder="Conform Password" required><br>
                                        </td>
                                    </tr>
                                    
                        
                                    <tr>
                                        <td colspan="2">
                                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        
                                            <input type="submit" value="Save" class="login-btn btn-primary btn">
                                        </td>
                        
                                    </tr>
                                
                                    </form>
                                    </tr>
                                </table>
                                </div>
                                </div>
                            </center>
                            <br><br>
                    </div>
                    </div>
                    ';
        } else {
            echo '
                <div id="popup1" class="overlay">
                        <div class="popup">
                        <center>
                        <br><br><br><br>
                            <h2>Edit Successfully!</h2>
                            <a class="close" href="setting.php">&times;</a>
                            <div class="content">
                                If You change your email also Please logout and login again with your new email
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="setting.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                            <a href="../logout.php" class="non-style-link"><button  class="btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;Log out&nbsp;&nbsp;</font></button></a>

                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';
        };
    }
}
?>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>