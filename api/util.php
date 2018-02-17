<?php

function getTasks() {
  $cronsContent = shell_exec('crontab -l');
  $cronsArray = [];

  foreach (explode("\n", $cronsContent) as $cronLine) {
     preg_match('/([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) (.+)/', $cronLine, $matches);
     if(isset($matches[6])){
       $cronsArray[] = [
         "minute" => $matches[1],
         "hour" => $matches[2],
         "day" => $matches[3],
         "month" => $matches[4],
         "weekDay" => $matches[5],
         "task" => $matches[6],
       ];
     }
  }

  return $cronsArray;
}

function addTask($minute, $hour, $day, $month, $weekDay, $task) {
  $time = "$minute $hour $day $month $weekDay";
  $cron = "$time $task";
  $crontabContent = shell_exec('crontab -l');
  $crontabContent .= "$cron\n";
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

 ?>
