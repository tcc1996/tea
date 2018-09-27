<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>修改个人信息</title>
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
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>昵称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="username" required="" lay-verify="required"
                  autocomplete="off" class="layui-input" value="<?php echo $userinfo['adminname']; ?>">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>账号
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="adminnum" name="adminnum" required=""
                  autocomplete="off" class="layui-input" value="<?php echo $userinfo['adminnum']; ?>" onblur="tishi()">
              </div>
              <script>
               function tishi(){
                var adminnum = $("input[name='adminnum']").val();
                var id = $("#adminid").val();
                $.get("index.php?r=myadmin/tishi/id/"+id+"/adminnum/"+adminnum,null,function(msg){
                    if (msg==1) {
                      $("#tishi").html("新账号可以使用");
                    }else if (msg==0) {
                      $("#tishi").html("!账号已被占用");
                      return zhanghu = msg;
                    }else{

                    }
                  })
                }
              </script>
              <div class="layui-form-mid layui-word-aux">
                  <p id="tishi"><span class="x-red">*</span>这是登陆账号，请妥善保管</p>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red">*</span>原始密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_email" name="oldpassword" required="" lay-verify="oldpassword"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>
              </div>
          </div>
          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>权限</label>
              <div class="layui-input-block">           
                <input type="checkbox" name="like1[write]" lay-skin="primary" title="<?php echo $userinfo['eoc'] ?>" checked="">
                <input type="text" value="<?php echo $userinfo['id']; ?>" style="display: none;" id="adminid">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_pass" class="layui-form-label">
                  <span class="x-red">*</span>密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  6到16个字符
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
                  <span class="x-red">*</span>确认密码
              </label>
              <div class="layui-input-inline">
                  <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                  autocomplete="off" class="layui-input">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="" onclick="chickForm()">
                  确定修改
              </button>
          </div>
      </div>
    </div>
    <script>
        function chickForm(){
          /*获取form*/
          $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer; 
          //自定义验证规则
          form.verify({
            nikename: function(value){
              if(value.length < 5){
                return '昵称至少得5个字符啊';
              }
            }
            ,pass: [/(.+){6,12}$/, '密码必须6到12位']
            ,repass: function(value){
                if($('#L_pass').val()!=$('#L_repass').val()){
                    return '两次密码不一致';
                }
            }
          });
          //监听提交
          form.on('submit(add)', function(){
            var id = $("#adminid").val();
            var adminname = $("#username").val();
            var adminnum = $("#adminnum").val();
            var password = $("#L_repass").val();
            var oldpassword = $("input[name='oldpassword']").val();
            $.post("index.php?r=myadmin/exe/id/"+id,{'adminname':adminname,'adminnum':adminnum,'password':password,'oldpassword':oldpassword},function(msg){
              if (msg==1) {
                layer.alert('修改成功', {skin: 'layui-layer-molv',closeBtn: 0},function(){
                  var index = parent.layer.getFrameIndex(window.name);
                  parent.layer.close(index);
                });
              }else if(msg == 2){
                layer.alert('旧密码输错啦', {skin: 'layui-layer-molv',closeBtn: 0});
                return false;
              }else if (msg == 0){
                layer.alert('由于未知原因出错啦，请稍后再试！', {skin: 'layui-layer-molv',closeBtn: 0});
                return false;
              }else{
                layer.alert('请勿提交重复账户！', {skin: 'layui-layer-molv',closeBtn: 0});
                return false;
              }
            });
            return false;
          });           
        };
    </script>

  </body>
</html>