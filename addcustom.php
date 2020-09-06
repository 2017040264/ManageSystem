<?php
	$name=$_POST['name'];
	$custom_type=$_POST['custom_type'];
	$custom_link=$_POST['custom_link'];
	$custom_tel=$_POST['custom_tel'];
	$custom_location=$_POST['custom_location'];
	$custom_remarks=$_POST['custom_remarks'];
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
	$sql="insert into custom(custom_name,custom_type,custom_link,custom_tel,custom_location,custom_remarks)
	 values('$name','$custom_type','$custom_link','$custom_tel','$custom_location','$custom_remarks')";
	
	if(mysqli_query($link,$sql))
	{
		echo "<script>parent.location.href='custom-list.php';</script>";die;
		//echo "<script>alert('添加成功');parent.location.href='custom-list.php';</script>";die;
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}
    //关闭连接
    
?>