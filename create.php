<?php include_once "./dbconnect.php";

  session_start();
  if(!$_SESSION["USERSESSION"]){
    header("Location: /rev/blog/register.php");
  }
  //submit Form
  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $post_title = $_POST["postTitle"];
    $post_desc = $_POST["postDesc"];
    //add post
    if($sql = mysqli_query($conn, "INSERT INTO `posts`(`post_title`, `post_desc`)
          VALUES('{$post_title}','{$post_desc}')  ")){
      header("Location: /rev/blog/index.php");
    }else{
      echo "Error: Try again!";
    }
  }

?>


<?php include_once "./header.php";
      include_once "./nav.php";
?>

<!-- Submit Post -->
<div class="container">

  <h2 class="h2_heading">Create New Post</h2>
  <form class="form" action="/rev/blog/create.php" method="post">
    <input type="text" name="postTitle" placeholder="Post Title.." />
    <textarea name="postDesc" cols="30" rows="10" placeholder="Create Something..."></textarea>
    <button class="btn" type="submit">Submit</button>
  </form>

</div> <!--End container-->




<?php include_once "./footer.php" ?>