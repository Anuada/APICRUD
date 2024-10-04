<?php

require_once "../util/DbHelper.php";
$db = new DbHelper();
header("Content-Type: application/json");

// Get the input data and decode it
$inputData = json_decode(file_get_contents("php://input"), true);

// Validate input data
if (isset($inputData['id']) && isset($inputData['status'])) {
    $id = intval($inputData['id']); 
    $status = $inputData['status']; 

    // Prepare the update data
    $updateData = [
        'id' => $id,
        'status' => $status,
    ];
    
   // Attempt to update the record
    $result = $db->updateRecord('info', $updateData,);
    
    // Check if the update was successful
    if ($result) {
        echo json_encode(["message" => "Record updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating record"]);
    }
} else {
    // Respond with an error if input data is invalid
    echo json_encode(["error" => "Invalid input data"]);
}

?>
