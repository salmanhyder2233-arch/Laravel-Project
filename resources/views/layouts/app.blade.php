<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TWC</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

<nav class="navbar-sticky">
    <div class="navbar-container">

        <a href="{{ url('/') }}" class="navbar-title">
            Together We Care
        </a>

        <div class="nav-actions">

            <ul class="navbar-nav" id="navbarMenu">
                <li><a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="{{ url('/mission') }}" class="nav-link {{ request()->is('mission') ? 'active' : '' }}">Our Mission</a></li>
                <li><a href="{{ url('/impact') }}" class="nav-link {{ request()->is('impact') ? 'active' : '' }}">Our Impact</a></li>
                <li><a href="{{ url('/get-involved') }}" class="nav-link {{ request()->is('get-involved') ? 'active' : '' }}">Get Involved</a></li>
                <li><a href="{{ url('/about') }}" class="nav-link {{ request()->is('about') ? 'active' : '' }}">About Us</a></li>
                <li><a href="{{ url('/contact') }}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>

            <button id="themeToggle" class="paint-btn">
                <i class="fa-solid fa-fill-drip bucket"></i>
            </button>

            <button class="menu-toggle" id="menuToggle" aria-label="Open Navigation">
                ☰
            </button>

        </div>

        <div id="paintOverlay">
            <svg class="wave-edge" viewBox="0 0 1200 80" preserveAspectRatio="none">
                <path d="M0,40 C100,80 200,80 300,40 C400,0 500,0 600,40 C700,80 800,80 900,40 C1000,0 1100,0 1200,40 L1200,0 L0,0 Z"></path>
            </svg>
        </div>

    </div>
</nav>

@yield('content')

<footer class="footer">
    <div class="footer-container">
        <p>&copy; 2026 Together We Care. All rights reserved.</p>
    </div>
</footer>
<script>
const menuToggle = document.getElementById("menuToggle");
const navbarMenu = document.getElementById("navbarMenu");

menuToggle.addEventListener("click", () => {
    navbarMenu.classList.toggle("active");
});
</script>

</body>
</html>