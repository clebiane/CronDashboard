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
  $crontab = "$time $task";
  $crontabContent = shell_exec('crontab -l');
  shell_exec("crontab <<EOF
${crontabContent}${crontab}
EOF");

}

?>
