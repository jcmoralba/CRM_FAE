
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Prospect</title>
  <?php
  include 'sidebar.php';
  ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.bootstrap5.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />


  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="css/style_index_1.css"> -->
  <link rel="stylesheet" href="css/datatable.css">


  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="css/button-custom-color.css">

</head>

<body>

  <div class="container mt-5 mb-5">



    <p class="h2 mt-5">List of new Prospect</p>

    <ul style="margin-bottom: 25px;" class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" href="#" onclick="toggleActive(this); return false;">Approve</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="toggleActive(this); return false;">Pending</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" onclick="toggleActive(this); return false;">Rejected</a>
      </li>
    </ul>



    <div id="approveContent" class="content-block">
      <div class="row">
        <div class="col-md-6">

          <!-- <div class="input-group">
            <select id="statusFilter" class="form-select">
              <option value="" selected>Filter Status</option>
              <?php foreach ($data1 as $row1) { ?>
                <option value="<?= htmlspecialchars($row1['status_name']) ?>"><?= htmlspecialchars($row1['status_name']) ?></option>
              <?php } ?>
            </select>
            <button id="clearFilterBtn" class="btn btn-outline-secondary" type="button">
              <i class="bi bi-x"></i>
            </button>
          </div> -->

        </div>
        <div class="col-md-6 text-md-end">
          <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#staticBackdrop">
            <i class="fas fa-user-plus me-2"></i>
            Add Prospect
          </button>
        </div>
      </div>
      <table id="example" class="table table-striped table-bordered border-dark " style="width:100%">
        <thead>
          <tr class="bg-dark table-bordered border-dark">
            <th class="text-white">COMPANY NAME</th>
            <th class="text-white">ITEM DEALS</th>
            <th class="text-white">STATUS</th>
            <th class="text-white">REMARKS</th>
            <th class="text-white">PDF LINK</th>
            <th class="text-white">QUOTATION</th>
            <th class="text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM new_prospect WHERE `status` != 'Close Deals' AND `stat_id`='2'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch()) {
          ?>
            <tr>
              <td>
                <?php echo $row['company_name']; ?>
              </td>
              <td>
                <?php
                $prospect_id = $row['prospect_id'];

                $sql2 = "SELECT * FROM item_deals WHERE `prospect_id` = '$prospect_id'";
                $stmt2 = $con->prepare($sql2);
                $stmt2->execute();
                while ($row2 = $stmt2->fetch()) {

                ?>
                  <!-- <?php echo $row['item_deals']; ?> -->
                  <span class="badge " style="margin: 5px; color:white;background-color: rgb(60,91,111);">
                    <?php echo $row2['name']; ?>
                  </span>
                <?php } ?>
              </td>
              <td>


                <?php echo $row['status']; ?>
              </td>
              <td data-mdb-riple-init data-mdb-modal-init data-mdb-target="#remarks_history<?php echo $row['prospect_id']; ?>">
                <!-- remarks history -->
                <?php
                $sql6 = "SELECT MAX(remarks_id) AS `max_remarks` FROM remarks_history WHERE `prospect_id`='$prospect_id'";
                $stmt6 = $con->prepare($sql6);
                $stmt6->execute();
                while ($row6 = $stmt6->fetch()) {
                  $max_remarks =  $row6['max_remarks'];
                  $max_remarks =  $row6['max_remarks'];
                }
                ?>

                <?php
                $sql5 = "SELECT MAX(remarks_id), remarks_desc, DATE_FORMAT(`date`, '%M %d, %Y - %r') AS `date` FROM remarks_history WHERE `prospect_id`='$prospect_id' AND `remarks_id`='$max_remarks'";
                $stmt5 = $con->prepare($sql5);
                $stmt5->execute();
                while ($row5 = $stmt5->fetch()) {
                  echo $row5['remarks_desc'];
              
                }
                ?>



              </td>
              <td>
                <?php
                if (strlen($row['pdf']) == 0) {
                  echo " ";
                } else {
                  echo "<u><a href='{$row['pdf']}' target='_blank'>LINK</a></u>";
                }

                ?>
              </td>
              <td>
                <?php echo $row['quotation']; ?>
              </td>
              <td>
                <button style="margin: 5px;" type="button" class="btn btn-custom-view btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#view_prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-eye me-2"></i>
                  View
                </button>

                <button style="margin: 5px;" type="button" class="btn btn-custom-update btn-rounded" data-mdb-riple-init data-mdb-modal-init data-mdb-target="#edit-prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-pen me-2"></i>
                  Edit
                </button>
                <!-- <button style="margin: 5px;" type="button" class="btn btn-custom-delete btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#delete-modal<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-trash-can me-2"></i>
                  Delete
                </button> -->


