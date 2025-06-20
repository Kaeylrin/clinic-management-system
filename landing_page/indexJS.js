document.addEventListener("DOMContentLoaded", () => {
  const isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

  // ==== PROFILE MODAL ====
  const profileBtn = document.getElementById("profileBtn");
  const profileModal = document.getElementById("profileModal");
  const profileCloseBtn = profileModal?.querySelector(".close");
  const profileModalTitle = document.getElementById("profileModalTitle");
  const loginOptions = document.getElementById("loginOptions");
  const logoutOption = document.getElementById("logoutOption");
  const logoutBtn = document.getElementById("logoutBtn");

  if (profileBtn && profileModal) {
    profileBtn.addEventListener("click", (e) => {
      e.preventDefault();
      profileModal.style.display = "flex";

      if (isLoggedIn) {
        profileModalTitle.textContent = "Welcome!";
        loginOptions.style.display = "none";
        logoutOption.style.display = "block";
      } else {
        profileModalTitle.textContent = "Select Login";
        loginOptions.style.display = "flex";
        logoutOption.style.display = "none";
      }

      setTimeout(() => {
        profileModal.classList.add("show");
      }, 10);
    });

    profileCloseBtn?.addEventListener("click", () => {
      profileModal.classList.remove("show");
      setTimeout(() => {
        profileModal.style.display = "none";
      }, 300);
    });

    window.addEventListener("click", (e) => {
      if (e.target === profileModal) {
        profileModal.classList.remove("show");
        setTimeout(() => {
          profileModal.style.display = "none";
        }, 300);
      }
    });
  }

  if (logoutBtn) {
    logoutBtn.addEventListener("click", () => {
      localStorage.setItem("isLoggedIn", "false");
      alert("Logged out successfully!");
      window.location.href = "../landing_page/index.php"; // Redirect to landing page
    });
  }

  // ==== APPOINTMENT MODAL ====
  const appointmentBtn = document.getElementById("openAppointmentForm");
  const appointmentModal = document.getElementById("appointmentModal");
  const closeAppointmentBtn = document.getElementById("closeAppointmentForm");

  if (appointmentBtn && appointmentModal && closeAppointmentBtn) {
    appointmentBtn.addEventListener("click", () => {
      if (!isLoggedIn) {
        window.location.href = "../student_login/index.php";
      } else {
        appointmentModal.style.display = "block";
        appointmentModal.classList.add("show");
      }
    });

    closeAppointmentBtn.addEventListener("click", () => {
      appointmentModal.classList.remove("show");
      setTimeout(() => {
        appointmentModal.style.display = "none";
      }, 300);
    });

    window.addEventListener("click", (e) => {
      if (e.target === appointmentModal) {
        appointmentModal.classList.remove("show");
        setTimeout(() => {
          appointmentModal.style.display = "none";
        }, 300);
      }
    });
  }

  // ==== REQUEST MODAL ====
  const openRequestBtn = document.getElementById("openRequestForm");
  const requestModal = document.getElementById("requestModal");
  const closeRequestBtn = document.getElementById("closeRequestForm");

  if (openRequestBtn && requestModal && closeRequestBtn) {
    openRequestBtn.addEventListener("click", () => {
      if (!isLoggedIn) {
        window.location.href = "../student_login/index.php";
      } else {
        requestModal.style.display = "block";
        requestModal.classList.add("show");
      }
    });

    closeRequestBtn.addEventListener("click", () => {
      requestModal.classList.remove("show");
      setTimeout(() => {
        requestModal.style.display = "none";
      }, 300);
    });

    window.addEventListener("click", (event) => {
      if (event.target === requestModal) {
        requestModal.classList.remove("show");
        setTimeout(() => {
          requestModal.style.display = "none";
        }, 300);
      }
    });
  }
});
