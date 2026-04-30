<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Prayer Times</title>

<style>
body{
    font-family:'Segoe UI', sans-serif;
    margin:0;
    background:#f5f7fb;
    color:#111827;
}

/* HEADER */
.view{
    background:white;
    padding:15px;
    display:flex;
    align-items:center;
    justify-content:center;
    position:relative;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
}

/* TITLE */
.view h2{
    margin:0;
    font-size:20px;
    font-weight:700;
    color:#111827;
}

/* BACK BUTTON */
.back-arrow{
    position:absolute;
    left:15px;
    width:40px;
    height:40px;
    border-radius:50%;
    background:#f3f4f6;
    display:flex;
    align-items:center;
    justify-content:center;
    cursor:pointer;
    transition:0.2s;
}

.back-arrow:hover{
    background:#e5e7eb;
    transform:scale(1.05);
}

/* BUTTON */
.btn{
    position:absolute;
    right:15px;
    background:#10b981;
    color:white;
    padding:8px 12px;
    border:none;
    border-radius:10px;
    cursor:pointer;
    font-size:13px;
    transition:0.2s;
}

.btn:hover{
    background:#059669;
    transform:scale(1.05);
}

/* INFO */
.info{
    margin:20px;
    padding:15px;
    border-radius:15px;
    background:#e0f2fe;
    color:#0f172a;
}

/* CARD */
.card{
    margin:20px;
    padding:20px;
    border-radius:18px;
    background:white;
    box-shadow:0 6px 18px rgba(0,0,0,0.06);
}

/* CITY */
#city{
    margin:0;
    font-size:18px;
    font-weight:600;
}

/* COUNTDOWN */
#countdown{
    text-align:center;
    font-weight:600;
    margin-top:10px;
    color:#2563eb;
}

/* TIME ROW */
.time{
    display:flex;
    justify-content:space-between;
    padding:12px;
    margin-top:8px;
    border-radius:12px;
    background:#f9fafb;
    border:1px solid #e5e7eb;
    transition:0.2s;
}

/* ACTIVE PRAYER */
.active{
    background:#dcfce7;
    border-left:5px solid #22c55e;
}

/* TOAST */
#toast{
    position:fixed;
    top:20px;
    left:50%;
    transform:translateX(-50%);
    background:#111827;
    color:white;
    padding:12px 18px;
    border-radius:10px;
    opacity:0;
    transition:0.3s;
}

#toast.show{
    opacity:1;
}
</style>

</head>

<body>

<audio id="azanAudio">
    <source src="https://cdn.islamic.network/audio/adhan/adhan.mp3">
</audio>

<div id="toast"></div>


<header class="view">

    <div class="back-arrow" onclick="goBack()">
        <svg viewBox="0 0 24 24" width="24" height="24">
            <path d="M15 6l-6 6 6 6" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

      <h2>🕌 Prayer Times</h2>
    <button class="btn" onclick="getLocation()">📍 Use Current Location</button>
</header>
<!-- INFO -->
<div class="info">
    <b>How it works:</b>
    <ul>
        <li>Click "Use Current Location"</li>
        <li>Allow location access</li>
        <li>Prayer times will appear automatically</li>
    </ul>
</div>

<div class="card">
    <h3 id="city">Location: Not detected</h3>
    <p id="countdown">Next Prayer: --</p>

    <div class="time" id="fajrRow"><span>Fajr</span><span id="fajr">--</span></div>
    <div class="time" id="sunriseRow"><span>Sunrise</span><span id="sunrise">--</span></div>
    <div class="time" id="dhuhrRow"><span>Dhuhr</span><span id="dhuhr">--</span></div>
    <div class="time" id="asrRow"><span>Asr</span><span id="asr">--</span></div>
    <div class="time" id="maghribRow"><span>Maghrib</span><span id="maghrib">--</span></div>
    <div class="time" id="ishaRow"><span>Isha</span><span id="isha">--</span></div>
</div>

<script>


// GLOBAL
let prayerTimes = null;
let lastPlayed = "";

