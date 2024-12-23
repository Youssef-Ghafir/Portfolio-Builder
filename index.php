<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="asset/style/output.css" />
  <title>YG Builder</title>
</head>

<body>
  <nav class="container h-[70px] flex items-center justify-between">
    <a href="/" class="font-semibold text-xl capitalize">YG Builder</a>
    <div class="flex items-center gap-x-4">
      <?php
      if (!isset($_SESSION['email'])) {
      ?>
        <a
          href="singup.php"
          class="px-7 py-3 bg-green-800 text-white rounded-full text-sm transition-colors duration-300 ease-in-out hover:bg-green-600">
          Log in
        </a>
      <?php } else {; ?>
        <div class="relative">
          <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer" src="asset/images/user.png" alt="User dropdown">

          <!-- Dropdown menu -->
          <div id="userDropdown" class="hidden z-10 absolute top-full right-full bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
            <div class="px-4 py-3 text-sm text-gray-900 ">
              <div><?php $beforeAt = explode('@', $_SESSION["email"])[0];
                    echo $beforeAt; ?></div>
              <div class="font-medium truncate"><?php echo $_SESSION["email"] ?></div>
            </div>
            <ul class="py-2 text-sm text-gray-700 " aria-labelledby="avatarButton">
              <li>
                <a href="dash.php" class="block px-4 py-2 hover:bg-gray-100 ">Dashboard</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Settings</a>
              </li>
            </ul>
            <form action="lib/signout.php">
              <div class="py-1">
                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Sign out</button>
              </div>
            </form>
          </div>
        </div>
      <?php }; ?>
    </div>
  </nav>
  <div
    class="container lg:grid lg:grid-cols-2 items-center lg:h-[calc(100vh-70px)] flex flex-col-reverse py-5">
    <div>
      <h1
        class="lg:text-5xl text-3xl capitalize leading-normal font-semibold">
        Build a portfolio that <br />lets your skills and achievements shine
      </h1>
      <p class="text-slate-600 text-sm mt-4">
        Highlight your experience and expertise with a portfolio designed just
        for you.
      </p>
      <div class="flex items-center gap-x-4 mt-5">
        <button
          class="px-7 py-3 bg-orange-500 text-white rounded-full text-sm transition-colors duration-300 ease-in-out hover:bg-orange-600">
          Get Started
        </button>
        <button
          class="px-7 py-3 border-2 text-slate-700 border-slate-600 rounded-full text-sm transition-colors duration-300 ease-in-out hover:bg-slate-200">
          Learn More
        </button>
      </div>
    </div>
    <img
      src="asset/images/hero_image.png"
      alt="Hero Image"
      class="max-w-[450px] w-full" />
  </div>
  <footer class="py-5 text-center bg-slate-900 text-white">
    <p class="text-sm">
      This Website is Created By
      <a
        href="https://yg-20.netlify.app/"
        class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer">YG</a>
    </p>
  </footer>
  <script>
    const userDropdown = document.getElementById('userDropdown');
    const avatarButton = document.getElementById('avatarButton');
    avatarButton.addEventListener('click', () => {
      userDropdown.classList.toggle('hidden');
    });
  </script>
</body>

</html>