<?php
//echo "conn page";
$host=<Enter DB URL>;
$unm=<Enter DB Username>;
$pass=<Enter DB Password>;
$dbnm=<Enter Databasename>;
$conn=mysqli_connect($host,$unm,$pass,$dbnm);

if(mysqli_connect_errno()){
    echo "Failed to connect to database";
    exit();
}

?>