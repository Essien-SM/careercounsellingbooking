<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>



<div class="container-fluid">
    <div style="margin-top:100px" class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <button class="btn btn-primary" type="button">
            < Back </button>
                <h5 class="font-weight-bold mb-0 text-gray-800">Settings</h5>

                <div class="d-flex">
                    <div class="d-flex flex-column">
                        Today's Date:
                        <p class="h5 text-gray-900 text-center">
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
                    <div>
                        <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                    </div>
                </div>
    </div>
    <div class="mb-3">
        <table class="filter-container" style="border: none;" border="0">
            <tr>
                <td colspan="4">
                    <p style="font-size: 20px">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width: 25%;">
                    <a href="?action=edit&id=<?php echo $userid ?>&error=0" class="non-style-link">
                        <div class="dashboard-items setting-tabs" style="padding:20px;margin:auto;width:95%;display: flex">
                            <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/icons/accountSettings.svg');"></div>
                            <div>
                                <div class="h1-dashboard" style="font-size: 20px;">
                                    Account Settings &nbsp;

                                </div><br>
                                <div class="h3-dashboard" style="font-size: 15px;">
                                    Edit your Account Details & Change Password
                                </div>
                            </div>

                        </div>
                    </a>
                </td>


            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 5px">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width: 25%;">
                    <a href="?action=view&id=<?php echo $userid ?>" class="non-style-link">
                        <div class="dashboard-items setting-tabs" style="padding:20px;margin:auto;width:95%;display: flex;">
                            <div class="btn-icon-back dashboard-icons-setting " style="background-image: url('../img/icons/view-iceblue.svg');"></div>
                            <div>
                                <div class="h1-dashboard" style="font-size: 20px;">
                                    View Account Details

                                </div><br>
                                <div class="h3-dashboard" style="font-size: 15px;">
                                    View Personal information About Your Account
                                </div>
                            </div>

                        </div>
                    </a>
                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 5px">&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td style="width: 25%;">
                    <a href="?action=drop&id=<?php echo $userid . '&name=' . $username ?>" class="non-style-link">
                        <div class="dashboard-items setting-tabs" style="padding:20px;margin:auto;width:95%;display: flex;">
                            <div class="btn-icon-back dashboard-icons-setting" style="background-image: url('../img/delete.svg');"></div>
                            <div>
                                <div class="h1-dashboard" style="color: #ff5050; font-size: 20px;">
                                    Delete Account

                                </div><br>
                                <div class="h3-dashboard" style="font-size: 15px;">
                                    Will Permanently Remove your Account
                                </div>
                            </div>

                        </div>
                    </a>
                </td>

            </tr>
        </table>
    </div>
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
                            Web App<br>                   
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
                                    <label for="nic" class="form-label">ID Number: </label>
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
            '2' => '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Password Confirmation Error! Reconfirm Password</label>',
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
                                            <label for="nic" class="form-label">ID Number: </label>
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
                                            <label for="cpassword" class="form-label">Confirm Password: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password" required><br>
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