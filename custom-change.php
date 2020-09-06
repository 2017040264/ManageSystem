<?php 
$custom_id=$_GET['custom_id'];
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

    $sql="select * from custom where custom_id=$custom_id";
    $result=mysqli_query($link,$sql);
    $result=mysqli_fetch_assoc($result);
    
    $custom_name=$result['custom_name'];
    $custom_type=$result['custom_type'];
    $custom_link=$result['custom_link'];
    $custom_tel=$result['custom_tel'];
    $custom_location=$result['custom_location'];
    $custom_remarks=$result['custom_remarks'];
?>
<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>修改客户信息</title>
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

                <form class="layui-form" action="changecustom.php" method="post">


                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">客户编号</label>
                        <div class="layui-input-inline">
                            <input type="text" readonly="readonly" id="username" name="id" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $custom_id;?>" ></div>
                    </div>

                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                            <span class="x-red">*</span>客户名称</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="custom_name" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $custom_name;?>"></div>
                    </div>

                    <div class="layui-form-item">
                        <label for="phone" class="layui-form-label">
                          客户类别</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="custom_type"  autocomplete="off" class="layui-input" value="<?php echo $custom_type;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span> 联系人</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="custom_link" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $custom_link;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           <span class="x-red">*</span> 联系电话</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="custom_tel" required="" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo $custom_tel;?>"></div>
                    </div>
                    <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                           通讯地址</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="custom_location"  autocomplete="off" class="layui-input" value="<?php echo $custom_location;?>"></div>
                    </div>
                     <div class="layui-form-item">
                        <label for="username" class="layui-form-label">
                          备注</label>
                        <div class="layui-input-inline">
                            <input  type="text" id="username" name="custom_remarks"  autocomplete="off" class="layui-input" value="<?php echo $custom_remarks;?>"></div>
                    </div>
        <div class="layui-form-item">
            <label for="L_repass" class="layui-form-label"></label>
            <button class="layui-btn" type="submit">提交</button></div>

        </form>

        </div>
        </div>

        
    </body>

</html>