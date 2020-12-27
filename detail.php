<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <!-- SLICK -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">

</head>
<style>
    .main_detail {
      margin-top: 120px;
      height: 820px;
    }

    .main_detail .slider-nav {
      /* display: none; */
      height: 140px;
    }

    .main_detail .slider-nav .slick-list .slick-track .slick-slide {
      border: 1px solid rgba(153, 152, 152, 0.9);
      margin-right: 8px;
      cursor: pointer;
    }

    .main_detail .slider-nav .slick-list .slick-track .slick-slide:hover {
      border: 1px solid black;
    }

    .products__info {
      margin-top: 60px;
    }

    .products__name {
      width: full;
      font-size: 28px;
      color: #000;
      margin: 0;

      /* border-width: 20px; */
    }

    .products__name:after {
      content: '';
      display: block;
      width: 50px;
      height: 2px;
      background: #000000;
      margin: 20px 0;
    }

    .products__price {
      font-size: 28px;
      display: inline-block;
      margin-right: 15px;
      color: #000;
      width: 100%;
      padding-bottom: 14px;
      border-bottom: 1px solid rgba(153, 152, 152, 0.2);
    }


    /* increase decrease NUMBER */
    form {
      width: 200px;
      margin-top: 24px;
      margin-left: 14px;
    }

    .value-button {
      display: inline-block;
      border: 1px solid #ddd;
      margin: 0px;
      width: 50px;
      height: 50px;
      text-align: center;
      vertical-align: middle;
      padding: 11px 0;
      background: #eee;
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .value-button:hover {
      cursor: pointer;
    }

    form #decrease {
      margin-right: 4px;
      border-radius: 3px;
    }

    form #increase {
      margin-left: 4px;
      border-radius: 3px;
    }

    form #input-wrap {
      margin: 0px;
      padding: 0px;
    }

    input#number {
      text-align: center;
      margin-top: 1px;
      width: 50px;
      height: 50px;
      border: 1px solid #ddd;
      border-radius: 3px;

    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .section__number-cart {
      display: flex;
      justify-content: flex-start;
    }

    .carousel__trailer {
      margin-top: 32px;
    }

    .carousel__trailer button {
      position: relative;
      z-index: 1;
      /* color: #fff; */
    }

    .carousel__trailer .button__icon {
      cursor: pointer;
      outline: none;
      box-shadow: none;
      font-size: 13px;
      font-weight: normal;
      position: relative;
      overflow: hidden;
      width: auto;
      padding: 12px 16px;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: #000000;
      font-weight: 500;
      border-width: 2px;
      border-radius: 30px;
      border: none;
      background-image: black;
    }

    .carousel__trailer .button__icon:hover {
      background-image: #fff;
      font-weight: 550;
    }

    @media only screen and (max-width:600px) {
      .main_detail {
        height: 1100px;
      }
    }

    /* -------------------- */
    html,
    body {
      height: 100%;
      min-height: 100%;
      font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
    }

    *,
    *:before,
    *:after {
      box-sizing: border-box;
    }

    .page-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .page-wrapper button {
      padding: 20px;
      border: none;
      background: #d5d8e7;
      position: relative;
      outline: none;
      border-radius: 5px;
      color: #292d48;
      font-size: 18px;
    }

    .page-wrapper button .cart-item {
      position: absolute;
      height: 24px;
      width: 24px;
      top: -10px;
      right: -10px;
    }

    .page-wrapper button.sendtocart .cart-item {
      display: block;
      animation: xAxis 1s forwards cubic-bezier(1, 0.44, 0.84, 0.165);
    }

    .page-wrapper button.sendtocart .cart-item:before {
      animation: yAxis 1s alternate forwards cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    .cart {
      position: fixed;
      top: 23px;
      right: 50px;
      width: 50px;
      height: 50px;
      /* background: #292d48; */
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 5px;
    }

    .cart i {
      font-size: 25px;
      color: white;
    }

    .cart:before {
      content: attr(data-totalitems);
      font-size: 18px;
      font-weight: 600;
      position: absolute;
      top: 9px;
      right: 11px;
      line-height: 24px;
      padding: 0 5px;
      color: #345372;
      text-align: center;
      border-radius: 24px;
    }

    .cart.shake {
      animation: shakeCart 0.4s ease-in-out forwards;
    }

    @keyframes xAxis {
      100% {
        transform: translateX(calc(50vw - 105px));
      }
    }

    @keyframes yAxis {
      100% {
        transform: translateY(calc(-50vh + 75px));
      }
    }

    @keyframes shakeCart {
      25% {
        transform: translateX(6px);
      }

      50% {
        transform: translateX(-4px);
      }

      75% {
        transform: translateX(2px);
      }

      100% {
        transform: translateX(0);
      }
    }
  </style>
<body>
 
  <?php
  
  include 'connect.php';
  $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `MASP` = " . $_GET['MASP']);
  $product = mysqli_fetch_assoc($result);
  $imgLibrary = mysqli_query($con, "SELECT `HINHCHINH`,`HINH1` FROM `sanpham` WHERE `MASP` = " . $_GET['MASP']);
  $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);
  ?>
  <?php
  require "inc/header.php";
  // require "public/js.php";
  ?>

  <div class="main_detail container">
    <div class="row">
      <div class="products__images col-md-6 mx-auto blue">
        <div class="slider-for">
          <div>
            <div id="product-img" class="products__images__fluid">
              <img class="img-fluid" src="<?= $product['HINHCHINH'] ?>" />
            </div>
          </div>
          <div>
            <div id="product-img" class="products__images__fluid">
              <img class="img-fluid" src="<?= $product['HINH1'] ?>" />
            </div>
          </div>

        </div>
        <div class="slider-nav">
          <div class="product__click">
            <div id="product-img">
              <img class="img-fluid" src="<?= $product['HINHCHINH'] ?>" />
            </div>
          </div>
          <div class="product__click">
            <div id="product-img">
              <img class="img-fluid" src="<?= $product['HINH1'] ?>" />
            </div>
          </div>

        </div>

      </div>
      <div class="col-md-6 products__info">
        <p class="products__name"><?= $product['TENSP'] ?></p>
        <span class="products__price"><?= number_format($product['GIA'], 0, ",", ".") ?> VND</span><br />
        <div class="section__number-cart">
          <form>
            <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
            <input type="number" id="number" value="0" />
            <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
          </form>
          <div>
            <!-- <div class="carousel__trailer">
                                <button class="button__icon">
                                    <a href="test.php" style="color: #000000">THÊM VÀO GIỎ</a>
                                </button>
                              </div> -->
            <!-- <div class="carousel__trailer page-wrapper">
                                <button id="addtocart" class="button__icon">
                                      MUA NGAY
                                      <span class="cart-item"></span>
                                </button>
                              </div> -->
            <form id="add-to-cart-form" action="cartDevelopment.php?action=add" method="POST">
              <input type="text" value="1" name="quantity[<?= $product['MASP'] ?>]" size="2" /><br />
              <?php 
                if (isset($_SESSION['current_user'])) {
                  echo "<input type='submit' value='Mua sản phẩm'/>";
                }
                else {
                  echo "Bạn chưa đăng nhập, vui lòng đăng nhập để mua sản phẩm";
                }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  require "inc/footer.php";
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


  <script>
    $('.slider-for').slick({
      autoplay: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
      autoplay: false,
      slidesToShow: 6,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      dots: false,
      focusOnSelect: true

    });
  </script>

  <!-- handle on taking a variety of products -->
  <script src="public/handleOnTakingANumberOfProducts.js"></script>
  <script src="public/buyProducts.js"></script>


</body>

</html>