<?php
//tratamento dos parametros
$minute = $_GET["minute"] ?? null;
$hour = $_GET["hour"] ?? null;
$day = $_GET["day"] ?? null;
$month = $_GET["month"] ?? null ;
$weekDay = $_GET["weekDay"] ?? null;
$time = "$minute $hour $day $month $weekDay";
//$time = $_GET['time'] ?? null;
$task = $_GET['task'] ?? null;
$cron = "$time $task";

if($time && $task) {
  addTask($cron);
  $json = json_encode(['status' => 'Tarefa agendada com sucesso!']);
} else {
  $json = json_encode(['status' => 'Tarefa não agendada!']);
}

header('Content-type: application/json; charset=UTF-8');
echo $json;

function addTask($cron) {
  $crontabContent = shell_exec('crontab -l');
  $crontabContent .= $cron;
  // alterar permissão do contrab-temp para que outras pessoas possam escrever
  file_put_contents('crontab-temp', $crontabContent);
  shell_exec('crontab crontab-temp');
}

// function addTask($cron) {
//   $command = "crontab <<<CMD
//     $cron
//   CMD";
//
//   shell_exec($command);
// }
