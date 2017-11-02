<?php
	session_start();			
	$total=0;
	$conn = mysqli_connect('localhost','root','','banhang');
	if(isset($_POST['themgh'])){
		$a = "SELECT * FROM mobile WHERE id = '".$_POST['id']."'";
		$b = mysqli_query($conn,$a);
		$c = mysqli_fetch_assoc($b);	
		if(!isset($_SESSION['giohang'])){
			$tien= $c['gia'] * $_POST['soluongmua'];
			$_SESSION['giohang'][0] = ['idsp' => $_POST['id'],'soluong' => $_POST['soluongmua'],'tien'=> $tien];			
		} else {
			$add = false;
			$keyExist = 0;
			foreach($_SESSION['giohang'] as $key => $value){
				if($value['idsp'] == $_POST['id']){
					$add = true;
					$keyExist = $key;
				}
			}
			if ($add == true) {
				$value['soluong'] += $_POST['soluongmua'];
				$_SESSION['giohang'][$keyExist]['soluong'] = $value['soluong'];
				$_SESSION['giohang'][$keyExist]['tien'] = $c['gia'] * $value['soluong'];
			}else{
				$tien = $_POST['soluongmua'] * $c['gia'];
				array_push($_SESSION['giohang'], ['idsp' => $_POST['id'],'soluong' => $_POST['soluongmua'],'tien' => $tien]);
			}
		}
	}
	if(isset($_POST['xoagh'])){
		session_destroy();
		header("Location:index.php");
	}
	if(isset($_POST['datmua'])){
		header("Location:datmua.php");
	}
	if(isset($_POST['xoa'])){
		foreach($_SESSION['giohang'] as $key => $value){
			if($_SESSION['giohang'][$key]['idsp'] == $_POST['id']){
				unset($_SESSION['giohang'][$key]);
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
					<p style="text-align: center; padding: 10px; color: white;background: #9a8e8e;">Giỏ hàng</p>
					<form method="Post">
						<table border="1" cellpadding="10" width="300" cellspacing="0">
						<tr>
							<td>Sản phẩm</td>
							<td>Giá</td>
							<td>Số lượng</td>
							<td>Tiền</td>
							<td>Xóa</td>
						</tr>
						<?php 
							foreach($_SESSION['giohang'] as $key => $value){
								$total +=$value['tien']; 
					 	?>
					 	<?php 
					 		$f = "SELECT * FROM mobile WHERE id = '".$value['idsp']."'";
					 		$g = mysqli_query($conn,$f);
					 		while($row = mysqli_fetch_array($g)){
					 	 ?>
						<tr>
							<td style="text-align: center;">
								<img src="<?php echo $row['anh']; ?>" style ="width: 50px;">
								<p><?php echo $row['ten']; ?></p>
							</td>
							<td style="text-align: center;"><?php echo $row['gia']; ?></td>
							<td style="text-align: center;"><?php echo $value['soluong']; ?></td>
							<td style="text-align: center;"><?php echo $value['tien']; ?></td>
							<form method="Post">
								<td>
									<input type="hidden" name="id" value="<?php echo $value['idsp']; ?>">
									<input type="submit" name="xoa" value="Xóa">
								</td>
							</form>				
						</tr>
						<?php
								}
							}
						?>
						<tr>
							<td style="text-align: center;">Tổng tiền</td>
							<td colspan="4" style="text-align: center;"><?php echo $total; ?></td>
						</tr>
						<tr>
							<td colspan="5" style="text-align: center;">
								<input type="submit" name="datmua" value="Đặt mua">
								<input type="submit" name="xoagh" value="Xóa giỏ hàng">
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