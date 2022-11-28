<?php

require_once "config.php";
 

$bike_brand = $bike_model = $bike_desc = $bike_price = $bike_classification = $bike_quantity = "";
$bike_brand_err = $bike_model_err = $bike_desc_err = $bike_price_err = $bike_classification_err = $bike_quantity_err = "";
 

if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    
    $input_name = trim($_POST["bike_brand"]);
    if(empty($input_name)){
        $bike_brand_err = "Please enter a brand name.";
    } else{
        $bike_brand = $input_name;
    }
    

    $input_bike_model = trim($_POST["bike_model"]);
    if(empty($input_bike_model)){
        $bike_model_err = "Please enter an model name.";     
    } else{
        $bike_model = $input_bike_model;
    }
    
    $input_bike_desc = trim($_POST["bike_desc"]);
    if(empty($input_bike_desc)){
        $bike_desc_err = "Please enter the Bike description.";     
    }else{
        $bike_desc = $input_bike_desc;
    }
    $input_bike_price = trim($_POST["bike_price"]);
    if(empty($input_bike_price)){
        $bike_price_err = "Please enter the Bike price.";     
    }else{
        $bike_price = $input_bike_price;
    }
    $input_bike_classification = trim($_POST["bike_classification"]);
    if(empty($input_bike_classification)){
        $capacity_err = "Please enter the Bike classification.";     
    }else{
        $bike_classification = $input_bike_classification;
    }
    $input_bike_quantity = trim($_POST["bike_quantity"]);
    if(empty($input_bike_quantity)){
        $bike_quantity_err = "Please enter the Bike quantity.";     
    }else{
        $bike_quantity = $input_bike_quantity;
    }
    
    if(empty($bike_brand_err) && empty($bike_model_err) && empty($bike_desc_err) && empty($bike_price_err) && empty($bike_classification_err) && empty($bike_quantity_err)){
        $sql = "UPDATE bikes SET bike_brand=?, bike_model=?, bike_desc=?, bike_price=?, bike_classification=?, bike_quantity=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssssi", $param_bike_brand, $param_bike_model, $param_bike_desc, $param_bike_price, $param_bike_classification, $param_bike_quantity, $param_id);
            
    
            $param_bike_brand = $bike_brand;
            $param_bike_model = $bike_model;
            $param_bike_desc = $bike_desc;
            $param_bike_price = $bike_price;
            $param_bike_classification = $bike_classification;
            $param_bike_quantity = $bike_quantity;
            $param_id = $id;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: admin-bikes.php");
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
        $sql = "SELECT * FROM 'bikes' WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $id;
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $bike_brand = $row["bike_brand"];
                    $bike_model = $row["bike_model"];
                    $bike_desc = $row["bike_desc"];
                    $bike_price = $row["bike_price"];
                    $bike_classification = $row["bike_classification"];
                    $bike_quantity = $row["bike_quantity"];
                } else{
                    header("location: update-bikes.php");
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
    <title>New Bikes | Update</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Update Bike</h2>
  <p>Please fill this form to add a Bike.</p>
  <form class="reset-form" action="
  <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"  enctype="multipart/form-data">
  <div class="add-cont">
  <div class="form-group <?php echo (!empty($bike_brand_err)) ? 'has-error' : ''; ?>">
  <label for="">Brand name</label>
  <input type="text" name="bike_brand" class="form-control" value="<?php echo $bike_brand; ?>">
  <span class="help-block"><?php echo $bike_brand_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($bike_model_err)) ? 'has-error' : ''; ?>">
  <label for="">Model name</label>
  <input type="text" name="bike_model" class="form-control" value="<?php echo $bike_model; ?>">
  <span class="help-block"><?php echo $bike_model_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($bike_desc_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike description</label>
  <input type="text" name="bike_desc" class="form-control" value="<?php echo $bike_desc; ?>">
  <span class="help-block"><?php echo $bike_desc_err; ?></span>
  </div>


  <div class="form-group <?php echo (!empty($bike_price_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike price</label>
  <input type="number" name="bike_price" class="form-control" value="<?php echo $bike_price; ?>">
  <span class="help-block"><?php echo $bike_price_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($bike_classification_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike classification</label>
  <input type="" name="bike_classification" class="form-control" value="<?php echo $bike_classification; ?>">
  <span class="help-block"><?php echo $bike_classification_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($bike_quantity_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike quantity</label>
  <input type="" name="bike_quantity" class="form-control" value="<?php echo $bike_quantity; ?>">
  <span class="help-block"><?php echo $bike_quantity_err; ?></span>
  </div>
  </div>

  <div class="bottom-btn-area two-btn">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="admin-bikes.php" class="btn btn-default">Cancel</a>
</div>
                    </form>
                </div>
</div>
    </section>
</body>
</html>