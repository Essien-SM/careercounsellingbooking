<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div style="margin-top:100px" class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="d-flex">
            <div class="d-flex flex-column">
                Today's Date:
                <p class=" text-center text-gray-900 h5">
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

    <!-- Content Row -->
    <div class="row">

        <div class="card text-gray-900" style="width: 100vw; background-color: #e6edfc;">
            <div class="card-body">
                <h5 class="card-title mb-4" style="font-weight:700">Welcome!</h5>
                <h3 class="card-subtitle mb-4" style="font-weight:800"><?php echo $username  ?>.</h3>
                <p class="h6 card-text mb-4" style="font-weight:600">Thanks for joining us. We always trying to get you a complete service. <br>
                    You can view your daily schedule, reach student Appointments at Home</p>
                <a href="appointments.php" type="button" class="btn btn-primary">View My Appointments</a>
            </div>
        </div>

        <!-- Content Row -->
        <div class="container mt-5">
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 text-gray-900 font-weight-bolder">Dashboard</h4>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                <?php echo $counsellorrow->num_rows  ?></div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">
                                                All <br> Counsellors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                <?php echo $studentrow->num_rows  ?></div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">
                                                All <br> student &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                <?php echo $appointmentrow->num_rows  ?></div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">
                                                New <br> Booking &nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 mb-0 font-weight-bold text-primary">
                                                <?php echo $schedulerow->num_rows  ?></div>
                                            <div class="h5 font-weight-bold text-gray-900 mb-1">
                                                Today <br> Session
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 mb-4">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0 text-gray-900 font-weight-bolder">Your Up Coming Sessions until Next week</h4>
                    </div>
                    <div class="card mb-1 ">
                        <div class="card-body" style="height: 250px;">
                            <div style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr>
                                            <th scope="col">Session Title</th>
                                            <th scope="col">Scheduled Date</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nextweek = date("Y-m-d", strtotime("+1 week"));
                                        $sqlmain = "select schedule.scheduleid,schedule.title,counsellor.counname,schedule.scheduledate,schedule.scheduletime,schedule.nop from schedule inner join counsellor on schedule.counid=counsellor.counid  where schedule.scheduledate>='$today' and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc";
                                        $result = $database->query($sqlmain);

                                        if ($result->num_rows == 0) {
                                            echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
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
                                                        <td style="padding:20px;"> &nbsp;' .
                                                    substr($title, 0, 30)
                                                    . '</td>
                                                        <td style="padding:20px;font-size:13px;">
                                                        ' . substr($scheduledate, 0, 10) . '
                                                        </td>
                                                        <td style="text-align:center;">
                                                            ' . substr($scheduletime, 0, 5) . '
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
                </div>


            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    <!-- Begin Page Content -->

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>