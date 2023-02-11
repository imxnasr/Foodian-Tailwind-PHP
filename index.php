  <?php
    $title = 'Foodian';
    include './includes/header.php';
  ?>
  <!-- Header -->
  <header class="h-screen">
    <!-- BG-Image -->
    <div class="w-full h-full overflow-hidden absolute -z-10">
      <img class="absolute scale-100 hover:scale-125 transition-transform h-full object-cover xl:h-auto" src="./img/homeBackground3.webp" alt="HomeBackground">
      <!-- Overlay -->
      <div class="absolute w-full h-full bg-mainColor bg-opacity-75 block md:hidden pointer-events-none"></div>
    </div>
    <!-- Navbar -->
    <?php include './includes/navbar.php'; ?>
  <div class="container mx-auto h-full p-6">
    <!-- Hero Title -->
    <div class="bg-transparent mt-48 max-w-2xl md:bg-bgGreen md:bg-opacity-50">
      <h1 class="text-7xl text-center md:text-9xl md:text-left font-light">Healthy Food</h1>
    </div>
    <!-- Shop Now Button -->
    <div class="grid place-items-center md:place-content-start">
      <button class="header-btn bg-transparent py-2 px-4 mt-8 mx-auto">
        <a href="./products.php">Shop Now</a>
      </button>
    </div>
  </div>
  </header>
  <!-- Best Selling Foods -->
  <section class="foods">
    <div class="container mx-auto p-6">

      <h1 class="text-center text-4xl">Best Selling Foods</h1>
      <p class="text-center my-5">Dictumst vestibulum rhoncus est pellentesque malesuada bibendum arcu vitae elementum curabitur vitae nunc.</p>
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
      <!-- View All Button -->
      <div class="grid place-items-center">
        <a href="./products.php">
          <button class="text-center bg-transparent mb-3 py-3 px-5 transition-shadow shadow-md hover:shadow-lg">View All</button>
        </a>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <?php include './includes/footer.php'; ?>
  <!-- To Top Button -->
  <?php include './includes/toTopButton.php'; ?>
  <?php include './includes/bottom.php'; ?>