<!--
Name- Gurpreet kaur
Student id -202107438
-->
<?php
include('config.php');

$sql = "SELECT * FROM blogs";
$result = $conn->query($sql);
$blogs = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blogify</title>
  <link rel="stylesheet" href="css/nav.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <?php include 'nav.php'; ?>
  <h1 class="title">Blogs</h1>
  <div class="content-right container2">
    <a type="button" class="btn" href="create.php">New Blog</a>
  </div>
  <div class="container2">
    <?php
    if(count($blogs) > 0) {
      foreach($blogs as $blog) {
    ?>
    <?php
      $id = $blog['id'];
      $read_url = "read.php?id=$id"; ?>
    <div class="blog" onclick="window.location.href='<?php echo $read_url ?>'">
      <h2><?php echo $blog['title']; ?></h2>
      <p><?php echo $blog['content']; ?></p>
      <p><strong>Author:</strong> <?php echo $blog['author']; ?></p>
      <p><strong>Date:</strong> <?php echo $blog['created_at']; ?></p>
    </div>
    <?php
      }
    } else {
      echo "<p>No blogs found</p>";
    }
    ?>
  </div>
</body>
</html>

