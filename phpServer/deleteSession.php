<?php
	// 登录验证
	session_start();
	if(!isset($_SESSION['temp'])){
			echo "<script>location.href='../pages/login.html'</script>";
	}else{
		unset($_SESSION['temp']);
		echo "<script>location.href='../index.php'</script>";
	}
?>