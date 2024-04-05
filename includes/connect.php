<?php
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