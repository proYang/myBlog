<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>myBlog|文章</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">	
</head>
<body>
	<div id="top-fix">
		<div class="container">
			<ul>
				<li class="title-content" id="left-icon"><a href=""><div>博客</div></a></li>
				<li class="title-content"><a href="../index.php">主页</a></li>
				<li class="title-content title-item"><a href="articles.php">文章</a></li>
				<li class="title-content"><a href="photos.php">相册</a></li>
				<li class="title-content"><a href="time.php">足迹</a></li>
				<li class="title-content"><a href="personal.php">个人简介</a></li>
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
		<div id="article-content" class="container">
			<div id="content">
				<article>
				<!-- 文章内容 -->
					<?php 
		                $id=(int)$_GET['id'];
		                require_once "../phpServer/conn.php";
		                $sql="select * from article where id = '$id'";
		                $re=mysqli_query($link,$sql);//执行sql语句
		                $arr=mysqli_fetch_assoc($re);
            		?>
            		<h1><a href="##"><?php echo $arr['title']?></a></h1>
            			<?php
	                      	$sql="select * from terms where term_id =".$arr['category'];  
	                        $res=mysqli_query($link,$sql);
	                        $arrs=mysqli_fetch_assoc($res);
	                        echo "<span>分类:".$arrs['name']."</span>";
                    	?>
                    <span><?php echo $arr['time'];?></span>
            		<p>&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $arr['content'];?></p>
				</article>
				<div class="article-foot">
		            <a href="../phpServer/support.php?id=<?php echo $id?>"><i class="iconfont">&#xe603;</i><span><?php echo $arr['support'];?></span></a>
		            <i class="iconfont">&#xe606;</i><span><?php echo $arr['comments'];?></span>
		            <i class="iconfont">&#xe608;</i><span>1</span>
		            <div>
		            	<div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_douban" data-cmd="douban" title="分享到豆瓣网"></a><a href="#" class="bds_tieba" data-cmd="tieba" title="分享到百度贴吧"></a><a href="#" class="bds_copy" data-cmd="copy" title="分享到复制网址"></a></div>
		            </div>		            
                </div>
				<div id="comentsbox">
					<form action="">
						<input type="text" placeholder="姓名(必填)">
						<input type="text" placeholder="邮箱(必填)">
						<textarea name="" placeholder="说点什么吧"></textarea>
						<input type="submit" value="发布">
					</form>
				</div>
			</div>
			<div id="cate_link">
			<!-- 文章分类清单 -->
				<ul>
				<p>文章分类</p>
				<?php
					$sql = "select * from terms ORDER BY term_id ASC";
					$re = mysqli_query($link,$sql);
					
					foreach ($re as $row) {
						$sql = "select * from article where category=".$row['term_id'];
						$res = mysqli_query($link,$sql);
						$category_num = mysqli_num_rows($res);
						echo "<li><a href='articles-category.php?category=".$row['term_id']."'>{$row['name']}(".$category_num.")</a></li>";			
					}
				?>
				</ul>
			</div>
			<?php
				mysqli_close($link);
			?>
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
	<div id="goTop">
		<a class="jump-top"></a>
	</div>
	<script type="text/javascript" src="../js/goTop.js"></script>
	<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
</body>
</html>