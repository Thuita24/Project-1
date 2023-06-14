<?php
// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SSN = $_POST['SSN'];
    $Doctor_name = $_POST['Doctor_name'];
    $Specialty = $_POST['Specialty'];
    $YOE = $_POST['YOE'];
    

    // Check if any field is empty
    if (empty($SSN) || empty($Doctor_name) || empty($Specialty) || empty($YOE) ) {
        echo "All fields are required";
    } else {
        // Connect to the database
        require_once("connect.php");
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Prepare the SQL statement
        $sql = "INSERT INTO doctor(SSN,Doctor_name,Specialty,YOE) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the query
        $stmt->execute([$SSN,$Doctor_name,$Specialty,$YOE]);

        // Close database connection
        $conn = null;

        echo "Data inserted successfully";
    }
}
?>
