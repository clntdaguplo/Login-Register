    <?php
$servername = "localhost";
$username = "root"; // Default MySQL username
$password = ""; // Default MySQL password (leave empty if using XAMPP)
$database = "user_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>