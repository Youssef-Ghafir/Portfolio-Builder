<?php
session_start();
header("Content-Type: application/json");
$input = json_decode(file_get_contents('php://input'), true);
if (isset($_SESSION["email"])) {
    require_once("../../lib/database.php");
    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $sql = $conn->prepare("SELECT * FROM hero_section WHERE user_id = ?");
        if ($sql === false) {
            echo json_encode(["msg" => "Error preparing SQL query", "error" => $conn->error]);
            exit;
        }
        $sql->bind_param("s", $_GET["email"]);
        $sql->execute();
        $data = $sql->get_result()->fetch_assoc();
        echo json_encode(["data" => $data]);
    } else if ($_SERVER["REQUEST_METHOD"] === "POST") {
        echo json_encode(["msg" => "Hello My Friend"]);
    } else {
        echo json_encode(["msg" => "Invalid Method"]);
    };
} else {
    echo json_encode(["msg" => "Unauthorized"]);
}
