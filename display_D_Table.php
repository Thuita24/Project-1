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
    $SSN = $_POST['SSN'];
    $Doctorname = $_POST['Doctor_name'];
    $Specialty = $_POST['Specialty'];
    $YOE = $_POST['YOE'];

    $sql = "UPDATE doctor SET Doctorname = ?, Specialty = ?, YOE = ? WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $Doctorname, $Specialty, $YOE, $SSN);

    if ($stmt->execute()) {
        echo "Record updated successfully.";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
}

// Handle edit operation
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the record with the specified id
    $sql = "SELECT * FROM doctor WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the form with pre-filled values for editing
        echo "<form method='post'>";
        echo "<input type='hidden' name='SSN' value='" . $row['SSN'] . "'>";
        echo "Doctor Name: <input type='text' name='Doctor_name' value='" . $row['Doctorname'] . "'><br>";
        echo "Specialty: <input type='text' name='Specialty' value='" . $row['Specialty'] . "'><br>";
        echo "Years of Experience: <input type='text' name='YOE' value='" . $row['YOE'] . "'><br>";
        echo "<input type='submit' name='update' value='Update'>";
        echo "</form>";
    } else {
        echo "Record not found.";
    }
}

// Handle delete operation
if (isset($_GET['delete'])) {
    $SSN = $_GET['delete'];

    $sql = "DELETE FROM doctor WHERE SSN = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $SSN);

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
}

// Fetch and display existing records with pagination
$sql = "SELECT * FROM doctor LIMIT $startFrom, $recordsPerPage";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>SSN</th><th>Name</th><th>Specialty</th><th>Years of Experience</th><th>Actions</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['SSN'] . "</td>";
        echo "<td>" . $row['Doctorname'] . "</td>";
        echo "<td>" . $row['Specialty'] . "</td>";
        echo "<td>" . $row['YOE'] . "</td>";
        echo "<td>";
        echo "<a href='?id=" . $row['SSN'] . "'>Edit</a> | ";
        echo "<a href='?delete=" . $row['SSN'] . "'>Delete</a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Pagination links
    $sql = "SELECT COUNT(*) AS total FROM doctor";
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
    <title>Doctor Table</title>
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