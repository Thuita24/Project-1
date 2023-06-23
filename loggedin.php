<?php

// Function to search for SSN in the patient table
function search_patient_ssn($SSN)
{
    // Replace with your database connection details
    $host = "localhost";
    $dbname = "pillpal";
    $username = "root";
    $password = "";



    // Establish a connection to the database
    $conn = new PDO("mysql:host=$host;dbname=pillpal", $username, $password);

    // Prepare the query
    $stmt = $conn->prepare("SELECT * FROM patient WHERE SSN = :SSN");
 
    // Bind the SSN parameter
    $stmt->bindParam(':SSN', $SSN);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Close the cursor and the database connection
    $stmt->closeCursor();
    $conn = null;

    // Return the result
    return $result;
}

// Function to search for SSN in the doctor table
function search_doctor_ssn($SSN)
{
    // Replace with your database connection details
    $host = "localhost";
    $dbname = "pillpal";
    $username = "root";
    $password = "";

    // Establish a connection to the database
    $conn = new PDO("mysql:host=$host;dbname=pillpal", $username, $password);

    // Prepare the query
    $stmt = $conn->prepare("SELECT * FROM doctor WHERE SSN = :SSN");

    // Bind the SSN parameter
    $stmt->bindParam(':SSN', $SSN);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Close the cursor and the database connection
    $stmt->closeCursor();
    $conn = null;

    // Return the result
    return $result;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the SSN value from the form
    $SSN = $_POST["SSN"];

    // Search for the SSN in the patient and doctor tables
    $patient_result = search_patient_ssn($SSN);
    $doctor_result = search_doctor_ssn($SSN);

    if ($patient_result !== false) {
        // Redirect the user to the patient page
        header("Location: patientpage.php");
        exit();
    } elseif ($doctor_result !== false) {
        // Redirect the user to the doctor page
        header("Location: doctorspage.php");
        exit();
    } else {
        // No matching SSN found, handle the appropriate error or redirect
        echo "Invalid SSN. Please try again.";
    }
}
