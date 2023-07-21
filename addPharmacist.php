<?php
// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SSN = $_POST['SSN'];
    $pharmacist_name = $_POST['pharmacist_name'];
   
    

    // Check if any field is empty
    if (empty($SSN) || empty($pharmacist_name)  ) {
        echo "All fields are required";
    } else {
        // Connect to the database
        require_once("connect.php");
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Prepare the SQL statement
        $sql = "INSERT INTO pharmacist(SSN,pharmacist_name) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the query
        $stmt->execute([$SSN,$pharmacist_name]);

        // Close database connection
        $conn = null;

        echo "Data inserted successfully";
    }
}
?>