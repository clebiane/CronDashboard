<?php

$time = $_GET['time'] ?? '';
$task = $_GET['task'] ?? '';

$command = "crontab <<<CMD
$time $task
CMD";

var_dump($command);

shell_exec($command);

$json = json_encode(['status' => 'ok']);

// header('Content-type: application/json; charset=UTF-8');
// echo $json;
