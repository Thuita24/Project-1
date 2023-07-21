<?php
require_once("connect.php");

// Function to display records
function displayRecords($tableName, $conn)
{
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<h2>$tableName Table</h2>";
            echo "<table>";
           echo "<tr><th>drug_id</th>";

            if ($tableName === "drug") {
                echo "<th>Drug Name</th>";
                echo "<th>quantity</th>";
                echo "<th>Price</th>";
            }
            echo "<th>Actions</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['drug_id'] . "</td>";

                if ($tableName === "drug") {
                    echo "<td>" . $row['drug_name'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                }
                echo "<td>" . $row['price'] . "</td>";

                echo "<td>";
                echo "<a href='edit.php?table=$tableName&id=" . $row['drug_id'] . "'>Edit</a> | ";
                echo "<a href='delete2.php?table=$tableName&id=" . $row['drug_id'] . "'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<h2>No records found in $tableName table.</h2>";
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

// Display drug records
displayRecords("drug", $conn);
echo "<br>";

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Drug Table</title>
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


</html>