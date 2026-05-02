<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About Us | IQRA</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="about.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div id="progress-bar"></div>

<!-- NAVBAR -->
<header class="qc-navbar">

    <!-- BACK BUTTON -->
    <div class="back-arrow" onclick="goBack()">
        <svg viewBox="0 0 24 24">
            <path d="M15 6l-6 6 6 6"/>
        </svg>
    </div>

    <!-- LOGO -->
    <div class="qc-left">
        <h2 class="qc-logo">IQRA</h2>
    </div>

    <!-- CENTER -->
    <div class="qc-center">
        <span class="track">🎯 Stay on track!</span>
        <button class="goal-btn">✨ Create My Goal</button>
    </div>

    <!-- 🔥 LOGIN SYSTEM -->
    <div class="qc-right">

        <?php if(isset($_SESSION['user'])) { ?>
            <span>👤 <?php echo $_SESSION['user']; ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        <?php } else { ?>
            <a href="signin.php" class="signin-btn">Sign In</a>
        <?php } ?>

        <span class="nav-icon">🔍</span>
        <span class="nav-icon">☰</span>

    </div>

    <!-- MENU -->
    <div class="menu-overlay" id="menuOverlay"></div>

    <aside class="side-menu" id="sideMenu">
        <div class="menu-header">
            <h3>IQRA</h3>
            <span class="close-btn" id="closeMenu">✕</span>
        </div>

        <nav class="menu-links">
            <a href="index.php">🏠 Home</a>
            <a href="quran.php">📖 Quran</a>
            <a href="books.php">📚 Hadith</a>
            <a href="Goals.php">🎯 Goals</a>
            <a href="view_notes.php">📝 Notes</a>
            <a href="quran_quiz.php">🧠 Quiz</a>
            <a href="prayer.php">🕌 Prayer Times</a>
            <a href="about.php">ℹ️ About IQRA</a>
            <a href="contact.php">📞 Contact</a>
        </nav>
    </aside>

</header>

<!-- BACK SCRIPT -->
<script>
function goBack(){
    if(document.referrer !== ""){
        window.history.back();
    } else {
        window.location.href = "index.php";
    }
}
</script>

<!-- BACK BUTTON STYLE -->
<style>
.back-arrow{
    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:0.2s;
}
.back-arrow svg{
    width:22px;
    height:22px;
    stroke:#111;
    stroke-width:2.5;
    fill:none;
}
.back-arrow:hover{
    background:rgba(0,0,0,0.06);
}
.back-arrow:active{
    transform:scale(0.85);
    background:rgba(0,0,0,0.12);
}
</style>

<!-- HERO -->
<section class="about-hero">
    <h1>About IQRA</h1>
    <p>Learning the Quran. Living the Sunnah.</p>
</section>

<!-- CONTENT -->
<section class="about-content">

    <div class="about-card">
        <h2>Our Mission</h2>
        <p>
            IQRA is an Islamic learning platform dedicated to making the Quran and Sunnah
            accessible, understandable, and engaging for everyone.
        </p>
    </div>

    <div class="about-card">
        <h2>Our Vision</h2>
        <p>
            We envision a global community that learns and practices Islam with sincerity and knowledge.
        </p>
    </div>

    <div class="about-card">
        <h2>What We Offer</h2>
        <ul>
            <li>📖 Quran with translation</li>
            <li>📝 Islamic quizzes</li>
            <li>📚 Hadith collections</li>
            <li>🎯 Goals tracking</li>
            <li>🌙 Reminders</li>
        </ul>
    </div>

</section>

<!-- FOOTER -->
<footer class="iqra-footer"> <div class="footer-top"> <!-- BRAND --> <div class="footer-col"> <h2 class="footer-logo">IQRA</h2> <p> IQRA is an Islamic learning platform designed to help Muslims connect with the Quran, Hadith, and authentic knowledge in a simple and modern way. </p> </div> <!-- QUICK LINKS --> <div class="footer-col"> <h3>Quick Links</h3> <ul> <li><a href="#">Home</a></li> <li><a href="#">Quran</a></li> <li><a href="#">Hadith</a></li> <li><a href="#">Quiz</a></li> <li><a href="#">Prayer Times</a></li> </ul> </div> <!-- LEARNING --> <div class="footer-col"> <h3>Learning</h3> <ul> <li><a href="#">Daily Ayah</a></li> <li><a href="#">Weekly Hadith</a></li> <li><a href="#">Islamic Quiz</a></li> <li><a href="#">Goals & Streaks</a></li> </ul> </div> <!-- CONTACT --> <div class="footer-col"> <h3>Contact</h3> <p>📧 support@iqra.com</p> <p>📍 Serving Muslims Worldwide</p> <p>🕋 Learn • Practice • Reflect</p> </div> </div> <!-- BOTTOM --> <div class="footer-bottom"> <p>© 2026 IQRA Islamic Learning Platform. All Rights Reserved.</p> <p class="footer-quote"> “Read in the name of your Lord who created” — Qur’an 96:1 </p> </div> </footer>

<script src="script.js"></script>

</body>
</html>