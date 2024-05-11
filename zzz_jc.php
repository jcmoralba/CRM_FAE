<?php require_once ('includes/connect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="zzz_jc_process.php" method="post">
<input type="text" name="start_row" placeholder="row start">
<input type="text" name="end_row" placeholder="row end">
    <button type="submit" name="submit">convert</button>
    </form>




    <table id="example" class="table table-bordered" style="width:100%; border:1px solid black; margin-top:50px;">
        <thead>
            <tr class="bg-dark table-bordered border-dark">
               
                <th class="text-black">MODEL ID</th>
                <th class="text-black">ITEM NAME</th>
                <th class="text-black">DESCRIPTION</th>
                <th class="text-black">SPECIFICATION</th>
                <th class="text-black">PICTURE</th>
                <th class="text-black">#</th>

                <th class="text-black">ACTION</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM norbar WHERE stat='0' LIMIT 5";
            $stmt = $con1->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <form action="" method="post">
                    <tr>
                   
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
                        <!-- <td>
                            <input type="text" name="status" value="<?php echo $row['COL 6']; ?>">
                        </td> -->
                        <td>
                            <input type="text" name="id" value="<?php echo $row['id']; ?>">
                        </td>
                        <td>
                            <button name="submit" type="submit" id="123" onclick="jc()" class="btn btn-success">convert</button>
                        </td>
                    </tr>
                </form>
            <?php } ?>

        </tbody>

    </table>
</body>
</html>