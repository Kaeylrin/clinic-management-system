Try AI directly in your favorite apps … 
Use Gemini to generate drafts and refine content, plus get Gemini Pro with access to Google's next-gen AI for ₱1,100.00 ₱0 for 1 month

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
    $student_email = trim($_POST['student_email']);
    $student_password = trim($_POST['student_password']);

    if (empty($student_email) || empty($student_password)) {
        $_SESSION['login_error'] = "Please enter both email and password.";
        header("Location: index.html");
        exit();
    }

    // Check if user exists
    $stmt = $conn->prepare("SELECT student_password, first_name, last_name FROM student_tbl WHERE student_email = ?");
    $stmt->bind_param("s", $student_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['student_password'];

        // Verify password
        if (password_verify($student_password, $hashedPassword)) {
            // Password correct, login success
            $_SESSION['student_email'] = $student_email;
            $_SESSION['student_name'] = $row['first_name'] . ' ' . $row['last_name'];
            header("Location: /landing_page/index.php"); // Redirect to landing page
            exit();
        } else {
            $_SESSION['login_error'] = "Incorrect password.";
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "Email not registered.";
        header("Location: index.php");
        exit();
    }
}
$conn->close();
?>

