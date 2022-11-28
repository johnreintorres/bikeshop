<?php
session_start();
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){           
    require_once "config-oop.php";
    
    $sql = "SELECT * FROM bikes WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
      $stmt->bindParam(":id", $param_id);
      $param_id = trim($_GET["id"]);
      if($stmt->execute()){

          if($stmt->rowCount() == 1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $bike_model = $row["bike_model"];
                $bike_price = $row["bike_price"];
                $bike_quantity = $row["bike_quantity"];
                $bike_desc = $row["bike_desc"];
                $bike_classification = $row["bike_classification"];
                $freebies = $row["freebies"];
                $color1 = $row["color1"];
                $color2 = $row["color2"];
                $color3 = $row["color3"];
                $color4 = $row["color4"];
                $frame = $row["frame"];
                $fork = $row["fork"];
                $shifter = $row["shifter"];
                $rd = $row["rd"];
                $fd = $row["fd"];
                $cassett = $row["cassett"];
                $chain = $row["chain"];
                $breaks = $row["breaks"];
                $wheelset = $row["wheelset"];
                $tyre = $row["tyre"];
                $chainwheel = $row["chainwheel"];
                $hub = $row["hub"];
                $saddle = $row["saddle"];
                $seatpost = $row["seatpost"];
                $stem = $row["stem"];
                $handlebar = $row["handlebar"];
                $image = $row["image"];
                $display = "block";


                if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
                  require_once "config.php";
                  $sql2 = "INSERT INTO user_cart (product_name, product_price, product_quantity, image) VALUES (?, ?, ?, '".$image."')";
                  if($stmt = mysqli_prepare($link, $sql2)){
                  mysqli_stmt_bind_param($stmt, "sss", $param_product_name, $param_product_price, $param_product_quantity);

                  $param_product_name = $bike_model;
                  $param_product_price = $bike_price;
                  $param_product_quantity = $bike_quantity;
                  if(mysqli_stmt_execute($stmt)){
                    header("location: cart.php");
                   } else {
                     echo "Error: Could not be able to execute $sql2. " . mysqli_error($link);
                   }
              } 
            }
            } else{
                header("location: error.php");
                exit();
            }
            
           
          } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    } 
     
    
    unset($stmt);
    unset($pdo);
} else{
    header("location: error.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Bikes | Home</title>
</head>
<body>
  
  <nav class="bikes-nav">
    <ul>
    <a class="menu-links" href="new-arrival.php"><li>New arrivals</li></a>
    <a class="menu-links" href="bikes.php"><li>Bikes</li></a>
    <a class="menu-links" href="spare-parts.php"><li>Spare parts</li></a>
    <a href="index.php"><i class="fas fa-bicycle"></i></a>
    <a class="menu-links" href="accessories.php"><li>Accessories</li></a>
    <a class="menu-links" href="news.php"><li>News</li></a>
    <a class="menu-links" href="contact.php"><li>Contact</li></a>
    <a class='menu-links' href='admin-logout.php' style="display: none"><li>logout</li></a>
    <a class="menu-links" href="cart.php"><img class="add-to-cart-img" src="assets/images/cart.png" alt=""></a>
    </ul>
     <div class="menu-area-btn">
                <div id="menu-icon">
                  <div class="icon-set">
                    <a class="hamburger">
                      <span></span>
                      <span></span>
                      <span></span>
                      <span></span>
                    </a>
                  </div>
                </div>
                <div id="slideout-menu">
                    <ul>
                    <a class="menu-links" href="new-arrival.php"><li>New arrivals</li></a>
                    <a class="menu-links" href="bikes.php"><li>Bikes</li></a>
                    <a class="menu-links" href="spare-parts.php"><li>Spare parts</li></a>
                    <a class="menu-links" href="accessories.php"><li>Accessories</li></a>
                    <a class="menu-links" href="news.php"><li>News</li></a>
                    <a class="menu-links" href="contact.php"><li>Contact</li></a>
                    <div class="sp-footer-icons">
                    <a href="index.php"><i class="fas fa-bicycle"></i></a>
                    <a href="cart.php"><img class="add-to-cart-img" src="assets/images/cart.png" alt=""></a>
                    </div>  
                  </ul>
                  </div>
              </div>
  </nav>



  <section>
    <div class="clicked-display-area">
      <div class="clicked-display-section">
        <div class="clicked-content">
        <div class="clicked-left-area">
        <div class="clicked-main-carousel">
        <div class="main-carousel-content"><img src="<?php echo $row['image'] ?>" alt=""></div>
        <div class="main-carousel-content"><img src="assets/images/frame-1.jpeg" alt=""></div>
        <div class="main-carousel-content"><img src="assets/images/pedal-1.jpeg" alt=""></div>
        <div class="main-carousel-content"><img src="assets/images/crank-1.jpeg" alt=""></div>
        <div class="main-carousel-content"><img src="assets/images/saddle-1.jpeg" alt=""></div>

        <div class="main-carousel-content"><img src="https://www.leisurelakesbikes.com/images/specialized-enduro-comp-650b-2018.jpg" alt=""></div>
        <div class="main-carousel-content"><img src="assets/images/red-mtb.jpg" alt=""></div>
        <div class="main-carousel-content"><img src="https://i2.wp.com/omertabike.com/wp-content/uploads/2017/11/442.jpg?fit=1200%2C669&ssl=1" alt=""></div>
        <div class="main-carousel-content"><img src="https://bicyclechain.co.uk/content/products/specialized-enduro-elite-29er-2016_36230.jpg" alt=""></div>
        
            


      </div>
     <div class="sub-cont">
     <div class="clicked-sub-carousel">
     <a href="" data-slide="1"><div class="sub-carousel-content"> <img src="assets/images/black-mtb.jpg" alt=""></div></a>
     <a href="" data-slide="2"><div class="sub-carousel-content"> <img src="assets/images/frame-1.jpeg" alt=""></div></a>
     <a href="" data-slide="3"><div class="sub-carousel-content"> <img src="assets/images/pedal-1.jpeg" alt=""></div></a>
     <a href="" data-slide="4"><div class="sub-carousel-content"> <img src="assets/images/crank-1.jpeg" alt=""></div></a>
     <a href="" data-slide="5"><div class="sub-carousel-content"> <img src="assets/images/saddle-1.jpeg" alt=""></div></a>
      </div>
      </div>
        </div>

      <div class="clicked-right-area">
        <div class="product-details-area">
                 <div class="clicked-sale-carousel-content">
                <div class="left-clicked-text">
                  <h2 class="clicked-model-title"><?php echo $row["bike_model"] ?></h2>
                  <span class="clicked-model-subtitle">with <?php echo $freebies ?></span>
                  <h2 class="clicked-model-price">₱<?php echo $row["bike_price"] ?></h2>

                  <div class="clicked-size-carousel-area">
                  <!-- <div class="clicked-size-carousel-title"><span class="size-title">Colors</span></div> -->
                    <div class="clicked-size-carousel">
                        <a href="" data-slide=""><div class="clicked-size-content1">20</div></a>
                        <a href="" data-slide=""><div class="clicked-size-content2">24</div></a>
                        <a href="" data-slide=""><div class="clicked-size-content3">26</div></a>
                        <a href="" data-slide=""><div class="clicked-size-content4">29</div></a>
                    </div>  
                    </div>
                    </div>
          
                <div class="clicked-color-carousel-area">
                  <div class="clicked-color-carousel-title"><span class="colors-title">Colors</span></div>
                    <div class="clicked-color-carousel">
                    <a href="" data-slide="6"><div class="clicked-color-content1" style="background-color: <?php echo $color1 ?>"></div></a>
                    <a href="" data-slide="7"><div class="clicked-color-content2" style="background-color: <?php echo $color2 ?>"></div></a>
                    <a href="" data-slide="8"><div class="clicked-color-content3" style="background-color: <?php echo $color3 ?>; display: <?php echo $display ?>"></div></a>
                    <a href="" data-slide="9"><div class="clicked-color-content4" style="background-color: <?php echo $color4 ?>"></div></a>
                    </div>  
                    </div>
                    <div class="clicked-left-carousel-cart">
                    <form action="" method="post">
                    <input type="submit" class="clicked-left-carousel-cart-btn" name="btn_submit" value="Add to cart"> 
                    </form>
                    </div>
                <div class="clicked-desc-area">
                    <div class="clicked-desc-title"><h2 class="desc-title">Description</h2></div>
                
                <div class="clicked-desc-content">
                    <p class="desc-content-p"><?php echo $bike_desc ?></p>
                </div>
                  </div>
                  </div>
        </div>
      </div>

        </div>
      </div>
    </div>
  </section>


  <section>
    <div class="specs-area">
    <div class="news-events-header">
            <div class="news-events-header-top">
            <div class="news-events-header-top-text">
            <div class="news-events-header-text-vert">
            <h2 class="header-news-events-title">Details</h2>
            <h2 class="and">&</h2>
            </div>
            <h2 class="news-events-title-text">Specifications</h2>   
            </div>
            <div class="news-events-header-line"></div>
            </div>
        </div>
      <div class="specs-section">
      <div class="specs-details">
        
      <div class="specs-content"><h2>Color: </h2> <span><?php echo $color1 ?>,<?php echo $color2 ?>,<?php echo $color3 ?>,<?php echo $color4 ?></span></div>
      <div class="specs-content"><h2>Frame :</h2><span><?php echo $frame ?></span></div>
      <div class="specs-content"><h2>Fork : </h2><span><?php echo $fork ?></span></div>
      <div class="specs-content"><h2>Shifter :</h2><span><?php echo $shifter ?></span></div>
      <div class="specs-content"><h2>Fd : </h2><span><?php echo $fd ?></span></div>
      <div class="specs-content"><h2>Rd :</h2><span><?php echo $rd ?></span></div>
      <div class="specs-content"><h2>Cassett :</h2><span><?php echo $cassett ?></span></div>
      <div class="specs-content"><h2>Chain : </h2><span><?php echo $chain ?></span></div>
      <div class="specs-content"><h2>Brake : </h2><span><?php echo $breaks ?></span></div>
      <div class="specs-content"><h2>Wheel Set :</h2><span><?php echo $wheelset ?></span></div>
      <div class="specs-content"><h2>Tyre :</h2><span><?php echo $tyre ?></span></div>
      <div class="specs-content"><h2>Chainwheel :</h2><span><?php echo $chainwheel ?></span></div>
      <div class="specs-content"><h2>Hub :</h2><span><?php echo $hub ?></span></div>
      <div class="specs-content"><h2>Saddle :</h2><span><?php echo $saddle ?></span></div>
      <div class="specs-content"><h2>Seatpost:</h2><span><?php echo $seatpost ?></span></div>
      <div class="specs-content"><h2>Stem :</h2><span><?php echo $stem ?></span></div>
      <div class="specs-content"><h2>Handlebar : </h2><span><?php echo $handlebar ?></span></div>
      </div>
</div>
      </div>
    </div>
  </section>

  <section>
    <div class="related-area">
    <div class="supplier-index-header">
            <div class="supplier-index-header-top">
            <div class="supplier-index-header-top-text">
            <h2 class="header-supplier-index-title">Related</h2>
            <div class="supplier-index-header-text-vert">
            <h2 class="supplier-and">+</h2>
            <h2 class="supplier-index-title-text">Products</h2>   
             </div>
            </div>
            <div class="supplier-index-header-line"></div>
            </div>
        </div>
      <div class="related-section">
          <div class="related-carousel">
             <a href="clicked-id.php" class="sale-content-link">
          <div class="sale-content-container">
            <img src="https://images.giant-bicycles.com/b_white,c_pad,h_650,q_80/jquyhw6lafo3d8tjf96m/MY20TCXSLR1_ColorA.jpg" alt="">
            <h2 class="product-name">Product</h2>
            <span class="sale-price">₱2000</span>
          </div>
          </a>
          <a href="clicked-id.php" class="sale-content-link">
          <div class="sale-content-container">
            <img src="https://bicyclechain.co.uk/content/products/giant-tcx-slr-1-cyclo-cross-2017_38603.jpg" alt="">
            <h2 class="product-name">Product</h2>
            <span class="sale-price">₱2000</span>
          </div>
          </a>
          <a href="clicked-id.php" class="sale-content-link">
          <div class="sale-content-container">
            <img src="https://www.altitude.ie/images/tcxslr1.jpg" alt="">
            <h2 class="product-name">Product</h2>
            <span class="sale-price">₱2000</span>
          </div>
          </a>

         </div>
      </div>
    </div>
  </section>

  <a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a>
   <footer>
    <div class="footer-area">
      <div class="footer-section">
        <div class="footer-content">
          <div class="footer-contact-info">
          <h2>New Arrivals</h2>
          <div class="footer-nav-acce">
          <ul>
            <a class="menu-links" href="new-arrival.php"><li>Raleigh</li></a>
            <a class="menu-links" href="bikes.php"><li>Focus</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Felt</li></a>
            <a class="menu-links" href="accessories.php"><li>Specialized</li></a>
            <a class="menu-links" href="news.php"><li>Trek</li></a>
            <a class="menu-links" href="contact.php"><li>Cannondale</li></a>
          </ul>
          </div>

        </div>
        <div class="footer-contact-info">
        <h2>Bikes</h2>
        <div class="footer-nav-acce">
          <ul>
            <a class="menu-links" href="accessories.php"><li>Mountain Bikes</li></a>
            <a class="menu-links" href="accessories.php"><li>Road Bikes</li></a>
            <a class="menu-links" href="accessories.php"><li>Folding Bikes</li></a>
            <a class="menu-links" href="accessories.php"><li>Hybrid Bikes</li></a>
            <a class="menu-links" href="accessories.php"><li>Cyclocross Bikes</li></a>
            <a class="menu-links" href="accessories.php"><li>Commuter Bikes</li></a>
          </ul>
          </div>
        </div>
        <div class="footer-contact-info">
        <h2>Accessories</h2>
        <div class="footer-nav-acce">
          <ul>
            <a class="menu-links" href="spare-parts.php"><li>Backpacks</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Trailers</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Lighting</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Merchandise</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Bottles & Bottle Cages</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Locks</li></a>
          </ul>
          </div>
        </div>
        <div class="footer-contact-info">
        <h2>Spare Parts</h2>
        <div class="footer-nav-acce">
          <ul>
            <a class="menu-links" href="spare-parts.php"><li>Drivetrain</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Breaks</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Groupsets</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Tyres</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Wheels</li></a>
            <a class="menu-links" href="spare-parts.php"><li>Forks</li></a>
          </ul>
          </div>
        </div>
        <div class="footer-contact-info">
        <h2>Contact</h2>
        <div class="footer-nav-acce">
          <ul class="admin-social-links">
          <div class="footer-contanct-det"><i class="fas fa-map-marker-alt address-maps-li"></i><span>0804 Tinurik Tanauan city, Batangas</span></div> 
         <div class="footer-contanct-det"><i class="fas fa-phone"></i><span>1(800)555-5555</span></div>
         <div class="footer-contanct-det"><i class="fas fa-envelope"></i><span>company@gmail.com</span></div>
          <div class="footer-top"><a class="footer-link-btn" href="login.php"><li>ADMIN</li></a></div>
          <h2 class="footer-follow">FOLLOW US</h2>
          <div class="footer-social-links">  
     
        <a href="#"><i class="fab fa-facebook-f social-li"></i></a>
        <a href="#"><i class="fab fa-twitter social-li"></i></a>
        <a href="#"><i class="fab fa-instagram social-li"></i></a>
        <a href="#"><i class="fab fa-linkedin-in social-li"></i></a>
        <a href="#"><i class="fab fa-whatsapp social-li"></i></a>
        <a href="#"><i class="fab fa-youtube social-li"></i></a>
          </ul>
          </div>
          </div>
        </div>
        </div>

      <div class="footer-bottom">
        <div class="footer-bottom-cont">
          <div class="copyright">
          <a class="footer-icon" href="index.php"><i class="fas fa-bicycle"></i></a>
              <span>2020 Bike shop. All right reserved</span>
          </div>
         
        </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://kit.fontawesome.com/d6c8aac0cb.js" crossorigin="anonymous"></script>
  <script src="assets/js/bikes.js"></script>
</body>
</html>