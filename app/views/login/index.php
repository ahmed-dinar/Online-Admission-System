<?php 

$admin  = new admins();
if( $admin->isLoggedIn() ){
	$location = SITE_URL;
	header('Location: ' . $location .'/admin');
	exit();
}

$user  = new Users();
if($user->isLoggedIn()){
	$location = SITE_URL;
	header('Location: ' . $location);
	exit();
}
else{


	if(Session::exists('resSuccess')){
		echo miscellaneous::errorPopup(Session::flush('resSuccess'),"green");
	}
	else if(Session::exists('error-login')){
		echo miscellaneous::errorPopup(Session::flush('error-login'),"red");
	}
	else if(Session::exists('signin-first')){ ?>
		<div class="col-md-6 col-md-offset-3">
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php echo Session::flush('signin-first'); ?>
			</div>
		</div>

	<?php }

?>

	

	<script type="text/javascript">
		$(document).on('click','.pop-close',function(){
		    $(this).parent().remove();
		});
	
		jQuery(document).ready(function(){
			jQuery("#logform").validationEngine();
			$("#logform").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
		});
	</script>






		<form action="<?php echo SITE_URL; ?>/login/run" class="form-horizontal" method="post" >

			<div class="form-group">
				<h3 class="page-header col-sm-offset-2">Login</h3>
			</div>


			<div class="form-group">
				<label for="imobile" class="col-sm-2 control-label">Mobile No.</label>
				<div class="col-sm-6">
					<input type="text" name="mobile" class="form-control" id="imobile" />
				</div>
			</div>

			<div class="form-group">
				<label for="ipass" class="col-sm-2 control-label">10 digits code</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" id="ipass" name="password" />
				</div>
			</div>


			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<span><a href="<?php echo SITE_URL; ?>/recoverpassword" >Forgot your code?</a></span>
				</div>
			</div>


			<br/>
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >

			<div class="form-group">
				<div class="col-sm-6 col-sm-offset-2">
					<input type="submit" value="Login" class="btn btn-primary" />
				</div>
			</div>

		</form>



<?php
}
?>