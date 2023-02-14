<?php
    $title = 'Collections - Foodian';
    include './includes/header.php';
  ?>
  <!-- Header -->
  <header class="bg-header h-96 bg-opacity-50">
    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>
    <div class="container mx-auto p-6 flex items-center flex-1">
      <h1 class="text-4xl font-medium md:text-7xl">All Collections</h1>
    </div>
  </header>
  <!-- Collections -->
  <section class="collections">
    <div class="container mx-auto p-6">

      <!-- Grid Foods -->
      <div class="my-10 grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
        <!-- Food Card Item -->
        <div class="">
          <a href="#"><img src="./img/SalmonWithLemon.webp" alt="product"></a>
          <div class="p-6 flex flex-col items-center">
            <a href="#"><h1 class="text-4xl text-center hover:text-mainColor transition-colors w-fit">Best Sellers</h1></a>
            <h3 class="text-mainColor text-xl font-semibold my-6 text-center">3 items</h3>
            <a href="#" class="bg-mainColor text-white py-3 px-10 hover:bg-secondary transition-colors">Shop Now</a>
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