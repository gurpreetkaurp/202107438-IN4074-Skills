<?php
include('config.php');

$title = $content = $author = $id = '';

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
        $created_at = $row["created_at"];
    } else{
        $error_array[] = "Record can not be found by given ID = '$blog_id'";
        session_start();
        $_SESSION['errors'] = $error_array;
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Blog Post</title>
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php include('nav.php') ?>
  <div class="container">
    <h2>Blog Post Details</h2>
    <div>
      <p><strong>Title:</strong> <?php echo $title; ?></p>
      <p><strong>Content:</strong> <?php echo $content; ?></p>
      <p><strong>Author:</strong> <?php echo $author; ?></p>
      <p><strong>Created At:</strong> <?php echo $created_at; ?></p>
    </div>
    <button class="btn"><a class="btn" href="index.php">Back</a></button>
    <button class="btn"><a class="btn" href="update.php?id=<?php echo $id; ?>">Update</a></button>
    <button class="btn"><a class="btn" href="delete.php?id=<?php echo $id; ?>">Delete</a></button>
  </div>
</body>
</html>
