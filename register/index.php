
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />

    <!-- FILE CSS -->
    <link rel="stylesheet" href="./register.css?v=<?php echo time(); ?>" />

</head>

<body>

    <?php
    ?>
    <div class="login__section">
        <div class="container login__section__container">
            <div class="row">
                <div class="col-6 login__section__login">
                    <div class="header__page">
                        <h1>Tạo tài khoản</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div id="customer-login">
                        <div class="userbox" id="login">
                            <form action='' id='customer_login' method='post'>
                                <div class="clearfix large_form">
                                    <input name='fullname' required type="text" id="customer_email" placeholder="Fullname" class="text" />
                                </div>

                                <div class="clearfix large_form">
                                    <input name='email' required type="text" id="customer_email" placeholder="Email" class="text" />
                                </div>

                                <div class="clearfix large_form">
                                    <input name='phone' required type="text" id="customer_email" placeholder="Phone" class="text" />
                                </div>

                                <div class="clearfix large_form">
                                    <input name='address' required type="text" id="customer_email" placeholder="Address" class="text" />
                                </div>

                                <div class="clearfix large_form">
                                    <input name='username' required type="text" id="customer_email" placeholder="Username" class="text" />
                                </div>

                                <div class="clearfix large_form">
                                    <input name='password' required type="password" id="customer_password" placeholder="Mật khẩu" class="text" size="16" />
                                </div>
                                <div class="clearfix action_account_custommer">
                                    <div class="action_bottom button dark">
                                        <input name='submit' action="submit" class="btn btn-signin" type="submit" value="Register" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php
    include 'connect.php';
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = (int)$_POST['phone'];
        $address = $_POST['address'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        // $sqlInsert = "INSERT INTO `khachhang`(`MAKH`, `HOTEN`, `EMAIL`, `SDT`, `DIACHI`) VALUES (NULL,'$fullname','$email',$phone,'$address')";
        // $insert = $con->query($sqlInsert);
        $_idNewest = $con->query("SELECT makh from khachhang order by makh desc limit 1");
        $idNewest = (int)mysqli_fetch_row($_idNewest)[0];
        $sqlInsUser = $con->query("INSERT INTO `user`(`userid`, `MAKH`, `TAIKHOAN`, `MATKHAU`, `ROLE`, `HOTEN`) VALUES (null, $idNewest, '$username', '$password', 0,'$fullname')");
        echo "<script type='text/javascript'>alert('Bạn đã đăng ký tài khoản thành công !');</script>
        window.location.href='http://localhost:90/clientpage/php-clothing-shop/login/index.php';
        "; 
    }
    // require "./Refooter.php";
    ?>
    <!--  -->
</body>

</html>