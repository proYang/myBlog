<?php
    require_once 'conn.php';
    $id= $_POST['id'];
    date_default_timezone_set('Asia/Chongqing');
    $selectname = $_POST['selectname'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $time=date('Y-m-d');
    $sql="update article set title ='$title',content ='$content',time='$time',category ='$selectname' where id ='$id'";
    // echo $sql;
     $re=mysqli_query($link,$sql);//执行sql语句
    // echo $re;
    if($re){
        echo "<script>alert('修改成功');</script>";
        echo "<script>location.href='controlManage.php'</script>";
    }else{
        echo "<script>alert('修改失败');</script>";
        echo "<script>location.href='controlManage.php'</script>";
    }
    mysqli_close($link);//关闭数据库