<?php
session_start();
include ("sidebar.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title>

  <link rel="stylesheet" href="css/datatable.css">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

  <script src="https://cdn.tailwindcss.com"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- SA LINK NA TO NASISIRA YUNG SIDEBAR, COMMENT KO MUNA, BALI YUNG VIEW BUTTON WALA PANG DESIGN -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  -->

</head>

<body class="bg-gray-100 ">

  <form id="form_id" action="index.php" method="POST">

  </form>
  <?php
  // include "new_prospect_update.php";
  ?>
  
    <div class=" mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <p class="text-2xl font-bold text-black">Prospect</p>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-white">
      <div class="flex justify-between items-center mb-4">
        <p class="text-xl text-gray-600">List of Prospect</p>
        <div class="flex space-x-4">
          <button data-modal-target="static-modal" data-modal-toggle="static-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Add client
          </button>
          <button id="printTableButton"
            class="px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none border-gray-900"
            type="button">
            Print
          </button>
        </div>
      </div>

      <table id="example" class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2 bg-slate-900 text-white">COMPANY NAME</th>
            <th class="px-4 py-2 bg-slate-900 text-white">ITEM DEALS</th>
            <th class="px-4 py-2 bg-slate-900 text-white">STATUS</th>
            <th class="px-4 py-2 bg-slate-900 text-white">REMARKS</th>
            <th class="px-4 py-2 bg-slate-900 text-white">PDF LINK</th>
            <th class="px-4 py-2 bg-slate-900 text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM new_prospect WHERE `status` = 'Close Deals'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch()) {
            ?>
            <tr>
              <td class="border border-black px-4 py-2">
                <?php echo $row['company_name']; ?>
              </td>
              <td class="border border-black py-2">
                <?php echo $row['item_deals']; ?>
              </td>
              <td class="border border-black px-4 py-2">
                <?php echo $row['status']; ?>
              </td>
              <td class="border border-black px-4 py-2">
                <?php echo $row['remark']; ?>
              </td>
              <td class="border border-black px-4 py-2">
                <?php
                if (strlen($row['pdf']) == 0) {
                  echo " ";
                } else {
                  echo "<u> <a href='{$row['pdf']}>' target='_blank'>LINK</a> </u>";
                }
                ?>
              </td>
              <td class="border border-black px-4 py-2">

           
              
                <button type="button" id="buttons" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="view()">
                  User details
                  <!-- <?php 
                  $_SESSION['prospect-id'] = $row['prospect_id'];
                  ?> -->
                </button>
              </td>
            </tr>
            <?php
            // include 'client_list2_update.php';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class="container">

    <div class="height d-flex justify-content-center align-items-center">

      <!-- <button type="button" id="buttons" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="view()" >
        User details
      </button> -->


    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header float-right">
          <h5>User details</h5>
          <div class="text-right">
            <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
          </div>
        </div>
        <div class="modal-body">

            <?php 
         
          echo $_SESSION['prospect-id'] ;
            ?>
          
          <div>

            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Samso</td>
                  <td>Natto</td>
                  <td>@samso</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Tinor</td>
                  <td>Horton</td>
                  <td>@tinor_har</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Mythor</td>
                  <td>Bully</td>
                  <td>@myth_tobo</td>
                </tr>
              </tbody>
            </table>

          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

  <script src="js/print-table.js"></script> <!-- print js | walang desiGN -->
  <script src="js/new_prospect.js"></script> <!-- yung format nandito na yung sa peso -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script>
    $(document).ready(function () {
      $('#example').DataTable({
        // Add any customization options here
      });

      // JavaScript to hide all modals when the page loads
      document.querySelectorAll('[id^="modal"]').forEach(function (modal) {
        modal.classList.add("hidden");
      });

      // Add event listener to all modal toggle buttons to show the respective modal when clicked
      document.addEventListener("click", function (event) {
        if (event.target.matches('[data-modal-toggle]')) {
          var targetModalId = event.target.getAttribute("data-modal-toggle");
          var modal = document.getElementById(targetModalId);
          if (modal) {
            modal.classList.remove("hidden");
          }
        }
      });
    });
  </script>



  <!-- SWEETALERT ADD AND EDIT -->
  <?php
  // Check if 'added' parameter is set and has the value 'success' after adding new data
// Check if 'updated' parameter is set and has the value 'success' after updating data
  if ((isset($_GET['added']) && $_GET['added'] === 'success') || (isset($_GET['updated']) && $_GET['updated'] === 'success')) {
    ?>
    <script>
      // Show SweetAlert2 alert based on the parameter present in the URL
      Swal.fire({
        title: "Success!",
        text: <?php echo (isset($_GET['added']) && $_GET['added'] === 'success') ? '"You successfully added a new prospect"' : '"You successfully updated the prospect"'; ?>,
        icon: "success",
        confirmButtonText: "OK"
      });

      // Remove the parameter from the URL
      window.onload = function () {
        if (window.location.search.includes('added=success') || window.location.search.includes('updated=success')) {
          history.replaceState({}, document.title, window.location.pathname);
        }
      };
    </script>
    <?php
  }
  ?>
</body>

<script>
  function view(){
    
    document.getElementById("buttons").value = "newButtonValue";

// $('#exampleModal').modal('show');

  }
</script>

</html>