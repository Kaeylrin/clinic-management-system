<?php
$conn = new mysqli("localhost", "root", "", "nuclinic");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// Fetch all admins
$result = $conn->query("SELECT admin_id, admin_password FROM admin_tbl");

if ($result) {
    $messages = [];
    
    while ($row = $result->fetch_assoc()) {
        $admin_id = $row['admin_id'];
        $current_pass = $row['admin_password'];

        // Only hash if not already hashed
        if (password_get_info($current_pass)['algo'] === 0) {
            $hashed = password_hash($current_pass, PASSWORD_DEFAULT);

            // Update the password to its hashed version
            $stmt = $conn->prepare("UPDATE admin_tbl SET admin_password = ? WHERE admin_id = ?");
            if ($stmt) {    
                $stmt->bind_param("si", $hashed, $admin_id);
                if ($stmt->execute()) {
                    $messages[] = "Hashed password for admin_id: $admin_id";
                } else {
                    $messages[] = "Error updating password for admin_id: $admin_id";
                }
                $stmt->close();
            } else {
                $messages[] = "Error preparing statement for admin_id: $admin_id";
            }
        } else {
            $messages[] = "Password already hashed for admin_id: $admin_id";
        }
    }

    // Output all messages
    foreach ($messages as $message) {
        echo $message . "<br>";
    }
} else {
    echo "Error fetching admins: " . $conn->error;
}

echo "Done.";
$conn->close();
?>
