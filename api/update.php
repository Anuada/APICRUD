<?php

require_once "../util/DbHelper.php";
$db = new DbHelper();
header("Content-Type: application/json");

$inputData = json_decode(file_get_contents("php://input"), true);

if (isset($inputData['id']) && isset($inputData['fname']) && isset($inputData['lname']) && isset($inputData['age'])) {
    
    $updateData = [
        'id' => $inputData['id'],
        'fname' => $inputData['fname'],
        'lname' => $inputData['lname'],
        'age' => $inputData['age']
    ];
    
    
    $result = $db->updateRecord('info', $updateData);

    if ($result) {
        echo json_encode(["message" => "Record updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating record"]);
    }
    
} else {

    echo json_encode(["error" => "Invalid input data"]);
}

?>
