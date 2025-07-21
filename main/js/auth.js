// SIGNUP
document.getElementById("signupForm")?.addEventListener("submit", function(e) {
  e.preventDefault();
  const user = {
    name: document.getElementById("name").value,
    email: document.getElementById("email").value,
    password: document.getElementById("password").value
  };
  localStorage.setItem("user", JSON.stringify(user));
  alert("Signup successful!");
  window.location.href = "login.html";
});

// LOGIN
document.getElementById("loginForm")?.addEventListener("submit", function(e) {
  e.preventDefault();
  const email = document.getElementById("loginEmail").value;
  const password = document.getElementById("loginPassword").value;
  const user = JSON.parse(localStorage.getItem("user"));

  if (user?.email === email && user?.password === password) {
    localStorage.setItem("loggedIn", "true");
    window.location.href = "dashboard.php";
  } else {
    alert("Invalid credentials");
  }
});
