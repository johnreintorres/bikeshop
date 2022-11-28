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
  <title>Bikes | All Bikes</title>
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
  <div class="mtb-header-area">
    <div class="mtb-bg-area">
      <h2>BIKES</h2>
    </div>
  </div>
</header>
<section>
    <div class="whole-page-area">
      <div class="whole-page-section">
        
    <div class="filter-area">
      <div class="filter-section">
        <div class="filter-content">
          
          <div class="filter-details">
          
          <form class="filter-form" action="">
          <div class="input-field">
          <div class="accessories-display-subtitle"><h2>BRANDS</h2></div>
          <div class="input-field-content">
            <div class="checkbox-div"><input type="checkbox" name="raleigh" value="raleigh" id="raleigh"><label for="raleigh">Raleigh</label></div>
            <div class="checkbox-div"><input type="checkbox" name="focus" value="focus" id="focus"><label for="focus">Focus</label></div>
            <div class="checkbox-div"><input type="checkbox" name="felt" value="felt" id="felt"><label for="felt">Felt</label></div>
            <div class="checkbox-div"><input type="checkbox" name="specialized" value="specialized" id="specialized"><label for="specialized">Specialized</label></div>
            <div class="checkbox-div"><input type="checkbox" name="trek" value="trek" id="trek"><label for="trek">Trek</label></div>
            <div class="checkbox-div"><input type="checkbox" name="pinarello" value="pinarello" id="pinarello"><label for="pinarello">Pinarello</label></div>
            <div class="checkbox-div"><input type="checkbox" name="bmc" value="bmc" id="bmc"><label for="bmc">BMC</label></div>
            <div class="checkbox-div"><input type="checkbox" name="giant" value="giant" id="giant"><label for="giant">Giant</label></div>
            <div class="checkbox-div"><input type="checkbox" name="salsa" value="salsa" id="salsa"><label for="salsa">Salsa</label></div>
            <div class="checkbox-div"><input type="checkbox" name="cannondale" value="cannondale" id="cannondale"><label for="cannondale">Cannondale</label></div>
            <div class="checkbox-div"><input type="checkbox" name="cervelo" value="cervelo" id="cervelo"><label for="cervelo">Cervelo</label></div>
            <div class="checkbox-div"><input type="checkbox" name="bianchi" value="bianchi" id="bianchi"><label for="bianchi">Bianchi</label></div>
            <div class="checkbox-div"><input type="checkbox" name="trinx" value="trinx" id="trinx"><label for="trinx">Trinx</label></div>
            <div class="checkbox-div"><input type="checkbox" name="spanker" value="spanker" id="spanker"><label for="spanker">Spanker</label></div>
            </div>
            </div>
            <div class="input-field">
          <div class="accessories-display-subtitle"><h2>PRICE RANGE</h2></div>
          <div class="input-field-content">
            <div class="checkbox-div"><input type="checkbox" name="6-7k" value="6-7k" id="6-7k"><label for="6-7k">₱6000 - ₱7000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="8-9k" value="8-9k" id="8-9k"><label for="8-9k">₱8000 - ₱9000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="10-20k" value="10-20k" id="10-20k"><label for="10-20k">₱10000 - ₱95000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="20-40k" value="20-40k" id="20-40k"><label for="20-40k">₱95000 - ₱40000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="40-60k" value="40-60k" id="40-60k"><label for="40-60k">₱40000 - ₱60000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="60-80k" value="60-80k" id="60-80k"><label for="60-80k">₱60000 - ₱80000</label></div>
            <div class="checkbox-div"><input type="checkbox" name="80upk" value="80upk" id="80upk"><label for="80upk">₱80000 and higher</label></div>
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
          <div class="arrival-cont">
          <div class="accessories-display-title"><h2>BIKES</h2></div>
          <div class="accessories-second-content">
       
          <?php
require_once "config.php";
$sql = "SELECT * FROM bikes";
$result = mysqli_query($link, $sql);

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
          $image = $row['image'];
          echo "<div class='second-cont-display'>";
          echo "<a href='single-arrival.php?id=". $row['id'] ."' class='accessories-content-link'>";
          echo "<div class='accessories-content-container'>";
          echo "<img src='$image' alt='' width='180px' height='180px'>";
          echo "<div class='product-text-area'>";
          echo "<h2 class='product-name'>" . $row['bike_model'] . "</h2>";
          echo "<span class='accessories-price'>" . "₱". $row['bike_price'] . "</span>";
          echo "</div>";
          echo "</div>";
          echo "</a>";
          echo "<div class='data-btn-area'>";
          echo "<a href='update-bikes.php?id=". $row['id'] ."' class='data-btn'>Update</a>";
          echo "<a href='delete-bikes.php?id=". $row['id'] ."'class='data-btn'>Delete</a>";
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
       <div class="add-new-btn"><a class="add-new-link" href="add-bikes.php">Add new bike</a></div> 
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
</body>
</html>