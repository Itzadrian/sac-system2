// Responsive nav toggle
function toggleNav() {
  const nav = document.getElementById("myTopnav");
  nav.classList.toggle("responsive");
}

// Dark mode toggle
const toggleBtn = document.getElementById('theme-toggle');
const root = document.documentElement;

const savedTheme = localStorage.getItem('theme');
if (savedTheme === 'dark') {
  root.setAttribute('data-theme', 'dark');
}

toggleBtn?.addEventListener('click', () => {
  const isDark = root.getAttribute('data-theme') === 'dark';
  if (isDark) {
    root.removeAttribute('data-theme');
    localStorage.setItem('theme', 'light');
  } else {
    root.setAttribute('data-theme', 'dark');
    localStorage.setItem('theme', 'dark');
  }
});


// function updateIdLabel() {
//   const userType = document.getElementById("user_type").value;
//   const label = document.getElementById("idLabel");

//   if (userType === "student") {
//     label.textContent = "Matric Number";
//   } else if (userType === "staff") {
//     label.textContent = "Staff ID";
//   } else {
//     label.textContent = "Matric Number / Staff ID";
//   }
// }