<?php

require_once "../util/DbHelper.php";

$db = new DbHelper();

header("Content-Type: application/json");

if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
    http_response_code(401);
    echo json_encode('Fill out the `id` param');
    exit();
}

$id = $_GET['id'];

$findData = $db->fetchRecords('info', ['id' => $id]);

if (empty($findData)) {
    http_response_code(404);
    echo json_encode('Data not found');
    exit();
}

http_response_code(200);
echo json_encode($findData);
