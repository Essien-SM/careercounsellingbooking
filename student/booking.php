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

date_default_timezone_set('Asia/Kolkata');

$today = date('Y-m-d');


?>



<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 gap-4">
        <a href=""> <button class="btn btn-primary" type="button">
                < Back </button></a>
        <form action="schedule.php" method="post">
            <div class="" style="display:flex; flex-direction:row; margin:auto;">
                <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 20rem; margin-right:0.4rem" placeholder="Search Counsellor name or Email or Date (YYYY-MM-DD)" list="counsellors">&nbsp;&nbsp;

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
        
        <div class="card-body">
        <?php
                            
                            if(($_GET)){
                                
                                
                                if(isset($_GET["id"])){
                                    

                                    $id=$_GET["id"];

                                    $sqlmain= "select * from schedule inner join counsellor on schedule.counid=counsellor.counid where schedule.scheduleid=? order by schedule.scheduledate desc";
                                    $stmt = $database->prepare($sqlmain);
                                    $stmt->bind_param("i", $id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    //echo $sqlmain;
                                    $row=$result->fetch_assoc();
                                    $scheduleid=$row["scheduleid"];
                                    $title=$row["title"];
                                    $counname=$row["counname"];
                                    $counemail=$row["counemail"];
                                    $scheduledate=$row["scheduledate"];
                                    $scheduletime=$row["scheduletime"];
                                    $sql2="select * from appointment where scheduleid=$id";
                                    //echo $sql2;
                                     $result12= $database->query($sql2);
                                     $apponum=($result12->num_rows)+1;
                                    
                                    echo '
                                        <form action="booking-complete.php" method="post">
                                            <input type="hidden" name="scheduleid" value="'.$scheduleid.'" >
                                            <input type="hidden" name="apponum" value="'.$apponum.'" >
                                            <input type="hidden" name="date" value="'.$today.'" >

                                        
                                    
                                    ';
                                     

                                    echo '
                                    <td style="width: 50%;" rowspan="2">
                                            <div  class="dashboard-items search-items"  >
                                            
                                                <div style="width:100%">
                                                        <div class="h1-search" style="font-size:25px;">
                                                            Session Details
                                                        </div><br><br>
                                                        <div class="h3-search" style="font-size:18px;line-height:30px">
                                                            Counsellor name:  &nbsp;&nbsp;<b>'.$counname.'</b><br>
                                                            Counsellor Email:  &nbsp;&nbsp;<b>'.$counemail.'</b> 
                                                        </div>
                                                        <div class="h3-search" style="font-size:18px;">
                                                          
                                                        </div><br>
                                                        <div class="h3-search" style="font-size:18px;">
                                                            Session Title: '.$title.'<br>
                                                            Session Scheduled Date: '.$scheduledate.'<br>
                                                            Session Starts : '.$scheduletime.'

                                                        </div>
                                                        <br>
                                                        
                                                </div>
                                                        
                                            </div>
                                        </td>
                                        
                                        
                                        
                                        <td style="width: 25%;">
                                            <div  class="dashboard-items search-items"  >
                                            
                                                <div style="width:100%;padding-top: 15px;padding-bottom: 15px;">
                                                        <div class="h1-search" style="font-size:20px;line-height: 35px;margin-left:8px;text-align:center;">
                                                            Your Appointment Number
                                                        </div>
                                                        <center>
                                                        <div class=" dashboard-icons" style="margin-left: 0px;width:90%;font-size:70px;font-weight:800;text-align:center;color:var(--btnnictext);background-color: var(--btnice)">'.$apponum.'</div>
                                                    </center>
                                                       
                                                        </div><br>
                                                        
                                                        <br>
                                                        <br>
                                                </div>
                                                        
                                            </div>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:10px;padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;width:95%;text-align: center;" value="Book now" name="booknow"></button>
                                            </form>
                                            </td>
                                        </tr>
                                        '; 
                                        




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