<?php

require_once "../util/DbHelper.php";

$db = new DbHelper();

header("Content-Type: application/json");

// Ensure we are handling a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Only POST requests are allowed']);
    exit();
}

// Decode the incoming JSON request body
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
if (
    !isset($data['fname']) || empty(trim($data['fname'])) ||
    !isset($data['lname']) || empty(trim($data['lname'])) ||
    !isset($data['age']) || !is_numeric($data['age'])
) {
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Please provide valid fname, lname (only letters), and age']);
    exit();
} else {
    if (!ctype_alpha(trim($data['fname'])) || !ctype_alpha(trim($data['lname']))) {
        http_response_code(403); // Forbidden
        echo json_encode(['error' => 'Please provide valid fname, lname (only letters)']);
        exit();
    }
}






// Sanitize inputs
$fname = trim($data['fname']);
$lname = trim($data['lname']);
$age = (int) $data['age'];


// Insert the new record into the database
$insertData = [
    'fname' => $fname,
    'lname' => $lname,
    'age' => $age
];

$existingRecord = $db->getRecordByNameAndAge($fname, $lname, $age); // Implement this method in DbHelper

if ($existingRecord) {
    http_response_code(409); // Conflict
    echo json_encode(['error' => 'Data already exists']);
    exit();
}

$result = $db->addRecord('info', $insertData);

if ($result) {
    http_response_code(201); // Created
    echo json_encode(['message' => 'Data successfully inserted']);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Failed to insert data']);
}
