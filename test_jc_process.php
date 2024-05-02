<?php
// Assuming you have already established a database connection
// Replace the placeholders with your actual database connection details
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

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $input_texts = $_POST['input_text'];

    // Save input data to the database
    foreach($input_texts as $input_text) {
        $sql = "INSERT INTO your_table_name (input_text_column) VALUES ('$input_text')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    echo "All records created successfully";
}

// Close database connection
$conn->close();
?>
