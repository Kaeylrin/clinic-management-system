<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Login</title>
  <link rel="stylesheet" href="styles.css" />
  <script defer src="script.js"></script>
</head>
<body>
  <div class="login-section">
    <h2>&emsp;&emsp;Hello Admin!</h2>
   <p class="login-caption">
  Log in to manage student records, appointments,<br />
  <span class="indent">and clinic reports.</span>
</p>


    <form method="POST" action="admin_login.php">
      <div class="input-group">
        <img src="../images/person-icon.png" alt="User Icon" class="icon">
        <input type="text" placeholder="Enter Email" id = "admin_email" name = "admin_email"/>
      </div>

      <div class="input-group">
        <img src="../images/unlock.png" alt="Lock Icon" class="icon">
        <input type="password" placeholder="Enter Password" id = "admin_password" name = "admin_password"/>
      </div>

      <button type="submit">LOG IN</button>

      <p style="text-align: center; margin-top: 1rem;">
        <a href="../student_login/student-login.html" id="studentLink" style="color: #007BFF; text-decoration: underline;">I'm a student</a>
      </p>
    </form>
  </div>
  
</body>
</html>
