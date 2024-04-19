<?php  ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style_index_1.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <div class="main">
    <div class="topbar" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
      <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
      </div>

      <h5 >
        <?php 
       echo  $_SESSION["user"] ?? "noname";
        // echo " id:" . $_SESSION["user_id"] ?? '0';
        ?>
      </h5>
      <input id="user1" type="hidden" value="<?php echo  $_SESSION["user"] ?? "noname"; ?>">
      <div class="user">
     
        <img src="imgs/customer01.jpg" alt="">
      </div>
    </div>


    <script src="js/main.js"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
      function login(){

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
  window.location="login.php";

});
      
    }
    </script>

</body>

</html>