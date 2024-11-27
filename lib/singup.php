<?php
require_once "lib/database.php";
require_once "models/users.php";
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
    if (strlen($password) <= 3) {
        $errors['password'] = "Invalid Password";
    };
    if ($password !== $c_password) {
        $errors['c_password'] = "Unmatch Password !";
    };
    if (count($errors) == 0) {
        $conn = new Connect();
        $conn = $conn->conn;
        $user = new Users($f_name, $l_name, $email, $password);
        $res = $user->add_user($conn);
        var_dump($res);
        if ($res) {
            header("location:login.php");
            exit;
        } else {
            $errors["error"] = "Something Wrong Happen ! or this email already exists !";
        }
    };
}
