<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Kí</title>
</head>
<body>
	<form action="" method="Post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td colspan="2" style="text-align: center;">Đăng Kí</td>
			</tr>
			<tr>
				<td>Tên tài khoản</td>
				<td><input type="text" name="txttentk"></td>
			</tr>
			<tr>
				<td>Mật khẩu</td>
				<td><input type="password" name="matkhau"></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu</td>
				<td><input type="password" name="matkhaulai"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" name="dangki" value="Đăng Kí">
					<input type="submit" name="huy" value="Hủy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php 
	$con = mysqli_connect("Localhost","root","","banhang");
	if(!$con){
		echo "Khong ket noi duoc database";
	}else{
		if(isset($_POST['txttentk'])&& isset($_POST['matkhau'])&& isset($_POST['matkhaulai'])){
			$txttentk = $_POST['txttentk'];
			$matkhau = $_POST['matkhau'];
			$matkhaulai = $_POST['matkhaulai'];

		}else{
			$txttentk = "";
			$matkhau = "";
			$matkhaulai = "";
		}
	}
	if(isset($_POST['dangki'])){
		if($txttentk == "" || $matkhau == "" || $matkhaulai == ""){
			echo("Moi ban nhap đầy đủ thông tin");
		}else if(strlen($matkhau)<8){
			echo "Mat khau phai it nhat 8 ki tu";
		}else{
			$matkhau = md5($matkhau);
			$matkhaulai = md5($matkhaulai);
			if($matkhau != $matkhaulai){
				echo"Mat khau khong giong nhau,vui long kiem tra lai";
				}else{
					$a = "SELECT * FROM taikhoan WHERE tentaikhoan = '".$_POST['txttentk']."'";
				$b = mysqli_query($con,$a);
				if(mysqli_num_rows($b) > 0){
					echo "Tai khoan da ton tai";
				}else{
					$c = "INSERT INTO taikhoan(tentaikhoan,matkhau) VALUE ('$txttentk','$matkhau')";
					if(mysqli_query($con,$c)){
						header("Location:admin.php");
					}else{
						echo "Dang ki khong thanh cong";
					}
				}
			}			
		}
	}
	if(isset($_POST['huy'])){
		header("Location:admin.php");
	}
 ?>