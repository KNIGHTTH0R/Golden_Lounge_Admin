<div class="login-box">

	<div class="login-logo"><b><?php echo $site_name; ?></b></div>

	<div class="login-box-body">
		<p class="login-box-msg">Sign in to start your session</p>
		<?php echo $form->open(); ?>
			<?php echo $form->messages(); ?>
			<?php echo $form->bs3_text('Username', 'username', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
			<?php echo $form->bs3_password('Password', 'password', ENVIRONMENT==='development' ? 'webmaster' : ''); ?>
			<div class="row" style="padding-bottom: 10px;">
				<div class="col-xs-4">
					<?php echo $form->field_dropdown('dropdown', array('Duty Manager', 'Awana', 'Sungai Bersih')); ?>
				</div>
				<div class="col-xs-8" >
					<div class="checkbox" style="float:right;">
						<label><input type="checkbox" name="remember"> Remember Me</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8">
				</div>
				<div class="col-xs-4">
					<?php echo $form->bs3_submit('Sign In', 'btn btn-primary btn-block btn-flat'); ?>
				</div>
			</div>
		<?php echo $form->close(); ?>
	</div>

</div>