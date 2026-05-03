<?php
$id = $_GET['id'] ?? 1;

// API
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

<link href="https://fonts.googleapis.com/css2?family=Amiri&family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Segoe UI';
    background:#f4f7fb;
}

.header{
    background:#111827;
    color:white;
    padding:15px;
    display:flex;
    align-items:center;
    gap:15px;
}

.container{
    padding:15px;
}

.ayah{
    background:white;
    padding:18px;
    border-radius:14px;
    margin-bottom:12px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}

.ayah-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

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

.audio-btn{
    background:#22c55e;
    border:none;
    border-radius:50%;
    width:42px;
    height:42px;
    cursor:pointer;
    font-size:16px;
    transition:0.2s;
}

.audio-btn:active{
    transform:scale(0.9);
}

.ar{
    font-family:'Amiri', serif;
    font-size:28px;
    text-align:right;
    line-height:2.2;
    direction:rtl;
    margin-top:10px;
}

.end{
    font-size:18px;
    margin-left:5px;
}

.en{
    font-size:15px;
    color:#444;
    margin-top:10px;
}

.ur{
    font-family:'Noto Nastaliq Urdu', serif;
    font-size:18px;
    direction:rtl;
    text-align:right;
    margin-top:8px;
}
</style>

<script>

// 🔥 GLOBAL AUDIO CONTROL
let currentAudio = null;

function playAudio(i){

    let newAudio = document.getElementById("audio"+i);

    // 🔴 stop previous
    if(currentAudio && currentAudio !== newAudio){
        currentAudio.pause();
        currentAudio.currentTime = 0;
    }

    // 🔁 toggle
    if(newAudio.paused){
        newAudio.play();
        currentAudio = newAudio;
    } else {
        newAudio.pause();
    }
}

</script>

</head>

<body>

<div class="header">
    <a href="quran.php" style="color:white;text-decoration:none;">⬅</a>
    <h3><?php echo $name; ?></h3>
</div>

<div class="container">

<?php for($i=0;$i<count($ar);$i++){ ?>

<div class="ayah">

    <div class="ayah-top">
        <div class="circle"><?php echo $i+1; ?></div>

        <button class="audio-btn" onclick="playAudio(<?php echo $i; ?>)">
            ▶️
        </button>
    </div>

    <div class="ar">
        <?php echo $ar[$i]['text']; ?>
        <span class="end">۝<?php echo $i+1; ?></span>
    </div>

    <div class="en"><?php echo $en[$i]['text']; ?></div>
    <div class="ur"><?php echo $ur[$i]['text']; ?></div>

    <audio id="audio<?php echo $i; ?>">
        <source src="<?php echo $audio[$i]['audio']; ?>">
    </audio>

</div>

<?php } ?>

</div>

</body>
</html>