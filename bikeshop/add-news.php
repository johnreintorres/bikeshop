<?php 
session_start();
require_once "config.php";

$news_title = $news_desc = $news_classification = $news_author = "";
$news_title_err = $news_desc_err = $news_classification_err = $news_author_err = "";
if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
  if(empty(trim($_POST["news_title"]))){
    $news_title_err = "Please enter news title.";
  } else {
    $news_title = trim($_POST["news_title"]);
  }
 
    if(empty(trim($_POST["news_desc"]))){
      $news_desc_err = "Please enter news description.";
    } else {
      $news_desc = trim($_POST["news_desc"]);
    }   

    if(empty(trim($_POST["news_classification"]))){
      $news_classification_err = "Please enter news_classification.";
    } else {
      $news_classification = trim($_POST["news_classification"]);
    } 
    if(empty(trim($_POST["news_author"]))){
      $news_author_err = "Please enter news_author.";
    } else {
      $news_author = trim($_POST["news_author"]);
    } 
 
 
  if(empty($news_title_err) && empty($news_desc_err) && empty($news_classification_err) && empty($news_author_err)){
    $filename = $_FILES['file'] ['name'];
    $target_dir = "assets/images/";

    if($filename != ''){
      $target_file = $target_dir.basename($_FILES['file']['name']);
      $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $extensions_arr = array("jpg", "jpeg", "png", "gif", "JPG");
      if(in_array($extension, $extensions_arr)){
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = "data::image/".$extension.";base64,".$image_base64;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
   
    $sql = "INSERT INTO news (news_title, news_desc, news_classification, news_author, image) VALUES (?, ?, ?, ?, '".$image."')";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssss", $param_news_title,  $param_news_desc, $param_news_classification, $param_news_author);
        $param_news_title = $news_title;
        $param_news_desc = $news_desc;
        $param_news_classification = $news_classification;
        $param_news_author = $news_author;
            if(mysqli_stmt_execute($stmt)){
             header("location: admin-news.php");
            } else {
              echo "Error: Could not be able to execute $sql. " . mysqli_error($link);
            }
            mysqli_stmt_close($stmt);
      }
  }
}
    }
  }
  mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="ja" class="admin-html-body">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bikes | News</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Add New News</h2>
  <p>Please fill this form to add a News.</p>
  <form class="reset-form" action="
  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype="multipart/form-data">
  <div class="add-cont">
  <div class="form-group <?php echo (!empty($news_title_err)) ? 'has-error' : ''; ?>">
  <label for="">News Title</label>
  <input type="text" name="news_title" class="form-control" value="<?php echo $news_title; ?>">
  <span class="help-block"><?php echo $news_title_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($news_desc_err)) ? 'has-error' : ''; ?>">
  <label for="">News description</label>
  <input type="text" name="news_desc" class="form-control" value="<?php echo $news_desc; ?>">
  <span class="help-block"><?php echo $news_desc_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($news_classification_err)) ? 'has-error' : ''; ?>">
  <label for="">News classification</label>
  <input type="" name="news_classification" class="form-control" value="<?php echo $news_classification; ?>">
  <span class="help-block"><?php echo $news_classification_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($news_author_err)) ? 'has-error' : ''; ?>">
  <label for="">News author</label>
  <input type="" name="news_author" class="form-control" value="<?php echo $news_author; ?>">
  <span class="help-block"><?php echo $news_author_err; ?></span>
  </div>
  </div>

<div class="form-btn-area">
<label for="">Upload News Image</label>
<input type="file" name="file">
 <div class="bottom-btn-area">
  <input type="submit" class="btn btn-primary form-btn" name="btn_submit" value="Add news"> 
  <input type="reset" class="btn btn-default form-btn" value="Reset"> 
  <a href="admin-news.php" class="btn  form-btn"> Cancel</a>
  </div>
  </div>
  </form>
  </div>
  </div>
</section>
</body>
</html>


