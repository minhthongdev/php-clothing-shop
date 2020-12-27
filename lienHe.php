
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
          
          .Grimm__contact__content{
            margin-top: 90px;            
          }
          /* contact */
          .Grimm__contact__content{
              height: 900px;
          }
          .Grimm__contact__content .Grimm__contact{
              margin-left: 160px;
          }
          .Grimm__contact h1{
              font-size: 20px;
              font-weight: bold;
              line-height: normal;
              letter-spacing: 1px;
              margin-top: 40px;
              margin-bottom: 10px;
          }
          .contact__content .contact__text{
              padding-left: 0;
              margin-left: 0;
              padding-top: 0;

          }
          .contact__content .contact__text span{
              margin-left: 12px;
              color: #000000;
              font-size: 16px;

          }
          .contact__content .contact__text li{
              margin-top: 10px;

          }
          .contact__content .contact__text li i{
              height: 18px;

          }
          .Grimm__contact__content .Grimm__contact .contact__content h3{
              font-size: 20px;
              font-weight: bold;
              line-height: normal;
              margin-top: 20px;
              padding-bottom: 0;
              letter-spacing: 1px;
              /* margin-bottom: 10px; */
          }

          /* form contact */
          .contact__area{
              padding-bottom: 0;
          }
          .contact{
              padding-bottom: 250px ;
              margin-top: 70px;
              margin-right: 100px;
              padding-bottom: 0;
          }
          .contact__form form{
              display: grid;
              grid-template-columns: repeat(1,1fr);
              gap: 15px 25px;
              height: 500px;
              width: 90%;
          }
          .contact__form textarea{
              grid-column: 1 / span 1;
          }
          .contact__form .gui_submit{
              width: 115px;
              height: 45px;
              text-align: center;
              padding: 11.2px 48px;
              background-color: #000000;
              color: #fff;
              transition: all 0.4s;
          }
          .contact__form .gui_submit:hover{
              color: grey;
          }
          .contact__form input{
              height: 40px;
              padding: 15px;
              border: 1px solid #e6e6e6;
              border-radius: 5px;
          }
          .contact__form textarea{
              padding: 15px;
              border: 1px solid #e6e6e6;
              border-radius: 3px;
              transition: all 0.5s;
          }
          .contact__form input:focus, .contact__form textarea:focus {
              /* xóa mặc định của trình duyệt */
              outline: none;
          }
          .contact__form #firstNameError{
            padding-bottom: 0;
            margin: 0;
          }



          @media only screen and (max-width:600px){
            /* contact */
                .Grimm__contact__content{
                    height: 1550px;
                }
                .Grimm__contact__content .Grimm__contact{
                    margin-left: 24px;
                }
                .contact__area{
                    margin-left: 80px;
                    padding-bottom: 0;
                    margin-bottom: 0;
                    height: 700px;
                }
            }
            header .menu__content #grimmNavbar .navbar-nav .nav-item .contact__item{
                border-bottom: 3px solid white;
                color: white;
            }
        </style>
        <?php

        require "inc/header.php";
        require "public/js.php";

        ?>
             <!-- Lien he -->
        <section class="Grimm__contact__content">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="Grimm__contact">
                        <h1>LIÊN HỆ</h1>
                        <div class="contact__content">
                            <h3 >Grimm DC Sài Gòn</h3>
                            <ul class="contact__text">
                                <li> <i class="fa fa-home"></i>
                                    <span class="info"> 13c/9 Kỳ Đồng p9 q3</span>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <span class="info"> 082 407 1530</span>
                                </li>
                                <li> <i class="fa fa-envelope"></i>
                                    <span class="info"> grimmdcsaigon@gmail.com</span>
                                </li>
                            </ul>
                            <h3>Grimm DC Hà Nội</h3>
                            <ul class="contact__text">
                                <li> <i class="fa fa-home"></i>
                                    <span class="info"> 4A ngõ Tràng Tiền, quận Hoàn Kiếm</span>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <span class="info"> 093 880 4100</span>
                                </li>
                            </ul>
                            <h3>Grimm DC Cần Thơ</h3>
                            <ul class="contact__text">
                                <li> <i class="fa fa-home"></i>
                                    <span class="info"> 40 Nguyễn Văn Cừ nối dài, Phường An Bình, Quận Ninh Kiều</span>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <span class="info"> 090 101 6565</span>
                                </li>
                            </ul>
                            <h3>Grimm DC Bến Tre</h3>
                            <ul class="contact__text">
                                <li> <i class="fa fa-home"></i>
                                    <span class="info"> 51 Ngô Quyền, phường 3</span>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <span class="info"> 090 279 7077 </span>
                                </li>
                            </ul>
                            <h3>Grimm DC An Giang</h3>
                            <ul class="contact__text">
                                <li> <i class="fa fa-home"></i>
                                    <span class="info">140/4b Nguyễn Thái Học, Mỹ Bình, Tp. Long Xuyên </span>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <span class="info"> 088 601 5745</span>
                                </li>
                            </ul>
                            <h3>Grimm DC Kiên Giang</h3>
                            <ul class="contact__text">
                                <li> <i class="fa fa-home"></i>
                                    <span class="info"> 53 Nguyễn Trung Trực, phường Vĩnh Bảo, Rạch Giá, Kiên Giang</span>
                                </li>
                                <li> <i class="fa fa-phone"></i>
                                    <span class="info"> 090 101 65 65</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 contact__area">
                    <div class="contact">
                        <div class="contact__form">
                            <form>
                                <input type="text" placeholder="Họ tên của bạn">
                                <input type="email" placeholder="Địa chỉ email của bạn">
                                <input type="text" placeholder="Số điện thoại của bạn">
                                <textarea rows="6" placeholder="Nội dung"></textarea>
                                <input type="submit" class="gui_submit" name="" id="" value="GỬI">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>


            
         

        <?php
        require "inc/footer.php";
        ?>


       
</body>
</html>