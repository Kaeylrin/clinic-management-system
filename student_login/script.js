document.getElementById('loginForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const message = document.getElementById('message');


  if (email === 'student@nu.edu.ph' && password === '12345') {
    message.style.color = 'green';
    message.textContent = 'Login successful!';
  } else {
    message.style.color = 'red';
    message.textContent = 'Invalid email or password.';
  }
});
document.getElementById('loginForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const email = document.getElementById('email').value.trim();
  const password = document.getElementById('password').value.trim();
  const message = document.getElementById('message');

  if (email === 'student@nu.edu.ph' && password === '12345') {
    message.style.color = 'green';
    message.textContent = 'Login successful!';

    // Fade out and redirect after a short delay
    document.body.classList.add('fade-out');
    setTimeout(() => {
      window.location.href = '../../Dashboard/studentDashboard.html'; // example target
    }, 500);
  } else {
    message.style.color = 'red';
    message.textContent = 'Invalid email or password.';
  }
});

document.getElementById('adminLink').addEventListener('click', function (e) {
  e.preventDefault();
  document.body.classList.add('fade-out');
  setTimeout(() => {
    window.location.href = '../../LogIn/AdminLogin/admin page/aLog.html';
  }, 500);
});

