<?php 
session_start();
require_once "config.php";

$bike_brand = $bike_model = $bike_desc = $bike_price = $bike_classification = $bike_quantity = $freebies = $color1 = $color2 = $color3 = $color4 = $frame = $fork = $shifter = $rd = $fd = $cassett = $chain = $breaks = $wheelset = $tyre = $chainwheel = $hub = $saddle = $seatpost = $stem = $handlebar = "";
$bike_brand_err = $bike_model_err = $bike_desc_err = $bike_price_err = $bike_classification_err = $bike_quantity_err = $freebies_err = $color1_err = $color2_err = $color3_err = $color4_err = $frame_err = $fork_err = $shifter_err = $rd_err = $fd_err = $cassett_err = $chain_err = $breaks_err = $wheelset_err = $tyre_err = $chainwheel_err = $hub_err = $saddle_err = $seatpost_err = $stem_err = $handlebar_err = "";
if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
  if(empty(trim($_POST["bike_brand"]))){
    $bike_brand_err = "Please enter bike name.";
  }  else if(ctype_upper($_POST["bike_brand"])){
    $bike_brand_err = "Please use small letters only";
  } else {
    $bike_brand = trim($_POST["bike_brand"]);
  }

   
    if(empty(trim($_POST["bike_model"]))){
      $bike_model_err = "Please enter bike_model.";
    } else {
      $bike_model = trim($_POST["bike_model"]);
    }   
    if(empty(trim($_POST["bike_desc"]))){
      $bikes_desc_err = "Please enter bike description.";
    } else {
      $bike_desc = trim($_POST["bike_desc"]);
    }   
    if(empty(trim($_POST["bike_price"]))){
      $bike_price_err = "Please enter bike_price.";
    } else {
      $bike_price = trim($_POST["bike_price"]);
    } 
    if(empty(trim($_POST["bike_classification"]))){
      $bike_classification_err = "Please enter bike_classification.";
    } else {
      $bike_classification = trim($_POST["bike_classification"]);
    } 
    if(empty(trim($_POST["bike_quantity"]))){
      $bike_quantity_err = "Please enter bike_quantity.";
    } else {
      $bike_quantity = trim($_POST["bike_quantity"]);
    } 
    if(empty(trim($_POST["freebies"]))){
      $freebies_err = "Please enter freebies.";
    } else if(trim($_POST["freebies"]) == "N/A"){
      $freebies = trim($_POST["freebies"]);
    } else {
      $freebies = trim($_POST["freebies"]);
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
    if(empty(trim($_POST["color4"]))){
      $color4_err = "Please enter fourth color.";
    } else if(trim($_POST["color4"]) == "N/A"){
      $color4 = trim($_POST["color4"]);
    } else {
      $color4 = trim($_POST["color4"]);
    } 
    if(empty(trim($_POST["frame"]))){
      $frame_err = "Please enter frame.";
    } else {
      $frame = trim($_POST["frame"]);
    } 
    if(empty(trim($_POST["fork"]))){
      $fork_err = "Please enter fork.";
    } else {
      $fork = trim($_POST["fork"]);
    } 
    if(empty(trim($_POST["shifter"]))){
      $shifter_err = "Please enter shifter.";
    } else {
      $shifter = trim($_POST["shifter"]);
    } 
    if(empty(trim($_POST["rd"]))){
      $rd_err = "Please enter rd.";
    } else {
      $rd = trim($_POST["rd"]);
    } 
    if(empty(trim($_POST["fd"]))){
      $fd_err = "Please enter fd.";
    } else {
      $fd = trim($_POST["fd"]);
    } 
    if(empty(trim($_POST["cassett"]))){
      $cassett_err = "Please enter cassett.";
    } else {
      $cassett = trim($_POST["cassett"]);
    } 
    if(empty(trim($_POST["chain"]))){
      $chain_err = "Please enter chain.";
    } else {
      $chain = trim($_POST["chain"]);
    } 
    if(empty(trim($_POST["breaks"]))){
      $breaks_err = "Please enter breaks.";
    } else {
      $breaks = trim($_POST["breaks"]);
    } 
    if(empty(trim($_POST["wheelset"]))){
      $wheelset_err = "Please enter wheelset.";
    } else {
      $wheelset = trim($_POST["wheelset"]);
    } 
    if(empty(trim($_POST["tyre"]))){
      $tyre_err = "Please enter tyre.";
    } else {
      $tyre = trim($_POST["tyre"]);
    } 
    if(empty(trim($_POST["chainwheel"]))){
      $chainwheel_err = "Please enter chainwheel.";
    } else {
      $chainwheel = trim($_POST["chainwheel"]);
    } 
    if(empty(trim($_POST["hub"]))){
      $hub_err = "Please enter hub.";
    } else {
      $hub = trim($_POST["hub"]);
    } 
    if(empty(trim($_POST["saddle"]))){
      $saddle_err = "Please enter saddle.";
    } else {
      $saddle = trim($_POST["saddle"]);
    } 
    if(empty(trim($_POST["seatpost"]))){
      $seatpost_err = "Please enter seatpost.";
    } else {
      $seatpost = trim($_POST["seatpost"]);
    } 
    if(empty(trim($_POST["stem"]))){
      $stem_err = "Please enter stem.";
    } else {
      $stem = trim($_POST["stem"]);
    } 
    if(empty(trim($_POST["handlebar"]))){
      $handlebar_err = "Please enter handlebar.";
    } else {
      $handlebar = trim($_POST["handlebar"]);
    } 
 
 
  if(empty($bike_brand_err) && empty($bike_model_err) && empty($bike_desc_err) && empty($bike_price_err) && empty($bike_classification_err) && empty($bike_quantity_err) && empty($freebies_err) && empty($color1_err) && empty($color2_err) && empty($color3_err) && empty($color4_err) && empty($frame_err) && empty($fork_err) && empty($shifter_err) && empty($rd_err) && empty($fd_err) && empty($cassett_err) && empty($chain_err) && empty($breaks_err) && empty($wheelset_err) && empty($tyre_err) && empty($chainwheel_err) && empty($hub_err) && empty($saddle_err) && empty($seatpost_err) && empty($stem_err) && empty($handlebar_err)){
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
   
    $sql = "INSERT INTO bikes (bike_brand, bike_model, bike_desc, bike_price, bike_classification, bike_quantity, image, freebies, color1, color2, color3, color4, frame, fork, shifter, rd, fd, cassett, chain, breaks, wheelset, tyre, chainwheel, hub, saddle, seatpost, stem, handlebar) VALUES (?, ?, ?, ?, ?, ?, '".$image."', ?, ?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssssssssssss", $param_bike_brand, $param_bike_model, $param_bike_desc, $param_bike_price, $param_bike_classification, $param_bike_quantity, $param_freebies, $param_color1, $param_color2, $param_color3, $param_color4, $param_frame, $param_fork, $param_shifter, $param_rd, $param_fd, $param_cassett, $param_chain, $param_breaks, $param_wheelset, $param_tyre, $param_chainwheel, $param_hub, $param_saddle, $param_seatpost, $param_stem, $param_handlebar );
        $param_bike_brand = $bike_brand;
        $param_bike_model = $bike_model;
        $param_bike_desc = $bike_desc;
        $param_bike_price = $bike_price;
        $param_bike_classification = $bike_classification;
        $param_bike_quantity = $bike_quantity;
        $param_freebies = $freebies;
        $param_color1 = $color1;
        $param_color2 = $color2;
        $param_color3 = $color3;
        $param_color4 = $color4;
        $param_frame = $frame;
        $param_fork = $fork;
        $param_shifter = $shifter;
        $param_rd = $rd;
        $param_fd = $fd;
        $param_cassett = $cassett;
        $param_chain = $chain;
        $param_breaks = $breaks;
        $param_wheelset = $wheelset;
        $param_tyre = $tyre;
        $param_chainwheel = $chainwheel;
        $param_hub = $hub;
        $param_saddle = $saddle;
        $param_seatpost = $seatpost;
        $param_stem = $stem;
        $param_handlebar = $handlebar;
            if(mysqli_stmt_execute($stmt)){
             header("location: admin-bikes.php");
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
  <title>Bikes | Bikes</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="admin-html-body">
<section class="add-section-data">

<div class="form-area">
  <div class="form-section card-signup">

  <h2>Add New Bike</h2>
  <p>Please fill this form to add a bike.</p>
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

  <div class="form-group <?php echo (!empty($freebies_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike freebies</label>
  <input type="" name="freebies" class="form-control" value="<?php echo $freebies; ?>">
  <span class="help-block"><?php echo $freebies_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color1_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike color 1</label>
  <input type="" name="color1" class="form-control" value="<?php echo $color1; ?>">
  <span class="help-block"><?php echo $color1_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color2_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike color 2</label>
  <input type="" name="color2" class="form-control" value="<?php echo $color2; ?>">
  <span class="help-block"><?php echo $color2_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color3_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike color 3</label>
  <input type="" name="color3" class="form-control" value="<?php echo $color3; ?>">
  <span class="help-block"><?php echo $color3_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($color4_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike color 4</label>
  <input type="" name="color4" class="form-control" value="<?php echo $color4; ?>">
  <span class="help-block"><?php echo $color4_err; ?></span>
  </div>

  <div class="form-group <?php echo (!empty($frame_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike frame</label>
  <input type="" name="frame" class="form-control" value="<?php echo $frame; ?>">
  <span class="help-block"><?php echo $frame_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($fork_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike fork</label>
  <input type="" name="fork" class="form-control" value="<?php echo $fork; ?>">
  <span class="help-block"><?php echo $fork_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($shifter_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike shifter</label>
  <input type="" name="shifter" class="form-control" value="<?php echo $shifter; ?>">
  <span class="help-block"><?php echo $shifter_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($rd_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike rd</label>
  <input type="" name="rd" class="form-control" value="<?php echo $rd; ?>">
  <span class="help-block"><?php echo $rd_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($fd_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike fd</label>
  <input type="" name="fd" class="form-control" value="<?php echo $fd; ?>">
  <span class="help-block"><?php echo $fd_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($cassett_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike cassett</label>
  <input type="" name="cassett" class="form-control" value="<?php echo $cassett; ?>">
  <span class="help-block"><?php echo $cassett_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($chain_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike chain</label>
  <input type="" name="chain" class="form-control" value="<?php echo $chain; ?>">
  <span class="help-block"><?php echo $chain_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($breaks_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike breaks</label>
  <input type="" name="breaks" class="form-control" value="<?php echo $breaks; ?>">
  <span class="help-block"><?php echo $breaks_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($wheelset_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike wheelset</label>
  <input type="" name="wheelset" class="form-control" value="<?php echo $wheelset; ?>">
  <span class="help-block"><?php echo $wheelset_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($tyre_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike tyre</label>
  <input type="" name="tyre" class="form-control" value="<?php echo $tyre; ?>">
  <span class="help-block"><?php echo $tyre_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($chain_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike chainwheel</label>
  <input type="" name="chainwheel" class="form-control" value="<?php echo $chainwheel; ?>">
  <span class="help-block"><?php echo $chain_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($hub_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike hub</label>
  <input type="" name="hub" class="form-control" value="<?php echo $hub; ?>">
  <span class="help-block"><?php echo $hub_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($saddle_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike saddle</label>
  <input type="" name="saddle" class="form-control" value="<?php echo $saddle; ?>">
  <span class="help-block"><?php echo $saddle_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($seatpost_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike seatpost</label>
  <input type="" name="seatpost" class="form-control" value="<?php echo $seatpost; ?>">
  <span class="help-block"><?php echo $seatpost_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($stem_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike stem</label>
  <input type="" name="stem" class="form-control" value="<?php echo $stem; ?>">
  <span class="help-block"><?php echo $stem_err; ?></span>
  </div>
  <div class="form-group <?php echo (!empty($handlebar_err)) ? 'has-error' : ''; ?>">
  <label for="">Bike handlebar</label>
  <input type="" name="handlebar" class="form-control" value="<?php echo $handlebar; ?>">
  <span class="help-block"><?php echo $handlebar_err; ?></span>
  </div>

  </div>

<div class="form-btn-area">
<div class="form-btn-img-area">
<img src="https://cobblestone.me/wp-content/plugins/photonic/include/images/placeholder.png" onclick="triggerClick()" alt="" class="placeholder-img" id="profileDisplay">
<label for="file">Upload Bike Image</label>
<input type="file" name="file" onchange="displayImage(this)" id="file" style="display: none;">
</div>
 <div class="bottom-btn-area">
  <input type="submit" class="btn btn-primary form-btn" name="btn_submit" value="Add bike"> 
  <input type="reset" class="btn btn-default form-btn" value="Reset"> 
  <a href="admin-bikes.php" class="btn  form-btn"> Cancel</a>
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


