function validateLogin() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("error-message");

    if (username === "admin" && password === "password123") {
        alert("Login efetuado com sucesso!");
        errorMessage.textContent = "";
    } else {
        errorMessage.textContent = "Usuário ou Senha errada";
    }
}