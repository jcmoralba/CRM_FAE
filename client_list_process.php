<?php   
    require_once("includes/connect.php");    
?>

<?php 
if (isset($_POST["savedata"])) {
    $comp_name = $_POST['comp_name'];
    $pdf = $_POST['pdf'];
    $last_contacted = $_POST['last_contacted'];
    $remark = $_POST['remark'];
    $total_sale = $_POST['total_sale'];

    $sql = "INSERT INTO `client_list`(`company_name`, `pdf`, `last_contacted`, `remark`, `total_sales`) VALUES ('$comp_name','$pdf','$last_contacted','$remark','$total_sale')";
    $stmt=$con->prepare($sql);
    $stmt->execute();
  
       header("Location: client_list.php");


}

?>