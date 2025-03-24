<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "slcdb"; 

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $feedback = $_POST["feedback"];
    $star_rating = $_POST["star_rating"];

    $stmt = $conn->prepare("INSERT INTO testimonials (name, feedback, star_rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $feedback, $star_rating);
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Success! Thank you for your feedback.');
                window.location.href = 'Homepage.html';
              </script>";
    } else {
        echo "<script>
                alert('Error submitting feedback. Please try again.');
                window.location.href = 'survey.html';
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
