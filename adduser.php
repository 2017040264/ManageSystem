<?php
    $userid=$_POST['userid'];
	$name=$_POST['name'];
	$password=$_POST['password'];
	
	
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
	$sql="insert into users(userid,username,password)
	 values('$userid','$name','$password')";
	
	if(mysqli_query($link,$sql))
	{
		echo "<script>parent.location.href='user-list.php';</script>";die;
		//echo "<script>alert('添加成功');parent.location.href='user-list.php';</script>";die;
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}
    
    
?>