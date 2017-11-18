<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
      <title>南苑校园失物招领</title>
      <link rel="stylesheet" type="text/css" href="/lost_found/Public/css/bootstrap.min.css">
      <script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
      <style type="text/css">
         .header {
            margin-left: 0;
            margin-right: 0;
            height:50px;
            line-height: 50px;
            background-color: #999999;
            color:#fff;
         }
         .content {
            margin-top:100px;
            /*width:90%;*/
            margin-left: 5%;
         }
         .content input {
            width:60%;
            border:1px #eee solid;
            height:30px;
            line-height: 30px;
            padding:16px 16px 16px 16px ;
         }
         #mobile
         {
            border:1px solid gray;
            border-radius:3px;
         }
      </style>
   </head>
   <body>
      <div class="page-header">
        <h4><i class="glyphicon glyphicon-user"></i> 个人信息模块</h4>
      </div>
                   <font style="color:#666">
                        <label><span>学号   </span></label>
                        <input class="form-control" type="text" id="number" value="<?php echo ($user['user_number']); ?>" size="30"/>
          
                        <label><span>姓名   </span></label>
                        <input class="form-control" type="text" id="name" value="<?php echo ($user['user_name']); ?>" size="30" />
           
                        <label><span>性别   </span></label>
                        <input class="form-control" type="text" id="sex" value="<?php echo ($user['user_sex']); ?>" size="30"/>
				  <div id="warnMsg">
                  <div class="text-warning">若不修改手机号，则可直接点击修改按钮</div>
                  <div class="text-warning">如须修改手机号，请点击修改手机号按钮
                  </div>
				  </div>
            <div id="getEditMobileBtn">
            <button onclick="updatemobile()" class="btn btn-primary">
             修改手机号
            </button>
            </div>
            <div id="getMCBtn" style="display: none">
            <input type="text" id="mobile" value="<?php echo ($user['user_mobile']); ?>">
            <button onclick="getCode()" id="getCodeBtn" class="btn btn-primary">
               获取验证码
            </button>
            </div>
            <div id="getdefaultBtn" class="btn btn-gray" style="display: none">
               60s后重新获取
            </div>
            <div id="getInputCodeBtn" style="display: none">
              <input class="form-control"  type="text" placeholder="输入新的验证码" id="code" >
            </div>
      
     
         <div align="center">
            <button style="width:90%;margin-top:30px" onclick="fullMsg()" class="btn btn-warning">
               修改
            </button>
         </div>
         </font>



         <div style="visibility:hidden;display:none">
         <div id="getCodeAjax">
            <?php echo U('Home/User/getCodeAjax');?>
         </div>
         <div id="checkCodeAjax">
            <?php echo U('Home/User/checkCodeAjax');?>
         </div>
         <div id="loginindex">
             <?php echo U('Home/User/temp');?>
         </div>
          </div>
      <script type="text/javascript">


            //修改手机号
            var updatemobile = function(){
               var  editmobileBtn = $('#getEditMobileBtn');
               var  MCbtn = $('#getMCBtn');
               var  InputCodeBtn = $('#getInputCodeBtn');
			   var  warn= $('#warnMsg');
               editmobileBtn.hide();
               MCbtn.show();
               InputCodeBtn.show();
			   warn.hide();
            }


            //验证码码点击后需要等待60秒
            var disableBtn = function(){
               var MCbtn = $('#getMCBtn');
               var defaultBtn = $('#getdefaultBtn');
               var InputCodeBtn = $('#getInputCodeBtn');
               MCbtn.hide();
               defaultBtn.show();
               InputCodeBtn.show();
               var number = 60;
               defaultBtn.html(number +"s后重新获取");
               var intervalFun = function(){
                  if(number == 0){
                     MCbtn.show();
                     defaultBtn.hide();
                     clearInterval(interval);
                  }else {
                     number -- ;
                     defaultBtn.html(number+ "s后重新获取");
                  }
               }
               var interval = setInterval(function(){
                  intervalFun();
               },1000);
            }

                  //获取验证码
                  var getCode = function(){
                     var data = {
                        mobile:$('#mobile').val()
                     }
                     $.ajax({
                        url:$('#getCodeAjax').html(),
                        type:'post',
                        data:data,
                        success:function(res){
                           if(res.success){
                           disableBtn();//获取成功
                        }else {
                           alert(res.errmsg);
                        }
                     },
                     error:function(){
                        alter('网络错误');
                     }
                     
                  })
                  }


                  //点击提交按钮时进行验证
                  var fullMsg = function(){
                     var data = {
                        mobile:$('#mobile').val(),
                        code:$('#code').val(),
                        name:$('#name').val(),
                        number:$('#number').val(),
                        sex:$('#sex').val()
                     }
                     $.ajax({
                        url:$('#checkCodeAjax').html(),
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