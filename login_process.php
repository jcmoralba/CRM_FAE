<?php session_start() ?>
<?php

include ("includes/connect.php");

?>

<?php
if (isset($_POST["login"])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `account` WHERE `email`= '$email'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        $email_check = $row["email"];
        $pass_check = $row["pass"];
        $fname =  $row["fname"];
    }

    if ($password == $pass_check) {
        $_SESSION["user"] = $fname; 
        header("location: new_index.php?user=$fname");
      
    } 
    else {
        header("location: login.php?invalid=true");
       
    }
}
?>