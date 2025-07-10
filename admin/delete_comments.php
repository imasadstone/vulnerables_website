<?php
require_once '../config/connect_db.php';
$conn = db_connect();

if (isset($_GET['id'])) {
    $comment_id = $_GET['id'];
    $result = $conn->query("DELETE FROM comments WHERE id = $comment_id"); // Xóa comment dựa trên id
    $redirect_url = 'admin.php?tab=comments';
    header("Location: $redirect_url");
    exit;
} else {
    header("Location: admin.php");
    exit;
}
?>