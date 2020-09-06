<?php
    $stock_id=$_POST['stock_id'];
	$product_id=$_POST['product_id'];
	$warehouse_id=$_POST['warehouse_id'];
	$product_inprice=$_POST['product_inprice'];
	$product_num=$_POST['product_num'];
	$product_data=$_POST['product_data'];
	
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
	
	mysqli_query($link,"UPDATE stock SET product_id='$product_id',warehouse_id='$warehouse_id',product_inprice='$product_inprice',product_num='$product_num',product_data='$product_data'
WHERE stock_id='$stock_id'");

		echo "<script>parent.location.href='stock-list.php';</script>";die;
		//echo "<script>alert('修改成功');parent.location.href='stock-list.php';</script>";die;
?>