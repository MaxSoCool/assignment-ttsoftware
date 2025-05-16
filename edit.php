<?php
    require "database/connect.php";
    $showSuccess = false;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT LPAD(HN, 6, '0') AS HN, FNAME, LNAME, TEL, EMAIL FROM user WHERE HN = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "ไม่พบข้อมูลเจ้าของ HN นี้";
        }
    } else {
        echo "ไม่พบข้อมูล";
    }
?>

<?php require "database/update.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit</title>
</head>
<body>
    <h2 class= "bold"><center>การจัดการข้อมูล</h2>
    <div class="container">
        <form method="POST" class="table edit normal" id=editForm>
            <label class="bold">รหัส HN: <?php echo $row['HN']; ?></label><br>
            <label class="bold">ชื่อ:</label>
            <input type="text" class="normal" name="fname" value="<?php echo $row['FNAME']; ?>" required><br>

            <label class="bold">นามสกุล:</label>
            <input type="text" class="normal" name="lname" value="<?php echo $row['LNAME']; ?>" required><br>

            <label class="bold">เบอร์โทรศัพท์:</label>
            <input type="text" class="normal" name="tel" value="<?php echo $row['TEL']; ?>" required><br>

            <label class="bold">อีเมล:</label>
            <input type="email" class="normal" name="email" value="<?php echo $row['EMAIL']; ?>" required><br>

            <div class="button-group">
                <button type="button" id="saveBtn" class="confirm">บันทึกการเปลี่ยนแปลง</button>
                <button type="button" id="deleteBtn" class="delete">ลบชุดข้อมูลนี้</button>
                <button type="button" id="cancelBtn" class="back">ยกเลิก</button>
            </div>
        </form>
    </div>
    
    <dialog id="saveModal">
        <form method="dialog" class="modal-content">
            <p class="bold main">ยืนยันการบันทึกการเปลี่ยนแปลงหรือไม่?</p>
            <menu>
                <div class="modal-group">
                    <button value="cancel" class="back middle">ยกเลิก</button>
                    <button value="confirm" class="confirm middle">บันทึก</button>
                </div>
            </menu>
        </form>
    </dialog>

    <dialog id="deleteModal">
        <form method="dialog" class="modal-content">
            <p class="bold main">ยืนยันการลบชุดข้อมูลนี้หรือไม่?</p>
            <menu>
                <div class="modal-group">
                    <button value="cancel" class="back">ยกเลิก</button>
                    <button value="confirm" class="delete">ลบ</button>
                </div>
            </menu>
        </form>
    </dialog>

    <dialog id="cancelModal">
        <form method="dialog" class="modal-content">
            <p class="bold main">ยืนยันที่จะยกเลิกการเปลี่ยนแปลงหรือไม่?</p>
            <menu>
                <div class="modal-group">
                    <button value="cancel" class="back">ไม่</button>
                    <button value="confirm" class="delete">ใช่</button>
                </div>
            </menu>
        </form>
    </dialog>

    <dialog id="successModal">
        <form method="dialog" class="modal-content">
            <p class="bold main" style="font-size:1.2em;">บันทึกการเปลี่ยนแปลงสำเร็จ</p>
            <menu style="display:flex; justify-content:center;">
                <button id="successCloseBtn" class="back">กลับหน้าหลัก</button>
            </menu>
        </form>
    </dialog>

    <dialog id="deleteSuccessModal">
        <form method="dialog" class="modal-content">
            <p class="bold main" style="font-size:1.2em;">ลบข้อมูลสำเร็จ</p>
            <menu style="display:flex; justify-content:center;">
                <button id="deleteSuccessCloseBtn" class="back">กลับหน้าหลัก</button>
            </menu>
        </form>
    </dialog>

<script src="modal.js"></script>
<script>
// ตรวจสอบการบันทึกข้อมูล
    <?php if ($showSuccess): ?>
        window.addEventListener('DOMContentLoaded', function() {
            document.getElementById('successModal').showModal();
        });
    <?php endif; ?>

/// ลบข้อมูล
    document.getElementById('deleteModal').addEventListener('close', function() {
    if (this.returnValue === 'confirm') {

            fetch('database/delete.php?id=<?php echo $row["HN"]; ?>').then(response => {
                document.getElementById('deleteSuccessModal').showModal();
            });
        }
    });
</script>
</body>
</html>
