<?php
require_once("connect.php");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination settings
$recordsPerPage = 10; // Number of records to display per page
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

// Calculate the starting record index
$startFrom = ($page - 1) * $recordsPerPage;

// Handle update operation
if (isset($_POST['update'])) {
    $Patientname = $_POST['Patientname'];
    $SSN = $_POST['SSN'];
    $Contact = $_POST['Contact'];
    $Age = $_POST['Age'];
    $Address = $_POST['Address'];

    $sql = "UPDATE patient SET Patientname= ?, Age = ?, Contact = ? , Address = ? WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $Patientname, $Age, $Contact, $Address, $SSN);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

// Handle edit operation
if (isset($_GET['SSN'])) {
    $SSN = $_GET['SSN'];

    // Fetch the record with the specified id
    $sql = "SELECT * FROM patient WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $SSN);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the form with pre-filled values for editing
        echo "<form method='post'>";
        echo "<input type='hidden' name='SSN' value='" . $row['SSN'] . "'>";
        echo "Patientname: <input type='text' name='Patientname' value='" . $row['Patientname'] . "'><br>";
        echo "Contact: <input type='text' name='Contact' value='" . $row['Contact'] . "'><br>";
        echo "Age: <input type='text' name='Age' value='" . $row['Age'] . "'><br>";
        echo "Address: <input type='text' name='Address' value='" . $row['Address'] . "'><br>";
        echo "<input type='submit' name='update' value='Update'>";
        echo "</form>";
    } else {
        echo "Record not found.";
    }
}

// Handle delete operation
if (isset($_GET['delete'])) {
    $SSN = $_GET['delete'];

    $sql = "DELETE FROM patient WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $SSN);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

// Fetch and display existing records with pagination
$sql = "SELECT * FROM patient LIMIT $startFrom, $recordsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>SSN</th><th>Name</th><th>Contact</th><th>Age</th><th>Address</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Patientname'] . "</td>";
        echo "<td>" . $row['SSN'] . "</td>";
        echo "<td>" . $row['Contact'] . "</td>";
        echo "<td>" . $row['Age'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>";
        echo "<a href='?id=" . $row['SSN'] . "'>Edit</a> | ";
        echo "<a href='?delete=" . $row['SSN'] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Pagination links
    $sql = "SELECT COUNT(*) AS total FROM patient";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalRecords = $row['total'];
    $totalPages = ceil($totalRecords / $recordsPerPage);

    echo "<div class='pagination'>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
    }
    echo "</div>";
} else {
    echo "No records found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            margin-right: 5px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>
</body>

</html>