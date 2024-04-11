                    <!-- view MODAL -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">View</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
 
      <div class="modal-body">
        ...
        

        <input type="text" name="" id="text">
        <TABLE class="table">
        <thead>
                  <tr>
                      <th class="px-4 py-2">COMPANY NAME</th>
                      <th class="px-4 py-2">PDF LINK</th>
                      <th class="px-4 py-2">LAST CONTACTED</th>
                      <th class="px-4 py-2">REMARKS</th>
                      <th class="px-4 py-2">TOTAL SALES</th>
                   
                
                  </tr>
              </thead>
              <tbody>
                  <?php
                  $company_name =  "";
                  $sql1 = "SELECT `prospect_id`, `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM new_prospect WHERE `status`='Close Deals'";
                  $stmt1 = $con->prepare($sql1);
                  $stmt1->execute();
                  while ($row1 = $stmt1->fetch()) {
                      ?>
                      <tr>
                          <td class="border px-4 py-2"><?php echo $row1['company_name']; ?></td>
                          <td class="border px-4 py-2"><?php echo $row1['pdf']; ?></td>
                          <td class="border px-4 py-2"><?php echo $row1['last_contacted']; ?></td>
                          <td class="border px-4 py-2"><?php echo $row1['remark']; ?></td>
                          <td class="border px-4 py-2 text-right"><?php echo $row1['total_sales']; ?></td>
              
                      </tr>
                  <?php
                    
                          
                  }
               
                  ?>
              </tbody>
          
        </TABLE>

     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

