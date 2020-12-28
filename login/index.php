<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    
    <!-- Latest compiled and minified CSS -->
    
</head>
<body>
    <div class="form">
        <div class="avi"></div>
        <form action='' method='post'>
        <input type="text" value="Username" onfocus="this.value='';" name='name'/>
        <input type="text" value="Password" onfocus="this.value='';" name='password'/>
        <input type="submit" value="Login" action="submit" name='submit'/>
        <a href='http://localhost:90/adminpage/index.php' class="btn btn-primary">Đến trang admin</a>
    </form>
    </div><!--form-->
    </div>
    <?php 
        include 'connect.php';
        session_start();
        if(isset($_POST['submit'])){
            $username = $_POST['name'];
            $password = $_POST['password'];
            $sql = "SELECT * FROM user WHERE TAIKHOAN='$username'";
            $rs = $con->query($sql);
            $row=mysqli_fetch_row($rs); 
            if(($username==$row[2] && $password==$row[3] && $row[4]==0 )){
                $_SESSION['current_user'] = $row;
                header ('Location: ./../index.php');
            }
            else if(($username==$row[2] && $password==$row[3] && $row[4]==1 )){
                $_SESSION['current_user'] = $row;
                header ('Location: http://localhost:90/adminpage/index.php');
            }
        }?>
    
</body>
</html>