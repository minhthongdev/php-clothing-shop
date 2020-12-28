<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/infoAccount.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php 
        require "inc/header.php";
        require "public/js.php";
        include "connect.php";
        session_start();
        $id = (int)$_SESSION['current_user'][1];
        $sql = "SELECT * FROM khachhang WHERE makh='$id'";
        $rs = $con->query($sql);
        $row = mysqli_fetch_array($rs);
    ?>
    <div class='container info-account'>
        <h1 class='title'>Tài khoản của bạn<h1>
        <h3 class="infoAccount">Thông tin tài khoản</h3>
        <h5><?= $row[1] ?></h5>
        <p><?= $row[2] ?></p>
        <p><?= $row[4] ?></p>
        <p><?= $row[3] ?></p>
        <h3  class="infoBill">Danh sách đơn hàng đã mua</h3>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                    <th>Ngày đặt</th>
                    <th>Thành tiền</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $query = "SELECT MAHD, NGAYHD, THANHTIEN, TRANGTHAI FROM HOADON WHERE MAKH='$id'";
                    $_rs = $con->query($query);
                    if (mysqli_num_rows($rs)>0){
                        while($_row = mysqli_fetch_array($_rs))
                    {   
                        $trangthai = $_row[3] == 1 ? 'Đã duyệt' : 'Chưa duyệt'; 
                        echo "
                            <tr>
                                <td>$_row[0]</td>
                                <td>$_row[1]</td>
                                <td>$_row[2]</td>
                                <td>$trangthai</td>
                            </tr>
                        ";
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
    <?php 
        require "inc/footer.php";
    ?>
</body>
</html>