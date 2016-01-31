<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title></title>
</head>
<body>
<!--
    搜索框
-->
    <form method="get" action="articleList.php" style="margin:10px 400px;">
        <input type="text" name="search"/>
        <input type="submit" value="搜索"/>
    </form>
    <br/>
    <table cellspacing="0" cellpadding="0" align="center" bgcolor="#ccc" width="500">
    <a href="articlePublish.html" style="padding:20px 30px">返回发布文章</a>
        <tr>
            <th>编号</th>
            <th>文章标题</th>
            <th>文章内容</th>
            <th>编辑文章</th>
        </tr>
        <?php
            require_once 'conn.php';
            /**
             * 搜索
             */
            @$keyword = $_GET['search'];
 
            /*分页*/
            $sql = "select count(*) from article where title like '%$keyword%' or content like '%$keyword%'";
            $res = mysqli_query($link,$sql);
            //$count= (int)mysql_num_rows($result);
            $arr = mysqli_fetch_assoc($res);
            while(list($keyword,$val)=each($arr)){
                $count = (int)$val; 
            }
            //echo $count;
            $pageSize=4;
            $page=floor($count/$pageSize)+1;//总页数$page
            echo $page;
            //echo $page;
            if(isset($_GET['page']))
            {
                //$currentPage = $_GET['page'];
                if($_GET['page'] <=1){
                    $currentPage = 1;
                }elseif ($_GET['page'] >= $page){
                    $currentPage = $page-1;
                }else{
                    $currentPage = $_GET['page'];
                }
                     
            }else
            {
                $currentPage=1;
            }
            $start = ($currentPage-1)*$pageSize;
            $sql="select id,title,content from article where title like '%$keyword%' or content like '%$keyword%' limit $start,$pageSize";
            //echo $sql;
            $re=mysqli_query($link,$sql);//执行sql语句
            while($arr=mysqli_fetch_assoc($re)){
        ?>   
                <tr>
                    <td align="center" style="border:1px solid #000"><?php echo $arr['id'];?></td>
                    <input type="hidden" name="id" value="<?php echo $arr['id'];?>"/>
                    <td align="center" style="border:1px solid #000"><?php echo $arr['title'];?></td>
                    <td align="center" style="border:1px solid #000"><?php echo $arr['content'];?></td>
                    <td align="center" style="border:1px solid #000">
                        <a href="articleEdit.php?id=<?php echo $arr['id']?>"><font color="red">修改</font></a>
                        <a href="articleDelete.php?id=<?php echo $arr['id']?>"><font color="red">删除</font></a>
                    </td>
                </tr>
        <?php 
                }
            mysqli_close($link);//关闭数据库
        ?>
    </table>
    <div style="margin:20px 400px;">
        共<?php echo $page?>页 |查到<?php echo $count;?>条记录
        当前第<?php echo @$_GET['page']?>页|
        <a href="articleList.php?page=1&search=<?php echo $keyword?>">首页</a>
        <a href="articleList.php?page=<?php echo ($currentPage-1)?>&search=<?php echo $keyword?>">|上一页</a>
        <a href="articleList.php?page=<?php echo ($currentPage+1)?>&search=<?php echo $keyword?>">|下一页</a>
        <a href="articleList.php?page=<?php echo $page?>&search=<?php echo $keyword?>">|末页</a>
    </div>
</body>
</html>