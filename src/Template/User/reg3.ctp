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
		<title>Register</title>

		<link rel="stylesheet" href="/webroot/css/team041/bootstrap.css" />
        <link rel="stylesheet" href="/webroot/css/team041/common.css" />
        <link rel="stylesheet" href="/webroot/css/team041/register.css" />

        <script type="text/javascript" src="/webroot/js/team041/jquery-1.10.2.min.js" ></script>
        <script type="text/javascript" src="/webroot/js/team041/jquery.form.min.js" ></script>
        <script type="text/javascript" src="/webroot/js/team041/jquery.validate.min.js" ></script>
        <script type="text/javascript">
        $(function() {
            //表单验证
            $('#form_step3').validate({
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
		<div class="img-bg-box">
			<div id="top-title" style="color: #000000;" class="top-text">DANUBER TRAVER AGENCY</div>
			<img id="img-bg" src="/webroot/img/team041/WechatIMG4.jpeg" />
		</div>
		<div class="register-box">
			<div class="register">
			    <form id="form_step3" method="post" action="/index.php/user/reg3">
				<div class="step-3 show">
				    <div class="title">FILL IN TRAVEL PREDERENCE</div>
					<div class="text">Travel Styles:</div>
					<div class="choose-btn">Culture</div>
					<div class="choose-btn">Gourmet food</div>
					<div class="choose-btn active">Landscape</div>
					<div class="btn-box">
					    	<button type="submit" class="btn primary-bg">Done</button>
					    
					</div>
				</div>
				<div class="step-box ">
				    <div class="y ">
				        <span>STEP 1</span>
				    </div>
				    <div class="x"></div>
				    <div class="y ">
				        <span>STEP 2</span>
				    </div>
				    <div class="x"></div>
				    <div class="y active">
				        <span>STEP 3</span>
				    </div>
				</div>
				</form>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(function() {
		$(".choose-btn").click(function() {
			if ($(this).is(".active")) {
				//$(this).siblings().removeClass("active");
				$(this).removeClass("active");
			} else {
				$(this).addClass("active");
			}
	        
	        
	    });
	});
</script>
