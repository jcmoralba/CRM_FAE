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
            <input type="hidden" name="prospect_id" value="<?php echo  $row['prospect_id']; ?>" >
            <input type="text" name="comp_name" value="<?php echo  $row['company_name']; ?>" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid Company name.
                </div>
        </div>


        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Item Deals</label>
            <input type="text" name="item_deal" value="<?php echo  $row['item_deals']; ?>" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid deals.
                </div>
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Item Deals</label>
            <input type="text" name="status" value="<?php echo  $row['status']; ?>" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid deals.
                </div>
        </div>

        <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Status</label>
        <select class="form-select form-select-lg form-control" aria-label="Large select example">
        <option name="status" selected value="test" >Select Status</option>
        <option value="1">Prospecting</option>
        <option value="2">Make contact</option>
        <option value="3">Qualify your prospect</option>
        <option value="4">Nurture your prospect</option>
        <option value="5">Present your offer</option>
        <option value="6">Overcome objections</option>
        <option value="7">Close the sales</option>
        </select>
        </div> -->


        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Remarks</label>
            <input type="text" name="remark" value="<?php echo  $row['remark']; ?>" required class="form-control" id="formGroupExampleInput" placeholder="">
                <!-- <div class="invalid-feedback">
                    Please provide a valid name.
                </div> -->
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">PDF Link</label>
            <input type="text" name="pdf" value="<?php echo  $row['pdf']; ?>" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid PDF.
                </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="updatedata">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
  <!-- END OF UPDATE DATA -->



<!-- DELETE MODAL -->

<!-- Modal -->
<div class="modal fade" id="delete_prospect<?php echo  $row['prospect_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST" class="needs-validation" novalidate id="forms">
        <!-- input data -->
      <input type="hidden" name="prospect_id" value="<?php echo  $row['prospect_id']; ?>">
       <h3>Are you sure you want to DELETE?</h3>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="deletedata">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
     
