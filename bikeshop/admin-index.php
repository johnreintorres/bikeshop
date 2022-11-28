<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$new_arrivals_sql = "SELECT * FROM new_arrivals";
$bikes_sql = "SELECT * FROM bikes";
$accessories_sql = "SELECT * FROM accessories";
$parts_sql = "SELECT * FROM parts";
$new_arrivals_result = mysqli_query($link, $new_arrivals_sql);
$bikes_result = mysqli_query($link, $bikes_sql);
$accessories_result = mysqli_query($link, $accessories_sql);
$parts_result = mysqli_query($link, $parts_sql);
$new_arrivals_total = 0;
$bikes_total = 0;
$accessories_total = 0;
$parts_total = 0;


if($new_arrivals_result = mysqli_query($link, $new_arrivals_sql)){
    if(mysqli_num_rows($new_arrivals_result) > 0){

        while($new_arrivals_value = mysqli_fetch_array($new_arrivals_result)){
         $new_arrivals_value['id'] = 1;
         $new_arrivals_total += $new_arrivals_value['id'];
        }
       
        
        
        
        mysqli_free_result($new_arrivals_result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $new_arrivals_sql. " . mysqli_error($link);
}

if($bikes_result = mysqli_query($link, $bikes_sql)){
  if(mysqli_num_rows($bikes_result) > 0){

      while($bikes_value = mysqli_fetch_array($bikes_result)){
       $bikes_value['id'] = 1;
       $bikes_total += $bikes_value['id'];
      }
     
      
      
      
      mysqli_free_result($bikes_result);
  } else{
      echo "No records matching your query were found.";
  }
} else{
  echo "ERROR: Could not able to execute $bikes_sql. " . mysqli_error($link);
}

if($accessories_result = mysqli_query($link, $accessories_sql)){
  if(mysqli_num_rows($accessories_result) > 0){

      while($accessories_value = mysqli_fetch_array($accessories_result)){
       $accessories_value['id'] = 1;
       $accessories_total += $accessories_value['id'];
      }
     
      
      
      
      mysqli_free_result($accessories_result);
  } else{
      echo "No records matching your query were found.";
  }
} else{
  echo "ERROR: Could not able to execute $accessories_sql. " . mysqli_error($link);
}

if($parts_result = mysqli_query($link, $parts_sql)){
  if(mysqli_num_rows($parts_result) > 0){

      while($parts_value = mysqli_fetch_array($parts_result)){
       $parts_value['id'] = 1;
       $parts_total += $parts_value['id'];
      }
     
      
      
      
      mysqli_free_result($parts_result);
  } else{
      echo "No records matching your query were found.";
  }
} else{
  echo "ERROR: Could not able to execute $parts_sql. " . mysqli_error($link);
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


  <section>
    <div class="admin-index-area">
      <div class="admin-index-section">
        <div class="admin-index-top-dash">
          <div class="admin-index-top-dash-cont">
            <div class="top-dash-container">
            <div class="top-dash-cont-details-arrival"><div class="top-dash-icon"><i class="fas fa-biking"></i></div><div class="top-dash-text"><h2><?php echo $new_arrivals_total ?></h2><span>New arrivals</span></div></div>
            <div class="bottom-dash-links-arrival"><a href="admin-new-arrival.php">New arrivals</a></div>
            </div>
            <div class="top-dash-container">
            <div class="top-dash-cont-details-bikes"><div class="top-dash-icon"><i class="fas fa-bicycle"></i></div><div class="top-dash-text"><h2><?php echo $bikes_total ?></h2><span>Bikes</span></div></div>
            <div class="bottom-dash-links-bikes"><a href="admin-bikes.php">Bikes</a></div>  
            </div>
            <div class="top-dash-container">
            <div class="top-dash-cont-details-acce"><div class="top-dash-icon"><i class="fas fa-hard-hat"></i></div><div class="top-dash-text"><h2><?php echo $accessories_total ?></h2><span>Accessories</span></div></div>
            <div class="bottom-dash-links-acce"><a href="admin-accessories.php">Accessories</a></div>  
            </div>
            <div class="top-dash-container">
            <div class="top-dash-cont-details-parts"><div class="top-dash-icon"><i class="fas fa-cogs"></i></div><div class="top-dash-text"><h2><?php echo $parts_total ?></h2><span>Parts</span></div></div>
            <div class="bottom-dash-links-parts"><a href="admin-spare-parts.php">Parts</a></div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="request-list-area">
      <div class="request-list-section">
        <div class="request-title"><h2>Latest order request</h2></div>
        <div class="request-column-area">
          <div class="request-column-title">
            <h2 class="order-id">Order id</h2>
            <h2 class="customer-name">Customer username</h2>
            <h2 class="customer-email">Customer email</h2>
            <h2 class="order-total">Total price</h2>
            <h2 class="order-quantity">Quantity</h2>
            <h2 class="date-sent">Date sent</h2>
          </div>
        </div>
        <?php
$sql = "SELECT * FROM sent_request";
$result = mysqli_query($link, $sql);


if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
          echo "<div class='request-data-area'>";
          echo "<div class='request-data-section'>";
          echo "<div class='request-data-content'>";
          echo "<span class='order-id-span'>" . $row['id'] . "</span>";
          echo "<span class='order-username-span'>" . $row['username'] . "</span>";
          echo "<span class='order-email-span'>" . $row['email'] . "</span>";
          echo "<span class='order-price-span'>" . $row['product_total_price'] . "</span>";
          echo "<span class='order-quantity-span'>" . $row['quantity'] . "</span>";
          echo "<span class='order-date-span'>" . $row['created_at'] . "</span>";
          echo "</div>";
          echo "</a>";
          echo "<div class='data-btn-area'>";
          echo "</div>";
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