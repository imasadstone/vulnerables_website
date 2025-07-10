<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['id'])) {
    header('Location: sign_in.php');
    exit();
}
require_once '../config/connect_db.php';
$conn = db_connect();

$search = "";
$results = [];
if (isset($_GET['q'])) {
    $search = trim($_GET['q']);
    if ($search !== "") {
        $sql = "SELECT id, category, sidestory, describes FROM filler WHERE sidestory LIKE '%$search%' OR category LIKE '%$search%'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $results[] = [
                'id' => $row['id'],
                'category' => $row['category'],
                'sidestory' => $row['sidestory'],
                'describes' => $row['describes']
            ];
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OVA Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/search.css">
</head>
<body>
    <div class="search-header">
        <h1>TÌM KIẾM NGOẠI TRUYỆN</h1>
    </div>
    <a href="user.php" class="back-link">&larr; Quay lại</a>
    <form method="get" action="search.php" class="search-form">
        <input type="text" name="q" placeholder="Nhập tên hoặc thể loại manga..." value="<?php echo htmlspecialchars($search); ?>" required>
        <button type="submit">Tìm kiếm</button>
    </form>
    <div class="search-results">
        <?php if ($search !== ""): ?>
            <h2>Kết quả cho "<?php echo htmlspecialchars($search); ?>"</h2>
            <?php if (count($results) > 0): ?>
                <table class="search-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thể loại</th>
                            <th>Tên truyện</th>
                            <th>Mô tả</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($results as $row): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td class="sidestory-cell"><?php echo $row['sidestory']; ?></td>
                            <td><?php echo $row['describes']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Không tìm thấy kết quả phù hợp.</p>
            <?php endif; ?>
        <?php else: ?>
            <h2>Hãy nhập từ khóa để tìm kiếm ngoại truyện!</h2>
        <?php endif; ?>
    </div>
</body>
</html>