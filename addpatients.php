<?php
require_once("connect.php");

$Patientname = $_POST['patient_name'];
$SSN = $_POST['SSN'];
$Contact = $_POST['Contact'];
$Age = $_POST['Age'];
$Address = $_POST["Address"];



$insert_sql = "INSERT INTO `patient`(`Patientname`, `SSN`, `Contact`, `Age`, `Address`)
 VALUES ('$Patientname','$SSN','$Contact','$Age','$Address')";




if ($conn->query($insert_sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}