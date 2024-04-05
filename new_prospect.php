<?php
include "sidebar.php";
include "navbar.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title>
  <script src="https://cdn.tailwindcss.com"></script>
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

<body class="bg-gray-100">

<form id="form_id" action="index.php" method="POST">

</form>
  <?php
  // include "new_prospect_update.php";
  ?>
  <div class="ml-64">

  <button id="button1" onclick="showAlert()">test</button>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <p class="text-2xl font-bold mb-4">New Prospect</p>
    </div>
    <div class="relative h-32 w-32 ...">

      <button data-modal-target="static-modal" data-modal-toggle="static-modal"
        class="ml-30 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Add client
      </button>
    </div>

    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <table id="example" class="table-auto w-full">
        <thead>
          <tr>
            <th class="px-4 py-2">COMPANY NAME</th>
            <th class="px-4 py-2">ITEM DEALS</th>
            <th class="px-4 py-2">STATUS</th>
            <th class="px-4 py-2">REMARKS</th>
            <th class="px-4 py-2">PDF LINK</th>
            <th class="px-4 py-2">ACTION</th>
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
              <td class="border px-4 py-2">
                <?php echo $row['company_name']; ?>
              </td>
              <td class="border px-4 py-2">
                <?php echo $row['item_deals']; ?>
              </td>
              <td class="border px-4 py-2">
                <?php echo $row['status']; ?>
              </td>
              <td class="border px-4 py-2">
                <?php echo $row['remark']; ?>
              </td>
              <td class="border px-4 py-2">
                <?php echo $row['pdf']; ?>
              </td>
              <td class="border px-4 py-2">
                <button class="btn btn-info" data-bs-toggle="modal" type="button"
                  data-bs-target="#view_prospect<?php echo $row['prospect_id']; ?>"><span
                    class="glyphicon glyphicon-edit"></span> View</button>

                <button class="btn btn-warning" data-bs-target="#update_prospect<?php echo $row['prospect_id']; ?>"
                  type="button" data-bs-toggle="modal"><span class="glyphicon glyphicon-edit"></span> Edit</button>



                <button class="btn btn-danger" data-bs-toggle="modal" type="button"
                  data-bs-target="#delete_prospect<?php echo $row['prospect_id']; ?>"><span
                    class="glyphicon glyphicon-edit"></span> Delete</button>

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
  <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
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
            <!-- <div class="mb-6">
              <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                status</label>
              <select id="status" name="status"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Choose a status</option>
                <option value="Prospecting">Prospecting</option>
                <option value="Make contact">Make contact</option>
                <option value="Qualify your prospect">Qualify your prospect</option>
                <option value="Nurture your prospect">Nurture your prospect</option>
                <option value="Present your offer">Present your offer</option>
                <option value="Overcome objections">Overcome objections</option>
                <option value="Close the sales">Close the sales</option>
              </select>
            </div> -->


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
              <div class="flex items-center justify-center w-full">
                <label for="dropzone-file"
                  class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                  <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                        upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    <p id="selected-file" class="hidden mb-2 text-sm text-gray-500 dark:text-gray-400">Selected file:
                      <span id="file-name"></span>
                    </p>
                  </div>
                  <input id="dropzone-file" type="file" name="pdf" class="hidden" onchange="displayFileName(this)" />
                </label>
              </div>
            </div>
            <!-- More form fields -->
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