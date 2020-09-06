<?php
    $id=$_GET['id'];
	
	
	// 创建连接数据库
	$link=mysqli_connect('localhost','root','123456','manage');
	//设置字符
	mysqli_query($link,"set names utf8");
	//连接失败  进行提示错误
	if(!$link)
	{
		die('连接失败：'.mysqli_connect_error());
	}
	else
	{
		echo "连接成功";
		echo "id=$id";
	}
	
	mysqli_query($link,"DELETE FROM product WHERE product_id='$id'");

		echo "<script>location.href='product-list.php';</script>";die;
		//echo "<script>alert('删除成功');location.href='product-list.php';</script>";die;
?>