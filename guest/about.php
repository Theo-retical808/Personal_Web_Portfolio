<?php
    include '../php/FileHandling.php';
    $content = new FileHandling('../content/about.txt');
?>
<a id="none" href="../index.php"><button class="exit" ><i class="fa fa-sign-out"></i></button></a>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>About Me</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/about.css">
    <script src='Script.js'></script>
</head>
<body>
    
    

      <header>
        <!--Date & Time-->
        <div class="dat">
            <span><?php echo date("m/d/Y");?></span><span id="time"><?php echo date("h:i a");?></span>
        </div>
        <!--PROFILE-->
        <div class="profile">
            <img src='../img/prof.jpg'>
            <h3>Denmarc Francis Harry P. Angeles</h3> 
        </div>
        <div class="social_links">
            <a href="https://www.facebook.com/denmarcfrancisharry.angeles.16"><i class="fa fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/theo_12904/?next=%2F"><i class="fa fa-instagram"></i></a>
            <a href="mailto:denmarcfrancisharryangeles@gmail.com"><i class="fa fa-fw fa-envelope"></i></a>
        </div>
        <!--NAVIGATION-->
        <div id="mySidenav" class="sidenav">
            <a id="home" href="home.php">HOME<i class="fa fa-fw fa-home"></i> </a>
            <a id="about" href="about.php" style="background-color: #6BA3BE;"> ABOUT ME<i class="fa fa-info-circle"></i></a>
            <a id="skill" href="skill.php"> SKILL<i class="fa fa-fw fa-file"></i></a>
            <a id="projects" href="project.php"> PROJECTS<i class="fa fa-fw fa-desktop"></i></a>
            <a id="contact" href="contact.php"> CONTACTS<i class="fa fa-fw fa-user"></i></a>
        </div>
    </header>
    <main>
        <div class="container">
            <h1>About Me</h1>
            <section>
                <h2>Welcome!</h2>
                <p>
                    <?php echo $content->displayLineByIndex(0)  ?>
                </p>
            </section>
            <section>
                <h2>Who Am I?</h2>
                <p>
                    <?php echo $content->displayLineByIndex(1)  ?>
                </p>
            </section>
            <section>
                <h2>What I Do</h2>
                <ul>
                    <li><?php echo $content->displayLineByIndex(2)  ?></li>
                    <li><?php echo $content->displayLineByIndex(3)  ?></li>
                    <li><?php echo $content->displayLineByIndex(4)  ?></li>
                    <li><?php echo $content->displayLineByIndex(5)  ?></li>
                </ul>
            </section>
            <section>
            <h2>My Mission</h2>
                <p>
                <?php echo $content->displayLineByIndex(6)  ?>
                </p>
            </section>
            <section>
                <h2>A Bit More About Me</h2>
                    <ul>
                        <li><?php echo $content->displayLineByIndex(7)  ?></li>
                        <li><?php echo $content->displayLineByIndex(8)  ?></li>
                        <li><?php echo $content->displayLineByIndex(9)  ?></li>
                    </ul>
            </section>
        </div>
    </main>
    <hr>
    <footer>
        <div class="content">
            <p>Denmarc Angeles | Fullstack Developer</p>
            <p>©2024 Denmarc Francis Harry P. Angeles - All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
