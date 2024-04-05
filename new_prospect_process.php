<?php
require_once ("includes/connect.php");
?>

<?php

if (isset($_POST['savedata'])) {
    $comp_name = $_POST['comp_name'];
    $item_deal = $_POST['item_deal'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $pdf = $_POST['pdf'];
    $total_sale = $_POST['total_sales'];
    $date_now =  date("Y-m-d H:i:s");


    $sql = "INSERT INTO `new_prospect`(`company_name`, `item_deals`, `status`, `remark`, `pdf`, `total_sales`, `last_contacted`) VALUES ('$comp_name','$item_deal','$status','$remark','$pdf','$total_sale','$date_now')";
    // $data=array($name,$address,$number);
    $stmt = $con->prepare($sql);
    $stmt->execute();

    header("Location: new_prospect.php");

}

if (isset($_POST['updatedata'])) {
    $prospect_id = $_POST['prospect_id'];
    $comp_name = $_POST['comp_name'];
    $item_deal = $_POST['item_deal'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $pdf = $_POST['pdf_file'];
    $total_sale = $_POST['total_sales'];
    $date_now =  date("Y-m-d H:i:s");



    $sql = "UPDATE `new_prospect` SET `company_name`='$comp_name', `item_deals`='$item_deal', `status`='$status', `remark`='$remark', `pdf`='$pdf', `total_sales`='$total_sale', `last_contacted`='$date_now' WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    header("Location: new_prospect.php");
}

if (isset($_POST["deletedata"])) {
    $prospect_id = $_POST['prospect_id'];

    $sql = "DELETE FROM `new_prospect` WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    header("Location: new_prospect.php");
}
