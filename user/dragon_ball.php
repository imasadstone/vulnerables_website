<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header("Location: ../sign_in.php");
    exit();
}
require_once '../config/connect_db.php';
$conn = db_connect();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comment_content"])) {
    $user_id = intval($_SESSION['id']);
    $post_id = 1;
    $content = $conn->real_escape_string($_POST["comment_content"]);
    $conn->query("INSERT INTO comments (user_id, content, created_at) VALUES ($user_id, '$content', NOW())");
    header("Location: dragon_ball.php");
    exit;
}

$comments = $conn->query("SELECT comments.content, comments.created_at, users.username
    FROM comments
    JOIN users ON comments.user_id = users.id
    ORDER BY comments.created_at DESC
");

function getContentByName($conn, $name) {
    $sql = "SELECT name, describes FROM mgcontents WHERE name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    return $data;
}

$content = getContentByName($conn, "dragon ball z");
$content1 = getContentByName($conn, "dragon ball super");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dragon Ball Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap">
    <link rel="stylesheet" href="../assets/css/user.css">
</head>
<body>
    <!-- Banner -->
    <div class="banner">
        <a href="user.php" class="back-icon-banner" title="Quay lại trang người dùng">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        <img src="../assets/images/dragon_ball.jpg" alt="Banner">
        <div class="banner-text">
            <h1>Dragon Ball</h1>
        </div>
    </div>
    <!-- Main content -->
    <div class="main-content">
        <div class="posts">
            <div class="post">
                <img src="../assets/images/dragon_ball_z.jpeg" alt="Post 1">
                <h2><?php echo htmlspecialchars($content['name'] ?? ''); ?></h2>
                <p><?php echo htmlspecialchars($content['describes'] ?? ''); ?></p>
            </div>
            <div class="post">
                <img src="../assets/images/dragon_ball_super.jpg" alt="Post 1">
                <h2><?php echo htmlspecialchars($content1['name'] ?? ''); ?></h2>
                <p><?php echo htmlspecialchars($content1['describes'] ?? ''); ?></p>
            </div>
        </div>
        <!-- Comment Section -->
        <div class="comments-section">
            <h3>Bình luận</h3>
            <form method="POST" action="">
                <textarea name="comment_content" placeholder="Nhập bình luận..." required></textarea>
                <button type="submit">Gửi bình luận</button>
            </form>
            <div class="comments-list">
                <?php while($row = $comments->fetch_assoc()): ?>
                    <div class="comment-item">
                        <div>
                            <strong><?php echo htmlspecialchars($row['username']); ?>:</strong>
                            <span><?php echo htmlspecialchars($row['content']); ?></span>
                        </div>
                        <em><?php echo $row['created_at']; ?></em>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>