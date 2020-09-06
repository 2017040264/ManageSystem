

### 1.题目要求： 建立一个企业库存管理系统, 使用B/S架构完成系统开发

#####  1.1 建立基本表

- 客户基本信息表：客户编号、客户姓名、客户类型、联系人、联系电话、通信地址、备注；

- 仓库基本信息表：仓库编号、仓库名称、仓库说明；

- 产品基本信息表：产品编号、产品名称、产品规格、参考价格、数量上限、数量下限等；

- 产品基本信息表：产品编号、产品名称、产品规格、参考价格、数量上限、数量下限等；

- 库存基本信息表：存储编号、产品编号、仓库编号、产品入库单价、产品数量、生产日期等；

- 出入库信息表：出入库操作类型、出入库产品编号、生产日期、出入库产品单价、出入库产品数量、客户编号、仓库编号、经办人、出入库日期、出入库标记；

##### 1.2 系统应包括以下主要功能：

（1）入库管理：主要管理采购入库、生产入库、退货入库、退料入库；

（2）出库管理：主要管理销售出库、退货出库、用料出库；

（3）产品基本信息管理：产品基本信息添加、修改、查询、删除；

（4）统计查询：主要管理产品出入库统计报表和库存流水统计报表；

### 2.需求分析 

##### 2.1 系统使用者

根据描述，这个系统的使用者可以设为只有一种，就是企业的库存管理人员。管理人员应该具有的功能：

- 出入库管理与出入库统计。 管理人员，即用户(以下均称为用户)，可以实现出入库的增删改查，但是考虑到一个企业是否允许用户修改（删除）出入库记录的问题，如果不允许，可以在源代码中注释掉相应入口即可。为了使系统功能更加全面，默认是带有修改（删除）功能的。出入库统计可以按天统计，统计每天的出入库数据。
- 库存管理及库存流水统计。 用户可以实现库存的增删改查。与出入库相同，这里也有同样的问题。如果不允许用户修改或删除某条记录，将入口注释掉即可。库存流水统计可以单独建一个表（stock_statistics）,每当有出入库记录生产时，将产品的数量变化同步生产到该表中。流水统计查看该表即可。
- 产品基本信息的管理。用户可以实现增删改查功能。
- 仓库管理。用户可以实现增删改查功能。
- 客户信息管理。用户可以实现增删改查功能。

##### 2.2 其他需求

- 用户的登录与退出。需要建立一个用户表，由系统开发人员事先分配好用户。用户登录时，将输入信息与用户表中的信息进行匹配，实现登录的限制。还需要设计退出接口，当用户点击时，即可退出系统。
- 用户登录状态的检测。如果用户通过连接进入到非登录页面，需要自定跳转到登录界面。

### 3. 数据库设计

#####  3.1 概念结构设计

采用 E—R 方法进行数据库的概念设计，分数据抽象，设计局部概念模式，设计全 局概念模式三个过程。局部 E-R 模型如下： 

##                               ![image-20200603235845124](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200603235845124.png)

 

 ![image-20200603235902170](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200603235902170.png)

 ![image-20200603235910781](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200603235910781.png)

![image-20200603235924648](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200603235924648.png)

**一个仓库可能存储好几种商品；一种商品也可能存放在多个仓库** ：

![image-20200603235937622](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200603235937622.png)

##### 3.2 逻辑结构设计 

**根据数据库概念结构设计，将数据库概念结构转化为mysql 所支持的 关系模式如下：**

###### 用户表 ![image-20200604000246570](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000246570.png)

###### 客户信息表 ![image-20200604000318833](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000318833.png)

###### 仓库表 ![image-20200604000350659](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000350659.png)

###### 产品信息表 ![image-20200604000420235](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000420235.png)

###### 库存表 ![image-20200604000442536](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000442536.png)

###### 出入库信息表 ![image-20200604000516853](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000516853.png)

###### 库存流水表 ![image-20200604000542816](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604000542816.png)

# 第二阶段：开发编码调试工作 

### 1.开发环境相关： 

- 开发后台服务语言：PHP 7.4.6

- 服务器： Apache 2.4.43

- 数据库：MySql 8.0.19

- 操作系统：Windows10 

- 开发工具：Submile Text3 

### 2.开发所用技术： 

Web 前端：HTML，CSS，JavaScript，Jquery，PHP，layui。 

 后台：Mysql

### 3.运行说明：

- 将所有文件放到Apaceh安装目录下的htodcs目录下

- 确保Apache服务器已经启动，如果没有启动，使用powershell(管理员)(A)运行。

