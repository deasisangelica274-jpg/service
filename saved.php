<?php
include_once("conn.php");

$desc = trim($_POST['Service_Description']);
$fee = trim($_POST['Fee_Per_Hour']);

if($desc == "" || $fee == ""){
    echo "Error: Empty fields not allowed";
    exit;
}

$stmt = $conn->prepare("
    INSERT INTO tb_service(Service_Description, Fee_Per_Hour)
    VALUES(?, ?)
");

$stmt->execute([$desc, $fee]);

echo "Saved";
?>
