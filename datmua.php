<?php
	session_start();
	$total = 0;
	foreach($_SESSION['giohang'] as $key => $value){
		$total += $value['tien']; 
	}
	$con = mysqli_connect('localhost','root','','banhang');
	if(isset($_POST['tenkh'])&& isset($_POST['email'])&& isset($_POST['thanhpho']) && isset($_POST['quanhuyen'])&& isset($_POST['duong']) && isset($_POST['sodt'])){
		$tenkh = $_POST['tenkh'];
		$email = $_POST['email'];
		$thanhpho = $_POST['thanhpho'];
		$quanhuyen = $_POST['duong'];
		$duong = $_POST['duong'];
		$sodt = $_POST['sodt'];
	}else{
		$tenkh = "";
		$email = "";
		$thanhpho = "";
		$quanhuyen = "";
		$sodt = "";
	}
	if(isset($_POST['huy'])){
		header("Location:giohang.php");
	}
	if(isset($_POST['xacnhan'])){
		if($tenkh == "" || $email == "" || $thanhpho == "" || $quanhuyen == "" || $sodt == ""){
			echo "Moi ban nhap day du thong tin";
		}else{
			$a  = " INSERT INTO donhang(tonggia,tenkh,email,thanhpho,quanhuyen,duong,sodt) VALUE ('$total','$tenkh','$email','$thanhpho','$quanhuyen','$duong','$sodt')";
			$b = mysqli_query($con,$a);
			$iddh = mysqli_insert_id($con);
			if($b == true){
				foreach($_SESSION['giohang'] as $key => $value){
					$idsp = $value['idsp'];
					$soluong = $value['soluong'];
				$c = " INSERT INTO trunggiangh(iddonhang,idsanpham,soluong) VALUE ('$iddh','$idsp','$soluong')";
				$d = mysqli_query($con,$c);
				}
			}
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bán hàng</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<img src="images/logo.jpg">
		</div>
		<div class="menu">
			<ul>
				<li><a href="index.php">Trang chủ</a></li>
				<li><a href="">Sản phẩm</a></li>
				<li><a href="">Hàng hot</a></li>
				<li><a href="">Liên hệ</a></li>
				<li><a href="">Hướng dẫn</a></li>
			</ul>
		</div>
		<div class="content">
			<div class="left">
				<p style="text-align: center; padding: 10px; color: white;background: #9a8e8e;">Điện thoại</p>
				<div class="danhsachsanpham">
					<ul>
						<li><a href="">Iphone</a></li>
						<li><a href="">Sam sung</a></li>
						<li><a href="">Nokia</a></li>
						<li><a href="">Oppo</a></li>
						<li><a href="">Xiaomi</a></li>
						<li><a href="">LG</a></li>
					</ul>
				</div>
				<p style="text-align: center; padding: 10px; color: white;background: #9a8e8e;">Lap top</p>
				<div class="danhsachsanpham">
					<ul>
						<li><a href="">Dell</a></li>
						<li><a href="">Asus</a></li>
						<li><a href="">Lenovo</a></li>
						<li><a href="">HP</a></li>
						<li><a href="">Macbook</a></li>
					</ul>
				</div>
			</div>
			<div class="right">
				<div class="sanpham">
					<p style="text-align: center; padding: 10px; color: white;background: #9a8e8e;">Địa chỉ nhận hàng</p>
					<form method="Post">
						<table border="1" cellpadding="5" cellspacing="0" style="margin: auto;">
							<tr>
								<td colspan="2" style="text-align: center;">THÔNG TIN KHÁCH HÀNG</td>
							</tr>
							<tr>
								<td>Tên khách hàng</td>
								<td><input type="text" name="tenkh"></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><input type="text" name="email"></td>
							</tr>
							<tr>
								<td>Thành Phố</td>
								<td><input type="text" name="thanhpho"></td>
							</tr>
							<tr>
								<td>Quận/Huyện</td>
								<td><input type="text" name="quanhuyen"></td>
							</tr>
							<tr>
								<td>Đường/Thôn,Xóm/Số nhà</td>
								<td><input type="text" name="duong"></td>
							</tr>
							<tr>
								<td>Số điện thoại</td>
								<td><input type="text" name="sodt"></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: center;">
									<input type="submit" name="xacnhan" value="Xác nhận">
									<input type="submit" name="huy" value="Hủy">
								</td>
							</tr>
						</table>
					</form>
				</div>				
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="footer">
			<p style="background: #9a8e8e;color: white; font-size: 30px; line-height: 100px;text-align: center;">HDT</p>
		</div>
	</div>
</body>
</html>