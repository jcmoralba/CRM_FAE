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

  <style>

  </style>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
    
      <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    import Swal from 'sweetalert2'
  </script>
  <script>
      function formatNumber(n) {
        // format number 1000000 to 1,234,567
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      }

      function formatCurrency(input, currency, blur) {
        // appends $ to value, validates decimal side
        // and puts cursor back in right position.
        // get input value
        var input_val = input.value;
        // don't validate empty input
        if (input_val === "") {
          return;
        }

        // original length
        var original_len = input_val.length;

        // initial caret position
        var caret_pos = input.selectionStart;

        // check for decimal
        if (input_val.indexOf(".") >= 0) {
          // get position of first decimal
          // this prevents multiple decimals from
          // being entered
          var decimal_pos = input_val.indexOf(".");

          // split number by decimal point
          var left_side = input_val.substring(0, decimal_pos);
          var right_side = input_val.substring(decimal_pos);

          // add commas to left side of number
          left_side = formatNumber(left_side);

          // validate right side
          right_side = formatNumber(right_side);

          // On blur make sure 2 numbers after decimal
          if (blur === "blur") {
            right_side += "00";
          }

          // Limit decimal to only 2 digits
          right_side = right_side.substring(0, 2);

          // join number by .
          input_val = currency + left_side + "." + right_side;
        } else {
          // no decimal entered
          // add commas to number
          // remove all non-digits
          input_val = formatNumber(input_val);
          input_val = currency + input_val;

          // final formatting
          if (blur === "blur") {
            input_val += ".00";
          }
        }

        // send updated string to input
        input.value = input_val;

        // put caret back in the right position
        var updated_len = input_val.length;
        caret_pos = updated_len - original_len + caret_pos;
        input.setSelectionRange(caret_pos, caret_pos);
      }
    </script>
  <?php
  $updated = $_GET['updated'] ?? null;
  $added = $_GET['added'] ?? null;
  if ($updated == 'success') {
    ?>
    <script>
      Swal.fire({
        title: "Good job!",
        text: "You successfully updated the data",
        icon: "success"
      }).then((result) => {
        window.location = "new_prospect.php";
      });
    </script>
    <?php
  }
  if ($added == 'success') {
    ?>
    <script>
      Swal.fire({
        title: "Good job!",
        text: "You successfully added new prospect",
        icon: "success"
      }).then((result) => {
        window.location = "new_prospect.php";
      });
    </script>
    <?php
  }
  ?>
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
          <button
            class="px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none border border-gray-900"
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
                    echo " <a href='{$row['pdf']}>' target='_blank'>LINK</a>";
                  }
                ?>
              </td>
              <td class="border border-black px-4 py-2">
                <button data-bs-target="#view_prospect<?php echo $row['prospect_id']; ?>" 
                  class="btn btn-info" data-bs-toggle="modal" type="button">
                    <span class="glyphicon glyphicon-edit"></span> View
                </button>
                <button data-modal-target="edit-modal" data-modal-toggle="edit-modal<?php echo $row['prospect_id']; ?>"  
                  class="select-none rounded-lg bg-amber-500 text-black py-2 px-4 text-xs font-bold uppercase shadow-md transition-all hover:shadow-lg hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                    Edit
                </button>
                <button data-modal-target="delete-modal" data-modal-toggle="delete-modal<?php echo $row['prospect_id']; ?>" 
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
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Static modal
          </h3>
          <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="static-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Add new Record</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5 space-y-4">
          <form action="new_prospect_process.php" method="POST">
            <div class="mb-6">
              <label for="comp_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Company
                Name</label>
              <input type="text" id="comp_name" name="comp_name"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Company Name" required />
            </div>
            <div class="mb-6">
              <label for="item_deal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Item
                Deals</label>
              <input type="text" id="item_deal" name="item_deal"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Item Deals" required />
            </div>
            <?php
              $sql1 = "SELECT * FROM status";
              $stmt1 = $con->prepare($sql1);
              $stmt1->execute();
              $data1 = $stmt1->fetchAll();
            ?>
            <div class="mb-6">
              <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                status</label>
              <select id="status" name="status"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value=""></option>
                <?php foreach ($data1 as $row1) { ?>
                  <option value="<?= htmlspecialchars($row1['status_name']) ?>">
                    <?= htmlspecialchars($row1['status_name']) ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-6">
              <label for="total_sales" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Total
                Sales</label>
              <input type="text" id="total_sales" name="total_sales"  onBlur="formatCurrency(this, '₱ ', 'blur');"
            onkeyup="formatCurrency(this, '₱ ');"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="₱ #,###.00" required />
            </div>

            <div class="mb-6">
              <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Remarks</label>
              <input type="text" id="remark" name="remark"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Remarks" required />
            </div>
            <div class="mb-6">
              <label for="remark" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">PDF Link</label>
              <input type="text" id="remark" name="remark"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="PDF" required />
            </div>
            <button type="submit" name="savedata"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="vendors/sweetalert2/dist/sweetalert2.min.js"></script>
  <script src="js/sweetalert.js"></script>

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

const displayFileName = (input) => {
    if (input.files && input.files[0]) {
        const fileName = input.files[0].name;
        document.getElementById('selected-file').classList.remove('hidden');
        document.getElementById('file-name').innerText = fileName;
    }
};

  </script>
 <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>


</body>

</html>