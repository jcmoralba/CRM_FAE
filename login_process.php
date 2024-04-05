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
    }

    if ($password == $pass_check) {
        header("location: index.php");
    } 
    else {
        header("location: login.php?invalid=true");
       
    }
}
?>