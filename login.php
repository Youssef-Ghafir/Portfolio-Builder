<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location:/portfolio-builder");
    exit;
}
include_once "lib/login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="asset/style/output.css" />
    <title>Document</title>
</head>

<body>
    <div class="px-4 lg:px-0 lg:grid lg:grid-cols-[50%_50%] min-h-screen">
        <div class="lg:flex hidden bg-[url('http://localhost/portfolio-builder/asset/images/img_2.avif')] bg-cover bg-no-repeat bg-center before:bg-black before:bg-opacity-50 before:absolute before:top-0 before:w-full before:h-full before:z-10 relative lg:flex-col lg:justify-end">
            <div class="px-7 relative z-20 pb-10">
                <h1 class="text-white text-5xl leading-normal font-medium">Create <br />Custom Portfolio</h1>
                <p class="text-stone-400 max-w-[400px]">Create a portfolio that truly reflects your skills, style, and story.</p>
            </div>
        </div>
        <div>
            <a
                href="/"
                class="font-semibold text-xl capitalize text-center py-5 block">YG Builder</a>
            <div class="max-w-[450px] w-full flex flex-col justify-center mx-auto  mt-10">
                <h1 class="text-4xl text-center font-medium">Hi! Welcome to <br />YG Builder &#128075</h1>
                <form class="mt-10" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Error !</span> <?php echo $errors['error'] ?>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                        <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="johndoe@gmail.com" name="email" required
                            value="<?php echo !empty($values["email"]) ? $values["email"] : ''; ?>"
                            autocomplete="off" />
                        <?php echo isset($errors["email"]) ? "<p class=' text-red-500 text-sm px-3 py-1'> " . $errors["email"] . "</p>" : ''; ?>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="your password" name="password" required autocomplete="off" />
                        <?php echo isset($errors["password"]) ? "<p class=' text-red-500 text-sm px-3 py-1'> " . $errors["password"] . "</p>" : ''; ?>
                    </div>
                    <button type="submit" class="w-full py-3 text-sm mt-2 bg-green-400 text-white rounded-full">Login</button>
                    <p class="text-center text-sm mt-4">You dont have Account ! <a
                            href="singup.php"
                            class="font-medium text-blue-600 dark:text-blue-500 underline cursor-pointer">Sign in</a></p>
                </form>
            </div>
        </div>
    </div>
</body>

</html>