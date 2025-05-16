<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    
    $update_sql = "UPDATE user SET FNAME = ?, LNAME = ?, TEL = ?, EMAIL = ? WHERE HN = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssss", $fname, $lname, $tel, $email, $id);
    if ($update_stmt->execute()) {
        $showSuccess = true;
    } else {
        echo "ข้อมูลมีความผิดพลาด";
    }
}
?>