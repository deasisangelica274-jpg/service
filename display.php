<?php
include_once "conn.php";

header('Content-Type: application/json'); 

$stmt = $conn->query("SELECT * FROM tb_service");
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
