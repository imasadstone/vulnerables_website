<?php
    session_start();
    $is_logged_in = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manga Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400|Dancing+Script:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/blog.css">
</head>
<body>
    <button class="back-btn" onclick="window.location.href='<?php echo $is_logged_in ? 'user/user.php' : 'index.php'; ?>'">
        <i class="fas fa-arrow-left"></i>Back
    </button>
    <header>
        <div class="logo">Blog<span>Manga World</span></div>
    </header>
    <div class="blog-list">
        <div class="blog-card" onclick="window.location.href='user/dragon_ball.php'">
            <img class="blog-image" src="assets/images/dragon_ball_bg.jpg" alt="Manga Image 1">
            <div class="blog-card-content">
                <div class="blog-category">Dragon Ball</div>
            </div>
        </div>
        <div class="blog-card" onclick="window.location.href='user/naruto.php'">
            <img class="blog-image" src="assets/images/naruto_bg.jpg" alt="Manga Image 2">
            <div class="blog-card-content">
                <div class="blog-category">Naruto</div>
            </div>
        </div>
        <div class="blog-card" onclick="window.location.href='user/one_piece.php'">
            <img class="blog-image" src="assets/images/one_piece_bg.jpg" alt="Manga Image 3">
            <div class="blog-card-content">
                <div class="blog-category">One Piece</div>
            </div>
        </div>
    </div>
    <div class="blog-list">
        <div class="blog-card" onclick="window.location.href='user/doraemon.php'">
            <img class="blog-image" src="assets/images/doraemon_bg.jpg" alt="Manga Image 4">
            <div class="blog-card-content">
                <div class="blog-category">Doraemon</div>
            </div>
        </div>
        <div class="blog-card" onclick="window.location.href='user/conan.php'">
            <img class="blog-image" src="assets/images/conan_bg.jpg" alt="Manga Image 5">
            <div class="blog-card-content">
                <div class="blog-category">Conan</div>
            </div>
        </div>
        <div class="blog-card" onclick="window.location.href='user/sailor_moon.php'">
            <img class="blog-image" src="assets/images/sailor_moon_bg.jpg" alt="Manga Image 6">
            <div class="blog-card-content">
                <div class="blog-category">Sailor Moon</div>
            </div>
        </div>
    </div>
</body>
</html>