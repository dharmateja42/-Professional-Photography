<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "appointment_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email, phone, service, date, time, details FROM appointments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['service']}</td>
                <td>{$row['date']}</td>
                <td>{$row['time']}</td>
                <td>{$row['details']}</td>
              </tr>";
    }
    echo "</tbody></table>";
} else {
    echo "<p>No appointments found</p>";
}
$conn->close();
?>
