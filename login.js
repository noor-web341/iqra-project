// 🔐 Same encoding function (signup jaisa hi hona chahiye)
function encode(password) {
    return btoa(password);
}

// 👁 Toggle password
function togglePassword(id) {
    let input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

// 🔑 LOGIN FUNCTION
function login() {
    let email = document.getElementById("loginEmail").value.trim();
    let password = document.getElementById("loginPassword").value.trim();
    let message = document.getElementById("message");

    message.style.color = "red";

    if (!email || !password) {
        message.innerText = "Please fill all fields!";
        return;
    }

    // 📦 Get user from localStorage
    let storedUser = JSON.parse(localStorage.getItem("iqraUser"));

    if (!storedUser) {
        message.innerText = "No account found! Please sign up first.";
        return;
    }

    // 🔐 Compare
    if (email === storedUser.email && encode(password) === storedUser.password) {

        // ✅ Save login session
        sessionStorage.setItem("iqraLoggedIn", "true");

        message.style.color = "green";
        message.innerText = "Login successful! Redirecting...";

        setTimeout(() => {
            window.location.href = "index.html"; // apna dashboard page
        }, 1500);

    } else {
        message.innerText = "Invalid email or password!";
    }
}

