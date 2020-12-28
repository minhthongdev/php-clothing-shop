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
    <link rel="stylesheet" href="style/cart.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
    include 'connect.php';
    if (isset($_SESSION['current_user'])) {
        $current_user = $_SESSION['current_user'];
    }
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    $error = false;
    $success = false;
    $slCurrent=0 ;
    if (isset($_GET["action"])) {
        function updateCart($add = false)
        {
            foreach ($_POST['quantity'] as $MASP => $quantity) {
                if ($quantity == 0 || $quantity < 0) {
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
                    if (empty($_POST['quantity'])) {
                        $error = "Giỏ hàng rỗng";
                    }

                    if ($error == false && !empty($_POST['quantity'])) {
                        $products = mysqli_query($con, "SELECT * FROM `sanpham` WHERE `MASP` IN 
                        (" . implode(",", array_keys($_POST["quantity"])) . ")");
                        $total = 0;
                        $orderProducts = array();
                        while ($row = mysqli_fetch_array($products)) {
                            $orderProducts[] = $row;
                            $total += $row['GIA'] * $_POST['quantity'][$row['MASP']];
                        }

                        // $insertOrder = mysqli_query($con, "INSERT INTO `hoadon` (`MAHD`, `MAKH`, `NGAYHD`,
                        // `GIAMGIA`, `THANHTIEN`, `GHICHU`, `HOTEN`, `SDT`, 
                        // `DIACHI`) VALUES (NULL, NULL, '" . time() . "', '', '" . $total . "',
                        // '" . $_POST['note'] . "', '" . $_POST['name1'] . "',
                        //  '" . $_POST['phone'] . "', '" . $_POST['address1'] . "');
                        // ");

                        // $orderID = $con->insert_id;
                        // $insertString = "";
                        // $num = 0;


                        //     foreach ($orderProducts as $key => $product) {
                    
                        date_default_timezone_set("Asia/Bangkok");
                        $date = date('Y-m-d h:i:s');
                        $insertOrder = mysqli_query($con, "INSERT INTO `hoadon` (`MAHD`, `MAKH`, `NGAYHD`,
                            `GIAMGIA`, `THANHTIEN`, `GHICHU`,`TrangThai`, `IDNGUOIDUYET`, `HOTEN`, `SDT`, 
                            `DIACHI`) VALUES (NULL, $current_user[1],  '" . $date . "',  '', '" . $total . "',
                            '" . $_POST['note'] . "', 0 ,null, '" . $_POST['name1'] . "',
                            '" . $_POST['phone'] . "', '" . $_POST['address1'] . "');
                            ");
                        $orderID = $con->insert_id;
                        $insertString = "";
                        // $updateString = "";
                        $num = 0;

                        foreach ($orderProducts as $key => $product) {

                            $insertString .=  "('" . $orderID . "', '" . $product['MASP'] . "', '" . $_POST['quantity'][$product['MASP']] . "', 
                            'L', '" . $product['GIA'] . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString .=  ",";
                            }
                            $sl = (int)$_POST['quantity'][$product['MASP']];
                            $masp = $product['MASP'];
                            $updateString ="UPDATE sanpham SET SOLUONG=SOLUONG - $sl WHERE MASP= $masp";
                            $update = mysqli_query($con, $updateString);
                        }
                        $insertOrder = mysqli_query($con,  "INSERT INTO `cthd` (`MAHD`,
                        `MASP`, `SOLUONG`, `SIZE`, `GIA`) VALUES " . $insertString . ";");
                        $success = "Đặt hàng thành công";
                        unset($_SESSION['cart']);
                    }
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

    <div class="section__cart">
        <?php if (!empty($error)) { ?>
            <div id="checkout__section" style="margin-left: 100px;">
                <?= $error ?>. <a href="javascript:history.back()">Quay lại</a>
            </div>
        <?php } else if (!empty($success)) { ?>
            <div id="checkout__section" style="margin-left: 100px;">
                <?= $success ?>. <a href="accessories.php">Tiếp tục mua hàng</a>
            </div>
        <?php } else { ?>



            <form id="cart-form" action="cartDevelopment.php?action=submit" method="POST">
                <div class="">
                    <div class="row">
                        <div class="col-md-8 col-12 table__section">
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
                                $arrQuantity = [];
                                $arrSLTrongKho = [];
                                if (!empty($products)) {
                                    $total = 0;
                                    $num = 1;
                                    while ($row = mysqli_fetch_array($products)) { ?>
                                        <tr>
                                            <?php 
                                                $idSP = (int)$row['MASP'];
                                                $soluongquery = "SELECT SOLUONG FROM SANPHAM WHERE masp=$idSP";
                                                $rsSL = $con->query($soluongquery);
                                                $rowTemp = mysqli_fetch_array($rsSL);
                                                $rowSL = $rowTemp[0];
                                                settype($rowSL, "integer");
                                            ?>
                                            <td class="product-number"><?= $num++; ?></td>
                                            <td class="product-img"><img class="img-fluid" src="<?= $row['HINHCHINH'] ?>" /></td>
                                            <td class="product-name"><?= $row['TENSP'] ?></td>
                                            <td class="product-price"><?= number_format($row['GIA'], 0, ",", ".") ?></td>
                                            <td class="product-quantity"><input type="text" value="<?= $_SESSION["cart"][$row['MASP']] ?>" name="quantity[<?= $row['MASP'] ?>]" /></td>
                                            <td class="total-money"><?= number_format($row['GIA'] * $_SESSION["cart"][$row['MASP']], 0, ",", ".") ?></td>
                                            <td class="product-delete"><a href="cartDevelopment.php?action=delete&MASP=<?= $row['MASP'] ?>">Xóa</a></td>
                                            <?php 
                                                $arrQuantity[] = (int)$_SESSION["cart"][$row['MASP']];
                                                $arrSLTrongKho[] = $rowSL;
                                            ?>
                                        </tr>
                                    <?php
                                        $total += $row['GIA'] * $_SESSION["cart"][$row['MASP']];
                                        // $num++;
                                    } ?>
                                    <tr id="row-total">
                                        <td class="product-number">&nbsp;</td>
                                        <td class="product-name">Tổng tiền</td>
                                        <td class="product-img">&nbsp;</td>
                                        <td class="product-price">&nbsp;</td>
                                        <td class="product-quantity">&nbsp;</td>
                                        <td class="total-money"><?= number_format($total, 0, ",", ".") ?></td>
                                        <td class="product-delete">&nbsp;</td>
                                    </tr>

                                <?php

                                } ?>
                            </table>
                            <div id="form-button">
                                <?php 
                                    $temp = 0;
                                    // echo $slCurrent;
                                    // echo $rowSL;
                                    foreach ($arrQuantity as $i => $quantity) {
                                        if ($quantity <= $arrSLTrongKho[$i]) {
                                        }
                                        else {
                                            $temp++;
                                        }
                                    }
                                ?>
                                <input class="input__update__cart" type="submit" name="update_click" value="Cập nhật" />
                            </div>
                        </div>
                        <div class="col-md-4 col-12 form__section">
                            <?php
                                if (isset($_SESSION['current_user'])) {
                                    $makh = $current_user[1];
                                    $sql = "SELECT HOTEN, SDT, DIACHI FROM KHACHHANG WHERE MAKH= $makh";
                                    $rs = $con->query($sql);
                                    $row = mysqli_fetch_row($rs);
                                    $ten = $row[0];
                                    $sdt = $row[1];
                                    $diachi = $row[2];
                                    echo "
                                <div class='form__section__input'>
                                <label>Người nhận: </label><input class='input__item' type='text' value='$ten' name='name1' /></div>
                                <div class='form__section__input'><label>Điện thoại: </label><input class='input__item' type='text' value='$sdt' name='phone' /></div>
                                <div class='form__section__input'><label>Địa chỉ: </label><input class='input__item' type='text' value='$diachi' name='address1' /></div>
                                <div class='form__section__input'><label>Ghi chú: </label><textarea name='note' cols='50' rows='7'></textarea></div>";
                                if ($temp == 0) {  
                                echo "<input type='submit' name='order_click' class='button__order__click' value='Đặt hàng' />";
                                }
                                else {
                                    echo "<div class='red'>Số lượng sản phẩm không đủ để thực hiện mua hàng, vui lòng chọn lại</div>";
                                }
                            ?>   
                            <?php
                                } else {
                                    echo "Bạn chưa đăng nhập, vui lòng đăng nhập để mua hàng";
                                }
                            ?>

                        </div>
                    </div>
                </div>



            </form>

        <?php } ?>
    </div>



    </div>


    <?php
    // require "inc/footer.php";

    ?>

</body>

</html>