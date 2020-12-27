
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
          .introduce{
            margin-top: 150px;
            height: 840px;
          }
          .introduce h2{
              font-size: 36px;
              margin-bottom: 26px;
              height: 50px;
          }
          .image__background img{
            display: block;
             margin-left:auto;
              margin-right:auto;
          }
          @media only screen and (max-width:600px){
           .introduce  .image__background img{
               display: none;
                }
            }
            header .menu__content #grimmNavbar .navbar-nav .nav-item .introduce__item{
                border-bottom: 3px solid white;
                color: white;         
          }
        </style>
        <?php

        require "inc/header.php";
        require "public/js.php";

        ?>
            <!-- Giới thiệu -->
         <section class="introduce">
            <div class="container">
                <h2>Giới thiệu</h2>
                <p>Grimm DC, nơi những giấc mơ được thực hiện hóa.</p>
                <p style="text-align: justify">Chúng tôi không bắt đầu từ một cửa hàng to lớn ở mặt phố,
                    nội thất hầm hố. Mà từ một cửa tiệm nho nhỏ chỉ vỏn vẹn vài sản phẩm được 
                    trưng bày trên kệ. Ở nơi chật hẹp ấy, những
                    người trong đội ngũ Grimm DC vẫn luôn âm thầm làm việc cặm cụi
                    mỗi ngày với mục tiêu làm ra được sản phẩm với độ hoàn hảo cao nhất.</p>
                <p style="text-align: justify">Grimm DC là một start up, khởi đầu từ chiếc nón 
                snapback đính kèm charm, cho phép người dùng thay đổi theo ý muốn và sở thích của mình. 
                Sau đó, các sản phẩm được mở rộng và đa dạng hơn như quần, áo và phụ kiện. Chúng tôi luôn
                tìm cách thay đổi, sáng tạo để cải thiện sản phẩm ngày một tốt hơn, đẹp hơn và đặc biệt hơn 
                để mang đến trải nghiệm tốt nhất cho khách hàng. Chúng tôi không chấp nhận một sản phẩm không 
                hoàn hảo, chỉ một vết xước nhỏ, chúng tôi bỏ, chỉ một đường chỉ sai, chúng tôi vẫn kiên quyết bỏ.
                Mỗi sản phẩm đều được kiểm tra nghiêm ngặt, chi tiết đến từng đường kim mũi chỉ. Mỗi thiết kế đều ẩn 
                chứa đằng sau một câu truyện mang ý nghĩa đặc biệt.</p>      
                <p style="text-align: justify">Chúng tôi - đội ngũ Grimm DC luôn tin vào giấc mơ đem giá trị sản phẩm 
                của người Việt đi khắp năm châu khiến họ tự hào về sản phẩm mình tạo ra, trên đất nước mình. Hơn thế nữa, 
                chúng tôi muốn truyền niềm tin này cho tất cả anh em, để chúng ta cùng thực hiện hóa giấc mơ ấy. Để mỗi người 
                anh em cầm trên tay sản phẩm của Grimm DC đều có thể cảm nhận được niềm kiêu hãnh “người Việt Nam có thể đi khắp 
                thế giới, tin dùng và tự hào về sản phẩm do chính người Việt Nam làm ra.”</p> 
                <p class="image__background">
                    <img src="https://file.hstatic.net/1000357687/file/beyzdpki_72533f88e2fe4804b5b526950964a087_grande.jpeg" 
                    alt="dsa" srcset="">
                </p>
            </div>
         </section>

        <?php
        require "inc/footer.php";
        ?>


       
</body>
</html>