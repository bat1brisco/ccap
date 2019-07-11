<?php if($this->session->userdata('logged_in')) : ?>
<div class="container-fluid table-responsive" id="table-container1" style="width:100%">
  <div class="row">
    <div class="col-md admin-sidebar pt-5 pl-0 pr-0">

      <a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>admindashboard">My Dashboard</a>
			<a class="nav-link rounded-0 link-active mb-1" href="<?php echo base_url(); ?>chat1">Chat</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/manage_account">Manage Registration</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Carslisting/manage_cars">Manage Car Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>Partslisting/manage_parts">Manage Parts Posts</a>
			<a class="nav-link rounded-0 mb-1" href="<?php echo base_url(); ?>users/administer_accounts">Users List</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>admintransactions">Transactions</a>
			<a class="nav-link rounded-0 mb-1 disabled" href="<?php echo base_url(); ?>adminlogs">Logs</a>

    </div>

    <div class="col-md-10 mb-4">
      <?php
        // print_r($user_data); 
        foreach($user_data as $user){
            
          ?>

          <div class="row">
            <div class="col"><?php echo $user->fname . " " . $user->lname ?></div>
            <div class="col"><a href="leave_message_admin/<?php echo $user->user_id ?>"><button><?php echo $user->user_id ?></button></a>
            
            </div>
              
            
          </div>

      <?php




        }
      ?>
      
      <!-- <table id="user" class="table table-striped table-bordered text-center" style="width:100%">
        <thead>
          <tr>
            <th width="80%">First Name</th>
            <th width="20%">Start Chat</th>
            
            <th width="20%">Start Chat</th>
          </tr>
        </thead>
      </table> -->

      <div id="user_modal_details"></div>
    </div>
  </div>
</div>

  
<?php endif; ?>