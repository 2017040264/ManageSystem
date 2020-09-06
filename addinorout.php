<?php
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

	$sql2="insert into stock_statistics(id,type,num,data)
	       values('$productid','$type','$num','$data')";
	       mysqli_query($link,$sql2);
	
	//拼接sql
	$sql="insert into inorout(type,productid,birthdate,price,num,customid,warehouseid,manager,data,mark)
	 values('$type','$productid','$birthdate','$price','$num','$customid','$warehouseid','$manager','$data','$mark')";
	
	if(mysqli_query($link,$sql))
	{
		//这个地方可能仅使用与查询结果只有一条的情况。模拟效果还是实现了的。
		if ($type=="生产入库"||$type=="采购入库"||$type=="退货入库"||$type=="退料入库") {
			$sql1="select * from stock where product_id=$productid and warehouse_id=$warehouseid";
            $result=mysqli_query($link,$sql1);
            $result=mysqli_fetch_assoc($result);
            $t=$result['product_num']+$num;
            mysqli_query($link,"UPDATE stock SET product_num='$t' WHERE product_id='$productid' and warehouse_id=$warehouseid");
            
			# code...
		}
		else
		{
			$sql1="select * from stock where product_id=$productid and warehouse_id=$warehouseid";
            $result=mysqli_query($link,$sql1);
            $result=mysqli_fetch_assoc($result);
            $t=$result['product_num']-$num;
            mysqli_query($link,"UPDATE stock SET product_num='$t' WHERE product_id='$productid' and warehouse_id=$warehouseid");

           
		}
		echo "<script>parent.location.href='inorout-list.php';</script>";die;
		//echo "<script>alert('添加成功');parent.location.href='inorout-list.php';</script>";die;
	}
	else {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);}
    //关闭连接
    
?>