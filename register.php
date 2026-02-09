<?php
include "db_connect.php";
if(isset($_POST['register']))
{
    //-------get raw input------
    $username=$_POST['username'];
    $email=$_POST['email'];
     $password=$_POST['password'];

     //-----String Cleaning-----

     $username=trim($username);
    $email=trim($email);
     $password=trim($password);


     $username=strtolower($username);

    //--------String validation
    if(strlen($username)<5){
        die("username must have 5 leeters");
    }
     if(strlen($password)<6){
        die("password must have 5 leeters");
    }
     if(strpos($email,"@")==false){
        die("invalid email");
    }
    //----password hash-------
    $password=password_hash($password,PASSWORD_DEFAULT);

    $sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";
    if(mysqli_query($conn,$sql)){
    echo "user register successfully";
    }
else{
    echo "error";}
}
?>
<form method="post">
    <input type="text" name="username" placeholder="username" required><br><br>
    <input type="email" name="email" placeholder="email" required><br><br>
    <input type="password" name="password" placeholder="password" required><br><br>
    <button name="register">Register</button>
</form>