<?php
        require "database/connect.php";
        $stmt = $conn->prepare("SELECT LPAD(HN, 6, '0') AS HN, CONCAT(FNAME, ' ', LNAME) AS NAME, TEL, EMAIL FROM user");
        $stmt->execute();
        $result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Main Assignment</title>
</head>
<body>
    <h2 class="bold"><center>ข้อมูลผู้ใช้งาน</h2>
        <table class="table normal">
            <tr>
                <th class="header bold info">ข้อมูล</th>
                <th class="header bold info">รหัส HN</th>
                <th class="header bold info">ชื่อ</th>
                <th class="header bold info">เบอร์โทรศัพท์</th>
                <th class="header bold info">อีเมล</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>".
                    "<td class=button><a href='edit.php?id=" . $row['HN'] . "'> รายละเอียด </a></td>" .
                    "<td>" . $row['HN']. "</td>".
                    "<td class=bold><a href='edit.php?id=" . $row['HN'] . "'>" . $row['NAME']. "</td>".
                    "<td>" . $row['TEL']. "</td>".
                    "<td>" . $row['EMAIL']. "</td></tr>";
                }
                $conn->close();
            ?>
        </table>
</body>
</html>