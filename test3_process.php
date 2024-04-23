<?php
require_once ('includes/connect.php');
// Check if the emails variable is set and not empty
if (isset($_POST["emails"]) && !empty($_POST["emails"])) {
    // Get the emails array from POST data and decode it
    $emails = json_decode($_POST["emails"]);


    // Perform any necessary processing with the emails array
    // For demonstration purposes, let's just echo the emails back
    echo "Emails received: " . implode(", ", $emails);



    //save to database
     // Your database credentials
     $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "crm";
 
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
 
     // Check connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }

     // for deals
     $max_prospect_id =0;
     $sql1 = "SELECT MAX(prospect_id) AS maxProspect FROM new_prospect;";
     $stmt1 = $con->prepare($sql1);
     $stmt1->execute();
     while ($row1 = $stmt1->fetch()) {
         $max_prospect_id = $row1['maxProspect'];
     }
     $_SESSION['max_prospect'] = $max_prospect_id ;
 
     // Prepare and execute SQL statement to insert data into the database
     $number = $_SESSION['max_prospect'];
     $user_id = 1;
     $max_prospect_id = $max_prospect_id + 1;
     $sql = "INSERT INTO item_deals (prospect_id, deal_name) VALUES (  $max_prospect_id, ?)";
     $stmt = $conn->prepare($sql);
     $stmt->bind_param("s", $emails);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data into the database
    $sql1 = "SELECT MAX(prospect_id) AS max_prospect FROM new_prospect";
    $stmt1 = $con->prepare($sql1);
    $stmt1->execute();
    while ($row1 = $stmt1->fetch()) {
        $max_prospect = $row1['max_prospect'];
    }

    $number = $max_prospect + 1;
    $user_id = 1;

    $sql = "INSERT INTO item_deals (prospect_id, `name`, account_id) VALUES (  $number, ?, $user_id)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $emails);




    foreach ($emails as $emails) {
        $stmt->execute();
    }


    // Close statement and connection
    $stmt->close();
    $conn->close();

    echo "Emails saved successfully!";
} else {
    // If emails variable is not set or empty, display an error message
    echo "Error: Emails variable is not set or empty.";
}
