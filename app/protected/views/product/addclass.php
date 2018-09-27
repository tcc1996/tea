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
  </head>
  
  <body>
    <div class="x-body">
        <div class="layui-form">
          <div class="layui-form-item">
              <label class="layui-form-label">
                  <span class="x-red">*</span>分类名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="classname" name="classname"  class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请妥善命名分类
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>状态</label>
              <div class="layui-input-block">           
                <input type="checkbox" id="checkbox0" lay-skin="primary" title="立即上线" checked="">
                <input type="checkbox" id="checkbox1" lay-skin="primary" title="暂时闲置">
              </div>
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label">
              </label>
              <button  class="layui-btn" onclick="addClass()" >
                  增加
              </button>
          </div>
      </div>
    </div>
    <script>
      function addClass(){
        var classname = $("input[name='classname']").val();
        if($('#checkbox0').is(':checked')&&$('#checkbox1').is(':checked')) {
          layer.alert('不能同时选中两项', {skin: 'layui-layer-molv',closeBtn: 0});
          return false;
      }else if ($('#checkbox0').is(':checked')||$('#checkbox1').is(':checked')) {
              if ($('#checkbox0').is(':checked')) {
                var isok = 1;
              }else{
                var isok = 0;
              }
              $.post("index.php?r=product/classexe",{'classname':classname,'isok':isok},function(data){
                  if (data==1) {
                    var index = parent.layer.getFrameIndex(window.name);
                    layer.alert('添加成功,点击刷新看效果', {skin: 'layui-layer-molv',closeBtn: 0},function(){
                    parent.layer.close(index);
                    })
                  }else{
                    layer.alert('分类名重复或发生了未知错误', {skin: 'layui-layer-molv',closeBtn: 0});
                    return false;
                  }                
              });
              return false;
      }else{
        layer.alert('不能同时不选中任意项', {skin: 'layui-layer-molv',closeBtn: 0});
        return false;
      }
    }
    </script>
  </body>

</html>