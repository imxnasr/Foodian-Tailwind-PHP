<?php
  $title = 'Admin Dashboard - Foodian';
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location: login.php');
    exit();
  }
  include '../includes/header.php';
  include './includes/navbar.php';
?>

  <?php if(!isset($_GET['db']) || $_GET['db'] === ''){ // All Tables Page
   ?>
  <div class="container mx-auto p-6">
    <h1 class="text-4xl font-semibold">Tables:</h1>
    <div class="grid lg:grid-cols-2 mt-10 gap-10">
      <!-- Database Item -->
      <a href="?db=users" class="w-full h-40 bg-blue-700 rounded-3xl flex items-center gap-5 p-5 text-5xl md:text-6xl text-white overflow-hidden">
        <i class="fa-solid fa-user"></i>
        <h1 class="text-4xl md:text-5xl">Users</h1>
      </a>
      <!-- Database Item -->
      <a href="?db=products" class="w-full h-40 bg-red-700 rounded-3xl flex items-center gap-5 p-5 text-5xl md:text-6xl text-white overflow-hidden">
        <i class="fa-solid fa-utensils"></i>
        <h1 class="text-4xl md:text-5xl">Products</h1>
      </a>
      <!-- Database Item -->
      <a href="?db=orders" class="w-full h-40 bg-orange-700 rounded-3xl flex items-center gap-5 p-5 text-5xl md:text-6xl text-white overflow-hidden">
        <i class="fa-solid fa-cart-shopping"></i>
        <h1 class="text-4xl md:text-5xl">Orders</h1>
      </a>
      <!-- Database Item -->
      <a href="?db=categories" class="w-full h-40 bg-pink-700 rounded-3xl flex items-center gap-5 p-5 text-5xl md:text-6xl text-white overflow-hidden">
        <i class="fa-solid fa-list-ul"></i>
        <h1 class="text-4xl md:text-5xl">Categories</h1>
      </a>
    </div>
  </div>

  <?php } else if(isset($_GET['db']) && $_GET['db'] === 'users'){ // Users Table
    if(!isset($_GET['action']) || $_GET['action'] === ''){
    $stmt = $db -> prepare("SELECT * FROM user");
    $stmt -> execute();
    $table = $stmt -> fetchAll();
  ?>
    <div class="container mx-auto p-6">
      <!-- Title -->
      <h1 class="text-4xl font-semibold my-5">Users Table:</h1>
      <!-- Table -->
      <div class="w-full overflow-scroll">
        <table class="table-auto w-full border-[1px]">
          <thead class="font-bold text-white bg-mainColor">
            <tr>
              <td class="p-3 text-center">ID</td>
              <td class="p-3 text-center">Username</td>
              <td class="p-3 text-center">Email</td>
              <td class="p-3 text-center">Date Joined</td>
              <td class="p-3 text-center">Admin</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($table as $row){ ?>
            <tr class="border-t-[1px]">
              <td class="p-3 text-center"><?=$row['id']?></td>
              <td class="p-3 text-center"><a class="text-mainColor underline" href="?db=users&action=edit&id=<?=$row['id'] ?>"><?=$row['username']?></a></td>
              <td class="p-3 text-center"><?=$row['email']?></td>
              <td class="p-3 text-center"><?=date_format(date_create($row['date_joined']), "d-m-Y")?></td>
              <td class="p-3 text-center"><?php if($row['admin'] == 1){echo '<i class="fa-solid fa-circle-check text-green-500"></i>';}else{echo '<i class="fa-solid fa-circle-xmark text-red-500"></i>';}?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- Add Button -->
      <a href="?db=users&action=add">
        <button class="py-3 px-4 bg-mainColor text-white mt-6">Add new user</button>
      </a>
    </div>
  <?php }
    else if(isset($_GET['action']) && $_GET['action'] === 'add'){ // Add New User
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = sha1($_POST['password']);
        if($_POST['admin'] === 'on'){
          $admin = '1';
        }else{
          $admin = '0';
        }
        $checkUsernameStmt = $db -> prepare("SELECT username FROM user WHERE username = ?");
        $checkUsernameStmt -> execute([$username]);
        $checkEmailStmt = $db -> prepare("SELECT email FROM user WHERE email = ?");
        $checkEmailStmt -> execute([$email]);
        $countUsername = $checkUsernameStmt -> rowCount();
        $countEmail = $checkEmailStmt -> rowCount();
        if($countUsername > 0){
          $alert = 'username';
        }else if($countEmail > 0){
          $alert = 'email';
        }else {
          $stmt = $db -> prepare("INSERT INTO user (username, email, password, admin) VALUES (?, ?, ?, ?)");
          $stmt -> execute([$username, $email, $password, $admin]);
          $alert = 'success';
        }
      }
  ?>
  <div class="container mx-auto h-full p-10 md:p-20 grid place-items-center">
    <form method="POST" class="w-full md:w-3/4 xl:w-1/2 flex flex-col gap-6">
      <?php if($alert === 'success'){ ?>
        <div class="bg-green-100 w-full p-3 text-green-600 border-green-200 border-2 rounded">
          User created successfully !!
        </div>
      <?php } ?>
      <?php if($alert === 'username'){ ?>
        <div class="bg-red-100 w-full p-3 text-red-600 border-red-200 border-2 rounded">
          There is a user with this username
        </div>
      <?php } ?>
      <?php if($alert === 'email'){ ?>
        <div class="bg-red-100 w-full p-3 text-red-600 border-red-200 border-2 rounded">
          There is a user with this email
        </div>
      <?php } ?>
      <h1 class="text-4xl font-semibold">Add New User</h1>
      <input class="w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="text" name="username" placeholder="Username" />
      <input class="w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="email" name="email" placeholder="Email" />
      <input class="w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="password" name="password" placeholder="Password" />
      <div class="flex gap-4 items-center">
        <input class="p-3 accent-mainColor" type="checkbox" name="admin" id="admin" />
        <label for="admin" class="text-gray-500">Admin?</label>
      </div>
      <input class="bg-mainColor w-full text-white py-3 cursor-pointer focus:outline-none" type="submit" name="submit" value="Add" />
    </form>
  </div>
  <?php 
    } else if(isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])){ // Edit User
      $stmt = $db -> prepare("SELECT * FROM user WHERE id = ? LIMIT 1");
      $stmt -> execute([$_GET['id']]);
      $row = $stmt -> fetch();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        if($_POST['admin'] === 'on'){
          $admin = '1';
        }else{
          $admin = '0';
        }
        $getUserStmt = $db -> prepare("SELECT * FROM user WHERE id = ? LIMIT 1");
        $getUserStmt -> execute([$_GET['id']]);
        $userRow = $getUserStmt -> fetch();

        $checkUsernameStmt = $db -> prepare("SELECT username FROM user WHERE username = ?");
        $checkUsernameStmt -> execute([$username]);
        $checkUsernameRow = $checkUsernameStmt -> fetch();

        $checkEmailStmt = $db -> prepare("SELECT email FROM user WHERE email = ?");
        $checkEmailStmt -> execute([$email]);
        $checkEmailRow = $checkEmailStmt -> fetch();

        if($checkUsernameStmt -> rowCount() > 0 && !($userRow['username'] === $checkUsernameRow['username'])){
          $alert = 'username';
        }else if($checkEmailStmt -> rowCount() > 0 && !($userRow['email'] === $checkEmailRow['email'])){
          $alert = 'email';
        }else{
          $stmt = $db -> prepare("UPDATE user SET username = ?, email = ?, admin = ? WHERE id = ?");
          $stmt -> execute([$username, $email, $admin, $_GET['id']]);
          if(($_SESSION['id'] == $_GET['id']) && $admin == '0'){
            header('Location: logout.php');
            exit();
          }else{
            $alert = 'success';
            $stmt = $db -> prepare("SELECT * FROM user WHERE id = ? LIMIT 1");
            $stmt -> execute([$_GET['id']]);
            $row = $stmt -> fetch();
          }
        }
      }
  ?>
  <div class="container mx-auto h-full p-10 md:p-20 grid place-items-center">
    <form method="POST" class="w-full md:w-3/4 xl:w-1/2 flex flex-col gap-6">
      <?php if($alert === 'success'){ ?>
        <div class="bg-green-100 w-full p-3 text-green-600 border-green-200 border-2 rounded">
          User updated successfully !!
        </div>
      <?php } ?>
      <?php if($alert === 'username'){ ?>
        <div class="bg-red-100 w-full p-3 text-red-600 border-red-200 border-2 rounded">
          There is a user with this username
        </div>
      <?php } ?>
      <?php if($alert === 'email'){ ?>
        <div class="bg-red-100 w-full p-3 text-red-600 border-red-200 border-2 rounded">
          There is a user with this email
        </div>
      <?php } ?>
      <h1 class="text-4xl font-semibold">Edit User</h1>
      <input class="w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="text" name="username" placeholder="Username" value="<?=$row['username']?>" />
      <input class="w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="email" name="email" placeholder="Email" value="<?=$row['email']?>" />
      <input class="w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="text" name="password" placeholder="Password" value="<?=$row['password']?>" disabled />
      <div class="flex gap-4 items-center">
        <input class="p-3 accent-mainColor" type="checkbox" name="admin" id="admin" <?php if($row['admin'] == '1'){echo 'checked';}?> />
        <label for="admin" class="text-gray-500">Admin?</label>
      </div>
      <div class="flex gap-4">
        <button class="bg-mainColor text-white py-3 cursor-pointer focus:outline-none block flex-grow-[1]" type="submit" name="edit">Edit</button>
        <a class="focus:outline-none" href="?db=users&action=delete&id=<?=$row['id']?>">
          <button class="bg-red-500 text-white py-3 px-5 cursor-pointer focus:outline-none flex-grow-0" type="button" name="delete">
            <i class="fa-solid fa-trash"></i>
          </button>
        </a>
      </div>
    </form>
  </div>
  <?php
    } else if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])){ // Delete User
      $stmt = $db -> prepare("SELECT username FROM user WHERE id = ?");
      $stmt -> execute([$_GET['id']]);
      $row = $stmt -> fetch();
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $stmt = $db -> prepare("DELETE FROM user WHERE id = ?");
        $stmt -> execute([$_GET['id']]);
        if($_GET['id'] == $_SESSION['id']){
          header("Location: logout.php");
          exit();
        }else {
          header("Location: index.php?db=users");
          exit();
        }
      }
  ?>
  <div class="container mx-auto h-full p-10 grid place-items-center md:p-20">
    <h1 class="text-4xl text-center">Are you sure about deleting User <span class="font-bold"><?=$row['username']?></span>?</h1>
    <form method="POST" class="flex flex-col sm:flex-row justify-between w-3/5 mt-10 gap-5">
      <button class="bg-red-500 text-white py-3 px-4" type="submit">Delete</button>
      <a href="javascript:history.back()">
        <button class="bg-mainColor text-white py-3 px-4 w-full" type="button">Go back</button>
      </a>
    </form>
  </div>
  <?php
  } else {
    header('Location: index.php?db=users');
    exit();
  } ?>
  <?php } else if(isset($_GET['db']) && $_GET['db'] === 'products'){ // Products Table
    if(!isset($_GET['action']) || $_GET['action'] === ''){
      $stmt = $db -> prepare("SELECT * FROM product");
      $stmt -> execute();
      $table = $stmt -> fetchAll();
  ?>
    <div class="container mx-auto p-6">
      <!-- Title -->
      <h1 class="text-4xl font-semibold my-5">Products Table:</h1>
      <!-- Table -->
      <div class="w-full overflow-scroll">
        <table class="table-auto w-full border-[1px]">
          <thead class="font-bold text-white bg-mainColor">
            <tr>
              <td class="p-3 text-center">ID</td>
              <td class="p-3 text-center">Name</td>
              <td class="p-3 text-center">Description</td>
              <td class="p-3 text-center">Image</td>
              <td class="p-3 text-center">In Stock</td>
              <td class="p-3 text-center">Rating</td>
              <td class="p-3 text-center">Price</td>
              <td class="p-3 text-center">Sold Times</td>
              <td class="p-3 text-center">Date Added</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($table as $row){ ?>
            <tr class="border-t-[1px]">
              <td class="p-3 text-center"><?=$row['id']?></td>
              <td class="p-3 text-center"><a class="text-mainColor underline" href="?db=products&action=edit&id=<?=$row['id'] ?>"><?=$row['name']?></a></td>
              <td class="p-3 text-center"><?=substr($row['description'], 0, 25) . "..."?></td>
              <td class="p-3 text-center"><img class="aspect-square h-10 mx-auto" src="/Foodian/uploads/products/<?=$row['image']?>" alt=""></td>
              <td class="p-3 text-center"><?=$row['in_stock']?></td>
              <td class="p-3 text-center"><?=$row['rating']?></td>
              <td class="p-3 text-center"><?=number_format($row['price'], 2, '.', "")?></td>
              <td class="p-3 text-center"><?=$row['sold_times']?></td>
              <td class="p-3 text-center"><?=date_format(date_create($row['date_added']), "d-m-Y")?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- Add Button -->
      <a href="?db=products&action=add">
        <button class="py-3 px-4 bg-mainColor text-white mt-6">Add new product</button>
      </a>
    </div>
  <?php } ?>
  <?php } else if(isset($_GET['db']) && $_GET['db'] === 'orders'){ // Orders Table
    echo 'Orders';
  ?>
  <?php } else if(isset($_GET['db']) && $_GET['db'] === 'categories'){ // Categories Table
    echo 'Categories';
  ?>
  <?php
  } else {
    header('Location: index.php');
    exit();
  }
  ?>

<?php include '../includes/bottom.php' ?>