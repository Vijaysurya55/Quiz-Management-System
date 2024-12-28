<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackData = $_POST;
    $file = 'feedback.json';
    $currentData = file_get_contents($file);
    $dataArray = json_decode($currentData, true);
    $dataArray[] = $feedbackData;
    file_put_contents($file, json_encode($dataArray));
    echo json_encode(['success' => true]);
    exit;
}

$file = 'feedback.json';
$currentData = file_get_contents($file);
$feedbackData = json_decode($currentData, true);
header('Content-Type: application/json');
echo json_encode($feedbackData);
exit;
?>
