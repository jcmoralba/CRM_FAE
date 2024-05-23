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
        <label for=""> C:/Users/User/Downloads/</label>
    <input type="text" name="dl_path" placeholder="download path">
    <button type="submit" name="dl_path1">set</button>
<input type="text" name="start_row" placeholder="row start">
<input type="text" name="end_row" placeholder="row end">
<button type="submit" name="submit">convert</button>


    </form>
    <p>your dl path: <?php echo  $_SESSION["dl_path"]; ?></p>

   




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
            $sql = "SELECT * FROM data WHERE stat='0' LIMIT 5";
            $stmt = $con1->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <form action="" method="post">
                    <tr>
                   
                        <td>
                            <input type="text" name="model_id" value="<?php echo $row['model_id']; ?>">
                        </td>
                        <td>
                            <!-- <input type="text" name="item_name" value="<?php echo $row['COL 2']; ?>"> -->
                            <textarea name="item_name" id="" cols="30" rows="10"><?php echo $row['item_name']; ?></textarea>
                        </td>
                        <td>
                            <textarea name="desc" id="" cols="30" rows="10"><?php echo nl2br($row['desc']); ?></textarea>
                        </td>
                        <!-- <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['COL 4']); ?></textarea>
                            <input type="text" name="specs1" value="<?php echo nl2br($row['COL 4']); ?>">    
                        </td> -->
                        <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['specs']); ?></textarea>

                        </td>
                        <td>
                            <input type="text" name="pics" value="<?php echo $row['pics']; ?>">
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




    <!-- ideas -->
    <!-- <?php
// Get the URL of the image from Google Drive
$imageUrl = 'https://drive.google.com/uc?id=YOUR_IMAGE_ID';

// Get the image content
$image = file_get_contents($imageUrl);

// Load the image
$sourceImage = imagecreatefromstring($image);

// Get the dimensions of the original image
$sourceWidth = imagesx($sourceImage);
$sourceHeight = imagesy($sourceImage);

// Calculate the new dimensions (e.g., resize to 50% of the original size)
$newWidth = $sourceWidth * 0.5;
$newHeight = $sourceHeight * 0.5;

// Create a new image with the resized dimensions
$resizedImage = imagecreatetruecolor($newWidth, $newHeight);

// Resize the original image to the new dimensions
imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $sourceWidth, $sourceHeight);

// Output the resized image
header('Content-Type: image/jpeg');
imagejpeg($resizedImage);

// Free up memory
imagedestroy($sourceImage);
imagedestroy($resizedImage);
?> -->

