<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = $_GET['table'];
$id = $_GET['id'];

// Fetch the record with the specified ID from the selected table
$sql = "SELECT * FROM $table WHERE ";
if ($table === "drug") {
    $sql .= "drug_id = ?";
} else {
    $sql .= "SSN = ?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Display the form with pre-filled values for editing
    echo "<h2>Edit Record</h2>";
    echo "<form method='POST' action='update.php?table=$table&id=$id'>";

    if ($table === "patient") {
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' id='name' value='" . $row['Patientname'] . "' required>";
        echo "<br>";
        echo "<label for='ssn'>SSN:</label>";
        echo "<input type='text' name='ssn' id='ssn' value='" . $row['SSN'] . "' required>";
        echo "<br>";
        echo "<label for='contact'>Contact:</label>";
        echo "<input type='text' name='contact' id='contact' value='" . $row['Contact'] . "' required>";
        echo "<br>";
        echo "<label for='age'>Age:</label>";
        echo "<input type='text' name='age' id='age' value='" . $row['Age'] . "' required>";
        echo "<br>";
        echo "<label for='address'>Address:</label>";
        echo "<input type='text' name='address' id='address' value='" . $row['Address'] . "' required>";
        echo "<br>";

        // ... other fields for patient table
    } elseif ($table === "admin") {
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' id='name' value='" . $row['admin_name'] . "' required>";
        echo "<label for='ssn'>SSN:</label>";
        echo "<input type='text' name='ssn' id='ssn' value='" . $row['SSN'] . "' required>";
        echo "<br>";
        // ... other fields for admin table
    } elseif ($table === "doctor") {
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' id='name' value='" . $row['Doctorname'] . "' required>";
        echo "<br>";
        echo "<label for='ssn'>SSN:</label>";
        echo "<input type='text' name='ssn' id='ssn' value='" . $row['SSN'] . "' required>";
        echo "<br>";
        echo "<label for='specialty'>Specialty:</label>";
        echo "<input type='text' name='specialty' id='specialty' value='" . $row['Specialty'] . "' required>";
        echo "<br>";
        echo "<label for='yoe'>Years of Experience:</label>";
        echo "<input type='text' name='yoe' id='yoe' value='" . $row['YOE'] . "' required>";
        echo "<br>";
        // ... other fields for doctor table
    } elseif ($table === "drug") {
        echo "<label for='name'>Name:</label>";
        echo "<input type='text' name='name' id='name' value='" . $row['drug_name'] . "' required>";
        echo "<br>";
        echo "<label for='quantity'>Quantity:</label>";
        echo "<input type='text' name='quantity' id='quantity' value='" . $row['quantity'] . "' required>";
        echo "<br>";
        // ... other fields for drug table
    }

    echo "<input type='submit' value='Update'>";
    echo "</form>";
} else {
    echo "<h2>Record not found.</h2>";
}

$conn->close();
?>
