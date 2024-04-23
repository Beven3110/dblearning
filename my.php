<?php
// Connect to MySQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Increment visitor count
$sql = "UPDATE visitor_count SET count = count + 1 WHERE id = 1";
$conn->query($sql);

// Retrieve visitor count
$sql = "SELECT count FROM visitor_count WHERE id = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $visitor_count = $row["count"];
} else {
    $visitor_count = 0;
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Count</title>
</head>
<body>
    <h1>Live Visitor Count</h1>
    <p>Number of visitors: <?php echo $visitor_count; ?></p>
</body>
</html>
