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
				<li class="control-content" id="menu-write"><a href="controlWrite.php"><i class="iconfont">&#xe60c;</i>写文章</a></li>
				<li class="control-content"><a href="controlMessage.php"><i class="iconfont">&#xe60e;</i>个人信息</a></li>
				<li class="control-content"><a href="controlManage.php"><i class="iconfont">&#xe60a;</i>文章管理</a></li>
				<li class="control-content"><a href="controlCategory.php"><i class="iconfont">&#xe60b;</i>文章分类</a></li>
				<li class="control-content"><a target="_blank" href="http://proyang.duoshuo.com/admin/"><i class="iconfont">&#xe60f;</i>留言管理</a></li>
			</ul>
		</div>
		<div id="area-write" class="control-area">
			<div id="write-content">

				<form onsubmit="return myconfirm();" enctype="multipart/form-data" name="article" method="post" action="../phpServer/articlePublish.php">
				<select name="selectname" id="write-category">
					<!-- 面向对象zxw -->
					<?php
						require_once 'conn_db.php';
						$query = "select * from terms";							
						$result = $db->query($query);							
						$row_num = $result->num_rows;							
						for($i = 0; $i < $row_num; $i++){
							$row = $result->fetch_assoc();
							echo "<option value= '".$row['term_id']."'>".$row['name']."</option>";
						}
						$result->free();
						$db->close();
					?>
				</select>
				<input type="text" name="title" id="write-title" placeholder="请输入文章标题"/>
				<a href="javascript:;" class="a-upload">
    				<input type="file" name="upfile">上传文章封面
				</a>
				<script id="editor" class="editor" type="text/plain" style="width:auto;height:500px;"></script>
				<!-- <textarea  name="content" placeholder="请输入文章内容"></textarea> -->
			    <input id="write-submit" onclick="getContent()" type="submit" value="发布"/>
			    <input id="temp_content" type="hidden" name="content">
			    <input id="temp_content_txt" type="hidden" name="content_txt">
			    <script type="text/javascript">
				    //实例化编辑器
				    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
				    var ue = UE.getEditor('editor');
				    function getContent() {
				    	var temp_content = document.getElementById('temp_content');
				    	var temp_content_txt = document.getElementById('temp_content_txt');
				    	temp_content.value = UE.getEditor('editor').getContent();
				    	temp_content_txt.value = UE.getEditor('editor').getContentTxt();
    				}
    			</script>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../scripts/util/confirm.js"></script>
</body>
</html>