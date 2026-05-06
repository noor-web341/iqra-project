<?php
include "db.php";

// SEARCH
$search = $_GET['search'] ?? '';

if($search != ""){
    $result = mysqli_query($conn, "
        SELECT * FROM books 
        WHERE name LIKE '%$search%'
    ");
} else {
    $result = mysqli_query($conn, "SELECT * FROM books");
}
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

/* HEADER */
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

.view h2{
    margin:0;
    font-size:22px;
    font-weight:700;
}

/* BACK BUTTON */
.back-arrow{
    position:absolute;
    left:15px;
    top:50%;
    transform:translateY(-50%);
    cursor:pointer;
    font-size:18px;
    font-weight:600;
}

/* SEARCH */
.search-box{
    text-align:center;
    margin-top:15px;
}

.search-box input{
    padding:10px 15px;
    width:260px;
    border-radius:8px;
    border:1px solid #ccc;
    outline:none;
}

/* CLEAR BUTTON */
.clear-btn{
    text-align:center;
    margin-top:10px;
}

.clear-btn a{
    padding:8px 15px;
    background:#0f172a;
    color:white;
    border-radius:6px;
    text-decoration:none;
    font-size:14px;
}

/* CONTAINER */
.container{
    max-width:1000px;
    margin:30px auto;
    padding:30px;
    background:url('2-1024x683.jpg') center center no-repeat;
    background-size:cover;
    border-radius:20px;
    position:relative;
    overflow:hidden;
}

/* OVERLAY */
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
    IQRA
   </div>

   <h2>📖 Iqra Hadith Library</h2>

</header>

<!-- SEARCH -->
<div class="search-box">
    <form method="GET">
        <input type="text" name="search"
        oninput="this.form.submit()"
        placeholder="Search Hadith books..."
        value="<?php echo htmlspecialchars($search); ?>">
    </form>
</div>

<!-- SHOW ALL BUTTON -->
<?php if($search != "") { ?>
<div class="clear-btn">
    <a href="books.php">Show All Books</a>
</div>
<?php } ?>

<!-- CONTENT -->
<div class="container">

    <div class="grid">

    <?php if(mysqli_num_rows($result) > 0) { ?>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="card">
    <div class="icon">📚</div>

    <a href="hadiths.php?book_id=<?php echo $row['id']; ?>">
        <?php echo htmlspecialchars($row['name']); ?>
    </a>

    <br><br>

   <a href="download_pdf.php?book_id=<?php echo $row['id']; ?>" 
   style="display:inline-block;margin-top:10px;padding:8px 12px;background:#ef4444;color:white;border-radius:8px;font-size:13px;text-decoration:none;">
   📄 Download PDF
</a>
</div>

        <?php } ?>

    <?php } else { ?>

        <p style="text-align:center; position:relative;">No books found 😔</p>

    <?php } ?>
    

    </div>

</div>

<script>
function goBack(){
    window.location.href = "index.php";
}
</script>

</body>
</html>