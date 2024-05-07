<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
    <form action="test3_process.php" method="get">
        <table id="example" class="table table-striped-columns" style="width:100%; border:1px solid black;">
            <thead>
                <tr class="bg-dark table-bordered border-dark">
                    <th class="text-white">MODEL ID</th>
                    <th class="text-white">ITEM NAME</th>
                    <th class="text-white">DESCRIPTION</th>
                    <th class="text-white">SPECS</th>

                    <th class="text-white">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM torqcomm";
                $stmt = $con1->prepare($sql);
                $stmt->execute();
                while ($row = $stmt->fetch()) {
                ?>
                    <tr>
                        <td>
                            <p name="model_id">
                                <?php echo $row['COL 1']; ?>
                            </p>
                        </td>
                        <td>
                            <?php echo $row['COL 2']; ?>
                        </td>
                        <td>
                            <?php echo $row['COL 3']; ?>
                        </td>
                        <td>
                            <?php echo $row['COL 4']; ?>
                        </td>
                        <td>
                            <button name="submit" type="submit" class="button">convert</button>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>

        </table>
    </form>
</body>

</html>