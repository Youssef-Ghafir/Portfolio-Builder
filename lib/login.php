<?php
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
        session_start();
        $_SESSION['email'] = $email;
        header("location:/portfolio-builder");
    };
}
