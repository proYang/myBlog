<?php
    // 验证登录
    session_start();
    if(!isset($_SESSION['temp'])){
            echo "<script>location.href='../pages/login.html'</script>";
    }


    require_once 'conn.php';
    $id= $_POST['id'];
    date_default_timezone_set('Asia/Chongqing');
    $selectname = $_POST['selectname'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $content_txt = $_POST['content_txt'];
    $time=date('Y-m-d');

        //上传文件类型列表 
    $uptypes=array(  
        'image/jpg', 
        'image/jpeg',  
        'image/png',  
        'image/pjpeg',  
        'image/gif',  
        'image/bmp',  
        'image/x-png' 
    ); 
    $max_file_size=2000000;     //上传文件大小限制, 单位BYTE  
    $destination_folder="../uploadimg/"; //上传文件路径 

    // 图片操作
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!is_uploaded_file($_FILES["upfile"]["tmp_name"]))  
        //是否存在文件  
        {  
            $sql="update article set title ='$title',content ='$content',time='$time',category ='$selectname' where id ='$id'";  
        }else{
                $file = $_FILES["upfile"]; 

                if($max_file_size < $file["size"])  
                //检查文件大小 
                {  
                    echo "<script>alert('文件太大!');history.go(-1);</script>";
                    exit;  
                }  

                if(!in_array($file["type"], $uptypes))  
                //检查文件类型 
                {  
                    // echo "文件类型不符!".$file["type"];
                    echo "<script>alert('".$file["type"]."文件类型不符!');history.go(-1);</script>"; 
                    exit;  
                }  
              
                if(!file_exists($destination_folder))  
                { 
                // 如果目录不存在，则创建
                    mkdir($destination_folder);  
                }  
              
                $filename=$file["tmp_name"];  
                $image_size = getimagesize($filename);// 获取图像尺寸，类型等信息。 
                $pinfo=pathinfo($file["name"]);  //返回文件路径
                $ftype=$pinfo['extension']; 
                $destination = $destination_folder.time().".".$ftype;  
                if (file_exists($destination))  
                {  
                    echo "<script>alert('同名文件已经存在了!');history.go(-1);</script>"; 
                    exit;  
                }  
              
                if(!move_uploaded_file ($filename, $destination)) 
                {  
                    echo "<script>alert('移动文件出错!');history.go(-1);</script>"; 
                    exit;  
                }
                $sql="update article set title ='$title',content ='$content',content_txt ='$content_txt',time='$time',category ='$selectname',cover='$destination' where id ='$id'";
        }
        
    }
    // echo $destination;


    
    // echo $sql;
     $re=mysqli_query($link,$sql);//执行sql语句
    // echo $re;
    if($re){
        echo "<script>alert('修改成功');</script>";
        echo "<script>location.href='controlManage.php'</script>";
    }else{
        echo "<script>alert('修改失败');</script>";
        echo "<script>history.go(-1);</script>";
    }
    mysqli_close($link);//关闭数据库