
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
<!-- <div class="modal fade" id="delete_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
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
</div> -->


<!-- view MODAL -->

<!-- Modal -->
<!-- <div class="modal fade" id="view_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
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
      </div>
      </form>
    </div>
  </div>
</div> -->



















<!-- FOR DELETE MODAL -->
<div id="delete-modal<?php echo $row['prospect_id']; ?>" class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="delete-modal<?php echo $row['prospect_id']; ?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400  w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-black ">Are you sure you want to delete this item?</p>
            <form action="new_prospect_process.php" method="POST">
                <input type="hidden" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
                <div class="flex justify-center items-center space-x-4">
                    <button data-modal-hide="delete-modal<?php echo $row['prospect_id']; ?>" type="button" class="py-2 px-3 text-sm font-medium text-black bg-white rounded-lg border border-gray-200 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 ">
                        No, cancel
                    </button>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 " name="deletedata">
                        Yes, I'm sure
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FOR DELETE MODAL -->



<!-- FOR EDIT MODAL -->
<div id="edit-modal<?php echo $row['prospect_id']; ?>" tabindex="-1" aria-hidden="true"
    class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-screen overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="relative p-4 w-full max-w-2xl">
        <div class="relative bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    Edit Modal
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 inline-flex justify-center items-center" data-modal-hide="edit-modal<?php echo $row['prospect_id']; ?>">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
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
                        <input type="text" id="pdf_link" name="pdf" value="<?php echo $row['pdf']; ?>"
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
<!-- FOR EDIT MODAL -->


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


  document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById("delete-modal<?php echo $row['prospect_id']; ?>");
    var overlay = document.querySelector('.modal-overlay');

    // Show modal and overlay
    modal.addEventListener('focus', function() {
        overlay.classList.remove('hidden');
    });

    // Hide modal and overlay
    modal.addEventListener('blur', function() {
        overlay.classList.add('hidden');
    });

    // Close modal and overlay when clicking on overlay
    overlay.addEventListener('click', function() {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
    });
});
</script>
