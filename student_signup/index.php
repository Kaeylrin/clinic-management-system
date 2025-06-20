<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Sign-Up</title>
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
    <div class="login-section">
      <div class="text-wrapper">
        <h2>Create an Account</h2>
        <p class="login-caption">
          <em>Sign up to book appointments and access student medical services.</em>
        </p>
      </div>

      <form id="student-signup-form" action="signup.php" method="POST">
  <div class="input-group">
    <img src="../images/person-icon.png" alt="Firstname Icon" class="icon" />
    <input type="text" name="first_name" placeholder="Enter Firstname" required />
  </div>

  <div class="input-group">
    <img src="../images/person-icon.png" alt="Lastname Icon" class="icon" />
    <input type="text" name="last_name" placeholder="Enter Lastname" required />
  </div>

  <div class="input-group">
    <img src="../images/person-icon.png" alt="Email Icon" class="icon" />
    <input type="text" name="student_email" placeholder="Enter NU Email" required />
  </div>

  <div class="input-group">
    <img src="../images/unlock.png" alt="Password Icon" class="icon" />
    <input type="password" name="student_password" placeholder="Enter Password" required />
  </div>

  <div class="input-group">
    <img src="../images/unlock.png" alt="Re-enter Password Icon" class="icon" />
    <input type="password" name="confirm_password" placeholder="Re-enter Password" required />
  </div>

  <button type="submit">SIGN UP</button>
</form>

    </div>
  </div>

  <script>
  document.getElementById('student-signup-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default submission first

    const form = this;
    const firstName = form.first_name.value.trim();
    const lastName = form.last_name.value.trim();
    const email = form.student_email.value.trim();
    const password = form.student_password.value;
    const confirmPassword = form.confirm_password.value;

    // Validate NU email
    const emailPattern = /^[a-zA-Z0-9._%+-]+@students\.nu-dasma\.edu\.ph$/;
    if (!emailPattern.test(email)) {
      alert('❌ Invalid NU email. Email must end with "@students.nu-dasma.edu.ph".');
      return;
    }

    // Validate password
    const passwordErrors = [];
    if (password.length < 8) passwordErrors.push("at least 8 characters");
    if (!/[a-z]/.test(password)) passwordErrors.push("a lowercase letter");
    if (!/[A-Z]/.test(password)) passwordErrors.push("an uppercase letter");
    if (!/[0-9]/.test(password)) passwordErrors.push("a number");
    if (!/[!@#$%^&*(),.?\":{}|<>]/.test(password)) passwordErrors.push("a special character");

    if (passwordErrors.length > 0) {
      alert("❌ Password must include:\n- " + passwordErrors.join("\n- "));
      return;
    }

    // Check match
    if (password !== confirmPassword) {
      alert("❌ Passwords do not match!");
      return;
    }

    // ✅ Passed all checks, submit the form manually
    form.submit();
  });
</script>

</body>
</html>
