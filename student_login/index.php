<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Login</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="container">
    <div class="login-section">
      <div class="text-wrapper">
        <h2>Welcome!</h2>
        <p class="login-caption">
          <em>Log in to book appointments and view medical records,<br />
          or request health services.</em>
        </p>
      </div>

      <form method="POST" action="student_login.php">
        <div class="input-group">
          <img src="../images/person-icon.png" alt="Email Icon" class="icon" />
          <input type="email" name="student_email" placeholder="Enter NU Email" required />
        </div>

        <div class="input-group">
          <img src="../images/unlock.png" alt="Password Icon" class="icon" />
          <input type="password" name="student_password" placeholder="Enter Password" required />
        </div>

        <button type="submit">LOG IN</button>

        <p style="text-align: center; margin-top: 15px;">
          Don't have an account? <a href="../student_signup/index.php" style="color: #022b56; text-decoration: underline;">Sign up</a>
        </p>


        <p style="text-align: center; margin-top: 1rem; ">
          <a href="../admin_login/admin-login.html" style="color: #022b56; text-decoration: underline;">I'm an admin</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>

