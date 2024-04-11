<?php
include 'sidebar.php';


$company_name = $_GET['data'];

echo $company_name;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

</body>

</html>


<table class="table">
    <thead>
        <tr>
            <th>COMPANY NAME</th>
            <th>PDF LINK</th>
            <th>LAST CONTACTED</th>
            <th>REMARKS</th>
            <th>TOTAL SALES</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM new_prospect WHERE `status` = 'Close Deals' AND `company_name`='$company_name'";

        $sql1 = "SELECT `prospect_id`, `company_name`, `pdf`, `last_contacted`, `remark`, CONCAT('₱',FORMAT(`total_sales`,2,'en_US')) AS `total_sales` FROM `new_prospect` WHERE `status`= 'Close Deals'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
        ?>
            <tr>
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
            </tr>
        <?php
        } ?>
    </tbody>

</table>

<div class="d-grid gap-2 col-6 mx-auto">
   <a href="client_list.php"><button class="btn btn-primary" type="button">Go Back</button></a> 
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>