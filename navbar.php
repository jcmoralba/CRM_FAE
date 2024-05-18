<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style_index_1.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />

  <style>
    .notification-profile-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .dropdown {
      margin-left: 10px; /* Adjust the spacing between notification and profile */
    }
  </style>
</head>

<body>
  <div class="main">
    <div class="topbar" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>

      <div class="notification-profile-container">
        <!-- Notification Dropdown -->
        <div class="dropdown">
          
          <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
            <i class="fas fa-bell"></i>
            <?php
          $sql100 = "SELECT COUNT(id) AS id FROM notif_fae ";
          $stmt100 = $con->prepare($sql100);
          $stmt100->execute();
          while ($row100 = $stmt100->fetch()) {
          ?>
            <span class="badge rounded-pill badge-notification bg-danger"><?php echo $row100['id'] ?></span>
            <?php } ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <?php
          $sql99 = "SELECT * FROM notif_fae ";
          $stmt99 = $con->prepare($sql99);
          $stmt99->execute();
          while ($row99 = $stmt99->fetch()) {
          ?>
            <li>
              <a class="dropdown-item" href="new_prospect.php"><?php echo $row99['details'] ?></a>
            </li>
            <!-- <li>
              <a class="dropdown-item" href="#">Another news</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Something else here</a>
            </li> -->
            <?php } ?>
          </ul>
        </div>

        <!-- Avatar -->
        <div class="dropdown">
          <a data-mdb-dropdown-init class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" aria-expanded="false">
            <img style="margin-right: -15px ;margin-top:-5px;" src="img/sirjohn.jpg" class="rounded-circle" height="35" alt="???" loading="lazy" />
              <lord-icon 
              src="https://cdn.lordicon.com/ifsxxxte.json" trigger="click" colors="primary:#545454" 
              style="width:15px;height: 25px; margin-top: 15px;">
              </lord-icon>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
            <li>
              <a class="dropdown-item" href="profile.php">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>
              <a class="dropdown-item" href="#" onclick="logout();">Logout</a>
            </li>
          </ul>
        </div>


        <!-- Name -->
       <!-- <h5>
          <?php echo $_SESSION["user"] ?? "noname"; ?>
        </h5> -->
        <input id="user1" type="hidden" value="<?php echo  $_SESSION["user"] ?? "noname"; ?>">
        <script src="https://cdn.lordicon.com/lordicon.js"></script>

      </div>

    </div>

    <script src="js/main.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
      function login() {

      }
      let user = document.getElementById("user1").value;

      if (user == "noname") {
        document.body.innerHTML = ``
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "You need to login first! Redirecting to login page now...",
          footer: "Something went wrong!"
        }).then((result) => {
          window.location = "login.php";
        });

      }
    </script>

    <script>
      function logout() {
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
