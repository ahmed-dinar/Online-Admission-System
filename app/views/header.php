<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admission test</title>

	<?php require_once 'head.php'; ?>

</head>
<body>


<div class="navbar navbar-default top-navbar">
	<div class="container">
		<div class="navbar-header pull-left">
			<span>
				<a href="/"  class="navbar-brand" style="font-family: 'Lobster Two', cursive; color: #064771"  ><img width="160px"; height="90px";  src="<?php echo SITE_URL; ?>/public/img/logo.png" /></a>
			</span>
		</div>
		<div class="pull-left text-center" style="margin-left: 20px; margin-top: 15px;">
			<h3>EastWest University Bangladesh</h3>
			<h4>Undergraduate Admission Test 2015-16</h4>
		</div>
		<div>
			<?php $user  = new Applications();

			if($user->isLoggedIn()){ ?>

				<ul class="nav navbar-right navbar-nav" style="z-index: 100000;">
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							<?php echo $user->data()->name; ?> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo  SITE_URL; ?>/login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a></li>
						</ul>
					</li>
				</ul>


			<?php }else{ ?>
				<ul class="nav navbar-nav navbar-right">
					<li style="margin-right: 5px;">
						<p class="navbar-btn">
							<a href="<?php echo SITE_URL; ?>/login" class="btn btn-default btn-xs">Login</a>
						</p>
					</li>
				</ul>
			<?php } ?>

		</div>
	</div>
</div>

<div class="navbar navbar-default navbar-static-top">

	<div class="container">

		<!-- Web heading/logo -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Navbar-main">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Main Menus -->
		<div class="collapse navbar-collapse" id="Navbar-main">


			<!-- left menu -->
			<ul class="nav navbar-nav nav-menu">
				<li><a href="<?php echo SITE_URL; ?>" class="f-c">Home</a></li>
				<li><a href="<?php echo SITE_URL; ?>/procedure">Instruction</a></li>
				<li><a href="<?php echo SITE_URL; ?>/apply">Admission Form</a></li>
				<li><a href="<?php echo SITE_URL; ?>/eligibility">Admission Eligibility</a></li>
				<li><a href="<?php echo SITE_URL; ?>/result">Result</a></li>
				<li><a href="<?php echo SITE_URL; ?>/notices">Calender</a></li>
				<li><a href="<?php echo SITE_URL; ?>/payment/instruction">Payment Method</a></li>
				<li><a href="<?php echo SITE_URL; ?>/contact">Contact</a></li>
			</ul>

		</div>

	</div>
</div>

<div class="container" >
	<div class="row">
		<div class="panel panel-default" style="min-height: 452px; margin-top: -21px; border-radius: 0px; margin-bottom: 0px; padding-top: 10px;">
			<div class="panel-body">
