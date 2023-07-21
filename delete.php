<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = $_GET['table'];
$id = $_GET['id'];

// Delete the record with the specified ID from the selected table
$sql = "DELETE FROM $table WHERE SSN = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<h2>Record deleted successfully.</h2>";
} else {
    echo "<h2>Error deleting record: " . $stmt->error . "</h2>";
}

$conn->close();
?>
