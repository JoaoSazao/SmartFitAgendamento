document.getElementById("loginForm").addEventListener("submit", async function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  const response = await fetch("php/login.php", {
    method: "POST",
    body: formData,
  });

  const data = await response.json();

  if (data.success) {
    window.location.href = "dashboard.html";
  } else {
    document.getElementById("loginError").classList.remove("hidden");
  }
});
