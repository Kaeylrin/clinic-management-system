document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const usernameInput = document.querySelector("input[type='text']");
  const passwordInput = document.querySelector("input[type='password']");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const username = usernameInput.value.trim();
    const password = passwordInput.value.trim();

    if (username === "admin" && password === "admin123") {
      alert("Login successful!");
      // Optional: Redirect to admin dashboard
      // window.location.href = "admin-dashboard.html";
    } else {
      alert("Invalid credentials. Please try again.");
    }
  });
});
// Fade in on page load
window.addEventListener('DOMContentLoaded', () => {
  document.body.classList.add('fade-in');
});

// Fade out on internal link clicks before navigating
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('a').forEach(link => {
    const href = link.getAttribute('href');
    if (
      href &&
      !href.startsWith('#') &&
      link.hostname === window.location.hostname
    ) {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        document.body.classList.remove('fade-in');
        document.body.classList.add('fade-out');

        setTimeout(() => {
          window.location.href = href;
        }, 500); // Match this with your CSS transition time
      });
    }
  });
});
document.getElementById('studentLink').addEventListener('click', function (e) {
  e.preventDefault();
  document.body.classList.add('fade-out');
  setTimeout(() => {
    window.location.href = '../student_login/index.php';
  }, 500);
});
