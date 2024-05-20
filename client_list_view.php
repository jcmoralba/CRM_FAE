<?php
include 'sidebar.php';


$company_name = $_GET['data'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">


  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/style_index_1.css">
  <link rel="stylesheet" href="css/datatable.css">


  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<body>



<div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <p class="h2"><?php echo $company_name; ?> </p>
      </div>
      <div class="col-md-6 text-md-end">
       
        <a href="client_list.php">
            <button  class="btn btn-primary" type="button">
            <i class="fas fa-angle-left me-2"></i>Go Back</button></a> 
      </div>
    </div>



<table id="example" class="table table-striped table-bordered border-dark " style="width:100%">
    <thead>
        <tr class="bg-dark table-bordered border-dark">
            <th class="text-white">COMPANY NAME</th>
            <th class="text-white">PDF LINK</th>
            <th class="text-white">LAST CONTACTED</th>
            <th class="text-white">REMARKS</th>
            <th class="text-white">TOTAL SALES</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql1 = "SELECT * FROM new_prospect WHERE `status` = 'Close Deals' AND `company_name`='$company_name'";

        $sql = "SELECT `prospect_id`, `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM `new_prospect` WHERE `status`= 'Close Deals'  AND `company_name`='$company_name'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
        ?>
            <tr>
                <td name="company_name">
                    <?php echo $row['company_name']; ?>
                </td>
                <td>
                    <?php echo $row['pdf']; ?>
                </td>
                <td>
                <?php echo date('F j, Y', strtotime($row['last_contacted'])). ' @ '. date('g:i A', strtotime($row['last_contacted']));?>
                </td>
                <td>
                    <?php echo $row['remark']; ?>
                </td>
                <td>
                    <?php echo $row['total_sales']; ?>
                </td>
            </tr>
        <?php
        } ?>
    </tbody>

</table>

  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>


  <script src="js/main.js"></script>

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {
      // Initialize DataTable
      var table = $('#example').DataTable({
        buttons: [{
            extend: 'copy',
            exportOptions: {
              columns: ':not(:last-child)' 
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: ':not(:last-child)' 
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ':not(:last-child)' 
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          }
        ],
        layout: {
          topStart: 'buttons'
        }
      });

    });
  </script>
</body>

</html>