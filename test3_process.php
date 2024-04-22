<?php
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
 
     // Prepare and execute SQL statement to insert data into the database
     $number = 3;
     $user_id = 1;
     $sql = "INSERT INTO deal_list (prospect_id, deal_name, account_id) VALUES (  $number, ?, $user_id)";
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
