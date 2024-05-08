<?php 
session_start() ?>
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

<body style="margin: 20px;">

    <a href="https://drive.google.com/file/d/1WMwsgOLp_RrYvB0_JkoX1UzTwvx9u91p/view?usp=sharing" download> pdf link </a>
    <form action="test3_process.php" method="post">
        <button name="all" type="convert" class="btn btn-danger" onclick="">convert all</button>
    </form>
    <?php 
    $link = $_GET['dl_link'];
    echo $_SESSION['dl_link'];
    ?>
   <a href="<?php echo $_SESSION['dl_link'];?>">download</a>
   <button class="btn btn-danger"><?php $link ?></button>
    <table id="example" class="table table-bordered" style="width:100%; border:1px solid black;">
        <thead>
            <tr class="bg-dark table-bordered border-dark">
                <th class="text-black">#</th>
                <th class="text-black">MODEL ID</th>
                <th class="text-black">ITEM NAME</th>
                <th class="text-black">DESCRIPTION</th>
                <th class="text-black">SPECIFICATION</th>
                <th class="text-black">PICTURE</th>
                <th class="text-black">STATUS</th>

                <th class="text-black">ACTION</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM norbar WHERE stat='0' LIMIT 40";
            $stmt = $con1->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <form action="test3_process.php" method="post">
                    <tr>
                        <td>
                            <input type="text" name="id" value="<?php echo $row['id']; ?>">
                        </td>
                        <td>
                            <input type="text" name="model_id" value="<?php echo $row['COL 1']; ?>">
                        </td>
                        <td>
                            <!-- <input type="text" name="item_name" value="<?php echo $row['COL 2']; ?>"> -->
                            <textarea name="item_name" id="" cols="30" rows="10"><?php echo $row['COL 2']; ?></textarea>
                        </td>
                        <td>
                            <textarea name="desc" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                        </td>
                        <!-- <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                            <input type="text" name="specs1" value="<?php echo nl2br($row['COL 4']); ?>">    
                        </td> -->
                        <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 3']); ?></textarea>

                        </td>
                        <td>
                            <input type="text" name="pics" value="<?php echo $row['COL 5']; ?>">
                        </td>
                        <td>
                            <input type="text" name="status" value="<?php echo $row['COL 6']; ?>">
                        </td>
                        <td>
                            <button name="submit" type="submit" id="<?php echo $row['id']; ?>" class="btn btn-success">convert</button>
                        </td>
                    </tr>
                </form>
            <?php } ?>

        </tbody>

    </table>

</body>




<!-- 
<script>
   
        // Loop through button IDs from "1" to "5"
        for (var i = 1; i <= 5; i++) {
            // Get the button element by its ID
            var button = document.getElementById(String(i));

            // Trigger a click event on the button if it exists
            if (button) {
                button.click();
            }
        }
  
</script> -->

</html>