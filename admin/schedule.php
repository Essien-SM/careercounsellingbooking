<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>



<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php"><button class="h3 mb-2 btn btn-primary" type="button">
                < Back </button></a>

        <p class="text-center">
            <?php

            date_default_timezone_set('Asia/Kolkata');

            $today = date('Y-m-d');
            echo $today;

            $list110 = $database->query("select  * from  schedule;");

            ?>
        </p>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <h5 class="font-weight-bold mb-0 text-gray-800">Schedule Manager</h5>
        <a href="?action=add-session&id=none&error=0">
            <button type="button" class="btn btn-primary">
                + Add a Session
            </button>
        </a>
    </div>
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Session(<?php echo $list110->num_rows; ?>)</h5>
        </div>
        <div class="card-body container">

            <form action="" method="post" class="form-inline">
                <div class="p-3">
                    <label>Date:</label>
                </div>
                <div class="p-2">
                    <input class="form-control" name="scheduledate" id="date" type="date" placeholder="Default input" aria-label="default input example">
                </div>
                <div class="p-3">
                    <label>Counsellor:</label>
                </div>
                <div class="p-2">
                    <select name="counid" id="" class="form-control form-select" aria-label="Default select example">
                        <option value="" disabled selected hidden>Choose Counsellor Name from the list</option><br>
                        <?php

                        $list11 = $database->query("select  * from  counsellor order by counname asc;");

                        for ($y = 0; $y < $list11->num_rows; $y++) {
                            $row00 = $list11->fetch_assoc();
                            $sn = $row00["counname"];
                            $id00 = $row00["counid"];
                            echo "<option value=" . $id00 . ">$sn</option><br/>";
                        };


                        ?>

                    </select>
                </div>
                <div class="p-2">
                    <button type="submit" name="filter" class="btn btn-primary">
                        Filter
                    </button>
            </form>
        </div>

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
    $sqlmain = "select schedule.scheduleid,schedule.title,counsellor.counname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join counsellor on schedule.counid=counsellor.counid ";
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
    $sqlmain = "select schedule.scheduleid,schedule.title,counsellor.counname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join counsellor on schedule.counid=counsellor.counid  order by schedule.scheduledate desc";
}



?>

<div class="card shadow mb-1 ">

    <div class="card-body table-responsive">
        <div class="table-responsive">
            <table class="table table-borderless text-gray-900">
                <thead>
                    <tr>
                        <th scope="col">Session Title</th>
                        <th scope="col">Counsellor</th>
                        <th scope="col">Scheduled Date & Time</th>
                        <th scope="col">Max num that can be booked</th>
                        <th scope="col">Events</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $result = $database->query($sqlmain);

                    if ($result->num_rows == 0) {
                        echo '<tr>
                    <td colspan="4">
                    <br><br><br><br>
                    <center>
                    <img src="../img/notfound.svg" width="25%">

                    <br>
                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldn\'t find anything related to your keywords !</p>
                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Sessions &nbsp;</font></button>
                    </a>
                    </center>
                    <br><br><br><br>
                    </td>
                    </tr>';
                    } else {
                        for ($x = 0; $x < $result->num_rows; $x++) {
                            $row = $result->fetch_assoc();
                            $scheduleid = $row["scheduleid"];
                            $title = $row["title"];
                            $counname = $row["counname"];
                            $scheduledate = $row["scheduledate"];
                            $scheduletime = $row["scheduletime"];
                            $nop = $row["nop"];
                            echo '<tr>
                        <td> &nbsp;' .
                                substr($title, 0, 30) . '
                        </td>
                        <td>
                        ' . substr($counname, 0, 20) . '
                        </td>
                        <td style="text-align:center;">
                            ' . substr($scheduledate, 0, 10) . ' ' . substr($scheduletime, 0, 5) . '
                        </td>
                        <td style="text-align:center;">
                            ' . $nop . '
                        </td>

                        <td>
                        <div style="display:flex;justify-content: center;">
                        
                        <a href="?action=view&id=' . $scheduleid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                    &nbsp;&nbsp;&nbsp;
                    <a href="?action=drop&id=' . $scheduleid . '&name=' . $title . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Remove</font></button></a>
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


            $list11 = $database->query("select  * from  counsellor order by counname asc;");

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
                                
                                    <input type="submit" value="Place this Session" class="login-btn btn-primary btn" name="schedulesubmit">
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
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>(' . substr($nameget, 0, 40) . ').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-session.php?id=' . $id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="schedule.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            ';
        } elseif ($action == 'view') {
            $sqlmain = "select schedule.scheduleid,schedule.title,counsellor.counname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join counsellor on schedule.counid=counsellor.counid  where  schedule.scheduleid=$id";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $counname = $row["counname"];
            $scheduleid = $row["scheduleid"];
            $title = $row["title"];
            $scheduledate = $row["scheduledate"];
            $scheduletime = $row["scheduletime"];


            $nop = $row['nop'];


            $sqlmain12 = "select * from appointment inner join student on student.stuid=appointment.stuid inner join schedule on schedule.scheduleid=appointment.scheduleid where schedule.scheduleid=$id;";
            $result12 = $database->query($sqlmain12);
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup" style="width: 70%;">
                    <center>
                        <h2></h2>
                        <a class="close" href="schedule.php">&times;</a>
                        <div class="content">
                            
                            
                        </div>
                        <div class="abc scroll" style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Session Title: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $title . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Counsellor of this session: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $counname . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">Scheduled Date: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $scheduledate . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Scheduled Time: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                ' . $scheduletime . '<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label"><b>Students that Already registerd for this session:</b> (' . $result12->num_rows . "/" . $nop . ')</label>
                                    <br><br>
                                </td>
                            </tr>

                            
                            <tr>
                            <td colspan="4">
                                <center>
                                 <div class="abc scroll">
                                 <table width="100%" class="sub-table scrolldown" border="0">
                                 <thead>
                                 <tr>   
                                        <th class="table-headin">
                                             Student ID
                                         </th>
                                         <th class="table-headin">
                                             Student name
                                         </th>
                                         <th class="table-headin">
                                             
                                             Appointment number
                                             
                                         </th>
                                        
                                         
                                         <th class="table-headin">
                                             Student Telephone
                                         </th>
                                         
                                 </thead>
                                 <tbody>';




            $result = $database->query($sqlmain12);

            if ($result->num_rows == 0) {
                echo '<tr>
                                             <td colspan="7">
                                             <br><br><br><br>
                                             <center>
                                             <img src="../img/notfound.svg" width="25%">
                                             
                                             <br>
                                             <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                             <a class="non-style-link" href="appointment.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                             </a>
                                             </center>
                                             <br><br><br><br>
                                             </td>
                                             </tr>';
            } else {
                for ($x = 0; $x < $result->num_rows; $x++) {
                    $row = $result->fetch_assoc();
                    $apponum = $row["apponum"];
                    $stuid = $row["stuid"];
                    $stuname = $row["stuname"];
                    $stutel = $row["stutel"];

                    echo '<tr style="text-align:center;">
                                                <td>
                                                ' . substr($stuid, 0, 15) . '
                                                </td>
                                                 <td style="font-weight:600;padding:25px">' .

                        substr($stuname, 0, 25)
                        . '</td >
                                                 <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                                 ' . $apponum . '
                                                 
                                                 </td>
                                                 <td>
                                                 ' . substr($stutel, 0, 25) . '
                                                 </td>
                                                 
                                                 
                
                                                 
                                             </tr>';
                }
            }



            echo '</tbody>
                
                                 </table>
                                 </div>
                                 </center>
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