<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <!-- BS4 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!-- SLICK -->
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <!-- slick carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />

    <!-- main css -->
    <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>" />

</head>

<body>

    <?php

    include 'connect.php';

    $productsBestSeller = mysqli_query($con, "SELECT sanpham.HINHCHINH, sanpham.HINH1, 
    sanpham.TENSP,cthd.MASP, SUM(cthd.SOLUONG) as SLBan 
    from cthd inner join sanpham on cthd.MASP = sanpham.MASP
    GROUP by MASP ORDER BY SUM(cthd.SOLUONG) DESC LIMIT 5");

    $productsNewArrival = mysqli_query($con, "SELECT HINHCHINH, HINH1, MASP, TENSP
    FROM sanpham
    ORDER by MASP DESC
    LIMIT 5;");
    ?>
    <!-- dùng chung header -->
    <?php
    require "inc/header.php";
    ?>

    <style>
        header .menu__content #grimmNavbar .navbar-nav .nav-item .home__item {
            border-bottom: 3px solid white;
            color: white;
        }
    </style>



    <!-- end header -->
    <!-- carousel -->
    <!-- class d-none d-md-block dùng để RESPONSIVE -->
    <section class="Carousel">
        <div id="Carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators container">
                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                <li data-target="#Carousel" data-slide-to="1"></li>
                <li data-target="#Carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/slideshow_1.webp" class="d-block w-100" alt="...">
                    <div class="container carousel-caption  ">

                        <h1>BORN IN SAIGON</h1>
                        <h3 class="d-none d-md-block">Đằng sau bộ hình này là câu chuyện hơi bị dễ thương giữa một anh trai
                            mưa và một cô em gái kết nghĩa, đón chờ nhé.
                        </h3>
                        <div class="carousel__trailer">

                            <button class="button__icon">
                                <i class="marterial__icon fa fa-play"></i>
                                <a href="lietKeSanPham.php" style="color: #000000"> XEM THÊM</a>

                            </button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/slideshow_2.jpg" class="d-block w-100" alt="...">
                    <div class="container carousel-caption ">
                        <h1>THE GREAT HANOI </h1>
                        <h1 class="d-none d-md-block">
                            ta nói cho thế giới biết: Người Hà Nội luôn luôn dẫn đầu.
                        </h1>

                        <h3 class="caption__text" class="d-none d-md-block">Hà Nội là nơi ta sinh ra. Đất tổ vàng với lẫy lừng lịch sử, ta kể lại bên những
                            cốc trà: 1000 năm rực rỡ. 1000 năm đứng thẳng không quỳ. Bao kiếp nạn, phong kiến đ
                            ô hộ thực dân vẫn không suy. Thủ đô vàng, trái tim Việt Nam. Mười ngàn năm nữa vẫn sẽ
                            đập, cuồn cuộn dòng máu nóng Bắc Nam, mãi mãi chung một nhà. Ta yêu từng ngỏ nhỏ, nhớ t
                            ừng con phố. Ta đã sống với Hà Nội từ khi dại đến lúc lời nói không còn thất thố. Ta tự hào
                            là người đất Kinh Kỳ, kiêu hãnh vì Đế Đô là tên người người gọi những đứa con của Thăng Long hào khí.</h3>
                        <div class="carousel__trailer">
                            <button class="button__icon">
                                <i class="marterial__icon fa fa-play"></i>
                                XEM THÊM
                            </button>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./img/slideshow_3.webp" class="d-block w-100" alt="...">
                    <div class="container carousel-caption ">
                        <h1>VỚ IRON FLAME</h1>
                        <h3 class="d-none d-md-block">Với những điểm đặc biệt như đường may nối linking, ba lớp chất liệu
                            khác nhau, </h3>

                        <h3 class="d-none d-md-block"> toàn bộ sợi tạo nên được cung cấp bởi công ty RSWM Limited.</h3>
                        <div class="carousel__trailer">
                            <button class="button__icon">
                                <i class="marterial__icon fa fa-play"></i>
                                XEM THÊM
                            </button>
                        </div>
                    </div>
                </div>
            </div class="button__control">
            <a class="carousel-control-prev" href="#Carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#Carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <!-- BANNER  -->
    <section class="bannertop__content">
        <div class="bannertop__item">
            <img src="./img/banner_top_img.webp" alt="img">
            <div class="bannertop__text">
                <h2> GIỚI THIỆU</h2>
                <h5>Ra đời vào ngày 15 tháng 5 năm 2015, chúng tôi
                    thực hiện hóa giấc mơ bắt đầu từ một Start up,
                    khởi đầu sứ mệnh tạo ra những giá
                    trị mới mẻ
                </h5>
                <h5>và có ích cho cộng đồng mà không chỉ
                    đơn thuần là tạo ra những sản phẩm chất lượng mà là
                    “những sản phẩm hoàn hảo nhất do người Việt làm”</h5>
                <div class="carousel__trailer_banner">
                    <button class="button__icon ">
                        <i class="marterial__icon fa fa-play"></i>
                        XEM THÊM
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- BANNER VIDEO -->
    <section class="home__gallery ">
        <div class="text-center gallery__text">
            <h2>IRON FLAME</h2>
            <h5>CÂU CHUYỆN VỀ NGUỒN GỐC CỦA MẪU HOẠ TIẾT IRON FLAME – ĐẠI ĐỊNH SƠN HÀ
            </h5>
        </div>
        <div class="gallery__dad">
            <div class="galerry__content">
                <div class="carousel__video">
                    <a href="#" data-toggle="modal" data-target="#videoFilm">
                        <i class="play__button fa fa-play"></i>
                    </a>
                </div>
            </div>
            <div class="carousel__trailer text-center mt-5">
                <button class="button__icon">
                    <i class="marterial__icon fa fa-play"></i>
                    XEM THÊM
                </button>
            </div>
        </div>
    </section>

    <!-- BANNER BOTTOM -->

    <section class="banner__bottom">
        <div class="bannertop__item">
            <img src="./img/banner_bottom_img.webp" alt="img">
            <div class="bannertop__text">
                <div class="carousel__trailer_banner">
                    <button class="button__icon ">
                        <i class="marterial__icon fa fa-play"></i>
                        XEM THÊM
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- New Arrival and Best Seller Section -->

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


    <!-- TÌM KIẾM CỬA HÀNG  -->
    <section class="store__section mt-5">
        <div class="store__content">
            <p class="store__closest">TÌM CỬA HÀNG GẦN BẠN NHẤT</p>
            <a class="store__branches" href="lienHe.php">HỆ THỐNG CỬA HÀNG</a>
        </div>

    </section>




    <!-- dùng chung footer -->
    <?php
    require "inc/footer.php";


    ?>



    <!-- MODAL ở BANNER VIDEO -->
    <div class="modal fade" id="videoFilm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLgLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="modal-body div_Video" id="div_Video">
                    <iframe style="width:100%; height:400px;" src="https://www.youtube.com/embed/OUQ27PpMvq8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>



    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->




    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        $(".slider-nav1").slick({
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<i class="fa fa-angle-left left"></i>',
            nextArrow: '<i class="fa fa-angle-right right"></i>'
        });
    </script>

</body>

</html>