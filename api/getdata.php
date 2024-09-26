<?php

require_once "../util/DbHelper.php";

$db = new DbHelper();

header("Content-Type: application/json");

if (!isset($_GET["id"]) || empty(trim($_GET["id"]))) {
    http_response_code(400);
    echo json_encode("id parameter is required");
}
$id = intval($_GET["id"]);
$data = $db->fetchRecord('info', ['id' => $id]);

echo json_encode($data);
