<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />
    <!-- css -->
    <link rel="stylesheet" href="./style/cart.css">
</head>

<body>


    <?php
    include 'connect.php';
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    if (isset($_GET["action"])) {
        function updateCart($add = false)
        {
            foreach ($_POST['quantity'] as $MASP => $quantity) {
                if ($quantity == 0) {
                    unset($_SESSION["cart"][$MASP]);
                } else {
                    if ($add) {
                        $_SESSION["cart"][$MASP] += $quantity;
                    } else {
                        $_SESSION["cart"][$MASP] = $quantity;
                    }
                }
            }
        }
        switch ($_GET['action']) {
            case 'add':
                updateCart(true);
                header('Location: ./cartDevelopment.php');
                break;
            case "delete":
                if (isset($_GET['MASP'])) {
                    unset($_SESSION["cart"][$_GET['MASP']]);
                }
                header('Location: ./cartDevelopment.php');
                break;
            case "submit":
                if (isset($_POST['update_click'])) {
                    updateCart();
                    header('Location: ./cartDevelopment.php');
                } else if ($_POST['order_click']) {
                    $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `MASP` IN 
                        (" . implode(",", array_keys($_POST["quantity"])) . ")");
                    $total = 0;
                    $orderProducts = array();
                    while ($row = mysqli_fetch_array($products)) {
                        $orderProducts[] = $row;
                        $total += $row['GIA'] * $_POST['quantity'][$row['MASP']];
                    }

                    $insertOrder = mysqli_query($con, "INSERT INTO `hoadon` (`MAHD`, `MAKH`, `NGAYHD`,
                        `GIAMGIA`, `THANHTIEN`, `GHICHU`, `HOTEN`, `EMAIL`, `SDT`, 
                        `DIACHI`) VALUES (NULL, NULL, '" . time() . "', '', '" . $total . "',
                        '" . $_POST['note'] . "', '" . $_POST['name1'] . "',
                        '" . $_POST['email'] . "', '" . $_POST['phone'] . "', '" . $_POST['address1'] . "');
                        ");

                    $orderID = $con->insert_id;
                    $insertString = "";
                    $num = 0;


                    foreach ($orderProducts as $key => $product) {

                        $insertString .=  "('" . $orderID . "', '" . $product['MASP'] . "', '" . $_POST['quantity'][$product['MASP']] . "', 
                            'L', '" . $product['GIA'] . "')";
                        if ($key != count($orderProducts) - 1) {
                            $insertString .=  ",";
                        }
                    }
                    $insertOrder = mysqli_query($con,  "INSERT INTO `cthd` (`MAHD`,
                        `MASP`, `SOLUONG`, `SIZE`, `GIA`) VALUES " . $insertString . ";");
                    var_dump($insertOrder);
                    exit;
                }
                break;
        }
    }
    if (!empty($_SESSION["cart"])) {
        $products = mysqli_query($con, "SELECT * FROM `sanpham` 
                    WHERE `MASP` IN (" . implode(",", array_keys($_SESSION["cart"])) . ")");
    }

    ?>
    <?php
    require "inc/header.php";
    // require "public/js.php";
    ?>

    <div class="section__cart container">
        <a href="index.php">Trang chủ</a>
        <h1>Giỏ hàng</h1>
        <form id="cart-form" action="cartDevelopment.php?action=submit" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-10">

                        <table>
                            <tr>
                                <th class="product-number">STT</th>
                                <th class="product-img">Ảnh sản phẩm</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-price">Đơn giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="total-money">Thành tiền</th>
                                <th class="product-delete">Xóa</th>
                            </tr>
                            <?php
                            if (!empty($products)) {
                                $total = 0;
                                $num = 1;
                                while ($row = mysqli_fetch_array($products)) { ?>
                                    <tr>
                                        <td class="product-number"><?= $num++; ?></td>
                                        <td class="product-img"><img class="img-fluid" src="<?= $row['HINHCHINH'] ?>" /></td>
                                        <td class="product-name"><?= $row['TENSP'] ?></td>
                                        <td class="product-price"><?= number_format($row['GIA'], 0, ",", ".") ?></td>
                                        <td class="product-quantity"><input type="text" value="<?= $_SESSION["cart"][$row['MASP']] ?>" name="quantity[<?= $row['MASP'] ?>]" /></td>
                                        <td class="total-money"><?= number_format($row['GIA'] * $_SESSION["cart"][$row['MASP']], 0, ",", ".") ?></td>
                                        <td class="product-delete"><a href="cartDevelopment.php?action=delete&MASP=<?= $row['MASP'] ?>">Xóa</a></td>
                                    </tr>
                                <?php
                                    $total += $row['GIA'] * $_SESSION["cart"][$row['MASP']];
                                    $num++;
                                } ?>
                                <tr id="row-total">
                                    <td class="product-number">&nbsp;</td>
                                    <td class="product-name">Tổng tiền</td>
                                    <td class="product-img">&nbsp;</td>
                                    <td class="product-price">&nbsp;</td>
                                    <td class="product-quantity">&nbsp;</td>
                                    <td class="total-money"><?= number_format($total, 0, ",", ".") ?></td>
                                    <td class="product-delete">Xóa</td>
                                </tr>

                            <?php

                            } ?>

                        </table>
                        <div id="form-button">
                            <input type="submit" name="update_click" value="Cập nhật" />
                        </div>
                    </div>
                    <div class="col-2">
                        dsadas
                    </div>
                </div>
            </div>








            <div><label>Người nhận: </label><input type="text" value="" name="name1" /></div>
            <div><label>Email</label><input type="email" value="" name="email" /></div>
            <div><label>Điện thoại: </label><input type="text" value="" name="phone" /></div>
            <div><label>Địa chỉ: </label><input type="text" value="" name="address1" /></div>
            <div><label>Ghi chú: </label><textarea name="note" cols="50" rows="7"></textarea></div>
            <input type="submit" name="order_click" value="Đặt hàng" />

        </form>
    </div>


    <?php
    require "inc/footer.php";

    ?>

</body>

</html>