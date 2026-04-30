<?php
$id = $_GET['id'] ?? 1;

// API (Uthmani + English + Urdu)
$data = json_decode(file_get_contents("https://api.alquran.cloud/v1/surah/$id/editions/quran-uthmani,en.asad,ur.jalandhry"), true);

$ar = $data['data'][0]['ayahs'];
$en = $data['data'][1]['ayahs'];
$ur = $data['data'][2]['ayahs'];

$name = $data['data'][1]['englishName'];

// Audio
$audioData = json_decode(file_get_contents("https://api.alquran.cloud/v1/surah/$id/ar.alafasy"), true);
$audio = $audioData['data']['ayahs'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $name; ?></title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Amiri&family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background:#f4f7fb;
}

/* HEADER */
.header{
    background:#111827;
    color:white;
    padding:15px;
    display:flex;
    align-items:center;
    gap:15px;
}

/* CONTAINER */
.container{
    padding:15px;
}

/* AYAH CARD */
.ayah{
    background:white;
    padding:18px;
    border-radius:14px;
    margin-bottom:12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

/* TOP BAR */
.ayah-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

/* NUMBER */
.circle{
    width:35px;
    height:35px;
    border:2px solid #111;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:14px;
}

/* AUDIO BUTTON */
.audio-btn{
    background:#22c55e;
    border:none;
    border-radius:50%;
    width:40px;
    height:40px;
    cursor:pointer;
    font-size:16px;
}

/* ARABIC */
.ar{
    font-family:'Amiri', serif;
    font-size:28px;
    text-align:right;
    line-height:2.2;
    direction:rtl;
    margin-top:10px;
}

/* END SYMBOL */
.end{
    font-size:18px;
    margin-left:5px;
}

/* ENGLISH */
.en{
    font-size:15px;
    color:#444;
    margin-top:10px;
}

/* URDU */
.ur{
    font-family:'Noto Nastaliq Urdu', serif;
    font-size:18px;
    direction:rtl;
    text-align:right;
    margin-top:8px;
}
</style>

<script>
function playAudio(i){
    document.getElementById("audio"+i).play();
}
</script>

</head>

<body>

<!-- HEADER -->
<div class="header">
    <a href="quran.php" style="color:white;text-decoration:none;">⬅</a>
    <h3><?php echo $name; ?></h3>
</div>

<!-- CONTENT -->
<div class="container">

<?php for($i=0;$i<count($ar);$i++){ ?>

<div class="ayah">

    <!-- TOP -->
    <div class="ayah-top">
        <div class="circle"><?php echo $i+1; ?></div>
        <button class="audio-btn" onclick="playAudio(<?php echo $i; ?>)">🎧</button>
    </div>

    <!-- ARABIC -->
    <div class="ar">
        <?php echo $ar[$i]['text']; ?>
        <span class="end">۝<?php echo $i+1; ?></span>
    </div>

    <!-- TRANSLATIONS -->
    <div class="en"><?php echo $en[$i]['text']; ?></div>
    <div class="ur"><?php echo $ur[$i]['text']; ?></div>

    <!-- AUDIO -->
    <audio id="audio<?php echo $i; ?>">
        <source src="<?php echo $audio[$i]['audio']; ?>">
    </audio>

</div>

<?php } ?>

</div>

</body>
</html>