- index.html（我设置的内容是登录界面）要直接放在htodcs目录下。

- 在浏览器地址栏输入localhost即可进入登录页面。（输入localhost/index.html也可）

### 4.系统总体设计

![image-20200604002552017](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604002552017.png)

##  5.目录结构

## ![img](file:///C:\Users\cfl\AppData\Roaming\Tencent\Users\1581318468\QQ\WinTemp\RichOle\N9660R%U59@0`TE()[L_L`V.png)

![image-20200604003406408](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604003406408.png)

说明：

- index.html+login.php实现登录功能。

- index1.php是系统主界面框架

- welcome.html是欢迎页面，进入到系统后显示的内容

- statistics.php是出入库统计信息

- statistics1.php是库存流水信息

- 以出入库为例，inorout-lits.php是出入库管理界面，inorout-change.php+changeinorout.php实现出入库信息修改；inorout-add.html+addinorout.php实现出入库记录的添加功能；inorout-delete.php实现出入库数据的删除功能。其他管理模块于此类似，可以参考此模块的构造。

### 6.源码及界面展示：

##### 6.1 登录

![image-20200604004101553](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604004101553.png)

```html

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<!--localhost/login.html-->
	<title>企业库存管理系统</title>
</head>
<style type="text/css">
	html,body {
				margin: 0;
				padding: 0;
				height: 100%;
			}
			body 
			{
				background: #000000;
				background: url(001.jpg) ;
			}
	table {
    	width:20%;
	}
	td{
    	height:32px;
    	padding:5px;
	}
	input{
		width: 200px;
		height: 30px;
		border-radius: 5px;
	}
	div{
		margin-top: 10%;
	}
	button{
		background-color: #e7e7e7;
		border: none;
		border-radius: 5px;
		color: black;
		width: 150px;
		padding: 15px 32px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
	}
	button:hover {
		box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
	}
</style>
<body>
	
<form action="login.php" method="post">
	<div style="">
		<center>
			<h3 style="color:red" align="center">企业库存管理系统</h3>
			<table>
				<tr>
					<th>账号:</th>
					<td><input type="text" name="userid" placeholder="请输入账号"></td>
				</tr>
				<tr>
					<th>密码：</th>
					<td><input type="text" name="password" placeholder="请输入密码"></td>
				</tr>
			</table>
			<button type="submit">登录</button>
		</center>
	</div>
</form>

</body>
</html>
```

```php
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

```

##### 6.2 主界面

![image-20200604004506204](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604004506204.png)

```php+HTML
<?php
if(!isset($_GET['username']))
{
    echo "<a href='index.html'>你还未登录,点击登录</a>";die;
}
$name=$_GET['username']
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>企业库存管理系统</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <!-- <link rel="stylesheet" href="./css/theme5.css"> -->
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
             //是否开启刷新记忆tab功能
            var is_remember = false;
        </script>
    </head>

    <body class="index">
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="./index1.php">首页</a></div>

            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>

            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">

                    <a href="javascript:;">欢迎您：<?php echo $name ?></a>
                    <dl class="layui-nav-child">
                        <dd><a href="index.html">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <!-- 顶部结束 -->

        <!-- 中部开始 -->

        <!-- 左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    
                    <li>
                          <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="出入库">&#xe723;</i>
                            <cite>出入库</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('出入库管理','inorout-list.php')">
                            <i class="iconfont"  >&#xe6a7;</i>
                            <cite>出入库管理</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('出入库统计','statistics.php')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>出入库统计</cite></a>
                            </li>
                        </ul>
                    </li>

                     

                      <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="库存">&#xe723;</i>
                            <cite>库存</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                       
                        <ul class="sub-menu">
                            <li>
                             <a onclick="xadmin.add_tab('库存管理','stock-list.php')">
                            <i class="iconfont"  lay-tips="库存管理">&#xe723;</i>
                            <cite>库存管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a></li>
                             <li>
                            <a onclick="xadmin.add_tab('库存流水','statistics1.php')">
                            <i class="iconfont"  lay-tips="库存流水">&#xe723;</i>
                            <cite>库存流水</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a></li>
                        </ul>
                    </li>
                    
                    <li>
                        <a onclick="xadmin.add_tab('产品基本信息','product-list.php')">
                            <i class="iconfont"  lay-tips="产品基本信息管理">&#xe723;</i>
                            <cite>产品基本信息管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu"></ul>
                    </li>
                   
                    <li>
                        <a onclick="xadmin.add_tab('仓库管理','warehouse-list.php')">
                            <i class="iconfont"  lay-tips="仓库管理">&#xe723;</i>
                            <cite>仓库管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu"></ul>
                    </li>
                     <li>
                        <a onclick="xadmin.add_tab('客户管理','custom-list.php')">
                            <i class="iconfont"  lay-tips="客户信息管理">&#xe6b8;</i>
                            <cite>客户信息管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu"></ul>
                    </li>
                     <li>
                        <a onclick="xadmin.add_tab('用户管理','user-list.php')">
                            <i class="iconfont"  lay-tips="用户管理">&#xe6b8;</i>
                            <cite>用户管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu"></ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->


        <!-- 右侧主体开始 -->
        <div class="page-content">
            <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
                <ul class="layui-tab-title">
                    <li class="home">
                        <i class="layui-icon">&#xe68e;</i>我的桌面</li></ul>
                <div class="layui-unselect layui-form-select layui-form-selected" id="tab_right">
                    <dl>
                        <dd data-type="this">关闭当前</dd>
                        <dd data-type="other">关闭其它</dd>
                        <dd data-type="all">关闭全部</dd></dl>
                </div>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                       <iframe src='welcome.html' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
                    </div>
                </div>
                <div id="tab_show"></div>
            </div>
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->
        <!-- 中部结束 -->

    </body>

</html>

```

