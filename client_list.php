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
      <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.6/dist/tailwind.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  </head>

<body class="bg-gray-100 font-sans antialiased">
  <div class="ml-64">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <h2 class="text-2xl font-bold mb-4">Client List</h2>
          <table id="clientTable" class="table-auto w-full border-collapse border border-gray-200">
              <thead>
                  <tr>
                      <th class="px-4 py-2">COMPANY NAME</th>
                      <th class="px-4 py-2">PDF LINK</th>
                      <th class="px-4 py-2">LAST CONTACTED</th>
                      <th class="px-4 py-2">REMARKS</th>
                      <th class="px-4 py-2">TOTAL SALES</th>
                      <!-- <th class="px-4 py-2">ACTION</th> -->
                  </tr>
              </thead>
              <tbody>
                  <?php
                  // Assuming $con is your database connection
                  $sql = "SELECT * FROM client_list";
                  $stmt = $con->prepare($sql);
                  $stmt->execute();
                  while ($row = $stmt->fetch()) {
                      ?>
                      <tr>
                          <td class="px-4 py-2"><?php echo $row['company_name']; ?></td>
                          <td class="px-4 py-2"><?php echo $row['pdf']; ?></td>
                          <td class="px-4 py-2"><?php echo $row['last_contacted']; ?></td>
                          <td class="px-4 py-2"><?php echo $row['remark']; ?></td>
                          <td class="px-4 py-2"><?php echo $row['total_sales']; ?></td>
                          <!-- <td class="px-4 py-2">
                              <button class="btn btn-warning" data-bs-toggle="modal"
                                  data-bs-target="#update_client<?php echo $row['client_id']; ?>"><span
                                      class="glyphicon glyphicon-edit"></span> Edit</button>
                              <button class="btn btn-danger" data-bs-toggle="modal"
                                  data-bs-target="#delete_client<?php echo $row['client_id']; ?>"><span
                                      class="glyphicon glyphicon-edit"> Delete</button>
                          </td> -->
                      </tr>
                  <?php
                  }
                  ?>
              </tbody>
          </table>
      </div>
  </div>

      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script>
          $(document).ready(function () {
              $('#clientTable').DataTable();
          });
      </script>
</body>

  </html>
          
