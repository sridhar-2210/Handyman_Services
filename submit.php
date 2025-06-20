<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST["name"] ?? '';
$phone = $_POST["phone"] ?? '';
$zip = $_POST["zip"] ?? '';
$project = $_POST["project"] ?? '';

if ($name && $phone && $zip) {
    $stmt = $conn->prepare("INSERT INTO appointments (naame, phone, zip, project) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $phone, $zip, $project);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Missing required fields!";
}

$conn->close();
?>