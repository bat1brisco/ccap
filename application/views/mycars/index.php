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
					<?php foreach($carssold as $row) : ?>
						
						<div class="col-md-3 text-center mb-4">
							<div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>
								<h3 align="center"><strong><?php echo $row['make']; ?></strong></h3>
								<h4 style="text-align:center;"><?php echo $row['model']; ?></h4>
								<img class="post-thumbnail img-thumbnail cars-view" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $row['post_image']; ?>">
								<a class="btn btn-ccap mt-2 mb-2" href="/ccap/carslisting/<?php echo $row['slug']; ?>">View Details</a>
							</div>			
						</div>

					<?php endforeach; ?>
				<?php else : ?>
					<p>No Cars Sold</p>
				<?php endif; ?>
			<hr>

			<h4>Pending Cars</h4>
			<?php if($carspending) : ?>
			
					<?php foreach($carspending as $row) : ?>
						
							<div class="col-md-3 text-center mb-4">
								<div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>
									<h3 align="center"><strong><?php echo $row['make']; ?></strong></h3>
									<h4 style="text-align:center;"><?php echo $row['model']; ?></h4>
									<img class="post-thumbnail img-thumbnail cars-view" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $row['post_image']; ?>">
									<a class="btn btn-ccap mt-2 mb-2" href="/ccap/carslisting/<?php echo $row['slug']; ?>">View Details</a>
								</div>			
							</div>
								
					<?php endforeach; ?>
				<?php else : ?>
					<p>No Cars Pending</p>
				<?php endif; ?>
			<hr>

			<h4>Deals in Progress</h4>
			<?php if($carsinprogress) : ?>
					<?php foreach($carsinprogress as $carinprogress) : ?>
						<?php echo $carinprogress['make']; ?>
						<?php echo $carinprogress['model']; ?>
					<?php endforeach; ?>
				<?php else : ?>
					<p>No Car Deals in Progress</p>
				<?php endif; ?>
			<hr>
					
		</div>
	</div>
</div>