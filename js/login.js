document.getElementById("loginForm").addEventListener("submit", async function (e) {
  e.preventDefault();

  const formData = new FormData(this);

  try {
    const response = await fetch("php/login.php", {
      method: "POST",
      body: formData,
    });

    const data = await response.json();

    if (data.success) {
      showNotification("success", "Login realizado com sucesso!");

      setTimeout(() => {
        window.location.href = "dashboard.html";
      }, 1000); // espera 3 segundos antes de redirecionar

    } else {
      showNotification("error", "Credenciais inválidas! Tente novamente");
    }

  } catch (err) {
    showNotification("error", "Erro na comunicação com o servidor.");
    console.error(err);
  }
});

function showNotification(type, message, duration = 5000) {
  const container = document.getElementById("notifications");

  const toast = document.createElement("div");
  toast.className = `
    relative w-full max-w-sm p-4 rounded-md shadow-lg text-sm flex items-start justify-between space-x-4
    ${type === "success" ? "bg-[#AFF8C2] text-[#37553A]" : "bg-[#FF8C8C] text-[#7D3E3E]"}
    animate-bounce-in
  `;

  toast.innerHTML = `
    <span class="font-medium">${message}</span>
    <button class="text-black font-bold absolute top-1 right-2" onclick="this.parentElement.remove()">✕</button>
    <div class="absolute bottom-0 left-0 h-1 ${type === "success" ? "bg-[#6FAD76]" : "bg-[#A84545]"} animate-progress"></div>
  `;

  container.prepend(toast);

  setTimeout(() => {
    toast.remove();
  }, duration);
}
