<?php
    require_once'conn.php';
    // header("content-type:text/html;charset=utf-8");
    date_default_timezone_set('Asia/Chongqing');
    $selectname = $_POST['selectname'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $time=date('Ymdhia');
    
    $sql = "insert into article(category,title,content,time) values ('$selectname','$title','$content','$time')";
    //echo $sql;
    $re = mysqli_query($link,$sql);//执行sql语句
    //echo $re;
    if($re){
        echo "<script>alert('发布成功');</script>";
        echo "<script>location.href='../php-version/controlWrite.php'</script>";
        // echo '<a href="articleList.php">返回文章列表</a>';
    }else{
        echo "<script>alert('发布失败');</script>";
        // echo '<a href="articleList.php">返回文章列表</a>';
    }
    mysqli_close($link);//关闭数据库   