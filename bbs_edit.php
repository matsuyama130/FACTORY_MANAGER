<?php
session_start();
include('functions.php');
check_session_id();


//〇
//var_dump($_POST);
//exit();

// id受け取り
// DB接続
// SQL実行




$id = $_GET['id'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM bbs_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>掲示板編集画面</title>
</head>

<body>
<form action="bbs_update.php" method="POST">
  <fieldset>
    <legend>掲示板編集画面</legend>
    <a href="bbs.php">一覧画面</a>
    <div>
      bbs: <input type="text" name="bbs" value="<?= $record['bbs'] ?>">
    </div>
    <div>
      date: <input type="date" name="date" value="<?= $record['date'] ?>">
    </div>
    <div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
    </div>
    <div>
      <button>submit</button>
    </div>
  </fieldset>
</form>

</body>

</html>