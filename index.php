<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>IQRA | Islamic Learning Platform</title>

<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<span class="user-icon">
  <span class="material-symbols-outlined">account_circle</span>
</span>
</head>

<body>

<!-- SCROLL BAR -->
<div id="progress-bar"></div>

<!-- NAVBAR -->
<header class="qc-navbar">

    <div class="qc-left">
       <a href="index.php" class="borl">
  <h2 class="qc-logo">IQRA | Islamic Learning Platform</h2>
</a>
    </div>

    <!-- <div class="qc-center">
        <span class="track">🎯 Stay on track!</span>
        <button class="goal-btn">✨ Create My Goal</button>
    </div> -->

    <!-- 🔥 LOGIN SYSTEM (FULL FIX) -->
    <div class="qc-right">

        <?php if(isset($_SESSION['user'])) { ?>

        <span class="user-icon">
  <i data-lucide="user-circle"></i>
</span>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();
</script>
            <a href="logout.php" class="logout-btn">Logout</a>

        <?php } else { ?>

            <a href="login.php" class="signin-btn">Sign In</a>

        <?php } ?>

        <span class="nav-icon"></span>
        <span class="nav-icon">☰</span>

    </div>
    <!--MENU PANEL --> <div class="menu-overlay" id="menuOverlay"></div> <aside class="side-menu" id="sideMenu"> <div class="menu-header"> <h3>IQRA</h3> <span class="close-btn" id="closeMenu">✕</span> </div> <nav class="menu-links"> <a href="index.php">🏠 Home</a> <a href="quran.php">📖 Quran</a> <a href="books.php">📚 Hadith</a> 
     <!-- <a href="Goals.php">🎯 Goals</a> -->
      <a href="view_notes.php">📝 Notes</a> <a href="quran_quiz.php">🧠 Quiz</a> <a href="prayer.php">🕌 Prayer Times</a> <a href="about.php">ℹ️ About IQRA</a> <a href="contact.php">📞 Contact</a> </nav> </aside>

</header>

<!-- HERO -->
<section class="qc-hero">
    <div class="qc-hero-content">
        <h1>IQRA</h1>

        <div class="qc-search">
            <span class="search-icon">🔍</span>
            <input type="text" id="searchInput" placeholder="Search Surah ....">
        </div>
    </div>
</section>

<script>
document.getElementById("searchInput").addEventListener("keypress", function(e){
    if(e.key === "Enter"){
        let value = this.value.trim();

        if(value !== ""){
            window.location.href = "quran.php?search=" + encodeURIComponent(value);
        }
    }
});
</script>

<!-- FEATURES -->
<section class="continue-reading">

    <div class="cr-header">
        <h2><span class="highlight">Continue</span> Reading</h2>
        <a href="quran.php" class="my-quran">🔖 My Quran</a>
    </div>

    <div class="cr-grid">

        <a href="quran.php" class="borl">
            <div class="cr-card main-card">
                <div class="arabic-title">ٱلْفَاتِحَة</div>
                <div class="card-footer">
                    <span>1. Al-Fatihah <small>(The Opener)</small></span>
                    <span class="verse">Verse 1 ›</span>
                </div>
            </div>
        </a>

        <div class="cr-side">

            <!-- <a href="Goals.php" class="borl">
                <div class="cr-card side-card">
                    <h3>🎯 Achieve Your Quran Goals</h3>
                    <p>Track Streaks, Create Custom Goals</p>
                    <span class="arrow">›</span>
                </div>
            </a> -->

           <!-- NOTES --> <a href="view_notes.php" class="borl"> <div class="cr-card side-card"> <h3>✏️ Have you been missing out on Notes?</h3> <span class="arrow">›</span> </div> </a>

        </div>

    </div>

</section>

<!-- LEARNING -->
<section class="learning-section">

    <div class="section-head">
        <h2>📚 Start Learning</h2>
    </div>

    <div class="scroll-wrapper">

        <div class="scroll-track">

            <a href="quran.php" class="learn-card">
                <img src="https://images.unsplash.com/photo-1542816417-0983c9c9ad53">
                <div class="card-title">📖 Quran</div>
            </a>

            <a href="books.php" class="learn-card">
                <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f">
                <div class="card-title">🕌 Hadith</div>
            </a>

            <a href="prayer.php" class="learn-card">
                <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee">
                <div class="card-title">🕋 Prayer Time</div>
            </a>

            <a href="quran_quiz.php" class="learn-card">
                <img src="https://images.unsplash.com/photo-1509021436665-8f07dbf5bf1d">
                <div class="card-title">🧠 Quiz</div>
            </a>

        </div>

    </div>

</section>
<!-- HADITH SECTION --> <section class="hadith-year"> <!-- HEADER --> <div class="hy-header"> <h2>Hadith of the Week</h2> <div class="hy-right"> <span id="weekNumber" class="week-badge"></span> <!-- <a href="#" class="calendar-link">📅 Calendar</a> --> </div> </div>
<!-- HADITH CARD --> <div class="hadith-card"> <p class="hy-subtitle">A hadith from this week's study</p> <!-- ARABIC HADITH --> <p class="hadith-arabic"> إِنَّمَا الأَعْمَالُ بِالنِّيَّاتِ، وَإِنَّمَا لِكُلِّ امْرِئٍ مَا نَوَى </p> <!-- TRANSLATION --> <p class="hadith-translation"> “Actions are judged by intentions, and every person will be rewarded according to what they intended.” <span class="hadith-ref">— Sahih al-Bukhari & Sahih Muslim</span> </p> <!-- CTA --> <a href="books.php" class=" borl"> Hadith → </a> </div> </section>
</section>

<!-- FOOTER -->
<footer class="iqra-footer"> <div class="footer-top"> <!-- BRAND --> <div class="footer-col"> <h2 class="footer-logo">IQRA</h2> <p> IQRA is an Islamic learning platform designed to help Muslims connect with the Quran, Hadith, and authentic knowledge in a simple and modern way. </p> </div> <!-- QUICK LINKS --> <div class="footer-col"> <h3>Quick Links</h3> <ul> <li><a href="index.php">Home</a></li> <li><a href="quran.php">Quran</a></li> <li><a href="books.php">Hadith</a></li> <li><a href="quran_quiz.php">Quiz</a></li> <li><a href="prayer.php">Prayer Times</a></li> </ul> </div> <!-- LEARNING --> <div class="footer-col"> <h3>Learning</h3> <ul> <li><a href="#">Daily Ayah</a></li> <li><a href="#">Weekly Hadith</a></li> <li><a href="#">Islamic Quiz</a></li> <li><a href="#">Goals & Streaks</a></li> </ul> </div> <!-- CONTACT --> <div class="footer-col"> <h3>Contact</h3> <p>📧 support@iqra.com</p> <p>📍 Serving Muslims Worldwide</p> <p>🕋 Learn • Practice • Reflect</p> </div> </div> <!-- BOTTOM --> <div class="footer-bottom"> <p>© 2026 IQRA Islamic Learning Platform. All Rights Reserved.</p> <p class="footer-quote"> “Read in the name of your Lord who created” — Qur’an 96:1 </p> </div> </footer>

<script src="script.js"></script>

</body>
</html>