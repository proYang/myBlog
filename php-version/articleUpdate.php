<?php
    header("content-type:text/html;charset=utf8");
    $arr=$_POST;
    $id=(int)$arr['id'];
    require_once 'conn.php';
    $sql="update article set title = '$arr[title]',content = '$arr[content]' where id = '$id'";
    //echo $sql;
    $re=mysqli_query($link,$sql);//执行sql语句
    //echo $re;
    if($re){
        echo "修改成功";
        echo "<a href='articleList.php'>返回文章列表</a>";
    }else{
        echo "修改失败";
        echo "<a href='articleList.php'>返回文章列表</a>";
    }
    mysqli_close($link);//关闭数据库