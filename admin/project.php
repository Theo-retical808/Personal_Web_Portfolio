
<?php
    include '../php/FileHandling.php';
    $title = new FileHandling('../content/project_titles.txt');
    $detail = new FileHandling('../content/project_details.txt');
    $image = new FileHandling('../content/image_paths.txt');
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
        <div class="container">
            <h1>Project Editor</h1>

            <?php
                        $i = 0;
                        $lines = file($title->getFilePath());
                        foreach ($lines as $line) {
                        ?>
                <section class="project-template">
                    <form method="post" action="../php/process_manager.php" enctype="multipart/form-data">
                        <h2><input type="text" name="title" value="<?php echo htmlspecialchars($title->getLineFromFile($i)); ?>"></h2>
                        <div class="project">
                            <img src="<?php echo htmlspecialchars($image->getLineFromFile($i)); ?>" alt="Project Image" class="project-image">
                            <textarea id="detail" name="detail" rows="4" cols="50"><?php echo htmlspecialchars($detail->getLineFromFile($i)); ?></textarea>
                            <input type="hidden" name="index" value="<?php echo $i; ?>">
                            <button type="submit" name="edit">Update</button>
                            <button type="submit" name="delete" style='background-color:red;' value="<?php echo $i; ?>">Delete</button>
                        </div>
                    </form>
                </section>
            <?php $i++;} ?>

            <h2>Add New Project</h2>
            <form method="post" action="../php/project_process.php" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br>
                <label for="detail">Details:</label>
                <textarea id="detail" name="detail" rows="4" cols="50" required></textarea><br>
                <label for="image">Image:</label>
                <input type="file" name="images[]" id="images" accept="image/*" required><br>
                <button type="submit" name="add">Add Project</button>
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
