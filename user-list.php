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

    $sql="select * from users";
    $result=mysqli_query($link,$sql);

?>

<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>用户管理</title>
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
                            <button class="layui-btn" onclick="xadmin.open('添加用户','user-add.html',800,600)">
                                <i class="layui-icon"></i>添加</button></div>

                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                                <thead>
                                    <tr>
                                        <th>用户账号</th>
                                        <th>用户名称</th>
                                        <th>用户密码</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($result as $res){ ?>
                                    <tr>
                                        <td><?php  echo $res['userid']; ?></td>
                                        <td><?php echo $res['username']; ?></td>
                                        <td><?php echo $res['password']; ?></td>
                                       
                                       
                                        <td class="td-manage">
                                            
                                            <button class="layui-btn"  onclick="xadmin.open('修改用户信息','user-change.php?userid=<?php  echo $res['userid']; ?>',800,600)">修改</button>

                                            <button class="layui-btn"  onclick="member_del('<?php echo $res['userid'];?>')">删除</button>

                        
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

    <script type="text/javascript">
        function member_del(id) {
            if (false === confirm('请确认是否要删除该用户？') )return; 

    location.href = 'user-delete.php?id=' + id; 
        }
    </script>

</html>