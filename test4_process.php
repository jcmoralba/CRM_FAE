<?php
include 'includes/connect.php';
// Check if the emails variable is set and not empty
if (isset($_POST["submit"])) {
    $id = $_POST['id'];
    $model_id = $_POST['model_id'];
    $item_name = $_POST['item_name'];
    $desc = $_POST['desc'];
    $specs = $_POST['specs'];
    // <br />
    $file_name = $item_name;

    // $specs = json_decode($specs);
    $specs = str_replace("<br />", "", $specs);


    // Get input data
    //  $input = $_POST["input"];

    // Define the file path
    //  $file_path = "saved_data.txt";
    $file_path = "data/" . $file_name . ".txt";
    //C:\Users\jc\Documents\
    // Open the file in append mode
    file_put_contents( $file_path, "");
    $file = fopen($file_path, "a");

    // Write input data to the file
    fwrite(
        $file,
        "Model ID: " . $model_id . "\n" .  "\n" .
            "Item Name: " . $item_name . "\n" .  "\n" .
            "Description: " . $desc . "\n" .  "\n" .
            "Technical Specification:" . "\n" . $specs . "\n"
    );

    // Close the file
    fclose($file);

    $sql = "UPDATE momento SET `stat`='1' WHERE `id`='$id'";
    $stmt = $con1->prepare($sql);
    $stmt->execute();
echo "goods";
    // Redirect back to the form page
    header("location:test3.php?goods=$id");
    exit();
}
?>