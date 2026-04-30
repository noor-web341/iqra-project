
let users = [];
let quizData = [];

/* NAVIGATION */
function loadPage(page) {
    document.getElementById("title").innerText = page.toUpperCase();

    if (page === "dashboard") dashboard();
    if (page === "users") usersPage();
    if (page === "quran") quranPage();
    if (page === "hadith") hadithPage();
    if (page === "quiz") quizPage();
    if (page === "prayer") prayerPage();
}

/* DASHBOARD */
function dashboard() {
    document.getElementById("content").innerHTML = `
        <div class="cards">
            
            <div class="card">Users: ${users.length}</div>
            <div class="card">Quizzes: ${quizData.length}</div>
            <div class="card">Quran API: Active</div>
            <div class="card">Hadith: Active</div>
            <div class="card">Prayer API: Active</div>
        </div>
    `;
}

/* USERS */
function usersPage() {
    let html = `
        <button class="btn-add" onclick="openUserModal()">Add User</button>
        <table>
        <tr><th>Name</th><th>Email</th><th>Action</th></tr>
    `;

    users.forEach((u, i) => {
        html += `
        <tr>
            <td>${u.name}</td>
            <td>${u.email}</td>
            <td><button class="btn-delete" onclick="deleteUser(${i})">Delete</button></td>
        </tr>`;
    });

    html += "</table>";
    document.getElementById("content").innerHTML = html;
}

function deleteUser(i) {
    users.splice(i, 1);
    usersPage();
}

function openUserModal() {
    document.getElementById("userModal").style.display = "block";
}

function closeUserModal() {
    document.getElementById("userModal").style.display = "none";
}

function saveUser() {
    let name = document.getElementById("uname").value;
    let email = document.getElementById("uemail").value;

    users.push({name, email});
    closeUserModal();
    usersPage();
}

/* QURAN */
function quranPage() {
    document.getElementById("content").innerHTML = `
        <div class="card">
            <h2>Quran Section</h2>
            <p>Quran API will be connected here</p>
        </div>`;
}

/* HADITH */
function hadithPage() {
    document.getElementById("content").innerHTML = `
        <div class="card">
            <h2>Hadith Section</h2>
            <p>Hadith API will be connected here</p>
        </div>`;
}

/* QUIZ */
function quizPage() {
    let html = `
        <button class="btn-add" onclick="openQuizModal()">Add Quiz</button>
        <table>
        <tr><th>Question</th><th>Action</th></tr>
    `;

    quizData.forEach((q, i) => {
        html += `
        <tr>
            <td>${q.question}</td>
            <td><button class="btn-delete" onclick="deleteQuiz(${i})">Delete</button></td>
        </tr>`;
    });

    html += "</table>";
    document.getElementById("content").innerHTML = html;
}

function deleteQuiz(i) {
    quizData.splice(i, 1);
    quizPage();
}

function openQuizModal() {
    document.getElementById("quizModal").style.display = "block";
}

function closeQuizModal() {
    document.getElementById("quizModal").style.display = "none";
}

function saveQuiz() {
    let question = document.getElementById("q").value;
    let a = document.getElementById("a").value;
    let b = document.getElementById("b").value;
    let c = document.getElementById("c").value;
    let correct = document.getElementById("correct").value;

    quizData.push({question, a, b, c, correct});
    closeQuizModal();
    quizPage();
}

/* PRAYER */
function prayerPage() {
    document.getElementById("content").innerHTML = `
        <div class="card">
            <h2>Prayer Times</h2>
            <p>Prayer API will be connected here</p>
        </div>`;
}

/* DEFAULT LOAD */
loadPage("dashboard");