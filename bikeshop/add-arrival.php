<?php 
session_start();
require_once "config.php";

$brand_name = $model_name = $product_desc = $product_price = $product_classification = $product_quantity = "";
$brand_name_err = $model_name_err = $product_desc_err = $product_price_err = $product_classification_err = $product_quantity_err = "";
if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
  if(empty(trim($_POST["brand_name"]))){
    $brand_name_err = "Please enter brand name.";
  } else if(ctype_upper($_POST["brand_name"])){
    $brand_name_err = "Please use small letters only";
  } 
  else {
    $brand_name = trim($_POST["brand_name"]);
  }

    if(empty(trim($_POST["model_name"]))){
      $model_name_err = "Please enter model_name.";
    } else {
      $model_name = trim($_POST["model_name"]);
    }   
    if(empty(trim($_POST["product_desc"]))){
      $product_desc_err = "Please enter Product description.";
    } else {
      $product_desc = trim($_POST["product_desc"]);
    }   
    if(empty(trim($_POST["product_price"]))){
      $product_price_err = "Please enter product_price.";
    } else {
      $product_price = trim($_POST["product_price"]);
    } 
    if(empty(trim($_POST["product_classification"]))){
      $product_classification_err = "Please enter product_classification.";
    } else {
      $product_classification = trim($_POST["product_classification"]);
    } 
    if(empty(trim($_POST["product_quantity"]))){
      $product_quantity_err = "Please enter product_quantity.";
    } else {
      $product_quantity = trim($_POST["product_quantity"]);
    } 
 
 
  if(empty($brand_name_err) && empty($model_name_err) && empty($product_desc_err) && empty($product_price_err) && empty($product_classification_err) && empty($product_quantity_err)){
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
   
    $sql = "INSERT INTO new_arrivals (brand_name, model_name, product_desc, product_price, product_classification, product_quantity, image) VALUES (?, ?, ?, ?, ?, ?, '".$image."')";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssss", $param_brand_name, $param_model_name, $param_product_desc, $param_product_price, $param_product_classification, $param_product_quantity);
        $param_brand_name = $brand_name;
        $param_model_name = $model_name;
        $param_product_desc = $product_desc;
        $param_product_price = $product_price;
        $param_product_classification = $product_classification;
        $param_product_quantity = $product_quantity;
            if(mysqli_stmt_execute($stmt)){
             header("location: admin-new-arrival.php");
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
  <title>Bikes | New Arrivals</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Add New Product</h2>
  <p>Please fill this form to add a product.</p>
  <form class="reset-form" action="
  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype="multipart/form-data">
  <div class="add-cont">
  <div class="form-group <?php echo (!empty($brand_name_err)) ? 'has-error' : ''; ?>">
  <label for="">Brand name</label>
  <input type="text" name="brand_name" class="form-control" id="brand-name-input" value="<?php echo $brand_name; ?>">
  <span class="help-block"><?php echo $brand_name_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($model_name_err)) ? 'has-error' : ''; ?>">
  <label for="">Model name</label>
  <input type="text" name="model_name" class="form-control" value="<?php echo $model_name; ?>">
  <span class="help-block"><?php echo $model_name_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($product_desc_err)) ? 'has-error' : ''; ?>">
  <label for="">Product description</label>
  <input type="text" name="product_desc" class="form-control" value="<?php echo $product_desc; ?>">
  <span class="help-block"><?php echo $product_desc_err; ?></span>
  </div>


  <div class="form-group <?php echo (!empty($product_price_err)) ? 'has-error' : ''; ?>">
  <label for="">Product price</label>
  <input type="number" name="product_price" class="form-control" value="<?php echo $product_price; ?>">
  <span class="help-block"><?php echo $product_price_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($product_classification_err)) ? 'has-error' : ''; ?>">
  <label for="">Product classification</label>
  <input type="" name="product_classification" class="form-control" value="<?php echo $product_classification; ?>">
  <span class="help-block"><?php echo $product_classification_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($product_quantity_err)) ? 'has-error' : ''; ?>">
  <label for="">Product quantity</label>
  <input type="" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>">
  <span class="help-block"><?php echo $product_quantity_err; ?></span>
  </div>
  </div>

<div class="form-btn-area">
<label for="">Upload Product Image</label>
<input type="file" name="file">
<img src="<?php echo $image ?>" alt="">
 <div class="bottom-btn-area">
  <input type="submit" class="btn btn-primary form-btn" name="btn_submit" value="Add product"> 
  <input type="reset" class="btn btn-default form-btn" value="Reset"> 
  <a href="admin-new-arrival.php" class="btn  form-btn"> Cancel</a>
  </div>
  </div>
  </form>
  </div>
  </div>
</section>
</body>
</html>


