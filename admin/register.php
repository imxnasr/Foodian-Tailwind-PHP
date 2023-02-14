<?php
    $title = 'Register - Foodian';
    include '../includes/header.php';
    session_start();
    if($_SESSION['id']){
      header('Location: index.php');
      exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = sha1($_POST['password']);
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
        $stmt = $db -> prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
        $stmt -> execute([$username, $email, $password]);
        $stmt = $db -> prepare("SELECT id, username FROM user WHERE username = ? LIMIT 1");
        $stmt -> execute([$username]);
        $row = $stmt -> fetch();
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $username;
        header('Location: index.php');
        exit();
      }
    }
  ?>
  <!-- Header -->
  <header class="h-screen">
    <div class="container mx-auto h-full p-10 md:p-20 grid place-items-center">
      <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="w-full md:w-3/4 xl:w-1/2 flex flex-col gap-6">
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
        <h1 class="text-4xl font-semibold text-center">Register</h1>
        <input class="bg-transparent w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="text" name="username" placeholder="Username" />
        <input class="bg-transparent w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="email" name="email" placeholder="Email" />
        <input class="bg-transparent w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="password" name="password" placeholder="Password" />
        <p class="text-gray-500">Have an account? <a href="./login.php" class="text-mainColor underline">Login</a></p>
        <input class="bg-mainColor w-full text-white py-3 cursor-pointer" type="submit" name="submit" value="Register" />
      </form>
    </div>

  </header>
  <?php include '../includes/bottom.php'; ?>