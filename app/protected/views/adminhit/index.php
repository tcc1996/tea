<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="css/xfont.css">
    <link rel="stylesheet" href="css/xadmin.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/xadmin.js"></script>
    <script type="text/javascript" src="js/lib/laypage/1.2/laypage.js"></script>
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="index.php?r=home/init">首页</a>
        <a href="">系统统计</a>
        <a>
          <cite>登陆历史</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <span class="x-right" style="line-height:40px">共有数据: <?php echo $hitnum; ?> 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>记录编号</th>
            <th>登录账户</th>
            <th>ip地址</th>
            <th>登陆时间</th>
            <th>状态码</th>
            <th>操作</th>
        </thead>
        <tbody>
        <?php
          foreach ($hits as $k => $v) {
         ?>
          <tr id="id<?php echo $v['id'] ?>">
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='<?php echo $v['id']; ?>'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $v['id']; ?></td>
            <td><?php echo $v['adminnum']; ?></td>
            <td><?php echo $v['ipadress']; ?></td>
            <td><?php echo $v['datetime']; ?></td>
            <td><?php if ($v['sorf']==1) {
              echo "成功";
            }else{
              echo "失败";
              } ?></td>
            <td class="td-manage">
              <a title="删除" onclick="member_del(<?php echo $v['id'] ?>)" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
      <?php   } ?>
        </tbody>
      </table>
      <div class="page">
        <div>
          <a class="prev" href="index.php?r=adminhit/index/start/1">&lt;&lt;</a>
          <?php for ($i=1; $i<=$allpage ; $i++) { 
            if ($i==$start) {
           ?>
          <span class="current"><?php echo $i; ?></span>
          <?php }else{ ?>
          <a class="num" href="index.php?r=adminhit/index/start/<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php }} ?>
          <a class="next" href="index.php?r=adminhit/index/start/<?php echo $allpage; ?>">&gt;&gt;</a>
        </div>
      </div>

    </div>
    <script>
      /*用户-删除*/
      function member_del(id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.get("index.php?r=adminhit/del/id/"+id,null,function(msg){
                  if (msg >0) {
                    $("#id"+id).remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                  }else{
                    layer.msg('删除失败！',{icon:1,time:1000});
                  }
              });
          });
      }

      function delAll (argument) {
        var database = tableCheck.getData();
        layer.confirm('确认要删除吗？'+database,function(index){
          $.post("index.php?r=adminhit/delall",{"id":database},function(data) {
            if (data == 0) {
              layer.msg('删除失败！',{icon:1,time:1000});
            }else{
              /*循环删除tr同步数据库*/                                
              for (key in database){
                  $("#id"+database[key]).remove();
                  }              
              layer.msg('已删除'+(database.length)+"条",{icon:1,time:1000});
            }
          });
        
        });
      }
    </script>
  </body>

</html>