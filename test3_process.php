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
    $file_name = $item_name;

    // $specs = json_decode($specs);
    $specs = str_replace("<br />", "", $specs);
    $desc = str_replace("<br />", "", $desc);
    $txt_name =  preg_replace('~[\\\\/:*?"<>|]~', ' ', $item_name);

    // Get input data
    //  $input = $_POST["input"];

    // Define the file path
    //  $file_path = "saved_data.txt";
    // C:\Users\jc\Downloads\data
    $file_path = "C:/Users/jc/Downloads/" . $txt_name . ".txt";
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

    );

    // Close the file
    fclose($file);

    $sql = "UPDATE data1 SET `stat`='1' WHERE `id`='$id'";
    $stmt = $con1->prepare($sql);
    $stmt->execute();
    echo "goods";
    // Redirect back to the form page
    header("location:test3.php?goods=$id");
    exit();
}
