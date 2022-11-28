<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
  <title>Bikes | Spare Parts</title>
</head>
<body>
 <nav class="bikes-nav">
    <ul>
    <a class="menu-links" href="admin-new-arrival.php"><li>New arrivals</li></a>
    <a class="menu-links" href="admin-bikes.php"><li>Bikes</li></a>
    <a class="menu-links" href="admin-spare-parts.php"><li>Spare parts</li></a>
    <a href="admin-index.php"><i class="fas fa-bicycle"></i></a>
    <a class="menu-links" href="admin-accessories.php"><li>Accessories</li></a>
    <a class="menu-links" href="admin-news.php"><li>News</li></a>
    <a class="menu-links" href="admin-logout.php"><li>Logout</li></a>
    
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
                    <a class="menu-links" href="admin-new-arrival.php"><li>New arrivals</li></a>
                    <a class="menu-links" href="admin-bikes.php"><li>Bikes</li></a>
                    <a class="menu-links" href="admin-spare-parts.php"><li>Spare parts</li></a>
                    <a class="menu-links" href="admin-accessories.php"><li>Accessories</li></a>
                    <a class="menu-links" href="admin-news.php"><li>News</li></a>
                    <a class="menu-links" href="admin-logout.php"><li>Logout</li></a>
                    <div class="sp-footer-icons">
                    <a href="admin-index.php"><i class="fas fa-bicycle"></i></a>
                    
                    </div>  
                  </ul>
                  </div>
              </div>
  </nav>


<header>
  <div class="parts-header-area">
    <div class="parts-bg-area">
      <h2>BIKE SPARE PARTS</h2>
    </div>
  </div>
