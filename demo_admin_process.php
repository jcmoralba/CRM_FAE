<?php
require_once('includes/connect.php');

if (isset($_POST['aprroved'])) {
    $prospect_id = $_POST['prospect_id'];
    echo $prospect_id;
    $sql = "UPDATE `new_prospect` SET `stat_id`='2' WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    header("location:demo_admin.php?aprroved");
}

if (isset($_POST['declined'])) {
    $prospect_id = $_POST['prospect_id'];

    $sql = "UPDATE `new_prospect` SET `stat_id`='3' WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    header("location: demo_admin.php?declined");
    exit();
}
