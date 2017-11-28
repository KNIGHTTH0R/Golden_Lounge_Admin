<div class='box <?php echo $style.' '.$solid; ?>'>
	<div class='box-header with-border'>
		<h3 class='box-title'><?php echo $title; ?></h3>
			<?php if (!empty($buttonname)): ?>
				<div class="box-tools pull-right">
				<a class="btn btn-default bg-blue" href='<?php echo $buttonurl; ?>'><?php echo $buttonname; ?></a>
				</div>	
			<?php endif; ?>
	</div>
