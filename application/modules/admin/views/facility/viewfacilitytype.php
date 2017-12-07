<div class="col-md-6">
<div class='box box-primary box-solid' >
	<div class='box-header with-border'>
		<h3 class='box-title'>Facility Type Detail</h3>
	</div>
		<div class='box-body row'>
			<div class='col-md-4'>
				Name :
			</div>
			<div class='col-md-3'>
				<?php echo $facilitytype->facility_type; ?>
			</div>
		</div>

		<div class='box-footer'>
			<a class='btn btn-flat btn-primary' href='facility/editfacility/<?php echo $facility->id; ?>'>Edit</a>
			<a class='btn btn-flat btn-primary' href='facility/view_all2/<?php echo $facility->id; ?>'>Done</a>

	

		</div>

</div>
</div>