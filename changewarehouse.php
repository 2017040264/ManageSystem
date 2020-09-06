<?php
    $id=$_POST['id'];
	$name=$_POST['name'];
	$explain=$_POST['explain'];
	
	
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
		//echo "连接成功";
	}
	
	mysqli_query($link,"UPDATE warehouse SET warehouse_name='$name',warehouse_explain='$explain'WHERE warehouse_id='$id'");


		echo "<script>parent.location.href='warehouse-list.php';</script>";die;
		//echo "<script>alert('修改成功');parent.location.href='warehouse-list.php';</script>";die;
?>