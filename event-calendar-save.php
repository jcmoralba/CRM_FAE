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
if($_SERVER['REQUEST_METHOD'] !='POST'){
    ?>
     <script>
        // Display success message with SweetAlert
        Swal.fire({
            icon: "error",
            title: "No data to save",
            showConfirmButton: false,
        });
        setTimeout(function() {
            window.location.href = "event-calendar.php";
        }, 1500);
    </script>
    <?php
    //echo "<script> alert('Error: No data to save.'); location.replace('event-calendar.php') </script>";
    $conn->close();
    exit;
}
extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `schedule_list` (`title`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$description','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `schedule_list` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}
$save = $conn->query($sql);
if($save){
    ?>
     <script>
        Swal.fire({
            icon: "success",
            title: "Added event sucessfully",
            showConfirmButton: false,
        });

        setTimeout(function() {
            window.location.href = "event-calendar.php";
        }, 1500);
    </script>
    <?php
    // echo "<script>location.replace('event-calendar.php') </script>";
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