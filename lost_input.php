<?php
session_start();
include('functions.php');
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型入力画面</title>
</head>



<body>

  
    <form action="create_file.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>DB連携型入力画面</legend>
      <a href="lost_read.php">一覧画面</a>
      <a href="lost_logout.php">ログアウト</a>
      <div>
        名称: <input type="text" name="lost">
      </div>
     
       <div>
        場所: <input type="text" name="place">
      </div>

      <div>
        登録日: <input type="date" name="date">
      </div>
       <div>
        工作機械: <input type="text" name="machine">
      </div>
  <div>
    <input type="file" name="upfile" accept="image/*" capture="camera" />
  </div>

      <body>

    
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>