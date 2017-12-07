<div class="col-md-6">
<div class='box box-primary box-solid' >
	<div class='box-header with-border'>
		<h3 class='box-title'>Facility Detail</h3>
	</div>
		<div class='box-body row'>
			<div class='col-md-4'>
				Name :
			</div>
			<div class='col-md-3'>
				<?php echo $facility->name; ?>
			</div>
		</div>

		<div class='box-body row'>
			<div class='col-md-4'>
				Type :
			</div>
			<div class='col-md-3'>
				<?php echo $facility->type; ?>
			</div>
		</div>

		<div class='box-body row'>
			<div class='col-md-4'>
				Availability :
			</div>
			<div class='col-md-3'>
				<?php echo $facility->status; ?>
			</div>
		</div>


		<div class='box-body row'>
				<div class="row margin">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="https://imagejournal.org/wp-content/uploads/bb-plugin/cache/23466317216_b99485ba14_o-panorama.jpg" alt="Photo">
                    </div>
                </div>
		</div>

		<div class='box-footer'>
			<a class='btn btn-flat btn-primary' href='facility/editfacility/<?php echo $facility->id; ?>'>Edit</a>
			<a class='btn btn-flat btn-primary' href='facility/view_all2/<?php echo $facility->id; ?>'>Done</a>

	

		</div>

</div>
</div>