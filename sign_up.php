<?php
require_once 'config/connect_db.php';
$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = db_connect();

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if ($username === '' || $email === '' || $password === '' || $confirm === '') {
        $error = "Vui lòng điền đầy đủ thông tin!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email không hợp lệ!";
    } elseif ($password !== $confirm) {
        $error = "Mật khẩu xác nhận không đúng!";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE username=? OR email=?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $error = "Tên đăng nhập hoặc email đã tồn tại!";
        } else {
            $hashed = md5($password);
            $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, 0)");
            $stmt->bind_param("sss", $username, $hashed, $email);
            if ($stmt->execute()) {
                $success = "Đăng ký thành công!";
            } else {
                $error = "Đăng ký thất bại!";
            }
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Member Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:600,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/form.css">
</head>
<body>
    <a href="index.php" class="back-btn" title="Back to Home">
        <i class="fa fa-arrow-left"></i>
    </a>
    <div class="center-laptop">
        <div class="laptop"></div>
        <div class="laptop-base"></div>
        <div class="form-card">
            <div class="form-inner">
                <div class="user-avatar">
                    <i class="fa fa-user-plus"></i>
                </div>
                <div class="form-title">MEMBER SIGN UP</div>
                <?php if ($error): ?>
                    <div class="message error"><?php echo $error; ?></div>
                <?php elseif ($success): ?>
                    <div class="message success"><?php echo $success; ?></div>
                <?php endif; ?>
                <form class="signup-form" action="" method="post" autocomplete="off" style="width:100%">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <i class="fa fa-user"></i>
                            <input type="text" id="username" name="username" required value="<?php echo isset($username) ? $username : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <i class="fa fa-envelope"></i>
                            <input type="email" id="email" name="email" required value="<?php echo isset($email) ? $email : ''; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="confirm" name="confirm" required>
                        </div>
                    </div>
                    <button type="submit" class="form-btn">Sign Up</button>
                </form>
                <div class="form-switch">Already a member?</div>
                <button class="form-link-btn" onclick="window.location.href='sign_in.php'">Login</button>
            </div>
        </div>
    </div>
</body>
</html>