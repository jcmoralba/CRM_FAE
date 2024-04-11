<?php
include("sidebar.php");
include "navbar.php";
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


  <!-- SA LINK NA TO NASISIRA YUNG SIDEBAR, COMMENT KO MUNA, BALI YUNG VIEW BUTTON WALA PANG DESIGN -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  -->

</head>
<body class="bg-gray-100 ">

  <form id="form_id" action="index.php" method="POST">

  </form>
  <?php
  // include "new_prospect_update.php";
  ?>
  <div class="ml-64">
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
          <button id="printTableButton" class="px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none border-gray-900" type="button">
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
          $sql = "SELECT * FROM new_prospect WHERE `status` != 'Close Deals'";
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
                  }
                  else{
                    echo "<u> <a href='{$row['pdf']}>' target='_blank'>LINK</a> </u>";
                  }
                ?>
              </td>
              <td class="border border-black px-4 py-2">
                <button data-bs-target="#view_prospect<?php echo $row['prospect_id']; ?>" 
                  class="btn btn-info" data-bs-toggle="modal" type="button">
                    <span class="glyphicon glyphicon-edit"></span> View
                </button>
                <button data-modal-target="edit-modal<?php echo $row['prospect_id']; ?>" data-modal-toggle="edit-modal<?php echo $row['prospect_id']; ?>"  
                  class="select-none rounded-lg bg-amber-500 text-black py-2 px-4 text-xs font-bold uppercase shadow-md transition-all hover:shadow-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                    Edit
                </button>
                <button data-modal-target="delete-modal<?php echo $row['prospect_id']; ?>" data-modal-toggle="delete-modal<?php echo $row['prospect_id']; ?>" 
                  class="select-none rounded-lg bg-red-500 text-black py-2 px-4 text-xs font-bold uppercase shadow-md transition-all hover:shadow-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                    Delete
                </button>
              </td>
            </tr>
            <?php
            include 'new_prospect_update.php';
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Main modal -->
  <div id="static-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow ">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
          <h3 class="text-xl font-semibold text-gray-900 text-black">
            New prospect 
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
            data-modal-hide="static-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only text-black">Add new Record</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4">
          <form action="new_prospect_process.php" method="POST">
            <div class="mb-6">
              <label for="comp_name" class="block mb-2 text-sm font-medium text-gray-900 ">Company
                Name</label>
              <input type="text" id="comp_name" name="comp_name"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Company Name" required />
            </div>
            <div class="mb-6">
              <label for="item_deal" class="block mb-2 text-sm font-medium text-gray-900 ">Item
                Deals</label>
              <input type="text" id="item_deal" name="item_deal"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Item Deals" required />
            </div>
            <?php
              $sql1 = "SELECT * FROM status";
              $stmt1 = $con->prepare($sql1);
              $stmt1->execute();
              $data1 = $stmt1->fetchAll();
            ?>
            <div class="mb-6">
              <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select an
                status</label>
              <select id="status" name="status"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  ">
                <option value=""></option>
                <?php foreach ($data1 as $row1) { ?>
                  <option value="<?= htmlspecialchars($row1['status_name']) ?>">
                    <?= htmlspecialchars($row1['status_name']) ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-6">
              <label for="total_sales" class="block mb-2 text-sm font-medium text-gray-900 ">Total
                Sales</label>
              <input type="text" id="total_sales" name="total_sales"  onBlur="formatCurrency(this, '₱ ', 'blur');"
            onkeyup="formatCurrency(this, '₱ ');"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                placeholder="₱ #,###.00" required />
            </div>
            <div class="mb-6">
              <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 ">Remarks</label>
              <input type="text" id="remark" name="remark"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="Remarks" required />
            </div>
            <div class="mb-6">
              <label for="pdf" class="block mb-2 text-sm font-medium text-gray-900 ">PDF Link</label>
              <input type="text" id="pdf" name="pdf"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                placeholder="PDF" required />
            </div>
            <button type="submit" name="savedata"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit
            </button>
          </form>
        </div>
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
    document.querySelectorAll('[id^="modal"]').forEach(function(modal) {
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
    window.onload = function() {
      if (window.location.search.includes('added=success') || window.location.search.includes('updated=success')) {
        history.replaceState({}, document.title, window.location.pathname);
      }
    };
  </script>
<?php
}
?>
</body>

</html>