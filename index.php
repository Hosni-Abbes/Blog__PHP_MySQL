<?php
  include_once "./dbconnect.php";

  session_start();




?>

<?php include_once "./header.php";

  if(isset($_SESSION["USERSESSION"])){
    include_once "./nav.php";
  }else{
    $not_connected = true;
  }
?>

  <div class="container">

    <?php if(isset($not_connected)){ ?>
      <p style="margin-bottom:10px">Connect and create your own post now <a href="/rev/blog/login.php">Login</a></p>
    <?php } ?>

    <div class="intro"><strong>Intro:</strong> Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet provident esse quod tempore alias eligendi, eos, dolor odio asperiores odit autem voluptas quam eius molestiae, et minima quos distinctio ut. </div>

    <h2 class="h2_heading">Posts</h2>
    <div class="posts_list">

    <?php 
      if($_SERVER["REQUEST_METHOD"] == "GET" ){
        $sql = mysqli_query($conn, "SELECT * FROM `posts` " );
        if(mysqli_num_rows($sql) > 0){
          while($row = mysqli_fetch_assoc($sql)){
    ?>
      <div class="post">
        <h3 class="h3_heading"><?php echo $row["post_title"] ?></h3>
        <p class="p_text"> <?php echo substr($row["post_desc"],0, 23) ?> </p>
        <?php if( strlen($row["post_desc"]) > 23 ) { ?>
        <a href="/" class="btn" >Read more</a>
        <?php } ?>
      </div>
    <?php
          }
        }
      }
    ?>

    </div> <!--end posts_list-->

  </div> <!--End container-->

  <?php include_once "./footer.php" ?>