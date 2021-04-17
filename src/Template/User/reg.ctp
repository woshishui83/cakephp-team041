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
		<?= $this->Html->css('team041/bootstrap.css') ?>
    	<?= $this->Html->css('team041/common.css') ?>
    	<?= $this->Html->css('team041/register.css') ?>
	</head>
	<body>
		<div class="img-bg-box">
			<div id="top-title" class="top-text">DANUBER TRAVER AGENCY</div>
			<?php echo $this->Html->image("team041/WechatIMG3.jpeg", array('id'=>'img-bg'));  ?>
		</div>
		<div class="register-box">
			<div class="register">
				<form id="form_step1" method="post">
				<div class="step-1 show">
					<div class="title">YOUR DREAM JOURNEY STARTS HERE</div>
					<div class="input-group">
						<div>Enter email here:</div>
						<input type="email" class="form-control" placeholder="email" aria-describedby="basic-addon1">
					</div>
					<div class="input-group">
						<div>Enter password:</div>
						<input type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
					</div>
					<div class="input-group">
						<div>Confirm password:</div>
						<input type="password" class="form-control" placeholder="password" aria-describedby="basic-addon1">
					</div>
					<div class="btn-box">
						<a href="register2.php">
					    	<button data-p="step-1" data-n="step-2" type="submit" class="btn primary-bg">Next</button>
						</a>
					</div>
				</div>
				</form>
				<div class="step-box">
				    <div class="y active">
				        <span>STEP 1</span>
				    </div>
				    <div class="x"></div>
				    <div class="y">
				        <span>STEP 2</span>
				    </div>
				    <div class="x"></div>
				    <div class="y">
				        <span>STEP 3</span>
				    </div>
				</div>
			</div>
		</div>
	</body>
</html>

