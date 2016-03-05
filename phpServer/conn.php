<?php
    $link = mysqli_connect('localhost', 'root', '','myblog');//链接数据库
    $result = mysqli_select_db($link,"myblog");
    mysqli_query($link,'SET NAMES UTF8');
