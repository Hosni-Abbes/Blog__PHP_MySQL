<?php
  include_once "./dbconnect.php";

  session_start();
  if(isset($_SESSION["USERSESSION"])){
    header("Location: /rev/blog/index.php");
  }

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    //make request to check email and pass
    $sql = mysqli_query($conn, "SELECT * FROM `users` WHERE users.user_email = '{$email}' ");
    if(mysqli_num_rows($sql) > 0){
      $row = mysqli_fetch_assoc($sql);
      //check if password is matched
      if(password_verify($password, $row['user_password'])){
        //set session and redirect to homepage
        $_SESSION["USERSESSION"] = "0000";
        header("Location: /rev/blog/index.php");
      }else{
        echo "Wrong password!";
      }
    }else{
      echo "Wrong data.";
    }

  }




?>


<?php include_once "./header.php";
?>

<div class="authpage">

  <form class="form" action="/rev/blog/login.php" method="post">
    <h3 class="h3_heading" style="text-align:center;">Login</h3>
    <input type="email" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <button class="btn" type="submit">Login</button>
    <p style="margin-top:10px; text-align:center;">Dont have account? <a href="/rev/blog/register.php">Register</a></p>
  </form>

</div>