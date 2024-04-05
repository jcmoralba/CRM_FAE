<?php
include "sidebar.php";
include "navbar-TEST.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    /* Adjust the position of the search bar */
    .dataTables_filter {
      float: right;
      /* Align to the right */
      margin-bottom: px;
      /* Optional: Add some space below the search bar */
    }
  </style>

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
                  data-bs-target="#delete_prospect<?php echo $row['prospect_id']; ?>"><span
                    class="glyphicon glyphicon-edit"></span> View</button>

                <button class="btn btn-warning" data-bs-toggle="modal" type="button"
                  data-bs-target="#update_prospect<?php echo $row['prospect_id']; ?>"><span
                    class="glyphicon glyphicon-edit"></span> Edit</button>
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
              <label for="total_sales" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Total Sales</label>
              <input type="text" id="total_sales" name="total_sales"
                class="bg-gray-50 border border-gray-300 text-black text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:white dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Total Sales" required />
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
    });

    // show the selected file
    const displayFileName = (input) => {
      if (input.files && input.files[0]) {
        const fileName = input.files[0].name;
        document.getElementById('selected-file').classList.remove('hidden');
        document.getElementById('file-name').innerText = fileName;
      }
    };
  </script>

</body>

</html>