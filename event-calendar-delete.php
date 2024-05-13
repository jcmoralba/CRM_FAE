

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php 
require_once('db-connect.php');
if(!isset($_GET['id'])){
    echo "<script> alert('Undefined Schedule ID.'); location.replace('event-calendar.php') </script>";
    $conn->close();
    exit;
}

$delete = $conn->query("DELETE FROM `schedule_list` where id = '{$_GET['id']}'");
if($delete){
    ?>
     <script>
        // Display success message with SweetAlert
        Swal.fire({
            icon: "warning",
            title: "Delete event sucessfully",
            showConfirmButton: false,
        });
        setTimeout(function() {
            window.location.href = "event-calendar.php";
        }, 1500);
    </script>
    <?php
    //echo "<script> alert('Event has deleted successfully.'); location.replace('event-calendar.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();

?>
</body>
</html>