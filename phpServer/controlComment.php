<?php
	// 登录验证
	session_start();
	if(!isset($_SESSION['temp'])){
			echo "<script>location.href='../pages/login.html'</script>";
	}
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>myBlog</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div id="top-fix">
		<div class="container">
			<ul>
				<li class="title-content" id="left-icon"><a href="../index.php"><div>博客</div></a></li>
				<li class="title-control"><a href="">后台管理</a></li>
			</ul>
			<ul id="mylink">
				<a href="deleteSession.php" class="mylink-li"><li class="sign">退出</li></a>
			</ul>
		</div>
	</div>
	<div id="control" class="container">
		<div id="control-menu">
			<ul>
				<div id="control-title">Menu</div>
				<li class="control-content"><a href="controlWrite.php"><i class="iconfont">&#xe60c;</i>写文章</a></li>
				<li class="control-content"><a href="controlMessage.php"><i class="iconfont">&#xe60e;</i>个人信息</a></li>
				<li class="control-content"><a href="controlManage.php"><i class="iconfont">&#xe60a;</i>文章管理</a></li>
				<li class="control-content"><a href="controlCategory.php"><i class="iconfont">&#xe60b;</i>文章分类</a></li>
				<li class="control-content"><a target="_blank" href="http://proyang.duoshuo.com/admin/"><i class="iconfont">&#xe60f;</i>留言管理</a></li>
			</ul>
		</div>
		<div class="control-area">
			<ul  id="area-words">
			<?php
				require_once "conn.php";
				$sql="select * from article where comments > 0 ORDER BY time DESC";
				$re=mysqli_query($link,$sql);
				foreach ($re as $row) {	
					echo "<li><dt>".$row['title']."</dt>";
					$sql="select * from comment where aid=".$row['id'];
					$com=mysqli_query($link,$sql);
					foreach ($com as $row) {
			?>		<dd>
						<div class="comment_name"><?php echo $row['name'];?></div>
						<div class="comment_time"><?php echo $row['mail'];?></div>
						<div class="comment_time"><?php echo $row['time'];?></div>
						<p class="comment_content"><?php echo $row['content'];?></p>
					</dd>
			<?php
					}
					echo "</li>";
				}
			?>
			</ul>
		</div>
	</div>
	<script type="text/javascript" src="../js/cateShow.js"></script>
</body>
</html>