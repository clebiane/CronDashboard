<?php
// Get task
// /api/show-task.php

require_once('util.php');

header('Content-type: application/json; charset=UTF-8');
echo json_encode(["crons" => getTasks()]);
