
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
    <!-- font google -->
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"
    />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    
   
</head>
<body>
        <style>
        .main_detail{
            height: 600px;
        }
        
           /* -------------------- */
           html, body {
	 height: 100%;
	 min-height: 100%;
	 font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
}
 *, *:before, *:after {
	 box-sizing: border-box;
}
 .page-wrapper {
	 min-height: 100%;
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
 .page-wrapper button .cart-item:before {
	 content: '1';
	 display: block;
	 line-height: 24px;
	 height: 24px;
	 width: 24px;
	 font-size: 12px;
	 font-weight: 600;
	 background: #2bd156;
	 color: white;
	 border-radius: 20px;
	 text-align: center;
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
	 top: 20px;
	 right: 20px;
	 width: 50px;
	 height: 50px;
	 background: #292d48;
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
	 font-size: 12px;
	 font-weight: 600;
	 position: absolute;
	 top: -12px;
	 right: -12px;
	 background: #2bd156;
	 line-height: 24px;
	 padding: 0 5px;
	 height: 24px;
	 min-width: 24px;
	 color: white;
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
          <?php
          include 'connect.php';
          ?>
        <?php
            require "inc/header.php";
            // require "public/js.php";
        ?>

         <div class="main_detail container">
<!--                 
            <div id="cart" class="cart" data-totalitems="0">
              <i class="fas fa-shopping-cart"></i>
            </div> -->
<!-- 
            <a href="cart.php" class="cart__item">
            <i class=" fa fa-shopping-bag"></i>
         </a> -->

            <div class="page-wrapper">
              <button id="addtocart">
                Add to Cart
                <span class="cart-item"></span>
              </button>
            </div>
        </div>

        <?php
        require "inc/footer.php";
        ?>
        
      <script
      src="https://code.jquery.com/jquery-3.5.1.min.js"
      integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
      crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
      crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" 
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>


    

      <!-- handle on taking a variety of products -->
      <script src="public/buyProducts.js"></script>  

</body>
</html>