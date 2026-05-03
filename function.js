// const quizData = [

// {
//     q: "Which Surah is called Umm-ul-Quran?",

//     options: ["Al-Baqarah", "Al-Fatihah", "Yaseen", "Ikhlas"],
//     correct: 1
// },
// {
//     q: "How many daily prayers are obligatory?",
//    // a: "خَمْسُ صَلَوَات",
//     options: ["3", "4", "5", "6"],
//     correct: 2
// },
// {
//     q: "Which month is fasting obligatory?",
//     //a: "شَهْرُ رَمَضَانَ",
//     options: ["Shaban", "Ramadan", "Muharram", "Dhul Hijjah"],
//     correct: 1
// },
// {
//     q: "Who is the last Prophet of Islam?",
//     a: "مُحَمَّد ﷺ",
//     options: ["Isa (AS)", "Musa (AS)", "Muhammad ﷺ", "Ibrahim (AS)"],
//     correct: 2
// },
// {
//     q: "Holy book of Islam?",
//     a: "ٱلْقُرْآنُ",
//     options: ["Bible", "Torah", "Quran", "Zabur"],
//     correct: 2
// },
// {
//     q: "Where is the Kaaba located?",
//     a: "مَكَّةُ",
//     options: ["Madinah", "Makkah", "Jerusalem", "Taif"],
//     correct: 1
// },
// {
//     q: "Which angel brought revelation?",
//     a: "جِبْرِيلُ",
//     options: ["Mikaeel", "Israfeel", "Jibreel", "Malik"],
//     correct: 2
// },
// {
//     q: "How many pillars of Islam?",
//     a: "أَرْكَانُ الْإِسْلَامِ خَمْسَةٌ",
//     options: ["3", "4", "5", "6"],
//     correct: 2
// },
// {
//     q: "Which Surah is the longest?",
//     a: "سُورَةُ الْبَقَرَةِ",
//     options: ["Yaseen", "Ikhlas", "Baqarah", "Rahman"],
//     correct: 2
// },
// {
//     q: "How many Surahs are in the Quran?",
//     a: "مِائَةٌ وَأَرْبَعَةَ عَشَرَ",
//     options: ["110", "112", "114", "120"],
//     correct: 2
// },
// {
//     q: "What is the direction of prayer called?",
//     a: "قِبْلَة",
//     options: ["Mihrab", "Qibla", "Minbar", "Haram"],
//     correct: 1
// },
// {
//     q: "How many Rakats in Fajr?",
//     a: "رَكْعَتَانِ",
//     options: ["2", "3", "4", "5"],
//     correct: 0
// },
// {
//     q: "Which Prophet built the Kaaba?",
//     a: "إِبْرَاهِيمُ عَلَيْهِ السَّلَامُ",
//     options: ["Isa (AS)", "Musa (AS)", "Ibrahim (AS)", "Nuh (AS)"],
//     correct: 2
// },
// {
//     q: "What is Zakat?",
//     a: "الزَّكَاةُ",
//     options: ["Prayer", "Charity", "Fasting", "Pilgrimage"],
//     correct: 1
// },
// {
//     q: "Night of Power is called?",
//     a: "لَيْلَةُ الْقَدْرِ",
//     options: ["Laylatul Qadr", "Ashura", "Miraj", "Baraat"],
//     correct: 0
// },
// {
//     q: "First Caliph of Islam?",
//     a: "أَبُو بَكْرٍ الصِّدِّيقُ",
//     options: ["Umar (RA)", "Ali (RA)", "Abu Bakr (RA)", "Usman (RA)"],
//     correct: 2
// },
// {
//     q: "Friday prayer is called?",
//     a: "صَلَاةُ الْجُمُعَةِ",
//     options: ["Asr", "Jumu'ah", "Maghrib", "Isha"],
//     correct: 1
// },
// {
//     q: "How many obligatory Rakats in Zuhr?",
//     a: "أَرْبَعُ رَكَعَاتٍ",
//     options: ["2", "3", "4", "5"],
//     correct: 2
// },
// {
//     q: "Which Surah is Heart of Quran?",
//     a: "يٰسٓ",
//     options: ["Yaseen", "Baqarah", "Rahman", "Kahf"],
//     correct: 0
// },
// {
//     q: "Which Prophet was swallowed by a whale?",
//     a: "يُونُسُ عَلَيْهِ السَّلَامُ",
//     options: ["Yunus (AS)", "Musa (AS)", "Isa (AS)", "Yusuf (AS)"],
//     correct: 0
// },
// {
//     q: "How many days in Ramadan?",
//     a: "تِسْعَةٌ وَعِشْرُونَ أَوْ ثَلَاثُونَ",
//     options: ["28", "29 or 30", "31", "27"],
//     correct: 1
// },
// {
//     q: "Which prayer comes after Maghrib?",
//     a: "صَلَاةُ الْعِشَاءِ",
//     options: ["Isha", "Fajr", "Zuhr", "Asr"],
//     correct: 0
// },
// {
//     q: "What does Islam mean?",
//     a: "السَّلَامُ وَالِاسْتِسْلَامُ",
//     options: ["War", "Peace & Submission", "Power", "Freedom"],
//     correct: 1
// },
// {
//     q: "How many Makki Surahs?",
//     a: "سِتَّةٌ وَثَمَانُونَ",
//     options: ["86", "28", "50", "114"],
//     correct: 0
// },
// {
//     q: "City of Prophet ﷺ?",
//     a: "الْمَدِينَةُ الْمُنَوَّرَةُ",
//     options: ["Makkah", "Taif", "Madinah", "Jerusalem"],
//     correct: 2
// },
// {
//     q: "Which Surah is recited in every prayer?",
//     a: "سُورَةُ الْفَاتِحَةِ",
//     options: ["Ikhlas", "Fatiha", "Nas", "Falaq"],
//     correct: 1
// },
// {
//     q: "What is Hajj?",
//     a: "الْحَجُّ",
//     options: ["Charity", "Pilgrimage", "Prayer", "Fasting"],
//     correct: 1
// },
// {
//     q: "How many pillars of Iman?",
//     a: "أَرْكَانُ الْإِيمَانِ سِتَّةٌ",
//     options: ["5", "6", "7", "8"],
//     correct: 1
// },
// {
//     q: "Which Surah has Bismillah twice?",
//     a: "سُورَةُ النَّمْلِ",
//     options: ["Tauba", "Naml", "Baqarah", "Kahf"],
//     correct: 1
// },
// {
//     q: "First mosque in Islam?",
//     a: "مَسْجِدُ قُبَاءٍ",
//     options: ["Masjid Quba", "Masjid Haram", "Masjid Nabawi", "Aqsa"],
//     correct: 0
// }

