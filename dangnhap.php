<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng Nhập</title>
</head>
<body>
	<form action="" method="Post">
		<table border="1" cellpadding="10" cellspacing="0">
			<tr>
				<td colspan="2" style="text-align: center;">Đăng Nhập</td>
			</tr>
			<tr>
				<td>Tên tài khoản</td>
				<td><input type="text" name="tentk"></td>
			</tr>
			<tr>
				<td>Mật Khẩu</td>
				<td><input type="password" name="matkhau"></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center;">
					<input type="submit" name="dangnhap" value="Đăng nhập">
					<input type="submit" name="huy" value="Hủy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
	session_start();
	$con = mysqli_connect('localhost','root','','banhang');
	if(!$con){
		echo "Ket noi khong thanh cong";
	}
	if(isset($_POST['tentk'])&& isset($_POST['matkhau'])){
		$tentk = $_POST['tentk'];
		$matkhau = $_POST['matkhau'];
	}else{
		$tentk = "";
		$matkhau = "";
	}
	if(isset($_POST['dangnhap'])){
		$matkhau = md5($_POST['matkhau']);
		$a = "SELECT * FROM taikhoan WHERE tentaikhoan = '".$_POST['tentk']."' and matkhau ='".$matkhau."'";
		$b = mysqli_query($con,$a);
		if(mysqli_num_rows($b) == 0){
			echo "Sai mat khau hoac tai khoan, vui long kiem tra lai";
		}else{
			$_SESSION['dangnhap'] = ['tentk' => $tentk , 'matkhau' => $matkhau];
			if(isset($_SESSION['dangnhap'])){
				header("Location:admin.php");
			}
			
		}
	}
 ?>