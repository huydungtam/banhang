<?php 
	$conn = mysqli_connect('Localhost','root','','banhang');
	if(!$conn){
		echo("Khong ket noi duoc voi database");
	}else{
		if(isset($_POST['txthangsp']) && isset($_POST['txtanh']) && isset($_POST['txtten']) && isset($_POST['txtgia']) && isset($_POST['txtchitiet']) && isset($_POST['txtsoluong'])){
			$hangsanpham = $_POST['txthangsp'];
			$anh = $_POST['txtanh'];
			$ten = $_POST['txtten'];
			$gia = $_POST['txtgia'];
			$chitiet = $_POST['txtchitiet'];
			$soluong = $_POST['txtsoluong'];
		}else{
			$hangsanpham = "";
			$anh ="";
			$ten ="";
			$gia = "";
			$chitiet = "";
			$soluong = "";
		}
		if(isset($_POST['sua']) ? $_POST['id'] : null){
			$c = "SELECT * FROM mobile WHERE id = '".$_POST['id']."'";
			$d = mysqli_query($conn,$c);
			$f = mysqli_fetch_assoc($d);
		}
		if(isset($_POST['ok'])){
			if($hangsanpham == ""|| $anh == ""|| $ten == ""|| $gia ==""|| $chitiet == ""|| $soluong == ""){
				echo "Mời nhập đầy đủ thông tin";
			}else{
				$a = "UPDATE mobile SET hangsp = '$hangsanpham', anh = '$anh', ten = '$ten', gia = '$gia', chitiet = '$chitiet', soluong = '$soluong' WHERE id = '".$_POST['id']."'";
				if(mysqli_query($conn,$a)){
					header("Location:".$_POST['txthangsp'].".php");
				}else{
					echo("Co loi xay ra");
				}
			}
		}
		if(isset($_POST['huy'])){
			header("Location:admin.php");
		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sua</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<form method="Post">
		<table cellpadding="10" cellspacing="0" border="1" style="margin: auto; text-align: center; margin-top: 20px;">
			<tr>
				<th>Hãng sản phẩm</th>
				<th>Ảnh</th>
				<th>Tên</th>
				<th>Giá</th>
				<th>Chi tiết</th>
				<th>Số lượng</th>
			</tr>
			<tr>
				<td><input type="text" name="txthangsp" value="<?php echo $f['hangsp'];?>"></td>
				<td><input type="text" name="txtanh" value="<?php echo $f['anh']; ?>"></td>
				<td><input type="text" name="txtten" value="<?php echo $f['ten']; ?>"></td>
				<td><input type="text" name="txtgia" value="<?php echo $f['gia']; ?>"></td>
				<td><textarea name="txtchitiet"><?php echo $f['chitiet']; ?></textarea></td>
				<td><input type="text" name="txtsoluong" value="<?php echo $f['soluong']; ?>"></td>
			</tr>
			<tr>
				<td colspan="6">
					<input type="hidden" name="id" value="<?php echo isset($_POST['sua']) ? $_POST['id'] : null; ?>">
					<input type="submit" name="ok" value="OK" style="width: 100px; margin: 10px;">
					<input type="submit" name="huy" value="Hủy" style="width: 100px;">
				</td>
			</tr>
		</table>
	</form>	
</body>
</html>