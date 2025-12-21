import "./bootstrap";
import "flowbite";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.copyLink = function () {
    navigator.clipboard.writeText("https://pofin.my.id");

    const toast = document.getElementById("toast-copy");
    toast.classList.remove("hidden");
    toast.classList.add("flex");

    setTimeout(() => {
        toast.classList.add("hidden");
        toast.classList.remove("flex");
    }, 2000);
};

// Script Hilang Muncul
const navbar = document.getElementById("navbar");
const navbarContent = document.getElementById("navbarContent");

window.addEventListener("scroll", function () {
    if (window.scrollY === 0) {
        // Posisi paling atas → padding besar
        navbarContent.classList.remove("p-6");
        navbarContent.classList.add("p-8");
    } else {
        // Posisi scroll → padding lebih kecil
        navbarContent.classList.remove("p-8");
        navbarContent.classList.add("p-6");
    }
});

let lastScrollTop = 0;
const scrollThreshold = 600;

window.addEventListener("scroll", function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollTop > 0) {
        navbar.classList.add("shadow-md");
    } else {
        navbar.classList.remove("shadow-md");
    }

    if (scrollTop > scrollThreshold) {
        if (scrollTop > lastScrollTop) {
            // Scroll Down
            navbar.style.top = "-160px";
            navbar.style.transition = "top 0.4s ease";
        } else {
            // Scroll Up
            navbar.style.top = "0";
            navbar.style.transition = "top 0.4s ease";
        }
    } else {
        // Dalam threshold, navbar tetap visible
        navbar.style.top = "0";
    }

    lastScrollTop = scrollTop;
});

// Time
function updateClock() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, "0");
    const m = String(now.getMinutes()).padStart(2, "0");
    const s = String(now.getSeconds()).padStart(2, "0");

    document.getElementById("clock").textContent = `${h}:${m}:${s}`;
}

// Update setiap 1 detik
setInterval(updateClock, 1000);
updateClock(); // Load pertama
