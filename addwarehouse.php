<?php
   
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
	
	//拼接sql
	$sql="insert into warehouse(warehouse_name,warehouse_explain)
	 values('$name','$explain')";
	
	if(mysqli_query($link,$sql))
	{
		echo "<script>parent.location.href='warehouse-list.php';</script>";die;
		//echo "<script>alert('添加成功');parent.location.href='warehouse-list.php';</script>";die;
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}
    
    
?>