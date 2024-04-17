<?php  ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style_index_1.css">
</head>

<body>
  <div class="main">
    <div class="topbar" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>
      <h5>
        <?php 
       echo  $_SESSION["user"] ?? 'noname';
        echo " id:" . $_SESSION["user_id"];
        ?>
      </h5>
      <div class="user">
     
        <img src="imgs/customer01.jpg" alt="">
      </div>
    </div>

    <script src="js/main.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>