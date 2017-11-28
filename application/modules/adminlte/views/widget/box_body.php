<?php if (!empty($body)): ?>
		<div class='box-body row'>
			<div class='col-md-9'>
				<?php echo $body; ?>
			</div>
			<?php if (!empty($count)): ?>
				<div class='col-md-3'>
					<span class="label label-primary" style="float: right;"><?php echo $count; ?></span>
				</div>
			<?php endif; ?>
		</div>
<?php endif; ?>


