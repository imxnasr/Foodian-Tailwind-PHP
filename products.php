  <?php
    $title = 'Products - Foodian';
    include './includes/header.php';
  ?>
  <!-- Header -->
  <header class="bg-header h-96 bg-opacity-50">
    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>
    <div class="container mx-auto p-6 flex items-center flex-1">
      <h1 class="text-4xl font-medium md:text-7xl">All Products</h1>
    </div>
  </header>
  <!-- All Foods -->
  <section class="foods">
    <div class="container mx-auto p-6">
      <!-- Grid Foods -->
      <div class="my-10 grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        
        <!-- Food Card Item -->
        <div class="shadow-xl">
          <a href="#"><img src="./img/SalmonWithLemon.webp" alt="product"></a>
          <div class="p-6">
            <a href="#"><h1 class="text-4xl">Salmon With Lemon</h1></a>
            <h3 class="text-mainColor text-xl font-semibold my-3">$450.00</h3>
            <p class="my-3">Bam tempus turpis at metus scelerisque placerat nulla deumantos solicitud...</p>
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