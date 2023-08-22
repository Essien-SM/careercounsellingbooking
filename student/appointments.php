<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<?php

$sqlm= "select * from student where stuemail=?";
    $stmt = $database->prepare($sqlm);
    $stmt->bind_param("s",$useremail);
    $stmt->execute();
    $userrow = $stmt->get_result();
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["stuid"];
    $username=$userfetch["stuname"];

$sqlm = "select appointment.appoid,schedule.scheduleid,schedule.title,counsellor.counname,student.stuname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join student on student.stuid=appointment.stuid inner join counsellor on schedule.counid=counsellor.counid  where  student.stuid=$userid ";

if ($_POST) {
    //print_r($_POST);




    if (!empty($_POST["scheduledate"])) {
        $scheduledate = $_POST["scheduledate"];
        $sqlm .= " and schedule.scheduledate='$scheduledate' ";
    };



    

}

$sqlm.= "order by appointment.appodate  asc";
$result = $database->query($sqlm);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <a href="appointments.php"><button class="btn btn-primary" type="button">
            < Back </button></a>
                <h5 class="font-weight-bold mb-0 text-gray-800">My Booking History</h5>
                <p>
                    <?php

                    date_default_timezone_set('Asia/Kolkata');

                    $today = date('Y-m-d');
                    echo $today;


                    ?>
                </p>
    </div>
    <div class="card shadow mb-2" style="margin-top: 60px;" >
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">My Bookings (<?php echo $result->num_rows; ?>)</h5>
        </div>
        <div class="card-body container">
            <form action="" method="POST" class="form-inline">
                <div class="p-3">
                    <label>Date:</label>
                </div>
                <div class="p-2">
                    <input class="form-control" type="date" name="scheduledate" id="date" aria-label="default input example">
                </div>
                <div class="p-2">
                    <button type="submit" name="filter" class="btn btn-primary">
                        Filter
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow mb-1 ">

        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless text-gray-900">
                    <tbody>
                        <?php




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

                            for ($x = 0; $x < ($result->num_rows); $x++) {
                                echo "<tr>";
                                for ($q = 0; $q < 3; $q++) {
                                    $row = $result->fetch_assoc();
                                    if (!isset($row)) {
                                        break;
                                    };
                                    $scheduleid = $row["scheduleid"];
                                    $title = $row["title"];
                                    $counname = $row["counname"];
                                    $scheduledate = $row["scheduledate"];
                                    $scheduletime = $row["scheduletime"];
                                    $apponum = $row["apponum"];
                                    $appodate = $row["appodate"];
                                    $appoid = $row["appoid"];

                                    if ($scheduleid == "") {
                                        break;
                                    }

                                    echo '
            <td style="width: 25%;">
                    <div  class="dashboard-items search-items"  >
                    
                        <div style="width:100%;">
                        <div class="h3-search">
                                    Booking Date: ' . substr($appodate, 0, 30) . '<br>
                                    Reference Number: OC-000-' . $appoid . '
                                </div>
                                <div class="h1-search">
                                    ' . substr($title, 0, 21) . '<br>
                                </div>
                                <div class="h3-search">
                                    Appointment Number:<div class="h1-search">0' . $apponum . '</div>
                                </div>
                                <div class="h3-search">
                                    ' . substr($counname, 0, 30) . '
                                </div>
                                
                                
                                <div class="h4-search">
                                    Scheduled Date: ' . $scheduledate . '<br>Starts: <b>@' . substr($scheduletime, 0, 5) . '</b> (24h)
                                </div>
                                <br>
                                <a href="?action=drop&id=' . $appoid . '&title=' . $title . '&coun=' . $counname . '" ><button  class="login-btn btn-primary-soft btn "  style="padding-top:11px;padding-bottom:11px;width:100%"><font class="tn-in-text">Cancel Booking</font></button></a>
                        </div>
                                
                    </div>
                </td>';
                                }
                                echo "</tr>";

                                // for ( $x=0; $x<$result->num_rows;$x++){
                                //     $row=$result->fetch_assoc();
                                //     $appoid=$row["appoid"];
                                //     $scheduleid=$row["scheduleid"];
                                //     $title=$row["title"];
                                //     $docname=$row["docname"];
                                //     $scheduledate=$row["scheduledate"];
                                //     $scheduletime=$row["scheduletime"];
                                //     $pname=$row["pname"];
                                //     
                                //     
                                //     echo '<tr >
                                //         <td style="font-weight:600;"> &nbsp;'.

                                //         substr($pname,0,25)
                                //         .'</td >
                                //         <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);">
                                //         '.$apponum.'

                                //         </td>
                                //         <td>
                                //         '.substr($title,0,15).'
                                //         </td>
                                //         <td style="text-align:center;;">
                                //             '.substr($scheduledate,0,10).' @'.substr($scheduletime,0,5).'
                                //         </td>

                                //         <td style="text-align:center;">
                                //             '.$appodate.'
                                //         </td>

                                //         <td>
                                //         <div style="display:flex;justify-content: center;">

                                //         <!--<a href="?action=view&id='.$appoid.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                //        &nbsp;&nbsp;&nbsp;-->
                                //        <a href="?action=drop&id='.$appoid.'&name='.$pname.'&session='.$title.'&apponum='.$apponum.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Cancel</font></button></a>
                                //        &nbsp;&nbsp;&nbsp;</div>
                                //         </td>
                                //     </tr>';

                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php

        if(isset($_POST["action"])){
            $action=$_POST["action"];
        }
        else if(isset($_GET["action"])){
        $action=$_GET["action"];
        $id=$_GET["id"];
        if($action=='booking-added'){
            
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                    <br><br>
                        <h2>Booking Successfully.</h2>
                        <a class="close" href="appointments.php">&times;</a>
                        <div class="content">
                        Your Appointment number is '.$id.'.<br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        
                        <a href="appointments.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>
                        <br><br><br><br>
                        </div>
                    </center>
            </div>
            </div>
            ';
        }elseif($action=='drop'){
            $title=$_GET["title"];
            $counname=$_GET["coun"];
            
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="appointments.php">&times;</a>
                        <div class="content">
                            You want to Cancel this Appointment?<br><br>
                            Session Name: &nbsp;<b>'.substr($title,0,40).'</b><br>
                            Counsellor name&nbsp; : <b>'.substr($counname,0,40).'</b><br><br>
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-appointment.php?id='.$id.'" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="appointments.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

                        </div>
                    </center>
            </div>
            </div>
            '; 
        }elseif($action=='view'){
            $sqlm= "select * from counsellor where counid=?";
            $stmt = $database->prepare($sqlm);
            $stmt->bind_param("i",$id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row=$result->fetch_assoc();
            $name=$row["couname"];
            $email=$row["counemail"];
            $spe=$row["specialties"];
            
            $sqlm= "select sname from specialties where id=?";
            $stmt = $database->prepare($sqlm);
            $stmt->bind_param("s",$spe);
            $stmt->execute();
            $spcil_res = $stmt->get_result();
            $spcil_array= $spcil_res->fetch_assoc();
            $spcil_name=$spcil_array["sname"];
            $idnum=$row['counidnum'];
            $tele=$row['countel'];
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
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="idnum" class="form-label">ID Number: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$idnum.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Specialties: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2">
                            '.$spcil_name.'<br><br>
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
    } else  
    {
    echo "\$action is not set <br>"; 
    }
}

    ?>
    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>