
<?php
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $idnum=$_POST['counidnum'];
        $oldemail=$_POST["oldemail"];
        $spec=$_POST['spec'];
        $email=$_POST['email'];
        $tel=$_POST['tel'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $database->query("select counsellor.counid from counsellor inner join webuser on counsellor.counemail=webuser.email where webuser.email='$email';");

            if($result->num_rows==1){
                $id2=$result->fetch_assoc()["counid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
                    
            }else{

                $sql1="update counsellor set counemail='$email',counname='$name',counpassword='$password',counidnum='$idnum',countel='$tel',specialties=$spec where counid=$id ;";
                $database->query($sql1);
                
                $sql1="update webuser set email='$email' where email='$oldemail' ;";
                $database->query($sql1);
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        
        $error='3';
    }
    

    header("location: counsellor.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>