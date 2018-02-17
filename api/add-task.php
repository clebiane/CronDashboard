<?php
// Add task
// /api/add-task.php?minute=00&hour=23&day=31&month=12&weekDay=7&task=echo+hello

require_once('util.php');

//tratamento dos parametros
$minute = $_GET["minute"] ?? null;
$hour = $_GET["hour"] ?? null;
$day = $_GET["day"] ?? null;
$month = $_GET["month"] ?? null ;
$weekDay = $_GET["weekDay"] ?? null;
$task = $_GET['task'] ?? null;

if ($minute && $hour && $day && $month && $weekDay && $task) {
  addTask($minute, $hour, $day, $month, $weekDay, $task);
  $json = json_encode(['status' => 'Tarefa agendada com sucesso!']);
} else {
  $json = json_encode(['status' => 'Tarefa não agendada!']);
}

header('Content-type: application/json; charset=UTF-8');
echo $json;
