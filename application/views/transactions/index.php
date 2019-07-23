<div class="container-fluid">
	<div class="row">
		<div class="col-md admin-sidebar pt-5 pl-0 pr-0">

			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>admindashboard">My Dashboard</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>adminprofile">My Profile</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>chat1">Messages</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>transactions">Transactions</a>
			
		</div>

		<div class="col-md-10 mb-4">

			<div class="container-fluid table-responsive" id="table-container1" style="width:100%">
				<h3 align="center"><?= $title; ?></h3>
				<table id="transaction_data" class="table table-striped table-bordered text-center" style="width:100%">
					<thead>
						<tr>
							<th width="10%">Image</th>
							<th width="35%">Make</th>
							<th width="35%">Model</th>
							<th width="20%">Actions</th>
						</tr>
					</thead>
				</table>
			</div>
		
		</div>
	</div>
</div>
