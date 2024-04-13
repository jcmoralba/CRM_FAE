<?php
include 'sidebar.php';
include 'new_prospect_process.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title>




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

<body class="">


  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6">
        <p class="h2">List of new Prospect</p>
      </div>
      <div class="col-md-6 text-md-end">
        <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#staticBackdrop">
          <i class="fas fa-user-plus me-2"></i>
          Add Prospect
        </button>
      </div>
    </div>

    <table id="example" class="table table-striped table-bordered border-dark " style="width:100%">
      <thead>
        <tr class="bg-dark table-bordered border-dark">
          <th class="text-white">COMPANY NAME</th>
          <th class="text-white">ITEM DEALS</th>
          <th class="text-white">STATUS</th>
          <th class="text-white">REMARKS</th>
          <th class="text-white">PDF LINK</th>
          <th class="text-white">ACTION</th>
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
            <td>
              <?php echo $row['company_name']; ?>
            </td>
            <td>
              <?php echo $row['item_deals']; ?>
            </td>
            <td>
              <?php echo $row['status']; ?>
            </td>
            <td>
              <?php echo $row['remark']; ?>
            </td>
            <td>
              <?php
              if (strlen($row['pdf']) == 0) {
                echo " ";
              } else {
                echo "<u><a href='{$row['pdf']}' target='_blank'>LINK</a></u>";
              }

              ?>
            </td>
            <td>
              <button type="button" class="btn btn-info btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#view_prospect<?php echo $row['prospect_id']; ?>">
                <i class="fas fa-eye me-2"></i>
                View
              </button>

              <button type="button" class="btn btn-warning btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#edit-prospect<?php echo $row['prospect_id']; ?>">
                <i class="fas fa-pen me-2"></i>
                Edit
              </button>
              <button type="button" class="btn btn-danger btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#delete-modal<?php echo $row['prospect_id']; ?>">
                <i class="fas fa-trash-can me-2"></i>
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






  <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add new prospect</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form style="width: 26rem;" action="new_prospect_process.php" method="POST">
            <!-- Name input -->
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="comp_name" name="comp_name" placeholder="Company name">
              <label for="comp_name">Company Name</label>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="item_deal" name="item_deal" placeholder="Item Deal">
              <label for="item_deal">Item Deal</label>
            </div>
            <?php
            $sql1 = "SELECT * FROM status";
            $stmt1 = $con->prepare($sql1);
            $stmt1->execute();
            $data1 = $stmt1->fetchAll();
            ?>
            <div class="form-floating mb-3">
              <div class="col-md">
                <div class="form-floating">
                  <select class="form-select" id="status" name="status" aria-label="Floating label select example">
                    <option selected>Select Status</option>
                    <?php foreach ($data1 as $row1) { ?>
                      <option value="<?= htmlspecialchars($row1['status_name']) ?>"><?= htmlspecialchars($row1['status_name']) ?></option>
                    <?php } ?>
                  </select>
                  <label for="status">Sale Cycle</label>
                </div>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="total_sales" name="total_sales" placeholder="Total Sale">
              <label for="total_sales">Total Sale</label>
            </div>
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="remark" name="remark" placeholder="Remarks">
              <label for="form-control">Remarks</label>
            </div>
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="pdf" name="pdf" placeholder="Remarks">
              <label for="pdf">PDF Link</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
          <button type="submit" name="savedata" class="btn btn-primary" data-mdb-ripple-init>Save Prospect</button>
        </div>
        </form>
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
    new DataTable('#example', {
      layout: {
        topStart: {
          buttons: ['copy', 'excel', 'pdf', 'colvis']
        }
      }

    });
  </script>



  <!-- SWEETALERT ADD AND EDIT -->
  <?php
  // Check if 'added' parameter is set and has the value 'success' after adding new data
  // Check if 'updated' parameter is set and has the value 'success' after updating data
  // Check if 'deleted' parameter is set and has the value 'success' after deleting data
  if ((isset($_GET['added']) && $_GET['added'] === 'success') || (isset($_GET['updated']) && $_GET['updated'] === 'success') || (isset($_GET['deleted']) && $_GET['deleted'] === 'success')) {
  ?>
    <script>
      // Show SweetAlert2 alert based on the parameter present in the URL
      Swal.fire({
        title: "Success!",
        text: <?php echo (isset($_GET['added']) && $_GET['added'] === 'success') ? '"You successfully added a new prospect"' : ((isset($_GET['updated']) && $_GET['updated'] === 'success') ? '"You successfully updated the prospect"' : '"You successfully deleted the prospect"'); ?>,
        icon: "success",
        confirmButtonText: "OK"
      });

      // Remove the parameter from the URL
      window.onload = function() {
        if (window.location.search.includes('added=success') || window.location.search.includes('updated=success') || window.location.search.includes('deleted=success')) {
          history.replaceState({}, document.title, window.location.pathname);
        }
      };
    </script>
  <?php
  }
  ?>

</body>

</html>