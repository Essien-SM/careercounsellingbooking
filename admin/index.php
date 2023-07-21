<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>



<div class="container-fluid">
    <!-- Sidebar Toggle (Topbar) -->

    <div class="d-sm-flex align-items-center justify-content-around mb-3 gap-4">
        <form action="counsellor.php" method="post">
            <div class="" style="display:flex; flex-direction:row; margin:auto;">
                <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 35rem; margin-right:0.4rem" placeholder="Search Counsellor name or Email" list="counsellors">&nbsp;&nbsp;

                <?php
                echo '<datalist id="counsellors">';
                $list11 = $database->query("select  counname,counemail from counsellor;");

                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $d = $row00["counname"];
                    $c = $row00["counemail"];
                    echo "<option value='$d'><br/>";
                    echo "<option value='$c'><br/>";
                };

                echo ' </datalist>';
                ?>

                <button type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>

        <div class="d-flex">

            <div class="d-flex flex-column">
                Today's Date:
                <p class="text-center text-gray-900 h3">
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

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Status</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                <?php echo $counsellorrow->num_rows  ?>
                            </div>
                            <div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">
                                Advisors&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                <?php echo $studentrow->num_rows  ?>
                            </div>
                            <div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">
                                Students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                <?php echo $appointmentrow->num_rows  ?>
                            </div>
                            <div class="text-xs font-weight-bold text-gray-900 text-uppercase mb-1">
                                New Booking &nbsp;&nbsp;
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary">
                                <?php echo $schedulerow->num_rows  ?>
                            </div>
                            <div class="h5 text-xs font-weight-bold text-gray-900 text-uppercase mb-1">
                                Today Session
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container mt-5">
                    <div class="row">
                        <div class="col-sm-6 col-md-5 col-lg-6">
                            <h2 class="text-gray-900">Upcoming Appointments until Next Monday</h2>
                            <p>Here's Quick access to Upcoming Appointments until 7 days
                                More details available in @Appointment section.</p>
                            <div class="card border-left-primary shadow" style="width: 28rem; max-height: 300px; overflow-y: auto;">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>


                            </div>
                            <div class="d-grid gap-2" style="width: 28rem;">
                                <button class="btn btn-primary btn-block" type="button">Button</button>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-5 offset-md-2 col-lg-6 offset-lg-0">
                            <h2 class="text-gray-900">Upcoming Sessions until Next Monday</h2>
                            <p>Here's Quick access to Upcoming Sessions that Scheduled until 7 days
                                Add,Remove and Many features available in @Schedule section.</p>
                            <div class="card" style="width: 28rem;">
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-primary btn-block" type="button">Button</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->



        <!-- Content Row -->
        <div class="container mt-5">
            <div class="row">

                <!-- Content Column -->
                <div class="col-lg-6 mb-4">
                    <h4 class="text-primary font-weight-bold">
                        Upcoming Appointments until Next <?php echo date("l", strtotime("+1 week")); ?>
                    </h4>
                    <p>Here's Quick access to Upcoming Appointments until 7 days
                        More details available in @Appointment section.</p>

                    <!-- Project Card Example -->
                    <div class="card shadow mb-1 ">
                        <div class="card-body" style="height: 250px;">
                            <div class="table-responsive-sm" style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr class="border-bottom border-primary">
                                            <th scope="col">Appointment Number</th>
                                            <th scope="col">Students Name</th>
                                            <th scope="col">Counsellor</th>
                                            <th scope="col">Session</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nextweek = date("Y-m-d", strtotime("+1 week"));
                                        $sqlmain = "select appointment.appoid,schedule.scheduleid,schedule.title,counsellor.counname,student.stuname,schedule.scheduledate,schedule.scheduletime,appointment.apponum,appointment.appodate from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join student on student.stuid=appointment.stuid inner join counsellor on schedule.counid=counsellor.counid  where schedule.scheduledate>='$today'  and schedule.scheduledate<='$nextweek' order by schedule.scheduledate desc";

                                        $result = $database->query($sqlmain);

                                        if ($result->num_rows == 0) {
                                            echo '<tr>
                                                    <td colspan="3">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldn\'t find anything related to your keywords !</p>
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
                                                echo '<tr>


                                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);padding:20px;">
                                                            ' . $apponum . '
                                                            
                                                        </td>

                                                        <td style="font-weight:600;"> &nbsp;' .

                                                    substr($stuname, 0, 25)
                                                    . '</td >
                                                        <td style="font-weight:600;"> &nbsp;' .

                                                    substr($counname, 0, 25)
                                                    . '</td >
                                                           
                                                        
                                                        <td>
                                                        ' . substr($title, 0, 15) . '
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
                    <div>
                        <a href="appointments.php" class="non-style-link">
                            <button class="btn btn-primary btn-block" type="button">Show all Appointments</button>
                        </a>
                    </div>


                    <!-- Color System -->


                </div>
                <div class="col-lg-6 mb-4">
                    <h4 class="text-primary font-weight-bold">
                        Upcoming Sessions until Next <?php echo date("l", strtotime("+1 week")); ?>
                    </h4>
                    <p>
                        Here's Quick access to Upcoming Sessions that Scheduled until 7 days
                        Add,Remove and Many features available in @Schedule section.
                    </p>

                    <!-- Project Card Example -->
                    <div class="card shadow mb-1">
                        <div class="card-body" style="height: 250px;">
                            <div class="table-responsive-sm" style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr class="border-bottom border-primary">
                                            <th scope="col">Session Title</th>
                                            <th scope="col">Counsellor</th>
                                            <th scope="col">Scheduled Date & Time</th>
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
                                                        <td>
                                                        ' . substr($counname, 0, 20) . '
                                                        </td>
                                                        <td style="text-align:center;">
                                                            ' . substr($scheduledate, 0, 10) . ' ' . substr($scheduletime, 0, 5) . '
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
                    <div>
                        <a href="schedule.php" class="non-style-link">
                            <button class="btn btn-primary btn-block" type="button">Show all Sessions</button>
                        </a>
                    </div>

                    <!-- Color System -->


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