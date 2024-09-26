<?php

require_once "../util/DbHelper.php";

// Initialize the DbHelper
$db = new DbHelper();

// Set the response header for JSON content
header("Content-Type: application/json");

// Fetch input data from the request body
$inputData = json_decode(file_get_contents("php://input"), true);

// Check if the necessary fields are present
if (isset($inputData['id'])) {
    
    // Prepare the data to be updated
    $delete = [
        'id' => $inputData['id'],
       
    ];
    
    
    // Execute the update query using DbHelper
    $result = $db->deleteRecord('info', $delete);

    // Check if the update was successful
    if ($result) {
        http_response_code(200);
        echo json_encode(["message" => "Record deleted successfully"]);
    } else {
        http_response_code(422);
        echo json_encode(["error" => "Error deleting record"]);
    }
    
} else {
    // Return an error if required data is missing
    http_response_code(422);
    echo json_encode(["error" => "Invalid input data"]);
}


