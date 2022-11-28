<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: user-login.php");
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
    <?php
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
    echo "<a class='menu-links' href='admin-logout.php' style='display: block'>" . "<li>" . "logout" . "</li>" . "</a>";
    }?>
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
                    <a class='menu-links' href='admin-logout.php'><li>Logout</li></a>
                    <div class="sp-footer-icons">
                    <a href="index.php"><i class="fas fa-bicycle"></i></a>
                    <a href="cart.php"><img class="add-to-cart-img" src="assets/images/cart.png" alt=""></a>
                    </div>  
                  </ul>
                  </div>
              </div>
  </nav>



  <section>
    <div class="cart-area">
      <div class="cart-section">
          <div class="cart-title"><h2>CART</h2></div>
          <div class="cart-column">
            <div class="cart-column-content">
              <span class="cart-item">ITEM</span>
              <span class="cart-price">PRICE</span>
              <span class="cart-quantity">QUANTITY</span>
              <span class="cart-subtotal">SUBTOTAL</span>
            </div>
          </div>

          <div class="cart-details-area">

          <?php
require_once "config.php";

$sql = "SELECT * FROM user_cart";
$result = mysqli_query($link, $sql);

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_array($result)){
          $image = $row['image'];
          $product_name = $row['product_name'];
          $product_price = $row['product_price'];
          echo "<div class='cart-details-content'>";
          echo "<div class='cart-item-details'>";
          echo "<img src='$image' alt='' width='180px' height='180px'>";
          echo "<div class='cart-item-details-text'>";
          echo "<h2 class='cart-prod-name'>" . $product_name . "</h2>";
          echo "<span>" ."with Rim Explorer". "</span>";
          echo "</div>";
          echo "</div>";
          echo "<div class='right-cart-section'>";
          echo "<h2 class='cart-details-price'>" . $row['product_price'] . "</h2>";
          echo "<h2 class='cart-details-quantity'>" . $row['product_quantity'] . "</h2>";
          echo "<h2 class='cart-details-subtotal'>" . $row['product_price'] . "</h2>";
          echo "</div>";
          echo "<a href='delete-cart.php?id=". $row['id'] ."'class='data-btn'>X</a>";
          echo "</div>";
      
        }
        if(isset($_POST['btn_submit']) && ($_SERVER["REQUEST_METHOD"] == "POST")){
          $sql2 = "INSERT INTO sent_request (product_total_price, username, email) VALUES (?, ?, ?)";
          if($stmt = mysqli_prepare($link, $sql2)){
          mysqli_stmt_bind_param($stmt, "sss", $param_product_total_price, $user_name, $param_email);
          $emails = $_SESSION["email"];
          $usernim = $_SESSION["username"];
          $user_name = $_SESSION["username"];
          $param_product_total_price = $product_price;
          $param_email = $emails;
          if(mysqli_stmt_execute($stmt)){

            $myMail = "jslblrs@gmail.com";
            $header = "From: " . $param_email;
            $message = "You recieve a message from " . $param_email . ". \n\n" . "Subject: " . $usernim . ". \n" . "Total price: " . $param_product_total_price . "\n\n";
            mail($myMail, $usernim, $message, $header);

            $myMail2 = $param_email;
            $subjik = "jslblrs";
            $header = "From: " . "jslblrs@gmail.com";
            $message2 = "You recieve a message from " . "jslblrs@gmail.com" . ". \n\n" . "Thankyou: " . $usernim . ". \n" . "Your order total price is: " . $param_product_total_price . "\n\n";
            mail($myMail2, $subjik, $message2, $header);

         }
            echo "<h2>" . "Order placed" . "</h2>";
           } else {
             echo "Error: Could not be able to execute $sql2. " . mysqli_error($link);
           }
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
      <div class="item-price-total">
        <div class="item-total-section">
          <div class="item-total-text-top">
          <div class="top-text-content"><span class="subtotal">Total price: </span><span class="subtotal-content">₱<?php $row['product_price'] ?></span></div>
          </div>
        </div>
      </div>
      <div class="cart-submit-area">
      <form action="" method="post">  
      <input type="submit" name="btn_submit" value="Place Order" id="myBtn"></div>

      </form>
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
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>