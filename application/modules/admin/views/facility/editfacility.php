<?php echo $form->messages(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header">
				<h3 class="box-title">Facility Info</h3>
			</div>
			<div class="box-body">
				<?php echo $form->open(); ?>

					<?php echo $form->bs3_text('Facility Name', 'name', $data->name); ?>

						<label for="facility_types">Facility Type</label>
						<div class="row">
							<div class="col-md-3">
								<?php echo $form->field_dropdown('type', $array, $selected_type); ?>
							</div>
						</div>
						<br>

						<label for="facility_types">Availability</label>

						<div class="row">
							<div class="col-md-3">
								<?php echo $form->field_dropdown('availability', $availability, $selected_availability); ?>
							</div>
		

						</div>
						<br>
						<div  class="row">
							<div class="col-md-3">
		 						<?php echo $form->bs3_submit(); ?>
							</div>
							<div class="col-md-9">
	            					<td><a class='btn btn-flat btn-primary' href='facility/view_all2'>Done</a>
								
							</div>
						</div>
					
				<?php echo $form->close(); ?>
			</div>
		</div>
	</div>
	
</div>