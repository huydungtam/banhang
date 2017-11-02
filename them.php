<?php 
	$conn = mysqli_connect('localhost','root','','banhang');
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
		if(isset($_POST['ok'])){
			if($hangsanpham == ""|| $anh == ""|| $ten == ""|| $gia ==""|| $chitiet == ""|| $soluong == ""){
				echo "Mời nhập đầy đủ thông tin";
			}else{
				$a = "INSERT INTO mobile(hangsp,anh,ten,gia,chitiet,soluong) VALUE ('$hangsanpham','$anh','$ten','$gia','$chitiet','$soluong')";
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
	<title>Them</title>
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
				<td><input type="text" name="txthangsp"></td>
				<td><input type="text" name="txtanh"></td>
				<td><input type="text" name="txtten"></td>
				<td><input type="text" name="txtgia"></td>
				<td><textarea name="txtchitiet"></textarea></td>
				<td><input type="text" name="txtsoluong"></td>
			</tr>
			<tr>
				<td colspan="6">
					<input type="submit" name="ok" value="OK" style="width: 100px; margin: 10px;">
					<input type="submit" name="huy" value="Hủy" style="width: 100px;">
				</td>
			</tr>
		</table>
	</form>	
</body>
</html>