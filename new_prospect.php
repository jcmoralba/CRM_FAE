<?php
  include "sidebar.php";
  include "navbar-TEST.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title> 
</head>
<body class="bg-gray-100">

  <div class="ml-64">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
      <p class="text-2xl font-bold mb-4">New Prospect</p>
      <!-- <div class="relative "> -->
      <!-- <div class="absolute top-0 right-10 h-16 w-16 flex items-center justify-center">
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add prospect
        </button>
      </div> -->
    </div>

    <button style="margin-left: 85%; margin-bottom: 1%;" type="button" class="btn btn-success  justify-content-center" data-bs-toggle="modal" data-bs-target="#addNewProspect">Add Record</button>

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
            $sql="SELECT * FROM new_prospect";
            $stmt=$con->prepare($sql);
            $stmt->execute();
            while($row=$stmt->fetch()){
            ?>
            <tr>
                <td class="border px-4 py-2"><?php echo $row['company_name']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['item_deals']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['status']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['remark']; ?></td>
                <td class="border px-4 py-2"><?php echo $row['pdf']; ?></td>
                <td class="border px-4 py-2">
                    <button class="btn btn-warning" data-bs-toggle="modal" type="button" data-bs-target="#update_prospect<?php echo $row['prospect_id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#delete_prospect<?php echo $row['prospect_id']; ?>"><span class="glyphicon glyphicon-edit"></span> Delete</button>
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
        <select name="status" class="form-select form-select-lg form-control" aria-label="Large select example">
        <option >Prospecting</option>
        <option >Make contact</option>
        <option >Qualify your prospect</option>
        <option >Nurture your prospect</option>
        <option >Present your offer</option>
        <option >Overcome objections</option>
        <option >Close the sales</option>
        </select>
        </div>


      

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Remarks</label>
            <input type="text" name="remark" required class="form-control" id="formGroupExampleInput" placeholder="">
                <!-- <div class="invalid-feedback">
                    Please provide a valid name.
                </div> -->
        </div>

        <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">PDF Link</label>
            <input type="text" name="pdf" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid PDF.
                </div>
        </div> -->


        <div class="mb-3">
        <label for="formFile" class="form-label">Input PDF File</label>
        <input class="form-control" name="pdf" type="file" id="formFile">
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





    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            // Add any customization options here
        });
    });
</script>





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