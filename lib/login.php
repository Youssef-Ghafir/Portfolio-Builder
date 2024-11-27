<?php
require_once "lib/database.php";
require_once "models/users.php";
$errors = [];
$values = ["email" => ""];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    foreach ($values as $key => $v) {
        $values[$key] = $_POST[$key];
    };
    $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (!preg_match($pattern_email, $email)) {
        $errors['email'] = "Invalid last email";
    };
    if (empty($password)) {
        $errors['password'] = "Invalid Password";
    };
    if (count($errors) == 0) {
        $conn = new Connect();
        $conn = $conn->conn;
        $user = new Users();
        $result = $user->getUserByEmail($conn, $values['email']);
        if (count($result) > 0) {
            if (password_verify($password, $result['password'])) {
                session_start();
                $_SESSION['email'] = $email;
                header("location:/portfolio-builder/dashboard");
            } else {
                $errors['error'] = "Incorrect Password !";
            }
        } else {
            $errors['error'] = "Incorrect Password or Email !";
        }
    };
}
