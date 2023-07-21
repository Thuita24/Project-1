<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = $_GET['table'];
$id = $_GET['id'];

// Retrieve updated data from the form
if ($table === "patient") {
    $name = $_POST['name'];
    $ssn = $_POST['ssn'];
    $contact = $_POST['contact'];
    $age = $_POST['age'];
    $address = $_POST['address'];

    // Update the record in the patient table
    $sql = "UPDATE patient SET Patientname = ?, SSN = ?, Contact = ?, Age = ?, Address = ? WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $ssn, $contact, $age, $address, $id);
} elseif ($table === "admin") {
    $admin_name = $_POST['name'];

    // Update the record in the admin table
    $sql = "UPDATE admin SET admin_name = ? WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $admin_name, $id);
} elseif ($table === "doctor") {
    $name = $_POST['name'];
    $ssn = $_POST['ssn'];
    $specialty = $_POST['specialty'];
    $yoe = $_POST['yoe'];

    // Update the record in the doctor table
    $sql = "UPDATE doctor SET Doctorname = ?, SSN = ?, Specialty = ?, YOE = ? WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $ssn, $specialty, $yoe, $id);
}elseif ($table === "drug") {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    

    // Update the record in the drugs table
    $sql = "UPDATE drug SET drug_name = ?, quantity = ? WHERE drug_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $quantity,$id);
}



if ($stmt->execute()) {
    echo "<h2>Record updated successfully.</h2>";
} else {
    echo "<h2>Error updating record: " . $stmt->error . "</h2>";
}

$conn->close();
