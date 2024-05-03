<?php
// require_once 'includes/connect.php';
?>
<?php

// if(isset($_POST['time_in'])) {
//     $time_in = $_POST['date_time'];
    // $user = $_SESSION['user']; // assuming the user is stored in the $_SESSION array

//     $sql = "INSERT INTO attendance ( `timein_datetime`) VALUES ('$time_in')";
//     $stmt = $con->prepare($sql);
//     $stmt->execute();

//     header("Location: event-calendar.php");
//     exit();
// }
?>

<?php
session_start();

require_once 'includes/connect.php';
?>
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

if(isset($_POST['time_in'])) {
    $time_in = $_POST['date_time'];
    $account_id = $_SESSION['user']; 

    $sql = "SELECT * FROM attendance WHERE account_name = '$account_id' AND timeout_datetime IS NULL ORDER BY attendance_id DESC LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
        $sql = "INSERT INTO attendance (account_name, timein_datetime) VALUES ('$account_id','$time_in')";
        $stmt = $con->prepare($sql);
        $stmt->execute();
    } else {
        echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'You have already clocked in.',
                })
              </script>";
    }

    header("Location: event-calendar.php");
    exit();
} else if(isset($_POST['time_out'])) {
    $time_out = $_POST['date_time'];
    $account_id = $_SESSION['user']; 

    $sql = "UPDATE attendance SET timeout_datetime = '$time_out' WHERE account_name = '$account_id' AND timeout_datetime IS NULL ORDER BY attendance_id DESC LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    header("Location: event-calendar.php");
    exit();
}
?>

<script>
Swal.fire({
  title: "Custom width, padding, color, background.",
  width: 600,
  padding: "3em",
  color: "#716add",
  background: "#fff url(/images/trees.png)",
  backdrop: `
    rgba(0,0,123,0.4)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
});

</script>
    
</body>
</html>