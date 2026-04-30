<?php 
include "db.php";
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// check premium
$user = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT is_premium FROM user WHERE id='$user_id'")
);

$is_premium = $user['is_premium'] ?? 0;

if(isset($_SESSION['is_premium']) && $_SESSION['is_premium'] == 1){
    $is_premium = 1;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Quran Quiz</title>

<style>
body{
    margin:0;
    font-family:Segoe UI;
    background:linear-gradient(135deg,#0f172a,#1e293b);
    color:white;
}

/* HEADER */
.header{
    text-align:center;
    padding:30px;
}

.header h1{
    font-size:40px;
    margin:0;
}

.header p{
    opacity:0.7;
}

/* GRID */
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(180px,1fr));
    gap:15px;
    padding:20px;
}

/* CARD */
.card{
    background:white;
    color:black;
    padding:20px;
    border-radius:15px;
    text-align:center;
    cursor:pointer;
    transition:.3s;
    box-shadow:0 6px 15px rgba(0,0,0,0.2);
}

.card:hover{
    transform:scale(1.05);
    background:#6366f1;
    color:white;
}

/* 🔐 LOCK SCREEN */
.lock{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}

.lock-box{
    background:white;
    color:black;
    padding:40px;
    border-radius:20px;
    width:350px;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
}

.lock-box h2{
    font-size:28px;
}

.lock-box p{
    color:gray;
}

.price{
    font-size:30px;
    color:#16a34a;
    margin:10px 0;
}

.btn{
    display:block;
    margin-top:15px;
    padding:12px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:10px;
}
.result-btn{
    position:absolute;
    right:15px;
    top:50%;
    transform:translateY(-50%);

    background:#22c55e;
    color:white;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    transition:0.2s;
}

.result-btn:hover{
    background:#16a34a;
    transform:translateY(-50%) scale(1.05);
}
/* back arrow same rahega (NO CHANGE) */
.back-arrow{
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);

    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;

    cursor:pointer;
}
</style>

</head>

<body>

<?php if($is_premium == 0){ ?>

<!-- 🔐 LOCKED PAGE -->
<div class="lock">

    <div class="lock-box">

        <h2>🔐 Quiz Locked</h2>
        <p>This content is only for premium users</p>

        <div class="price">500 PKR</div>

        <p>Subscribe to unlock all Quran quizzes</p>

        <a class="btn" href="subscribe.php">Unlock Now</a>

    </div>

</div>

<?php } else { ?>

<!-- 🎯 QUIZ PAGE -->

<div class="header" style="position:relative;">
     <div class="back-arrow" onclick="goBack()">
        <svg viewBox="0 0 24 24" width="24" height="24">
            <path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <h1>📖 Quran Quiz</h1>
    <p>Select a Surah and test your knowledge</p>

    <a href="abc_result.php" class="result-btn">📊 My Quiz Results</a>

</div>
<div class="grid">

<?php
$surahs = [ 1=>"Al-Fatihah", 2=>"Al-Baqarah", 3=>"Aal-e-Imran", 4=>"An-Nisa", 5=>"Al-Ma'idah", 6=>"Al-An'am", 7=>"Al-A'raf", 8=>"Al-Anfal", 9=>"At-Tawbah", 10=>"Yunus", 11=>"Hud", 12=>"Yusuf", 13=>"Ar-Ra'd", 14=>"Ibrahim", 15=>"Al-Hijr", 16=>"An-Nahl", 17=>"Al-Isra", 18=>"Al-Kahf", 19=>"Maryam", 20=>"Ta-Ha", 21=>"Al-Anbiya", 22=>"Al-Hajj", 23=>"Al-Mu’minun", 24=>"An-Nur", 25=>"Al-Furqan", 26=>"Ash-Shu'ara", 27=>"An-Naml", 28=>"Al-Qasas", 29=>"Al-Ankabut", 30=>"Ar-Rum", 31=>"Luqman", 32=>"As-Sajdah", 33=>"Al-Ahzab", 34=>"Saba", 35=>"Fatir", 36=>"Ya-Sin", 37=>"As-Saffat", 38=>"Sad", 39=>"Az-Zumar", 40=>"Ghafir", 41=>"Fussilat", 42=>"Ash-Shura", 43=>"Az-Zukhruf", 44=>"Ad-Dukhan", 45=>"Al-Jathiyah", 46=>"Al-Ahqaf", 47=>"Muhammad", 48=>"Al-Fath", 49=>"Al-Hujurat", 50=>"Qaf", 51=>"Adh-Dhariyat", 52=>"At-Tur", 53=>"An-Najm", 54=>"Al-Qamar", 55=>"Ar-Rahman", 56=>"Al-Waqi'ah", 57=>"Al-Hadid", 58=>"Al-Mujadila", 59=>"Al-Hashr", 60=>"Al-Mumtahanah", 61=>"As-Saff", 62=>"Al-Jumu'ah", 63=>"Al-Munafiqun", 64=>"At-Taghabun", 65=>"At-Talaq", 66=>"At-Tahrim", 67=>"Al-Mulk", 68=>"Al-Qalam", 69=>"Al-Haqqah", 70=>"Al-Ma'arij", 71=>"Nuh", 72=>"Al-Jinn", 73=>"Al-Muzzammil", 74=>"Al-Muddaththir", 75=>"Al-Qiyamah", 76=>"Al-Insan", 77=>"Al-Mursalat", 78=>"An-Naba", 79=>"An-Nazi'at", 80=>"Abasa", 81=>"At-Takwir", 82=>"Al-Infitar", 83=>"Al-Mutaffifin", 84=>"Al-Inshiqaq", 85=>"Al-Buruj", 86=>"At-Tariq", 87=>"Al-A'la", 88=>"Al-Ghashiyah", 89=>"Al-Fajr", 90=>"Al-Balad", 91=>"Ash-Shams", 92=>"Al-Layl", 93=>"Ad-Duha", 94=>"Ash-Sharh", 95=>"At-Tin", 96=>"Al-Alaq", 97=>"Al-Qadr", 98=>"Al-Bayyinah", 99=>"Az-Zalzalah", 100=>"Al-Adiyat", 101=>"Al-Qari'ah", 102=>"At-Takathur", 103=>"Al-Asr", 104=>"Al-Humazah", 105=>"Al-Fil", 106=>"Quraish", 107=>"Al-Ma'un", 108=>"Al-Kawthar", 109=>"Al-Kafirun", 110=>"An-Nasr", 111=>"Al-Masad", 112=>"Al-Ikhlas", 113=>"Al-Falaq", 114=>"An-Nas" ];

foreach($surahs as $id=>$name){
?>

<div class="card" onclick="location.href='start_quiz.php?surah=<?php echo $id; ?>'">
    <h3><?php echo $name; ?></h3>
    <p>MCQs • Test yourself</p>
</div>

<?php } ?>

</div>

<?php } ?>
<script>
    function goBack(){
     {
        window.location.href = "index.html"; // fallback
    }
}
</script>
</body>
</html>