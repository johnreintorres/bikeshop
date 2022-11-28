<?php

require_once "config.php";
 

$brand_name = $model_name = $parts_desc = $parts_price = $parts_classification = $parts_quantity = $material = $weight = $diameter = $depth = "";
$brand_name_err = $model_name_err = $parts_desc_err = $parts_price_err = $parts_classification_err = $parts_quantity_err= $material_err = $weight_err = $diameter_err = $depth_err = "";
 

if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id = $_POST["id"];
    
    $input_name = trim($_POST["brand_name"]);
    if(empty($input_name)){
        $brand_name_err = "Please enter a brand name.";
    } else{
        $brand_name = $input_name;
    }
    

    $input_model_name = trim($_POST["model_name"]);
    if(empty($input_model_name)){
        $model_name_err = "Please enter an model name.";     
    } else{
        $model_name = $input_model_name;
    }
    
    $input_parts_desc = trim($_POST["parts_desc"]);
    if(empty($input_parts_desc)){
        $parts_desc_err = "Please enter the Component description.";     
    }else{
        $parts_desc = $input_parts_desc;
    }
    $input_parts_price = trim($_POST["parts_price"]);
    if(empty($input_parts_price)){
        $parts_price_err = "Please enter the Component price.";     
    }else{
        $parts_price = $input_parts_price;
    }
    $input_parts_classification = trim($_POST["parts_classification"]);
    if(empty($input_parts_classification)){
        $capacity_err = "Please enter the Component classification.";     
    }else{
        $parts_classification = $input_parts_classification;
    }
    $input_parts_quantity = trim($_POST["parts_quantity"]);
    if(empty($input_parts_quantity)){
        $parts_quantity_err = "Please enter the Component quantity.";     
    }else{
        $parts_quantity = $input_parts_quantity;
    }
    $input_material = trim($_POST["material"]);
    if(empty($input_material)){
        $material_err = "Please enter the Component material.";     
    }else{
        $material = $input_material;
    }
    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err = "Please enter the Component weight.";     
    }else{
        $weight = $input_weight;
    }
    $input_diameter = trim($_POST["diameter"]);
    if(empty($input_diameter)){
        $diameter_err = "Please enter the Component diameter.";     
    }else{
        $diameter = $input_diameter;
    }
    $input_depth = trim($_POST["depth"]);
    if(empty($input_depth)){
        $depth_err = "Please enter the Component depth.";     
    }else{
        $depth = $input_depth;
    }
    if(empty($brand_name_err) && empty($model_name_err) && empty($parts_desc_err) && empty($parts_price_err) && empty($parts_classification_err) && empty($parts_quantity_err) && empty($material_err) && empty($weight_err) && empty($diameter_err) && empty($depth_err)){
        $sql = "UPDATE parts SET brand_name=?, model_name=?, parts_desc=?, parts_price=?, parts_classification=?, parts_quantity=?, material=?, weight=?, diameter=?, depth=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssssssi", $param_brand_name, $param_model_name, $param_parts_desc, $param_parts_price, $param_parts_classification, $param_parts_quantity, $param_material, $param_weight, $param_diameter, $param_depth, $param_id);
            
    
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
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: admin-spare-parts.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        $sql = "SELECT * FROM 'parts' WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $brand_name = $row["brand_name"];
                    $model_name = $row["model_name"];
                    $parts_desc = $row["parts_desc"];
                    $parts_price = $row["parts_price"];
                    $parts_classification = $row["parts_classification"];
                    $parts_quantity = $row["parts_quantity"];
                    $material = $row["material"];
                    $weight = $row["weight"];
                    $diameter = $row["diameter"];
                    $depth = $row["depth"];
                } else{
                    header("location: update-parts.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        
        mysqli_close($link);
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en" class="admin-html-body">
<head>
    <meta charset="UTF-8">
    <title>New Component | Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Update Component</h2>
  <p>Please fill this form to add a Component.</p>
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
  <label for="">Component quantity</label>
  <input type="" name="parts_quantity" class="form-control" value="<?php echo $parts_quantity; ?>">
  <span class="help-block"><?php echo $parts_quantity_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($material_err)) ? 'has-error' : ''; ?>">
  <label for="">Component material</label>
  <input type="" name="material" class="form-control" value="<?php echo $material_err; ?>">
  <span class="help-block"><?php echo $material_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
  <label for="">Component weight</label>
  <input type="" name="weight" class="form-control" value="<?php echo $weight; ?>">
  <span class="help-block"><?php echo $weight_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($depth_err)) ? 'has-error' : ''; ?>">
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

  <div class="bottom-btn-area two-btn">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin-spare-parts.php" class="btn btn-default">Cancel</a>
</div>
                    </form>
                </div>
</div>
    </section>
</body>
</html>