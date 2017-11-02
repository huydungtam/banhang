<?php 
	$con = mysqli_connect('localhost','root','','banhang');
	$a   = "SELECT dh.id,mb.ten,tggh.soluong,dh.tonggia,dh.ngaydat FROM donhang as dh
	INNER JOIN trunggiangh as tggh ON tggh.iddonhang = dh.id
	INNER JOIN mobile as mb ON mb.id = tggh.idsanpham
	";
	 $b = mysqli_query($con,$a);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="container">
		<p style="width: 100%; background: #9a8e8e;color: white; text-align: center;height: 50px;line-height: 50px;">Đơn hàng</p>
		<div class="main">
			<table border="1" cellspacing="0" style="margin: auto; text-align: center;">
				<tr>
					<th>Mã đơn hàng</th>
					<th>Tên sản phẩm</th>
					<th>Số lượng</th>
					<th>Tổng tiền</th>
					<th>Ngày đặt</th>
				</tr>
				<?php while ($row = mysqli_fetch_array($b)){ ?>
				<tr>
					<?php 
						$e = "SELECT * FROM trunggiangh WHERE iddonhang = '".$row['id']."'";
						$g = mysqli_query($con,$e);
						$f = mysqli_num_rows($g);
					 ?>
					<td rowspan="$f"><?php echo $row['id']; ?></td>
					<td><?php echo $row['ten']; ?></td>
					<td><?php echo $row['soluong']; ?></td>
					<td rowspan="$f"><?php echo $row['tonggia']; ?></td>
					<td><?php echo $row['ngaydat']; ?></td>
				</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>
