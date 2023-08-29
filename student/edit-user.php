<?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $idnum=$_POST['studidnum'];
        $oldemail=$_POST["oldemail"];
        $email=$_POST['email'];
        $tele=$_POST['tel'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';

            $sqlmain= "select student.stuid from student inner join webuser on student.stuemail=webuser.email where webuser.email=?;";
            $stmt = $database->prepare($sqlmain);
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $result = $stmt->get_result();
            //$resultqq= $database->query("select * from doctor where docid='$id';");
            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["stuid"];
            }else{
                $id2=$id;
            }
            

            if($id2!=$id){
                $error='1';
                
                    
            }else{

                
                $sql1="update student set stuemail='$email',stuname='$name',stupassword='$password',studidnum='$idnum',stutel='$tele' where stuid=$id ;";
                $database->query($sql1);
                echo $sql1;
                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);
                echo $sql1;
                
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: setting.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>