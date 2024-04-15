<?php
require_once("includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

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
        <a href="">
          <span class="icon">
            <ion-icon name="logo-apple"></ion-icon>
          </span>
          <span class="title">Hytec Power Inc</span>
        </a>
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
        <a href="schedule.php">
          <span class="icon">
            <ion-icon name="help-outline"></ion-icon>
          </span>
          <span class="title">Itenerary</span>
        </a>
      </li>
    </ul>
  </div>
  <?php include 'navbar.php'; ?>
  <script src="js/main.js"></script>

  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>