<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div style="margin-top:100px" class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-3 text-gray-800">Home</h1>

        <div class="d-flex">
            <div class="d-flex flex-column">
                Today's Date:
                <p class="text-center text-gray-900 h5">
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
                <h5 class="card-title mb-4">Welcome!</h5>
                <h3 class="card-subtitle mb-4"><?php echo substr($username, 0, 13)  ?>.</h3>
                <p class="h6 card-text mb-5" style="font-weight:600">Haven't any idea about counsellor? no problem let's jumping to
                    <a href="counsellor.php" class="non-style-link"><b class="text-primary">"All Counsellor"</b></a> section or
                    <a href="schedule.php" class="non-style-link"><b class="text-primary">"Sessions"</b> </a><br>
                    Track your past and future appointments history.<br>Also find out the expected arrival time of your counsellor.
                </p>
                <div class="mb-4">
                    <h5 class="font-weight-bold">Channel a Counsellor Here</h5>
                    <form action="schedule.php" method="post">
                        <div class="" style="display:flex; flex-direction:row; margin:auto;">
                            <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 30rem; margin-right:0.4rem" placeholder="Search Counsellor and We will Find The Session Available" list="counsellors">

                            <?php
                            echo '<datalist id="counsellors">';
                            $list11 = $database->query("select  counname,counemail from  counsellor;");

                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $d = $row00["counname"];

                                echo "<option value='$d'><br/>";
                            };

                            echo ' </datalist>';
                            ?>

                            <button type="Submit" class="btn btn-primary">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
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
                                                All <br> Counsellor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                                                All <br> students &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <h4 class="mb-0 text-gray-900 font-weight-bolder">Your Upcoming Booking</h4>
                    </div>
                    <div class="card mb-1 ">
                        <div class="card-body" style="height: 250px;">
                            <div style="max-height: 200px; overflow-y: auto;">

                                <table class="table table-borderless text-gray-900">
                                    <thead>
                                        <tr>
                                            <th scope="col">Appoint. Number</th>
                                            <th scope="col">Session Title</th>
                                            <th scope="col">Counsellor</th>
                                            <th scope="col">Scheduled Date & Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nextweek = date("Y-m-d", strtotime("+1 week"));
                                        $sqlmain = "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join student on student.stuid=appointment.stuid inner join counsellor on schedule.counid=counsellor.counid  where student.stuid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                        //echo $sqlmain;
                                        $result = $database->query($sqlmain);

                                        if ($result->num_rows == 0) {
                                            echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel a Counsellor &nbsp;</font></button>
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
                                                $apponum = $row["apponum"];
                                                $counname = $row["counname"];
                                                $scheduledate = $row["scheduledate"];
                                                $scheduletime = $row["scheduletime"];

                                                echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;' .
                                                    $apponum
                                                    . '</td>
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