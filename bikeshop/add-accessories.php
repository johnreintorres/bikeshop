<?php 
session_start();
require_once "config.php";

$brand_name = $model_name = $acce_desc = $acce_price = $acce_classification = $acce_quantity = $content = $material = $weight = $diameter = $depth = $color1 = $color2 = $color3 = "";
$brand_name_err = $model_name_err = $acce_desc_err = $acce_price_err = $acce_classification_err = $acce_quantity_err = $content_err = $material_err = $weight_err = $diameter_err = $depth_err = $color1_err = $color2_err = $color3_err = "";
if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
  if(empty(trim($_POST["brand_name"]))){
    $brand_name_err = "Please enter brand name.";
  }  else if(ctype_upper($_POST["brand_name"])){
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
    if(empty(trim($_POST["acce_desc"]))){
      $acce_desc_err = "Please enter acce description.";
    } else {
      $acce_desc = trim($_POST["acce_desc"]);
    }   
    if(empty(trim($_POST["acce_price"]))){
      $acce_price_err = "Please enter acce_price.";
    } else {
      $acce_price = trim($_POST["acce_price"]);
    } 
    if(empty(trim($_POST["acce_classification"]))){
      $acce_classification_err = "Please enter acce_classification.";
    } else {
      $acce_classification = trim($_POST["acce_classification"]);
    } 
    if(empty(trim($_POST["acce_quantity"]))){
      $acce_quantity_err = "Please enter acce_quantity.";
    } else {
      $acce_quantity = trim($_POST["acce_quantity"]);
    } 
    if(empty(trim($_POST["content"]))){
      $content_err = "Please enter content.";
    } else {
      $content = trim($_POST["content"]);
    } 
    if(empty(trim($_POST["diameter"]))){
      $diameter_err = "Please enter diameter.";
    } else {
      $diameter = trim($_POST["diameter"]);
    } 
    if(empty(trim($_POST["weight"]))){
      $weight_err = "Please enter weight.";
    } else {
      $weight = trim($_POST["weight"]);
    } 
    if(empty(trim($_POST["material"]))){
      $material_err = "Please enter material.";
    } else {
      $material = trim($_POST["material"]);
    } 
    if(empty(trim($_POST["depth"]))){
      $depth_err = "Please enter depth.";
    } else {
      $depth = trim($_POST["depth"]);
    } 
    if(empty(trim($_POST["color1"]))){
      $color1_err = "Please enter first color.";
    } else {
      $color1 = trim($_POST["color1"]);
    } 
    if(empty(trim($_POST["color2"]))){
      $color2_err = "Please enter second color.";
    } else {
      $color2 = trim($_POST["color2"]);
    } 
    if(empty(trim($_POST["color3"]))){
      $color3_err = "Please enter third color.";
    } else {
      $color3 = trim($_POST["color3"]);
    } 
 
 
  if(empty($brand_name_err) && empty($model_name_err) && empty($acce_desc_err) && empty($acce_price_err) && empty($acce_classification_err) && empty($acce_quantity_err) && empty($content_err)&& empty($material_err)&& empty($weight_err)&& empty($diameter_err)&& empty($depth_err)&& empty($color1_err)&& empty($color2_err)&& empty($color3_err)){
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
   
    $sql = "INSERT INTO accessories (brand_name, model_name, acce_desc, acce_price, acce_classification, acce_quantity, image, content, material, weight, diameter, depth, color1, color2, color3) VALUES (?, ?, ?, ?, ?, ?, '".$image."', ?, ?, ?, ?, ?, ?, ?, ?)";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssssssssssss", $param_brand_name, $param_model_name, $param_acce_desc, $param_acce_price, $param_acce_classification, $param_acce_quantity, $param_content, $param_material, $param_weight, $param_diameter, $param_depth, $param_color1, $param_color2, $param_color3);
        $param_brand_name = $brand_name;
        $param_model_name = $model_name;
        $param_acce_desc = $acce_desc;
        $param_acce_price = $acce_price;
        $param_acce_classification = $acce_classification;
        $param_acce_quantity = $acce_quantity;
        $param_content = $content;
        $param_material = $material;
        $param_weight = $weight;
        $param_diameter = $diameter;
        $param_depth = $depth;
        $param_color1 = $color1;
        $param_color2 = $color2;
        $param_color3 = $color3;
            if(mysqli_stmt_execute($stmt)){
             header("location: admin-accessories.php");
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
  <title>Bikes | Accessories</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Add New Accessory</h2>
  <p>Please fill this form to add an accessory.</p>
  <form class="reset-form" action="
  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype="multipart/form-data">
  <div class="add-cont">
  <div class="form-group <?php echo (!empty($brand_name_err)) ? 'has-error' : ''; ?>">
  <label for="">Brand name</label>
  <input type="text" name="brand_name" class="form-control" value="<?php echo $brand_name; ?>">
  <span class="help-block"><?php echo $brand_name_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($model_name_err)) ? 'has-error' : ''; ?>">
  <label for="">Model name</label>
  <input type="text" name="model_name" class="form-control" value="<?php echo $model_name; ?>">
  <span class="help-block"><?php echo $model_name_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($acce_desc_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory description</label>
  <input type="text" name="acce_desc" class="form-control" value="<?php echo $acce_desc; ?>">
  <span class="help-block"><?php echo $acce_desc_err; ?></span>
  </div>


  <div class="form-group <?php echo (!empty($acce_price_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory price</label>
  <input type="number" name="acce_price" class="form-control" value="<?php echo $acce_price; ?>">
  <span class="help-block"><?php echo $acce_price_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($acce_classification_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory classification</label>
  <input type="" name="acce_classification" class="form-control" value="<?php echo $acce_classification; ?>">
  <span class="help-block"><?php echo $acce_classification_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($acce_quantity_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory quantity</label>
  <input type="number" name="acce_quantity" class="form-control" value="<?php echo $acce_quantity; ?>">
  <span class="help-block"><?php echo $acce_quantity_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory content</label>
  <input type="" name="content" class="form-control" value="<?php echo $content; ?>">
  <span class="help-block"><?php echo $content_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($material_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory material</label>
  <input type="" name="material" class="form-control" value="<?php echo $material; ?>">
  <span class="help-block"><?php echo $material_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory weight</label>
  <input type="" name="weight" class="form-control" value="<?php echo $weight; ?>">
  <span class="help-block"><?php echo $weight_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($diameter_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory diameter</label>
  <input type="" name="diameter" class="form-control" value="<?php echo $diameter; ?>">
  <span class="help-block"><?php echo $diameter_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($depth_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory depth</label>
  <input type="" name="depth" class="form-control" value="<?php echo $depth; ?>">
  <span class="help-block"><?php echo $depth_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color1_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory color 1</label>
  <input type="" name="color1" class="form-control" value="<?php echo $color1; ?>">
  <span class="help-block"><?php echo $color1_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color2_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory color 2</label>
  <input type="" name="color2" class="form-control" value="<?php echo $color2; ?>">
  <span class="help-block"><?php echo $color2_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color3_err)) ? 'has-error' : ''; ?>">
  <label for="">Accessory color 3</label>
  <input type="" name="color3" class="form-control" value="<?php echo $color3; ?>">
  <span class="help-block"><?php echo $color3_err; ?></span>
  </div>
  </div>

<div class="form-btn-area">
<div class="form-btn-img-area">
<img src="https://cobblestone.me/wp-content/plugins/photonic/include/images/placeholder.png" onclick="triggerClick()" alt="" class="placeholder-img" id="profileDisplay">
<label for="file">Upload Bike Image</label>
<input type="file" name="file" onchange="displayImage(this)" id="file" style="display: none;">
</div>
 <div class="bottom-btn-area">
  <input type="submit" class="btn btn-primary form-btn" name="btn_submit" value="Add accessory"> 
  <input type="reset" class="btn btn-default form-btn" value="Reset"> 
  <a href="admin-accessories.php" class="btn  form-btn"> Cancel</a>
  </div>
  </div>
  </form>
  </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://kit.fontawesome.com/d6c8aac0cb.js" crossorigin="anonymous"></script>
  <script src="assets/js/bikes.js"></script>
</body>
</html>


