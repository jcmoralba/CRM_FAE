<?php
session_start();
include 'includes/connect.php';
// Check if the emails variable is set and not empty
if (isset($_POST["submit1"])) {
    $id = $_POST['id'];
    $model_id = $_POST['model_id'];
    $item_name = $_POST['item_name'];
    $desc = $_POST['desc'];
    $specs = $_POST['specs'];

    $pics = $_POST['pics'];
    // <br />


    // remove all the unwanted charaters

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
    $file_path = "C:/Users/user/Downloads/jcdata/" . $txt_name . ".txt";
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




    $googleDriveLink = $pics;
    $directDownloadLink = generateDirectDownloadLink($googleDriveLink, $link_id);

    $sql = "UPDATE `data` SET `stat`='1' WHERE `id`='$id'";
    $stmt = $con1->prepare($sql);
    $stmt->execute();
    echo "goods";
    $_SESSION['dl_link'] = $directDownloadLink;
    // Redirect back to the form page
    if ($link_id == "N/A") {
        header("location:test3.php?no_images");
        exit();
    }
    // header("location:$directDownloadLink");
    //    sleep(1);
    header("location:test3.php?goods=$id");
    //     header("location:test3.php");
    exit();
}
if (isset($_POST["all"])) {

    sleep(.5);

    for ($i = 0; $i < 50; $i++) {
        echo "<h1 style='color: red;'>ERROR</h1>" . "      ";
    }
    // header("location:test3.php?goods=$id");

    // exit();
}
if (isset($_POST['revert'])) {
    $sql = "SELECT max(id) as MAXID FROM `data` WHERE stat='1' LIMIT 1";
    $stmt = $con1->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch()) {
        $max_id = $row['MAXID'];
    }
    $sql = "UPDATE `data` set `stat`= '0' WHERE id=:id";
    $stmt = $con1->prepare($sql);
    $stmt->bindParam(':id', $max_id);
    $stmt->execute();   
     header("location:test3.php?reverted=$max_id");
}
?>


<!-- 
https://drive.google.com/file/d/your_file_id/view
to
bash
Copy code
https://drive.google.com/uc?export=download&id=your_file_id 

https://sites.google.com/site/gdocs2direct/

-->


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

<!-- 
sample 
https://drive.google.com/file/d/1Xsr19kmdzaOGFnpD-5-KZdY_feTs9m8t/view?usp=sharing
-->