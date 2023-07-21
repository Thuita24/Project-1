<?php
// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $drug_id = $_POST['drug_id'];
    $drug_name = $_POST['drug_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];


    // Check if any field is empty
    if (empty($drug_id) || empty($drug_name) || empty($quantity) || empty($price)) {
        echo "All fields are required";
    } else {
        // Connect to the database
        require_once("connect.php");
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // Prepare the SQL statement
        $sql = "INSERT INTO drug (drug_id, drug_name, quantity , price) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the query
        $stmt->execute([$drug_id, $drug_name, $quantity, $price]);

        // Close database connection
        $conn = null;

        echo "Data inserted successfully";
    }
}
