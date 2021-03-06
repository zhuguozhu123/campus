<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>南苑校园失物招领</title>
      <link rel="stylesheet" type="text/css" href="/lost_found/Public/css/bootstrap.min.css">
      <script type="text/javascript" src="/lost_found/Public/js/jquery-2.2.4.min.js"></script>
      <script type="text/javascript" src="/lost_found/Public/js/bootstrap.min.js"></script>
   </head>
   <body>
   <form  method="post" action="<?php echo U('Home/Personal/lostaddAjax');?>" enctype="multipart/form-data">

            <font style="color:#666">
                        <div class="page-header">
                         <h4><i class="glyphicon glyphicon-edit"></i> 新建个人报失模块</h4>
                        </div>            
                        <div class="form-group">
                        <label>失物者学号:</label>
                        <input class="form-control" type="number" id="number" placeholder="必填" size="30" name="number" required/>
                        </div>
                        <div class="form-group">
                        <label><span>失物者姓名:</span></label>
                        <input class="form-control"  placeholder="必填" type="text" id="name" size="30" name="name" required/>
                        </div>
                        <div class="form-group">
                        <label><span>失物类型: </span></label>
                        <label id="lblSelect">
                        </label>
                        </div>
                        <div class="form-group">
                        <select class="form-control" id="selectStyle" name="type">
                        <option value ="校园卡">校园卡</option>
                        <option value ="学生证">学生证</option>
                        <option value="书包">书包</option>
                        <option value="钱包">钱包</option>
                        <option value="书本">书本</option>
                        <option value="手机">手机</option>
                        <option value="电脑">电脑</option>
                        <option value="其它">其它</option>
                        </select>
                        </label>
                        </div>
                        <div class="form-group">
                        <label><span>失物备注信息:</span></label>
                        <textarea required class="form-control" rows="4" id="desc" name="desc" placeholder="丢失物品的过程、物品的特征、或别的任何有助于找回失物的信息都可以输入......"/></textarea>
                        </div>
                        <label><span>失物图片<span class="badge" style="color:yellow;">必填(10m限制)</span></a>:</span></label>
                        <div class="form-group" >
                        <input id="img" name="img" type="file" accept="image/*" class="form-control btn btn-default .btn-sm" /> 
                        </div>

                       
              <div style="margin-bottom: 1em;margin-top:20px;">
                   <button type="submit" class ="form-control btn btn-primary" >
                      提交失物表单
                  </button>
             </div>
            </font>
            </form>
               

            <div style="visibility:hidden;display:none">
               <div id="personallostaddAjax">
               <?php echo U('Home/Personal/lostaddAjax');?>
               </div>
               <div id="loginindex">
               <?php echo U('Home/Personal/index');?>
               </div>
            </div>   
   </body>
</html>