<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('Location: ../sign_in.php');
    exit();
}
$username = $_SESSION['username'];
require_once '../config/connect_db.php';
$conn = db_connect();
$stmt = $conn->prepare("SELECT email FROM users WHERE id=? LIMIT 1");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($email);
$stmt->fetch();
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MANGA WORLD - USER</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="user-bg">
    <header class="header">
        <nav class="navbar">
            <div class="navbar-top">
                <span class="manga-text">MANGA</span>
                <div class="header-icons">
                    <div class="user-greeting">
                        Hi, <span class="user-email"><?php echo $email; ?></span>
                         <form action="../sign_out.php" method="post" style="margin:0;">
                            <button type="submit" class="signout-btn" title="Sign Out">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="navbar-bottom">
                <ul class="nav-menu">
                    <li><a href="user.php" class="nav-link">Home</a></li>
                    <li><a href="#" class="nav-link">About</a></li>
                    <li class="dropdown">
                        <button class="dropdown-btn nav-link" aria-haspopup="true" aria-expanded="false">Category<i class="fa fa-caret-down" style="margin-left:10px;"></i></button>
                        <div class="dropdown-content" role="menu">
                            <a href="dragon_ball.php">Dragon Ball</a>
                            <a href="naruto.php">Naruto</a>
                            <a href="one_piece.php">One Piece</a>
                            <a href="doraemon.php">Doraemon</a>
                            <a href="conan.php">Conan</a>
                            <a href="sailor_moon.php">Sailor Moon</a>
                        </div>
                    </li>
                    <li><a href="../blog.php" class="nav-link">Blog</a></li>
                    <li><a href="upload_and_view.php" class="nav-link">Upload</a></li>
                    <li><a href="#" class="nav-link">Contacts</a></li>
                </ul>
                <div class="header-icons">
                    <button class="search-icon" title="Search" onclick="window.location.href='search.php'"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </nav>
    </header>
    <section class="manga">
        <div class="manga-content">
            <h1 class="manga-title">Xin chào, <?php echo $username; ?></h1>
        </div>
    </section>
    <script src="../assets/js/main.js"></script>
</body>
</html>