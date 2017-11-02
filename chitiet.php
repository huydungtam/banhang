<?php 
	$conn = mysqli_connect('localhost','root','','banhang');
	if(!$conn){
		echo "Khong ket noi duoc voi database";
	}else{
		$a = "SELECT * FROM mobile WhERE id = '".$_GET['id']."'";
		$b = mysqli_query($conn,$a);
		$c = mysqli_fetch_assoc($b);
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
					<p style="text-align: center; padding: 10px; color: white;background: #9a8e8e;">Chi Tiết Sản Phẩm</p>
					<div class="main">
						<img src="<?php echo $c['anh']; ?>" width="200" height="350" style = " float: left;">
						<form action="giohang.php" method="Post">
							<table border="1" cellspacing="0" cellpadding="5">
								<tr>
									<td>Tên</td>
									<td><input type="text" name="txtten" value="<?php echo $c['ten']; ?>" style = "width: 400px; text-align: center;">
									</td>
								</tr>
								<tr>
									<td>Giá</td>
									<td><input type="text" name="txtgia" value="<?php echo $c['gia']; ?>" style = "width: 400px; text-align: center;"></td>
								</tr>
								<tr>
									<td>Chi tiết</td>
									<td><textarea name="txtchitiet" style="width: 402px; height: 244px;"><?php echo $c['chitiet']; ?></textarea></td>
								</tr>
								<tr>
									<td>
										Số lượng<input type="number" name="soluongmua" value="1" style="width: 118px;margin-left:5px;">
									</td>
									<td style="text-align: center;">
										<input type="hidden" name="id" value="<?php echo $c['id']; ?>">
										<input type="submit" name="themgh" value="Thêm giỏ hàng" style="margin-right: 10px;">
										<input type="submit" name="xemgh" value="Xem giỏ hàng">
									</td>
								</tr>
							</table>
						</form>						
					</div>				
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