<?php

use function PHPSTORM_META\sql_injection_subst;

require_once("includes/connect.php");
?>

<?php

if (isset($_POST['savedata'])) {
    $comp_name = $_POST['comp_name'];
    $item_deal = $_POST['item_deal'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $pdf = $_POST['pdf'];
    $total_sale = $_POST['total_sales'];
    $total_sale = preg_replace('/[^0-9.]/', '', $total_sale);
    $date_now =  date("Y-m-d H:i:s");
    $user_id =   $_POST["user_id"] ?? '0';
    $date_added = date("Y/m/d");


    $sql = "INSERT INTO `new_prospect`(`company_name`, `item_deals`, `status`, `pdf`, `total_sales`,`last_contacted`, `account_id`,`date_added`,`stat_id`) VALUES ('$comp_name','$item_deal','$status','$pdf','$total_sale','$date_now', '$user_id','$date_added','1')";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    //insert remarks
    sleep(2);
    $sql = "SELECT MAX(prospect_id) AS maxprospect FROM new_prospect";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        $max_prospect = $row['maxprospect'];
    }

    $sql = "INSERT INTO `remarks_history`(`remarks_desc`, `prospect_id`, `date`) VALUES ('$remark','$max_prospect','$date_now')";
    $stmt = $con->prepare($sql);
    $stmt->execute();




    header("Location: new_prospect.php?added=success");
    exit();
}

if (isset($_POST['updatedata'])) {
    $prospect_id = $_POST['prospect_id'];
    $comp_name = $_POST['comp_name'];
    $item_deal = $_POST['item_deal'];
    $status = $_POST['status'];
    $remark = $_POST['remark'];
    $pdf = $_POST['pdf'];
    $total_sale = $_POST['total_sales'];
    $total_sale = preg_replace('/[^0-9.]/', '', $total_sale);
    $date_now =  date("Y-m-d H:i:s");



    $sql = "UPDATE `new_prospect` SET `company_name`='$comp_name', `item_deals`='$item_deal', `status`='$status', `remark`='$remark', `pdf`='$pdf', `total_sales`='$total_sale', `last_contacted`='$date_now' WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    //delete current deals

    $sql = "DELETE FROM `item_deals` WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    //update deals
    $array = $_POST['name'];


    // Prepare the SQL INSERT statement
    $stmt = $con->prepare("INSERT INTO item_deals (name, prospect_id) VALUES (:name, :prospect_id)");
    // Execute the statement for each element in the array
    foreach ($array as $value) {
        // Bind the parameter and execute the statement
        // echo "|deals:     " .  $value;
        $stmt->bindParam(':name', $value);
        $stmt->bindParam(':prospect_id', $prospect_id);

        $stmt->execute();
    }

    header("Location: new_prospect.php?updated=success");
    exit();
}
if (isset($_POST["add_remarks"])) {
    $prospect_id = $_POST['prospect_id'];
    $remarks = $_POST['remarks'];
    $date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO `remarks_history`(`remarks_desc`, `prospect_id`, `date`) VALUES ('$remarks','$prospect_id','$date')";
    // $data=array($name,$address,$number);
    $stmt = $con->prepare($sql);
    $stmt->execute();

    header("Location: new_prospect.php?updated=success");
    exit();
}

if (isset($_POST["deletedata"])) {
    $prospect_id = $_POST['prospect_id'];

    $sql = "DELETE FROM `new_prospect` WHERE `prospect_id`='$prospect_id'";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    header("Location: new_prospect.php?deleted=success");
    exit();
}
