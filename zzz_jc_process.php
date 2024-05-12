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

    for ($i = 2; $i <= 5000; $i++) {

        $sql = "SELECT * FROM norbar WHERE id='$i'";
        $stmt = $con1->prepare($sql);
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            $id = $row['id'];
            $model_id = $row['COL 1'];
            $item_name = $row['COL 2'];
            $desc = $row['COL 4'];
            $specs = $row['COL 3'];
            $pics = $row['COL 5'];





            $pics = str_replace("?usp=sharing", "", $pics);
            $link_id = str_replace("https://drive.google.com/file/d/", "", $pics);
            $link_id  = str_replace("/view", "",  $link_id);

            echo "pics:" . $pics . "\n" . "\n";

            $model_id = str_replace("?", " ", $model_id);

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
            $file_path = "C:/Users/jc/Downloads/data/" . $txt_name . ".txt";
            //C:\Users\jc\Documents\
            // Open the file in append mode
            file_put_contents($file_path, "");
            $file = fopen($file_path, "a");

            // Write input data to the file
            fwrite(
                $file,
                "Model ID: " . "\n" . $model_id . "\n" .  "\n" .
                    "Item Name: " . "\n" . $item_name . "\n" .  "\n" .
                    "Description: " . "\n" . $desc . "\n" .  "\n" .
                    "Specification:" . "\n" . $specs . "\n"
                // "Status:" . "\n" . $status . "\n"
            );

            // Close the file
            fclose($file);



            //save pics

            $googleDriveLink = $pics;
            $directDownloadLink = generateDirectDownloadLink($googleDriveLink, $link_id);

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



            // save pics v2

            $url =  $directDownloadLink; // URL of the page to be opened in the new tab
            echo '<script>';
            echo 'function openNewTab(url) {';
            echo 'var win = window.open(url, \'_blank\');';
            echo 'win.focus();'; // Focus on the new tab
            echo '}';
            echo 'openNewTab(\'' . $url . '\');'; // Call the function to open the new tab
            echo '</script>';


            sleep(.5);
        }
    }
}

?>

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