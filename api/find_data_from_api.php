<?php

require_once '../util/db.api.php';

header("Content-Type: application/json");

if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
    http_response_code(422);
    echo json_encode(['message' => 'Data id is required']);
    exit();
}

$id = $_GET['id'];

$findEmployee = [];

foreach ($employees as $e) {
    if ($e['number'] == $id) {
        $findEmployee = $e;
    }
}

if (empty($findEmployee)) {
    http_response_code(404);
    echo json_encode(['message' => 'employee not found']);
    exit();
} else {
    http_response_code(200);
    $employeeInfo = [
        'fname' => $findEmployee['firstname'],
        'lname' => $findEmployee['lastname'],
        'age' => $findEmployee['age']
    ];
    echo json_encode($employeeInfo);
    exit();
}