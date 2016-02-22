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
		                $tem_id=$id;
		                @$type=$_GET['type'];//0和1分别代表上一页和下一页
		                require_once "../phpServer/conn.php";
		                // $sql="select count(*) as counts from article where id<=$id";
		                // $tempArr= mysqli_fetch_assoc(mysqli_query($link,$sql));
		                // print_r($tempArr);
		                // $tem_id=$tempArr['counts'];
		                // echo($tem_id);
		                $sql="select max(id) as counts from article";
		                $numArr= mysqli_fetch_assoc(mysqli_query($link,$sql));
		                $num=$numArr['counts'];
		                // 当文章id不连续时，继续循环，直到找到
		                // echo($num."/"); 
		                // echo($type."/");
		                // echo($tem_id."/");
		                do{
		                	$tem_id=$type?++$tem_id:--$tem_id;
		                	if ($tem_id<1||$tem_id>$num||$type==null) {
		                		$tem_id=$id;
		                	}
		                	$sql="select * from article where id = '$tem_id'";
		                	$re=mysqli_query($link,$sql);
		                }while(mysqli_num_rows($re)==0);
		                $arr=mysqli_fetch_assoc($re);
		                // echo($tem_id);
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
				<div class="article-foot" id="article-pages">
		            <div class="article_comment"><a href="../phpServer/support.php?id=<?php echo $tem_id?>"><i class="iconfont">&#xe603;</i><span><?php echo $arr['support'];?></span></a></div>
		            <div class="article_comment"><i class="iconfont">&#xe606;</i><span><?php echo $arr['comments'];?></span></div>
		            <div id="share_button" class="article_comment"><i class="iconfont">&#xe608;</i><span>
						<a class="jiathis_counter_style"></a></span></div>
					<!-- JiaThis Button BEGIN -->
					<div  id="share_button_box" class="jiathis_style_24x24">
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
				<div id="comentsbox">
<!-- 获取文章评论 -->
					<ul>
						<?php
							$sql="select * from comment where aid=".$tem_id;
							$rec=mysqli_query($link,$sql);
							foreach ($rec as $row) {
						?>
							<li>
								<div class="comment_img"><i class="iconfont">&#xe612;</i></div>
								<div class="comment_right">
									<div class="comment_name"><?php echo $row['name'];?></div>
									<div class="comment_time"><?php echo $row['time'];?></div>
									<p class="comment_content"><?php echo $row['content'];?></p>
								</div>
							</li>
						<?php	
							}
						?>
					</ul>
<!-- 提交文章评论 -->
					<form action="../phpServer/commentCreat.php" method="post">
						<input type="text" name="name" placeholder="姓名(必填)">
						<input type="text" name="mail" placeholder="邮箱(必填)">						
						<textarea name="content" placeholder="说点什么吧"></textarea>
						<input type="hidden" name="id" value='<?php echo $tem_id;?>'>
						<input type="submit" value="发布">
					</form>
				</div>
			</div>
			<div id="pre-arcitle">
				<span><?php if ($tem_id==1) {echo $tem_id;}else{echo $tem_id-1;}?>/<?php echo $num;?></span>
				<a href="article-pages.php?id=<?php echo $tem_id?>&type=0"></a>
			</div>
			<div id="next-arcitle">
				<span><?php if ($tem_id==$num) {echo $tem_id;}else{echo $tem_id+1;}?>/<?php echo $num;?></span>
            	<a href="article-pages.php?id=<?php echo $tem_id?>&type=1"></a>
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
	<script type="text/javascript" src="../js/showButton.js"></script>
	<script>
		window.onload=function(){
		backTop();
		}
	</script>         
</body>
</html>