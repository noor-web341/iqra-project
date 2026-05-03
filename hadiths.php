<?php
include "db.php";

$book_id = $_GET['book_id'] ?? 0;
$search = $_GET['search'] ?? '';

// safety check
if($book_id == 0){
    die("Invalid Book ID");
}

// BOOK NAME
$book_query = mysqli_query($conn, "SELECT name FROM books WHERE id=$book_id");
$book = mysqli_fetch_assoc($book_query);
$book_name = $book['name'] ?? "Hadith Book";

// SEARCH QUERY
if($search != ""){
    $result = mysqli_query($conn, "
        SELECT * FROM hadiths 
        WHERE book_id=$book_id
        AND (
            arabic LIKE '%$search%' 
            OR english LIKE '%$search%'
            OR reference LIKE '%$search%'
            OR status LIKE '%$search%'
        )
    ");
} else {
    $result = mysqli_query($conn, "
        SELECT * FROM hadiths 
        WHERE book_id=$book_id
    ");
}
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

/* HEADER */
.view{
    background:#000;
    color:#fff;
    padding:15px;
    display:flex;
    align-items:center;
    justify-content:center;
    position:relative;
}

.back-area{
    position:absolute;
    left:15px;
    display:flex;
    align-items:center;
    gap:10px; /* 👈 space between arrow and IQRA */
    cursor:pointer;
}

.back-arrow, .iqra{
    font-size:18px;
    font-weight:bold;
    color:white;
}

/* TITLE */
.view h2{
    margin:0;
    font-size:20px;
}

/* BOOK TITLE */
.book-title{
    text-align:center;
    padding:15px;
    font-size:18px;
    font-weight:600;
}

/* SEARCH */
.search-box{
    text-align:center;
    margin-top:10px;
}

.search-box input{
    padding:10px;
    width:260px;
    border-radius:8px;
    border:1px solid #ccc;
    outline:none;
}

/* SHOW ALL BUTTON */
.clear-btn{
    text-align:center;
    margin-top:10px;
}

.clear-btn a{
    padding:8px 15px;
    background:#000;
    color:white;
    text-decoration:none;
    border-radius:6px;
    font-size:14px;
}

/* CONTAINER */
.container{
    max-width:900px;
    margin:auto;
    padding:20px;
}

/* CARD */
.card{
    background:white;
    border:1px solid #e5e7eb;
    padding:20px;
    margin-bottom:15px;
    border-radius:12px;
    box-shadow:0 3px 8px rgba(0,0,0,0.05);
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
    margin:10px 0;
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
</style>

</head>

<body>

<!-- HEADER -->
<header class="view">

  <div class="back-area">
    
    <span class="back-arrow" onclick="goBooks()">⬅</span>

    <span class="iqra" onclick="goHome()">IQRA</span>

</div>

    <h2>Hadith Collection</h2>

</header>

<!-- BOOK TITLE -->
<div class="book-title">
📚 <?php echo $book_name; ?>
</div>

<!-- SEARCH -->
<div class="search-box">
    <form method="GET">
        <input type="hidden" name="book_id" value="<?php echo $book_id; ?>">

        <!-- ❌ REMOVED oninput AUTO SEARCH -->
        <input type="text" name="search"
        placeholder="Search Hadith..."
        value="<?php echo htmlspecialchars($search); ?>">
    </form>
</div>

<!-- SHOW ALL BUTTON -->
<?php if($search != "") { ?>
<div class="clear-btn">
    <a href="hadiths.php?book_id=<?php echo $book_id; ?>">
        Show All Hadith
    </a>
</div>
<?php } ?>

<!-- CONTENT -->
<div class="container">

<?php if(mysqli_num_rows($result) > 0) { ?>

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

<?php } else { ?>

    <p style="text-align:center;">No Hadith found 😔</p>

<?php } ?>

</div>

<script>
function goBooks(){
    window.location.href = "books.php";
}

function goHome(){
    window.location.href = "index.php";
}


// ✅ ONLY ENTER KEY SEARCH
document.querySelector("input[name='search']").addEventListener("keypress", function(e){
    if(e.key === "Enter"){
        this.form.submit();
    }
});
</script>

</body>
</html>