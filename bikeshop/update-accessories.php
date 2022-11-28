<?php

require_once "config.php";
 

$brand_name = $model_name = $acce_desc = $acce_price = $acce_classification = $acce_quantity = "";
$brand_name_err = $model_name_err = $acce_desc_err = $acce_price_err = $acce_classification_err = $acce_quantity_err = "";
 

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
    
    $input_acce_desc = trim($_POST["acce_desc"]);
    if(empty($input_acce_desc)){
        $acce_desc_err = "Please enter the Accessory description.";     
    }else{
        $acce_desc = $input_acce_desc;
    }
    $input_acce_price = trim($_POST["acce_price"]);
    if(empty($input_acce_price)){
        $acce_price_err = "Please enter the Accessory price.";     
    }else{
        $acce_price = $input_acce_price;
    }
    $input_acce_classification = trim($_POST["acce_classification"]);
    if(empty($input_acce_classification)){
        $capacity_err = "Please enter the Accessory classification.";     
    }else{
        $acce_classification = $input_acce_classification;
    }
    $input_acce_quantity = trim($_POST["acce_quantity"]);
    if(empty($input_acce_quantity)){
        $acce_quantity_err = "Please enter the Accessory quantity.";     
    }else{
        $acce_quantity = $input_acce_quantity;
    }
    
    if(empty($brand_name_err) && empty($model_name_err) && empty($acce_desc_err) && empty($acce_price_err) && empty($acce_classification_err) && empty($acce_quantity_err)){
        $sql = "UPDATE accessories SET brand_name=?, model_name=?, acce_desc=?, acce_price=?, acce_classification=?, acce_quantity=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_brand_name, $param_model_name, $param_acce_desc, $param_acce_price, $param_acce_classification, $param_acce_quantity, $param_id);
            
    
            $param_brand_name = $brand_name;
            $param_model_name = $model_name;
            $param_acce_desc = $acce_desc;
            $param_acce_price = $acce_price;
            $param_acce_classification = $acce_classification;
            $param_acce_quantity = $acce_quantity;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: admin-accessories.php");
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
        $sql = "SELECT * FROM 'accessories' WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $brand_name = $row["brand_name"];
                    $model_name = $row["model_name"];
                    $acce_desc = $row["acce_desc"];
                    $acce_price = $row["acce_price"];
                    $acce_classification = $row["acce_classification"];
                    $acce_quantity = $row["acce_quantity"];
                } else{
                    header("location: update-accessories.php");
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
    <title>New Accessories | Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Update Accessory</h2>
  <p>Please fill this form to add a accessory.</p>
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
  <input type="" name="acce_quantity" class="form-control" value="<?php echo $acce_quantity; ?>">
  <span class="help-block"><?php echo $acce_quantity_err; ?></span>
  </div>
  </div>

  <div class="bottom-btn-area two-btn">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin-accessories.php" class="btn btn-default">Cancel</a>
</div>
                    </form>
                </div>
</div>
    </section>
</body>
</html>