<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>
南苑校园失物招领系统后台
</title>
<style>
body{
	background-color:gray;
}
#user{
	text-align:center;
	background-color:#B0BEF9;
	opacity:0.9;
	width:50%;
	height:300px;
	margin-left:25%;
	border:3px solid green;
	border-radius:10px;
}
</style>
</head>
<body>
<h1 style="text-align:center;">南苑校园失物招领系统后台登录</h1>
	  <div id="user">
		  <div>
		     <h3>账号：<input type="text" placeholder="用户名" id="username"/></h3>	
		  </div><br>
		      <h3>密码：<input type="text" placeholder="密码" id="password"></h3>
		  <div id="btnDiv" style="margin-top: 5%">
					<button  onclick="check()" >
			        登     录   
				    </button>
		  </div>
     </div>
		<div style="visibility:hidden;display:none">
			<div id="checklogin">
				<?php echo U('Admin/Login/checkloginAjax');?>
			</div>
			<div id="loginindex">
			    <?php echo U('Admin/Admin/index');?>
			</div>
		</div>

		<script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
		<script type="text/javascript">
            //点击提交按钮时进行验证
			var check = function(){
				var data = {
					username:$('#username').val(),
					password:$('#password').val()
				}
				$.ajax({
					url:$('#checklogin').html(),
					type:'post',
					data:data,
					//请求成功
					success:function(res){
						if(res.success){
							alert(res.msg);
							window.location.href = $('#loginindex').html();
						}else {
							alert(res.errmsg);
						}
					},
					//请求失败
					error:function(){
						alert('网络错误');
					}
				})
			}	
		</script>
	</body>
</html>