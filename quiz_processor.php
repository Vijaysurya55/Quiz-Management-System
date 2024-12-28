<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quizName = $_POST['quizName'];
    $hostName = $_POST['hostName']; 
    $questions = $_POST['questions'];
    $correctAnswers = $_POST['correctAnswers'];
    $options = $_POST['options'];

    if (!empty($quizName) && !empty($hostName) && !empty($questions) && !empty($options) && !empty($correctAnswers)) {
        
        ob_start(); 

        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Quiz Result</title>";
        echo "<style>";
        echo "body { font-family: Arial, sans-serif; background-color: #f7f7f7; margin: 0; padding: 0; }";
        echo "h2 { color: #333; text-align: center; }";
        echo "h3 { color: #555; margin-top: 20px; }";
        echo ".options-list { margin-bottom: 20px; }";
        echo "label { cursor: pointer; display: block; margin-bottom: 10px; }";
        echo "input[type='radio'] { margin-right: 5px; }";
        echo "input[type='submit'] { background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 20px auto; }";
        echo ".container { max-width: 600px; margin: 0 auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        echo "<div class='container'>";
        echo "<h2>Quiz Name: $quizName</h2>";
        echo "<h3>Host Name: $hostName</h3>"; 
        echo "<form id='quizForm'>";
        foreach ($questions as $index => $question) {
            $questionID = "question_$index";
            echo "<h3 id='$questionID'>Question " . ($index + 1) . ": $question</h3>";
            echo "<div class='options-list'>";
            $optionsArray = explode(",", $options[$index]);
            foreach ($optionsArray as $optionIndex => $option) {
                $optionID = "answer_$index" . "_$optionIndex";
                echo "<label for='$optionID'><input type='radio' id='$optionID' name='question_$index' value='$option'>$option</label>";
            }
            echo "</div>";
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";

        echo "</div>"; 
        echo "<script>";
        echo "document.getElementById('quizForm').addEventListener('submit', function(event) {";
        echo "event.preventDefault();";
        echo "var form = this;";
        echo "var formData = new FormData(form);";
        echo "formData.append('options', JSON.stringify(" . json_encode($options) . "));";
        echo "var xhr = new XMLHttpRequest();";
        echo "xhr.open('POST', 'score.php', true);";
        echo "xhr.onload = function() {";
        echo "if (xhr.status === 200) {";
        echo "alert('Your score: ' + xhr.responseText);";
        echo "}";
        echo "};";
        echo "xhr.send(formData);";
        echo " });";
        echo "</script>";
        echo "</body>";
        echo "</html>";

        $content = ob_get_clean(); 

        $timestamp = time(); 
        $filename = preg_replace('/\s+/', '_', $quizName); 
        $filename = strtolower($filename);
        $filename .= "_by_" . strtolower(str_replace(' ', '_', $hostName)); 
        $filename .= "_quiz_$timestamp.html";

        $directory = 'C:/xampp/htdocs/Lab-9/quiz_files/';
        $filepath = $directory . $filename;

        file_put_contents($filepath, $content);

        exit();
    } else {
        echo "Error: Required fields are missing.";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    $quizList = array();

    $files = glob("quiz_files/*.html");

    foreach ($files as $file) {
        $quizNameWithHost = basename($file, ".html");
        $parts = explode("_by_", $quizNameWithHost);
        $quizName = ucwords(str_replace('_', ' ', $parts[0])); 
        $hostParts = explode("_", $parts[1]);
        $hostName = ucwords(str_replace('_', ' ', $hostParts[0]));
        $quizList[] = array("name" => "$quizName Quiz by $hostName", "link" => $file); 
    }

    echo json_encode($quizList);
    exit();
} else {
    header("Location: index.php");
    exit();
}

?>
