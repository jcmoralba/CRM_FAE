<?php
session_start();
$host = "localhost";
$dbase = "crm";
$dsn = "mysql:host={$host};dbname={$dbase}";
$uname = "root";
$pw = "";


date_default_timezone_set("Singapore");
try {
    $con = new PDO($dsn, $uname, $pw);
    if($con) {
        // echo "connection to database is successful";   
    }
}catch (PDOException $err) {
    echo $err->getMessage();
}

?>


<?php
$host1 = "localhost";
$dbase1 = "test";
$dsn1 = "mysql:host={$host1};dbname={$dbase1}";
$uname1 = "root";
$pw1 = "";


date_default_timezone_set("Singapore");
try {
    $con1 = new PDO($dsn1, $uname1, $pw1);
    if($con1) {
        // echo "connection to database is successful";   
    }
}catch (PDOException $err1) {
    echo $err1->getMessage();
}





?>