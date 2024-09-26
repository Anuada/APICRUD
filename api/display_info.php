<?php

require_once "../util/DbHelper.php";

$db = new DbHelper();

header("Content-Type: application/json");

$data = $db->fetchRecords('info');

echo json_encode($data);
