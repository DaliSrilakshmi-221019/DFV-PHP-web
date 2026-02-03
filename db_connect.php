<?php
$conn=mysqli_connect("localhost","root","","dfv_db");
if($conn){
    echo "database connected successfully";
}
else{
    die("connection failed");
}
?>