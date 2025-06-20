<?php
session_start();

// Enable error reporting for development (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nuclinic";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get and sanitize input
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['student_email']);
    $password = trim($_POST['student_password']);

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $_SESSION['signup_error'] = "Please fill in all fields.";
        header("Location: signup.php");
        exit();
    }

    // Check for duplicate email
    $check_stmt = $conn->prepare("SELECT * FROM student_tbl WHERE student_email = ?");
    if (!$check_stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['signup_error'] = "Email is already registered.";
        $check_stmt->close();
        $conn->close();
        header("Location: signup.php");
        exit();
    }
    $check_stmt->close();

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new student
    $insert_stmt = $conn->prepare("INSERT INTO student_tbl (first_name, last_name, student_email, student_password) VALUES (?, ?, ?, ?)");
    if (!$insert_stmt) {
        die("Insert prepare failed: " . $conn->error);
    }

    $insert_stmt->bind_param("ssss", $first_name, $last_name, $email, $hashedPassword);

    if ($insert_stmt->execute()) {
        $_SESSION['signup_success'] = "Registration successful. You can now log in.";
        $insert_stmt->close();
        $conn->close();
        header("Location: ../student_login/index.php");
        exit();
    } else {
        $_SESSION['signup_error'] = "Something went wrong. Please try again.";
        $insert_stmt->close();
        $conn->close();
        header("Location: signup.php");
        exit();
    }
}
?>
