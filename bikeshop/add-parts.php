<?php 
session_start();
require_once "config.php";

$brand_name = $model_name = $parts_desc = $parts_price = $parts_classification = $parts_quantity = $material = $weight = $diameter = $depth = "";
$brand_name_err = $model_name_err = $parts_desc_err = $parts_price_err = $parts_classification_err = $parts_quantity_err = $material_err = $weight_err = $diameter_err = $depth_err = "";
if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
  if(empty(trim($_POST["brand_name"]))){
    $brand_name_err = "Please enter brand name.";
  } else {
    $brand_name = trim($_POST["brand_name"]);
  }

   
    if(empty(trim($_POST["model_name"]))){
      $model_name_err = "Please enter model_name.";
    } else if(ctype_upper($_POST["brand_name"])){
      $brand_name_err = "Please use small letters only";
    }  else {
      $model_name = trim($_POST["model_name"]);
    }   
    if(empty(trim($_POST["parts_desc"]))){
      $partss_desc_err = "Please enter parts description.";
    } else {
      $parts_desc = trim($_POST["parts_desc"]);
    }   
    if(empty(trim($_POST["parts_price"]))){
      $parts_price_err = "Please enter parts_price.";
    } else {
      $parts_price = trim($_POST["parts_price"]);
    } 
    if(empty(trim($_POST["parts_classification"]))){
      $parts_classification_err = "Please enter parts_classification.";
    } else {
      $parts_classification = trim($_POST["parts_classification"]);
    } 
    if(empty(trim($_POST["parts_quantity"]))){
      $parts_quantity_err = "Please enter parts_quantity.";
    } else {
      $parts_quantity = trim($_POST["parts_quantity"]);
    } 
    if(empty(trim($_POST["material"]))){
      $material_err = "Please enter material.";
    } else {
      $material = trim($_POST["material"]);
    } 
    if(empty(trim($_POST["weight"]))){
      $weight_err = "Please enter weight.";
    } else {
      $weight = trim($_POST["weight"]);
    } 
    if(empty(trim($_POST["diameter"]))){
      $diameter_err = "Please enter diameter.";
    } else {
      $diameter = trim($_POST["diamater"]);
    } 
    if(empty(trim($_POST["depth"]))){
      $depth_err = "Please enter depth.";
    } else {
      $depth = trim($_POST["depth"]);
    } 
 
  if(empty($brand_name_err) && empty($model_name_err) && empty($parts_desc_err) && empty($parts_price_err) && empty($parts_classification_err) && empty($parts_quantity_err) && empty($material_err) && empty($weight_err) && empty($diameter_err) && empty($depth_err)){
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
    $sql = "INSERT INTO parts (brand_name, model_name, parts_desc, parts_price, parts_classification, parts_quantity, image, material, weight, diameter, depth) VALUES (?, ?, ?, ?, ?, ?, '".$image."', ?, ?, ? ,?)";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "ssssssssss", $param_brand_name, $param_model_name, $param_parts_desc, $param_parts_price, $param_parts_classification, $param_parts_quantity, $param_material, $param_weight, $param_diameter, $param_depth);
        $param_brand_name = $brand_name;
        $param_model_name = $model_name;
        $param_parts_desc = $parts_desc;
        $param_parts_price = $parts_price;
        $param_parts_classification = $parts_classification;
        $param_parts_quantity = $parts_quantity;
        $param_material = $material;
        $param_weight = $weight;
        $param_diameter = $diameter;
        $param_depth = $depth;
            if(mysqli_stmt_execute($stmt)){
             header("location: admin-spare-parts.php");
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
  <title>Bikes | Parts</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Add New Component</h2>
  <p>Please fill this form to add a component.</p>
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

  <div class="form-group <?php echo (!empty($parts_desc_err)) ? 'has-error' : ''; ?>">
  <label for="">Component description</label>
  <input type="text" name="parts_desc" class="form-control" value="<?php echo $parts_desc; ?>">
  <span class="help-block"><?php echo $parts_desc_err; ?></span>
  </div>


  <div class="form-group <?php echo (!empty($parts_price_err)) ? 'has-error' : ''; ?>">
  <label for="">Component price</label>
  <input type="number" name="parts_price" class="form-control" value="<?php echo $parts_price; ?>">
  <span class="help-block"><?php echo $parts_price_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($parts_classification_err)) ? 'has-error' : ''; ?>">
  <label for="">Component classification</label>
  <input type="" name="parts_classification" class="form-control" value="<?php echo $parts_classification; ?>">
  <span class="help-block"><?php echo $parts_classification_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($parts_quantity_err)) ? 'has-error' : ''; ?>">
  <label for="">Parts quantity</label>
  <input type="" name="parts_quantity" class="form-control" value="<?php echo $parts_quantity; ?>">
  <span class="help-block"><?php echo $parts_quantity_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($material_err)) ? 'has-error' : ''; ?>">
  <label for="">Component material</label>
  <input type="" name="material" class="form-control" value="<?php echo $material; ?>">
  <span class="help-block"><?php echo $material_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
  <label for="">Component weight</label>
  <input type="" name="weight" class="form-control" value="<?php echo $weight; ?>">
  <span class="help-block"><?php echo $weight_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($diameter_err)) ? 'has-error' : ''; ?>">
  <label for="">Component diameter</label>
  <input type="" name="diameter" class="form-control" value="<?php echo $diameter; ?>">
  <span class="help-block"><?php echo $diameter_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($depth_err)) ? 'has-error' : ''; ?>">
  <label for="">Component depth</label>
  <input type="" name="depth" class="form-control" value="<?php echo $depth; ?>">
  <span class="help-block"><?php echo $depth_err; ?></span>
  </div>
  </div>

<div class="form-btn-area">
<label for="">Upload Component Image</label>
<input type="file" name="file">
 <div class="bottom-btn-area">
  <input type="submit" class="btn btn-primary form-btn" name="btn_submit" value="Add parts"> 
  <input type="reset" class="btn btn-default form-btn" value="Reset"> 
  <a href="admin-spare-parts.php" class="btn  form-btn"> Cancel</a>
  </div>
  </div>
  </form>
  </div>
  </div>
</section>
</body>
</html>


