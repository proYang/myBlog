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
                <li class="control-content" id="menu-manage"><a href="controlManage.php"><i class="iconfont">&#xe60a;</i>文章管理</a></li>
                <li class="control-content"><a href="controlCategory.php"><i class="iconfont">&#xe60b;</i>文章分类</a></li>
                <li class="control-content"><a href="controlComment.php"><i class="iconfont">&#xe60f;</i>评论审核</a></li>
            </ul>
        </div>
        <div id="area-write" class="control-area">
            <div id="write-content">
            <?php 
                $id=(int)$_GET['id'];
                require_once 'conn.php';
                $sql="select id,title,content,category from article where id = '$id'";
                $re=mysqli_query($link,$sql);//执行sql语句
                $arr=mysqli_fetch_assoc($re);
                mysqli_close($link);
            ?>
            <form name="article" onsubmit="return myconfirm();" method="post" enctype="multipart/form-data" action="articleUpdate.php">
            <select name="selectname" id="write-category">
                    <!-- 面向对象zxw -->
                    <?php       
                        require_once 'conn_db.php';
                        $query = "select * from terms";                         
                        $result = $db->query($query);                           
                        $row_num = $result->num_rows;                           
                        for($i = 0; $i < $row_num; $i++){
                            $row = $result->fetch_assoc();
                            if ($arr['category']==$row['term_id']) {
                                echo "<option value= '".$row['term_id']."' selected='selected'>".$row['name']."</option>";
                            } else {
                                echo "<option value= '".$row['term_id']."'>".$row['name']."</option>";
                            }
                        }
                        $result->free();
                        $db->close();
                    ?>
            </select>
                <input type="hidden" name="id" value="<?php echo $arr['id']?>"/>
                <input type="text" name="title" id="write-title" value="<?php echo $arr['title']?>"/>
                <a href="javascript:;" class="a-upload">
                    <input type="file" name="upfile">更改文章封面
                </a>
                <textarea name="content"><?php echo $arr['content']?></textarea>
                <input id="write-submit" type="submit" value="确认修改"/>
            </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/confirm.js"></script>
</body>
</html>