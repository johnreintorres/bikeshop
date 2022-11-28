<?php 

   if (isset($_POST['email-btn'])){
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    $myMail = "jslblrs@gmail.com";
    $header = "From: " . $email;
    $message2 = "You recieve a message from " . $email . ". \n\n" . "Subject: " . $subject . ". \n" . "Message: " . $message . "\n\n";
    mail($myMail, $subject, $message2, $header);
    header("Location: index.php?mailsend");
 }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Bikes | Contact</title>
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


  <header>
    <div class="index-bg-area">
        <div class="index-section-cont">
          <div class="index-left-text">
            <div class="big-letters"><h2 class="hype-up">CONTACT</h2> <br> <h2 class="plus-sign">+</h2><h2 class="keep-up">US</h2></div>
            <div class="index-desc"><p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p></div>
          <!-- <a href="" class="index-see-all">See all ></a> -->
          </div>
          <div class="index-carousel">
              <div class="carousel-content">  <img class="index-carousel-img" src="https://keyassets.timeincuk.net/inspirewp/live/wp-content/uploads/sites/11/2020/01/03_DECOY_CF_Comp_Dune_Grey_Seite.jpg" alt=""></div>
              <div class="carousel-content"> <img class="index-carousel-img" src="https://s14761.pcdn.co/wp-content/uploads/2020/01/YT-industries-2020-MTB-range-revealed-001.jpg" alt=""></div>
              <div class="carousel-content"> <img class="index-carousel-img" src="https://ytmedia.azureedge.net/image/thumbnail/Capra_AL_rot-Seite_web_1920x1168.jpg" alt=""></div>
              <div class="carousel-content"> <img class="index-carousel-img" src="https://s14761.pcdn.co/wp-content/uploads/2015/11/CAPRA-AL_Side-view.jpg" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </header>

<section>
    <div class="contact-display-area">
      <div class="contact-display-section">
        <div class="contact-display-title"><h2>LEAVE US A MESSAGE</h2></div>
        <div class="contact-content">
          <div class="maps-section">
          <div class="contact-display-subtitle"><h2>OUR ADDRESS</h2></div>
          <div id="map"></div>
          <div class="address map-text"><i class="fas fa-map-marker-alt address-maps-li"></i><span>0804 Tinurik Tanauan city, Batangas</span></div> 
         <div class="phone map-text"><i class="fas fa-phone phone-maps-li"></i><span>1(800)555-5555</span></div>
         <div class="gmail map-text"><i class="fas fa-envelope mail-maps-li"></i><span>company@gmail.com</span></div>
          </div>
          <div class="vertical-divider"></div>
          <div class="email-section">
          <div class="contact-display-subtitle"><h2>MAIL US</h2></div>
            <form action="" class="contact-form" method="post">
              <input type="email" name="email" id="email" placeholder="Enter your email">
              <input type="text" name="subject" id="subject" placeholder="Enter subject">
              <textarea name="message" id="message" cols="62" rows="20" placeholder="Enter a message"></textarea>
              <input type="submit" value="Send email" id="email-btn" name="email-btn">
            </form>
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
  <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  <script src="https://kit.fontawesome.com/d6c8aac0cb.js" crossorigin="anonymous"></script>
  <script src="assets/js/bikes.js"></script>
</body>
</html>