<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];


$pdo = connect_to_db();



//$sql = 'SELECT * FROM lost_table ORDER BY takeout ASC';
$sql = 'SELECT * FROM bbs_table LEFT OUTER JOIN (SELECT bbs_id, COUNT(id) AS check_count FROM check_table GROUP BY bbs_id) AS result_table ON bbs_table.id = result_table.bbs_id';
$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($result);
//exit();


$output = "";

foreach ($result as $record) {
  $output .= "
    <tr>
      <td>{$record["date"]}</td>
      <td>{$record["bbs"]}</td>
      <td><a href='bbs_edit.php?id={$record["id"]}'>edit</a></td>
      <td><a href='bbs_delete.php?id={$record["id"]}'>delete</a></td>
      <td><img src='{$record["image"]}' height='150px'></td>
    </tr>
  ";
}


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/sample.css">
  <title>掲示板</title>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
  <header>

  </header>

<body class="body">

  
    <form action="bbs_create_file.php" method="post" enctype="multipart/form-data">
    <fieldset>
    <legend><a href="lost.php"><img src="img/kezuriya.png" alt=""></div></legend>
 <div class="menu">
    <a href="tool.php">ツールリスト</a>
    <a href="task.php">タスク</a>
    <a href="bbs.php">掲示板</a>
  <a href="lost_logout.php">ログアウト</a>
 </div>
    <br> 
     <div class="input" >
      <div>
        登録エリア: <input type="text" name="place">
      </div>
      <div>
        工作機械: <input type="text" name="machine">
      </div>
       <div>
        投稿文: <input type="text" name="bbs">
      </div>
      <div>
        記入日: <input type="date" name="date">
      </div>
</div>
    <br> 

  <div class="input" >

    <div>
    <input type="file" name="upfile" accept="image/*" capture="camera" />
  </div>
      <div>
        <button>submit</button>
      </div>
      </div>

    </fieldset>


</body>

<body>
  <fieldset>
    <legend>掲示板（ツールに関する補足情報等を写真付きで掲載）</legend>

    <table>
      <thead>
        <tr>
          <th>記入日</th>
          <th>工作機械</th>
          <th>編集</th>
          <th>削除</th>
          <th>写真</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>