<?php
session_start();
include('functions.php');
//check_session_id();

//$user_id = $_SESSION['user_id'];








$pdo = connect_to_db();



//$sql = 'SELECT * FROM lost_table ORDER BY takeout ASC';
$sql = 
'SELECT * FROM task_table LEFT OUTER JOIN (SELECT task_id, COUNT(id) AS check_count FROM check_table GROUP BY task_id) AS result_table ON task_table.id = result_table.task_id';

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
    <td><a href='task_check_create.php?task_id={$record["id"]}'>？{$record['check_count']}</a></td>
      <td>{$record["date"]}</td>
      <td>{$record["area_a"]}</td>
      <td>{$record["area_b"]}</td>
<td>{$record["staff"]}</td>
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
  <title>FACTORY MANAGER</title>
      <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
  <header>

  </header>


    <body class="body">

  
    <form action="lost_create.php" method="POST">
    <fieldset>
     <legend>
       <div>
       <a href="task.php"><img src="img/kezuriya.png" alt="">
       </div>
      </legend>
   
    
     <div class="menu">
   <a href="https://withrobo.co.jp/delivery-robot-bellabot-operating-manual/">BellaBot操作方法</a>
    <a href="task.php">管理者モード</a>
 </div>

 <div class="input" >
    <table class="table1" >
      <thead>
        <tr>
          <th>着完</th>
          <th>いつまで</th>
          <th>いまある場所</th>
          <th>持ってく場所</th>
          <th>担当者</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
     </div>

    
 <br> 

    <footer>
      <iframe class="miraicamera"  src="https://my.matterport.com/show/?m=CmcV6c51UY7&hl=1&hr=1&lang=jp&help=2&play=1"
      </iframe>
  </footer>
  </div>
    </fieldset>





<body class="tasktop">
  <fieldset>
    <legend>ツールを移動して下さい！</legend>

    <table>
      <thead>
        <tr>
          <th>着完</th>
          <th>いつまで</th>
          <th>いまある場所</th>
          <th>持ってく場所</th>
          <th>担当者</th>

        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

  



</body>

</html>