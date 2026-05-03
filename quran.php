<?php
$data = json_decode(file_get_contents("https://api.alquran.cloud/v1/surah"), true);
$surahs = $data['data'];

$search = isset($_GET['search']) ? strtolower($_GET['search']) : "";
$found = false;
?>

<!DOCTYPE html>
<html>
<head>
<title>Quran</title>
<link rel="stylesheet" href="quran.css">

<style>
.view{
    background:#000;
    color:#fff;
    padding:15px;
    display:flex;
    align-items:center;
    position:relative;
}

/* back button left side */
.back-arrow{
    width:38px;
    height:38px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

/* center heading */
.view h2{
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    margin:0;
    font-size:18px;
}
</style>

</head>

<body>

<!-- HEADER -->
<header class="view">

  <div class="back-arrow" onclick="goBack()">
    IQRA
</div>

    <h2>📖 Al-Quran</h2>

</header>

<div class="container">

<?php foreach($surahs as $s){

    $text = strtolower(
    $s['englishName'] . ' ' .
    $s['name'] . ' ' .
    $s['number']
);

// agar search empty nahi hai
if($search != ""){

    // agar number search hai
    if(is_numeric($search)){
        if($s['number'] != $search){
            continue;
        }
    }
    else{

        $keywords = explode(" ", $search);
        $match = false;

        foreach($keywords as $word){
            if($word != "" && strpos($text, $word) !== false){
                $match = true;
            }
        }

        if(!$match){
            continue;
        }
    }
}
    $found = true;
?>

<a href="surh.php?id=<?php echo $s['number']; ?>" class="surah-card borl">

    <div class="left">
        <h3><?php echo $s['number']; ?>. <?php echo $s['englishName']; ?></h3>
        <p><?php echo $s['revelationType']; ?> • <?php echo $s['numberOfAyahs']; ?> Ayahs</p>
    </div>

    <div class="right">
        <?php echo $s['name']; ?>
    </div>

</a>

<?php } ?>

<?php if(!$found){ ?>
    <p style="text-align:center;color:red;">No Surah Found 😔</p>
<?php } ?>

</div>

<script>
function goBack(){
    {
        window.location.href = "index.php";
    }
}
</script>

</body>
</html>