<?php

require_once "../util/DbHelper.php";

// Initialize the DbHelper
$db = new DbHelper();

// Set the response header for JSON content
header("Content-Type: application/json");

// Fetch input data from the request body
$inputData = json_decode(file_get_contents("php://input"), true);

// Check if the necessary fields are present
if (isset($inputData['id']) && isset($inputData['fname']) && isset($inputData['lname']) && isset($inputData['age'])) {
    
    // Prepare the data to be updated
    $updateData = [
        'id' => $inputData['id'],
        'fname' => $inputData['fname'],
        'lname' => $inputData['lname'],
        'age' => $inputData['age']
    ];
    
    
    // Execute the update query using DbHelper
    $result = $db->updateRecord('info', $updateData);

    // Check if the update was successful
    if ($result) {
        echo json_encode(["message" => "Record updated successfully"]);
    } else {
        echo json_encode(["error" => "Error updating record"]);
    }
    
} else {
    // Return an error if required data is missing
    echo json_encode(["error" => "Invalid input data"]);
}

?>
