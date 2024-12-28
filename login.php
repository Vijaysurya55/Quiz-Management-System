<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $valid_email = "vijay123@gmail.com";
        $valid_password = "123456";
        if ($email === $valid_email && $password === $valid_password) {
            echo "success";
            exit;
        } else {
            echo "failure";
            exit;
        }
    } else {
        echo "invalid";
        exit;
    }
} else {
    header("HTTP/1.1 403 Forbidden");
    exit;
}
?>
