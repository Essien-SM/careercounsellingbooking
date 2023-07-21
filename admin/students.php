<?php include('includes/header.php');
include('includes/navbar.php');
include('includes/topbar.php');
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="index.php"><button class="h3 mb-2 btn btn-primary" type="button">
                < Back </button></a>
        <form action="" method="post">
            <div class="" style="display:flex; flex-direction:row; margin:auto;">
                <input class="form-control" type="search" name="search" aria-label="default input example" style="width: 20rem; margin-right:0.4rem" placeholder="Search Student name or Email" list="students">&nbsp;&nbsp;

                <?php
                echo '<datalist id="students">';
                $list11 = $database->query("select  stuname,stuemail from student;");

                for ($y = 0; $y < $list11->num_rows; $y++) {
                    $row00 = $list11->fetch_assoc();
                    $d = $row00["stuname"];
                    $c = $row00["stuemail"];
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
    <div class="card shadow mb-1 ">
        <div class="card-header py-3">
            <h5 class="mb-0 font-weight-bold text-gray-800">All Students(<?php echo $list11->num_rows; ?>)</h5>
        </div>
        <?php
        if ($_POST) {
            $keyword = $_POST["search"];

            $sqlmain = "select * from student where stuemail='$keyword' or stuname='$keyword' or stuname like '$keyword%' or stuname like '%$keyword' or stuname like '%$keyword%' ";
        } else {
            $sqlmain = "select * from student order by stuid desc";
        }



        ?>
        <div class="card-body table-responsive">
            <div class="table-responsive">
                <table class="table table-borderless text-gray-900">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Student ID Number</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date of Birth</th>
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
                                <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                <a class="non-style-link" href="student.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Students &nbsp;</font></button>
                                </a>
                                </center>
                                <br><br><br><br>
                                </td>
                                </tr>';
                        } else {
                            for ($x = 0; $x < $result->num_rows; $x++) {
                                $row = $result->fetch_assoc();
                                $stuid = $row["stuid"];
                                $name = $row["stuname"];
                                $email = $row["stuemail"];
                                $idnum = $row["studidnum"];
                                $dob = $row["studob"];
                                $tel = $row["stutel"];

                                echo '<tr>
                                    <td> &nbsp;' .
                                    substr($name, 0, 35)
                                    . '</td>
                                    <td>
                                    ' . substr($idnum, 0, 12) . '
                                    </td>
                                    <td>
                                        ' . substr($tel, 0, 10) . '
                                    </td>
                                    <td>
                                    ' . substr($email, 0, 20) . '
                                    </td>
                                    <td>
                                    ' . substr($dob, 0, 10) . '
                                    </td>
                                    <td >
                                    <div style="display:flex;justify-content: center;">
                                    
                                    <a href="?action=view&id=' . $stuid . '" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">View</font></button></a>
                                
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
            $sqlmain = "select * from student where stuid='$id'";
            $result = $database->query($sqlmain);
            $row = $result->fetch_assoc();
            $name = $row["stuname"];
            $email = $row["stuemail"];
            $idnum = $row["studidnum"];
            $dob = $row["studob"];
            $tele = $row["stutel"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="students.php">&times;</a>
                        <div class="content">

                        </div>
                        <div style="display: flex;justify-content: center; ">
                        <div class="abc">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin-bottom: 3;text-align: left;font-size: 25px;font-weight: 500;">View Details.</p>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">ID: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    Stu-' . $id . '<br><br>
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
                                    <label for="studidnum" class="form-label">Student ID Number: </label>
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
                                    <label for="name" class="form-label">Date of Birth: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    ' . $dob . '<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="student.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
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
        };

        ?>
    </div>


    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>