<button style="margin: 5px;" type="button" class="btn btn-custom-remarks btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#remarks_prospect<?php echo $row['prospect_id']; ?>">
<i class="fas fa-comment me-2"></i>
                  Add Remarks
                </button>

              </td>
            </tr>
          <?php
            include 'new_prospect_update.php';
          }
          ?>
        </tbody>
      </table>
    </div>

    
    <!-- <script>
      function fetchDataAndUpdateDiv() {
        // Perform Ajax request
        fetch('http://localhost/crm_fae/new_prospect.php')
          .then(response => {
            if (!response.ok) {
              throw new Error('Network response was not ok');
            }
            return response.text(); // Assuming response is text, adjust if necessary
          })
          .then(data => {
            // Update the content of the div with the fetched data
            document.getElementById('approveContent').innerHTML = data;
          })
          .catch(error => {
            // Handle errors
            console.error('There was a problem with the fetch operation:', error);
          });
      }

      // Run the function initially
      fetchDataAndUpdateDiv();

      // Run the function every second
      setInterval(fetchDataAndUpdateDiv, 1000);
    </script> -->
    <div id="pendingContent" class="content-block" style="display: none;">
      <h1>PENDING</h1>
      <table id="pending_table" class="table table-striped table-bordered border-dark " style="width:100%">
        <thead>
          <tr class="bg-dark table-bordered border-dark">
            <th class="text-white">COMPANY NAME</th>
            <th class="text-white">ITEM DEALS</th>
            <th class="text-white">STATUS</th>
            <th class="text-white">REMARKS</th>
            <th class="text-white">PDF LINK</th>
            <th class="text-white">QUOTATION</th>
            <th class="text-white">ACTION</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM new_prospect WHERE `status` != 'Close Deals' AND `stat_id`='1'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch()) {
          ?>
            <tr>
              <td>
                <?php echo $row['company_name']; ?>
              </td>
              <td>
                <?php
                $prospect_id = $row['prospect_id'];

                $sql2 = "SELECT * FROM item_deals WHERE `prospect_id` = '$prospect_id'";
                $stmt2 = $con->prepare($sql2);
                $stmt2->execute();
                while ($row2 = $stmt2->fetch()) {

                ?>
                  <!-- <?php echo $row['item_deals']; ?> -->
                  <span class="badge " style="margin: 5px; color:white;background-color: rgb(60,91,111);">
                    <?php echo $row2['name']; ?>
                  </span>
                <?php } ?>
              </td>
              <td>


                <?php echo $row['status']; ?>
              </td>
              <td data-mdb-riple-init data-mdb-modal-init data-mdb-target="#remarks_history<?php echo $row['prospect_id']; ?>">
                <!-- remarks history -->
                <?php
                $sql6 = "SELECT MAX(remarks_id) AS `max_remarks` FROM remarks_history WHERE `prospect_id`='$prospect_id'";
                $stmt6 = $con->prepare($sql6);
                $stmt6->execute();
                while ($row6 = $stmt6->fetch()) {
                  $max_remarks =  $row6['max_remarks'];
                  $max_remarks =  $row6['max_remarks'];
                }
                ?>

                <?php
                $sql5 = "SELECT MAX(remarks_id), remarks_desc, DATE_FORMAT(`date`, '%M %d, %Y - %r') AS `date` FROM remarks_history WHERE `prospect_id`='$prospect_id' AND `remarks_id`='$max_remarks'";
                $stmt5 = $con->prepare($sql5);
                $stmt5->execute();
                while ($row5 = $stmt5->fetch()) {
                  echo $row5['remarks_desc'];
              
                }
                ?>



              </td>
              <td>
                <?php
                if (strlen($row['pdf']) == 0) {
                  echo " ";
                } else {
                  echo "<u><a href='{$row['pdf']}' target='_blank'>LINK</a></u>";
                }

                ?>
              </td>
              <td>
                <?php echo $row['quotation']; ?>
              </td>
              <td>
                <button style="margin: 5px;" type="button" class="btn btn-custom-view btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#view_prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-eye me-2"></i>
                  View
                </button>

                <button style="margin: 5px;" type="button" class="btn btn-custom-update btn-rounded" data-mdb-riple-init data-mdb-modal-init data-mdb-target="#edit-prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-pen me-2"></i>
                  Edit
                </button>
                <!-- <button style="margin: 5px;" type="button" class="btn btn-custom-delete btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#delete-modal<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-trash-can me-2"></i>
                  Delete
                </button> -->


<button style="margin: 5px;" type="button" class="btn btn-custom-remarks btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#remarks_prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-eye me-2"></i>
                  Add Remarks
                </button>

              </td>
            </tr>
          <?php
            include 'new_prospect_update.php';
          }
          ?>
        </tbody>
      </table>

    </div>
    <!-- rejected -->
    <div id="rejectedContent" class="content-block" style="display: none;">
      <h1>REJECTED</h1>
      <table id="rejected_table" class="table table-striped table-bordered border-dark " style="width:100%">
        <thead>
          <tr class="bg-dark table-bordered border-dark">
            <th class="text-white">COMPANY NAME</th>
            <th class="text-white">ITEM DEALS</th>
            <th class="text-white">STATUS</th>
            <th class="text-white">REMARKS</th>
            <th class="text-white">PDF LINK</th>
            <!-- <th class="text-black">ACTION</th> -->
          </tr>
        </thead>
        <tbody>

          <?php
          $sql = "SELECT * FROM new_prospect WHERE `status` != 'Close Deals' AND `stat_id`='3'";
          $stmt = $con->prepare($sql);
          $stmt->execute();
          while ($row = $stmt->fetch()) {
          ?>
            <tr>
              <td>
                <?php echo $row['company_name']; ?>
              </td>
              <td>
                <?php
                $prospect_id = $row['prospect_id'];

                $sql2 = "SELECT * FROM item_deals WHERE `prospect_id` = '$prospect_id'";
                $stmt2 = $con->prepare($sql2);
                $stmt2->execute();
                while ($row2 = $stmt2->fetch()) {

                ?>
                  <!-- <?php echo $row['item_deals']; ?> -->
                  <span class="badge " style="margin: 5px; color:white;background-color: rgb(60,91,111);">
                    <?php echo $row2['name']; ?>
                  </span>
                <?php } ?>
              </td>
              <td>

                <?php echo $row['status']; ?>
              </td>
              <td data-mdb-riple-init data-mdb-modal-init data-mdb-target="#remarks_history<?php echo $row['prospect_id']; ?>">
                <!-- remarks history -->
                <?php
                $sql6 = "SELECT MAX(remarks_id) AS `max_remarks` FROM remarks_history WHERE `prospect_id`='$prospect_id'";
                $stmt6 = $con->prepare($sql6);
                $stmt6->execute();
                while ($row6 = $stmt6->fetch()) {
                  $max_remarks =  $row6['max_remarks'];
                }
                ?>

                <?php
                $sql5 = "SELECT MAX(remarks_id), remarks_desc, DATE_FORMAT(`date`, '%M %d, %Y - %r') AS `date` FROM remarks_history WHERE `prospect_id`='$prospect_id' AND `remarks_id`='$max_remarks'";
                $stmt5 = $con->prepare($sql5);
                $stmt5->execute();
                while ($row5 = $stmt5->fetch()) {
                  echo $row5['remarks_desc'];
                }
                ?>


              </td>
              <td>
                <?php
                if (strlen($row['pdf']) == 0) {
                  echo " ";
                } else {
                  echo "<u><a href='{$row['pdf']}' target='_blank'>LINK</a></u>";
                }

                ?>
              </td>

              <!-- <td>
                <button style="margin: 5px;" type="button" class="btn btn-custom-view btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#view_prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-eye me-2"></i>
                  View
                </button>

                <button style="margin: 5px;" type="button" class="btn btn-custom-update btn-rounded" data-mdb-riple-init data-mdb-modal-init data-mdb-target="#edit-prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-pen me-2"></i>
                  Edit
                </button>
                <button style="margin: 5px;" type="button" class="btn btn-custom-delete btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#delete-modal<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-trash-can me-2"></i>
                  Delete
                </button>

                <button style="margin: 5px;" type="button" class="btn btn-custom-view btn-rounded" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#remarks_prospect<?php echo $row['prospect_id']; ?>">
                  <i class="fas fa-eye me-2"></i>
                  Add Remarks
                </button>
              </td> -->
            </tr>
          <?php
            include 'new_prospect_update.php';
          }
          ?>
        </tbody>
      </table>
      
    </div>

    <?php
    $sql1 = "SELECT * FROM status";
    $stmt1 = $con->prepare($sql1);
    $stmt1->execute();
    $data1 = $stmt1->fetchAll();
    ?>
    <div class=" mt-5">




      <!-- <div class=" mt-2">
        <button type="button" class="btn btn-outline-secondary btn-rounded approve-btn" data-mdb-ripple-init data-mdb-ripple-color="dark">Approve</button>
        <button type="button" class="btn btn-outline-secondary btn-rounded pending-btn" data-mdb-ripple-init data-mdb-ripple-color="dark">Pending</button>
        <button type="button" class="btn btn-outline-secondary btn-rounded decline-btn" data-mdb-ripple-init data-mdb-ripple-color="dark">Decline</button>
      </div> -->




    </div>
  </div>







  <div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add new prospect</h5>
          <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="mydiv1">
          <form style="width: 26rem;" action="new_prospect_process.php" method="POST">
            <!-- Name input -->

            <input type="hidden" name="user_id" value="  <?php echo  $_SESSION["user_id"] ?>">

            <div class="form-floating mb-3">
              <input type="input" class="form-control textInput" id="comp_name" name="comp_name" placeholder="Company name" required>
              <label for="comp_name">Company Name</label>
            </div>
            <!-- <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="textInput" name="item_deal" placeholder="Item Deal" onkeypress="handleKeyPress(event)" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'> </textarea>
                <label for="item_deal">Item Deal</label>
              </div> -->

            <?php include 'deals.php'; ?>
            <!-- item deals -->
            <!-- <table id="TextBoxesGroup" class="table">
              <tr class="type">

              </tr>
              <tr class="name">
                <td>
                  <label>Item Deals</label>
                </td>
                <td>
                  <input type="input" name="name[]" class="form-control" />
                </td>
              </tr>

            </table>
            <table>
              <tr>
                <td>

                  <button type="button" id="addButton" class="btn btn-success"><i class="fas fa-circle-plus"></i> </button>
                </td>
                </td>
                <td>
                  <input type="button" id="removeButton" value="Remove" class="btn btn-danger" />
                </td>
                <td>
                  <input type="button" id="resetButton" value="Reset" class="btn btn-warning" />
                </td>
              </tr>
              <tr> -->
            <!-- <td>
                  <input type="submit" value="submit" />
                </td> -->
            <!-- </tr>
            </table> -->
            <?php
            $sql1 = "SELECT * FROM status";
            $stmt1 = $con->prepare($sql1);
            $stmt1->execute();
            $data1 = $stmt1->fetchAll();
            ?>
            <div class="form-floating mb-3">
  <div class="row">
    <div class="col-md-6">
      <div class="form-floating">
        <select class="form-select" id="status" name="status" aria-label="Floating label select example">
          <option selected>Select Status</option>
          <?php foreach ($data1 as $row1) { ?>
            <option value="<?= htmlspecialchars($row1['status_name']) ?>"><?= htmlspecialchars($row1['status_name']) ?></option>
          <?php } ?>
        </select>
        <label for="status">Sale Cycle</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="text" class="form-control textInput" id="total_sales" name="total_sales" placeholder="Total Sale" id="currency-field" pattern="^\₱\d{1,3}(,\d{3})*(\.\d+)?₱" value="" data-type="currency">
        <label for="total_sales">Total Sale</label>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="input" class="form-control" id="remark" name="remark" placeholder="Remarks">
        <label for="form-control">Remarks</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-floating mb-3">
        <input type="input" class="form-control" id="pdf" name="pdf" placeholder="PDF Link">
        <label for="pdf">PDF Link</label>
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal"> <i class='bx bxs-x-circle me-2'></i>Close</button>
  <button type="submit" name="savedata" id="savedata" onclick="add_deals();" class="btn btn-primary" data-mdb-ripple-init disabled> <i class='bx bxs-save me-2'></i>Save Prospect</button>
