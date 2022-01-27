<?php
session_start();
include('functions.php');
check_session_id();
//〇
//var_dump($_POST);
//exit();
// 入力項目のチェック


// DB接続


// SQL実行

if (
  !isset($_POST['lost']) || $_POST['lost'] == '' ||
  !isset($_POST['date']) || $_POST['date'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  exit('paramError');
}

$lost = $_POST['lost'];
$date = $_POST['date'];
$id = $_POST['id'];

// DB接続

include('functions.php');
$pdo = connect_to_db();

$sql = 'UPDATE lost_table SET lost=:lost, date=:date, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lost', $lost, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header('Location:index.php');
exit();
