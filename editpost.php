<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

// ตรวจสอบว่ามีการส่ง ID ของโพสต์มาไหม
if (!isset($_GET['id'])) {
    die("Error: No post ID provided.");
}

$post_id = $_GET['id'];

// ดึงข้อมูลโพสต์จากฐานข้อมูล
$stmt = $conn->prepare("SELECT * FROM post WHERE id = :id");
$stmt->bindParam(':id', $post_id);
$stmt->execute();
$post = $stmt->fetch();

if (!$post) {
    die("Error: Post not found.");
}

// ตรวจสอบว่าเป็นเจ้าของโพสต์หรือไม่
if ($_SESSION['id'] != $post['user_id'] && $_SESSION['role'] != 'a') {
    die("Error: You do not have permission to edit this post.");
}

// อัปเดตโพสต์
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // อัปเดตโพสต์ในฐานข้อมูล
    $update_stmt = $conn->prepare("UPDATE post SET title = :title, content = :content WHERE id = :id");
    $update_stmt->bindParam(':title', $title);
    $update_stmt->bindParam(':content', $content);
    $update_stmt->bindParam(':id', $post_id);
    $update_stmt->execute();

    header("Location: post.php?id=$post_id");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-lg">
    <h1>แก้ไขกระทู้</h1>
    <form method="post">
        <div class="mb-3">
            <label for="title" class="form-label">หัวข้อ</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">เนื้อหา</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?php echo htmlspecialchars($post['content']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
</div>
</body>
</html>
