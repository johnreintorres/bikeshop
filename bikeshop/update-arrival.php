<?php

require_once "config.php";
 

$brand_name = $model_name = $product_desc = $product_price = $product_classification = $product_quantity = "";
$brand_name_err = $model_name_err = $product_desc_err = $product_price_err = $product_classification_err = $product_quantity_err = "";
 

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
    
    $input_product_desc = trim($_POST["product_desc"]);
    if(empty($input_product_desc)){
        $product_desc_err = "Please enter the product description.";     
    }else{
        $product_desc = $input_product_desc;
    }
    $input_product_price = trim($_POST["product_price"]);
    if(empty($input_product_price)){
        $product_price_err = "Please enter the product price.";     
    }else{
        $product_price = $input_product_price;
    }
    $input_product_classification = trim($_POST["product_classification"]);
    if(empty($input_product_classification)){
        $capacity_err = "Please enter the product classification.";     
    }else{
        $product_classification = $input_product_classification;
    }
    $input_product_quantity = trim($_POST["product_quantity"]);
    if(empty($input_product_quantity)){
        $product_quantity_err = "Please enter the product quantity.";     
    }else{
        $product_quantity = $input_product_quantity;
    }
    
    if(empty($brand_name_err) && empty($model_name_err) && empty($product_desc_err) && empty($product_price_err) && empty($product_classification_err) && empty($product_quantity_err)){
        $sql = "UPDATE new_arrivals SET brand_name=?, model_name=?, product_desc=?, product_price=?, product_classification=?, product_quantity=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_brand_name, $param_model_name, $param_product_desc, $param_product_price, $param_product_classification, $param_product_quantity, $param_id);
            
    
            $param_brand_name = $brand_name;
            $param_model_name = $model_name;
            $param_product_desc = $product_desc;
            $param_product_price = $product_price;
            $param_product_classification = $product_classification;
            $param_product_quantity = $product_quantity;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: admin-new-arrival.php");
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
        $sql = "SELECT * FROM 'new_arrivals' WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $brand_name = $row["brand_name"];
                    $model_name = $row["model_name"];
                    $product_desc = $row["product_desc"];
                    $product_price = $row["product_price"];
                    $product_classification = $row["product_classification"];
                    $product_quantity = $row["product_quantity"];
                } else{
                    header("location: update-arrival.php");
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
    <title>New arrival | Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Update Product</h2>
  <p>Please fill this form to add a product.</p>
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

  <div class="bottom-btn-area two-btn">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin-new-arrival.php" class="btn btn-default">Cancel</a>
</div>
                    </form>
                </div>
</div>
    </section>
</body>
</html>