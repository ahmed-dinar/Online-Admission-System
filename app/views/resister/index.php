<?php 

$admin  = new admins();
if( $admin->isLoggedIn() ){
	$location = SITE_URL;
	header('Location: ' . $location .'/admin');
	exit();
}

$user  = new Users();
if($user->isLoggedIn()){
	header('Location: ' . SITE_URL);
	exit();
}

?>


	<script type="text/javascript">

		jQuery(document).ready(function(){

			//$("#resform").validationEngine();
		//	$("#resform").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) });


			$("#resform" ).submit(function( e ) {
			 // 	e.preventDefault();

			 // 	$val = jQuery("#resform").validationEngine('validate');
			  //	if( $val == false ){
			  	//	return 0;
			  	//}

			  	

			  	$("#var-btn").css("display", "block");
			  	$("#var-btn").removeClass('v-btn');
				$("#var-btn").addClass('v-btn-loading');
				$("#var-btn").attr('value','Varifying..');


				/*$.ajax({
					url: 'http://localhost/justas/captcha',
	            	type: 'post',
	           		dataType : "json",
	           		timeout: 1000,
	           		data: $('#resform').serialize(),
					success: function(response) { 

						$("#var-btn").removeClass('v-btn-loading');
						$("#var-btn").addClass('v-btn');
						$("#var-btn").attr('value',"I'm not a robot");
						
					   	if(response){
					    		$("#recaptcha_widget").html('<div id="var-div"><img src="http://localhost/justas/public/img/ok.png" alt="You are not a robot!" width="40" height="40" ><h4>Varified! You\'re not a robot!</h4></div>');
					    	    $("#resform").off("submit");
    							$("#resform").submit();

					    }
					    else{
					    	$("#var-btn").css("background", "red");
					    	$("#var-btn").attr('value',"Wrong");
					    	Recaptcha.reload();
					    	//$("#var-btn").hide(8000);
					    	$("#var-btn").delay(3000).fadeOut();
					    }
					 },
					 error: function(objAJAXRequest, strError) {
						$("#var-btn").css("display", "none");
					  	alert(strError);
					}
				});*/

			});


			document.getElementById("var-btn").disabled = false;



		});

		
		var RecaptchaOptions = {
			lang : 'en',
			theme : 'custom',
    		custom_theme_widget: 'recaptcha_widget'
		};



	</script>



		<?php if(Session::exists('error')){ ?>
			<div class="col-md-6 col-md-offset-3">
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<?php echo Session::flush('error'); ?>
				</div>
			</div>
		<?php } ?>

	<form action="<?php echo SITE_URL; ?>/resister/run"  method="post" class="form-horizontal" >

		<div class="form-group">
			<div class="col-sm-6 col-sm-offset-2">
				<h3>Resister</h3>
			</div>
		</div>

		<div class="form-group">
			<label for="iname" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-6">
				<input type="text" name="name" class="form-control" id="iname" />
			</div>
		</div>


		<div class="form-group">
			<label for="imobile" class="col-sm-2 control-label">Mobile</label>
			<div class="col-sm-6">
				<input type="text" name="mobile" class="form-control" id="imobile" />
			</div>
		</div>

		<div class="form-group">
			<label for="iemail" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-6">
				<input type="email" name="email" class="form-control" id="iemail" />
			</div>
		</div>

		<div class="form-group">
			<label for="ipass" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" id="ipass" name="password" />
			</div>
		</div>

		<div class="form-group">
			<label for="icpass" class="col-sm-2 control-label">Confirm</label>
			<div class="col-sm-6">
				<input type="password" class="form-control" id="icpass" name="confirm" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				<!-- Google Recaptcha -->
				<div id="recaptcha_widget" style="display:none">
					<div id="recaptcha_image"></div>
					<input type="text" id="recaptcha_response_field" name="recaptcha_response_field" placeholder="type the words above" class="validate[required]" data-prompt-position="bottomRight:0,12" /><br/>
					<input type="button" value="" class="v-btn" id="var-btn" style="cursor:default;display:none;" />
					<a  title="Get a new challenge" href="javascript:Recaptcha.reload()"><img style="background:#0988CB;border-radius:3px;" src="<?php echo SITE_URL; ?>/public/img/reload.png" alt="Get a new challenge"></a>
					<a  href="javascript:Recaptcha.showhelp()"><img style="background:#0988CB;border-radius:3px;" src="<?php echo SITE_URL; ?>/public/img/help.png" alt="Get a new challenge"></a>
					<img src="http://www.google.com/recaptcha/api/img/clean/logo.png" id="recaptcha_logo" alt="" style="height:36px; width:71px; margin-left:50px;" />
				</div>

				<script type="text/javascript"
						src="http://www.google.com/recaptcha/api/challenge?k=6LeMXwoTAAAAAA0gW3cRzwrtlLT1tQmaCAkVynG5">
				</script>
				<noscript>
					<iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeMXwoTAAAAAA0gW3cRzwrtlLT1tQmaCAkVynG5"height="300" width="500" frameborder="0"></iframe><br>
						   <textarea name="recaptcha_challenge_field" rows="3" cols="40">
						   </textarea>
					<input type="hidden" name="recaptcha_response_field"value="manual_challenge">
				</noscript>
				<!--   ***********       -->
			</div>
		</div>
		<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" >


		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-6">
				<button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		</div>
	</form>

<
