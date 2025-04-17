<?php include 'header.php'; ?>

<h2>All Messages</h2>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "final";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST['delete'])) {
    $idToDelete = intval($_POST['string_id']);
    $conn->query("DELETE FROM string_info WHERE string_id = $idToDelete");
    echo "<p>Record with ID $idToDelete deleted.</p>";
}

$result = $conn->query("SELECT * FROM string_info");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['string_id'] . " | Message: " . $row['message'];
        echo "<form method='POST' style='display:inline; margin-left:10px;'>
                <input type='hidden' name='string_id' value='" . $row['string_id'] . "'>
                <button type='submit' name='delete'>Delete</button>
              </form><br>";
    }
} else {
    echo "No records found.";
}
$conn->close();
?>

</body>
</html>
