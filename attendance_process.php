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

  if (isset($_POST['time_in'])) {
    $time_in = $_POST['date_time'];
    $account_id = $_SESSION['user'];

    // format timein
    $formatted_time_in = date('l, F j, Y \a\t g:i a', strtotime($time_in));

    $sql = "SELECT * FROM attendance WHERE account_name = '$account_id' AND timeout_datetime IS NULL ORDER BY attendance_id DESC LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
      $sql = "INSERT INTO attendance (account_name, timein_datetime) VALUES ('$account_id','$time_in')";
      $stmt = $con->prepare($sql);
      $stmt->execute();

      // Sweetalert for timein with formatted date and time
      echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: 'Time In Successful',
                  html: 'You have successfully clocked in on <strong>$formatted_time_in</strong>',
                }).then(() => {
                  window.location.href = 'event-calendar.php';
                });
              </script>";
    } else {
      // Sweetalert validation kapag nag timein na
      echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'You have already clocked in.',
                }).then(() => {
                  window.location.href = 'event-calendar.php';
                });
              </script>";
    }

    exit();
  } else if (isset($_POST['time_out'])) {
    if (!isset($_SESSION['user'])) {
      echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'You need to log in first.',
                }).then(() => {
                  window.location.href = 'login.php'; // Redirect to login page
                });
              </script>";
      exit();
    }
    $time_out = $_POST['date_time'];
    $account_id = $_SESSION['user'];

    // check ng data kapag nag login na
    $sql = "SELECT * FROM attendance WHERE account_name = '$account_id' AND timeout_datetime IS NULL ORDER BY attendance_id DESC LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (empty($result)) {
      // sweetalert kapag di pa nagllogin
      echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'You have not clocked in yet.',
                }).then(() => {
                  window.location.href = 'event-calendar.php'; // Redirect to event-calendar page
                });
              </script>";
      exit();
    }

    //format date
    $formatted_time_out = date('l, F j, Y \a\t g:i a', strtotime($time_out));

    // Update the database with time out
    $sql = "UPDATE attendance SET timeout_datetime = '$time_out' WHERE account_name = '$account_id' AND timeout_datetime IS NULL ORDER BY attendance_id DESC LIMIT 1";
    $stmt = $con->prepare($sql);
    $stmt->execute();

    // Sweetalert for timeout
    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Time Out Successful',
              html: 'You have successfully clocked out on <strong>$formatted_time_out</strong>',
            }).then(() => {
              window.location.href = 'event-calendar.php';
            });
          </script>";

    exit();
  }
  ?>

</body>

</html>