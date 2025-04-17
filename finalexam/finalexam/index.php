<?php include 'header.php'; ?>

<h2>Enter Message</h2>
<form method="POST" action="">
    <input type="text" name="message" required>
    <button type="submit" name="submit">Submit</button>
</form>

<br>
<a href="showAll.php">Show all records</a>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "final";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['submit'])) {
    $message = $conn->real_escape_string($_POST['message']);
    $sql = "INSERT INTO string_info (message) VALUES ('$message')";
    if ($conn->query($sql)) {
        echo "<p>Message saved successfully.</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}
$conn->close();
?>
</body>
</html>
