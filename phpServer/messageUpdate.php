<?php
    // 验证登 录
    session_start();
    if(!isset($_SESSION['temp'])){
            echo "<script>location.href='../pages/login.html'</script>";
    }
?>
<?php
    require_once 'conn.php';
    $name= $_POST['name'];
    $address= $_POST['address'];
    $profession= $_POST['profession'];
    $hobby= $_POST['hobby'];
    $motto= $_POST['motto'];
    $experience= $_POST['experience'];
    $sql="update user set name ='$name',address ='$address',profession='$profession',hobby ='$hobby',motto='$motto',experience='$experience'";
    // echo $sql;
     $re=mysqli_query($link,$sql);//执行sql语句
    // echo $re;
    if($re){
        echo "<script>alert('修改成功');</script>";
        echo "<script>location.href='controlMessage.php'</script>";
    }else{
        echo "<script>alert('修改失败');</script>";
        echo "<script>history.go(-1);</script>";
    }
    mysqli_close($link);//关闭数据库