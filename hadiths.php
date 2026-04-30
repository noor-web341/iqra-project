<?php
include "db.php";

$book_id = $_GET['book_id'];

// Book name fetch (IMPORTANT FIX)
$book_query = mysqli_query($conn, "SELECT name FROM books WHERE id=$book_id");
$book = mysqli_fetch_assoc($book_query);
$book_name = $book['name'] ?? "Hadith Book";

// Hadiths
$result = mysqli_query($conn, "SELECT * FROM hadiths WHERE book_id=$book_id");
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $book_name; ?></title>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
<style>
body{
    margin:0;
    font-family:"Segoe UI";
    background:#f9fafb;
    color:#111827;
}

/* TOP BAR */
.header{
    background:#0f172a;
    color:white;
    padding:20px;
    text-align:center;
    font-size:20px;
}

/* BOOK TITLE */
.book-title{
    text-align:center;
    padding:15px;
    font-size:18px;
    font-weight:600;
    color:#0f172a;
}

/* CONTAINER */
.container{
    max-width:900px;
    margin:auto;
    padding:20px;
}

/* HADITH CARD */
.card{
    background:white;
    border:1px solid #e5e7eb;
    padding:20px;
    margin-bottom:15px;
    border-radius:12px;
}

/* ARABIC */
.arabic{
    direction: rtl;
    font-family: "Amiri", serif;
    font-size: 24px;
    line-height: 2;
    text-align: right;
}
/* ENGLISH */
.english{
    font-size:15px;
    color:#374151;
    margin-bottom:10px;
    line-height:1.6;
}

/* BADGE */
.badge{
    display:inline-block;
    padding:4px 10px;
    border-radius:20px;
    font-size:11px;
    background:#16a34a;
    color:white;
}

/* REF */
.ref{
    font-size:12px;
    color:#6b7280;
    margin-top:8px;
}
.view{
    background:#000;
    color:#fff;
    padding:15px;

    display:flex;
    align-items:center;
    gap:12px;
}

/* back arrow same rahega (NO CHANGE) */
.back-arrow{
    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

/* ONLY H2 CENTER FIX */
.view h2{
    margin:0;
    font-size:25px;
    position:absolute;
    left:50%;
    transform:translateX(-50%);
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

    <h2>
        📖 Hadith Collection
    </h2>

</header>

<div class="book-title">
📚 <?php echo $book_name; ?>
</div>

<div class="container">

<?php while($h = mysqli_fetch_assoc($result)) { ?>

<div class="card">

    <div class="arabic">
        <?php echo $h['arabic']; ?>
    </div>

    <div class="english">
        <?php echo $h['english']; ?>
    </div>

    <span class="badge">
        <?php echo $h['status']; ?>
    </span>

    <div class="ref">
        🔖 <?php echo $h['reference']; ?>
    </div>

</div>

<?php } ?>

</div>
<script>
function goBack(){
    if(document.referrer){
        window.history.back();
    } else {
        window.location.href = "index.html";
    }
}
</script>
</body>
</html>