<div class="container-fluid">
	<div class="row">
		<div class="col-md admin-sidebar pt-5 pl-0 pr-0">
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>userdashboard">My Dashboard</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>chat">Messages</a>
			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>mycars">Cars</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>myparts">Parts</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>transactions">Transactions</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>logs">Logs</a>			
		</div>

		<div class="col-md-10 mb-4 pt-3">
	
			<h4><?php echo $title; ?></h4>

			<hr>

			<h4>Cars Sold</h4>
				<?php if($carssold) : ?>
					<?php foreach($carssold as $carsold) : ?>
						<?php echo $carsold['Make']; ?>
						<?php echo $carsold['Model']; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<p>No Cars Sold</p>
				<?php endif; ?>
			<hr>

			<h4>Pending Cars</h4>
			<?php if($carspending) : ?>
					<?php foreach($carspending as $carpending) : ?>
						<?php echo $carpending['Make']; ?>
						<?php echo $carpending['Model']; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<p>No Cars Pending</p>
				<?php endif; ?>
			<hr>

			<h4>Deals in Progress</h4>
			<?php if($carsinprogress) : ?>
					<?php foreach($carsinprogress as $carinprogress) : ?>
						<?php echo $carinprogress['Make']; ?>
						<?php echo $carinprogress['Model']; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<p>No Car Deals in Progress</p>
				<?php endif; ?>
			<hr>
					
		</div>
	</div>
</div>