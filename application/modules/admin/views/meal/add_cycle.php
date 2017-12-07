<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
		<!-- 	<div class="box-header">
				<h3 class="box-title">Meal Info</h3>
			</div> -->
			<div class="box-body">
				<?php echo $form->open(); ?>

					<?php echo $form->bs3_text('Cycle Name', 'name'); ?>

					<?php echo $form->bs3_text('Date Start', 'date_start'); ?>

					<?php echo $form->bs3_text('Date End', 'date_end'); ?>

					<div  class="row">
						<div class="col-md-3">
	 						<?php echo $form->bs3_submit(); ?>
						</div>
						<div class="col-md-9">
            				<a class='btn btn-flat btn-primary' href='facility/view_all2'>Back</a>
						</div>
					</div>
				
					
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>