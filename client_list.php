<?php
include "sidebar.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>

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
        <p class="h2">Client List</p>
      </div>
      
    </div>

    

        <table id="example" class="table table-striped table-bordered border-dark " style="width:100%">
                <thead class="bg-dark table-bordered border-dark">
                    <tr>
                        <th class="text-white">COMPANY NAME</th>
                        <th class="text-white">PDF LINK</th>
                        <th class="text-white">LAST CONTACTED</th>
                        <th class="text-white">REMARKS</th>
                        <th class="text-white">TOTAL SALES</th>
                        <th class="text-white">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql1 = "SELECT * FROM new_prospect WHERE `status` = 'Close Deals'";

                    $sql = "SELECT `prospect_id`, `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM `new_prospect` WHERE `status`= 'Close Deals'";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                    ?>
                        <tr>
                            <!-- <td name="prospect_id">
                                <?php echo $row['prospect_id']; ?>
                            </td> -->
                            <td name="company_name">
                                <?php echo $row['company_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['pdf']; ?>
                            </td>
                            <td>
                                <?php echo $row['last_contacted']; ?>
                            </td>
                            <td>
                                <?php echo $row['remark']; ?>
                            </td>
                            <td>
                                <?php echo $row['total_sales']; ?>
                            </td>
                            <td>
                                <a href="client_list_view.php?data=<?php echo $row['company_name']; ?>">
                                <button type="button" class="btn btn-info btn-rounded" data-bs-toggle="modal" data-bs-target="#exampleModal" data-userid="<?php echo $row['prospect_id']; ?>">
                                <i class="fas fa-eye me-2"></i>
                                View
                                    </button>
                                </a>

                            </td>

                        </tr>

                    <?php
                        // include 'client_list_update.php';

                    }

                    ?>

                </tbody>
            </table>

            <?php  ?>
        </div>
    </div>


    </div>
    
   





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

      // Handle status filter
      $('#statusFilter').on('change', function() {
        var status = $(this).val();
        if (status === "") {
          table.column(2).search("").draw(); // Clear the search if "Filter Status" is chosen
        } else {
          table.column(2).search(status).draw(); // Filter based on selected status
        }
      });

      // Handle clear filter button
      $('#clearFilterBtn').on('click', function() {
        $('#statusFilter').val(''); // Clear the selected value in the dropdown
        table.column(2).search("").draw(); // Clear the search filter
        $('#statusFilter option[value=""]').prop('selected', true); // Select "Filter Status" option
      });
    });
  </script>

</body>

</html>