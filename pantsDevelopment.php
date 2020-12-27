
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <!-- FILE CSS -->
    <link rel="stylesheet" href="style/collectionProduct.css"/>

</head>
<body>
        <!--  style/pantsProduct.css -->
        <style>
            header .menu__content #grimmNavbar .navbar-nav .nav-item .pants__item {
                border-bottom: 3px solid white !important;
                color: white !important;
            }
            header .menu__content #grimmNavbar .navbar-nav .nav-item .products__item {
                border-bottom: none !important;
                color: rgba(255,255,255,.55) !important;
            }
            .main_products {
                height: 1700px !important;
            }
        </style>

        <!-- Không đủ item để làm pagination -->
      
          <?php
          include 'connect.php';
          $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:24;
          $current_page = !empty($_GET['page'])?$_GET['page']:1;
          $offset = ($current_page - 1)* $item_per_page;
          $products = mysqli_query($con, "select * from sanpham where MALOAI = 2  LIMIT ".$item_per_page." OFFSET ".$offset." ");
          $totalRecords = mysqli_query($con, "select * from sanpham where MALOAI=2");
          $totalRecords = $totalRecords->num_rows;
          $totalPages = ceil($totalRecords/$item_per_page);
          ?>
        <?php
          require "inc/header.php";
          require "public/js.php";
        ?>
    

        <div class="main_products">
          
          <ul class="lightrope">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
          </ul> 
          <div class="row">
            <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" 
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sản phẩm nổi bật
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Giá: Tăng dần</a>
                                    <a class="dropdown-item" href="#">Giá: Giảm dần</a>
                                    <a class="dropdown-item" href="#">Tên: A-Z</a>
                                    <a class="dropdown-item" href="#">Tên: Z-A</a>
                                    <a class="dropdown-item" href="#">Cũ nhất</a>
                                    <a class="dropdown-item" href="#">Mới nhất</a>
                </div>
          </div>
            
          
            <div class="row">
                <div class="col-3">
                    <div class="section__vertical__menu">
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link"   href="tShirtDevelopment.php">ÁO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="pantsDevelopment.php">QUẦN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="outerwearDevelopment.php" >ÁO KHOÁC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >BALO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >TÚI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >NÓN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >VÍ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-9 ">
                    <div class="products-content">
                        <div class="product-items row">
                        <?php
                            while($row = mysqli_fetch_array($products)){
                        ?>
                            <div class="products-item">
                                <a href="detail.php?MASP=<?=$row['MASP']?>">
                                    <div class="products-img">
                                        <img src="<?=$row['HINHCHINH']?>" title="ao" alt="asd">
                                        <div class="products-img-hover">
                                            <img class="products-img-hover-show" src="<?=$row['HINH1']?>" title="ao" alt="asd">
                                        </div>
                                    </div>
                                </a>
                            <p class="products-name font-weight-bold text-center"><?=$row['TENSP']?></p>
                            <div class="products-price font-weight-bold text-center"><?=number_format($row['GIA'],0,",",".")?>đ</div>
                            </div>
                            <?php } ?>              
                        </div>
                    </div>
                </div>
             
                
            </div>
        </div>
        
        <?php
        require "inc/footer.php";
        ?>
      

</body>
</html>