##### 6.3 功能举例（以出入库为例，其他的于此类似）

###### 6.3.1查看界面

![image-20200604004751942](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604004751942.png)

```html
<?php
   
    // 创建连接数据库
    $link=mysqli_connect('localhost','root','123456','manage');
    //设置字符
    mysqli_query($link,"set names utf8");
    //连接失败  进行提示错误
    if(!$link){
        die('连接失败：'.mysqli_connect_error());
    }
   // echo "连接数据库成功";

    $sql="select * from inorout";
    $result=mysqli_query($link,$sql);
?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>出入库信息管理</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
    </head>
    
    <body>
        <div class="x-nav">
           
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        
                        <div class="layui-card-header">
                            <button class="layui-btn" onclick="xadmin.open('添加出入库信息','inorout-add.html',800,600)">
                                <i class="layui-icon"></i>添加</button></div>

                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                        <th>操作编号</th>
                                        <th>操作类型</th>
                                        <th>产品编号</th>
                                        <th>生产日期</th>
                                        <th>单价</th>
                                        <th>数量</th>
                                        <th>客户编号</th>
                                        <th>仓库编号</th>
                                        <th>经办人</th>
                                        <th>日期</th>
                                   <!--     <th>标注</th>-->
                                        
                                      <!---->  <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $res){ ?>
                                    <tr>
                                       <td><?php  echo $res['id']; ?></td>
                                        <td><?php  echo $res['type']; ?></td>
                                        <td><?php echo $res['productid']; ?></td>
                                        <td><?php echo $res['birthdate']; ?></td>
                                        <td><?php echo $res['price']; ?></td>
                                        <td><?php echo $res['num']; ?></td>
                                        <td><?php echo $res['customid']; ?></td>
                                        <td><?php echo $res['warehouseid']; ?></td>
                                        <td><?php echo $res['manager']; ?></td>
                                        <td><?php echo $res['data']; ?></td>
                                     <!--   <td><?php echo $res['mark']; ?></td>-->
                                       
                                         <td class="td-manage">
                                            
                                         <button class="layui-btn"  onclick="xadmin.open('修改出入库信息','inorout-change.php?id=<?php  echo $res['id']; ?>',800,600)">修改</button>
                                            <button class="layui-btn"  onclick="member_del('<?php echo $res['id'];?>')">删除</button>
                                        </td>
                                    </tr>
                                   <?php } ?>
                                  
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </body>

   <!----> <script type="text/javascript">
        function member_del(id) {
            if (false === confirm('是否真的要删除当前出入库记录?') )return; 

    location.href = 'inorout-delete.php?id=' + id; 
        }
    </script>

</html>
```

###### 6.3.2 添加记录界面

![image-20200604004928068](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604004928068.png)

