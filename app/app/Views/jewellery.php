<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="Description" content="Jewellery store for selling Jewellery like rings and necklaces">
  <meta name="Keyword" content="Jewellery store,rings,necklaces">
  <meta name="author" content="Jewellery store">
  <link rel="shortcut icon" href="../app/Views/images/logo.png" type="image/x-icon">

  <title>Luxury Gems</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../app/Views/css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../app/Views/css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../app/Views/css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
<div class="fixed-top">
  <div class="hero_area" style="background-color:white ;">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="home">
            <img src="../app/Views/images/logo.png" alt="">
            <span>
              Luxury Gems
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="jewellery">Jewellery </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact">Contact us</a>
                </li>
              </ul>
            </div>
            <div class="quote_btn-container ">
            <div class="username"><?php echo $_SESSION['user']?></div>
              <a>
                <img id="icon" src="../app/Views/images/cart.png" alt="icon" onclick="toggle()">
                <img id="icon0" src="../app/Views/images/cart.png" alt="icon" onclick="toggle0()">
                <div id="cart_number"></div>
              </a>
            </div>
          </div>
        </nav>
    </header>
    <!-- end header section -->
  </div>
  <div class="carte">
          <div class="cnt">
          <div id="bill"></div>
          <div class="cnt1" >The Total : <span id="total"></span><a class="button1" onclick="order()">Confirm</a></div>
          </div>
          </div>
        </div>
  </div>
  <!-- item section -->
  <div class="bascket">The total : <span style="color:white ;" id="total0"></span><a class="button" href="" onclick="order()">Confirm</a><img src="../app/Views/images/picnic-basket.png" alt="bascket" id="bascket0" onclick="display0()"></div>
  <img src="../app/Views/images/picnic-basket.png" alt="bascket" id="bascket" onclick="display()">

  <div class="item_section layout_padding2">
    <div class="container">
      <div class="item_container">
        <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="../app/Views/images/i-1.png" alt="">
          </div>
          <div class="name">
            <h5>
              Bracelet
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="../app/Views/images/i-2.png" alt="">
          </div>
          <div class="name">
            <h5>
              Ring
            </h5>
          </div>
        </div>
        <div class="box">
          <div class="price">
            <h6>
              Best PRICE
            </h6>
          </div>
          <div class="img-box">
            <img src="../app/Views/images/i-3.png" alt="">
          </div>
          <div class="name">
            <h5>
              Earings
            </h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- end item section -->


  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Jewellery Price
        </h2>
      </div>
      <div class="price_container">
          <?php 
          while($row = mysqli_fetch_assoc($resultat)){
        ?>
        <div class="box">
          <div class="name">
            <h6><?php echo $row["label"];?></h6>
          </div>
          <div class="img-box"><img src="../app/Views/<?php echo $row["img"] ?>" alt="img"></div>
          <div class="detail-box">
            <h5><span><?php echo $row["price"] ?></span>$</h5>
            <button class="btn btn-outline-warning" onclick="buy(<?php echo $row['id-product'] ?>)">Buy Now</button>
          </div>
        </div>
        <?php 
          }
        ?>
    </div>
  </section>

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="info_container">
        <div class="row">
          <div class="col-md-3">
            <div class="info_logo">
              <a href="home">
                <img src="../app/Views/images/logo.png" alt="">
                <span>
                  Luxury Gems
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="../app/Views/images/location.png" alt="">
                <span>
                  Address
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="../app/Views/images/phone.png" alt="">
                <span>
                  +01 1234567890
                </span>
              </a>
            </div>
          </div>
          <div class="col-md-3">
            <div class="info_contact">
              <a href="">
                <img src="../app/Views/images/mail.png" alt="">
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="info_form">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Newsletter
            </h5>
          </div>
          <form action="">
            <div class="email_box">
              <label for="email2">Enter Your Email</label>
              <input type="text" id="email2">
            </div>
            <div>
              <button>
                subscribe
              </button>
            </div>
          </form>
        </div>
        <div class="info_social">
          <div class="d-flex justify-content-center">
            <h5 class="info_heading">
              Follow Us
            </h5>
          </div>
          <div class="social_box">
            <a href="">
              <img src="../app/Views/images/fb.png" alt="">
            </a>
            <a href="">
              <img src="../app/Views/images/twitter.png" alt="">
            </a>
            <a href="">
              <img src="../app/Views/images/linkedin.png" alt="">
            </a>
            <a href="">
              <img src="../app/Views/images/insta.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      <span id="displayYear"></span> All Rights Reserved
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="../app/Views/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../app/Views/js/bootstrap.js"></script>
  <script type="text/javascript" src="../app/Views/js/custom.js"></script>
</body>

</html>