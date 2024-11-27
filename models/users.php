<?php
class Users
{
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    public function __construct($first_name = "empty", $last_name = "empty", $email = "empty", $password = "empty")
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }
    public function add_user($conn)
    {
        $sql = $conn->prepare("INSERT INTO USERS (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssss", $this->first_name, $this->last_name, $this->email, $this->password);
        if ($sql->execute()) {
            return true;
        }
        return false;
    }
    public function getUserByEmail($conn, $email)
    {
        $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $result = $sql->get_result();
        return $result->fetch_assoc();
    }
}
