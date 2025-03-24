<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "slcdb";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, feedback, star_rating, created_at FROM testimonials ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        .testimonial-container { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .testimonial { margin-bottom: 20px; padding: 10px; border-bottom: 1px solid #ddd; }
        .stars { color: gold; }
    </style>
</head>
<body>
    <div class="testimonial-container">
        <h2>Patient Testimonials</h2>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="testimonial">
                    <strong><?= htmlspecialchars($row["name"]) ?></strong> (<?= date("F j, Y", strtotime($row["created_at"])) ?>)
                    <div class="stars">
                        <?php for ($i = 0; $i < $row["star_rating"]; $i++): ?>
                            ★
                        <?php endfor; ?>
                    </div>
                    <p><?= nl2br(htmlspecialchars($row["feedback"])) ?></p>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No testimonials yet.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
