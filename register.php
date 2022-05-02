<?php
  include_once "./dbconnect.php";
  session_start();

  if(isset($_SESSION["USERSESSION"])){
    header("Location: /rev/blog/index.php");
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST' ){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!empty($email) && !empty($password) ){
      //hash password
      $passwordHash = password_hash($password, PASSWORD_DEFAULT);
      //insert data
      if($sql = mysqli_query($conn, "INSERT INTO `users`(`user_email`, `user_password`)
      VALUES('{$email}', '{$passwordHash}')")){
        //set session
        $_SESSION["USERSESSION"] = "0000";
        header("Location: /rev/blog/index.php");
      }else{
        echo "Failed To register. Please try again";
      }
    }else{
      echo "Email and password are required";
    }
  }

?>





<?php include_once "./header.php";
?>

<div class="authpage">

  <form class="form" action="/rev/blog/register.php" method="post">
    <h3 class="h3_heading" style="text-align:center;">Register</h3>
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <button class="btn" type="submit">Register</button>
    <p style="margin-top:10px; text-align:center;">Already Registered? <a href="/rev/blog/login.php">Login</a></p>
  </form>

</div>