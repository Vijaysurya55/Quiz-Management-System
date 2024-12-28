<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get quiz details from POST data
    $quizName = $_POST['quizName'];
    $hostName = $_POST['hostName']; 
    $questions = $_POST['questions'];
    $correctAnswers = $_POST['correctAnswers'];
    $options = $_POST['options'];
    $score = 0;
    
        // Loop through each question
        foreach ($questions as $index => $question) {
            // Get the correct answer for the current question
            $correctAnswer = $_POST['correctAnswers'][$index];
    
            // Get the selected option by the user for the current question
            $selectedOption = $selectedOptions["question_$index"];
    
            // Compare the selected option with the correct answer
            if ($selectedOption === $correctAnswer) {
                $score++; // Increment score for each correct answer
            }
        }
    
        // Echo the score as the response
        echo $score;
    }
    ?> 