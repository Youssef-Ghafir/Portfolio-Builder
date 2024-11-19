<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("location:/portfolio-builder");
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../asset/style/fontawesome.min.css" />
    <link rel="stylesheet" href="../asset/style/output.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-gray-100">
    <input type="hidden" name="email_user" id="email_user" value="<?= $_SESSION["email"] ?>">
    <?php include_once "lib/loading.html"; ?>
    <div class="container">
        <?php include_once "navbar.php"; ?>
        <div class="container mt-10 bg-white rounded-lg p-4">
            <?php
            $_GET["page"] = isset($_GET["page"]) ? $_GET["page"] : "home";
            switch ($_GET["page"]) {
                case "home":
                    include_once "lib/home.php";
                    break;
                case "works":
                    include_once "lib/works.php";
                    break;
                case "contact":
                    include_once "lib/contact.php";
                    break;
            }
            ?>
        </div>
    </div>

</body>

</html>