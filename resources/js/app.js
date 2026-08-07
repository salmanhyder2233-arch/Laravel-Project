// js within app.js

import './bootstrap';
import './theme-toggle';
const btn = document.getElementById("themeToggle");
const bucket = document.querySelector(".bucket");
const overlay = document.getElementById("paintOverlay");

const POUR_MS = 700;
const HOLD_MS = 1000;

// Apply saved theme immediately on page load
if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");
}

btn.addEventListener("click", () => {
    if (btn.disabled) return;
    btn.disabled = true;

    bucket.classList.add("pouring");

    const paintColor = document.body.classList.contains("dark-mode")
        ? "#F5EFE6"
        : "#2a2a2a";

    overlay.style.backgroundColor = paintColor;
    const wavePath = overlay.querySelector(".wave-edge path");
    wavePath.style.fill = paintColor;

    // Reset to start position, no transition
    overlay.classList.remove("cover", "reveal");
    overlay.style.transition = "none";
    overlay.style.removeProperty("transform");
    void overlay.offsetWidth; // force reflow

    // Let CSS transition rules take over again
    overlay.style.removeProperty("transition");

    // Phase 1: cover
    overlay.classList.add("cover");

    setTimeout(() => {
        document.body.classList.toggle("dark-mode");
        localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
        bucket.classList.remove("pouring");

        setTimeout(() => {
            // Phase 2: reveal
            overlay.style.removeProperty("transition");
            overlay.classList.remove("cover");
            overlay.classList.add("reveal");

            setTimeout(() => {
                overlay.classList.remove("reveal");
                overlay.style.transition = "none";
                overlay.style.removeProperty("transform");
                btn.disabled = false;
            }, POUR_MS);

        }, HOLD_MS);

    }, POUR_MS);
});

// Show more toggle
document.addEventListener("DOMContentLoaded", function () {

    const toggleButtons = document.querySelectorAll(".message-toggle");

    toggleButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const message = button.previousElementSibling;

            if (!message) {
                return;
            }

            message.classList.toggle("expanded");

            if (message.classList.contains("expanded")) {
                button.textContent = "Show less";
            } else {
                button.textContent = "Show more";
            }

        });

    });

});