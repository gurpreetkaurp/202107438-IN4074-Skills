<?php
include('config.php');

$title = $content = $author = '';
$title_err = $content_err = $author_err = $id = '';
$error_array = [];

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
    if (empty(trim($_POST["title"]))) {
        $error_array[] = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty(trim($_POST["content"]))) {
        $error_array[] = "Please enter content.";
    } else {
        $content = trim($_POST["content"]);
    }

    if (empty(trim($_POST["author"]))) {
        $error_array[] = "Please enter an author name.";
    } else {
        $author = trim($_POST["author"]);
    }

    if (empty($error_array)) {
        $id = trim($_POST["id"]);
        $sql = "UPDATE blogs SET title='$title', content='$content', author='$author' WHERE id='$id'";

        if(mysqli_query($conn, $sql)){
          header('Location: index.php');
        } else {
          $error_array[] = 'query error: '. mysqli_error($conn);
          session_start();
          $_SESSION['errors'] = $error_array;
          header('Location: error.php');
        }
    } else {
      session_start();
      $_SESSION['errors'] = $error_array;
      header('Location: error.php');
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Blog Post</title>
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/form_style.css">
</head>
<body>
  <?php include('nav.php') ?>
  <div class="container">
    <h2>Update Blog Post</h2>
    <form class="create-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div>
        <label>Title</label>
        <input type="number" name="id" value="<?php echo $id; ?>" hidden>
        <input type="text" name="title" value="<?php echo $title; ?>">
        <span><?php echo $title_err; ?></span>
      </div>
      <div>
        <label>Content</label>
        <textarea name="content"><?php echo $content; ?></textarea>
        <span><?php echo $content_err; ?></span>
      </div>
      <div>
        <label>Author</label>
        <input type="text" name="author" value="<?php echo $author; ?>">
        <span><?php echo $author_err; ?></span>
      </div>
      <div class="form-actions content-right">
        <a type="button" class="btn" href="index.php">Cancel</a>
        <input type="submit" value="Update">
      </div>
    </form>
  </div>
</body>
</html>
