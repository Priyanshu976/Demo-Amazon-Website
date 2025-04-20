<?php
session_start();

// Database config
$host = "localhost";
$user = "root";
$password = "";
$dbname = "amazon";

// Connect to DB
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted properly
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password); // "ss" means two strings
    $stmt->execute();
    $result = $stmt->get_result();

    // If user found
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user'] = $user;

        // Redirect to dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<h2 style='color:red;'>Invalid email or password!</h2>";
    }

    $stmt->close();
} else {
    echo "<h3 style='color:red;'>Form data not received properly.</h3>";
}

$conn->close();
?>