// 🔔 TOAST
function showToast(msg,type="success"){
    let t=document.getElementById("toast");
    t.innerText=msg;
    t.style.background = type==="error" ? "#ef4444" : "#10b981";
    t.classList.add("show");
    setTimeout(()=>t.classList.remove("show"),2500);
}

// 📍 LOCATION
function getLocation(){

    let btn=document.querySelector(".btn");

    btn.classList.add("loading");
    btn.innerText="⏳ Detecting...";

    // showToast("Detecting location...");

    navigator.geolocation.getCurrentPosition(pos=>{

        let lat=pos.coords.latitude;
        let lon=pos.coords.longitude;

        fetch(`prayer_get.php?lat=${lat}&lon=${lon}`)
        .then(res=>res.json())
        .then(data=>{

            prayerTimes = data;

            document.getElementById("city").innerText="📍 "+data.city;

            document.getElementById("fajr").innerText=data.Fajr;
            document.getElementById("sunrise").innerText = data.Sunrise;
            document.getElementById("dhuhr").innerText=data.Dhuhr;
            document.getElementById("asr").innerText=data.Asr;
            document.getElementById("maghrib").innerText=data.Maghrib;
            document.getElementById("isha").innerText=data.Isha;

            updatePrayerUI(); // FIRST CALL

            // showToast("✅ Location detected!");

            btn.classList.remove("loading");
            btn.innerText="📍 Use Current Location";

            startAutoUpdate(); // 🔥 AUTO START

        });

    },()=>{
        showToast("❌ Location denied","error");
        btn.classList.remove("loading");
        btn.innerText="📍 Use Current Location";
    });
}

// 🕌 UPDATE UI
function updatePrayerUI(){

    if(!prayerTimes) return;

    let now=new Date();
    let current=now.getHours()*60+now.getMinutes();

    let prayers=[
        {name:"fajr",time:prayerTimes.Fajr},
        {name:"sunrise",time:prayerTimes.Sunrise},
        {name:"dhuhr",time:prayerTimes.Dhuhr},
        {name:"asr",time:prayerTimes.Asr},
        {name:"maghrib",time:prayerTimes.Maghrib},
        {name:"isha",time:prayerTimes.Isha}
    ];

    let currentPrayer=null;
    let nextPrayer=null;

    for(let i=0;i<prayers.length;i++){

        let [h,m]=prayers[i].time.split(":");
        let mins=parseInt(h)*60+parseInt(m);

        let nextTime;

        if(i<prayers.length-1){
            let [nh,nm]=prayers[i+1].time.split(":");
            nextTime=parseInt(nh)*60+parseInt(nm);
        }else{
            nextTime=1440;
        }

        if(current>=mins && current<nextTime){
            currentPrayer=prayers[i];
            nextPrayer=prayers[i+1] || prayers[0];
            break;
        }
    }

    if(!currentPrayer){
        currentPrayer=prayers[prayers.length-1];
        nextPrayer=prayers[0];
    }

    // REMOVE OLD
    document.querySelectorAll(".time").forEach(e=>e.classList.remove("active"));

    // CURRENT HIGHLIGHT
    document.getElementById(currentPrayer.name+"Row").classList.add("active");

    // COUNTDOWN
    let [h,m]=nextPrayer.time.split(":");
    let target=parseInt(h)*60+parseInt(m);

    let diff=target-current;
    if(diff<0) diff+=1440;

    let hr=Math.floor(diff/60);
    let min=diff%60;

    document.getElementById("countdown").innerText =
        `Next Prayer: ${nextPrayer.name.toUpperCase()} in ${hr}h ${min}m`;

    // 🔊 AZAN PLAY (exact time match)
    let currentTimeStr = now.getHours().toString().padStart(2,'0') + ":" + now.getMinutes().toString().padStart(2,'0');

    if(currentTimeStr === currentPrayer.time && lastPlayed !== currentPrayer.name){
        document.getElementById("azanAudio").play();
        showToast("🕌 " + currentPrayer.name.toUpperCase() + " time!");
        lastPlayed = currentPrayer.name;
    }
}

// 🔄 AUTO UPDATE EVERY 30 SEC
function startAutoUpdate(){
    setInterval(()=>{
        updatePrayerUI();
    },30000);
}
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