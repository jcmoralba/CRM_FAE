<?php
session_start();
include 'includes/connect.php';
// Check if the emails variable is set and not empty
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $model_id = $_POST['model_id'];
    $item_name = $_POST['item_name'];
    $desc = $_POST['desc'];
    $specs = $_POST['specs'];
    $status = $_POST['status'];
    $pics = $_POST['pics'];
    // <br />


    // remove all the unwanted charaters

    $pics = str_replace("?usp=sharing", "", $pics);
    $link_id = str_replace("https://drive.google.com/file/d/", "", $pics);
    $link_id  = str_replace("/view", "",  $link_id);

    echo "pics:" . $pics . "\n" . "\n";

    $specs = str_replace("<br />", "", $specs);
    $specs = str_replace(" ? ", '', $specs);
    $specs = str_replace("? ", '', $specs);
    $specs = str_replace("?", '', $specs);

    $desc = str_replace("<br />", "", $desc);
    $desc = str_replace(" ? ", '', $desc);
    $desc = str_replace("? ", '', $desc);
    $desc = str_replace("?", '', $desc);
    $txt_name =  preg_replace('~[\\\\/:*?"<>|]~', ' ', $item_name);

    // Get input data
    //  $input = $_POST["input"];

    // Define the file path
    //  $file_path = "saved_data.txt";
    $file_path = "data/" . $txt_name . ".txt";
    //C:\Users\jc\Documents\
    // Open the file in append mode
    file_put_contents($file_path, "");
    $file = fopen($file_path, "a");

    // Write input data to the file
    fwrite(
        $file,
        "Model ID: " . $model_id . "\n" .  "\n" .
            "Item Name: " . $item_name . "\n" .  "\n" .
            "Description: " . "\n" . $desc . "\n" .  "\n" .
            "Specification:" . "\n" . $specs . "\n" . "\n" .
            "Status:" . "\n" . $status . "\n"
    );

    // Close the file
    fclose($file);




    $googleDriveLink = $pics;
    $directDownloadLink = generateDirectDownloadLink($googleDriveLink, $link_id);

    $sql = "UPDATE norbar SET `stat`='1' WHERE `id`='$id'";
    $stmt = $con1->prepare($sql);
    $stmt->execute();
    echo "goods";
    $_SESSION['dl_link'] = $directDownloadLink;
    // Redirect back to the form page
    header("location:$directDownloadLink");
    //    sleep(1);
    //     // header("location:test3.php?goods=$id&dl_link=$directDownloadLink");
    //     header("location:test3.php");
    // exit();
}
if (isset($_POST["all"])) {

    sleep(15);

    // for ($i=0; $i < 50; $i++) { 
    //     echo "<h1 style='color: red;'>ERROR</h1>" . "      ";
    // }
    header("location:test3.php?goods=$id");

    exit();
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