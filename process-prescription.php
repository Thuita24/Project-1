<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data
$patientId = $_POST['patient'];
$drug = $_POST['drug'];
$dosage = $_POST['dosage'];

// Retrieve the patient's name from the database
$stmt = $conn->prepare("SELECT Patientname FROM patient WHERE SSN = ?");
$stmt->bind_param("s", $patientId);
$stmt->execute();
$stmt->bind_result($patientName);
$stmt->fetch();
$stmt->close();

// Retrieve the SSN from the patient table
$stmt = $conn->prepare("SELECT SSN FROM patient WHERE Patientname = ?");
$stmt->bind_param("s", $patientName);
$stmt->execute();
$stmt->bind_result($SSN);
$stmt->fetch();
$stmt->close();

// Retrieve the price from the drugs table
$stmt = $conn->prepare("SELECT price FROM drug WHERE drug_name = ?");
$stmt->bind_param("s", $drug);
$stmt->execute();
$stmt->bind_result($price);
$stmt->fetch();
$stmt->close();

// Insert the prescription into the database
$sql = "INSERT INTO prescriptions (SSN, patient_name, drug_name, dosage, date_prescribed,price) VALUES (?, ?, ?, ?, NOW(),?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("sssss", $SSN, $patientName, $drug, $dosage, $price);

if ($stmt->execute()) {
    echo "<h2>Prescription recorded successfully.</h2>";
} else {
    echo "<h2>Error recording prescription: " . $stmt->error . "</h2>";
}

echo "<a href='doctorspage.php'>Go back</a>";

$conn->close();
?>
