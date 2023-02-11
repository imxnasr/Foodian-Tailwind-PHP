  <?php
    $title = 'Cart - Foodian';
    include './includes/header.php';
  ?>
  <!-- Header -->
  <header class="bg-header h-96 bg-opacity-50">
    <!-- Navbar -->
    <?php include './includes/navbar.php'?>
    <div class="container mx-auto p-6 flex items-center flex-1">
      <h1 class="text-4xl font-medium md:text-7xl">Cart</h1>
    </div>
  </header>
  <!-- Cart -->
  <section class="cart">
    <div class="container mx-auto p-6 flex flex-col lg:flex-row gap-6">
      <!-- Left Side -->
      <div class="flex-grow-[8]">
        <!-- Title -->
        <h1 class="font-semibold text-2xl mb-5">Products</h1>
        <!-- Products Container -->
        <div class="flex flex-col lg:flex-row">

          <!-- Product Card Item -->
          <div class="flex gap-6 h-36 sm:h-44 md:h-52 mb-6 border-[1px] overflow-hidden w-full">
            <!-- Image -->
            <div class="img-container h-full aspect-square relative">
              <a href="#"><img class="h-full" src="./img/SalmonWithLemon.webp" alt=""></a>
              <!-- X Button -->
              <div class="absolute aspect-square bg-mainColor grid place-items-center text-white cursor-pointer top-2 left-2 sm:top-4 sm:left-4 w-6 sm:w-8"><i class="fa-solid fa-xmark"></i></div>
            </div>
            <!-- Info -->
            <div class="flex flex-col justify-between">
              <a href="#"><h1 class="text-lg md:text-2xl font-semibold w-fit">Salmon With Lemon</h1></a>
              <h3 class="text-lg">$450.00</h3>
              <h3 class="text-lg">250g</h3>
              <h1 class="text-md md:text-xl font-semibold">Total: $450.00</h1>
            </div>
          </div>
          
        </div>
      </div>
      <!-- Right Side -->
      <div class="flex-grow-[2]">
        <!-- Title -->
        <h1 class="font-semibold text-2xl mb-5">Order Summary</h1>
        <h2 class="text-mainColor font-semibold my-4">Subtotal: $1,101.00</h2>
        <p class="italic my-4">Shipping, taxes, and discounts will be calculated at checkout.</p>
        <!-- Checkout Button -->
        <a href="#">
          <button class="bg-mainColor text-white py-4 w-full my-3">Checkout</button>
        </a>
        <!-- Continue Shopping Button -->
        <a href="./products.php">
          <button class="bg-mainColor text-white py-4 w-full my-3">Continue Shopping</button>
        </a>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <?php include './includes/footer.php'; ?>
  <!-- To Top Button -->
  <?php include './includes/toTopButton.php'; ?>
  <?php include './includes/bottom.php'; ?>