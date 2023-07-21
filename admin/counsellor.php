<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
include('../connection.php')
?>


<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php"><button class="h3 mb-2 btn btn-primary" type="button">
                < Back </button></a>
        <form action="" method="post">
            <div class="" style="display:flex; flex-direction:row; margin:auto;">
                <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 20rem; margin-right:0.4rem" placeholder="Search Counsellor name or Email" list="counsellors">&nbsp;&nbsp;

                <?php
                echo '<datalist id="counsellors">';
                $list11 = $database->query("select  counname,counemail from  counsellor;");

                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $d = $row00["counname"];
                    $c = $row00["counemail"];
                    echo "<option value='$d'><br/>";
                    echo "<option value='$c'><br/>";
                };

                echo ' </datalist>';
                ?>
                <button type="Submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
        <p class="text-center">
            <?php
            date_default_timezone_set('Asia/Kolkata');

            $date = date('Y-m-d');
            echo $date;

            ?>
        </p>
    </div>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="font-weight-bold mb-0 text-gray-800">Add New Counsellor</h4>
        <a href="?action=add&id=none&error=0">
            <button type="button" class="btn btn-primary">
                + Add New
            </button>
        </a>
    </div>

    <div class="card shadow mb-1 ">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Counsellors(<?php echo $list11->num_rows; ?>)</h5>
        </div>
        <?php
        if ($_POST) {
            $keyword = $_POST["search"];

            $sqlmain = "select * from counsellor where counemail='$keyword' or counname='$keyword' or counname like '$keyword%' or counname like '%$keyword' or counname like '%$keyword%'";
        } else {
            $sqlmain = "select * from counsellor order by counid asc";
        }



        ?>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless table-striped text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Counsellor's Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Specialties</th>
                            <th scope="col">Events</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $result = $database->query($sqlmain);

                        if ($result->num_rows == 0) {
                            echo '
                            <tr>
                                <td colspan="4">
                                <br><br><br><br>
                                <center>
                                    <img src="../img/notfound.svg" width="5%">

                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldn\'t find anything related to your keywords !</p>
                                    <a class="non-style-link" href="counsellor.php">
                                        <button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Counsellors &nbsp;</font></button>
                                    </a>
                                </center>
                                <br><br><br><br>
                                </td>
                            </tr>';
                        } else {
                            for ($x = 0; $x < $result->num_rows; $x++) {
                                $row = $result->fetch_assoc();
                                $counid = $row["counid"];
                                $name = $row["counname"];
                                $email = $row["counemail"];
                                $spe = $row["specialties"];
                                $spcil_res = $database->query("select sname from specialties where id='$spe'");
                                $spcil_array = $spcil_res->fetch_assoc();
                                $spcil_name = $spcil_array["sname"];
                                echo '
                                <tr>
                                    <td> &nbsp;' .
                                    substr($name, 0, 30)
                                    . '</td>
                                    <td>
                                    ' . substr($email, 0, 20) . '
                                    </td>
                                    <td>
                                    ' . substr($spcil_name, 0, 20) . '
                                    </td>
                                    <td>
                                    <div style="display:flex;justify-content: center;">
                                    <a href="?action=edit&id=' . $counid . '&error=0" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-edit"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Edit</font></button></a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="?action=view&id=' . $counid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                               &nbsp;&nbsp;&nbsp;
                               <a href="?action=drop&id=' . $counid . '&name=' . $name . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-delete"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Remove</font></button></a>
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
            if ($action == 'drop') {
                $nameget = $_GET["name"];
                echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <h2>Are you sure?</h2>
                        <a class="close" href="counsellor.php">&times;</a>
                        <div class="content">
                            You want to delete this record<br>(' . substr($nameget, 0, 40) . ').
                            
                        </div>
                        <div style="display: flex;justify-content: center;">
                        <a href="delete-counsellor.php?id=' . $id . '" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"<font class="tn-in-text">&nbsp;Yes&nbsp;</font></button></a>&nbsp;&nbsp;&nbsp;
                        <a href="counsellor.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;No&nbsp;&nbsp;</font></button></a>

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
                        <div class="abc">
                        <table width="80%" style="padding: 10px" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 5px;margin-bottom: 5;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p>
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
                                    <label for="counidnum" class="form-label">ID Number: </label>
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
                                    <a href="counsellor.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
            } elseif ($action == 'add') {
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
                    
                        <a class="close" href="counsellor.php">&times;</a> 
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
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">Add New Counsellor.</p><br><br>
                                </td>
                            </tr>
                            
                            <tr>
                                <form action="add-new.php" method="POST" class="add-new-form">
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="name" class="input-text" placeholder="Counsellor Name" required><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="email" name="email" class="input-text" placeholder="Email Address" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="counidnum" class="form-label">ID Number: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="text" name="counidnum" class="input-text" placeholder="ID Number" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="tel" name="Tele" class="input-text" placeholder="Telephone Number" required><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Choose specialties: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <select name="spec" id="" class="box" >';


                    $list11 = $database->query("select  * from  specialties order by sname asc;");

                    for ($y = 0; $y < $list11->num_rows; $y++) {
                        $row00 = $list11->fetch_assoc();
                        $sn = $row00["sname"];
                        $id00 = $row00["id"];
                        echo "<option value=" . $id00 . ">$sn</option><br/>";
                    };




                    echo     '       </select><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="password" class="form-label">Password: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <input type="password" name="password" class="input-text" placeholder="Define a Password" required><br>
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
                                
                                    <input type="submit" value="Add" class="login-btn btn-primary btn">
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
                                <h2>New Record Added Successfully!</h2>
                                <a class="close" href="Counsellor.php">&times;</a>
                                <div class="content">
                                    
                                    
                                </div>
                                <div style="display: flex;justify-content: center;">
                                
                                <a href="counsellor.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

                                </div>
                                <br><br>
                            </center>
                    </div>
                    </div>
        ';
                }
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
                            
                                <a class="close" href="counsellor.php">&times;</a> 
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
                                            <input type="hidden" name="oldemail" value="' . $email . '" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
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
                                            <label for="counidnum" class="form-label">ID Number: </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label-td" colspan="2">
                                            <input type="text" name="counidnum" class="input-text" placeholder="ID Number" value="' . $idnum . '" required><br>
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
                            <a class="close" href="d.php">&times;</a>
                            <div class="content">
                                
                                
                            </div>
                            <div style="display: flex;justify-content: center;">
                            
                            <a href="counsellor.php" class="non-style-link"><button  class="btn-primary btn"  style="display: flex;justify-content: center;align-items: center;margin:10px;padding:10px;"><font class="tn-in-text">&nbsp;&nbsp;OK&nbsp;&nbsp;</font></button></a>

                            </div>
                            <br><br>
                        </center>
                </div>
                </div>
    ';
                };
            };
        };

        ?>


    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>