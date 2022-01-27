<?php
session_start();
include('functions.php');
check_session_id();

$user_id = $_SESSION['user_id'];


$pdo = connect_to_db();



//$sql = 'SELECT * FROM lost_table ORDER BY takeout ASC';
$sql = 'SELECT * FROM task_table LEFT OUTER JOIN (SELECT task_id, COUNT(id) AS check_count FROM check_table GROUP BY task_id) AS result_table ON task_table.id = result_table.task_id';
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
      <td>{$record["place"]}</td>
      <td>{$record["machine"]}</td>
      <td>{$record["task"]}</td>
<td><a href='task_check_create.php?user_id={$user_id}&task_id={$record["id"]}'>移動({$record['check_count']})</a></td>
      <td><a href='task_edit.php?id={$record["id"]}'>edit</a></td>
      <td><a href='task_delete.php?id={$record["id"]}'>delete</a></td>

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
  <title>タスク一覧</title>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
  <header>

  </header>

<body class="body">

  
     <form action="task_create.php" method="POST">
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
        タスク: <input type="text" name="task">
      </div>
      <div>
        持出日: <input type="date" name="date">
      </div>
</div>
    <br> 

  <div class="input" >


      <div>
        <button>submit</button>
      </div>
      </div>

    </fieldset>


</body>

<body>
  <fieldset>
    <legend>タスク一覧（ツールの運搬指示等）</legend>

    <table>
      <thead>
        <tr>
          <th>登録日</th>
          <th>エリア</th>
          <th>機械</th>
          <th>名称</th>
          <th>状態</th>
          <th>編集</th>
          <th>削除</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>