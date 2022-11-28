<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "config-oop.php";
    $sql = "SELECT * FROM new_arrivals WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
      $stmt->bindParam(":id", $param_id);
      $param_id = trim($_GET["id"]);
      if($stmt->execute()){
    
        if($stmt->rowCount() == 1){
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $model_name = $row["model_name"];
                $product_price = $row["product_price"];
                $product_quantity = $row["product_quantity"];
                $image = $row["image"];
                if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
                  require_once "config.php";
                $sql2 = "INSERT INTO user_cart (product_name, product_price, product_quantity, image) VALUES (?, ?, ?, '".$image."')";
                if($stmt = mysqli_prepare($link, $sql2)){
                mysqli_stmt_bind_param($stmt, "sss", $param_product_name, $param_product_price, $param_product_quantity);
   
                $param_product_name = $model_name;
                $param_product_price = $product_price;
                $param_product_quantity = $product_quantity;
                if(mysqli_stmt_execute($stmt)){
                  header("location: cart.php");
                 } else {
                   echo "Error: Could not be able to execute $sql2. " . mysqli_error($link);
                 }
            } 
          }
        }else{
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
        <div class="main-carousel-content"><img src="<?php echo $image ?>" alt=""></div>
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
                  <h2 class="clicked-model-title"><?php echo $row["model_name"] ?></h2>
                  <span class="clicked-model-subtitle">with Rim Explorer</span>
                  <h2 class="clicked-model-price">₱<?php echo $row["product_price"] ?></h2>

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
                    <a href="" data-slide="6"><div class="clicked-color-content1"></div></a>
                    <a href="" data-slide="7"><div class="clicked-color-content2"></div></a>
                    <a href="" data-slide="8"><div class="clicked-color-content4"></div></a>
                    <a href="" data-slide="9"><div class="clicked-color-content3"></div></a>
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
                    <p class="desc-content-p">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia sit iste, itaque sequi totam tempora incidunt culpa alias dolorum ducimus provident perspiciatis? Eius, corporis aliquid voluptatem nostrum voluptas laudantium eaque?</p>
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
        
      <div class="specs-content"><h2>Color: </h2> <span>Red,Green,Black,Orange</span></div>
      <div class="specs-content"><h2>Frame :</h2><span>TRINX Alloy 700C*460,500,540MM</span></div>
      <div class="specs-content"><h2>Fork : </h2><span>Hi-Ten Steel 700C</span></div>
      <div class="specs-content"><h2>Shifter :</h2><span>SHIMANO A050</span></div>
      <div class="specs-content"><h2>Fd : </h2><span>SHIMANO TZ510</span></div>
      <div class="specs-content"><h2>Rd :</h2><span>SHIMANO TZ500</span></div>
      <div class="specs-content"><h2>Cassett :</h2><span> 7S 14-28T</span></div>
      <div class="specs-content"><h2>Chain : </h2><span>KMC 7S</span></div>
      <div class="specs-content"><h2>Brake : </h2><span>Alloy Mechanical Disc</span></div>
      <div class="specs-content"><h2>Wheel Set :</h2><span>TRINX Alloy Double Wall 700C</span></div>
      <div class="specs-content"><h2>Tyre :</h2><span>CST,700*25C</span></div>
      <div class="specs-content"><h2>Chainwheel :</h2><span>TRINX 28,38,48T*170L</span></div>
      <div class="specs-content"><h2>Hub :</h2><span>Disc Hub with Bearing</span></div>
      <div class="specs-content"><h2>Saddle :</h2><span>TRINX Sport</span></div>
      <div class="specs-content"><h2>Seatpost:</h2><span>TRINX Alloy</span></div>
      <div class="specs-content"><h2>Stem :</h2><span>TRINX Alloy</span></div>
      <div class="specs-content"><h2>Handlebar : </h2><span>TRINX Alloy Road</span></div>
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
            <a class="menu-links" href="bikes.php"><li>Mountain Bikes</li></a>
            <a class="menu-links" href="bikes.php"><li>Road Bikes</li></a>
            <a class="menu-links" href="bikes.php"><li>Folding Bikes</li></a>
            <a class="menu-links" href="bikes.php"><li>Hybrid Bikes</li></a>
            <a class="menu-links" href="bikes.php"><li>Cyclocross Bikes</li></a>
            <a class="menu-links" href="bikes.php"><li>Commuter Bikes</li></a>
          </ul>
          </div>
        </div>
        <div class="footer-contact-info">
        <h2>Accessories</h2>
        <div class="footer-nav-acce">
          <ul>
          <a class="menu-links" href="accessories.php"><li>Backpacks</li></a>
            <a class="menu-links" href="accessories.php"><li>Trailers</li></a>
            <a class="menu-links" href="accessories.php"><li>Lighting</li></a>
            <a class="menu-links" href="accessories.php"><li>Merchandise</li></a>
            <a class="menu-links" href="accessories.php"><li>Bottles & Bottle Cages</li></a>
            <a class="menu-links" href="accessories.php"><li>Locks</li></a>
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