</header>


  <section>
    <div class="whole-page-area">
      <div class="whole-page-section">
        
    <div class="filter-area">
      <div class="filter-section">
        <div class="filter-content">
          <div class="accessories-display-title"><h2>SPARE PARTS</h2></div>
          <div class="filter-details">
          
          <form class="filter-form" action="">
          <div class="input-field">
          <div class="accessories-display-subtitle"><h2>CATEGORIES</h2></div>
          <div class="input-field-content">
            <div class="checkbox-div"><input type="checkbox" name="drivetrain" value="drivetrain" id="drivetrain"><label for="drivetrain">Drivetrain</label></div>
            <div class="checkbox-div"><input type="checkbox" name="brakes" value="brakes" id="brakes"><label for="brakes">Breaks</label></div>
            <div class="checkbox-div"><input type="checkbox" name="tyres" value="tyres" id="tyres"><label for="tyres">Tyres</label></div>
            <div class="checkbox-div"><input type="checkbox" name="groupsets" value="groupsets" id="groupsets"><label for="groupsets">Groupsets</label></div>
            <div class="checkbox-div"><input type="checkbox" name="wheels" value="wheels" id="wheels"><label for="wheels">Wheels</label></div>
            <div class="checkbox-div"><input type="checkbox" name="shifters-derailleurs" value="shifters-derailleurs" id="shifters-derailleurs"><label for="shifters-derailleurs">Shifters & Derailleurs</label></div>
            <div class="checkbox-div"><input type="checkbox" name="tubes" value="tubes" id="tubes"><label for="tubes">Tubes</label></div>
            <div class="checkbox-div"><input type="checkbox" name="cockpit" value="cockpit" id="cockpit"><label for="cockpit">Cockpit</label></div>
            <div class="checkbox-div"><input type="checkbox" name="forks" value="forks" id="forks"><label for="forks">Forks</label></div>
            <div class="checkbox-div"><input type="checkbox" name="seatpost" value="seatpost" id="seatpost"><label for="seatpost">Seatposts</label></div>
            <div class="checkbox-div"><input type="checkbox" name="powermeters" value="powermeters" id="powermeters"><label for="powermeters">Power Meters</label></div>
            <div class="checkbox-div"><input type="checkbox" name="saddles" value="saddles" id="saddles"><label for="saddles">Saddles</label></div>
            <div class="checkbox-div"><input type="checkbox" name="frames" value="frames" id="frames"><label for="frames">Frames</label></div>
            <div class="checkbox-div"><input type="checkbox" name="rear-suspension" value="rear-suspension" id="rear-suspension"><label for="rear-suspension">Rear Suspension</label></div>
            </div>
            </div>
            <div class="input-field">
          <div class="accessories-display-subtitle"><h2>PRICE RANGE</h2></div>
          <div class="input-field-content">
            <div class="checkbox-div"><input type="checkbox" name="1-2k" value="1-2k" id="1-2k"><label for="1-2k">₱1000 - ₱2000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="2-3k" value="2-3k" id="2-3k"><label for="2-3k">₱2000 - ₱3000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="3-4k" value="3-4k" id="3-4k"><label for="3-4k">₱3000 - ₱4000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="4-5k" value="4-5k" id="4-5k"><label for="4-5k">₱4000 - ₱5000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="5-6k" value="5-6k" id="5-6k"><label for="5-6k">₱5000 - ₱6000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="6-7k" value="6-7k" id="6-7k"><label for="6-7k">₱6000 - ₱7000</label></div>
            </div>
            </div>
            <div class="input-buttons">
              <input type="submit" value="Filter" name="filter">
              <input type="reset" value="Reset" name="reset">
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

   <div class="accessories-area">
    <div class="accessories-section">
      <div class="accessories-content">
      <div class="accessories-display-title"><h2>BEST SELLERS</h2></div>
          <div class="accessories-carousel">
            <div class="accessories-carousel-content">
            <a href="" class="accessories-carousel-content-link">
          <div class="accessories-carousel-content-container">
            <img src="https://www.bike-components.de/cache/p/xl1/6/2/Shimano-XT-BR-M8020-Disc-Brake-Set-black-set-front-rear--62177-267175-1557324935.jpeg" alt="">
            <div class="product-text-area">
            <h2 class="product-name">GROUP SET MTB SHIMANO DEORE M6000 3X10 HYDRAULIC W/O HUB</h2>
            <span class="sale-price">₱2000</span>
            </div>
          </div>
          </a>
            </div>
            <div class="accessories-carousel-content">
            <a href="" class="accessories-carousel-content-link">
          <div class="accessories-carousel-content-container">
            <img src="https://www.bike-components.de/cache/p/xl1/4/3/Shimano-XT-RD-M8000-11-speed-Shadow-Plus-Rear-Derailleur-black-short-43938-128807-1481263220.jpeg" alt="">
            <div class="product-text-area">
            <h2 class="product-name">SHIMANO FC-MT210-3 CRANK SET 44/32/22 TEETH 9 SPEED BLACK (2019)</h2>
            <span class="sale-price">₱2000</span>
            </div>
          </div>
          </a>
            </div>
            <div class="accessories-carousel-content">
            <a href="" class="accessories-carousel-content-link">
          <div class="accessories-carousel-content-container">
            <img src="https://www.bike-components.de/cache/p/xl1/7/8/Novatec-R3-Stealth-Carbon-Wheelset-Panaracer-Gravelking-SK-Tubeless-Set-black-brown-35-622-700x35c--78326-340280-1593178986.jpeg" alt="">
            <div class="product-text-area">
            <h2 class="product-name">SAGMIT CONCORD C65 WHEELSET</h2>
            <span class="sale-price">₱2000</span>
            </div>
          </div>
          </a>
            </div>
            <div class="accessories-carousel-content">
            <a href="" class="accessories-carousel-content-link">
          <div class="accessories-carousel-content-container">
            <img src="https://www.bike-components.de/cache/p/xl1/7/7/RockShox-ZEB-Ultimate-RC2-DebonAir-Boost-29-Suspension-Fork-gloss-black-180-mm-1-5-tapered-15-x-110-mm-44-mm-77945-339831-1592988433.jpeg" alt="">
            <div class="product-text-area">
            <h2 class="product-name">BRAND NEW MANITOU R7 PRO 100MM BLACK STANCHION</h2>
            <span class="sale-price">₱2000</span>
            </div>
          </div>
          </a>
            </div>
          </div>

          <div class="accessories-bottom-cont">
          <div class="accessories-display-title"><h2>SPARE PARTS</h2></div>
          <div class="accessories-second-content">
          <?php
require_once "config.php";
$sql = "SELECT * FROM parts";
$result = mysqli_query($link, $sql);

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
          $image = $row['image'];
          echo "<div class='second-cont-display'>";
          echo "<a href='single-parts.php?id=". $row['id'] ."' class='accessories-content-link'>";
          echo "<div class='accessories-content-container'>";
          echo "<img src='$image' alt='' width='180px' height='180px'>";
          echo "<div class='product-text-area'>";
          echo "<h2 class='product-name'>" . $row['model_name'] . "</h2>";
          echo "<span class='accessories-price'>" . "₱". $row['parts_price'] . "</span>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "<div class='data-btn-area'>";
          echo "<a href='update-parts.php?id=". $row['id'] ."' class='data-btn'>Update</a>";
          echo "<a href='delete-parts.php?id=". $row['id'] ."'class='data-btn'>Delete</a>";
          echo "</div>";
          echo "</div>";
        }
        
        
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 

mysqli_close($link);

?>   
        </div>
        </div>
        <div class="add-new-btn"><a class="add-new-link" href="add-parts.php">Add new product</a></div> 
      </div>
    </div>
   </div>
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
  <script>
  $('.accessories-carousel').slick({
  infinite: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }

  ]
});
  </script>
</body>
</html>