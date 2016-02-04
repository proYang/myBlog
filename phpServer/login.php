    <?php  
        if(isset($_POST["submit"]) && $_POST["submit"] == "登录")  
        {  
            $user = $_POST["username"];  
            $psw = $_POST["password"];  
            if($user == "" || $psw == "")  
            {  
                echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";  
            }  
            else  
            {  
                $link = mysqli_connect('localhost', 'root', '','myblog');//链接数据库
                mysqli_select_db($link,"myblog");
                mysqli_query($link,'set names utf8');
                $sql = "select username,password from user where username = '$_POST[username]' and password = '$_POST[password]'";
                $result = mysqli_query($link,$sql);
                $num = mysqli_num_rows($result);



                if($num)  
                {  
                    $row = mysqli_fetch_array($result);  //将数据以索引方式储存在数组中 
                    echo "<script>location.href='../phpServer/controlWrite.php'</script>";
                }  
                else  
                {  
                    echo "<script>alert('用户名或密码不正确！');history.go(-1);</script>";  
                }  
            }  
        }  
        else  
        {  
            echo "<script>alert('提交未成功！'); history.go(-1);</script>";  
        }  
      
    ?>  