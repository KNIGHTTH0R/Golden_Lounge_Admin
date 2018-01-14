<div class="row">
<div class="col-md-6">
<div class='box box-primary box-solid' >
	<div class='box-header with-border'>
		<h3 class='box-title'>Staff Detail</h3>
	</div>

		<div class='box-body row'>
				<div class="row margin">
                    <div class="col-sm-4">
                      <img class="img-responsive" src="https://image.ibb.co/nroRh6/rest_lounge.png" alt="Photo">
                    </div>
                </div>
		</div>
		<div class='box-body row'>
			<div class='col-md-3'>
				Name :
			</div>
			<div class='col-md-9'>
				<?php echo $staff->name; ?>
			</div>
		</div>

		<div class='box-body row'>
			<div class='col-md-3'>
				Position :
			</div>
			<div class='col-md-9'>
				<?php echo $staff->position; ?>
			</div>
		</div>



		<div class='box-footer'>
			<a class='btn btn-flat btn-primary' href='staff/editstaff/<?php echo $staff->id; ?>'>Edit</a>
			<a class='btn btn-flat btn-primary' href='staff/view_all/<?php echo $staff->id; ?>'>Done</a>

	

		</div>

</div>
</div>
</div>