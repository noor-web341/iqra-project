<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
<title>Iqra Hadith Library</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background:#f8fafc;
}

/* HEADER FIXED (proper height) */
.view{
    background:#0f172a;
    color:white;
    padding:22px 18px;
    display:flex;
    align-items:center;
    justify-content:center;
    position:relative;
    min-height:70px;
}

/* TITLE */
.view h2{
    margin:0;
    font-size:22px;
    font-weight:700;
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

/* SUB TEXT */
.sub{
    text-align:center;
    color:#6b7280;
    margin-top:18px;
    font-size:14px;
}

/* BACKGROUND SECTION FIXED */
.container{
    max-width:1000px;
    margin:30px auto;
    padding:30px;

    /* IMPORTANT FIX */
    background:url('2-1024x683.jpg') center center no-repeat;
    background-size:cover;

    border-radius:20px;
    position:relative;
    overflow:hidden;
}

/* LIGHT OVERLAY */
.container::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(255,255,255,0.88);
}

/* GRID */
.grid{
    position:relative;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:18px;
}

/* CARD */
.card{
    background:white;
    border-radius:15px;
    padding:20px;
    text-align:center;
    border:1px solid #e5e7eb;
    transition:0.25s;
    box-shadow:0 3px 10px rgba(0,0,0,0.05);
}

.card:hover{
    transform:translateY(-6px);
    box-shadow:0 15px 25px rgba(0,0,0,0.12);
}

.icon{
    font-size:32px;
    margin-bottom:10px;
}

.card a{
    text-decoration:none;
    color:#0f172a;
    font-weight:600;
}
</style>

</head>

<body>

<header class="view">

   <div class="back-arrow" onclick="goBack()">
        <svg viewBox="0 0 24 24" width="24" height="24">
            <path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <h2>📖 Iqra Hadith Library</h2>

</header>

<div class="sub">Authentic Hadith Collection</div>

<div class="container">

    <div class="grid">

    <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card">
            <div class="icon">📚</div>
            <a href="hadiths.php?book_id=<?php echo $row['id']; ?>">
                <?php echo htmlspecialchars($row['name']); ?>
            </a>
        </div>

    <?php } ?>

    </div>

</div>

<script>
function goBack(){
    window.history.back();
}
</script>

</body>
</html>