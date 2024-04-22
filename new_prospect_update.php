<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .hidden {
      display: none;
    }
  </style>

</head>

<body>
  <!-- update modal -->
  <div class="modal fade" id="edit-prospect<?php echo $row['prospect_id']; ?>" data-mdb-backdrop=" static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit prospect</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form style="width: 26rem;" action="new_prospect_process.php" method="POST">
            <!-- Name input -->
            <input type="hidden" name="user_id" value="  <?php echo  $_SESSION["user_id"] ?>">
            <input type="hidden" class="form-control" id="prospect_id" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="comp_name" name="comp_name" placeholder="Company name" value="<?php echo $row['company_name']; ?>">
              <label for="comp_name">Company Name</label>
            </div>




            <form action="" method="post">
              <div style="border: 1px solid grey;">
                <input class="form-check-input" type="checkbox" value="" id="myCheck" onclick="checks()">
                <label class="form-check-label" for="myCheck">
                  Edit mode
                </label>
                <p>Item Deals:</p>
                <div id="view_deals">
                  <?php

                  $prospect_id = $row['prospect_id'];
                  $sql3 = "SELECT * FROM item_deals WHERE `prospect_id` = ' $prospect_id'";
                  $stmt3 = $con->prepare($sql3);
                  $stmt3->execute();
                  while ($row3 = $stmt3->fetch()) {
                  ?>

                    <span class="badge bg-secondary" style="margin: 5px;"> <?php echo $row3['name'] ?> </span>

                  <?php } ?>
                </div>
              </div>


            </form>


            <div id="edit_deals" style="border: 1px solid grey;">
              <?php

              $prospect_id = $row['prospect_id'];
              $sql3 = "SELECT * FROM item_deals WHERE `prospect_id` = ' $prospect_id'";
              $stmt3 = $con->prepare($sql3);
              $stmt3->execute();
              while ($row3 = $stmt3->fetch()) {
              ?>

                <div class="form-floating mb-3" style="margin: 5px;">
                  <input type="text" class="form-control" id="" name="" placeholder="" value=" <?php echo $row3['name'] ?>">
                </div>

              <?php } ?>
            </div>

            <script>
            document.getElementById("myCheck").click();
            document.getElementById("myCheck").click();
            
              // for checkbox
              function checks() {
                // Get the checkbox
                var checkBox = document.getElementById("myCheck");
                // Get the output text
                var text = document.getElementById("edit_deals");
                var vwdeals = document.getElementById("view_deals");

                // If the checkbox is checked, display the output text
                if (checkBox.checked == true) {
                  text.style.display = "block";
                  vwdeals.style.display = "none";
                } else {
                  text.style.display = "none";
                  vwdeals.style.display = "block";
                }
              }
            </script>








            <div class="form-floating mb-3">
              <textarea type="text" class="form-control" id="textInput" name="item_deal" placeholder="Item Deal">  <?php echo $row['item_deals']; ?></textarea>
              <label for="item_deal">Item Deal</label>
            </div>

            <!-- <div class="form-floating mb-3">
              <input type="text" class="form-control" id="item_deal" name="item_deal" placeholder="Item Deal" value="<?php echo $row['item_deals']; ?>">
              <label for="item_deal">Item Deal</label>
            </div> -->
            <div class="form-floating mb-3">
              <textarea type="text" class="form-control" id="textInput" name="item_deal" placeholder="Item Deal" onkeypress="handleKeyPress(event)" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>  <?php echo $row['item_deals']; ?></textarea>
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
                    <option selected value="<?php echo $row['item_deals']; ?>"><?php echo $row['status']; ?></option>
                    <?php foreach ($data1 as $row1) { ?>
                      <option value="<?= htmlspecialchars($row1['status_name']) ?>"><?= htmlspecialchars($row1['status_name']) ?></option>
                    <?php } ?>
                  </select>
                  <label for="status">Sale Cycle</label>
                </div>
              </div>
            </div>
            <!-- <div class="form-floating mb-3">
              <input type="number" class="form-control" id="total_sales" name="total_sales" placeholder="Total Sale" value="<?php echo $row['total_sales']; ?>">
              <label for="total_sales">Total Sale</label>
            </div> -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="total_sales" name="total_sales" placeholder="Total Sale" id="currency-field" pattern="^\₱\d{1,3}(,\d{3})*(\.\d+)?₱" value="<?php echo $row['total_sales']; ?>" data-type="currency">
              <label for="total_sales">Total Sale</label>
            </div>
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="remark" name="remark" placeholder="Remarks" value="<?php echo $row['remark']; ?>">
              <label for="form-control">Remarks</label>
            </div>
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="pdf" name="pdf" placeholder="PDF Link" value="<?php echo $row['pdf']; ?>">
              <label for="pdf">PDF Link</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
          <button type="submit" name="updatedata" class="btn btn-primary" data-mdb-ripple-init>Update Prospect</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- delete modal -->
  <div class="modal fade" id="delete-modal<?php echo $row['prospect_id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="new_prospect_process.php" method="POST">
          <input type="hidden" class="form-control" id="prospect_id" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
          <div class="modal-body d-flex flex-column align-items-center">
            <div class="mb-auto">
              <i class="fa fa-2x fa-trash-can"></i>
            </div>
            <div class="mt-auto">
              <p>Are you sure you want to delete this prospect?</p>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Cancel</button>
            <button type="submit" name="deletedata" class="btn btn-danger" data-mdb-ripple-init>Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>


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


</html>