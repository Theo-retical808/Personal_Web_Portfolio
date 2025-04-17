<?php
    include '../php/FileHandling.php';
    $title = new FileHandling('../content/project_titles.txt');
    $detail = new FileHandling('../content/project_details.txt'); 
    $images = new FileHandling('../content/image_paths.txt'); 
?>
<a id="none" href="../index.php"><button class="exit" ><i class="fa fa-sign-out"></i></button></a>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/project.css">
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
            <a id="about" href="about.php"> ABOUT ME<i class="fa fa-info-circle"></i></a>
            <a id="skill" href="skill.php"> SKILL<i class="fa fa-fw fa-file"></i></a>
            <a id="projects" href="project.php"  style="background-color: #6BA3BE;"> PROJECTS<i class="fa fa-fw fa-desktop"></i></a> 
            <a id="contact" href="contact.php"> CONTACTS<i class="fa fa-fw fa-user"></i></a>
        </div>
    </header>
    <main>
        </br>
        <h1 style="text-align:center;">My Projects</h1>
        <?php
            $content_amount = 0;
            $lines = file($title->getFilePath());
            foreach ($lines as $line) {
                $content_amount++;
            }
                        
        ?>
        <?php
            for($i = 0; $i < $content_amount; $i++){
        ?>
        <section class="project-template">
            <h2><?php echo $title->displayLineByIndex($i); ?></h2>
            <div class="project">
                <img src="<?php echo $images->displayLineByIndex($i); ?>" alt="Project Image" class="project-image">
                <div class="project-details">
                    <p><?php echo $detail->displayLineByIndex($i); ?></p>
                </div>
            </div>
        </section>
        <?php }?>
    </main>
    <hr>
    <footer>
        <div class="content">
            <h3>Denmarc Angeles | Fullstack Developer</h3>
            <p>©2024 Denmarc Francis Harry P. Angeles - All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
