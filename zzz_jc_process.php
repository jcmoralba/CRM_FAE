<?php include 'includes/connect.php' ?>

<?php
set_time_limit(50000);


if (isset($_POST['submit'])) {

    $row_start = $_POST['start_row'];
    $row_end = $_POST['end_row'];

    $id = "0";
    $model_id = "0";
    $item_name = "0";
    $desc = "0";
    $specs = "0";
    $status = "0";
    $pics = "0";
    $dlallpics = array();

    for ($i = $row_start; $i <= $row_end; $i++) {

        $sql = "SELECT * FROM data WHERE id='$i'";
        $stmt = $con1->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $id = $row['id'];
            $model_id = $row['model_id'];
            $item_name = $row['item_name'];
            $desc = $row['desc'];
            $specs = $row['specs'];
            $pics = $row['pics'];


            $pics = str_replace("?usp=sharing", "", $pics);
            $link_id = str_replace("https://drive.google.com/file/d/", "", $pics);
            $link_id  = str_replace("/view", "",  $link_id);

            // echo "pics:" . $pics . "\n" . "\n";

         
            $model_id = str_replace("<br />", "", $model_id);
            $model_id = str_replace(" ? ", '', $model_id);
            $model_id = str_replace("? ", '', $model_id);
            $model_id = str_replace(" ?", '', $model_id);
            $model_id = str_replace("?", '', $model_id);


            $item_name = str_replace("?", " ", $item_name);

            $specs = str_replace("<br />", "", $specs);
            $specs = str_replace(" ? ", '', $specs);
            $specs = str_replace("? ", '', $specs);
            $specs = str_replace(" ?", '', $specs);
            $specs = str_replace("?", '', $specs);

            $desc = str_replace("<br />", "", $desc);
            $desc = str_replace(" ? ", '', $desc);
            $desc = str_replace("? ", '', $desc);
            $desc = str_replace(" ?", '', $desc);
            $desc = str_replace("?", '', $desc);
            $txt_name =  preg_replace('~[\\\\/:*?"<>|]~', ' ', $item_name);

            // Get input data
            //  $input = $_POST["input"];

            // Define the file path
            //  $file_path = "saved_data.txt";
            $txt_name = trim($txt_name);
            // C:\Users\User\Downloads
            $paths = $_SESSION["dl_path"];
            $file_path = $paths . $txt_name . ".txt";
            //C:\Users\jc\Documents\
            // Open the file in append mode
            if (file_exists($file_path) == true) {
                $file_path = $paths . $txt_name . " (1).txt";
                if (file_exists($file_path) == true) {
                    $file_path = $paths . $txt_name . " (2).txt";
                    if (file_exists($file_path) == true) {
                        $file_path = $paths . $txt_name . " (3).txt";
                        if (file_exists($file_path) == true) {
                            $file_path = $paths . $txt_name . " (4).txt";
                            if (file_exists($file_path) == true) {
                                $file_path = $paths . $txt_name . " (5).txt";
                            }
                        }
                    }
                }
            }
            file_put_contents($file_path, "");
            $file = fopen($file_path, "a");

            // Write input data to the file
            fwrite(
                $file,
                "Model ID: " . "\n" . $model_id . "\n" .  "\n" .
                    "Item Name: " . "\n" . $item_name . "\n" .  "\n" .
                    "Description: " . "\n" . $desc . "\n" .  "\n" 
                    // "Specification:" . "\n" . $specs . "\n"
                // "Status:" . "\n" . $status . "\n"
            );

            // Close the file
            fclose($file);



            //save pics
            $googleDriveLink = $pics;
            $directDownloadLink = generateDirectDownloadLink($googleDriveLink, $link_id);
            $dlallpics[] = $directDownloadLink;

            // $sql = "UPDATE norbar SET `stat`='1' WHERE `id`='$id'";
            // $stmt = $con1->prepare($sql);
            // $stmt->execute();
            // echo "goods";
            // $_SESSION['dl_link'] = $directDownloadLink;
            // // Redirect back to the form page
            // if ($link_id == "N/A") {
            //     header("location:test3.php?no_images");
            //     exit();
            // }
            // header("location:$directDownloadLink");


            //    sleep(1);
            //     // header("location:test3.php?goods=$id&dl_link=$directDownloadLink");
            //     header("location:test3.php");
            // exit();




        }
    }

    // Loop through colors array
    // print_r($dlallpics);

    // Loop through the array and create anchor tags for each URL
    foreach ($dlallpics as $url) {
        echo "<a href='$url' target='_blank'>$url</a><br>";
    }
} elseif (isset($_POST['dl_path1'])) {
    $_SESSION["dl_path"] = $_POST['dl_path'];
    //  echo $_POST['dl_path'];

    echo file_exists("C:/Users/rueda/Downloads/test.txt");


     header("location:zzz_jc.php");

}

?>
<!-- <script>
    // js click thru link
    // https://stackoverflow.com/questions/2260279/click-links-though-javascript
    var myLinks = document.getElementsByTagName("a");
    for (var i = 0; i < myLinks.length; i++) {
        myLinks[i].click();
    }
</script> -->
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