<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>NU Clinic</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>


  <header class="main-header">
    <div class="container">
      <div class="logo">
        <img src="../../images/logo2.png" alt="NU Clinic Logo" />
      </div>
      <nav>
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="#requestSec">REQUEST</a></li>
          <li><a href="#appointmentSec">APPOINTMENT</a></li>
          <li><a href="#contact">CONTACT</a></li>
          <li><a href="#" id="profileBtn"><img src="../../images/user.png" class="profile-icon" alt="User Profile" /></a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <section class="banner-wrapper">
  <div id="appointmentSec" class="banner-section container">
    <div class="content-text">
      <h1>Smarter Clinic,<br>Healthier Campus</h1>
      <p>Your campus clinic, upgraded.</p>
      <button class="appointmentBtn" id="openAppointmentForm">SET AN APPOINTMENT</button>
    </div>
    <div class="content-image">
      <div class="image-overlay-wrapper">
        <img src="../../images/doctor3d.jpg" alt="Healthcare Illustration" />
      </div>
    </div>
  </div>
</section>

<!-- Appointment Form Modal -->
<div id="appointmentModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeAppointmentForm">&times;</span>
    <h2>Set an Appointment</h2>
    <form id="appointmentForm">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="studentId">Student ID:</label>
      <input type="text" id="studentId" name="studentId" required>

      <label for="date">Appointment Date:</label>
      <input type="date" id="date" name="date" required>

      <label for="reason">Reason for Visit:</label>
      <textarea id="reason" name="reason" required></textarea>

      <button type="submit">Submit</button>
    </form>
  </div>
</div>


    <section class="banner-wrapper">
  <div id="requestSec" class="banner-section container">
    <div class="content-text">
      <h1>Need Some Meds?</h1>
      <p>For when you're not feeling 100% and need a hand</p>
      <button class="appointmentBtn" id="openRequestForm">REQUEST NOW</button>
    </div>
    <div class="content-image">
      <div class="image-overlay-wrapper">
        <img src="../../images/medicine.jpg" alt="Medicine Image" />
      </div>
    </div>
  </div>
</section>

<!-- Request Medicine Modal -->
<div id="requestModal" class="modal">
  <div class="modal-content">
    <span class="close" id="closeRequestForm">&times;</span>
    <h2>Request Medicine</h2>
    <form id="requestForm">
      <label for="requestName">Full Name:</label>
      <input type="text" id="requestName" name="requestName" required>

      <label for="requestStudentId">Student ID:</label>
      <input type="text" id="requestStudentId" name="requestStudentId" required>

      <label for="medicine">Medicine Needed:</label>
      <input type="text" id="medicine" name="medicine" required>

      <label for="requestReason">Reason for Request:</label>
      <textarea id="requestReason" name="requestReason" required></textarea>

      <button type="submit">Submit Request</button>
    </form>
  </div>
</div>


<section id="moreSection" class="more-wrapper">
  <div class="container more-grid">
    <!-- First Item -->
    <div class="more-card">
      <img src="../../images/records.jpg" alt="My Records" class="circle-img" />
      <h3>My Records</h3>
      <p>Easily view your past appointments, prescriptions, and clinic visits—all in one place.</p>
    </div>

    <!-- Second Item -->
    <div class="more-card">
      <img src="../../images/announcements.jpg" alt="Announcements" class="circle-img" />
      <h3>Announcements</h3>
      <p>Stay updated with the latest clinic news, health tips, and upcoming medical events on campus.</p>
    </div>

    <!-- Third Item -->
    <div class="more-card">
      <img src="../../images/emergency.jpg" alt="Emergency Contacts" class="circle-img" />
      <h3>Emergency Contacts</h3>
      <p>Quick access to on-campus emergency numbers and health support when you need help fast.</p>
    </div>
  </div>
</section>
  </main>
  <footer class="footer" id="contact">
    <div class="footer-container">
      <div class="footer-branding">
        <img src="../../images/logo.png" alt="NU Clinic Logo" />
        <p>Smarter Clinic,<br>Healthier Campus</p>
      </div>
      <div class="footer-info">
        <h3>CLINIC INFORMATION</h3>
        <p>NU Clinic</p>
        <p>National University Dasmariñas</p>
        <p>National University Dasmariñas</p>
        <p>Clinic Hours: Mon–Saturday,<br> 8:00 AM – 5:00 PM</p>
      </div>
      <div class="footer-links">
        <h3>SERVICES</h3>
        <ul>
          <li><a href="#appointmentSec">Set an Appointment</a></li>
          <li><a href="#requestSec">Request Medicine</a></li>
          <li><a href="#">My Records</a></li>
          <li><a href="#">Announcements</a></li>
          <li><a href="#">Emergency Contacts</a></li>
        </ul>
      </div>
    </div>
    <hr />
  
  </footer>



<button id="profileBtn">Profile</button>

<!-- Profile Popup Modal -->
<div id="profileModal" class="modal">
  <div class="overlay-animation"></div>
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2 id="profileModalTitle">Select Login</h2>

    <div id="loginOptions" class="login-options">
      <a href="../student_login/index.php" class="login-btn">Student Login</a>
      <a href="../admin_login/index.php" class="login-btn">Admin Login</a>
    </div>

 
    <div id="logoutOption" style="display: none; text-align: center;">
      <p>You are logged in.</p>
      <button id="logoutBtn" class="login-btn">Logout</button>
    </div>
  </div>
</div>


  <script src="indexJS.js"></script>

</body>
</html>

