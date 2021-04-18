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
	<title>Home</title>

    <?= $this->Html->css('team041/bootstrap.css') ?>
    <?= $this->Html->css('team041/common.css') ?>
    <?= $this->Html->css('team041/index.css') ?>
	</head>
	<body>
		<div class="top-bar primary-bg">
			<?php echo $this->Html->image("team041/WechatIMG6.png", array('class'=>'logo'));  ?>
			<div class="title">DANUBE TRAVER AGENCY</div>
			<div class="text">
				<span>
					<a href="/index.php/user/reg">Sign in / Register</a>
				</span>
			</div>
		</div>
		<div class="nav-box">
			<div class="nav">
				<a href="#">HOME</a>
				<a href="#">SERVICES</a>
				<a href="#">TRAVERING PLAN</a>
				<a href="#">DESTINATION</a>
				<a href="#">ACTIVITIES</a>
				<a href="#">CONTACT US</a>
				<span class="glyphicon glyphicon-search"></span>
			</div>
		</div>
		<?php echo $this->Html->image("team041/WechatIMG7.jpeg", array('class'=>'banner'));  ?>
		<div class="bottom-bar primary-bg">
			<div class="left">
				<div class="title"><span>Travel Packages</span></div>
				<div class="img-box">
					<div class="left">
						<?php echo $this->Html->image("team041/WechatIMG470.png");  ?>
						<div>Vietnam</div>
					</div>
					<div class="right">
						<?php echo $this->Html->image("team041/WechatIMG469.png");  ?>
						<div>Eastern europe</div>
					</div>
				</div>
			</div>
			<div class="right">
				<div class="title"><span>Special offer</span></div>
				<div class="img-box">
					<div class="left">
						<?php echo $this->Html->image("team041/WechatIMG468.png");  ?>
						<div>Slovak Spa</div>
					</div>
					<div class="right">
						<?php echo $this->Html->image("team041/WechatIMG3.jpeg");  ?>
						<div>Baltic</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
