// function encode(password) {
//     return btoa(password);
// }

// function togglePassword(id) {
//     let field = document.getElementById(id);
//     field.type = field.type === "password" ? "text" : "password";
// }

// function checkStrength() {
//     let password = document.getElementById("password").value;
//     let strength = document.getElementById("strength");

//     if (password.length < 6) {
//         strength.innerHTML = "Weak Password";
//         strength.style.color = "red";
//     } 
//     else if (password.match(/[A-Z]/) && password.match(/[0-9]/)) {
//         strength.innerHTML = "Strong Password";
//         strength.style.color = "green";
//     } 
//     else {
//         strength.innerHTML = "Medium Password";
//         strength.style.color = "orange";
//     }
// }

// function signup(event) {
//     event.preventDefault();

//     let name = document.getElementById("name").value.trim();
//     let email = document.getElementById("email").value.trim();
//     let password = document.getElementById("password").value.trim();

//     if (!name || !email || !password) {
//         document.getElementById("message").innerText = "All fields required!";
//         return false;
//     }

//     let user = {
//         name: name,
//         email: email,
//         password: encode(password)
//     };

//     localStorage.setItem("iqraUser", JSON.stringify(user));

//     alert("Account Created Successfully!");
//     window.location.href = "login.html";
// }

// function login(event) {
//     event.preventDefault();

//     let email = document.getElementById("loginEmail").value.trim();
//     let password = encode(document.getElementById("loginPassword").value.trim());

//     let storedUser = JSON.parse(localStorage.getItem("iqraUser"));

//     if (!storedUser) {
//         document.getElementById("message").innerText = "No account found!";
//         return false;
//     }

//     if (email === storedUser.email && password === storedUser.password) {

//         sessionStorage.setItem("iqraLoggedIn", "true");
//         window.location.href = "home.html";
//         return true;

//     } else {
//         document.getElementById("message").innerText = "Invalid Email or Password!";
//         return false;
//     }
// }

function encode(password) {
    return btoa(password);
}

function togglePassword() {
    let input = document.getElementById("password");
    let icon = document.querySelector(".toggle");

    if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        input.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}

function checkStrength() {
    let password = document.getElementById("password").value;
    let strength = document.getElementById("strength");

    if (password.length < 8) {
        strength.innerHTML = "Weak Password (min 8 characters)";
        strength.style.color = "red";
    } 
    else if (password.match(/[A-Z]/) && password.match(/[0-9]/) && password.match(/[@$!%*?&]/)) {
        strength.innerHTML = "Strong Password 🔥";
        strength.style.color = "green";
    } 
    else {
        strength.innerHTML = "Medium Password";
        strength.style.color = "orange";
    }
}

function signup(event) {
    event.preventDefault();

    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let message = document.getElementById("message");

    message.style.color = "red";

    if (!name || !email || !password) {
        message.innerText = "All fields are required!";
        return;
    }

    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.match(emailPattern)) {
        message.innerText = "Enter a valid email!";
        return;
    }

    if (password.length < 8) {
        message.innerText = "Password must be at least 8 characters!";
        return;
    }

    if (!password.match(/[A-Z]/)) {
        message.innerText = "Password must contain at least 1 uppercase letter!";
        return;
    }

    if (!password.match(/[0-9]/)) {
        message.innerText = "Password must contain at least 1 number!";
        return;
    }

    if (!password.match(/[@$!%*?&]/)) {
        message.innerText = "Password must contain at least 1 special character!";
        return;
    }

    // ✅ Save user
    let user = {
        name: name,
        email: email,
        password: encode(password)
    };

    localStorage.setItem("iqraUser", JSON.stringify(user));

    // ✅ Success Message
    message.style.color = "green";
    message.innerText = "Account created successfully! Redirecting...";

    // ✅ Redirect after 2 sec
    setTimeout(() => {
        window.location.href = "index.html";
    }, 2000);
}
function logout() {
    sessionStorage.removeItem("iqraLoggedIn");
    window.location.href = "login.html";
}

