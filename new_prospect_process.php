<?php   
    require_once("includes/connect.php");    
?>

<?php

if (isset($_POST['savedata'])) {
    $comp_name = $_POST['comp_name'];
    $item_deal = $_POST['item_deal'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $pdf = $_POST['pdf'];
 

        $sql = "INSERT INTO `new_prospect`(`company_name`, `item_deals`, `status`, `remark`, `pdf`) VALUES ('$comp_name','$item_deal','$status','$remark','$pdf')";
        // $data=array($name,$address,$number);
        $stmt=$con->prepare($sql);
        $stmt->execute();
      
           header("Location: new_prospect.php");
    
}

if (isset($_POST['updatedata'])) {
    $prospect_id = $_POST['prospect_id'];
    $comp_name = $_POST['comp_name'];
    $item_deal = $_POST['item_deal'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $pdf = $_POST['pdf'];
    
        $sql = "UPDATE `new_prospect` SET `company_name`='$comp_name', `item_deals`='$item_deal', `status`='$status', `remark`='$remark', `pdf`='$pdf' WHERE `prospect_id`='$prospect_id'"; 
        $stmt=$con->prepare($sql);
        $stmt->execute();
      
           header("Location: new_prospect.php");
}

if (isset($_POST["deletedata"])) {
    $prospect_id= $_POST['prospect_id'];

    $sql = "DELETE FROM `new_prospect` WHERE `prospect_id`='$prospect_id'"; 
    $stmt=$con->prepare($sql);
    $stmt->execute();
  
       header("Location: new_prospect.php");
}
