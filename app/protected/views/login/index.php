<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cc奶茶-收银系统</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="css/xfont.css">
	<link rel="stylesheet" href="css/xadmin.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">cc奶茶-收银系统</div>
        <div id="darkbannerwrap"></div>
        
        <form method="post" class="layui-form" onclick="return login()">
            <input name="username" placeholder="账号"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>

    <script>
    function login(){
              var form = layui.form;
              //监听提交
              form.on('submit(login)', function(data){
                var username = $("input[name='username']").val();
                var password = $("input[name='password']").val();
                $.post("index.php?r=login/login",{'username':username,'password':password},function(msg){
                    if (msg == 1 ) { 
                        layer.alert('未找到此账户，请检查', {skin: 'layui-layer-molv',closeBtn: 0});
                        return false;
                    }else if (msg == 2) {
                        layer.alert('密码不匹配，请核实后再输入', {skin: 'layui-layer-molv',closeBtn: 0});
                        return false;
                    }else{
                        location.href='index.php?r=index/index'
                    }
                },"JSON"); 
                return false;               
              });               
    } 
    </script>

    
    <!-- 底部结束 -->
</body>
</html>