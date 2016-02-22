<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>myBlog|个人简介</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div id="top-fix">
		<div class="container">
			<ul>
				<li class="title-content" id="left-icon"><a href=""><div>博客</div></a></li>
				<li class="title-content"><a href="../index.php">主页</a></li>
				<li class="title-content"><a href="articles.php">文章</a></li>
				<li class="title-content"><a href="photos.php">相册</a></li>
				<li class="title-content"><a href="time.php">足迹</a></li>
				<li class="title-content title-item"><a href="personal.php">个人简介</a></li>
				<li class="title-content"><a href="words.php">留言板</a></li>
			</ul>
			<ul id="mylink">
				<a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=t46Hg4KHjoWFhvfGxpnU2No" style="text-decoration:none;" target="_blank"><li class="iconfont">&#xe605;</li></a>
				<a href="https://github.com/proyang" target="_blank"><li class="iconfont">&#xe604;</li></a>
				<a href="https://www.zhihu.com/people/lei-zi-63-32" target="_blank"><li class="iconfont">&#xe602;</li></a>
				<a href="http://weibo.com/u/2205336312/" target="_blank"><li class="iconfont">&#xe601;</li></a>
				<a href="http://sighttp.qq.com/authd?IDKEY=421d7af4a2b3eb770398f7a4edb2868bb48edf41e368e446" target="_blank"><li class="iconfont">&#xe600;</li></a>
				<a href="login.html"><li class="sign">登录</li></a>
			</ul>
		</div>
	</div>
	<div id="main">
		<div id="personal_con" class="container">
			<?php
				require_once "../phpServer/conn.php";
				$sql="select * from user";
				$re=mysqli_query($link,$sql);
				$arr = mysqli_fetch_assoc($re);
				// print_r($arr);
			?>
			<div id="head-photo"><img src="../img/head-photo.jpg" alt="头像"></div>
			<div id="imessage">
				<p><a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=t46Hg4KHjoWFhvfGxpnU2No" style="text-decoration:none;" target="_blank"><?php echo $arr['name'];?></a></p>
				<p><?php echo $arr['address'];?></p>
				<p>现在是<?php echo $arr['profession'];?></p>
				<p>喜欢<?php echo $arr['hobby'];?></p>
			</div>
			<acticle id="myword">
<!-- 从数据库获取用户最新签名 -->
				<h4>个性签名:</h4>
				<p id="personal_motto"><?php echo $arr['motto'];?></p>
				</acticle>
			<div id="personal_left">
				<h4>个人经历:</h4>
				<p>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $arr['experience'];?></p>
			</div>
			<h4>分享一下</h4>
				<!-- JiaThis Button BEGIN -->
			<div id="personal_share" class="jiathis_style_32x32">
				<a class="jiathis_button_qzone"></a>
				<a class="jiathis_button_tsina"></a>
				<a class="jiathis_button_tqq"></a>
				<a class="jiathis_button_weixin"></a>
				<a class="jiathis_button_cqq"></a>
				<a class="jiathis_button_douban"></a>
				<a class="jiathis_button_email"></a>
				<a class="jiathis_button_copy"></a>
			</div>
				<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=2084374" charset="utf-8"></script>
					<!-- JiaThis Button END -->
			</div>
			
		</div>
	</div>
	<div id="footer" class="container">
		<div id="footer-link">
			<ul>
				<li>常用链接：</li>
				<li><a href="http://www.cqupt.edu.cn/" target="_blank">重庆邮电大学</a></li>
				<li><a href="http://hongyan.cqupt.edu.cn/" target="_blank">红岩网校</a></li>
				<li><a href="http://36kr.com/" target="_blank">36氪</a></li>
				<li><a href="http://www.geekpark.net/" target="_blank">极客公园</a></li>
				<li><a href="http://fequan.com/" target="_blank">前端圈</a></li>
			</ul>
		</div>
		<p>© 2016 proYang&PeiLi</p>
	</div>
</body>
</html>