<?php
    include '../php/FileHandling.php';
    $content = new FileHandling('../content/skill.txt');
?>
<a id="none" href="../index.php"><button class="exit" ><i class="fa fa-sign-out"></i></button></a>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Skills</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/skill.css">
    <script src='Script.js'></script>
    <style>
        input, textarea, button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form {
            margin-left:10%;
            margin-right:10%;
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
            <a id="skill" href="skill.php" style="background-color: #6BA3BE;"> SKILL<i class="fa fa-fw fa-file"></i></a>
            <a id="projects" href="project.php"> PROJECTS<i class="fa fa-fw fa-desktop"></i></a>
            <a id="contact" href="contact.php"> CONTACTS<i class="fa fa-fw fa-user"></i></a>
        </div>
    </header>
    <main>
        <div class="container">
            <h1>Skill Editor</h1>
            <form action="skill.php" method="post">
                    <table border="1">
                        <?php
                        $i = 0;
                        $lines = file($content->getFilePath());
                        foreach ($lines as $line) {
                        ?>
                        <tr>
                            <?php
                            echo "<td>" . trim($line) . "</td>";
                            echo "<td><button type='submit' name='delete[" . $i . "]' value='1' style='background-color:red;'>Delete</button></td>"; //Unique name for each button
                            ?>
                        </tr>
                        <?php
                        $i++;
                         }
                        ?>
                    </table>
                <input type="text" name="newskill">
                <button type="submit" name="submit">Add New Skill</button>
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
        if (isset($_POST['submit'])) {
            $newSkill = trim($_POST['newskill']); //Trim whitespace from new skill input
            if (!empty($newSkill)) { //Check if input is not empty
                $content->addNewContent($newSkill);
                echo "<script>location.href = 'skill.php';</script>";
            } else {
                echo "<p style='color:red;'>Please enter a skill.</p>"; //Display error message if input is empty
            }
        } elseif (isset($_POST['delete'])) {
            foreach ($_POST['delete'] as $index => $value) {
                if ($value == 1) {
                    $content->deleteLineByIndex($index);
                }
            }
            echo "<script>location.href = 'skill.php';</script>";
        }
    }
?>