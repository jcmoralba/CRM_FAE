<!-- Update DATA -->
<!-- Modal -->
<!-- <div class="modal fade" id="update_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="update_new_prospect" name="update"> -->
          <!-- input data -->


          <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Company Name</label>
            <input type="hidden" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
            <input type="text" name="comp_name" value="<?php echo $row['company_name']; ?>" required
              class="form-control" id="formGroupExampleInput" placeholder="">
            <div class="invalid-feedback">
              Please provide a valid Company name.
            </div>
          </div>


          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Item Deals</label>
            <input type="text" name="item_deal" value="<?php echo $row['item_deals']; ?>" required class="form-control"
              id="formGroupExampleInput" placeholder="">
            <div class="invalid-feedback">
              Please provide a valid deals.
            </div>
          </div>



          <?php
          $sql1 = "SELECT * FROM status";
          $stmt1 = $con->prepare($sql1);
          $stmt1->execute();
          $data1 = $stmt1->fetchAll();
          ?>
          <div class="mb-6">
            <label for="status" class="form-label">Select an
              status</label>
            <select id="status" name="status"
              class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <option selected value="<?php echo $row['status']; ?>">
                <?php echo $row['status']; ?>
              </option>
              <?php foreach ($data1 as $row1) { ?>
                <option value="<?= htmlspecialchars($row1['status_name']) ?>">
                  <?= htmlspecialchars($row1['status_name']) ?>
                </option>
              <?php } ?>
            </select>
          </div> -->
<!-- /dad -->
          <!-- <div class="mb-6">
            <label for="total_sales" class="form-label">Total
              Sales</label>
            <input type="text" id="total_sales" name="total_sales" value="<?php echo $row['total_sales']; ?>"
            class="form-control"  onBlur="formatCurrency(this, '₱ ', 'blur');"
            onkeyup="formatCurrency(this, '₱ ');"
              placeholder="₱ #,###.00" required >
          </div> -->

          <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Total Sales</label>
            <input type="text" name="total_sales" value="<?php echo $row['total_sales']; ?>" class="form-control"
              id="formGroupExampleInput" placeholder="">
            <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
          </div> -->


          <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Remarks</label>
            <input type="text" name="remark" value="<?php echo $row['remark']; ?>" class="form-control"
              id="formGroupExampleInput" placeholder=""> -->
            <!-- <div class="invalid-feedback">
                    Please provide a valid name.
                </div> -->
          <!-- </div>
          <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">PDF Link</label>
            <input type="url" name="pdf" value="<?php echo $row['pdf']; ?>" class="form-control"
              id="formGroupExampleInput" placeholder="">      
          </div>


          <div class="mb-3">
            <label for="formFile" class="form-label">Input PDF File</label>
            <input class="form-control" name="pdf_file" type="file" id="formFile">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="updatedata"  class="btn btn-primary" >Update</button>
        <button  id="update_button1" id="update_button" onclick="showAlert()"  >  </button>
      </div>
      </form>
    </div>
  </div>
</div> -->
<!-- END OF UPDATE DATA -->

<!-- test -->

<!-- DELETE MODAL -->

<!-- Modal -->
<div class="modal fade" id="delete_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
          <!-- input data -->
          <input type="hidden" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
          <h3>Are you sure you want to DELETE?</h3>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" name="deletedata">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- view MODAL -->

<!-- Modal -->
<div class="modal fade" id="view_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
          <!-- input data -->
          <input type="hidden" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
          <p>Company Name:</p>
          <p><?php echo $row['company_name']; ?></p>
          <p>Item Deals:</p>
          <p><?php echo $row['item_deals']; ?></p>
          <p>Status:</p>
          <p><?php echo $row['status']; ?></p>
          <p>Total Sales:</p>
          <p><?php echo $row['total_sales']; ?></p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <!-- <button type="submit" class="btn btn-primary" name="deletedata">Delete</button> -->
      </div>
      </form>
    </div>
  </div>
</div>


<div id="edit-modal<?php echo $row['prospect_id']; ?>" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-lg">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    Static modal
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 inline-flex justify-center items-center"
                    data-modal-hide="static-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 space-y-4">
                <form action="new_prospect_process.php" method="POST">
                    <div class="mb-6">
                        <label for="comp_name" class="block mb-2 text-sm font-medium text-gray-900">Company Name</label>
                        <input type="text" id="comp_name" name="comp_name" value="<?php echo $row['company_name']; ?>"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Company Name" required />
                        <input type="hidden" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
                    </div>
                    <div class="mb-6">
                        <label for="item_deal" class="block mb-2 text-sm font-medium text-gray-900">Item Deals</label>
                        <input type="text" id="item_deal" name="item_deal" value="<?php echo $row['item_deals']; ?>"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Item Deals" required />
                    </div>

                    <?php
                    $sql1 = "SELECT * FROM status";
                    $stmt1 = $con->prepare($sql1);
                    $stmt1->execute();
                    $data1 = $stmt1->fetchAll();
                    ?>
                    <div class="mb-6">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select a status</label>
                        <select id="status" name="status"
                            class="bg-white border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option selected value="<?php echo $row['status']; ?>">
                                <?php echo $row['status']; ?>
                            </option>
                            <?php foreach ($data1 as $row1) { ?>
                                <option value="<?= htmlspecialchars($row1['status_name']) ?>">
                                    <?= htmlspecialchars($row1['status_name']) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="total_sales" class="block mb-2 text-sm font-medium text-gray-900">Total Sales</label>
                        <input type="text" id="total_sales" name="total_sales" value="<?php echo $row['total_sales']; ?>"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="₱ #,###.00" required />
                    </div>

                    <div class="mb-6">
                        <label for="remark" class="block mb-2 text-sm font-medium text-gray-900">Remarks</label>
                        <input type="text" id="remark" name="remark" value="<?php echo $row['remark']; ?>"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Remarks" required />
                    </div>

                    <div class="mb-6">
                        <label for="pdf_link" class="block mb-2 text-sm font-medium text-gray-900">PDF Link</label>
                        <input type="text" id="pdf_link" name="pdf_link" value="<?php echo $row['pdf']; ?>"
                            class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="PDF Link" required />
                    </div>

                    <button type="submit" name="updatedata"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
