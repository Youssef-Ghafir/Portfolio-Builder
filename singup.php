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
    <div class="lg:flex hidden bg-[url('http://localhost/portfolio-builder/asset/images/3d-image.webp')] bg-cover bg-no-repeat bg-center before:bg-black before:bg-opacity-50 before:absolute before:top-0 before:w-full before:h-full before:z-10 relative lg:flex-col lg:justify-end">
      <div class="px-7 relative z-20 pb-10">
        <h1 class="text-white text-5xl leading-normal font-medium">Create <br />Custom Portfolio</h1>
        <p class="text-stone-400 max-w-[400px]">Create a portfolio that truly reflects your skills, style, and story.</p>
      </div>
    </div>
    <div>
      <a
        href="/"
        class="font-semibold text-xl capitalize text-center py-5 block">YG Builder</a>
      <div class="max-w-[450px] w-full flex flex-col justify-center mx-auto items-center mt-10">
        <h1 class="text-4xl text-center font-medium">Hi! Welcome to <br />YG Builder &#128075</h1>
        <form class="mt-10">
          <div class="flex items-center mt-5 gap-x-4 mb-4">
            <div>
              <label for="fname" class="block mb-2 text-sm font-medium text-gray-900">First Name</label>
              <input type="text" id="fname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="John" name="fname" required />
            </div>
            <div>
              <label for="lname" class="block mb-2 text-sm font-medium text-gray-900">Last Name</label>
              <input type="text" id="lname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 rounded-full" placeholder="Doe" name="fname" required />
            </div>
          </div>
          <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
            <input type="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="johndoe@gmail.com" name="email" required autocomplete="off" />
          </div>
          <div class="flex gap-x-4 items-center mb-5">
            <div class="">
              <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
              <input type="password" id="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="your password" name="password" required autocomplete="off" />
            </div>
            <div class="">
              <label for="c_password" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
              <input type="password" id="c_password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " placeholder="confirm password" name="c_password" required autocomplete="off" />
            </div>
          </div>
          <button type="submit" class="w-full py-3 text-sm mt-2 bg-green-400 text-white rounded-full">Sing up</button>
          <p class="text-center text-sm mt-4">Already have an account ! <a
              href="login.php"
              class="font-medium text-blue-600 dark:text-blue-500 underline cursor-pointer">Log in</a></p>
        </form>
      </div>
    </div>
  </div>
</body>

</html>