<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header("Location:dangnhap.php");
	}
 ?>