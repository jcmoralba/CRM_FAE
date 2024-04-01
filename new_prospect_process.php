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
