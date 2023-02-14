  <?php
    $title = 'Login - Foodian';
    include '../includes/header.php';
    session_start();
    if($_SESSION['id']){
      header('Location: index.php');
      exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = $_POST['email'];
      $password = sha1($_POST['password']);
      $stmt = $db -> prepare("SELECT id, username, admin FROM user WHERE email = ? AND password = ?");
      $stmt -> execute([$email, $password]);
      $row = $stmt -> fetch();
      $count = $stmt -> rowCount();
      if($count > 0){
        if($row['admin'] == 1){
          $_SESSION['id'] = $row['id'];
          $_SESSION['username'] = $row['username'];
          header('Location: index.php');
          exit();
        }else{
          $alert = 'allow';
        }
      }else{
        $alert = 'failed';
      }
    }
  ?>
  <!-- Header -->
  <header class="h-screen">
    <div class="container mx-auto h-full p-10 md:p-20 grid place-items-center">
      <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="w-full md:w-3/4 xl:w-1/2 flex flex-col gap-6">
        <?php if($alert === 'allow'){ ?>
          <div class="bg-red-100 w-full p-3 text-red-600 border-red-200 border-2 rounded">
            Your are not allowed here
          </div>
        <?php } ?>
        <?php if($alert === 'failed'){ ?>
          <div class="bg-red-100 w-full p-3 text-red-600 border-red-200 border-2 rounded">
            There is no user with this credentials
          </div>
        <?php } ?>
        <h1 class="text-4xl font-semibold text-center">Login</h1>
        <input class="bg-transparent w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="email" name="email" placeholder="Email" />
        <input class="bg-transparent w-full p-3 border-[1px] focus:outline-none focus:border-mainColor" required type="password" name="password" placeholder="Password" />
        <p class="text-gray-500">Don't have an account? <a href="./register.php" class="text-mainColor underline">Register</a></p>
        <input class="bg-mainColor w-full text-white py-3 cursor-pointer" type="submit" name="submit" value="Login" />
      </form>
    </div>

  </header>
  <?php include '../includes/bottom.php'; ?>