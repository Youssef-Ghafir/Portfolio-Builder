<?php
session_start();
header("Content-Type: application/json");
$input = json_decode(file_get_contents('php://input'), true);
if (isset($_SESSION["email"])) {
    require_once("../../lib/database.php");
    require_once("../../models/hero.php");
    $conn = new Connect();
    $conn = $conn->conn;
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $hero_section = new Hero();
        $hero = $hero_section->getHero($conn, $_GET["email"]);
        echo json_encode($hero);
    } else if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $file_uploaded = false;
        $newFileName = "";
        if (isset($_FILES['avatar'])) {
            $uploadDir = dirname(__DIR__, 2) . "/uploads/"; // Ensure this directory exists and is writable
            $fileTmpPath = $_FILES['avatar']['tmp_name'];
            $fileName = basename($_FILES['avatar']['name']);
            $fileSize = $_FILES['avatar']['size'];
            $fileType = $_FILES['avatar']['type'];
            // Validate file size (e.g., max 5MB)
            if ($fileSize > 5 * 1024 * 1024) {
                echo json_encode(['success' => false, 'message' => 'File size exceeds the limit of 5MB.']);
                exit;
            }
            // Validate file type (e.g., only images)
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($fileType, $allowedTypes)) {
                echo json_encode(['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, and GIF are allowed.']);
                exit;
            }
            // Generate a unique file name to prevent overwriting
            $newFileName = uniqid() . '_' . $fileName;
            $destination = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destination)) {
                $file_uploaded = true;
            };
        }
        $name = $_POST["name"];
        $title = $_POST["title"];
        $passion = $_POST["passion"];
        $email = $_POST["email"];
        $hero_section = new Hero($name, $title, $passion, $newFileName, $email);
        $exec = null;
        if ($hero_section->getById($conn, $_POST["email"])) {
            $exec = $hero_section->updateHero($conn, $file_uploaded, $newFileName);
        } else {
            $exec = $hero_section->addHero($conn, $file_uploaded, $newFileName);
        }
        if ($exec) {
            echo json_encode(["msg" => "done"]);
        } else {
            echo json_encode(["msg" => "Error preparing SQL query", "error" => $conn->error]);
        };
    };
} else {
    echo json_encode(["msg" => "Unauthorized"]);
}
