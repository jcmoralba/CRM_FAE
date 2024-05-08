<?php
include 'includes/connect.php';
// Check if the emails variable is set and not empty
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $model_id = $_POST['model_id'];
    $item_name = $_POST['item_name'];
    $desc = $_POST['desc'];
    $specs = $_POST['specs'];
    $status = $_POST['status'];
    // <br />


    // remove all the unwanted charaters
    $specs = str_replace("<br />", "", $specs);
    $specs = str_replace(" ? ",'', $specs);
    $specs = str_replace("? ",'', $specs);
    $specs = str_replace("?",'', $specs);

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
    file_put_contents( $file_path, "");
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

    $sql = "UPDATE norbar SET `stat`='1' WHERE `id`='$id'";
    $stmt = $con1->prepare($sql);
    $stmt->execute();
echo "goods";
    // Redirect back to the form page
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
function generateDirectDownloadLink($googleDriveLink) {
    // Extract file ID from the Google Drive link
    $urlParts = parse_url($googleDriveLink);
    parse_str($urlParts['query'], $query);
    $fileId = $query['id'];

    // Construct direct download link
    $directDownloadLink = "https://drive.google.com/uc?export=download&id=" . $fileId;

    return $directDownloadLink;
}

// Example usage
$googleDriveLink = "https://drive.google.com/file/d/your_file_id/view";
$directDownloadLink = generateDirectDownloadLink($googleDriveLink);
echo "Direct Download Link: " . $directDownloadLink;
 ?>