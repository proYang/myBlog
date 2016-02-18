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
				<li class="control-content" id="menu-message"><a href="controlMessage.php"><i class="iconfont">&#xe60e;</i>个人信息</a></li>
				<li class="control-content"><a href="controlManage.php"><i class="iconfont">&#xe60a;</i>文章管理</a></li>
				<li class="control-content"><a href="controlCategory.php"><i class="iconfont">&#xe60b;</i>文章分类</a></li>
				<li class="control-content"><a href="controlPhotos.php"><i class="iconfont">&#xe60d;</i>相册管理</a></li>
				<li class="control-content"><a href="controlComment.php"><i class="iconfont">&#xe60f;</i>评论审核</a></li>
			</ul>
		</div>
		<div id="area-messgae" class="control-area">
			<?php
                require_once 'conn.php';
                $sql="select * from user";
                $re=mysqli_query($link,$sql);//执行sql语句
                $arr=mysqli_fetch_assoc($re);
            ?>
			<form id="imessage_form" method="post" action="messageUpdate.php">
                <div>
                	<span>昵称</span><input type="text" name="name" value="<?php echo $arr['name']?>"/>
                </div>
                <div>
                	<span>所在地</span><input type="text" name="address" value="<?php echo $arr['address']?>"/>
                </div>
                <div>
                	<span>职业</span><input type="text" name="profession" value="<?php echo $arr['profession']?>"/>
                </div>
                <div>
                	<span>爱好</span><input type="text" name="hobby" value="<?php echo $arr['hobby']?>"/>
                </div>
                <div>
                	<span class="imessage_span">个性签名</span><textarea name="motto" id="imessage_textarea1"><?php echo $arr['motto']?></textarea>
                </div>
                <div>
                	<span class="imessage_span">个人经历</span><textarea name="experience" id="imessage_textarea2"><?php echo $arr['experience']?></textarea>
                </div>
                <input id="write-submit" type="submit" value="确认修改"/>
            </form>
            <?php
				mysqli_close($link);
			?>
		</div>
	</div>
</body>
</html>