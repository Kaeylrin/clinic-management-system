<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli("localhost", "root", "", "nuclinic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $admin_email = trim($_POST['admin_email']);
    $admin_password = trim($_POST['admin_password']);

    if (empty($admin_email) || empty($admin_password)) {
        $_SESSION['login_error'] = "Please enter both email and password.";
        header("Location: index.php");
        exit();
    }

    // Prepare SQL to find the admin by email
    $stmt = $conn->prepare("SELECT admin_password FROM admin_tbl WHERE admin_email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $admin_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $db_password = $row['admin_password'];

        // Since passwords are plain text, just compare strings directly
        if ($admin_password === $db_password) {
            $_SESSION['admin_email'] = $admin_email;
            header("Location: ../inventory/index.html"); // redirect after login
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid credentials. Please try again.";
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Invalid credentials. Please try again.";
        header("Location: index.php");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
    