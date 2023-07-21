<?php
// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SSN = $_POST['SSN'];
    $admin_name = $_POST['admin_name'];
    
    

    // Check if any field is empty
    if (empty($SSN) || empty($admin_name) ) {
        echo "All fields are required";
    } else {
        // Connect to the database
        require_once("connect.php");
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Prepare the SQL statement
        $sql = "INSERT INTO admin(SSN,admin_name) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the query
        $stmt->execute([$SSN,$admin_name]);

        // Close database connection
        $conn = null;

        echo "Data inserted successfully";
    }
}


?>