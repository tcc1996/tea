<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>分类管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="css/xfont.css">
    <link rel="stylesheet" href="css/xadmin.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/xadmin.js"></script>
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="index.php?r=home/init">首页</a>
        <a href="">产品管理</a>
        <a>
          <cite>分类管理</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">

      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加分类','index.php?r=product/addclass',600,400)"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<?php echo $num ?> 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>分类名</th>
            <th>添加人</th>
            <th>产品数量</th>
            <th>添加时间</th>
            <th>状态</th>
            <th>操作</th></tr>
        </thead>
        <tbody>
        <?php foreach ($classification as $k => $v) {
         ?>
          <tr id="id<?php echo $v['id'] ?>">
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td><?php echo $v['id'] ?></td>
            <td><?php echo $v['classname'] ?></td>
            <td><?php echo $v['adminname'] ?></td>
            <td><?php echo $v['classnum'] ?></td>
            <td><?php echo $v['datetime'] ?></td>
            <td class="td-status">
            <?php if ($v['isok']==0) { 
              echo "<span class='layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled'>已停用</span>";      
            }else{
              echo "<span class='layui-btn layui-btn-normal layui-btn-mini'>已启用</span>";          
            } ?>
              </td>
            <td class="td-manage">
              <a onclick="member_stop(this,<?php echo $v['id']; ?>)" href="javascript:;"  title="<?php if ($v['isok']==0) {
                echo '启用';
              }else{
                echo '停用';
                } ?>">
                <i class="layui-icon"><?php if ($v['isok'] == 0) {
                  echo "&#xe62f;";
                }else{
                  echo "&#xe601;";
                  } ?></i>
              </a>
              <a title="编辑"  onclick="x_admin_show('编辑','index.php?r=product/updata/id/<?php echo $v["id"]; ?>',600,400)" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" onclick="del_class(<?php echo $v['id'] ?>)" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
<?php } ?>
        </tbody>
      </table>
      <div class="page">
        <div>
          <a class="prev" href="index.php?r=product/adminclass/page/1">&lt;&lt;</a>
          <?php for ($i=1; $i<=$pageall ; $i++) { 
            if ($i == $page) {
           ?>
           <span class="current"><?php echo $page ?></span>
           <?php }else{ ?>
           <a class="num" href="index.php?r=product/adminclass/page/<?php echo $i ?>"><?php echo $i ?></a>
           <?php }} ?>
          <a class="next" href="index.php?r=product/adminclass/page/<?php echo $pageall; ?>">&gt;&gt;</a>
        </div> 
      </div>

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要修改状态吗？',function(index){

            $.get("index.php?r=product/upclass/id/"+id,null,function(data){
                if (data > 0) {
                    if($(obj).attr('title')=='停用'){
                    $(obj).attr('title','启用')
                    $(obj).find('i').html('&#xe62f;');

                    $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                    layer.msg('已停用!',{icon: 5,time:1000});

                  }else{
                    $(obj).attr('title','停用')
                    $(obj).find('i').html('&#xe601;');

                    $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                    layer.msg('已启用!',{icon: 6,time:1000});
                  }
                }else{
                  layer.alert('抱歉！网络断开了，或者数据库发生了问题。', {skin: 'layui-layer-molv',closeBtn: 0});
                }
            })

              
          });
      }

      function del_class(id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.get("index.php?r=product/delclass/id/"+id,null,function(msg){
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
          $.post("index.php?r=product/delclassall",{"id":database},function(data) {
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