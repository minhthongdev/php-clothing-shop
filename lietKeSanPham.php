
<!-- <link rel="stylesheet" href="index.css" /> -->
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
</head>
<body>
        <style>
          .main_products:before{
            content: '';
            display: block;
            width: 100%;
            height: 1px;
            background: rgba(153, 152, 152, 0.2);
            margin-top: 80px;
          }
          .main_products{
            height: 2320px;
            margin-top: 110px;
            margin-left: 180px;
            margin-right: 180px;
            position: relative; 
          }
          .main_products .dropdown{
            height: 400px;
            text-align: center;
            position: absolute;
            right:0;
            top: 20px;
            z-index: 100;
          
          }
          header .menu__content #grimmNavbar .navbar-nav .nav-item .products__item{
            border-bottom: 3px solid white;
            color: white;
         
          }
          .products-img{
            position: relative;
            /* để ẩn thẻ con mà rời thẻ cha */
            overflow: hidden;
            border-radius: 4px;
          }
          .products-img img{
            width: 245px;
            height: 245px;
          }
          .products-content{
            margin-top: 100px;
          }
          .products-item{
            margin-right: 34px;
            margin-bottom: 30px;
            cursor: pointer;
          }
          .product-item-click{
            text-decoration: none;
            /* margin-right: 34px;
            margin-bottom: 30px;
             */
          }
          
         
          .products-item:hover .products-img-hover img{
            opacity: 1;
          }

          .products-img-hover img{
            opacity: 0;
            transition: all 0.5s ease-in-out;
            position: absolute;
            top: 0;
            height: 100%;
            left: 0;
          }
      
          .products-name{
            font-size: 12px;
          }
  
            #pagination{
                text-align: right;
                margin-top: 35px;
                margin-left: 480px;
                position: sticky;
                height: 40px;

            }
            .page-item{
                border: 1px solid #ccc;
                padding: 5px 9px;
                color: #000;
                height: 140px;
                
            }
            .current-page{
                background: #000;
                color: #FFF;
            }
            @media only screen and (max-width:600px){
              .main_products{
                width: 300px;
                height: 100%;
              }
            }

            /* css đèn */
          
            .lightrope {
              text-align: center;
              white-space: nowrap;
              overflow: hidden;
              position: absolute;
              z-index: 1;
              margin: -15px 0 0 0;
              padding: 0;
              pointer-events: none;
              width: 100%;
            }
            .lightrope li {
              position: relative;
              animation-fill-mode: both;
              animation-iteration-count: infinite;
              list-style: none;
              margin: 0;
              padding: 0;
              display: block;
              width: 12px;
              height: 28px;
              border-radius: 50%;
              margin: 20px;
              display: inline-block;
              background: rgba(0, 247, 165, 1);
              box-shadow: 0px 4.6666666667px 24px 3px rgba(0, 247, 165, 1);
              animation-name: flash-1;
              animation-duration: 2s;
            }
            .lightrope li:nth-child(2n+1) {
              background: rgba(0, 255, 255, 1);
              box-shadow: 0px 4.6666666667px 24px 3px rgba(0, 255, 255, 0.5);
              animation-name: flash-2;
              animation-duration: 0.4s;
            }
            .lightrope li:nth-child(4n+2) {
              background: rgba(247, 0, 148, 1);
              box-shadow: 0px 4.6666666667px 24px 3px rgba(247, 0, 148, 1);
              animation-name: flash-3;
              animation-duration: 1.1s;
            }
            .lightrope li:nth-child(odd) {
              animation-duration: 1.8s;
            }
            .lightrope li:nth-child(3n+1) {
              animation-duration: 1.4s;
            }
            .lightrope li:before {
              content: "";
              position: absolute;
              background: #222;
              width: 10px;
              height: 9.3333333333px;
              border-radius: 3px;
              top: -4.6666666667px;
              left: 1px;
            }
            .lightrope li:after {
              content: "";
              top: -14px;
              left: 9px;
              position: absolute;
              width: 52px;
              height: 18.6666666667px;
              border-bottom: solid #222 2px;
              border-radius: 50%;
            }
            .lightrope li:last-child:after {
              content: none;
            }
            .lightrope li:first-child {
              margin-left: -40px;
            }
            @keyframes flash-1 {
              0%, 100% {
                background: rgba(0, 247, 165, 1);
                box-shadow: 0px 4.6666666667px 24px 3px rgba(0, 247, 165, 1);
              }
              50% {
                background: rgba(0, 247, 165, 0.4);
                box-shadow: 0px 4.6666666667px 24px 3px rgba(0, 247, 165, 0.2);
              }
            }
            @keyframes flash-2 {
              0%, 100% {
                background: rgba(0, 255, 255, 1);
                box-shadow: 0px 4.6666666667px 24px 3px rgba(0, 255, 255, 1);
              }
              50% {
                background: rgba(0, 255, 255, 0.4);
                box-shadow: 0px 4.6666666667px 24px 3px rgba(0, 255, 255, 0.2);
              }
            }
            @keyframes flash-3 {
              0%, 100% {
                background: rgba(247, 0, 148, 1);
                box-shadow: 0px 4.6666666667px 24px 3px rgba(247, 0, 148, 1);
              }
              50% {
                background: rgba(247, 0, 148, 0.4);
                box-shadow: 0px 4.6666666667px 24px 3px rgba(247, 0, 148, 0.2);
              }
            }

            /* ASDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDddddddddddddddddddddddddddddddddddddddddddddddddddd */
       
 
 
        </style>
          <?php
          include 'connect.php';
          $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:24;
          $current_page = !empty($_GET['page'])?$_GET['page']:1;
          $offset = ($current_page - 1)* $item_per_page;
          $products = mysqli_query($con, "select * from sanpham where MALOAI = 1  LIMIT ".$item_per_page." OFFSET ".$offset." ");
          $totalRecords = mysqli_query($con, "select * from sanpham where MALOAI=1");
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
          
          <div class="">
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
              <div class="products-content">
                  <div class="product-items row">
                    <!-- <a href="" class="row product-item-click"> -->
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
                        <?php
                          include 'pagination.php'
                        ?>
                    <!-- </a> -->
                   
                  </div>
              </div>
          </div>
        </div>



        <?php
        require "inc/footer.php";
        ?>
      

</body>
</html>