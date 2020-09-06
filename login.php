<?php
	//接收数据
	$userid=$_POST['userid'];
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
	else
	{
		echo "连接成功";
	}
	//查询账号是否存在
	$sql="select * from users where userid='$userid'";
	$arr=mysqli_query($link,$sql);
	$arr=mysqli_fetch_assoc($arr);
	//判断该账号是否存在
	if(!$arr)
	{
		echo "<script>alert('账号不存在,点击重新登录！');window.location.href='index.html';</script>";die;
	}
	//取出密码
	$password1=$arr['password'];
	$username=$arr['username'];
	//判断密码是否正确
	if($password!=$password1){
		// echo "<a href='http://localhost/keshe/index.html'>密码错误,点击重新登录</a>";die;
		echo "<script>alert('密码错误，请重新登录！');window.location.href='index.html';</script>";die;
	}
	else
	{
			echo "<script>window.location.href='index1.php?username=$username';</script>";die;
	}
