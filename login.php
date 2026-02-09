<?php
include"db_connect.php";
if(isset($_POST['login'])){
    //-----1.get input--------
    $email=$_POST['email'];
    $password=$_POST['password'];

    //-----2.clean strings-----
    $email=trim($email);
    $password=trim($password);
    $email=strtolower($email);


    //------validate--------
    if(strlen($email)<5){
        die("invalid email format");
    }
    if(strpos($email,"@")===false){
        die("invalid email format");
    }

    //------security------------
    $email=htmlspecialchars($email);
    $email=addslashes($email);

    //database

    $sql="select * from users where email='$email'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1){
        $row=mysqli_fetch_assoc($result);
        if (password_verify($password,$row['passsword'])){
            echo"login successful";

        }   else{
                echo "wrong passwword";
            }
    }
        else
        {
         echo "user not found";
        }
    }

?>
<form method="post">
    <input type="email" name="email" placeholder="email" required><br><br>
    <input type="password" name="password" placeholder="password" required><br><br>
    <button name="login">Login</button>
</form>
