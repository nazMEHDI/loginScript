<?php
session_start();
if(isset($_SESSION['username'])) {
    
} else {
    $error = "You are not Connected";
    header("location: index.php?error=$error");
}
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="assets/css/styles.css">

        <title>Responsive menu ui - Bedimcode</title>
    </head>
    <body>
        <!--=============== NAV ===============-->
        <nav class="nav" id="nav">
            <div class="nav__menu container" id="nav-menu">
                <div class="nav__shape"></div>

                <div class="nav__close" id="nav-close">
                    <i class='bx bx-x'></i>
                </div>
                
                <div class="nav__data">
                    <div class="nav__mask">
                        <!-- Change your profile picture -->
                        <img src="assets/img/perfil.png" alt="" class="nav__img">
                    </div>

                    <span class="nav__greeting">Hi, I'm</span>
                    <h1 class="nav__name">Mehdi <br> Lechhab</h1>
                </div>

                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">
                            <i class='bx bx-home' ></i> Home 
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#about" class="nav__link">
                            <i class='bx bx-user'></i> About
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#portfolio" class="nav__link">
                            <i class='bx bx-briefcase-alt-2'></i> Portfolio
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#skills" class="nav__link">
                            <i class='bx bx-bookmark'></i> Skills
                        </a>
                    </li>
                    <li class="nav__item">
                        <a href="#contact" class="nav__link">
                            <i class='bx bx-message-square-detail'></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--=============== MAIN ===============-->
        <main class="main" id="main">
            <!--=============== HEADER ===============-->
            <header class="header" id="header">
                <nav class="header__nav container">
                    <a href="#" class="header__logo">
                        Lechhab
                    </a>
    
                    <!-- Toggle button -->
                    <div class="header__toggle" id="header-toggle">
                        <i class='bx bx-grid-alt'></i>
                        
                    </div>
                </nav>
            </header>


            <!-- When inserting your content into sections, remove the section__height class -->
            <!--=============== HOME ===============-->
            <section class="section section__height container" id="home">
                <h1>HOME</h1>
                
            </section>

            <!--=============== ABOUT ===============-->
            <section class="section section__height container" id="about">
                <h1>ABOUT</h1>
                
            </section>

            <!--=============== PORTFOLIO ===============-->
            <section class="section section__height container" id="portfolio">
                <h1>PORTFOLIO</h1>
                
            </section>

            <!--=============== SKILLS ===============-->
            <section class="section section__height container" id="skills">
                <h1>SKILLS</h1>
                
            </section>

            <!--=============== CONTACT ===============-->
            <section class="section section__height container" id="contact">
                <h1>CONTACT</h1>

            </section>
        </main>

        <!--=============== MAIN JS ===============-->
        <script src="assets/js/main1.js"></script>
    </body>
</html>