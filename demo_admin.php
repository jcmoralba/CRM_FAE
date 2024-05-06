<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="css/button-custom-color.css">

</head>
<?php  ?>

<body style="margin: 20px;">
    <h1>DEMO ADMIN APPROVAL</h1>
    <form action="demo_admin_process.php" method="post">
        <table id="pending_table" class="table table-striped table-bordered border-dark " style="width:100%">
            <thead>
                <tr class="bg-dark table-bordered border-dark">
                    <th class="text-black">COMPANY NAME</th>
                    <th class="text-black">ITEM DEALS</th>
                    <th class="text-black">STATUS</th>
                    <th class="text-black">REMARKS</th>
                    <th class="text-black">PDF LINK</th>
                    <th class="text-black">EMPLOYEE</th>
                    <th class="text-black">ACTION</th>
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
                            <input type="HIDDEN" name="prospect_id" value="<?php echo $row['prospect_id'] ?>">
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
                                <span class="badge bg-secondary" style="margin: 5px;">
                                    <?php echo $row2['name']; ?>
                                </span>
                            <?php } ?>
                        </td>
                        <td>
                            <?php
                            $status1 = $row['stat_id'];
                            if ($status1 == 1) {
                                echo "pending:     ";
                            } elseif ($status1 == 3) {
                                echo "rejected:     ";
                            }

                            ?>
                            <?php echo $row['status']; ?>
                        </td>
                        <td>
                            <?php echo $row['remark']; ?>
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
                            employee name
                        </td>
                        <td>

                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#view_prospect<?php echo $row['prospect_id']; ?>">
                                View
                            </button>
                            <button type="button" name="aprroved" class="btn btn-success" onclick="aprroved()">
                                Aprrove
                            </button>
                            <button type="submit" name="declined" class="btn btn-danger">
                                Decline
                            </button>


                    </tr>
                <?php
                    include 'demo_admin_modal.php';
                }
                ?>
            </tbody>
        </table>
    </form>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function approve() {
        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire("Saved!", "", "success");
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
        });
    }
</script>

</html>