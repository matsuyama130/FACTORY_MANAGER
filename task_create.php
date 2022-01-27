<?php
session_start();
include('functions.php');
check_session_id();

if (
  !isset($_POST['task']) || $_POST['task'] == '' ||
  !isset($_POST['date']) || $_POST['date'] == ''||
   !isset($_POST['place']) || $_POST['place'] == '' ||
    !isset($_POST['machine']) || $_POST['machine'] == '' 
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$task = $_POST['task'];
$date = $_POST['date'];
$place = $_POST['place'];
$machine = $_POST['machine'];

$pdo = connect_to_db();

$sql = 'INSERT INTO task_table(id, task, date, place, machine, created_at, updated_at) VALUES(NULL, :task, :date, :place, :machine, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':task', $task, PDO::PARAM_STR);
$stmt->bindValue(':date', $date, PDO::PARAM_STR);
$stmt->bindValue(':place', $place, PDO::PARAM_STR);
$stmt->bindValue(':machine', $machine, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:task.php");
exit();


//var_dump($_FILES);
//exit();