<?php
include"db_connect.php";
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
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
