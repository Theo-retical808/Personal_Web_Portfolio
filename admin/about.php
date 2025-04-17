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
    <style>
        input, textarea, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form {
            margin-left:20%;
            margin-right:20%;
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
            <a id="home" href="home.php">HOME<i class="fa fa-fw fa-home"></i> </a>
            <a id="about" href="about.php" style="background-color: #6BA3BE;"> ABOUT ME<i class="fa fa-info-circle"></i></a>
            <a id="skill" href="skill.php"> SKILL<i class="fa fa-fw fa-file"></i></a>
            <a id="projects" href="project.php"> PROJECTS<i class="fa fa-fw fa-desktop"></i></a>
            <a id="contact" href="contact.php"> CONTACTS<i class="fa fa-fw fa-user"></i></a>
        </div>
    </header>
    <main>
        <div class="container">
        <form action="about.php" method="post">
            <h1>About Me Edit</h1>

                <label for="greeting">Greeting: <span style="color: red;">*</span></label>
                <textarea name="greeting" rows="5" required><?php echo $content->displayLineByIndex(0)  ?></textarea>

            <label for="who">Who Are You?: <span style="color: red;">*</span></label>
                <textarea name="who" rows="5" required><?php echo $content->displayLineByIndex(1)  ?></textarea>

                <label for="do">What Do You Do?:<span style="color: red;">*</span></label>
                <ul>
                    <li><textarea name="do" rows="5" required><?php echo $content->displayLineByIndex(2)  ?></textarea></li>
                    <li><textarea name="do1" rows="5" required><?php echo $content->displayLineByIndex(3)  ?></textarea></li>
                    <li><textarea name="do2" rows="5" required><?php echo $content->displayLineByIndex(4)  ?></textarea></li>
                    <li><textarea name="do3" rows="5" required><?php echo $content->displayLineByIndex(5)  ?></textarea></li>
                </ul>

            <label for="mission">What is Your Mission?:<span style="color: red;">*</span></label>
                
                <textarea name="mission" rows="5" required><?php echo $content->displayLineByIndex(6)  ?></textarea>
                
            <label for="more">More About You:<span style="color: red;">*</span></label>
                    <ul>
                        <li><textarea name="more" rows="5" required><?php echo $content->displayLineByIndex(7)  ?></textarea></li>
                        <li><textarea name="more1" rows="5" required><?php echo $content->displayLineByIndex(8)  ?></textarea></li>
                        <li><textarea name="more2" rows="5" required><?php echo $content->displayLineByIndex(9)  ?></textarea></li>
                    </ul>
        <button type="submit" name="submit">Save Changes</button>
</form>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newgreet = $_POST["greeting"];
    $newwho = $_POST["who"];
    $newdo = $_POST["do"];
    $newdo1 = $_POST["do1"];
    $newdo2 = $_POST["do2"];
    $newdo3 = $_POST["do3"];
    $newmission = $_POST["mission"];
    $newmore = $_POST["more"];
    $newmore1 = $_POST["more1"];
    $newmore2 = $_POST["more2"];

    $newdata = array($newgreet, $newwho, $newdo, $newdo1, $newdo2, $newdo3, $newmission, $newmore, $newmore1, $newmore2);

    for($i = 0; $i<10; $i++) {
        $content->editLineByIndex($i, $newdata[$i]);
    }
  
    header("Location: contact.php");
    exit;
}
?>