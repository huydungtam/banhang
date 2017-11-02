<?php 
	include("kiemtrass.php");
	if(isset($_POST['logout'])){
		session_destroy();
		header("Location:dangnhap.php");
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="wrapper">
		<p style="width: 100%; background: #9a8e8e;color: white; text-align: center;height: 50px;line-height: 50px;">Quản lí</p>
		<div class="menu">
			<ul>
				<li><a href="dienthoai.php">Điện thoại</a></li>
				<li><a href="laptop.php">Lap top</a></li>
				<li><a href="donhang.php">Đơn hàng</a></li>
			</ul>
		</div>
	</div>
	<form method="Post">
			<input type="submit" name="logout" value="Đăng xuất" style="margin-left: 140px;">
	</form>
</body>
</html>