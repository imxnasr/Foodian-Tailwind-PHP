<footer>
    <div class="container mx-auto p-6 border-t-2">
      <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-2">
        <!-- Logo -->
        <div class="grid place-items-center"><img src="./img/logo.webp" alt="logo"></div>
        <!-- Newsletter -->
        <div class="flex flex-2 flex-col md:flex-row my-4 lg:my-0 items-center justify-center lg:justify-between gap-2">
          <h1 class="text-4xl">Join US</h1>
          <!-- Input -->
          <form class="border-2 p-2 border-black flex justify-center items-center">
            <input type="text" name="newsletter" placeholder="Your email address" class="focus:outline-none" required />
            <button type="submit" class="cursor-pointer text-mainColor">
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </form>
        </div>
        <!-- Social Links -->
        <div class="flex flex-1 items-center justify-around mx-auto lg:col-span-2 xl:col-span-1 gap-2">
          <p class="text-lg">Follow US</p>
          <a href="#" class="bg-mainColor rounded-full w-7 h-7 grid place-items-center"><i class="fa-brands fa-facebook-f text-white"></i></a>
          <a href="#" class="bg-mainColor rounded-full w-7 h-7 grid place-items-center"><i class="fa-brands fa-instagram text-white"></i></a>
          <a href="#" class="bg-mainColor rounded-full w-7 h-7 grid place-items-center"><i class="fa-brands fa-linkedin-in text-white"></i></a>
        </div>
      </div>
      <!-- Footer Links -->
      <ul class="gap-4 flex flex-wrap text-lg items-center justify-center my-5">
        <li><a href="/">Home</a></li>
        <li><a href="./collections.php">Recipe</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Faq</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <!-- Copyright -->
    <div class="text-center bg-footer py-5">&copy; Copyright All rights reserved 2023 - <a href="https://www.twitter.com/itsimoox" target="_blank">IMX</a></div>
  </footer>