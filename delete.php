<?php
include_once "conn.php";

$stmt = $conn->prepare("DELETE FROM tb_service WHERE Service_ID=?");
$stmt->execute([$_POST['Service_ID']]);

echo "Deleted";
?>
