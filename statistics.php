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