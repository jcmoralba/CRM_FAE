<?php
include 'includes/connect.php';
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
     //select the max prospect id 
     sleep(5);
     $sql = "SELECT MAX(prospect_id) AS maxprospect FROM new_prospect";
     $stmt = $con->prepare($sql);
     $stmt->execute();
     while ($row = $stmt->fetch()) {
        $max_prospect = $row['maxprospect'] + 1;
     }



     // Prepare and execute SQL statement to insert data into the database
     $number = 3;
     $user_id = 1;
     $sql = "INSERT INTO item_deals (prospect_id, `name`, account_id) VALUES ($max_prospect, ?, $user_id)";
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
?>
