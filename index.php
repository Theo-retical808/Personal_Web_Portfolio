<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <header>
        <h1>Denmarc's Portfolio</h1>
        <div class="social_links">
            <a href="https://www.facebook.com/denmarcfrancisharry.angeles.16"><i class="fa fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/theo_12904/?next=%2F"><i class="fa fa-instagram"></i></a>
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=denmarcfrancisharryangeles@gmail.com&su=SUBJECT&body=BODY&bcc=francisharryangeles@gmail.com"><i class="fa fa-fw fa-envelope"></i></a>
        </div>
    </header>
    <main class="login-container">
        <h2>Login as Admin</h2>
        <form action="php/login_process.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <hr>
        <a href="guest/home.php" class="guest-btn">View as Guest</a>
    </main>
    <footer>
        <p>©2024 Denmarc Francis Harry P. Angeles - All Rights Reserved.</p>
    </footer>
</body>
</html>
