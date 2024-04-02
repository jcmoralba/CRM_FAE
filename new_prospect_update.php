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

        <!-- <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Item Deals</label>
            <input type="text" name="status" value="<?php echo  $row['status']; ?>" required class="form-control" id="formGroupExampleInput" placeholder="">
                <div class="invalid-feedback">
                    Please provide a valid deals.
                </div>
        </div> -->

        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Status</label>
        <select name="status" class="form-select form-select-lg form-control" aria-label="Large select example">
        <option selected><?php echo  $row['status']; ?></option>
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
            <input type="text" name="remark" value="<?php echo  $row['remark']; ?>" class="form-control" id="formGroupExampleInput" placeholder="">
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
        <button type="submit" class="btn btn-primary" name="updatedata">Update</button>
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
        <button type="submit" class="btn btn-primary" name="deletedata">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>



<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
     
