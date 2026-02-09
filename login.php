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
<div class="auth-container">
    <h2>Login</h2>
<form method="post">
    <input type="email" name="email" placeholder="email" required><br><br>
    <input type="password" name="password" placeholder="password" required><br><br>
    <button name="login">Login</button>
</form>
</body>
</html>