// ];

// let index, score, time, answered, timerInterval;

// const startScreen = document.getElementById("startScreen");
// const quizMain = document.getElementById("quizMain");

// const questionEl = document.getElementById("question");
// const arabicEl = document.getElementById("arabic");
// const optionsEl = document.getElementById("options");
// const progressFill = document.getElementById("progressFill");
// const scoreEl = document.getElementById("score");
// const countEl = document.getElementById("questionCount");
// const timerEl = document.getElementById("timer");

// /* START QUIZ */
// function startQuiz() {
//     startScreen.style.display = "none";
//     quizMain.style.display = "block";

//     index = 0;
//     score = 0;
//     time = 120;
//     answered = false;

//     scoreEl.innerText = "Score: 0";
//     progressFill.style.width = "0%";

//     clearInterval(timerInterval);
//     startTimer();
//     loadQuestion();
// }

// /* LOAD QUESTION */
// function loadQuestion() {
//     answered = false;
//     const q = quizData[index];

//     questionEl.innerText = q.q;
//     //arabicEl.innerText = q.a;
//     countEl.innerText = `Question ${index + 1} / ${quizData.length}`;
//     optionsEl.innerHTML = "";

//     q.options.forEach((opt, i) => {
//         const btn = document.createElement("button");
//         btn.innerText = opt;
//         btn.onclick = () => checkAnswer(btn, i);
//         optionsEl.appendChild(btn);
//     });

//     progressFill.style.width = (index / quizData.length) * 100 + "%";
// }

// /* CHECK ANSWER */
// function checkAnswer(btn, i) {
//     if (answered) return;
//     answered = true;

//     const buttons = optionsEl.querySelectorAll("button");
//     buttons.forEach(b => b.disabled = true);

//     if (i === quizData[index].correct) {
//         btn.classList.add("correct");
//         score++;
//     } else {
//         btn.classList.add("wrong");
//         buttons[quizData[index].correct].classList.add("correct");
//     }

//     scoreEl.innerText = `Score: ${score}`;

//     setTimeout(nextQuestion, 800);
// }

/* NEXT */
// function nextQuestion() {
//     index++;
//     if (index < quizData.length) {
//         loadQuestion();
//     } else {
//         endQuiz();
//     }
// }

// /* END QUIZ */
// function endQuiz() {
//     clearInterval(timerInterval);
//     progressFill.style.width = "100%";

//     const percent = Math.round((score / quizData.length) * 100);

//     questionEl.innerText = "🎉 Quiz Completed!";
//     arabicEl.innerText = "";
//     optionsEl.innerHTML = `
//         <div class="result-box">
//             <h3>Score: ${score} / ${quizData.length}</h3>
//             <p>Percentage: ${percent}%</p>
//             <p>${percent >= 60 ? "✅ Excellent!" : "📖 Keep Learning!"}</p>
//             <button class="restart-btn" onclick="restartQuiz()">Restart Quiz</button>
//         </div>
//     `;
// }

// /* RESTART */
// function restartQuiz() {
//     quizMain.style.display = "none";
//     startScreen.style.display = "block";
// }

// /* TIMER */
// function startTimer() {
//     timerEl.innerText = `⏱ ${time}s`;
//     timerInterval = setInterval(() => {
//         time--;
//         timerEl.innerText = `⏱ ${time}s`;
//         if (time <= 0) endQuiz();
//     }, 1000);
// }




/////////////////////   Goals Section /////////////////
 let target = 0;
let progress = 0;
let streak = 0;

function setGoal() {
    target = parseInt(document.getElementById("ayahTarget").value);
    if (target > 0) {
        document.getElementById("goalMsg").innerText =
            `✅ Goal set: ${target} ayahs per day`;
    }
}

function addProgress() {
    if (target === 0) return alert("Set your goal first!");

    progress += 1;
    let percent = Math.min((progress / target) * 100, 100);

    document.getElementById("progressFill").style.width = percent + "%";
    document.getElementById("progressText").innerText =
        `${Math.round(percent)}% Completed`;

    if (percent >= 100) {
        streak++;
        document.getElementById("streak").innerText = `${streak} Days`;
        progress = 0;
    }
}
