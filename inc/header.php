<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
    />
     <!-- FONT GOOGLE -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
    />
    <!-- css -->
    <link rel="stylesheet" href="./style/header.css">
</head>
<body>
    <header class="header__content">  
        <nav class="menu__content navbar navbar-expand-lg navbar-dark ">
            <a class="navbar-brand" href="index.php">
                <img src="//theme.hstatic.net/1000357687/1000521705/14/logo.png?v=107" alt="dasd">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#grimmNavbar"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="grimmNavbar">
                <ul class="navbar-nav mr-auto text-white">
                    <li class="nav-item">
                        <a class="nav-link home__item" href="index.php">GRIMM DC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link introduce__item" href="gioiThieu.php">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item product__class">
                        <a class="nav-link products__item" href="tShirtDevelopment.php">ÁO</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link pants__item" href="pantsDevelopment.php">QUẦN</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link outerwear__item" href="outerwearDevelopment.php" >ÁO KHOÁC</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link accessories__item" href="accessories.php" >PHỤ KIỆN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link contact__item" href="lienHe.php">LIÊN HỆ</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <p class="info__content text-right text-white">

            <a href="login/index.php" class="user__item">
                <i class="info__content__user ml-3 fa fa-user"></i>
            </a>
            

            <a href="cartDevelopment.php" id="cart" class=" cart cart__item" data-totalitems="0">
                <i class="fas fa-shopping-cart"></i>
            </a>

            <a href="#" class="user__item logout">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </p>
    </header>  
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            var logout = 'logout';
            $('.logout').click(function (e) { 
                $.ajax({
                    url: 'logout.php',
                    method: 'POST',
                    data:{logout:logout},
                    success: function(data){
                        alert(data);
                    }
                })
         });
        });
    </script>
</body>
</html>