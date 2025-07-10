<?php
session_start();
if (
    !isset($_SESSION['username']) ||
    !isset($_SESSION['id']) ||
    !isset($_SESSION['role']) ||
    $_SESSION['role'] != 1 ||
    $_SESSION['username'] !== 'admin'
) {
    header('Location: ../sign_in.php');
    exit();
}
// Đường dẫn ảnh đại diện (avatar)
$upload_dir = "../assets/avatars/";
$avatar_path = isset($_SESSION['avatar']) && file_exists($upload_dir . $_SESSION['avatar'])
    ? $upload_dir . $_SESSION['avatar']
    : "../assets/images/admin_avatar.jpg";

require_once '../config/connect_db.php';
$conn = db_connect();

$tab = isset($_GET['tab']) ? $_GET['tab'] : 'users';

// Lấy danh sách người dùng nếu tab là users
if ($tab === 'users') {
    $users = [];
    $result = $conn->query("SELECT id, username, email FROM users ORDER BY id ASC");
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) $users[] = $row;
    }
}

// Lấy danh sách bình luận nếu tab là comments
if ($tab === 'comments') {
    $comments = [];
    $sql = "SELECT c.id, c.user_id, c.content, c.created_at, u.username 
            FROM comments c 
            JOIN users u ON c.user_id = u.id 
            ORDER BY c.id ASC";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) $comments[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar flex-column">
        <div class="sidebar-title">Xin chào Admin</div>
        <nav class="nav flex-column">
            <a class="nav-link <?= $tab=='users'?'active':'' ?>" href="?tab=users"><i class="fas fa-user"></i> Quản lý tài khoản</a>
            <a class="nav-link <?= $tab=='comments'?'active':'' ?>" href="?tab=comments"><i class="fas fa-comments"></i> Quản lý bình luận</a>
        </nav>
    </div>
    <div class="topbar">
        <img src="<?= $avatar_path ?>" alt="Avatar" class="avatar-img">
        <div class="icon-group">            
            <i class="fas fa-envelope fa-lg"></i>
            <div class="user-dropdown">
                <i class="fas fa-user-circle fa-2x" id="userDropdownBtn"></i>
                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <a href="upload_avatar.php">Thay avatar</a>
                    <a href="../sign_out.php">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <!-- Quản lý người dùng -->
        <?php if($tab=='users'): ?>
            <div class="action-bar">
                <button class="btn-info">THÊM TÀI KHOẢN</button>
            </div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td>
                            <a href="delete_users.php?id=<?= $user['id'] ?>" class="btn-danger" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?');">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <!-- Quản lý bình luận -->
        <?php elseif($tab=='comments'): ?>
            <div class="action-bar"></div>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Người dùng</th>
                            <th>Nội dung</th>
                            <th>Ngày tạo</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($comments as $cmt): ?>
                    <tr>
                        <td><?= htmlspecialchars($cmt['id']) ?></td>
                        <td><?= htmlspecialchars($cmt['username']) ?></td>
                        <td><?= htmlspecialchars($cmt['content']) ?></td>
                        <td><?= htmlspecialchars($cmt['created_at']) ?></td>
                        <td>
                            <a href="delete_comments.php?id=<?= $cmt['id'] ?>" class="btn-danger" onclick="return confirm('Bạn có chắc muốn xóa bình luận này?');">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif ?>
    </div>
    <script src="../assets/js/main.js"></script>
</body>
</html>