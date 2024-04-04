<?php
include ("includes/connect.php");
?>

<?php

if (isset($_POST["register"])) {
    $fname = $_POST["floating_first_name"];
    $lname = $_POST["floating_last_name"];
    $email = $_POST["floating_email"];
    $password = $_POST["floating_password"];
    $password_repeat = $_POST["repeat_password"];
    $phone = $_POST["floating_phone"];
    $department = $_POST["floating_department"];



    if ($password == $password_repeat) {

        $sql = "INSERT INTO `account` (`fname`, `lname`, `email`, `pass`, `number`, `department`) VALUES('$fname','$lname','$email','$password' ,'$phone' ,'$department')";
        // $data=array($name,$address,$number);
        $stmt = $con->prepare($sql);
        $stmt->execute();

        header("Location: login.php?login=sucess");

    } else {
        echo "password dont match!";
    }



}
?>