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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body style="margin: 20px;">


    <h5>NOTE: Delete the textfile named['Item Name.txt', '.txt', 'N A.txt']</h5>
    <a href="https://drive.google.com/file/d/1WMwsgOLp_RrYvB0_JkoX1UzTwvx9u91p/view?usp=sharing" download> pdf link </a>
    <form action="test3_process.php" method="post">
        <button name="all" id="reload" type="convert" class="btn btn-danger" onclick="">convert all</button>
        <button name="revert" type="submit">revert</button>
    </form>


    <img src="img/cat.gif" style="
   height: 100px; width:auto; border-radius:5%;  margin-left: auto;margin-right: 0; margin-top:-100px;display:block;" alt="JC">

    <table id="example" class="table table-bordered" style="width:100%; border:1px solid black;">
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
            $sql = "SELECT * FROM `data` WHERE stat='0' LIMIT 1";
            $stmt = $con1->prepare($sql);
            $stmt->execute();
            while ($row = $stmt->fetch()) {
            ?>
                <form action="test3_process.php" method="post">
                    <tr>
                        <td>
                            <input type="text" name="model_id" value="<?php echo $row['model_id']; ?>">
                        </td>
                        <td>
                            <textarea name="item_name" id="" cols="30" rows="10"><?php echo $row['item_name']; ?></textarea>
                        </td>
                        <td>
                            <textarea name="desc" id="" cols="30" rows="10"><?php echo nl2br($row['desc']); ?></textarea>
                        </td>
                        <td>
                            <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['specs']); ?></textarea>
                        </td>
                        <td>
                            <input type="text" name="pics" value="<?php echo $row['pics']; ?>">
                            <?php $pics =  $row['pics']; ?>
                        </td>               
                        <td>
                            <input type="text" name="id" value="<?php echo $row['id']; ?>">
                        </td>
                        <td>
                            <button name="submit1" type="submit" id="123" onclick="jc(<?php $pics ?>)" class="btn btn-success">convert</button>
                        </td>
                    </tr>
                </form>
            <?php } ?>

        </tbody>

    </table>



    <?php echo $pics; ?>
    <?php
    // remove all the unwanted charaters

    $pics = str_replace("?usp=sharing", "", $pics);
    $link_id = str_replace("https://drive.google.com/file/d/", "", $pics);
    $link_id  = str_replace("/view", "",  $link_id);


    $googleDriveLink = $pics;
    $directDownloadLink = generateDirectDownloadLink($googleDriveLink, $link_id);
    echo  "<br>" . "\r\n" . $directDownloadLink;
    // $directDownloadLink = "https://example.com";
    ?>
    <a id="dl" target="_blank" href="<?php echo $directDownloadLink; ?>"> jc <3</a>
            <button onclick="openLinkInNewTab(<?php $directDownloadLink ?>)">test</button>
            <a href="<?php $directDownloadLink ?>" target="_blank" onclick="window.open( '<?php $directDownloadLink ?>' ); return false;">Open New Link</a>

            <script>
                function jc(check_pics) {
                    var button = document.getElementById('dl');
                    if (check_pics == "N/A") {

                    } else {
                        button.click();
                    }

                }
            </script>
            <?php
            function generateDirectDownloadLink($googleDriveLink, $linkid)
            {
                // Extract file ID from the Google Drive link
                $urlParts = parse_url($googleDriveLink);
                // parse_str($urlParts['query'], $query);
                $fileId = $linkid;

                // Construct direct download link
                $directDownloadLink = "https://drive.google.com/uc?export=download&id=" . $fileId;

                return $directDownloadLink;
            }

            // Example usage
            // $googleDriveLink = "https://drive.google.com/file/d/your_file_id/view";
            // $directDownloadLink = generateDirectDownloadLink($googleDriveLink, $linkid);
            // echo "Direct Download Link: " . $directDownloadLink;
            ?>
            <!-- table bottom -->

            <table id="example" class="table table-bordered" style="width:100%; border:1px solid black;">
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
                    $sql = "SELECT * FROM `data` WHERE stat='0' LIMIT 5";
                    $stmt = $con1->prepare($sql);
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                    ?>
                        <form action="test3_process123.php" method="post">
                            <tr>

                                <td>
                                    <input type="text" name="model_id" value="<?php echo $row['model_id']; ?>">
                                </td>
                                <td>
                                    <textarea name="item_name" id="" cols="30" rows="10"><?php echo $row['item_name']; ?></textarea>
                                </td>
                                <td>
                                    <textarea name="desc" id="" cols="30" rows="10"><?php echo nl2br($row['desc']); ?></textarea>
                                </td>                
                                <td>
                                    <textarea name="specs" id="" cols="30" rows="10"><?php echo nl2br($row['specs']); ?></textarea>
                                </td>
                                <td>
                                    <input type="text" name="pics" value="<?php echo $row['pics']; ?>">
                                </td>                      
                                <td>
                                    <input type="text" name="id" value="<?php echo $row['id']; ?>">
                                </td>
                                <td>

                                </td>
                            </tr>
                        </form>
                    <?php } ?>

                </tbody>

            </table>

</body>


<script>
    document.getElementById('123').addEventListener('click', function() {
        document.getElementById('reload').click();
    });
</script>



</html>