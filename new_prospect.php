<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Prospect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTDNEpUTHQoQUJMHLrErGJyHg89uy71MyuH5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include "sidebar.php";
        ?>
        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php
                    include "navbar.php";
               ?>
                <!-- End of Topbar -->

               
        <h2 style="margin-left: 2%;" >New Prospect</h2>
                <table class="table table-bordered container square-box justify-content-center">
      <thead>
      <button style="margin-left: 6.5%; margin-bottom: 1% ;" type="button" class="btn btn-success  justify-content-center" data-bs-toggle="modal" data-bs-target="#addNewProspect">Add Record</button>

    <tr>
      <th>COMPANY NAME</th>
      <th>ITEM DEALS</th>
      <th>STATUS</th>
      <th>REMARKS</th>
      <th>PDF LINK</th>
      <th>ACTION</th>
    </tr>
    </thead>
    <tbody>
      <?php
      $sql="SELECT * FROM new_prospect";
      $stmt=$con->prepare($sql);
      $stmt->execute();
      $strTable="";
      while($row=$stmt->fetch()){
        ?>
        <tr>
          <td style="display:none;" ><?php echo  $row['prospect_id']; ?></td>
          <td><?php echo  $row['company_name']; ?></td>
          <td><?php echo  $row['item_deals']; ?></td>
          <td><?php echo  $row['status']; ?></td>
          <td><?php echo  $row['remark']; ?></td>
          <td><?php echo  $row['pdf']; ?></td>
          <td>
            <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#update_prospect<?php echo  $row['prospect_id']; ?>"><span class="glyphicon glyphicon-edit"></span> Update</button>
            <button class="btn btn-danger"  data-bs-toggle="modal" type="button" data-bs-target="#delete_modal<?php echo  $row['prospect_id']; ?>"><span class="glyphicon glyphicon-edit"> Delete</button>
          </td>
      
        </tr>
        <?php
        include 'new_prospect_update.php';
  }
        ?>
    
      
 
 
  </tbody>
    </table>


    <!-- ADD NEW DATA -->
   <!-- Modal -->
   <div class="modal fade" id="addNewProspect" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
        <!-- input data -->

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Company Name</label>
            <input type="text" name="comp_name" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid Company name.
                </div>
        </div>


        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Item Deals</label>
            <input type="text" name="item_deal" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid deals.
                </div>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Status</label>
        <select class="form-select form-select-lg form-control" aria-label="Large select example">
        <option selected>Select Status</option>
        <option value="1">Prospecting</option>
        <option value="2">Make contact</option>
        <option value="3">Qualify your prospect</option>
        <option value="4">Nurture your prospect</option>
        <option value="5">Present your offer</option>
        <option value="6">Overcome objections</option>
        <option value="7">Close the sales</option>
        </select>
        </div>


      

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Remarks</label>
            <input type="text" name="remark" required class="form-control" id="formGroupExampleInput" placeholder="">
                <!-- <div class="invalid-feedback">
                    Please provide a valid name.
                </div> -->
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">PDF Link</label>
            <input type="text" name="pdf" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid PDF.
                </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="savedata">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- END OF ADD NEW DATA -->





            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>

// for form validation
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
const forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.from(forms).forEach(form => {
form.addEventListener('submit', event => {
  if (!form.checkValidity()) {
    event.preventDefault()
    event.stopPropagation()
  }

  form.classList.add('was-validated')
}, false)
})
})()
// end of form validation


</script>

</body>
</html>