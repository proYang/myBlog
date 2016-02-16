<?php
    require_once'conn.php';
    date_default_timezone_set('Asia/Chongqing');
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $id = $_POST['id'];
    $content = $_POST['content'];
    $time=date('Y-m-d');
    if (is_validemail($mail)==1) {
        $sql = "insert into comment(aid,name,mail,content,time) values ('$id','$name','$mail','$content','$time')";
        // echo $sql;
        $re = mysqli_query($link,$sql);//执行sql语句
        //echo $re;
        if($re){
            // 更新评论数目
            $sql = "select * from article where id=$id";
            $com=mysqli_query($link,$sql);
            foreach ($com as $row) {
                $comnum=$row['comments']+1;
                $sql="update article set comments ='$comnum' where id =$id";
                mysqli_query($link,$sql);
            }
            echo "<script>alert('感谢您的评论！');</script>";
            echo "<script>location.href='../pages/article-pages.php?id=".$id."';</script>";
        }else{
            echo "<script>alert('评论失败');history.go(-1);</script>";
        }
    }else{
        echo "<script>alert('邮箱地址无效');history.go(-1);</script>";
    }
    mysqli_close($link);//关闭数据库

// 邮箱验证
    function is_validemail($email){
            $check = 0;
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $check = 1;
        }
            return $check;
    } 