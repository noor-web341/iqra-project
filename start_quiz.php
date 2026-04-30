<?php
include "db.php";

$surah = $_GET['surah'];

$q = mysqli_query($conn,"SELECT * FROM quiz_questions WHERE surah_id=$surah ORDER BY RAND()");

$data = [];
while($row=mysqli_fetch_assoc($q)){
    $data[]=$row;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Quiz</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Inter', sans-serif;
    background:linear-gradient(180deg,#f8fafc,#eef2f7);
}

/* HEADER */
.view{
    background:#0f172a;
    color:white;
    padding:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    position:relative;
}

/* TITLE */
.view h2{
    margin:0;
    font-size:20px;
    font-weight:700;
}

/* BACK BUTTON */
.back-arrow{
    position:absolute;
    left:15px;
    width:42px;
    height:42px;
    border-radius:50%;
    background:white;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    box-shadow:0 4px 12px rgba(0,0,0,0.2);
    transition:0.2s;
}

.back-arrow:hover{
    transform:scale(1.05);
}

.back-arrow svg{
    width:22px;
    height:22px;
}

/* CENTER BOX */
.box{
    background:white;
    padding:25px;
    border-radius:18px;
    width:90%;
    max-width:500px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    text-align:center;
    margin:60px auto;
}

/* START BUTTON */
.start-btn{
    background:#22c55e;
    color:white;
    border:none;
    padding:12px;
    width:100%;
    border-radius:10px;
    font-size:16px;
    font-weight:600;
    cursor:pointer;
}

/* QUESTION */
#question{
    font-size:18px;
    margin-bottom:15px;
}

/* OPTIONS */
#options button{
    width:100%;
    padding:12px;
    margin:6px 0;
    border:none;
    border-radius:10px;
    background:#f1f5f9;
    cursor:pointer;
    font-size:15px;
    transition:0.2s;
}

#options button:hover{
    background:#6366f1;
    color:white;
    transform:scale(1.02);
}

/* TIMER */
#timer{
    margin-top:10px;
    font-weight:600;
    color:#ef4444;
}

/* COUNT */
#count{
    color:#64748b;
    font-size:14px;
}

/* RESULT */
.result{
    font-size:18px;
    font-weight:600;
}
</style>

</head>

<body>

<header class="view">

    <div class="back-arrow" onclick="goBack()">
        <svg viewBox="0 0 24 24">
            <path d="M15 6l-6 6 6 6" fill="none" stroke="black" stroke-width="2"/>
        </svg>
    </div>

    <h2>📘 Quiz</h2>

</header>

<!-- START SCREEN -->
<div class="box" id="startScreen">
    <h2>Ready for Quiz? 🤔</h2>
    <p>Test your knowledge now</p>
    <button class="start-btn" onclick="startQuiz()">Start Quiz</button>
</div>

<!-- QUIZ BOX -->
<div class="box" id="quizBox" style="display:none;">
    <h3 id="count"></h3>
    <h2 id="question"></h2>
    <div id="options"></div>
    <p id="timer"></p>
</div>

<script>

let quizData = <?php echo json_encode($data); ?>;
let index = 0;
let score = 0;
let time = 60;
let timer;

function startQuiz(){
    document.getElementById("startScreen").style.display="none";
    document.getElementById("quizBox").style.display="block";
    loadQuestion();
    startTimer();
}

function loadQuestion(){
    let q = quizData[index];

    document.getElementById("count").innerText =
    `Question ${index+1} / ${quizData.length}`;

    document.getElementById("question").innerText = q.question;

    document.getElementById("options").innerHTML = `
        <button onclick="check('a')">${q.option_a}</button>
        <button onclick="check('b')">${q.option_b}</button>
        <button onclick="check('c')">${q.option_c}</button>
        <button onclick="check('d')">${q.option_d}</button>
    `;
}

function check(ans){
    if(ans === quizData[index].correct_answer){
        score++;
    }

    index++;

    if(index < quizData.length){
        loadQuestion();
    } else {
        endQuiz();
    }
}

function endQuiz(){

    clearInterval(timer);

    let percent = Math.round((score/quizData.length)*100);

    fetch("save_result.php",{
        method:"POST",
        headers:{"Content-Type":"application/json"},
        body:JSON.stringify({
            score:score,
            total:quizData.length,
            percentage:percent,
            surah: <?php echo $surah; ?>
        })
    });

    document.getElementById("quizBox").innerHTML = `
        <h2>🎉 Quiz Completed</h2>
        <p class="result">${score} / ${quizData.length}</p>
        <p>${percent}% Score</p>
    `;
}

function startTimer(){
    timer = setInterval(()=>{
        time--;
        document.getElementById("timer").innerText = "⏱ " + time;

        if(time <= 0){
            clearInterval(timer);
            endQuiz();
        }
    },1000);
}

function goBack(){
    window.history.back();
}

</script>

</body>
</html>