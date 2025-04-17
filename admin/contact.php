
<?php
    include '../php/FileHandling.php';
    $content = new FileHandling('../content/contact.txt');
?>
<a id="none" href="../index.php"><button class="exit" ><i class="fa fa-sign-out"></i></button></a>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src='Script.js'></script>
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
            <a id="projects" href="project.php"> PROJECTS<i class="fa fa-fw fa-desktop"></i></a>
            <a id="contact" href="contact.php" style="background-color: #6BA3BE;"> CONTACTS<i class="fa fa-fw fa-user"></i></a>
        </div>
    </header>
    <main>
        </br>
            <div class="contact-section">
                <form action="contact.php" method="post">
                    <h1>Contact Info Edit</h1>
                
                    <label for="phone">Contact No.: <span style="color: red;">*</span></label>
                    <input name="phone" value="<?php echo $content->displayLineByIndex(0)  ?>" required></input>

                    <label for="email">Email: <span style="color: red;">*</span></label>
                    <input type="email" name="email" value="<?php echo $content->displayLineByIndex(1)  ?>" required></input></input>

                    <label for="address">Location: <span style="color: red;">*</span></label>
                    <textarea name="address" rows="5" required><?php echo $content->displayLineByIndex(2)  ?></textarea>

                    <button type="submit" name="submit">Save Changes</button>
                </form>
            </div>
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
    $newphone = $_POST["phone"];
    $newemail = $_POST["email"];
    $newaddress = $_POST["address"];

    $newdata = array($newphone, $newemail, $newaddress);

    for($i = 0; $i<3; $i++) {
        $content->editLineByIndex($i, $newdata[$i]);
    }
  
    header("Location: contact.php");
    exit;
}

?>