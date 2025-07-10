<?php
require_once '../config/connect_db.php';
$conn = db_connect();

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    // Kiểm tra người dùng tồn tại và có vai trò là người dùng thường
    $check = $conn->query("SELECT id FROM users WHERE id = $user_id AND role = 0");
    if ($check && $check->num_rows > 0) {
        $conn->query("DELETE FROM comments WHERE user_id = $user_id"); // Xóa tất cả comment của người dùng này
        $conn->query("DELETE FROM users WHERE id = $user_id");         // Xóa người dùng
    }
    header("Location: admin.php?tab=users");
    exit;
} else {
    header("Location: admin.php");
    exit;
}
?>