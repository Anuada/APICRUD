<?php

include "../util/db.api.php";
require_once "../enums/types.php";


$db = new DbHelper();
$types = Type::all();

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['message' => 'Method Not Allowed']);
    exit();
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$input_data_from_computer = ['type', 'fname', 'lname', 'age'];

$data_from_api = ['type', 'employee_id', 'division', 'age'];

$Info_from_api = ['fname', 'lname'];

$errorMessages = [];
$fieldInput = [];

if (!isset($data['type']) || empty(trim($data['type']))) {
    http_response_code(422);
    $errorMessages['type'] = 'select a data type Info';
    echo json_encode(['message' => $errorMessages]);
    exit();
}

if (!in_array($data['type'], $types)) {
    http_response_code(422);
    $errorMessages['type'] = 'invalid type';
    echo json_encode(['message' => $errorMessages]);
    exit();
}

if ($data['type'] == 'data_from_api') {
    foreach ($data_from_api as $e) {
        if (!isset($data[$e]) || empty(trim($data[$e]))) {
            $var = str_replace('_', ' ', $e);
            $errorMessages[$e] = "$var is required";
        } else {
            $fieldInput[$e] = $data[$e];
        }
    }

    if (!empty($errorMessages)) {
        http_response_code(422);
        echo json_encode(['message' => $errorMessages]);
        exit();
    }

    require_once '../util/db.api.php';
    $findEmployee = [];
    foreach ($employees as $e) {
        if ($e['number'] == $fieldInput['api_id']) {
            $findEmployee = $e;
        }
    }

    if (empty($findEmployee)) {
        $errorMessages['api_id'] = 'Api information not found';
        http_response_code(422);
        echo json_encode(['message' => $errorMessages]);
        exit();
    }

    foreach ($Info_from_api as $e) {
        if (!isset($data[$e]) || empty(trim($data[$e]))) {
            $var = str_replace('_', ' ', $e);
            $errorMessages[$e] = "$var is required";
        } else {
            $fieldInput[$e] = $data[$e];
        }
    }

    if (!empty($errorMessages)) {
        http_response_code(422);
        echo json_encode(['message' => $errorMessages]);
        exit();
    }

    $employeeLogged = $db->addRecord('info', $fieldInput);
    if ($employeeLogged > 0) {
        http_response_code(200);
        echo json_encode(['message' => 'Employee Logged Successfully']);
        exit();
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Error Logging Employee']);
        exit();
    }
} elseif ($data['type'] == 'Visitor') {
    foreach ($visitor as $v) {
        if (!isset($data[$v]) || empty(trim($data[$v]))) {
            $errorMessages[$v] = "$v is required";
        } else {
            $fieldInput[$v] = $data[$v];
        }
    }

    if (!empty($errorMessages)) {
        http_response_code(422);
        echo json_encode(['message' => $errorMessages]);
        exit();
    }



    $visitorLogged = $db->addRecord('info', $fieldInput);
    if ($visitorLogged > 0) {
        http_response_code(200);
        echo json_encode(['message' => 'Visitor Logged Successfully']);
        exit();
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Error Logging Visitor']);
        exit();
    }
}
