<?php
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
	
	//拼接sql
	$sql="insert into product(product_name,product_standards,product_price,product_maxnum,product_minnum)
	 values('$name','$standards','$price','$max','$min')";
	
	if(mysqli_query($link,$sql))
	{
		echo "<script>parent.location.href='product-list.php';</script>";die;
		//echo "<script>alert('添加成功');parent.location.href='product-list.php';</script>";die;
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}
    //关闭连接
    
?>