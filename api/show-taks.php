<?php

$crons = shell_exec('cat crontab-temp');

$cronLines = explode("\n", $crons);

$crons = [];

foreach ($cronLines as $cronLine) {
   preg_match('/([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) ([^ ]+) (.+)/', $cronLine, $matches);
   if(isset($matches[6])){
     $crons[] = [
       "minute" => $matches[1],
       "hour" => $matches[2],
       "day" => $matches[3],
       "month" => $matches[4],
       "weekDay" => $matches[5],
       "task" => $matches[6],
     ];
   }
}

$json = json_encode([
  "crons" => $crons
]);

header('Content-type: application/json; charset=UTF-8');
echo $json;
