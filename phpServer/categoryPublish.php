<?php
        // 登录验证
    session_start();
    if(!isset($_SESSION['temp'])){
            echo "<script>location.href='../pages/login.html'</script>";
    }
?>
<?php
    require_once'conn.php';
    $name = $_GET['name'];
    $sql = "insert into terms (name) values ('$name')";
   	$re = mysqli_query($link,$sql);
   	if($re){
        echo "<script>alert('添加成功');</script>";
        echo "<script>location.href='controlCategory.php'</script>";
    }else{
        echo "<script>alert('添加失败');history.go(-1);</script>";
    }
    mysqli_close($link);  