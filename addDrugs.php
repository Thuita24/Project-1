<?php
// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trade_name = $_POST['trade_name'];
    $dosage = $_POST['dosage'];
    $price = $_POST['price'];
    $expiry_date = $_POST['expiry_date'];
    $formula = $_POST['formula'];

    // Check if any field is empty
    if (empty($trade_name) || empty($dosage) || empty($price) || empty($expiry_date) || empty($formula)) {
        echo "All fields are required";
    } else {
        // Connect to the database
        require_once("connect.php");
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        // Prepare the SQL statement
        $sql = "INSERT INTO drugs (trade_name, dosage, price, expiry_date, formula) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Bind parameters and execute the query
        $stmt->execute([$trade_name, $dosage, $price, $expiry_date, $formula]);

        // Close database connection
        $conn = null;

        echo "Data inserted successfully";
    }
}
?>
