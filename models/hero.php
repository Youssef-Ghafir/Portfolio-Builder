<?php
class Hero
{
    private $name;
    private $profession_title;
    private $passion;
    private $image;
    private $user_id;
    public function __construct($name = "empty", $profession_title = "empty", $passion = "empty", $image = "empty", $user_id = "empty")
    {
        $this->name = $name;
        $this->profession_title = $profession_title;
        $this->passion = $passion;
        $this->image = $image;
        $this->user_id = $user_id;
    }
    public function getHero($conn, $email)
    {
        $sql = $conn->prepare("SELECT * FROM hero_section WHERE user_id = ?");
        if ($sql === false) {
            return false;
            exit;
        }
        $sql->bind_param("s", $email);
        $sql->execute();
        $data = $sql->get_result()->fetch_assoc();
        return $data;
    }
    public function getById($conn, $id)
    {
        $sql = $conn->prepare("SELECT * FROM hero_section WHERE user_id = ?");
        if ($sql === false) {
            return false;
            exit;
        }
        $sql->bind_param("s", $id);
        $sql->execute();
        $data = $sql->get_result()->fetch_assoc();
        return $data;
    }
    public function addHero($conn, $file_uploaded, $newFileName)
    {
        $sql = $conn->prepare("INSERT INTO hero_section (img_url, name, professional_title, passion, user_id) VALUES (?, ?, ?, ?, ?)");
        if ($sql === false) {
            echo json_encode(["msg" => "Error preparing SQL query", "error" => $conn->error]);
            exit;
        };
        if ($file_uploaded) {
            $name_file = "uploads/" . $newFileName;
            $sql->bind_param("sssss", $name_file, $this->name, $this->profession_title, $this->passion, $this->user_id);
        } else {
            $sql = $conn->prepare("INSERT INTO hero_section ( name, professional_title, passion, user_id) VALUES (?, ?, ?, ?, ?)");
            $sql->bind_param("ssss", $this->name, $this->profession_title, $this->passion, $this->user_id);
        }
        $sql->execute();
        if ($sql) {
            return true;
        };
        return false;
    }
    public function updateHero($conn, $file_uploaded, $newFileName)
    {
        $sql = $conn->prepare("UPDATE hero_section SET img_url = ?, name = ?, professional_title = ?,passion = ? WHERE user_id = ?");
        if ($sql === false) {
            echo json_encode(["msg" => "Error preparing SQL query", "error" => $conn->error]);
            exit;
        };
        if ($file_uploaded) {
            $name_file = "uploads/" . $newFileName;
            $sql->bind_param("sssss", $name_file, $this->name, $this->profession_title, $this->passion, $this->user_id);
        } else {
            $sql = $conn->prepare("UPDATE hero_section SET name = ?, professional_title = ?,passion = ? WHERE user_id = ?");
            $sql->bind_param("ssss", $this->name, $this->profession_title, $this->passion, $this->user_id);
        }
        $sql->execute();
        if ($sql) {
            return true;
        };
        return false;
    }
};
