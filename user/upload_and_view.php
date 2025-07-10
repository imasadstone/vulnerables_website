<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('Location: ../sign_in.php');
    exit();
}

// Hàm loại bỏ ký tự ../ hoặc ..\
function remove_dotdot($input) {
    return str_replace(['../', '..\\'], '', $input);
}

// Xử lý khi người dùng bấm "View" một file
$upload_dir = '../assets/uploads/';
if (isset($_GET['view'])) {
    $filename = remove_dotdot($_GET['view']);
    $filepath = $upload_dir . $filename;
    if (file_exists($filepath)) {
        echo "<h3>Nội dung file: " . htmlspecialchars($filename) . "</h3>";
        echo "<pre style='background:#eee;max-height:400px;overflow:auto'>";
        echo htmlspecialchars(file_get_contents($filepath));
        echo "</pre>";
    } else {
        echo "Không tìm thấy file.";
    }
    echo "<a href='upload_and_view.php'>Quay lại</a>";
    exit();
}

// Xử lý khi người dùng gửi form upload file
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['file']['name'];
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        // Chỉ cho phép file .txt
        if ($extension !== 'txt') {
            echo "Chỉ được upload file .txt!<br>";
        } else {
            $destination = $upload_dir . $filename;
            // Kiểm tra nếu file đã tồn tại
            if (file_exists($destination)) {
                echo "File đã tồn tại, vui lòng đổi tên file khác.<br>";
            } else {
                // Di chuyển file từ thư mục tạm sang thư mục đích
                if (move_uploaded_file($_FILES['file']['tmp_name'], $destination)) {
                    echo "Upload thành công! <a href='?view=" . urlencode($filename) . "'>Xem nội dung file</a><br>";
                } else {
                    echo "Lỗi khi upload file.<br>";
                }
            }
        }
    } else {
        echo "Vui lòng chọn file để upload.<br>";
    }
    echo "<a href='upload_and_view.php'>Quay lại</a>";
    exit();
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Upload and View File</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">
</head>
<body>
    <a href="user.php" class="back-icon-upload" title="Quay lại trang cá nhân">
        <i class="fa fa-arrow-left"></i> Quay lại
    </a>
    <div class="upload-section">
        <form method="POST" enctype="multipart/form-data">
            <label>Chọn file .txt để upload:</label>
            <input type="file" name="file" accept=".txt">
            <button type="submit">Upload</button>
        </form>
        <hr>
        <h4>File đã upload:</h4>
        <ul class="upload-list">
        <?php
        foreach (glob($upload_dir . '*.txt') as $f) {
            echo "<li>" . htmlspecialchars(basename($f)) .
                " - <a href='?view=" . urlencode(basename($f)) . "'>Xem</a></li>";
        }
        ?>
        </ul>
    </div>
</body>
</html>