<?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM users.info";
    $result = $conn->query($sql);

    // Check for errors
    if ($result->num_rows == 0) {
        echo "No results";
    } else{ ?>
        <style>
    table.my-table {
        border-collapse: collapse;
        width: 50%;
    }

    table.my-table td, table.my-table th {
        border: 2px solid #ddd;
        padding: 10px;
        text-align: center;
    }

    table.my-table th {
        background-color: #4CAF50;
        color: white;
    }

    table.my-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
        <?php
        // Generate HTML to display the data
        echo "<table class='my-table'>";
        echo "<tr> 
        <td>id</td>
        <td>name</td>
        <td>phone_number</td>
        <td>birthday</td>
        </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>

