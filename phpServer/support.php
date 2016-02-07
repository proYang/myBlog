<?php
	require_once "conn.php";
	$id=(int)$_GET['id'];
	$sql = "select * from article where id=$id";
	$re=mysqli_query($link,$sql);
	foreach ($re as $row) {
		$num=$row['support']+1;
		$sql="update article set support ='$num' where id ='$id'";
		$res=mysqli_query($link,$sql);
	}
	if($re){
        echo "<script>alert('点赞成功');window.location=document.referrer;</script>";
    }else{
        echo "<script>alert('点赞失败');history.go(-1);</script>";
    }
    mysqli_close($link);//关闭数据库
?>