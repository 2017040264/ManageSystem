<?php
    $id=$_POST['id'];
	$type=$_POST['type'];
    $productid=$_POST['productid'];
    $birthdate=$_POST['birthdate'];
    $price=$_POST['price'];
    $num=$_POST['num'];
    $customid=$_POST['customid'];
    $warehouseid=$_POST['warehouseid'];
    $manager=$_POST['manager'];
    $data=$_POST['data'];
    $mark=$_POST['mark'];
	
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
	
	mysqli_query($link,"UPDATE inorout SET type='$type',productid='$productid',birthdate='$birthdate',price='$price',num='$num',customid='$customid',warehouseid='$warehouseid',manager='$manager',data='$data',mark='$mark'
WHERE id='$id'");

		echo "<script>parent.location.href='inorout-list.php';</script>";die;
		//echo "<script>alert('修改成功');parent.location.href='inorout-list.php';</script>";die;
?>