<div class="container-fluid">
	<div class="row">
		<div class="col-md admin-sidebar pt-5 pl-0 pr-0">

			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>userdashboard">My Dashboard</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>chat">Chat</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>transactions">Transactions</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>carslisting">Cars</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>partslisting">Parts</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>logs">Logs</a>
			<!-- <a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1" href="">Reports</a> -->
			
		</div>

		<div class="col-md-10 mb-4">
	
			<h4><?php echo $title; ?></h4>
			
			<div class="container container-card text-center">
				<div class="row">
					

				</div>
			</div>

			<h2 class="mt-3">Recent Cars Listing</h2>
			<hr>
				<div class="row mt-4">


			<?php  
				$data = $this->db->query("SELECT * FROM `cars` WHERE `status` = 'Approved' ORDER BY `car_id` DESC LIMIT 4");

					if ($data->num_rows() > 0): ?>
					<?php foreach ($data->result_array() as $row): ?>
					<div class="col-md-3 text-center mb-4">
						
						<div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>

							<h4 align="center"><?php echo $row['make']; ?></h4>
							<h5 style="text-align:center;"><?php echo $row['model']; ?></h5>
							<img class="post-thumbnail img-thumbnail" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $row['post_image']; ?>">
							<a class="btn btn-ccap mt-2 mb-2" href="/ccap/carslisting/<?php echo $row['slug']; ?>">View Details</a>

						</div>    

					</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<h2 class="mt-3">Recent Parts Listing</h2>
			<hr>
				<div class="row mt-4">


			<?php  
				$data = $this->db->query("SELECT * FROM `parts` WHERE `status` = 'Approved' ORDER BY `parts_id` DESC LIMIT 4");

					if ($data->num_rows() > 0): ?>
					<?php foreach ($data->result_array() as $row): ?>
					<div class="col-md-3 text-center mb-4">
						
						<div style="border:1px solid #ccc"; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;>

							<h4 align="center"><?php echo $row['brand']; ?></h4>
							<h5 style="text-align:center;"><?php echo $row['model_name']; ?></h5>
							<img class="post-thumbnail img-thumbnail" src="<?php echo base_url(); ?>assets/images/posts/<?php echo $row['post_image']; ?>">
							<a class="btn btn-ccap mt-2 mb-2" href="/ccap/partslisting/<?php echo $row['slug']; ?>">View Details</a>

						</div>    

					</div>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>
			
		</div>
	</div>
</div>
