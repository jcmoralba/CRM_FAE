<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <!-- update modal -->
  <div class="modal fade" id="edit-prospect<?php echo $row['prospect_id']; ?>" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
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



            <div style="border: 1px solid grey; border-radius:5px; padding:5px;">

              <div>
                <p>Item Deals:</p>
                <?php

                $prospect_id = $row['prospect_id'];
                $sql3 = "SELECT * FROM item_deals WHERE `prospect_id` = '$prospect_id'";
                $stmt3 = $con->prepare($sql3);
                $stmt3->execute();
                while ($row3 = $stmt3->fetch()) {

                ?>

                  <!-- <span class="badge bg-secondary" style="margin: 5px;"> <?php echo $row3['name'] ?> </span> -->

                <?php } ?>
                <!-- <button type="button" name="updatedeals" class="btn btn-primary">Edit</button> -->
              </div>

              <div id="edit_deals">

                <?php

                $prospect_id1 = $row['prospect_id'];
                $sql3 = "SELECT  DISTINCT `name` FROM item_deals WHERE `prospect_id` = '$prospect_id1'";
                $stmt3 = $con->prepare($sql3);
                $stmt3->execute();
                $num = 0;
                while ($row3 = $stmt3->fetch()) {
                  $num = $num + 1;
                ?>

                  <div  style="margin-bottom:5px;">
                    <input type="text" class="form-control" id="z<?php echo $num ?>" name="name[]" placeholder="" value="<?php echo $row3['name'] ?>">
                    <!-- <label for="z<?php echo $num ?>">deal  <?php echo $num ?>:</label> -->
                  </div>

                <?php } ?>

              </div>

              <!-- Modal Body -->
             

                <div id="inputsContainer<?php echo $row['prospect_id']; ?>" class="form-group" style="margin-top: 15px;">
                  <!-- Initial input field -->
                  <input type="text" name="name[]" class="form-control"  style="margin-bottom: 5px;" placeholder="Enter new deal...">
                </div>
                <button type="button" class="btn btn-primary" onclick="addInput(<?php echo $row['prospect_id']; ?>)">Add more deals</button>
                <!-- <button type="submit" class="btn btn-success" name="submit">Submit</button> -->

             
              <script>
                function addInput(prospectId) {
                  var container = document.getElementById('inputsContainer' + prospectId);
                  var input = document.createElement('input');
                  input.type = 'text';
                  input.style = 'margin-bottom: 5px;';
                  input.name = 'name[]';
                  input.className = 'form-control';
                  input.placeholder = 'Enter new deal...';
                  container.appendChild(input);
                  console.log(prospectId);
                }
              </script>

            </div>





            <!-- <div class="form-floating mb-3">
              <input type="text" class="form-control" id="item_deal" name="item_deal" placeholder="Item Deal" value="<?php echo $row['item_deals']; ?>">
              <label for="item_deal">Item Deal</label>
            </div> -->
            <!-- <div class="form-floating mb-3">
              <textarea type="text" class="form-control" id="textInput" name="item_deal" placeholder="Item Deal" onkeypress="handleKeyPress(event)" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>  <?php echo $row['item_deals']; ?></textarea>
              <label for="item_deal">Item Deal</label>
            </div> -->
            <?php
            $sql1 = "SELECT * FROM status";
            $stmt1 = $con->prepare($sql1);
            $stmt1->execute();
            $data1 = $stmt1->fetchAll();
            ?>
            <div class="form-floating mb-3" style="margin-top:15px;">
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
            <!-- <div class="form-floating mb-3">
              <input type="input" class="form-control" id="remark" name="remark" placeholder="Remarks" value="<?php echo $row['remark']; ?>">
              <label for="form-control">Remarks</label>
            </div> -->
            <div class="form-floating mb-3">
              <input type="input" class="form-control" id="pdf" name="pdf" placeholder="PDF Link" value="<?php echo $row['pdf']; ?>">
              <label for="pdf">PDF Link</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
          <button type="submit" name="updatedata" class="btn btn-success" data-mdb-ripple-init>Update Prospect</button>
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
  <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Added modal-lg for larger modal -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prospect Details</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="new_prospect_process.php" method="POST">
          <input type="hidden" class="form-control" id="prospect_id" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p><strong>Company Name:</strong> <?php echo $row['company_name']; ?></p>
              </div>
              <div class="col-md-6">
                <p><strong>Item Deals:</strong> <?php echo $row['item_deals']; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
              </div>
              <div class="col-md-6">
                <p><strong>Total Sales:</strong> <?php echo $row['total_sales']; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p><strong>PDF Link:</strong> <?php echo "<u><a href='{$row['pdf']}' target='_blank'>LINK</a></u>"; ?></p>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


  <!-- add remarks modal -->
  <div class="modal fade" id="remarks_prospect<?php echo $row['prospect_id']; ?>" tabindex="-1" data-mdb-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="new_prospect_process.php" method="POST">
            <input type="hidden" class="form-control" id="prospect_id" name="prospect_id1" value="<?php echo $row['prospect_id']; ?>">
            <p>Remarks:</p>
            <div class="form-floating">
              <textarea name="remarks" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
              <!-- <label for="floatingTextarea2">Comments</label> -->
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
          <button type="submit" name="add_remarks" class="btn btn-success" data-mdb-ripple-init>Add Remarks</button>
        </div>
      </div>
    </div>
  </div>


  <!-- remarks history modal -->
  <div class="modal fade" id="remarks_history<?php echo $row['prospect_id']; ?>" tabindex="-1" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Remarks</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="new_prospect_process.php" method="POST">
            <input type="hidden" class="form-control" id="prospect_id" name="prospect_id" value="<?php echo $row['prospect_id']; ?>">
            <!-- <p>Remarks History:</p> -->

            <?php
            $sql4 = "SELECT `remarks_id`, `remarks_desc`, `prospect_id`, account_id, user_type, fname, lname, DATE_FORMAT(`date`, '%M %d, %Y - %h:%i %p') AS `date` FROM `vw_remarks` WHERE `prospect_id`='{$row['prospect_id']}'";
            $stmt4 = $con->prepare($sql4);
            $stmt4->execute();
            $data4 = $stmt4->fetchAll();       
            ?>
           
            <?php foreach ($data4 as $row4) { ?>
              <div style="border: 1px solid white; border-radius:10px; margin:5px; padding:10px; background-color:#f1f1f1;" id="border">
             <p>  <b><?php echo $row4['fname'] . " " . $row4['lname'] . "</b> <span style='color: #0064d1; padding:2px; border-radius:5px; background-color:white;'>  {$row4['user_type']} </span>" ?></p>
                <h6> <?php echo $row4['remarks_desc']; ?> </h4>
                <p> <?php echo $row4['date']; ?> </p>
              </div>
            <?php } ?>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


</html>