<?php
session_start();
include "sidebar.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <div>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <p class="text-2xl font-bold mb-4">Client List</p>
        </div>

        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <table class="table">
                <thead>
                    <tr>
                        <th>COMPANY NAME</th>
                        <th>PDF LINK</th>
                        <th>LAST CONTACTED</th>
                        <th>REMARKS</th>
                        <th>TOTAL SALES</th>
                        <th>ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM new_prospect WHERE `status` = 'Close Deals'";

                    $sql1 = "SELECT `prospect_id`, `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM `new_prospect` WHERE `status`= 'Close Deals'";
                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                    ?>
                        <tr>
                            <!-- <td name="prospect_id">
                                <?php echo $row['prospect_id']; ?>
                            </td> -->
                            <td name="company_name">
                                <?php echo $row['company_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['pdf']; ?>
                            </td>
                            <td>
                                <?php echo $row['last_contacted']; ?>
                            </td>
                            <td>
                                <?php echo $row['remark']; ?>
                            </td>
                            <td>
                                <?php echo $row['total_sales']; ?>
                            </td>
                            <td>
                                <a href="client_list_view.php?data=<?php echo $row['company_name']; ?>">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-userid="<?php echo $row['prospect_id']; ?>">
                                        View
                                    </button>
                                </a>

                            </td>

                        </tr>

                    <?php
                        // include 'client_list_update.php';

                    }

                    ?>

                </tbody>
            </table>

            <?php  ?>
        </div>
    </div>


    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>

    </script>

</body>

</html>