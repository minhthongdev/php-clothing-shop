
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
    <link rel="stylesheet" href="./login.css?v=<?php echo time(); ?>" />

</head>

<body>

    <?php
    // require "./Reheader.php";
    ?>
    <div class="login__section">
        <div class="container login__section__container">
            <div class="row">
                <div class="col-6 login__section__login">
                    <div class="header__page">
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="col-6">
                    <div id="customer-login">
                        <div class="userbox" id="login">
                            <form action='' id='customer_login' method='post'>

                                <div class="clearfix large_form">
                                    <input name='name' required type="text" id="customer_email" placeholder="Username" class="text" />
                                </div>

                                <div class="clearfix large_form">
                                    <input name='password' required type="password" id="customer_password" placeholder="Mật khẩu" class="text" size="16" />
                                </div>
                                <div class="clearfix action_account_custommer">
                                    <div class="action_bottom button dark">
                                        <input name='submit' action="submit" class="btn btn-signin" type="submit" value="Login" />
                                    </div>
                                    <div class="req_pass">
                                        hoặc <a href="./../register/index.php" title="Đăng ký">Đăng ký</a>
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
    // require "./Refooter.php";
    include 'connect.php';
    session_start();
    if (isset($_POST['submit'])) {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE TAIKHOAN='$username'";
        $rs = $con->query($sql);
        $row = mysqli_fetch_row($rs);
        if (($username == $row[2] && $password == $row[3])) {
            $_SESSION['current_user'] = $row;
            var_dump($_SESSION['current_user']);
            if ($row[1]) {
                header('Location: http://localhost:90/clientpage/php-clothing-shop/index.php');
                var_dump('success');
            }
        }
    }
    ?>
</body>

</html>