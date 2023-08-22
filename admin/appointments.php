<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div style="margin-top:100px" class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="appointments.php"><button class="h3 mb-2 btn btn-primary" type="button">
                < Back </button></a>
        <p class="font-weight-bold h2">Appointment Manager</p>

        <div class="d-flex">
            <div class="d-flex flex-column">
                Today's Date:
                <p class="text-center text-gray-900 h5">
                    <?php

                    date_default_timezone_set('Asia/Kolkata');

                    $today = date('Y-m-d');
                    echo $today;

                    $list110 = $database->query("select  * from  appointment;");

                    ?>
                </p>
            </div>
            <div>
                <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
            </div>
        </div>




    </div>

    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Appointments(<?php echo $list110->num_rows; ?>)</h5>
        </div>
        <div class="card-body container">
            <form action="" method="post" class="form-inline">
                <div class="p-3">
                    <label>Date:</label>
                </div>
                <div class="p-2">
                    <input class="form-control" name="scheduledate" type="date" placeholder="Default input" aria-label="default input example">
                </div>
                <div class="p-3">
                    <label>Counsellor:</label>
                </div>
                <div class="p-2">
                    <select name="counid" id="" class="form-control form-select" aria-label="Default select example">
                        <option value="" disabled selected hidden>Choose Counsellor name from the list</option><br />
                        <?php

                        $list11 = $database->query("select  * from counsellor order by counname asc;");

                        for ($y = 0; $y < $list11->num_rows; $y++) {
                            $row00 = $list11->fetch_assoc();
                            $sn = $row00["counname"];
                            $id00 = $row00["counid"];
                            echo "<option value=" . $id00 . ">$sn</option><br/>";
                        };


                        ?>

                    </select>
                </div>
                <div class="col-md-2 themed-grid-col p-2">
                    <button type="submit" name="filter" class="btn btn-primary">
                        Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php
    if ($_POST) {
        //print_r($_POST);
        $sqlpt1 = "";
        if (!empty($_POST["scheduledate"])) {
            $scheduledate = $_POST["scheduledate"];
            $sqlpt1 = " schedule.scheduledate='$scheduledate' ";
        }


        $sqlpt2 = "";
        if (!empty($_POST["counid"])) {
            $counid = $_POST["counid"];
            $sqlpt2 = " counsellor.counid=$counid ";
        }
        //echo $sqlpt2;
        //echo $sqlpt1;
        $sqlmain = "select appointment.appoid,schedule.scheduleid,schedule.title,counsellor.counname,student.stuname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join student on student.stuid=appointment.stuid inner join counsellor on schedule.counid=counsellor.counid";
        $sqllist = array($sqlpt1, $sqlpt2);
        $sqlkeywords = array(" where ", " and ");
        $key2 = 0;
        foreach ($sqllist as $key) {

            if (!empty($key)) {
                $sqlmain .= $sqlkeywords[$key2] . $key;
                $key2++;
            };
        };
        //echo $sqlmain;



        //
    } else {
        $sqlmain = "select appointment.appoid,schedule.scheduleid,schedule.title,counsellor.counname,student.stuname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join student on student.stuid=appointment.stuid inner join counsellor on schedule.counid=counsellor.counid  order by schedule.scheduledate desc";
    }



    ?>

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
                        <?php


                        $result = $database->query($sqlmain);

                        if ($result->num_rows == 0) {
                            echo '<tr>
                            <td colspan="7">
                            <br><br><br><br>
                            <center>
                            <img src="../img/notfound.svg" width="25%">
                            
                            <br>
                            <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                            <a class="non-style-link" href="appointments.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                            </a>
                            </center>
                            <br><br><br><br>
                            </td>
                            </tr>';
                        } else {
                            for ($x = 0; $x < $result->num_rows; $x++) {
                                $row = $result->fetch_assoc();
                                $appoid = $row["appoid"];
                                $scheduleid = $row["scheduleid"];
                                $title = $row["title"];
                                $counname = $row["counname"];
                                $scheduledate = $row["scheduledate"];
                                $scheduletime = $row["scheduletime"];
                                $stuname = $row["stuname"];
                                $apponum = $row["apponum"];
                                $appodate = $row["appodate"];
                                echo '<tr >
                                    <td style="font-weight:600;"> &nbsp;' .

                                    substr($stuname, 0, 25)
                                    . '</td >
                                    <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                    ' . $apponum . '
        
                                        </td>
                                        <td>
                                        ' . substr($counname, 0, 25) . '
                                        </td>
                                        <td>
                                        ' . substr($title, 0, 15) . '
                                        </td>
                                        <td style="text-align:center;font-size:12px;">
                                            ' . substr($scheduledate, 0, 10) . ' <br>' . substr($scheduletime, 0, 5) . '
                                        </td>
                                        
                                        <td style="text-align:center;">
                                            ' . $appodate . '
                                        </td>

                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <!--<a href="?action=view&id=' . $appoid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                    &nbsp;&nbsp;&nbsp;-->
                                    <a href="?action=drop&id=' . $appoid . '&name=' . $stuname . '&session=' . $title . '&apponum=' . $apponum . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Cancel</font></button></a>
                                    &nbsp;&nbsp;&nbsp;</div>
                                        </td>
                                    </tr>';
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php

        if ($_GET) {
            $id = $_GET["id"];
            $action = $_GET["action"];
            if ($action == 'add-session') {

                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    
                    
                        <a class="close" href="schedule.php">&times;</a> 
                        <div style="display: flex;justify-content: center;">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        <tr>
                                <td class="label-td" colspan="2">' .
                    ""

                    . '</td>
                            </tr>

                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Session.</p><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                <form action="add-session.php" method="POST" class="add-new-form">
                                    <label for="title" class="form-label">Session Title : </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="title" class="input-text" placeholder="Name of this Session" required><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="counid" class="form-label">Select Counsellor: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="counid" id="" class="box" >
                                    <option value="" disabled selected hidden>Choose Counsellor Name from the list</option><br/>';


                $list11 = $database->query("select  * from  counsellor;");

                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $sn = $row00["counname"];
                    $id00 = $row00["counid"];
                    echo "<option value=" . $id00 . ">$sn</option><br/>";
                };




                echo     '       </select><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nop" class="form-label">Number of Students/Appointment Numbers : </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="number" name="nop" class="input-text" min="0"  placeholder="The final appointment number for this session depends on this number" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="date" class="form-label">Session Date: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="date" name="date" class="input-text" min="' . date('Y-m-d') . '" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="time" class="form-label">Schedule Time: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="time" name="time" class="input-text" placeholder="Time" required><br>
                                </td>
                            </tr>
                           
                            <tr>
                                <td colspan="2">
                                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                    <input type="submit" value="Place this Session" class="login-btn btn-primary btn" name="shedulesubmit">
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
            } elseif ($action == 'session-added') {
                $titleget = $_GET["title"];
                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Session Placed.</h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                        ' . substr($titleget, 0, 40) . ' was scheduled.<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
            } elseif ($action == 'drop') {
                $nameget = $_GET["name"];
                $session = $_GET["session"];
                $apponum = $_GET["apponum"];
                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="appointments.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br><br>
                            Student Name: &nbsp;<b>' . substr($nameget, 0, 40) . '</b><br>
                            Appointment number &nbsp; : <b>' . substr($apponum, 0, 40) . '</b><br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-appointment.php?id=' . $id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="appointments.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

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
                        <h2></h2>
                        <a class="close" href="counsellor.php">&times;</a>
                        <div class="content">
                            Web App<br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
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
                                    <label for="nic" class="form-label">NIC: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $nic . '<br><br>
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
                                    <a href="counsellor.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
            }
        }

        ?>
    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>