<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body{
            <background:linear-gradient>(135deg,#4caf50,#81c784);
            font-family:arial,sans-serif;
        }
        .auth-container{
            width:360px;
            margin:80px auto;
            background: id="fffff";
            padding:30px;
            border-radius:10px;
            box-shadow:0 15px 30px rgba(0,0,0,0.3);
            animation:fadeIn 1s;

        }
        .auth-container h2{
            text-align:center;
            color:#2e7d32;
        }
        .auth-container input{
            width:100%;
            padding:12px;
            margin-top:12px;
            border-radius:6px;
            border:1px solid #ccc;
            font-size:14px;
        }
        .auth-container button{
            width:100%;
            padding:12px;
            margin-top:18px;
            background:#4caf50;
            color:white;
            border-radius:6px;
            border:none;
            font-size:16px;
            cursor:pointer;

        }
        .auth-container buttton:hover{
            background:#388E3C;
        }
        @keyframes fadeIn{
            from{opacity:0;transform:translateY(20px);}
            to{opacity:1;transform:translateY(0px);}
        }
    </style>
    </head>
<body>

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
<div class="auth-container">
    <h2>Register</h2>
<form method="post">
    <input type="text" name="username" placeholder="username" required><br><br>
    <input type="email" name="email" placeholder="email" required><br><br>
    <input type="password" name="password" placeholder="password" required><br><br>
    <button name="register">Register</button>
</form>
</body>
</html>