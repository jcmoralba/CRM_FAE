<?php require_once('db-connect.php');
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scheduling</title>

    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />  
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }

        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-5">
  <p class="h2 mt-5">Itenerary</p>


<div id="approveContent" class="content-block">
    <div class="row">
        <div class="col-md-6">
            <!-- Content in the left column (if any) -->
        </div>
        <div class="col-md-6 text-md-end">
            <!-- Button aligned to the right side -->
            <button type="button" class="btn btn-success btn-rounded mt-5 me-2" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#staticBackdrop">
            
            <i class="fas fa-calendar me-2"></i>  
            Add Event
            </button>
        </div>
    </div>
</div>





<div class="modal fade" id="staticBackdroppp" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Attendance</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <form action="attendance_process.php" method="post">
          <input type="hidden" name="date_time" value="<?php echo date('Y-m-d H:i:s');?>">
          <input type="hidden" name="user" value="<?php echo $_SESSION['user'];?>">
          <button type="submit" name="time_in" class="btn btn-success" data-mdb-ripple-init>Time in</button>
          <button type="submit" name="time_out" class="btn btn-warning" data-mdb-ripple-init>Time out</button>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
</div>

<!-- ADD EVENT MODAL -->
<div class="modal fade" id="staticBackdrop" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Schedule Form</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form action="event-calendar-save.php" method="post" id="schedule-form">
            <input type="hidden" name="id" value="">
            <div class="form-group mb-2">
              <label for="title" class="control-label">Title</label>
              <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
            </div>
            <div class="form-group mb-2">
              <label for="description" class="control-label">Description</label>
              <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
            </div>
            <div class="form-group mb-2">
              <label for="start_datetime" class="control-label">Start</label>
              <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
            </div>
            <div class="form-group mb-2">
              <label for="end_datetime" class="control-label">End</label>
              <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-success btn-rounded " form="schedule-form"><i class='bx bxs-save me-2'></i>Save</button>  
      <button type="button" class="btn btn-danger btn-rounded" data-mdb-ripple-init data-mdb-dismiss="modal"><i class='bx bxs-x-circle me-2' ></i>Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- ADD EVENT MODAL -->

<!-- EDIT/UPDATE MODAL -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="event-calendar-save.php" method="post" id="editEventForm">
          <input type="hidden" name="id" id="editEventId">
          <div class="mb-3">
            <label for="editEventTitle" class="form-label">Title</label>
            <input type="text" class="form-control" id="editEventTitle" name="title">
          </div>
          <div class="mb-3">
            <label for="editEventDescription" class="form-label">Description</label>
            <textarea class="form-control" id="editEventDescription" name="description"></textarea>
          </div>
          <div class="mb-3">
            <label for="editEventStartDateTime" class="form-label">Start Date and Time</label>
            <input type="datetime-local" class="form-control" id="editEventStartDateTime" name="start_datetime">
          </div>
          <div class="mb-3">
            <label for="editEventEndDateTime" class="form-label">End Date and Time</label>
            <input type="datetime-local" class="form-control" id="editEventEndDateTime" name="end_datetime">
          </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-rounded"> <i class='bx bxs-save me-2' ></i>Save Changes</button>
          <button type="button" class="btn btn-danger btn-rounded" data-mdb-ripple-init data-mdb-dismiss="modal"> <i class='bx bxs-x-circle me-2'></i>Close</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- EDIT/UPDATE MODAL -->

<!-- DELETE MODAL -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this scheduled event?
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal"> <i class='bx bxs-x-circle me-2'></i>Close</button>
        <button type="button" class="btn btn-danger" id="confirmDelete"> <i class='bx bxs-trash me-2'></i>Remove</button>
      </div>
    </div>
  </div>
</div>
<!-- DELETE MODAL -->

<!-- MARK AS DONE MODAL -->
<div
  class="modal fade"
  id="confirm"
  data-mdb-backdrop="static"
  data-mdb-keyboard="false"
  tabindex="-1"
  aria-labelledby="confirmLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmLabel">Confirm event</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Are you sure you want to label mark as done youre event?</div>
      <div class="modal-footer">
<<<<<<< HEAD
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="markAsDone" data-mdb-ripple-init>Yes</button>
=======
      <button type="button" class="btn btn-success" data-mdb-ripple-init>Done</button>  
      <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-dismiss="modal"><i class='bx bxs-x-circle me-2'></i> Close</button>
>>>>>>> 87a8b28691362776624612d2a63af356ae9707f7
      </div>
    </div>
  </div>
</div>
<!-- MARK AS DONE MODAL -->


    <div class="container py-5" id="page-container">
        <div class="row">
            <div>
                <div id="calendar"></div>
            </div>
        </div>
    </div>


    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                </div>
                <div class="modal-body rounded-0">
<<<<<<< HEAD
                  <div class="container-fluid">
                      <dl>
                          <dt class="text-muted">Title</dt>
                          <dd id="title" class="fw-bold fs-4"></dd>
                          <dt class="text-muted">Description</dt>
                          <dd id="description" class=""></dd>
                          <dt class="text-muted">Start</dt>
                          <dd id="start" class=""></dd>
                          <dt class="text-muted">End</dt>
                          <dd id="end" class=""></dd>
                          <button type="button" class="btn btn-primary mt-2 mb-2" id="asDone" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#confirm"><i class="far fa-calendar-check me-2"></i>Mark as done</button>
                      </dl>
                  </div>
              </div>
              <div class="modal-footer rounded-0">
                  <div class="text-end">
                      <button type="button" class="btn btn-primary" id="edit" data-id=""> <i class='bx bxs-pencil me-2'></i>Edit</button>
                      <button type="button" class="btn btn-danger" id="delete" data-id=""> <i class='bx bxs-trash me-2'></i>Delete</button>
                      <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal"><i class='bx bxs-x-circle me-2' ></i>Close</button>
                  </div>
              </div>
=======
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                            <button type="button" class="btn btn-success mt-2 mb-2" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#confirm"><i class="far fa-calendar-check me-2"></i>Mark as done</button>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                    <button type="button" class="btn btn-primary btn-rounded" id="edit" data-id=""> <i class='bx bxs-pencil me-2'></i>Edit</button>

                        <button type="button" class="btn btn-danger btn-rounded" id="delete" data-id=""> <i class='bx bxs-trash me-2'></i>Remove</button>
                        <button type="button" class="btn btn-secondary btn-rounded" data-mdb-ripple-init data-mdb-dismiss="modal"><i class='bx bxs-x-circle me-2' ></i>Close</button>
                    </div>
                </div>
>>>>>>> 87a8b28691362776624612d2a63af356ae9707f7
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->


    


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>

    <?php
    $schedules = $conn->query("SELECT * FROM `schedule_list`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }
    ?>
    <?php
    if (isset($conn)) $conn->close();
    ?>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>

</html>