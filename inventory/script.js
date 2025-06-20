// DOM Elements
const addMedicineBtn = document.getElementById('addMedicineBtn');
const addMedicineModal = document.getElementById('addMedicineModal');
const closeModal = document.querySelector('.close');
const addMedicineForm = document.getElementById('addMedicineForm');
const inventoryTableBody = document.getElementById('inventoryTableBody');


addMedicineBtn.addEventListener('click', () => {
    addMedicineModal.style.display = 'block';
});

closeModal.addEventListener('click', () => {
    addMedicineModal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === addMedicineModal) {
        addMedicineModal.style.display = 'none';
    }
});

// Form submission
addMedicineForm.addEventListener('submit', (e) => {
    e.preventDefault();

    // Get form values
    const medicineName = document.getElementById('medicineName').value;
    const stock = document.getElementById('stock').value;
    const expiryDate = document.getElementById('expiryDate').value;

    // Format expiry date
    const formattedExpiryDate = formatDate(expiryDate);

    // Get current date for last updated
    const currentDate = getCurrentDate();

    // Add new row to table
    addMedicineToTable(medicineName, stock, formattedExpiryDate, currentDate);

    // Reset form and close modal
    addMedicineForm.reset();
    addMedicineModal.style.display = 'none';
});

// Function to add medicine to table
function addMedicineToTable(medicine, stock, expiryDate, lastUpdated) {
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td>${medicine}</td>
        <td>${stock}</td>
        <td>${expiryDate}</td>
        <td>${lastUpdated}</td>
    `;

    // Add hover effect and click functionality
    newRow.addEventListener('click', () => {
        if (confirm(`Do you want to edit ${medicine}?`)) {
            editMedicine(newRow, medicine, stock, expiryDate);
        }
    });

    inventoryTableBody.appendChild(newRow);
}

// Function to format date from YYYY-MM-DD to DD MMM YYYY
function formatDate(dateString) {
    const date = new Date(dateString);
    const options = {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    };
    return date.toLocaleDateString('en-GB', options);
}

// Function to get current date in DD MMM YYYY format
function getCurrentDate() {
    const date = new Date();
    const options = {
        day: '2-digit',
        month: 'short',
        year: 'numeric'
    };
    return date.toLocaleDateString('en-GB', options);
}

// Function to edit medicine (simple prompt-based editing)
function editMedicine(row, currentMedicine, currentStock, currentExpiry) {
    const newMedicine = prompt('Enter medicine name:', currentMedicine);
    if (newMedicine === null) return;

    const newStock = prompt('Enter stock quantity:', currentStock);
    if (newStock === null) return;

    const newExpiry = prompt('Enter expiry date (DD MMM YYYY):', currentExpiry);
    if (newExpiry === null) return;

    // Update the row
    const cells = row.children;
    cells[0].textContent = newMedicine || currentMedicine;
    cells[1].textContent = newStock || currentStock;
    cells[2].textContent = newExpiry || currentExpiry;
    cells[3].textContent = getCurrentDate();
}

// Add click functionality to existing rows
document.addEventListener('DOMContentLoaded', () => {
    const existingRows = inventoryTableBody.querySelectorAll('tr');
    existingRows.forEach(row => {
        row.addEventListener('click', () => {
            const cells = row.children;
            const medicine = cells[0].textContent;
            const stock = cells[1].textContent;
            const expiry = cells[2].textContent;

            if (confirm(`Do you want to edit ${medicine}?`)) {
                editMedicine(row, medicine, stock, expiry);
            }
        });
    });
});

// Navigation functionality
document.querySelectorAll('.nav-item').forEach(item => {
    item.addEventListener('click', (e) => {
        e.preventDefault();

        // Remove active class from all items
        document.querySelectorAll('.nav-item').forEach(navItem => {
            navItem.classList.remove('active');
        });

        // Add active class to clicked item
        item.classList.add('active');

        // Get the page to show
        const page = item.getAttribute('data-page');
        showPage(page);
    });
});

// Function to show specific page
function showPage(pageName) {
    // Hide all pages
    document.querySelectorAll('.page-content').forEach(page => {
        page.style.display = 'none';
    });

    // Show selected page
    const targetPage = document.getElementById(pageName + '-page');
    if (targetPage) {
        targetPage.style.display = 'block';
    }

    // Update dashboard if home page is selected
    if (pageName === 'home') {
        updateDashboard();
    }
}

// Dashboard update function
function updateDashboard() {
    const rows = inventoryTableBody.querySelectorAll('tr');
    const totalMedicines = rows.length;
    let lowStockCount = 0;
    let expiringSoonCount = 0;

    rows.forEach(row => {
        const stock = parseInt(row.children[1].textContent);
        const expiryDate = new Date(row.children[2].textContent);
        const today = new Date();
        const monthsUntilExpiry = (expiryDate - today) / (1000 * 60 * 60 * 24 * 30);

        if (stock <= 10) lowStockCount++;
        if (monthsUntilExpiry <= 6) expiringSoonCount++;
    });

    document.getElementById('totalMedicines').textContent = totalMedicines;
    document.getElementById('lowStockCount').textContent = lowStockCount;
    document.getElementById('expiringSoon').textContent = expiringSoonCount;
}

// Student Files functionality
document.getElementById('uploadBtn').addEventListener('click', () => {
    const fileInput = document.getElementById('fileInput');
    const files = fileInput.files;

    if (files.length > 0) {
        const filesList = document.getElementById('filesList');
        filesList.innerHTML = '';

        Array.from(files).forEach(file => {
            const fileItem = document.createElement('div');
            fileItem.style.cssText = `
                padding: 10px;
                margin: 5px 0;
                background: #f8f9fa;
                border-radius: 4px;
                border-left: 4px solid #4c5a7a;
            `;
            fileItem.innerHTML = `
                <strong>${file.name}</strong><br>
                <small>Size: ${(file.size / 1024).toFixed(2)} KB</small>
            `;
            filesList.appendChild(fileItem);
        });

        fileInput.value = '';
        alert('Files uploaded successfully!');
    } else {
        alert('Please select files to upload.');
    }
});

// Logout functionality
document.getElementById('confirmLogout').addEventListener('click', () => {
    alert('You have been logged out successfully!');
    // In a real app, you would redirect to login page
    showPage('home');
});

document.getElementById('cancelLogout').addEventListener('click', () => {
    showPage('inventory');
});

// Stock alert function (optional enhancement)
function checkLowStock() {
    const rows = inventoryTableBody.querySelectorAll('tr');
    rows.forEach(row => {
        const stock = parseInt(row.children[1].textContent);
        if (stock <= 10) {
            row.style.backgroundColor = '#fff3cd';
            row.title = 'Low stock warning!';
        }
    });
}

// Check for low stock on page load
document.addEventListener('DOMContentLoaded', checkLowStock);

// Hamburger menu functionality (for mobile)
document.querySelector('.hamburger').addEventListener('click', () => {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('mobile-open');
});

// Search functionality (bonus feature)
function addSearchFunctionality() {
    const searchInput = document.createElement('input');
    searchInput.type = 'text';
    searchInput.placeholder = 'Search medicines...';
    searchInput.style.cssText = `
        width: 100%;
        max-width: 300px;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        font-size: 14px;
    `;

    const tableContainer = document.querySelector('.table-container');
    tableContainer.parentNode.insertBefore(searchInput, tableContainer);

    searchInput.addEventListener('input', (e) => {
        const searchTerm = e.target.value.toLowerCase();
        const rows = inventoryTableBody.querySelectorAll('tr');

        rows.forEach(row => {
            const medicineName = row.children[0].textContent.toLowerCase();
            if (medicineName.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
}

// Initialize search functionality
document.addEventListener('DOMContentLoaded', addSearchFunctionality);

// Sample File Initialization
document.addEventListener('DOMContentLoaded', () => {
    const sampleFiles = [
        { name: "Medical_Report_JohnDoe.pdf", size: 124000 },
        { name: "Vaccination_Record_JaneSmith.docx", size: 85000 }
    ];

    const filesList = document.getElementById('filesList');
    filesList.innerHTML = '';

    sampleFiles.forEach(file => {
        const fileItem = document.createElement('div');
        fileItem.style.cssText = `
            padding: 10px;
            margin: 5px 0;
            background: #f8f9fa;
            border-radius: 4px;
            border-left: 4px solid #4c5a7a;
        `;
        fileItem.innerHTML = `
            <strong>${file.name}</strong><br>
            <small>Size: ${(file.size / 1024).toFixed(2)} KB</small>
        `;
        filesList.appendChild(fileItem);
    });
});
document.querySelectorAll(".nav-item").forEach(item => {
    item.addEventListener("click", () => {
        const page = item.getAttribute("data-page");
        document.querySelectorAll(".page-content").forEach(p => p.style.display = "none");
        document.getElementById(`${page}-page`).style.display = "block";

        // Update active class
        document.querySelectorAll(".nav-item").forEach(nav => nav.classList.remove("active"));
        item.classList.add("active");
    });
});

