<?php
include_once "conn.php";

$stmt = $conn->prepare("UPDATE tb_service 
SET Service_Description=?, Fee_Per_Hour=? 
WHERE Service_ID=?");

$stmt->execute([
    $_POST['Service_Description'],
    $_POST['Fee_Per_Hour'],
    $_POST['Service_ID'] // ✅ FIXED
]);

echo "Updated";
?>
