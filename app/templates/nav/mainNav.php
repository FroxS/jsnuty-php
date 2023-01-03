<?php 
    use jsnuty\app\library\Application;
?>
<header class="nav">
    <a href="/jsnuty/"><img src="img/logo-white.png" class="logo"></a>
    <div class="toggle" onclick="toggleMenu()"></div>
    <nav>
        <ul class="navigation">
            <li><a href="/jsnuty/">Główna</a></li>
            <li><a href="/jsnuty/contact">Kontakt</a></li>
            <?php if(Application::isGuest()): ?>
                <li><a href="/jsnuty/login">Login</a></li>
                <li><a href="/jsnuty/register">Rejestracja</a></li>
            <?php else: ?>
                <li><a href="/jsnuty/music">Muzyka</a></li>
                <li><a href="/jsnuty/profile">Profil</a></li>
                <li><a href="/jsnuty/logout">Wyloguj się</a></li>
            <?php endif;?>
        </ul>
    </nav>
</header>