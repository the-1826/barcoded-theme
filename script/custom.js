const hamburger = document.getElementById("hamburger");
const menuMobile = document.getElementById("mobile");
const close = document.getElementById("close");

function toggleMenu() {
    menuMobile.classList.toggle("current");
    document.body.classList.toggle("stop-scrolling");
}

hamburger.addEventListener("click", toggleMenu);
close.addEventListener("click", toggleMenu);