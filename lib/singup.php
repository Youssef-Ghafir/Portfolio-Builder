<?php
$errors = [];
$values = ['fname' => "", "lname" => "", "email" => ""];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $f_name = $_POST['fname'];
    $l_name = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    foreach ($values as $key => $v) {
        $values[$key] = $_POST[$key];
    };
    $pattern_name = "/^\w{3,20}$/i";
    $pattern_email = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (!preg_match($pattern_name, $f_name)) {
        $errors['f_name'] = "Invalid first name";
    };
    if (!preg_match($pattern_name, $l_name)) {
        $errors['l_name'] = "Invalid last name";
    };
    if (!preg_match($pattern_email, $email)) {
        $errors['email'] = "Invalid last email";
    };
    if (!preg_match($pattern_name, $password)) {
        $errors['password'] = "Invalid Password";
    };
    if ($password !== $c_password) {
        $errors['c_password'] = "Unmatch Password !";
    };
    if (count($errors) == 0) {
        header("location:login.php");
    };
}
