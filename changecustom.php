<?php
    $id=$_POST['id'];
	$custom_name=$_POST['custom_name'];
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
	else
	{
		//echo "连接成功";
	}
	
	mysqli_query($link,"UPDATE custom SET custom_name='$custom_name',custom_type='$custom_type',custom_link='$custom_link',custom_tel='$custom_tel',custom_location='$custom_location',custom_remarks=$custom_remarks
WHERE custom_id='$id'");

		echo "<script>parent.location.href='custom-list.php';</script>";die;
		//echo "<script>alert('修改成功');parent.location.href='custom-list.php';</script>";die;
?>