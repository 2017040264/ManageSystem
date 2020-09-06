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