  <?php
    $title = 'Products - Foodian';
    include './includes/header.php';
    $stmt = $db -> prepare("SELECT * FROM product");
    $stmt -> execute();
    $table = $stmt -> fetchAll();
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
        
        <?php foreach($table as $row){ ?>
          <!-- Food Card Item -->
          <div class="shadow-xl">
            <a href="product.php?id=<?=$row['id']?>"><img src="/Foodian/uploads/products/<?=$row['image']?>" alt="<?=$row['name']?>"></a>
            <div class="p-6">
              <a href="product.php?id=<?=$row['id']?>"><h1 class="text-4xl"><?=$row['name']?></h1></a>
              <h3 class="text-mainColor text-xl font-semibold my-3">$<?=number_format($row['price'], 2, '.', "")?></h3>
              <p class="my-3"><?=substr($row['description'], 0, 80) . "..."?></p>
              <!-- Rating Stars -->
              <div class="flex text-mainColor">
                <?php if((float)$row['rating'] >= 1){echo '<i class="fa-solid fa-star"></i>';} else if ((float)$row['rating'] >= 0.5) {echo '<i class="fa-regular fa-star-half-stroke"></i>';} else {echo '<i class="fa-regular fa-star"></i>';} ?>
                <?php if((float)$row['rating'] >= 2){echo '<i class="fa-solid fa-star"></i>';} else if ((float)$row['rating'] >= 1.5) {echo '<i class="fa-regular fa-star-half-stroke"></i>';} else {echo '<i class="fa-regular fa-star"></i>';} ?>
                <?php if((float)$row['rating'] >= 3){echo '<i class="fa-solid fa-star"></i>';} else if ((float)$row['rating'] >= 2.5) {echo '<i class="fa-regular fa-star-half-stroke"></i>';} else {echo '<i class="fa-regular fa-star"></i>';} ?>
                <?php if((float)$row['rating'] >= 4){echo '<i class="fa-solid fa-star"></i>';} else if ((float)$row['rating'] >= 3.5) {echo '<i class="fa-regular fa-star-half-stroke"></i>';} else {echo '<i class="fa-regular fa-star"></i>';} ?>
                <?php if((float)$row['rating'] >= 5){echo '<i class="fa-solid fa-star"></i>';} else if ((float)$row['rating'] >= 4.5) {echo '<i class="fa-regular fa-star-half-stroke"></i>';} else {echo '<i class="fa-regular fa-star"></i>';} ?>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>
    </div>
  </section>
  <!-- Footer -->
  <?php include './includes/footer.php'; ?>
  <!-- To Top Button -->
  <?php include './includes/toTopButton.php'; ?>
  <?php include './includes/bottom.php'; ?>