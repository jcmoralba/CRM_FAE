<?php
    include "sidebar.php";
    include "navbar-TEST.php";
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Client</title>
  </head>

<body class="bg-gray-100">

  <div class="ml-64">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <p class="text-2xl font-bold mb-4">Client List</p>
       </div>

       <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <table id="clientTable" class="table-auto w-full">
              <thead>
                  <tr>
                      <th class="px-4 py-2">COMPANY NAME</th>
                      <th class="px-4 py-2">PDF LINK</th>
                      <th class="px-4 py-2">LAST CONTACTED</th>
                      <th class="px-4 py-2">REMARKS</th>
                      <th class="px-4 py-2">TOTAL SALES</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM new_prospect WHERE `status`='Close Deals'";
                  $stmt = $con->prepare($sql);
                  $stmt->execute();
                  while ($row = $stmt->fetch()) {
                      ?>
                      <tr>
                          <td class="border px-4 py-2"><?php echo $row['company_name']; ?></td>
                          <td class="border px-4 py-2"><?php echo $row['pdf']; ?></td>
                          <td class="border px-4 py-2"><?php echo $row['last_contacted']; ?></td>
                          <td class="border px-4 py-2"><?php echo $row['remark']; ?></td>
                          <td class="border px-4 py-2 text-right"><?php echo $row['total_sales']; ?></td>
                      </tr>
                  <?php
                  }
                  ?>
              </tbody>
          </table>
          </div>  
          </div>
  </div>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
      <script>
          $(document).ready(function () {
              $('#clientTable').DataTable();
          });
      </script>
</body>
</html>