```html
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>添加出入库信息</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">

                <form class="layui-form" action="addinorout.php" method="post">
                <h5 align="center" style="color: red">请确保输入的产品编号、客户编号、仓库编号已经存在！</h5>
                <br>
                    <div class="layui-form-item">
                        <label for="type" class="layui-form-label">
                            <span class="x-red">*</span>操作类型</label>
                      <div class="layui-input-inline">
                            <input placeholder="请选择操作类别" list="typee" type="text" id="username" name="type" required="" lay-verify="required" autocomplete="off" class="layui-input">
                            <datalist id="typee">
 <option>采购入库</option>
                                        <option>生产入库</option>
                                        <option>退货入库</option>
                                        <option>退料入库</option>
                                        <option>销售出库</option>
                                        <option>退货出库</option>
                                        <option>用料出库</option>
</datalist>

                        </div>
                            
                            <!--          <select id="type" name="type">
                                        <option>采购入库</option>
                                        <option>生产入库</option>
                                        <option>退货入库</option>
                                        <option>退料入库</option>
                                        <option>销售出库</option>
                                        <option>退货出库</option>
                                        <option>用料出库</option>
                                    </select>-->
                                
                    </div>

                    <div class="layui-form-item">
                        <label for="phone" class="layui-form-label">
                           <span class="x-red">*</span>产品编号</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入产品编号" type="text" id="username" name="productid" required="" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span>产品生产日期</label>
                        <div class="layui-input-inline">
                            <input  type="date" id="username" name="birthdate" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span> 单价</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入单价" type="text" id="username" name="price" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>   数量</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入数量" type="text" id="username" name="num" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span> 客户编号</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入客户编号" type="text" id="username" name="customid" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span> 仓库编号</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入仓库编号" type="text" id="username" name="warehouseid" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span> 经办人</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入经办人姓名" type="text" id="username" name="manager" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                     <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>日期</label>
                        <div class="layui-input-inline">
                            <input  type="date" id="username" name="data" required="" lay-verify="required" autocomplete="off" class="layui-input"></div>
                    </div>
                     <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           标注</label>
                        <div class="layui-input-inline">
                            <input placeholder="请输入标注" type="text" id="username" name="mark"  autocomplete="off" class="layui-input"></div>
                    </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" type="submit">提交</button></div>

        </form>

        </div>
        </div>

        
    </body>

</html>
```

```php
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
```

###### 6.3.3 修改记录页面

![image-20200604005128014](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604005128014.png)

```php+HTML
<?php 
$id=$_GET['id'];
//echo $product_id;

// 创建连接数据库
    $link=mysqli_connect('localhost','root','123456','manage');
    //设置字符
    mysqli_query($link,"set names utf8");
    //连接失败  进行提示错误
    if(!$link){
        die('连接失败：'.mysqli_connect_error());
    }
    //echo "连接数据库成功";

    $sql="select * from inorout where id=$id";
    $result=mysqli_query($link,$sql);
    $result=mysqli_fetch_assoc($result);
    
    $type=$result['type'];
    $productid=$result['productid'];
    $birthdate=$result['birthdate'];
    $price=$result['price'];
    $num=$result['num'];
    $customid=$result['customid'];
    $warehouseid=$result['warehouseid'];
    $manager=$result['manager'];
    $data=$result['data'];
    $mark=$result['mark'];
    
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>修改出入库信息</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]--></head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">

                <form class="layui-form" action="changeinorout.php" method="post">


                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">操作编号</label>
                        <div class="layui-input-inline">
                            <input type="text" readonly="readonly" id="username" name="id" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $id;?>" ></div>
                    </div>

                     <div class="layui-form-item">
                        <label for="type" class="layui-form-label">
                            <span class="x-red">*</span>操作类型</label>
                      <div class="layui-input-inline">
                            <input  list="typee" type="text" id="username" name="type" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $type;?>">
                            <datalist id="typee">
                                        <option>采购入库</option>
                                        <option>生产入库</option>
                                        <option>退货入库</option>
                                        <option>退料入库</option>
                                        <option>销售出库</option>
                                        <option>退货出库</option>
                                        <option>用料出库</option>
                            </datalist>
                        </div>
                    </div>

                    
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span>产品编号</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="productid" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $productid;?>"></div>
                    </div>
                     <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span>产品生产日期</label>
                        <div class="layui-input-inline">
                            <input  type="date" id="username" name="birthdate" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $birthdate;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span> 单价</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="price" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $price;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>   数量</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="num" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $num;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span> 客户编号</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="customid" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $customid;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span> 仓库编号</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="warehouseid" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $warehouseid;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span> 经办人</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="manager" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $manager;?>"></div>
                    </div>
                     <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>日期</label>
                        <div class="layui-input-inline">
                            <input  type="date" id="username" name="data" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $data;?>"></div>
                    </div>
                     <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           标注</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="mark"  autocomplete="off" class="layui-input" value="<?php echo $mark;?>"></div>
                    </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" type="submit">提交</button></div>

        </form>

        </div>
        </div>

        
    </body>

</html>
```

```php
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
```

6.3.4 修改界面提示界面及操作代码（函数在inorout-list.php中）

![image-20200604005514432](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604005514432.png)

