<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <!-- FONT GOOGLE -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
  <!-- SLICK -->
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
  <!-- slick carousel -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />

  <!-- detail css -->
  <link rel="stylesheet" href="style/detail.css?v=<?php echo time(); ?>" />
</head>

<body>




  <?php

  include 'connect.php';
  $result = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `MASP` = " . $_GET['MASP']);
  $product = mysqli_fetch_assoc($result);
  $imgLibrary = mysqli_query($con, "SELECT `HINHCHINH`,`HINH1` FROM `sanpham` WHERE `MASP` = " . $_GET['MASP']);
  $product['images'] = mysqli_fetch_all($imgLibrary, MYSQLI_ASSOC);


  $productsBestSeller = mysqli_query($con, "SELECT sanpham.HINHCHINH, sanpham.HINH1, 
  sanpham.TENSP,cthd.MASP, SUM(cthd.SOLUONG) as SLBan 
  from cthd inner join sanpham on cthd.MASP = sanpham.MASP
  GROUP by MASP ORDER BY SUM(cthd.SOLUONG) DESC LIMIT 5");

  $productsNewArrival = mysqli_query($con, "SELECT HINHCHINH, HINH1, MASP, TENSP
  FROM sanpham
  ORDER by MASP DESC
  LIMIT 5;");
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
          <div>
            <form id="add-to-cart-form" action="cartDevelopment.php?action=add" method="POST">
              <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
              <input type="number" id="number" value="1" name="quantity[<?= $product['MASP'] ?>]" />
              <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>

              <?php
              if (isset($_SESSION['current_user'])) {
                echo "<input type='submit' class='mt-4 button__buy__product' value='MUA NGAY' />";
              } else {
                echo "Bạn chưa đăng nhập, vui lòng đăng nhập để mua sản phẩm";
              }
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class=" New__Arrival__Section">
    <div class="grimm__product">
      <div class="contdainer ">
        <div class="row ">
          <div class="col-12 text-center thongdeptrai">
            <h4>SẢN PHẨM MỚI VỀ</h4>
          </div>
        </div>
        <div class="py-1">
          <div class="row ml-5 mr-5">
            <div class="col-12 mx-auto">
              <div class="slider-nav1">
                <?php
                while ($row = mysqli_fetch_array($productsNewArrival)) {

                ?>
                  <div class="cosl-3">
                    <a href="detail.php?MASP=<?= $row['MASP'] ?>">
                      <div class="newIn__img ">
                        <img src="<?= $row['HINHCHINH'] ?>" alt="">
                        <div class="image__hover">
                          <img src="<?= $row['HINH1'] ?>" alt="">
                        </div>
                      </div>
                    </a>
                    <div class="newIn__title">
                      <p><?= $row['TENSP'] ?></p>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  <div class=" New__Arrival__Section">
    <div class="grimm__product">
      <div class="contdainer ">
        <div class="row ">
          <div class="col-12 text-center thongdeptrai">
            <h4>SẢN PHẨM BÁN CHẠY NHẤT</h4>
          </div>
        </div>
        <div class="py-1">
          <div class="row ml-5 mr-5">
            <div class="col-12 mx-auto">
              <div class="slider-nav1">
                <?php
                while ($row = mysqli_fetch_array($productsBestSeller)) {

                ?>
                  <div class="cosl-3">
                    <a href="detail.php?MASP=<?= $row['MASP'] ?>">
                      <div class="newIn__img ">
                        <img src="<?= $row['HINHCHINH'] ?>" alt="">
                        <div class="image__hover">
                          <img src="<?= $row['HINH1'] ?>" alt="">
                        </div>
                      </div>
                    </a>
                    <div class="newIn__title">
                      <p><?= $row['TENSP'] ?></p>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
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
  <script>
    $(".slider-nav1").slick({
      autoplay: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow: '<i class="fa fa-angle-left left"></i>',
      nextArrow: '<i class="fa fa-angle-right right"></i>'
    });
  </script>

  <!-- handle on taking a variety of products -->
  <script src="public/handleOnTakingANumberOfProducts.js"></script>


</body>

</html>