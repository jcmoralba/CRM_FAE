<?php
session_start();
require_once("includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style_index_1.css">

</head>

<body>
  <div class="navigation">
    <ul>
    <li>
          <a class="navbar-brand" href="">
          <img src="img/hytecpower1.png" width="70px" height="auto" class="d-inline-block" alt="">
            <span class="title">Hytec Power Inc</span>
          </a>
        </li>
      </li>

      <li>
        <a href="new_index.php">
          <span class="icon">
            <ion-icon name="home-outline"></ion-icon>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>

      <li>
        <a href="client_list.php">
          <span class="icon">
            <ion-icon name="people-outline"></ion-icon>
          </span>
          <span class="title">Client List</span>
        </a>
      </li>

      <li>
        <a href="new_prospect.php">
          <span class="icon">
            <ion-icon name="chatbubble-outline"></ion-icon>
          </span>
          <span class="title">New Prospect</span>
        </a>
      </li>

      <li>
        <a href="event-calendar.php">
          <span class="icon">
          <ion-icon name="document-text-outline"></ion-icon>

          </span>
          <span class="title">Itinerary</span>
        </a>
      </li>
     
    </ul>
  </div>
  <?php include 'navbar.php'; ?>
  <script src="js/main.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
  function logout(){
    Swal.fire({
  title: "Are you sure you want to logout?",
  text: "",
  icon: "question",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes"
}).then((result) => {
  if (result.isConfirmed) {
    window.location = "login_process.php";
  }
});

  }
</script>
</body>

</html>