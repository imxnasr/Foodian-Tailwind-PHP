<?php
  $title = 'Product - Foodian';
  include './includes/header.php';
?>
  <!-- Header -->
  <header class="bg-header h-96 bg-opacity-50">
    <!-- Navbar -->
   <?php include './includes/navbar.php' ?>
    <div class="container mx-auto p-6 flex items-center flex-1">
      <h1 class="text-4xl font-medium md:text-6xl">Product / Salmon With Lemon</h1>
    </div>
  </header>
  <!-- Food Info -->
  <section class="info">
    <!-- Container -->
    <div class="container mx-auto p-6 flex flex-col md:flex-row gap-6">
      <!-- Left Side -->
      <div class="flex-1">
        <!-- Image Container -->
        <div class="img-container sticky top-4 w-full aspect-square">
          <img src="./img/SalmonWithLemon.webp" alt="">
        </div>
      </div>
      <!-- Right Side -->
      <div class="flex-1 flex flex-col gap-6">
        <!-- Product Name -->
        <h1 class="font-semibold text-4xl">Salmon With Lemon</h1>
        <!-- Product Price -->
        <h3 class="product-price text-mainColor font-semibold text-2xl">$450.00</h3>
        <!-- Product Rating -->
        <div class="flex text-mainColor">
          <i class="fa-solid fa-star"></i>
          <i class="fa-regular fa-star-half-stroke"></i>
          <i class="fa-regular fa-star"></i>
        </div>
        <!-- Product Availability -->
        <div class="flex gap-6 items-center">
          <h2 class="text-xl font-medium">Availability:</h2>
          <h2 class="text-xl font-medium text-mainColor"><span class="in-stock">20</span> in stock</h2>
        </div>
        <!-- Product Quantity -->
        <div class="flex gap-6 items-center">
          <h2 class="text-xl font-medium">Quantity:</h2>
          <div class="flex text-xl font-medium border-[1px]">
            <button class="remove-qty grid place-items-center border-[1px] w-10 h-10 cursor-pointer">
              <i class="fa-solid fa-minus pointer-events-none"></i>
            </button>
            <div class="grid place-items-center border-[1px] w-10 h-10">1</div>
            <button class="add-qty grid place-items-center border-[1px] w-10 h-10 cursor-pointer">
              <i class="fa-solid fa-plus pointer-events-none"></i>
            </button>
          </div>
        </div>
        <!-- Product Total -->
        <div class="flex gap-6 items-center">
          <h2 class="text-xl font-medium">Total:</h2>
          <h2 class="total-price text-xl font-semibold">$450.00</h2>
        </div>
        <!-- Product Actions -->
        <div class="grid grid-cols-2 gap-6 text-white xl:w-1/2">
          <button class="bg-mainColor py-3 w-full">Add to Cart</button>
          <button class="bg-mainColor py-3 w-full">Add to Wishlist</button>
          <button class="bg-secondary py-3 w-full col-span-2">Buy it Now</button>
        </div>

        <!-- Product Description -->
        <h2 class="text-2xl font-medium">Description:</h2>
        <p>


Scelerisque nam tempus turpis at metus  placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo pharetras loremos.Donec pretium egestas sapien et mollis.

Lorem ipsum dolor sit amet

Sonsectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.

Busey ipsum dolor sit amet

Tortor at auctor urna nunc id cursus metus aliquam. Odio tempor orci dapibus ultrices. Tortor condimentum lacinia quis vel eros donec ac odio. Velit euismod in pellentesque massa placerat duis ultricies lacus. Scelerisque purus semper eget duis at tellus at urna condimentum. Eu facilisis sed odio morbi quis commodo odio aenean urpis massa sed elemen. 

Vestibulum sit amet ipsum

Praesent vestibulum congue tellus at fringilla. Curabitur vitae semper sem, eu convallis est. Cras felis nunc commodo eu convallis vitae interdum non nisl. Maecenas ac est sit amet augue pharetra convallis nec danos dui. Cras suscipit quam et turpis eleifend vitae malesuada magna congue. Damus id ullamcorper neque. Sed vitae mi a mi pretium aliquet ac sed elit. Pellentesque nulla eros accumsan quis justo at tincidunt lobortis denimes loremous. Suspendisse vestibulum lectus in lectus volutpat, ut dapibus purus pulvinar. Vestibulum sit amet auctor ipsum.

        </p>
      </div>
    </div>
  </section>
  <!-- Best Selling Foods -->
  <section class="foods mt-16">
    <div class="container mx-auto p-6">
      <h1 class="text-center text-4xl font-semibold">Recommended Products</h1>
      <!-- Grid Foods -->
      <div class="my-10 grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        <!-- Food Card Item -->
        <div class="shadow-xl">
          <a href="#"><img src="./img/SalmonWithLemon.webp" alt="product"></a>
          <div class="p-6">
            <a href="#"><h1 class="text-4xl">Salmon With Lemon</h1></a>
            <h3 class="text-mainColor text-xl font-semibold my-3">$450.00</h3>
            <!-- Rating Stars -->
            <div class="flex text-mainColor">
              <i class="fa-solid fa-star"></i>
              <i class="fa-regular fa-star"></i>
              <i class="fa-regular fa-star-half-stroke"></i>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Footer -->
  <?php include './includes/footer.php'; ?>
  <!-- To Top Button -->
  <?php include './includes/toTopButton.php'; ?>
  <?php include './includes/bottom.php'; ?>