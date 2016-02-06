<?php
    require_once 'conn.php';
    $id=(int)$_GET['id'];
    $sql="delete from terms where term_id = '$id'";
    $re=mysqli_query($link,$sql);
    $sql="update article set category ='0' where category ='$id'";
    $re=mysqli_query($link,$sql);
    if($re){
        echo "<script>alert('删除成功,该分类下文章初始为未分类');</script>";
        echo "<script>location.href='controlCategory.php'</script>";
    }else{
        echo "<script>alert('删除失败');</script>";
        echo "<script>location.href='controlCategory.php'</script>";
    }