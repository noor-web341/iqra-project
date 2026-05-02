<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us | IQRA</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div id="progress-bar"></div>

<!-- NAVBAR -->
<header class="qc-navbar">

<div class="back-arrow" onclick="goBack()">
    <svg viewBox="0 0 24 24" width="24" height="24">
        <path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
    </svg>
</div>

<div class="qc-left">
    <h2 class="qc-logo">IQRA</h2>
</div>

<div class="qc-center">
    <span class="track">🎯 Stay on track!</span>
    <button class="goal-btn">✨ Create My Goal</button>
</div>

<!-- 🔥 SESSION FIXED -->
<div class="qc-right">

    <?php if(isset($_SESSION['user'])) { ?>
        <span>👤 <?php echo htmlspecialchars($_SESSION['user']); ?></span>
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

<!-- HERO -->
<section class="contact-hero">
    <h1>Contact Us</h1>
    <p>We’d love to hear from you</p>
</section>

<!-- CONTACT -->
<section class="contact-section">

    <div class="contact-info">
        <h2>Get in Touch</h2>
        <p>Have a question, feedback, or suggestion? Reach out to us.</p>

        <p>📧 Email: support@iqra.com</p>
        <p>📞 Phone: +92 300 1234567</p>
        <p>📍 Location: Pakistan</p>

        <section class="islamic-quote">
            <p>“And whoever puts his trust in Allah, then He will suffice him.”</p>
            <span>— Surah At-Talaq (65:3)</span>
        </section>
    </div>

    <!-- FORM -->
    <div class="contact-form">
        <h2>Send a Message</h2>

        <form onsubmit="sendMessage(event)">
            <input type="text" id="cName" placeholder="Your Name" required>
            <input type="email" id="cEmail" placeholder="Your Email" required>
            <textarea id="cMessage" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>

        <p id="contactMsg"></p>
    </div>

</section>

<!-- FOOTER -->
<footer class="iqra-footer"> <div class="footer-top"> <!-- BRAND --> <div class="footer-col"> <h2 class="footer-logo">IQRA</h2> <p> IQRA is an Islamic learning platform designed to help Muslims connect with the Quran, Hadith, and authentic knowledge in a simple and modern way. </p> </div> <!-- QUICK LINKS --> <div class="footer-col"> <h3>Quick Links</h3> <ul> <li><a href="#">Home</a></li> <li><a href="#">Quran</a></li> <li><a href="#">Hadith</a></li> <li><a href="#">Quiz</a></li> <li><a href="#">Prayer Times</a></li> </ul> </div> <!-- LEARNING --> <div class="footer-col"> <h3>Learning</h3> <ul> <li><a href="#">Daily Ayah</a></li> <li><a href="#">Weekly Hadith</a></li> <li><a href="#">Islamic Quiz</a></li> <li><a href="#">Goals & Streaks</a></li> </ul> </div> <!-- CONTACT --> <div class="footer-col"> <h3>Contact</h3> <p>📧 support@iqra.com</p> <p>📍 Serving Muslims Worldwide</p> <p>🕋 Learn • Practice • Reflect</p> </div> </div> <!-- BOTTOM --> <div class="footer-bottom"> <p>© 2026 IQRA Islamic Learning Platform. All Rights Reserved.</p> <p class="footer-quote"> “Read in the name of your Lord who created” — Qur’an 96:1 </p> </div> </footer>
<!-- SCRIPTS -->
<script>
function goBack(){
    if(document.referrer !== ""){
        window.history.back();
    } else {
        window.location.href = "index.php";
    }
}
</script>

<script src="function.js"></script>
<script src="script.js"></script>
<script src="contact.js"></script>

</body>
</html>