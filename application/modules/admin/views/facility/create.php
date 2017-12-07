<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Facility Info</h3>
			</div>
			<div class="box-body">
				<?php echo $form->open(); ?>

					<?php echo $form->bs3_text('Facility Name', 'name'); ?>

					<?php if ( !empty($facility_types) ): ?>
					<div class="form-group">
						<label for="facility_types">Type</label>
						<div>
						<?php foreach ($facility_types as $facility_type): ?>
							<label class="radio-inline">
								<input type="radio" name="type[]" value="<?php echo $facility_type->id; ?>"> <?php echo $facility_type->facility_type; ?>
							</label>
						<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<?php if ( !empty($lounges) ): ?>
					<div class="form-group">
						<label for="lounges">Lounge</label>
						<div>
						<?php foreach ($lounges as $lounge): ?>
							<label class="radio-inline">
								<input type="radio" name="location[]" value="<?php echo $lounge->id; ?>"> <?php echo $lounge->name; ?>
							</label>
						<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>


 					<?php echo $form->bs3_submit(); ?>
					
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>