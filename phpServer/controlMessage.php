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
	<script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
	<div id="top-fix">
		<div class="container">
			<ul>
				<li class="title-content" id="left-icon"><a href="##"><div>博客</div></a></li>
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
				<li class="control-content"><a target="_blank" href="http://proyang.duoshuo.com/admin/"><i class="iconfont">&#xe60f;</i>留言管理</a></li>
			</ul>
		</div>
		<div id="area-messgae" class="control-area">
			<?php
                require_once 'conn.php';
                $sql="select * from user";
                $re=mysqli_query($link,$sql);//执行sql语句
                $arr=mysqli_fetch_assoc($re);
            ?>
			<form id="imessage_form" onsubmit="return myconfirm();" enctype="multipart/form-data" method="post" action="messageUpdate.php">				
                <div id="imessage_div">
                	<a href="javascript:;" id="imessage_logo" class="a-upload">
                    	<input type="file" name="upfile"><i class="iconfont">&#xe612;</i>
                	</a>
                	<span>更改头像</span>
                </div>
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
                	<span class="imessage_span">个性签名</span><textarea name="motto"><?php echo $arr['motto']?></textarea>
                </div>
                <div>
                	<span class="imessage_span">个人经历</span>
                	<div id="imessage_back">
                		<script id="editor" type="text/plain" style="width:auto;height:500px;"></script>
                		 <input id="old_experience" type="hidden" value='<?php echo $arr['experience']?>'/>
						<input id="temp_experience" type="hidden" name="experience">
                		 <script type="text/javascript">
		                    //实例化编辑器
		                    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
		                    var ue = UE.getEditor('editor',{
		                    	toolbars: [
   									['fullscreen', 'source', 'undo', 'redo'],['emotion', 'pasteplain','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript','backcolor','formatmatch', 'autotypeset', 'blockquote', 'removeformat', 'forecolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
								]
		                    });
		                    ue.ready(function() {
		                        // 初始化编辑器内容
		                        var old_experience = document.getElementById('old_experience');
		                        ue.setContent(old_experience.value);
		                    });
		                    function getContent() {
		                        var temp_experience = document.getElementById('temp_experience');
		                        temp_experience.value = UE.getEditor('editor').getContent();
		                    }
		                </script>
                	</div>
                </div>
                <input id="write-submit" onclick="getContent()" type="submit" value="确认修改"/>
            </form>
            <?php
				mysqli_close($link);
			?>
		</div>
	</div>
</body>
</html>