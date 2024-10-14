<?php

$url = 'https://randomuser.me/api/';

header("Content-Type: application/json");

try {
    $response = file_get_contents($url);

    if ($response === FALSE) {
        throw new Exception('Error fetching data from API.');
    }

    $data = json_decode($response, true);

    echo json_encode($data, JSON_PRETTY_PRINT);

} catch (Exception $e) {
    $error = [
        'error' => true,
        'message' => $e->getMessage()
    ];
    echo json_encode($error);
}
