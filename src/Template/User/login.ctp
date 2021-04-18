<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin sign in</title>

        <link rel="stylesheet" href="/webroot/css/team041/bootstrap.css" />
        <link rel="stylesheet" href="/webroot/css/team041/common.css" />
        <link rel="stylesheet" href="/webroot/css/team041/fonticon.css" />
        <link rel="stylesheet" href="/webroot/css/team041/login.css" />

        <script type="text/javascript" src="/webroot/js/team041/jquery-1.10.2.min.js" ></script>
        <script type="text/javascript" src="/webroot/js/team041/jquery.form.min.js" ></script>
        <script type="text/javascript" src="/webroot/js/team041/jquery.validate.min.js" ></script>
        <script type="text/javascript">
        $(function() {
            //表单验证
            $('#form_login').validate({
                ignore: "",
                submitHandler: function(form) {
                    $(form).ajaxSubmit({
                        dataType: "json",
                        success: function(data) {
                            if (data.code === 0) {
                                //alert(data.msg);
                                location.href = "/index.php";
                            } else {
                                alert(data.msg);
                            }
                        }
                    });
                }
            });

        });
        </script>
    </head>
    <body>
        <!-- bar -->
        <div class="flex-layout align-center justify-right bar mar-t-10">
            <div><a href="javascript:;">Admin sign in</a></div>
        </div>
        <!-- concent -->
        <div class="flex-layout column align-center justify-center mar-t-50">
            <div><img width="180px" class="logo" src="/webroot/img/team041/WechatIMG6.png"></div>
            <form id="form_login" method="post" action="/index.php/user/login">
            <div>
                <div class="mar-t-20 title">DANUBE TRAVER AGENCY</div>
                <div class="mar-t-20 input-text"><span class="glyphicon glyphicon-user"></span><span class="mar-l-10">Account Name</span></div>
                <input name="email" type="text" class="form-control input" placeholder=" account name">
                <div class="mar-t-20 input-text"><span class="glyphicon glyphicon-lock"></span><span class="mar-l-10">Password</span></div>
                <div class="pwd-input">
                    <input name="password" type="password" class="form-control input" placeholder=" account name">
                    <div  class="iconfont icon-yanjing-guan eye"></div>
                </div>
                <div class="mar-t-20 flex-layout">
                      <input class="checkbox" type="checkbox"><span class="mar-l-10">remember me</span>
                </div>
                <div class="button flex-layout align-center justify-center mar-t-10 button_login"> login</div>
            </div>
            </form>
            <div class="mar-t-10 fz-18"><a href="/index.php/user/reg">Create Account</a></div>
            <div class="mar-t-10"><a>Forgot Password?</a></div>
            <div class="mar-t-30">Other login methods</div>
            <div class="flex-layout align-center justify-center fz-30 icon-box">
                <div class="iconfont icon-apple fz-30 icon"></div>
                <div class="iconfont icon-facebook mar-l-20  fz-30 icon"></div>
                <div class="iconfont icon-zhifubao mar-l-20  fz-30 icon"></div>
                <div class="iconfont icon-wechat mar-l-20  fz-30 icon"></div>
            </div>
            <div class="mar-t-10"><a>Privacy Policy</a></div>

        </div>
    </body>
</html>

<script type="text/javascript">
$(function() {
    //点击登录，提交form表单
    $(".button_login").click(function() {
        $("#form_login").submit();
    });

});
</script>

