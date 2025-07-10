<?php
require_once 'config/connect_db.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = db_connect();
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');
    if ($username === '' || $password === '') {
        $error = "Vui lòng nhập đầy đủ thông tin!";
    } else {
        $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $hashed_password, $role);
            $stmt->fetch();
            if (md5($password) == $hashed_password) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['id'] = $id;
                if ($role == 1) {
                    header("Location: admin/admin.php");
                } else {
                    header("Location: user/user.php");
                }
                exit();
            } else {
                $error = "Sai mật khẩu!";
            }
        } else {
            $error = "Tài khoản không tồn tại!";
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
    <title>Member Login</title>
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
        <div class="form-card">
            <div class="form-inner">
                <div class="user-avatar">
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-title">MEMBER LOGIN</div>
                <?php if ($error): ?>
                    <div class="message error"><?php echo $error; ?></div>
                <?php endif; ?>
                <form class="login-form" action="" method="post" autocomplete="off" style="width:100%">
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <i class="fa fa-user"></i>
                            <input type="text" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" class="form-btn">Sign in</button>
                </form>
                <div class="form-switch">Not a member?</div>
                <button class="form-link-btn" onclick="window.location.href='sign_up.php'">Create account</button>
            </div>
        </div>
    </div>
</body>
</html>