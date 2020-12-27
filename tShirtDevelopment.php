<!-- <link rel="stylesheet" href="index.css" /> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <!-- FILE CSS -->
    <link rel="stylesheet" href="style/collectionProduct.css" />

</head>

<body>

    <?php
    $param = "";
    $sortParam = "";
    $orderCondition = "";
    //tìm kiếm
    $search = isset($_GET['search']) ? $_GET['search'] : "";
    if ($search) {
        $where = "WHERE `TENSP` LIKE '%" . $search . "%'";
        $param .= "search=" . $search;
        $sortParam = "search=" . $search . "&";
    }
    //sắp xếp
    $orderField = isset($_GET['field']) ? $_GET['field'] : "";
    $orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

    if (!empty($orderField) && !empty($orderSort)) {
        $orderCondition = "ORDER BY `sanpham`.`" . $orderField . "`" . $orderSort;
        $param .= "field=" . $orderField . "&sort=" . $orderSort . "";
    }





    include 'connect.php';
    $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 24;
    $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if ($search) {
        $products = mysqli_query($con, "select * from `sanpham` where MALOAI = 1 AND `TENSP` LIKE '%" . $search . "%'  " . $orderCondition . "  LIMIT " . $item_per_page . " OFFSET " . $offset . " ");
        $totalRecords = mysqli_query($con, "select * from `sanpham` where MALOAI = 1 AND `TENSP` LIKE '%" . $search . "%'");
    } else {
        $products = mysqli_query($con, "select * from `sanpham` WHERE MALOAI = 1 " . $orderCondition . "  LIMIT " . $item_per_page . " OFFSET " . $offset . " ");
        $totalRecords = mysqli_query($con, "select * from `sanpham` where MALOAI=1");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    ?>
    <?php
    require "inc/header.php";
    require "public/js.php";
    ?>


    <div class="main_products">

        <form id="product-search" action="" method="GET">
            <div class="lookup__section">
                <input type="text" name="search" placeholder="Search.." value="<?= isset($_GET['search']) ? $_GET['search'] : "" ?>" require>
            </div>
        </form>






        <ul class="lightrope">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="row">


            <select name="" id="sort-box" class="dropdown" onchange="this.options[this.selectedIndex].value
            && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Sản phẩm nổi bật</option>
                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=GIA&sort=desc">Giá: Giảm dần</option>
                <option <?php if (isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?<?= $sortParam ?>field=GIA&sort=asc">Giá: Tăng dần</option>
                <option value="?<?= $sortParam ?>field=TENSP&sort=asc">Tên: A-Z</option>
                <option value="?<?= $sortParam ?>field=TENSP&sort=desc">Tên: Z-A</option>
                <option value="?<?= $sortParam ?>field=GIA&sort=desc">Giá dưới 300k</option>

            </select>


            <div class="row">
                <div class="col-3">
                    <div class="section__vertical__menu">
                        <ul>
                            <li class="nav-item">
                                <a class="nav-link" href="tShirtDevelopment.php">ÁO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pantsDevelopment.php">QUẦN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="outerwearDevelopment.php">ÁO KHOÁC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="backpack.php">BALO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tote.php" >TÚI</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="hats.php">NÓN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="wallet.php">VÍ</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
                <div class="col-9 ">
                    <div class="products-content">
                        <div class="product-items row">
                            <?php
                            while ($row = mysqli_fetch_array($products)) {
                            ?>
                                <div class="products-item">
                                    <a href="detail.php?MASP=<?= $row['MASP'] ?>">
                                        <div class="products-img">
                                            <img src="<?= $row['HINHCHINH'] ?>" title="ao" alt="asd">
                                            <div class="products-img-hover">
                                                <img class="products-img-hover-show" src="<?= $row['HINH1'] ?>" title="ao" alt="asd">
                                            </div>
                                        </div>
                                    </a>
                                    <p class="products-name font-weight-bold text-center"><?= $row['TENSP'] ?></p>
                                    <div class="products-price font-weight-bold text-center"><?= number_format($row['GIA'], 0, ",", ".") ?>đ</div>
                                </div>
                            <?php } ?>
                            <?php
                            include 'pagination.php'
                            ?>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <?php
        require "inc/footer.php";
        ?>


</body>

</html>