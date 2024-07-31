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

// Query to fetch data
$sql = "SELECT id, name, email, phone, service, date, time, details FROM appointments";
$result = $conn->query($sql);

$appointments = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $appointments[] = $row;
    }
}

$conn->close();

echo json_encode($appointments);
?>
