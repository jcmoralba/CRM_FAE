<?php
    include "sidebar.php";
    include "navbar.php";
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Client</title>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
      <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTDNEpUTHQoQUJMHLrErGJyHg89uy71MyuH5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.tailwindcss.com"></script>
        
  </head>

<body class="bg-gray-100">

  <div class="ml-64">
      <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <p class="text-2xl font-bold mb-4">Client List</p>
       </div>

       <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
          <table    class="table-auto w-full">
              <thead>
                  <tr>
                      <th class="px-4 py-2">COMPANY NAME</th>
                      <th class="px-4 py-2">PDF LINK</th>
                      <th class="px-4 py-2">LAST CONTACTED</th>
                      <th class="px-4 py-2">REMARKS</th>
                      <th class="px-4 py-2">TOTAL SALES</th>
                      <th class="px-4 py-2">ACTION</th>

                  </tr>
              </thead>
              <tbody>
                  <?php
                  $sql = "SELECT `prospect_id`, `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM new_prospect WHERE `status`='Close Deals'";
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
                          <td>
                          <button data-bs-target="#view_prospect<?php echo $row['prospect_id']; ?>" 
                  class="btn btn-info" data-bs-toggle="modal" type="button">
                    <span class="glyphicon glyphicon-edit"></span> View
                </button>
                          </td> 
                      </tr>
                  <?php
                           include ("client_list_update.php");
                  }
               
                  ?>
              </tbody>
          </table>
          </div>  
          </div>
  </div>

  

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

      <!-- <script>
          $(document).ready(function () {
              $('#clientTable').DataTable();
          });
      </script> -->
</html>