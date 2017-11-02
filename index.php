<?php 
	$conn = mysqli_connect('localhost','root','','banhang');
	if(!$conn){
		echo "Khong ket noi duoc voi database";
	}else{
		$a = "SELECT * FROM mobile LIMIT 10";
		$b = mysqli_query($conn,$a);
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
					<p style="text-align: center; padding: 10px; color: white;background: #9a8e8e;">Sản Phẩm</p>
					<ul>
						<?php while($row = mysqli_fetch_array($b)){ ?>
						<li>
							<img src="<?php echo $row['anh']; ?>" width="100" height="100">
							<p>Tên : <?php echo $row['ten']; ?></p>
							<p>Giá : <?php echo $row['gia']; ?>vnđ</p>
							<p><a href="chitiet.php?id=<?php echo $row['id']; ?>">Chi tiết</a></p>
						</li>
						<?php } ?>
					</ul>
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