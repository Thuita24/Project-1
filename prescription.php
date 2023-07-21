<!-- prescription.php -->
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  echo "<p>Please log in to view your prescriptions.</p>";
  exit();
}
require_once("connect.php");
// Retrieve the logged-in user's prescriptions from the database
/*$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname); */
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the username of the logged-in user
$username = $_SESSION['username'];

// Retrieve the prescriptions for the logged-in user from the database
$sql = "SELECT prescription FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Display the prescriptions if found, or show an error message
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $prescription = $row['prescription'];
  echo "<h3>Prescriptions for $username</h3>";
  echo "<p>$prescription</p>";
} else {
  echo "<p>No prescriptions found for $username</p>";
}

// Close the database connection
$conn->close();
?>