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

// Cấu hình thư mục lưu ảnh, kích thước tối đa và định dạng cho phép
$upload_dir = "../assets/avatars/";
$max_size = 2 * 1024 * 1024;
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        // Lấy thông tin file
        $file_tmp = $_FILES['avatar']['tmp_name'];
        $file_name = basename($_FILES['avatar']['name']);
        $file_type = mime_content_type($file_tmp);
        $file_size = $_FILES['avatar']['size'];

        // Tạo tên file mới, đảm bảo không trùng và an toàn
        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $new_name = "admin_avatar_" . $_SESSION['id'] . "_" . time() . "." . $ext;
        $target_file = $upload_dir . $new_name;

        if (!in_array($file_type, $allowed_types)) {
            $message = "Chỉ cho phép upload các file ảnh JPEG, PNG, GIF.";
        } elseif ($file_size > $max_size) {
            $message = "Ảnh quá lớn. Dung lượng tối đa là 2MB.";
        } else {
            // Xóa avatar cũ nếu có
            if (!empty($_SESSION['avatar']) && file_exists($upload_dir . $_SESSION['avatar'])) {
                unlink($upload_dir . $_SESSION['avatar']);
            }
            // Lưu file mới vào thư mục
            if (move_uploaded_file($file_tmp, $target_file)) {
                $_SESSION['avatar'] = $new_name;
                $message = "Cập nhật ảnh đại diện thành công!";
            } else {
                $message = "Lỗi khi tải ảnh lên.";
            }
        }
    } else {
        $message = "Vui lòng chọn ảnh để upload.";
    }
}

$current_avatar = isset($_SESSION['avatar']) && file_exists($upload_dir . $_SESSION['avatar']) ?
    $upload_dir . $_SESSION['avatar'] :
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/svgs/solid/user-circle.svg";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Change Avatar</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <div class="form-upload-avatar">
        <h2>Change Avatar</h2>
        <?php if($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <div>
            <img src="<?= htmlspecialchars($current_avatar) ?>" class="avatar-img-preview" alt="Avatar hiện tại">
        </div>
        <form method="post" enctype="multipart/form-data">
            <label>Chọn ảnh mới (JPEG, PNG, GIF, tối đa 2MB):</label><br>
            <input type="file" name="avatar" accept="image/*" required><br>
            <button type="submit" class="submit-btn">Cập nhật</button>
        </form>
        <div style="margin-top:20px;">
            <a href="admin.php">&larr; Quay lại trang quản trị</a>
        </div>
    </div>
</body>
</html>