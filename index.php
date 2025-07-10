<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MANGA WORLD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <header class="header">
        <nav class="navbar">
            <div class="navbar-top">
                <span class="manga-text">MANGA</span>
                <div class="user-icon" title="User"><i class="fa fa-user"></i></div>
            </div>
            <div class="navbar-bottom">
                <ul class="nav-menu">
                    <li><a href="#" class="nav-link">Home</a></li>
                    <li><a href="#" class="nav-link">About</a></li>
                    <li class="dropdown">
                        <button class="dropdown-btn nav-link" aria-haspopup="true" aria-expanded="false">Category<i class="fa fa-caret-down" style="margin-left:10px;"></i></button>
                        <div class="dropdown-content" role="menu">
                            <a href="sign_in.php">Dragon Ball</a>
                            <a href="sign_in.php">Naruto</a>
                            <a href="sign_in.php">One Piece</a>
                            <a href="sign_in.php">Doraemon</a>
                            <a href="sign_in.php">Conan</a>
                            <a href="sign_in.php">Sailor Moon</a>
                        </div>
                    </li>
                    <li><a href="blog.php" class="nav-link">Blog</a></li>
                    <li><a href="sign_in.php" class="nav-link">Upload</a></li>
                    <li><a href="#" class="nav-link">Contacts</a></li>
                </ul>
                <button class="search-icon" title="Search" onclick="window.location.href='sign_in.php'"><i class="fa fa-search"></i></button>
            </div>
        </nav>
    </header>
    <section class="manga">
        <div class="manga-content">
            <h1 class="manga-title">MANGA <span>WORLD</span></h1>
            <div class="manga-subtitle">WELCOME NEW PEOPLE</div>
        </div>
    </section>
    <script src="assets/js/main.js"></script>
</body>
</html>