<div class="container-fluid">
<div class="row">
		<div class="col-md admin-sidebar pt-5 pl-0 pr-0">
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>admindashboard">My Dashboard</a>
			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>adminprofile">My Profile</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>chat1">Messages</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>admintransactions">Transactions</a>
			<!-- <a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>adminlogs">Logs</a>			 -->
		</div>

		<div class="col-md-10 mb-4">
	
			<h4><?php echo $title; ?></h4>
			<div class="row">
        <div class="col-sm-4 m-5">
          <img src="<?php echo site_url(); ?>assets/images/posts/noimage.png" alt="" width="75%" height="130%">
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-12 m-5">
          <h4>First Name : <?php echo $profile['fname']; ?></h4>
          <h4>Middle Name : <?php echo $profile['mname']; ?></h4>
          <h4>Last Name : <?php echo $profile['lname']; ?></h4>
          <h4>Address : <?php echo $profile['address']; ?></h4>
          <h4>Email : <?php echo $profile['email']; ?></h4>
        </div>
      </div>
			
			
		</div>
	</div>
</div>