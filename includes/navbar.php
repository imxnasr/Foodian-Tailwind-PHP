<nav>
  <!-- Search Box -->
  <div class="search-box absolute bg-white z-10 w-full h-24 -top-24">
    <form action="./products.php" method="GET" class="container flex items-end justify-between mx-auto h-full p-6">
      <input class="border-b-2 flex-1 focus:outline-none focus:border-mainColor p-2" type="text" name="search" placeholder="Search" />
      <button class="close-search-box ml-5 text-xl" type="button"><i class="fa-solid fa-xmark text-[#999]"></i></button>
    </form>
  </div>
  <!-- Container of Main Nav -->
  <div class="container mx-auto p-6 flex items-center justify-between">
    <!-- Left Side Nav -->
    <a href="/" class="mr-14"><img src="./img/logo.webp" alt="Logo"></a>
    <!-- Right Side Nav - Search & Links-->
    <div class="flex flex-grow-0 md:flex-1 items-start justify-end md:justify-between">
      <!-- Links -->
      <i class="fa-solid fa-bars block md:hidden mr-5 cursor-pointer"></i>
      <ul class="nav-links gap-4 hidden md:flex text-lg">
        <li><a href="/">Home</a></li>
        <li><a href="./collections.php">Recipe</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Faq</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <!-- Search Button -->
      <div class="search-btn flex items-center gap-3 hover:text-mainColor cursor-pointer transition-colors">
        <p class="text-lg hidden md:block">Search</p>
        <i class="fa-solid fa-magnifying-glass"></i>
      </div>
    </div>
    <!-- Mobile Navbar -->
    <div class="mobile-nav-container fixed w-full h-full hidden md:hidden left-0 top-0 z-10">
      <!-- Navbar Overlay -->
      <div class="mobile-nav-overlay w-full h-full bg-black bg-opacity-50"></div>
      <!-- Mobile Links Container -->
      <div class="mobile-nav fixed bg-white grid place-items-center h-full w-60 -right-0 top-0 transition-all">
        <ul class="gap-10 flex text-xl flex-col items-center">
          <li><a href="/">Home</a></li>
          <li><a href="./collections.php">Recipe</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Faq</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>