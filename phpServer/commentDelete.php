<?php
	// 验证登录
    session_start();
    if(!isset($_SESSION['temp'])){
            echo "<script>location.href='../pages/login.html'</script>";
    }
    require_once 'conn.php';
    $cid=(int)$_GET['cid'];
    $aid=(int)$_GET['aid'];
    $sql="delete from comment where cid = '$cid'";
    // echo $sql,$aid;
    $re=mysqli_query($link,$sql);
    if($re){
    	$sql=$sql = "select * from article where id=$aid";
		$res=mysqli_query($link,$sql);
		foreach ($res as $row) {
			$num=$row['comments']-1;
			$sql="update article set comments ='$num' where id ='$aid'";
			$res=mysqli_query($link,$sql);
		}
		if ($res) {
			echo "<script>alert('删除成功');</script>";
        	echo "<script>location.href='articleComment.php?id=".$aid."'</script>";
		}else{        
			echo "<script>alert('删除失败');</script>";
        	echo "<script>location.href='articleComment.php?id=".$aid."'</script>";
		}
        
    }else{
        echo "<script>alert('删除失败');</script>";
        echo "<script>location.href='articleComment.php?id=".$aid."'</script>";
    }
    mysqli_close($link);
?>