<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>lost_found</title>
		<link rel="stylesheet" type="text/css" href="/lost_found/Public/css/bootstrap.min.css">
		<script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		<div class="page-header">
		  <h1>待审核失物订单模块</h1>
		</div>

		<ul class="list-group">

		    <div align="right" style="margin-bottom: 1em">
			<a class ="btn btn-primary" onclick="Alledit()">
		    待审核全部通过
		    </a>
		    <button class="btn btn-danger" onclick="Alldel()">
		    待审核全部关闭
		    </button>
		    </div>

		  <?php if(is_array($list)): foreach($list as $key=>$l): ?><a  href="<?php echo U('Admin/Admin/pendingOrderDetail',array('lost_id'=>$l['lost_id']));?>" style="text-decoration:none;">
				  <li class="list-group-item listItems">
				  	<div class="row">
					  <div class="col-xs-7 col-sm-7 col-md-7">

					    <img src="/lost_found/Public/<?php echo ($l['thumb_img']); ?>" alt="失物招领" width="50" height="50" style="border:3px solid gray;border-radius:2px;">  <!--失物的缩略图-->
					  	<font style="color:#666">
								  	
							失物人的学号：<?php echo ($l['lost_number']); ?>
							失物人的姓名：<?php echo ($l['lost_name']); ?>
							失物时间：<?php echo date('Y-m-d',$l['time']); ?>
							失物描述：<?php echo ($l['lost_desc']); ?>
                            失物是否找到：<?php if($l['mark']==1){ echo "是"; }else{ echo "否"; } ?>
		   				 </font>
					  	<div style="width: 90%;margin-left: 5%">
						   
					  	</div>
					    
					  </div>
					  <div class="col-xs-5 col-sm-5 col-md-5" align="right">
					  	    <a class="btn btn-primary" href="<?php echo U('Admin/Admin/pendingOrderDetail',array('lost_id'=>$l['lost_id']));?>" style="text-decoration:none;">详情
							</a>
					  </div>
					</div>
				  </li>
			  </a><?php endforeach; endif; ?>	
		</ul>
		 <h3><?php echo ($page); ?></h3>

        <div style="visibility:hidden;display:none">
		<div id="pendingAllEdit">
		<?php echo U('Admin/Admin/pendingOrderAllEditAjax');?>
		</div>
		<div id="pendingAllDel">
		<?php echo U('Admin/Admin/pendingOrderAllDelAjax');?>
		</div>
		<div id="adminindex">
		
		</div>
		</div>
		<script type="text/javascript">
	
		   //关闭操作
		   var Alldel= function(){
		      var r=confirm("确定全部关闭？");
             if (r==true)
             {
            $.ajax({
               url:$('#pendingAllDel').html(),
               //请求成功
               success:function(res){
                  if(res.success){
                      alert(res.msg);
                      window.location.href = $('#adminindex').html();
                  }else {
                     alert(res.errmsg);
                  }
               },
               //请求失败
               error:function(){
                  alert('网络错误');
               }
            })
         }else{
	
		 }
		 }
		 
		
        var Alledit=function ()
        {
        var r=confirm("确定全部通过？");
        if (r==true)
        {
               $.ajax({
               url:$('#pendingAllEdit').html(),
               //请求成功
               success:function(res){
                  if(res.success){
                      alert(res.msg);
                      window.location.href = $('#adminindex').html();
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
      else
        {
       
        }
        }
     </script>		

	</body>
</html>