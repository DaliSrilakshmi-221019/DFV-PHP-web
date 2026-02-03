<?php
include "db_connect.php";
if(isset($_POST['register']))
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
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