```php
<?php
    $id=$_GET['id'];
	
	
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
		echo "id=$id";
	}
	
	mysqli_query($link,"DELETE FROM inorout WHERE id='$id'");

		echo "<script>location.href='inorout-list.php';</script>";die;
		//echo "<script>alert('删除成功');location.href='inorout-list.php';</script>";die;
?>
```

###### 6.3.5 出入库统计报表

![image-20200604005808539](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604005808539.png)

```php+HTML
<?php
   
    // 创建连接数据库
    $link=mysqli_connect('localhost','root','123456','manage');
    //设置字符
    mysqli_query($link,"set names utf8");
    //连接失败  进行提示错误
    if(!$link){
        die('连接失败：'.mysqli_connect_error());
    }
   // echo "连接数据库成功";

   
    $choosedate=date('yy-m-d');
   // echo $choosedate;
?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>出入库信息管理</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
    </head>
    
    <body>
        <div class="x-nav">
          
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">

                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5" >
                                <div class="layui-input-inline layui-show-xs-block">
                                    <input class="layui-input" type="date" name="start" id="start" value="<?php echo $choosedate;?>"></div>
                              <?php  
                              
                              $sql="select * from inorout where data='$choosedate'";
                                    $result=mysqli_query($link,$sql);?>
                                <div class="layui-input-inline layui-show-xs-block">
                                    <button class="layui-btn" type="submit"  onclick="location.reload()">
                                        <i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>

                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                        <th>操作编号</th>
                                        <th>操作类型</th>
                                        <th>产品编号</th>
                                        <th>生产日期</th>
                                        <th>单价</th>
                                        <th>数量</th>
                                        <th>客户编号</th>
                                        <th>仓库编号</th>
                                        <th>经办人</th>
                                        <th>日期</th>
                                       <th>标注</th>
                                        
                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $res){ ?>
                                    <tr>
                                        <td><?php  echo $res['id']; ?></td>
                                        <td><?php  echo $res['type']; ?></td>
                                        <td><?php echo $res['productid']; ?></td>
                                        <td><?php echo $res['birthdate']; ?></td>
                                        <td><?php echo $res['price']; ?></td>
                                        <td><?php echo $res['num']; ?></td>
                                        <td><?php echo $res['customid']; ?></td>
                                        <td><?php echo $res['warehouseid']; ?></td>
                                        <td><?php echo $res['manager']; ?></td>
                                        <td><?php echo $res['data']; ?></td>
                                      <td><?php echo $res['mark']; ?></td>
                                       
                            
                                    </tr>
                                   <?php } ?>
                                  
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </body>

   <!----> <script type="text/javascript">



        function member_del(id) {
            if (false === confirm('是否真的要删除当前出入库记录?') )return; 

    location.href = 'inorout-delete.php?id=' + id; 
        }
    </script>

</html>
```

6.4 库存流水界面

![image-20200604010030169](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604010030169.png)

```php+HTML
<?php
   
    // 创建连接数据库
    $link=mysqli_connect('localhost','root','123456','manage');
    //设置字符
    mysqli_query($link,"set names utf8");
    //连接失败  进行提示错误
    if(!$link){
        die('连接失败：'.mysqli_connect_error());
    }
   // echo "连接数据库成功";

    $sql="select * from stock_statistics";
    $result=mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>库存流水</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="./css/font.css">
        <link rel="stylesheet" href="./css/xadmin.css">
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="./js/xadmin.js"></script>
    </head>
    
    <body>
        <div class="x-nav">
           
            <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
                <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i>
            </a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        
                        
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                        <th>产品编号</th>
                                        <th>变化类别</th>
                                        <th>数量变化</th>
                                        <th>日期</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $res){ ?>
                                    <tr>
                                        <td><?php  echo $res['id']; ?></td>
                                        <td><?php  echo $res['type']; ?></td>
                                        <td><?php echo $res['num']; ?></td>
                                        <td><?php echo $res['data']; ?></td>
                                    </tr>
                                   <?php } ?>
                                  
                                </tbody>
                            </table>
                        </div>
                        
                </div>
            </div>
        </div>
    </body>

    

</html>
```

![image-20200604010357488](C:\Users\cfl\AppData\Roaming\Typora\typora-user-images\image-20200604010357488.png)

# 第三部分：总结

通过这次课设，学习了php语言,实现了与数据库的连接、数据传递。第一次做出一个小的系统，虽然不是很完善，但是这个过程是比较锻炼人的。感觉通过这次课设，知识面扩展了很多，很有意义。

感谢老师这个特殊的时期还不断敦促我们去学习，谢谢老师们！

