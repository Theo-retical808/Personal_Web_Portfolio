
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
        .contact-section {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;
}

.contact-info, .social-links, .contact-form {
    margin-bottom: 20px;
}

.contact-info p, .social-links a {
    font-size: 18px;
    margin: 5px 0;
}

.social-links a {
    color: #4CAF50;
    text-decoration: none;
}

.contact-form form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.contact-form input, .contact-form textarea, .contact-form button {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contact-form button {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

.contact-form button:hover {
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
        </br><div class="contact-section">
                <h1>Let's Get in Touch!</h1>
                <p>
                    Thank you for visiting my portfolio! If you have any questions, project inquiries, or collaboration ideas, feel free to reach out. Whether it's a new project, a freelance opportunity, or just to say hello, I'd love to hear from you!
                </p>

                <div class="contact-info">
                    <h2>Contact Information</h2>
                    <p><strong>Phone:</strong> <?php echo $content->displayLineByIndex(0)  ?></p>
                    <p><strong>Email:</strong> <a href="mailto:<?php echo $content->displayLineByIndex(1)  ?>"><?php echo $content->displayLineByIndex(1)  ?></a></p>
                    <p><strong>Location:</strong><?php echo $content->displayLineByIndex(2)  ?></p>
                </div>

                <div class="social-links">
                    <h2>Follow Me</h2>
                    <a href="https://www.facebook.com/denmarcfrancisharry.angeles.16"><i class="fa fa-facebook-square"></i> Facebook</a>
                    <a href="https://www.instagram.com/theo_12904/?next=%2F"><i class="fa fa-instagram"></i> Instagram</a>
                    <a href="www.linkedin.com/in/denmarc-francis-harry-p-angeles-a18b83340"><i class="fa fa-linkedin-square"></i> LinkedIn</a>
                </div>

                <div class="contact-form">
                    <h2>Contact Me</h2>
                    <form action="contact.php" method="POST">
                        <label for="name">Name <span style="color: red;">*</span></label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Email <span style="color: red;">*</span></label>
                        <input type="email" id="email" name="email" required>

                        <label for="message">Message <span style="color: red;">*</span></label>
                        <textarea id="message" name="message" rows="5" required></textarea>

                        <button type="submit" name="submit">Send Message</button>
                    </form>
                </div>
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
    require '../php/MailHandler.php';
    if (isset($_POST["submit"])) {
        $name = htmlspecialchars($_POST["name"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $message = htmlspecialchars($_POST["message"]);

        $mailHandler = new MailHandler();
        $mailHandler->sendContact($name, $email, $message);
    }
?>
