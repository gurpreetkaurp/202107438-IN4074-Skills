<?php
include('config.php');

if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
  $blog_id = trim($_GET["id"]);
  $sql = "SELECT * FROM blogs WHERE id = '$blog_id'";  
  $result = mysqli_query($conn, $sql);

  if($result->num_rows == 1){
      $row = $result->fetch_assoc();
      $id = $row["id"];
      $title = $row["title"];
      $content = $row["content"];
      $author = $row["author"];
  } else{
      $error_array[] = "Record can not be found by given ID = '$blog_id'";
      session_start();
      $_SESSION['errors'] = $error_array;
      header("location: error.php");
      exit();
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["id"]) && !empty(trim($_POST["id"]))){
        $id = trim($_POST["id"]);
        $sql = "DELETE FROM blogs WHERE id = '$id'";
    
        if(mysqli_query($conn, $sql)){
          header('Location: index.php');
        } else {
          $error_array[] = 'query error: '. mysqli_error($conn);
          session_start();
          $_SESSION['errors'] = $error_array;
          header('Location: error.php');
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Blog Post</title>
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/form_style.css">
</head>
<body>
  <?php include('nav.php') ?>
  <div class="container">
    <h2>Delete Blog Post</h2>
    <p>Are you sure you want to delete this blog post?</p>
    <form class="form-actions" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="create-complaint">
      <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
      <a href="index.php" class="btn">Cancel</a>
      <input type="submit" value="Delete" class="btn">
    </form>
  </div>
</body>
</html>
