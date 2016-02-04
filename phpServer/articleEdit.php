<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
 <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
</head>
<body bgcolor="#ccc">
<?php 
            $id=(int)$_GET['id'];
            require_once 'conn.php';
            $sql="select id,title,content from article where id = '$id'";
            //echo $sql;
            $re=mysqli_query($link,$sql);//执行sql语句
            $arr=mysqli_fetch_assoc($re);
            //var_dump($arr);
            ;
            mysqli_close($link);//关闭数据库
             
?>
    <form name="article" method="post" action="articleUpdate.php" style="margin:5px 500px;">
            <h1>文章发布系统</h1>
            <input type="hidden" name="id" value="<?php echo $arr['id']?>"/><br/>
        标题:<input type="text" name="title" value="<?php echo $arr['title']?>"/><br/>
        内容:<textarea cols=30 rows=5 name="content"><?php echo $arr['content']?></textarea><br/><br/>
            <input type="submit" value="修改文章"/>
            <a href="articleList.php">返回文章列表</a>
            <a href="articlePublish.html">返回发布文章</a>
    </form>
</body>
</html>