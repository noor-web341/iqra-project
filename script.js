    
 const menuBtn = document.querySelector(".nav-icon:last-child"); // ☰
const sideMenu = document.getElementById("sideMenu");
const overlay = document.getElementById("menuOverlay");
const closeMenu = document.getElementById("closeMenu");

menuBtn.addEventListener("click", () => {
    sideMenu.classList.add("active");
    overlay.classList.add("active");
});

closeMenu.addEventListener("click", closeSideMenu);
overlay.addEventListener("click", closeSideMenu);

function closeSideMenu() {
    sideMenu.classList.remove("active");
    overlay.classList.remove("active");
}
   
    window.addEventListener("scroll", () => {
    document.querySelector(".qc-navbar")
        .classList.toggle("scrolled", window.scrollY > 10);
});

    
    


/* 🎥 Framer-style entrance */
window.addEventListener("load", () => {
  navbar.classList.add("show");
});
// DARK MODE TOGGLE
const toggle = document.getElementById("darkToggle");

toggle.addEventListener("click", () => {
    document.body.classList.toggle("dark");

    toggle.textContent =
        document.body.classList.contains("dark") ? "☀️" : "🌙";
});

/* 🍔 Hamburger toggle */
function toggleMenu(){
  hamburger.classList.toggle("active");
  navLinks.classList.toggle("active");
  overlay.classList.toggle("active");
}

hamburger.addEventListener("click", toggleMenu);
overlay.addEventListener("click", toggleMenu);

/* 📱 auto close on click */
navLinks.querySelectorAll("a").forEach(link=>{
  link.addEventListener("click", ()=>{
    hamburger.classList.remove("active");
    navLinks.classList.remove("active");
    overlay.classList.remove("active");
  });
});

/* ⚡ hide / show navbar on scroll */
let lastScroll = 0;
window.addEventListener("scroll", ()=>{
  const current = window.scrollY;
  if(current > lastScroll && current > 80){
    navbar.classList.add("hide");
  }else{
    navbar.classList.remove("hide");
  }
  lastScroll = current;
});

   
   
   
   
   
   
   
   
   
   /* SCROLL PROGRESS BAR */
window.addEventListener('scroll', () => {
    const scrollTop = window.scrollY;
    const docHeight = document.body.scrollHeight - window.innerHeight;
    const progress = (scrollTop / docHeight) * 100;
    document.getElementById('progress-bar').style.width = progress + '%';
});

/* ACTIVE NAV LINK */


/* STAGGERED CARD ANIMATION */
const cards = document.querySelectorAll('.feature-card');

const observer = new IntersectionObserver(entries => {
    entries.forEach((entry, index) => {
        if(entry.isIntersecting){
            setTimeout(() => {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }, index * 150);
        }
    });
}, { threshold:0.2 });

cards.forEach(card => observer.observe(card));

/* RIPPLE EFFECT */
document.querySelectorAll('.ripple').forEach(btn => {
    btn.addEventListener('click', e => {
        const circle = document.createElement('span');
        const size = Math.max(btn.clientWidth, btn.clientHeight);
        circle.style.width = circle.style.height = size + 'px';
        circle.style.left = e.offsetX - size / 2 + 'px';
        circle.style.top = e.offsetY - size / 2 + 'px';
        circle.classList.add('ripple-effect');
        btn.appendChild(circle);

        setTimeout(() => circle.remove(), 600);
    });
});






const slider = document.querySelector(".scroll-wrapper");
let isDown = false;
let startX;
let scrollLeft;

slider.addEventListener("mousedown", (e) => {
    isDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
});

slider.addEventListener("mouseleave", () => isDown = false);
slider.addEventListener("mouseup", () => isDown = false);

slider.addEventListener("mousemove", (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;
});






function showWeekNumber() {
    const today = new Date();
    const firstDay = new Date(today.getFullYear(), 0, 1);
    const daysPassed = Math.floor((today - firstDay) / (24 * 60 * 60 * 1000));
    const weekNumber = Math.ceil((daysPassed + firstDay.getDay() + 1) / 7);

    document.getElementById("weekNumber").innerText =
        `Week ${weekNumber}`;
}

/* INIT */
showWeekNumber();

