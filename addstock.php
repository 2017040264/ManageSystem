<?php
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
	
	//拼接sql
	$sql="insert into stock(product_id,warehouse_id,product_inprice,product_num,product_data)
	 values('$product_id','$warehouse_id','$product_inprice','$product_num','$product_data')";
	
	if(mysqli_query($link,$sql))
	{
		echo "<script>parent.location.href='stock-list.php';</script>";die;
		//echo "<script>alert('添加成功');parent.location.href='stock-list.php';</script>";die;
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}
    //关闭连接
    
?>