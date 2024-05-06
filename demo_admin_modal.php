
  <!-- view modal -->
  <div class="modal fade" id="view_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Prospect</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="new_prospect_process.php" method="POST">
            <input type="hidden" class="form-control" id="prospect_id" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
            <div>
              <p>Company Name: <?php echo $row['company_name']; ?></p>
              <p>Item Deals: <?php echo $row['item_deals']; ?></p>
              <p>Status: <?php echo $row['status']; ?></p>
              <p>Total Sales: <?php echo $row['total_sales']; ?></p>
              <p>PDF Link: <?php echo "<u><a href='{$row['pdf']}' target='_blank'>LINK</a></u>"; ?></p>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>