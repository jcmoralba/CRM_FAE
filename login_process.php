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
        $user_id =  $row["account_id"];
    }

    if ($password == $pass_check) {
        $_SESSION["user"] = $fname ?? 'no account' ; 
        $_SESSION["user_id"] = $user_id ?? '0' ; 
        header("location: new_index.php?user=$fname");
      
    } 
    else {
        header("location: login.php?invalid=true");
       
    }
}
else{
    session_destroy();
    header("location: login.php");

}
?>