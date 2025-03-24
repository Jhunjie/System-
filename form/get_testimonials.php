<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "slcdb";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, feedback, star_rating FROM testimonials ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

$testimonials = [];
while ($row = $result->fetch_assoc()) {
    $testimonials[] = [
        "name" => $row['name'] ?: "Anonymous",
        "feedback" => $row['feedback'],
        "rating" => intval($row['star_rating'])
    ];
}

$conn->close();

echo json_encode($testimonials);
?>