</div>

        </form>
      </div>
    </div>
  </div>
  </div>

  <div class="sample accounts" style="display: none;">
    <table id="example" class="table table-striped" style="width:100%;">
      <thead>
        <tr>
          <td>Blank</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Please use the filter</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    function toggleActive(link) {
      var links = document.querySelectorAll('.nav-link');
      links.forEach(function(item) {
        item.classList.remove('active');
      });
      link.classList.add('active');

      var tabName = link.textContent.trim().toLowerCase();
      var contentBlocks = document.querySelectorAll('.content-block');
      contentBlocks.forEach(function(content) {
        if (content.id === tabName + 'Content') {
          content.style.display = 'block';
        } else {
          content.style.display = 'none';
        }
      });

      if (tabName === 'approve') {
        document.querySelector('#approvalContent h1').style.display = 'block';
      } else {
        document.querySelector('#approvalContent h1').style.display = 'none';
      }
    }
  </script>





  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>

  <!-- 
  <script src="js/main.js"></script> -->

  <!-- ====== ionicons ======= -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.bootstrap5.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.colVis.min.js"></script>



  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js"></script>

  <!-- <script>
    // to click add deals when save data
    // Get references to the buttons
    var button1 = document.getElementById("savedata");
    var button2 = document.getElementById("btnSave");

    // Add click event listener to button1
    button1.addEventListener("click", function() {
      // Simulate a click on button2
      setTimeout(function() {
        button2.click(); // Programmatically click the button
    }, 2000); // 2000 milliseconds = 2 seconds
      // button2.click();
    });
  </script> -->


  <!-- disable enter key to click submit -->
  <script>
    document.getElementById("mydiv1").addEventListener("keydown", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
      }
    });
  </script>


  <!-- disable button submit in add new prospect if some input is missing -->
  <script>
    // Get all input elements with class "textInput"
    var inputFields = document.getElementsByClassName("textInput");
    var submitButton = document.getElementById("savedata");


    // Function to check if all input fields are blank
    function areInputsBlank() {
      for (var i = 0; i < inputFields.length; i++) {
        if (inputFields[i].value.trim() !== '') {

          return false; // If any input field is not blank, return false
        }
      }
      return true; // If all input fields are blank, return true
    }

    // Add event listeners to all input fields
    for (var i = 0; i < inputFields.length + 1; i++) {
      inputFields[i].addEventListener("input", function() {
        submitButton.disabled = areInputsBlank(); // Disable button if all input fields are blank
      });
    }
  </script>





  <script>
    $(document).ready(function() {
      // Initialize DataTable
      var table = $('#example').DataTable({
        buttons: [{
            extend: 'copy',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },

        ],
        layout: {
          topStart: 'buttons'
        }
      });



      // Handle status filter
      $('#statusFilter').on('change', function() {
        var status = $(this).val();
        if (status === "") {
          table.column(2).search("").draw(); // Clear the search if "Filter Status" is chosen
        } else {
          table.column(2).search(status).draw(); // Filter based on selected status
        }
      });

      // Handle clear filter button
      $('#clearFilterBtn').on('click', function() {
        $('#statusFilter').val(''); // Clear the selected value in the dropdown
        table.column(2).search("").draw(); // Clear the search filter
        $('#statusFilter option[value=""]').prop('selected', true); // Select "Filter Status" option
      });
    });
  </script>
  <!-- datatable pending -->
  <script>
    $(document).ready(function() {
      // Initialize DataTable
      var table = $('#pending_table').DataTable({
        buttons: [{
            extend: 'copy',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },

        ],
        layout: {
          topStart: 'buttons'
        }
      });



      // Handle status filter
      $('#statusFilter').on('change', function() {
        var status = $(this).val();
        if (status === "") {
          table.column(2).search("").draw(); // Clear the search if "Filter Status" is chosen
        } else {
          table.column(2).search(status).draw(); // Filter based on selected status
        }
      });

      // Handle clear filter button
      $('#clearFilterBtn').on('click', function() {
        $('#statusFilter').val(''); // Clear the selected value in the dropdown
        table.column(2).search("").draw(); // Clear the search filter
        $('#statusFilter option[value=""]').prop('selected', true); // Select "Filter Status" option
      });
    });
  </script>

  <!-- rejected table -->

  <script>
    $(document).ready(function() {
      // Initialize DataTable
      var table = $('#rejected_table').DataTable({
        buttons: [{
            extend: 'copy',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'csv',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'excel',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'pdf',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },
          {
            extend: 'print',
            exportOptions: {
              columns: ':not(:last-child)'
            }
          },

        ],
        layout: {
          topStart: 'buttons'
        }
      });



      // Handle status filter
      $('#statusFilter').on('change', function() {
        var status = $(this).val();
        if (status === "") {
          table.column(2).search("").draw(); // Clear the search if "Filter Status" is chosen
        } else {
          table.column(2).search(status).draw(); // Filter based on selected status
        }
      });

      // Handle clear filter button
      $('#clearFilterBtn').on('click', function() {
        $('#statusFilter').val(''); // Clear the selected value in the dropdown
        table.column(2).search("").draw(); // Clear the search filter
        $('#statusFilter option[value=""]').prop('selected', true); // Select "Filter Status" option
      });
    });
  </script>



  <!-- SWEETALERT ADD AND EDIT -->
  <?php
  // Check if 'added' parameter is set and has the value 'success' after adding new data
  // Check if 'updated' parameter is set and has the value 'success' after updating data
  // Check if 'deleted' parameter is set and has the value 'success' after deleting data
  if ((isset($_GET['added']) && $_GET['added'] === 'success') || (isset($_GET['updated']) && $_GET['updated'] === 'success') || (isset($_GET['deleted']) && $_GET['deleted'] === 'success')) {
  ?>
    <script>
      // Show SweetAlert2 alert based on the parameter present in the URL
      Swal.fire({
        title: "Success!",
        text: <?php echo (isset($_GET['added']) && $_GET['added'] === 'success') ? '"You successfully added a new prospect"' : ((isset($_GET['updated']) && $_GET['updated'] === 'success') ? '"You successfully updated the prospect"' : '"You successfully deleted the prospect"'); ?>,
        icon: "success",
        confirmButtonText: "OK"
      });

      // Remove the parameter from the URL
      window.onload = function() {
        if (window.location.search.includes('added=success') || window.location.search.includes('updated=success') || window.location.search.includes('deleted=success')) {
          history.replaceState({}, document.title, window.location.pathname);
        }
      };
    </script>

    <script>
      $(function() {
        $(document).on('click', '.btn-add', function(e) {
          e.preventDefault();

          var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

          newEntry.find('input').val('');
          controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('<span class="glyphicon glyphicon-minus"></span>');
        }).on('click', '.btn-remove', function(e) {
          $(this).parents('.entry:first').remove();

          e.preventDefault();
          return false;
        });
      });
    </script>

  <?php
  }
  ?>

  <script>
    $(function() { // Short way for document ready.
      $("#addButton").on("click", function() {
        if ($(".type").length > 10) { // Number of boxes.
          alert("Only 5 textboxes allow");

          return false;
        }

        var newType = $(".type").first().clone().addClass("newAdded"); // Clone the group and add a new class.
        var newName = $(".name").first().clone().addClass("newAdded"); // Clone the group and add a new class.

        newType.appendTo("#TextBoxesGroup"); // Append the new group.
        newName.appendTo("#TextBoxesGroup"); // Append the new group.
      });

      $("#removeButton").on("click", function() {
        if ($(".type").length == 1) { // Number of boxes.
          alert("No more textbox to remove");

          return false;
        }

        $(".type").last().remove(); // Remove the last group.
        $(".name").last().remove(); // Remove the last group.
      });

      $("#resetButton").on("click", function() {
        $(".newAdded").remove(); // Remove all newly added groups.
      });
    });
  </script>

  <script>
    // for input item deals
    function handleKeyPress(event) {
      // Check if the key pressed is Enter (key code 13)
      if (event.keyCode === 13) {
        event.preventDefault(); // Prevent the default behavior of Enter key (form submission)

        var input = document.getElementById("textInput");
        var cursorPosition = input.selectionStart; // Get the cursor position

        // Get the input value and insert a comma at the cursor position
        var textBeforeCursor = input.value.slice(0, cursorPosition);
        var textAfterCursor = input.value.slice(cursorPosition);
        input.value = textBeforeCursor + ", " + textAfterCursor;

        // Move the cursor after the inserted comma
        input.selectionStart = input.selectionEnd = cursorPosition + 1;
      }
    }
  </script>
  <script>
    //for total sales
    // Jquery Dependency
    // Jquery Dependency

    $("input[data-type='currency']").on({
      keyup: function() {
        formatCurrency($(this));
      },
      blur: function() {
        formatCurrency($(this), "blur");
      }
    });


    function formatNumber(n) {
      // format number 1000000 to 1,234,567
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }


    function formatCurrency(input, blur) {
      // appends $ to value, validates decimal side
      // and puts cursor back in right position.

      // get input value
      var input_val = input.val();

      // don't validate empty input
      if (input_val === "") {
        return;
      }

      // original length
      var original_len = input_val.length;

      // initial caret position 
      var caret_pos = input.prop("selectionStart");

      // check for decimal
      if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
          right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "₱" + left_side + "." + right_side;

      } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = "₱" + input_val;

        // final formatting
        if (blur === "blur") {
          input_val += ".00";
        }
      }

      // send updated string to input
      input.val(input_val);

      // put caret back in the right position
      var updated_len = input_val.length;
      caret_pos = updated_len - original_len + caret_pos;
      input[0].setSelectionRange(caret_pos, caret_pos);
    }
  </script>

  <script>
    // add deals
    function add_deals() {
      // Assuming you have a button with id "myButton"
      var button11 = document.getElementById("btnSave");

      // Simulate a click on the button
      button11.click();
    }
  </script>

  <script>
    // Get all buttons
    let approveBtn = document.querySelector('.approve-btn');
    let pendingBtn = document.querySelector('.pending-btn');
    let declineBtn = document.querySelector('.decline-btn');

    approveBtn.addEventListener('click', function() {
      approveBtn.classList.remove('btn-outline-secondary');
      approveBtn.classList.toggle('btn-primary');
      pendingBtn.classList.remove('btn-primary');
      declineBtn.classList.remove('btn-primary');
    });

    pendingBtn.addEventListener('click', function() {
      pendingBtn.classList.remove('btn-outline-secondary');
      pendingBtn.classList.toggle('btn-primary');
      approveBtn.classList.remove('btn-primary');
      declineBtn.classList.remove('btn-primary');
    });

    declineBtn.addEventListener('click', function() {
      declineBtn.classList.remove('btn-outline-secondary');
      declineBtn.classList.toggle('btn-primary');
      approveBtn.classList.remove('btn-primary');
      pendingBtn.classList.remove('btn-primary');
    });
  </script>
</body>

</html>
