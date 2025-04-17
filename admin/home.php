<?php
    include '../php/FileHandling.php';
    $content = new FileHandling('../content/home.txt');
?>
<a id="none" href="../index.php"><button class="exit" ><i class="fa fa-sign-out"></i></button></a>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        input, textarea, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form {
            margin-left:30%;
            margin-right:30%;
            text-align: center;
        display: flex;
        flex-direction: column;
        gap: 15px;
}

form button {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

form button:hover {
    background-color: #45a049;
}

    </style>
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
            <a id="home" href="home.php" style="background-color: #6BA3BE;">HOME<i class="fa fa-fw fa-home"></i> </a>
            <a id="about" href="about.php"> ABOUT ME<i class="fa fa-info-circle"></i></a>
            <a id="skill" href="skill.php"> SKILL<i class="fa fa-fw fa-file"></i></a>
            <a id="projects" href="project.php"> PROJECTS<i class="fa fa-fw fa-desktop"></i></a>
            <a id="contact" href="contact.php"> CONTACTS<i class="fa fa-fw fa-user"></i></a>
        </div>
    </header>
    <main>
    <div class="head_title">
    </br>
    </br>
    <form action="home.php" method="post">
        <h2>Home Content Edit</h2>
        <label for="intro">Quick Introduction: <span style="color: red;">*</span></label>
        <textarea name="intro" rows="2" required><?php echo $content->displayLineByIndex(0)  ?></textarea>

            <label for="greet">Greeting: <span style="color: red;">*</span></label>
            <textarea name="greet" rows="2" required><?php echo $content->displayLineByIndex(1)  ?></textarea>

            <label for="exp">Quick Explanation: <span style="color: red;">*</span></label>
            <textarea name="exp" rows="5" required><?php echo $content->displayLineByIndex(2)  ?></textarea>

            <label for="qt">Quote: <span style="color: red;">*</span></label>
            <textarea name="qt" rows="5" required><?php echo $content->displayLineByIndex(3)  ?></textarea>

            <button type="submit" name="submit">Save Changes</button>
        </div>
    </form>    
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newintro = $_POST["intro"];
    $newgreet = $_POST["greet"];
    $newexp = $_POST["exp"];
    $newquote = $_POST["qt"];

    $newdata = array($newintro, $newgreet, $newexp, $newquote);

    for($i = 0; $i<4; $i++) {
        $content->editLineByIndex($i, $newdata[$i]);
    }
  
    header("Location: home.php");
    exit;
}

?>
