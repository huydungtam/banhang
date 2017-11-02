<?php 
	include("kiemtrass.php");
	$conn = mysqli_connect('localhost','root','','banhang');
	if(!$conn){
		echo("Khong the ket noi duoc voi database");
	}else{
		$a = "SELECT * FROM mobile WHERE hangsp = 'samsung'";
		$b = mysqli_query($conn,$a);
	}
	if(isset($_POST['xoa'])){
		$c = "DELETE FROM mobile WHERE id = '".$_POST['id']."'";
		$d = mysqli_query($conn,$c);
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sam sung</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<p style="width: 100%; background: #9a8e8e;color: white; text-align: center;height: 50px;line-height: 50px;">Sam Sung</p>
		<div class="menu">
			<ul>
				<li><a href="dienthoai.php">Trở về</a></li>
				<li><a href="them.php">Thêm sản phẩm</a></li>
			</ul>
		</div>
		<div class="main">
			<table border="1" cellpadding="10" cellspacing="0" style="margin: auto; text-align: center;"
				<tr>
					<th>Id</th>
					<th>Hãng sản phẩm</th>
					<th>Ảnh</th>
					<th>Tên</th>
					<th>Giá</th>
					<th>Chi tiết</th>
					<th>Số lượng</th>
					<th>Sửa</th>
					<th>Xóa</th>
				</tr>
				<?php while($row = mysqli_fetch_array($b)){ ?>
				<tr>					
					<td><input type="text" name="txtid" value="<?php echo $row['id']; ?>"></td>
					<td><input type="text" name="txthangsp" value="<?php echo $row['hangsp']; ?>"></td>
					<td><input type="text" name="txtanh" value="<?php echo $row['anh']; ?>"></td>
					<td><input type="text" name="txtten" value="<?php echo $row['ten']; ?>"></td>
					<td><input type="text" name="txtgia" value="<?php echo $row['gia']; ?>"></td>
					<td><textarea name="txtchitiet"><?php echo $row['chitiet']; ?></textarea></td>
					<td><input type="text" name="txtsoluong" value="<?php echo $row['soluong']; ?>"></td>
					<form action="sua.php" method="Post">
						<td>
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							<input type="submit" name="sua" value="Sửa"></td>
					</form>
					<form method="Post">
						<td>
							<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
							<input type="submit" name="xoa" value="Xóa">
						</td>
					</form>											
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>