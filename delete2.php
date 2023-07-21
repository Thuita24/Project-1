<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = $_GET['table'];
$id = $_GET['id'];

// Prepare the SQL statement with a placeholder for the drug name
$sql = "DELETE FROM $table WHERE drug_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<h2>Record deleted successfully.</h2>";
} else {
    echo "<h2>Error deleting record: " . $stmt->error . "</h2>";
}

$conn->close();
?>
