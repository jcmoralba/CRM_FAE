  <!-- Update DATA -->
   <!-- Modal -->
   <div class="modal fade" id="update_prospect<?php echo  $row['prospect_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
        <!-- input data -->

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Company Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
        </div>


        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Item Deals</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Status</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Remarks</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid name.
                </div>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">PDF Link</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid name.
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
  <!-- END OF Update DATA -->
