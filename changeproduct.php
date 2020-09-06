<?php
    $id=$_POST['id'];
	$name=$_POST['name'];
	$standards=$_POST['standards'];
	$price=$_POST['price'];
	$max=$_POST['max'];
	$min=$_POST['min'];
	
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
	
	mysqli_query($link,"UPDATE product SET product_name='$name',product_standards='$standards',product_price='$price',product_maxnum='$max',product_minnum='$min'
WHERE product_id='$id'");

		echo "<script>parent.location.href='product-list.php';</script>";die;
		//echo "<script>alert('修改成功');parent.location.href='product-list.php';</script>";die;
?>