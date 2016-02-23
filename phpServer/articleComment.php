<?php
    // 登录验证
    session_start();
    if(!isset($_SESSION['temp'])){
            echo "<script>location.href='../pages/login.html'</script>";
    }
  // 获取文章评论
    $id=(int)$_GET['id'];
    require_once 'conn.php';
    $sql="select title,content,time,comments from article where id = $id";
    $re=mysqli_query($link,$sql);
    $arr=mysqli_fetch_assoc($re);
    if($arr['comments']<=0){
        echo "<script>alert('此文章暂无评论');history.go(-1);</script>";
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

                <h3><?php echo $arr['title']; ?></h3>
                <p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo mb_substr($arr['content'],0,180,'utf-8')."......";?></p>
                <div id="comentsbox">
<!-- 获取文章评论 -->
                    <ul id="comentsbox_ul">
                        <div>评论:</div>
                        <?php
                            $sql="select * from comment where aid=".$id;
                            $rec=mysqli_query($link,$sql);
                            foreach ($rec as $row) {
                        ?>
                        <li>
                            <div class="comment_img"><i class="iconfont">&#xe612;</i></div>
                            <div class="comment_right">
                                <div class="comment_name"><?php echo $row['name'];?>
                                    <span>[<?php echo $row['mail'];?>]</span>
                                </div>
                                <div class="comment_time"><?php echo $row['time'];?></div>
                                <p class="comment_content"><?php echo $row['content'];?></p>
                            </div>
                            <div class="comment_delete"><a href="commentDelete.php?cid=<?php echo $row['cid']?>&aid=<?php echo $row['aid']?>">删除</a></div>
                        </li>
                        <?php   
                            }
                        ?>
                    </ul>
                </div>
                <?php
                    mysqli_close($link);
                ?>
            </div>
        </div>
</body>
</html>