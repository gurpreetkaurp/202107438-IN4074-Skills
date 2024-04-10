<?php
include('config.php');

$title = $content = $author = '';
$error_array = [];

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
        $sql = "INSERT INTO blogs (title, content, author) VALUES ('$title', '$content', '$author')";

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
  <title>Create Blog Post</title>
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/form_style.css">
</head>
<body>
  <?php include('nav.php') ?>
  <div class="container">
    <h2>Create Blog Post</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div>
        <label>Title</label>
        <input type="text" name="title" value="<?php echo $title; ?>">
      </div>
      <div>
        <label>Content</label>
        <textarea name="content"><?php echo $content; ?></textarea>
      </div>
      <div>
        <label>Author</label>
        <input type="text" name="author" value="<?php echo $author; ?>">
      </div>
      <div class="form-actions content-right">
        <a type="button" class="btn" href="index.php">Cancel</a>
        <input type="submit" value="Submit" class="btn">
      </div>
    </form>
  </div>
</body>
</html>
