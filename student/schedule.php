<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<?php

date_default_timezone_set('Asia/Kolkata');

$today = date('Y-m-d');


//echo $userid;
?>

<?php

$sqlmain = "select * from schedule inner join counsellor on schedule.counid=counsellor.counid where schedule.scheduledate>='$today'  order by schedule.scheduledate asc";
$sqlpt1 = "";
$insertkey = "";
$q = '';
$searchtype = "All";
if ($_POST) {
    //print_r($_POST);

    if (!empty($_POST["search"])) {
        /*TODO: make and understand */
        $keyword = $_POST["search"];
        $sqlmain = "select * from schedule inner join counsellor on schedule.counid=counsellor.counid where schedule.scheduledate>='$today' and (counsellor.counname='$keyword' or counsellor.counidnum like '%$keyword%' or counsellor.counidnum like '%$keyword'  or counsellor.counidnum like '$keyword%'  or counsellor.counname like '$keyword%' or counsellor.counname like '%$keyword' or counsellor.counname like '%$keyword%' or schedule.title='$keyword' or schedule.title like '$keyword%' or schedule.title like '%$keyword' or schedule.title like '%$keyword%' or schedule.scheduledate like '$keyword%' or schedule.scheduledate like '%$keyword' or schedule.scheduledate like '%$keyword%' or schedule.scheduledate='$keyword' ) order by schedule.scheduledate asc";
        //echo $sqlmain;
        $insertkey = $keyword;
        $searchtype = "Search Result : ";
        $q = '"';
    }
}


$result = $database->query($sqlmain)


?>



<div class="container-fluid">    <!-- Page Heading -->
    <div style="margin-top: 100px;" class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <a href="counsellor.php"> <button class="btn btn-primary" type="button">
                < Back </button></a>
        <form action="" method="post">
            <div class="" style="display:flex; flex-direction:row; margin:auto;">
                <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 20rem; margin-right:0.4rem" placeholder="Search Counsellor name or Email or Date (YYYY-MM-DD)" value="<?php echo $insertkey ?>" list="counsellors">&nbsp;&nbsp;

                <?php
                echo '<datalist id="counsellors">';
                $list11 = $database->query("select DISTINCT * from  counsellor;");
                $list12 = $database->query("select DISTINCT * from  schedule GROUP BY title;");





                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $d = $row00["counname"];

                    echo "<option value='$d'><br/>";
                };


                for ($y = 0; $y < $list12->num_rows; $y++) {
                    $row00 = $list12->fetch_assoc();
                    $d = $row00["title"];

                    echo "<option value='$d'><br/>";
                };

                echo ' </datalist>';
                ?>
                <button type="Submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
        <p>
            <?php


            echo $today;



            ?>
        </p>
    </div>
    <div class="card mb-2">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800"><?php echo $searchtype . " Sessions" . "(" . $result->num_rows . ")"; ?></h5>
            <h5 class="mb-0 font-weight-bold text-gray-800"><?php echo $q . $insertkey . $q; ?></h5>
        </div>
        <div class="card-body">
            <?php




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
                //echo $result->num_rows;
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

                        if ($scheduleid == "") {
                            break;
                        }

                        echo '
        <td style="width: 25%;">
                <div  class="dashboard-items search-items"  >
                
                    <div style="width:100%">
                            <div class="h1-search">
                                ' . substr($title, 0, 21) . '
                            </div><br>
                            <div class="h3-search">
                                ' . substr($counname, 0, 30) . '
                            </div>
                            <div class="h4-search">
                                ' . $scheduledate . '<br>Starts: <b>@' . substr($scheduletime, 0, 5) . '</b> (24h)
                            </div>
                            <br>
                            <a href="booking.php?id=' . $scheduleid . '" ><button  class="login-btn btn-primary-soft btn "  style="padding-top:11px;padding-bottom:11px;width:100%"><font class="tn-in-text">Book Now</font></button></a>
                    </div>
                            
                </div>
            </td>';
                    }
                    echo "</tr>";


                    // echo '<tr>
                    //     <td> &nbsp;'.
                    //     substr($title,0,30)
                    //     .'</td>

                    //     <td style="text-align:center;">
                    //         '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                    //     </td>
                    //     <td style="text-align:center;">
                    //         '.$nop.'
                    //     </td>

                    //     <td>
                    //     <div style="display:flex;justify-content: center;">

                    //     <a href="?action=view&id='.$scheduleid.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                    //    &nbsp;&nbsp;&nbsp;
                    //    <a href="?action=drop&id='.$scheduleid.'&name='.$title.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Cancel Session</font></button></a>
                    //     </div>
                    //     </td>
                    // </tr>';

                }
            }

            ?>

        </div>
    </div>
</div>



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>