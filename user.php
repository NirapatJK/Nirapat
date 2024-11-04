<?php
session_start();
$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");

// ตรวจสอบสิทธิ์ผู้ใช้
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'a') {
    header("Location: index.php");
    exit();
}

// ดึงข้อมูลผู้ใช้
$sql = "SELECT id, username, firstname, lastname, gender, email, role FROM user";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้ใช้งาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>จัดการผู้ใช้งาน</h2>
        
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ชื่อผู้ใช้</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เพศ</th>
                    <th>อีเมล</th>
                    <th>สิทธิ์</th>
                    <th>การจัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['firstname'] . ' ' . $user['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($user['gender']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td><?php echo htmlspecialchars($user['role']); ?></td>
                        <td>
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal" data-id="<?php echo $user['id']; ?>" data-username="<?php echo htmlspecialchars($user['username']); ?>" data-firstname="<?php echo htmlspecialchars($user['firstname']); ?>" data-lastname="<?php echo htmlspecialchars($user['lastname']); ?>" data-gender="<?php echo htmlspecialchars($user['gender']); ?>" data-email="<?php echo htmlspecialchars($user['email']); ?>" data-role="<?php echo htmlspecialchars($user['role']); ?>">แก้ไข</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal สำหรับแก้ไขผู้ใช้งาน -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edituser.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">แก้ไขข้อมูลผู้ใช้งาน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="editUserId">
                        <div class="mb-3">
                            <label for="editUsername" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" id="editUsername" name="username" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="editFirstname" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="editFirstname" name="firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="editLastname" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="editLastname" name="lastname" required>
                        </div>
                        <div class="mb-3">
                            <label for="editGender" class="form-label">เพศ</label>
                            <select class="form-select" id="editGender" name="gender">
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editEmail" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="editEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">สิทธิ์</label>
                            <select class="form-select" id="editRole" name="role">
                                <option value="u">ผู้ใช้ทั่วไป</option>
                                <option value="b">แบน</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const editUserModal = document.getElementById('editUserModal');
        editUserModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            document.getElementById('editUserId').value = button.getAttribute('data-id');
            document.getElementById('editUsername').value = button.getAttribute('data-username');
            document.getElementById('editFirstname').value = button.getAttribute('data-firstname');
            document.getElementById('editLastname').value = button.getAttribute('data-lastname');
            document.getElementById('editGender').value = button.getAttribute('data-gender');
            document.getElementById('editEmail').value = button.getAttribute('data-email');
            document.getElementById('editRole').value = button.getAttribute('data-role') === 'b' ? 'b' : 'u';
        });
    </script>
</body>
</html>
