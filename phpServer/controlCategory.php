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
				<a href="../index.php" class="mylink-li"><li class="sign">退出</li></a>
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
				<li class="control-content" id="menu-class"><a href="controlCategory.php"><i class="iconfont">&#xe60b;</i>文章分类</a></li>
				<li class="control-content"><a href="controlPhotos.php"><i class="iconfont">&#xe60d;</i>相册管理</a></li>
				<li class="control-content"><a href="controlComment.php"><i class="iconfont">&#xe60f;</i>评论审核</a></li>
			</ul>
		</div>
		<div id="area-class" class="control-area">				
			<form action="categoryPublish.php" method="get">
			<input type="text" name="name" placeholder="请输入新分类">
			<button>添加</button>
			</form>
			<div id="bigbox">
			<?php
				require_once 'conn.php';
				$sql = "select * from terms ORDER BY term_id DESC";
				$re = mysqli_query($link,$sql);
				
				foreach ($re as $row) {
					$sql = "select * from article where category=".$row['term_id'];
					$res = mysqli_query($link,$sql);
					$category_num = mysqli_num_rows($res);
					echo "<div class='smallbox'><div class='cate-list'><i class='iconfont'>&#xe610;</i><span>{$row['name']}(".$category_num.")</span><a href='categoryDelete.php?id=".$row['term_id']."'>删除</a>";
					// echo "<a href='categoryDelete.php?id=".$row['term_id']."'>删除</a>";
					echo "<ul class='list-box'>";
					foreach ($res as $row) {
						echo "<li>{$row['title']}</li>";
					}
					echo "</ul></div></div>";
				}
				mysqli_close($link);
			 ?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/waterfall.js"></script>
</body>
</html>