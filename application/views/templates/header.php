<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Cebu Cars and Parts</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/brands.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/solid.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/starrating.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/DataTables/DataTables1/css/dataTables.bootstrap4.min.css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url(); ?>sweetalert2/package/dist/sweetalert2.min.css">

		<style type="text/css">
			.modal-lg {
		    max-width: 55%;
			}
			.img_border {
				border:5px;
			}
		</style>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	
	</head>
	
	<body>
		
	<nav class="navbar navbar-expand-lg navbar-light">
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  
	  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	    <a class="navbar-brand mt-1" href="<?php echo base_url(); ?>"><h5 class="navlogo mr-5"><span class="blue">CEBU</span> <span class="orange">CARS AND PARTS</span></h5></a>
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          Products
	        </a>
	        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="<?php echo base_url(); ?>carslisting">Cars</a>
	          <a class="dropdown-item" href="<?php echo base_url(); ?>partslisting">Parts</a>
	        </div>
	      </li>

	    </ul>
	    <!-- ADMIN HEADER -->
	    <?php if($this->session->userdata('logged_in') && $this->session->userdata('user_type') == "admin" ) : ?>
	    
	    <ul class="navbar-nav admin-home-header">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Manage
					</a>
						
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="<?php echo base_url(); ?>admindashboard" role="button">My Dashboard</a>
						<a class="dropdown-item" href="<?php echo base_url(); ?>users/manage_account" role="button">Accounts</a>
						<a class="dropdown-item" href="<?php echo base_url(); ?>Carslisting/manage_cars" role="button">Cars</a>
						<a class="dropdown-item" href="<?php echo base_url(); ?>Partslisting/manage_parts" role="button">Parts</a>
					</div>
				</li>
	
	      <!-- <li class="nav-item dropdown">
					<a class="nav-link notif-bell ml-3 mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         	<i class="fas fa-envelope" style="font-size: 1.5em;"></i>
	         	
	         	<span class="badge badge-pill badge-danger">24</span>
	        </a>
	        
	      </li> -->
      	<!-- Notification Badge and Notification Details. -->
				<li class="nav-item dropdown" id="badge_notif">
	      	<a class="nav-link notif-bell mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         		<i class="fas fa-bell" style="font-size: 1.5em;"></i>
	         		
	         		<span id="notif_count" class="badge badge-pill badge-danger"></span>
	        </a>
	        	
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="notif_message"></div>
        		</li>
      	<!-- Notification Badge and Notification Details. -->

        <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi! Admin <?php $admin_name = $this->session->userdata('fname'); 
	        	$admin_name1 = ucfirst($admin_name);
	        	echo $admin_name1
	        ?>
	        	<!-- <i class="fas fa-user-circle" style="font-size: 1.5em;"></i> -->
	        </a>
	        
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="<?php echo base_url(); ?>adminprofile">My Profile</a>
	          <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Log Out</a>
	        </div>
      	</li>
	    </ul>
				
			<!-- USER HEADER  -->
			<?php elseif(($this->session->userdata('logged_in') && $this->session->userdata('user_type') == "user" )) : ?>
	    <ul class="navbar-nav user-home-header">
	      	
	      <!-- <li class="nav-item dropdown">
					<a class="nav-link notif-bell ml-3 mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         	<i class="fas fa-envelope" style="font-size: 1.5em;"></i>
	         	
	         	<span class="badge badge-pill badge-danger">24</span>
	        </a>
	      </li> -->
					
        <li class="nav-item dropdown" id="badge_notif">
	      	<a class="nav-link notif-bell mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	         	<i class="fas fa-bell" style="font-size: 1.5em;"></i>
	         	
	         	<span id="notif_count" class="badge badge-pill badge-danger"></span>
	        </a>
	        
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="notif_message"></div>
        </li>

        <li class="nav-item dropdown">
	        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname'); ?>
	        </a>
					
	        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	          <a class="dropdown-item" href="<?php echo base_url(); ?>userdashboard">My Dashboard</a>
	          <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Log Out</a>
	        </div>
	      </li>
	    </ul>
	    <?php endif; ?>

	    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
	    <?php if(!$this->session->userdata('logged_in')) : ?>
	      <li class="nav-item">
	        <a class="nav-link rightnav" href="<?php echo base_url(); ?>users/login">LOG IN</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link rightnav" href="<?php echo base_url(); ?>users/register">REGISTER</a>
	      </li>
	    <?php endif; ?>
	    </ul>
	    
	  </div>
	</nav>

	<script type="text/javascript">
		var id = "<?php echo $this->session->userdata('user_id'); ?>";
		
		$(document).ready(function() {
			$("#badge_notif").click(function() {
				
				$.ajax({  
					url:"http://localhost/ccap/Notification/update_notification",
					method:"POST",
					data:{userid: id},  
					success:function(data){ 
						$('#notif_count').html(data);
					}
	  		});

			});

		});

		//SET INTERVAL WITH SERVER SIDE DATA USING AJAX
		$.ajax({  
			url:"http://localhost/ccap/Notification/get_notification",
			method:"POST",
			data:{userid: id},  
			success:function(data) {  
			  if (data != 0) {
			    console.log("Done");
	        $('#notif_count').html(data);
	      }
			}  
	  }); 

	  $.ajax({  
			url:"http://localhost/ccap/Notification/get_all_notification",
			method:"POST",
			data:{userid: id},  
			success:function(data) {  
			  if (data != 0) {
	       	$('#notif_message').html(data);
	      }
			}  
	  }); 

		setInterval(function(){
			$.ajax({  
			  url:"http://localhost/ccap/Notification/get_notification",  
			  method:"POST",
			  data:{userid: id},
			  success:function(data) {  
			    console.log(data);
			    if (data != 0) {
			      $('#notif_count').html(data);
			    }
			  }  
			});
		  
		  $.ajax({  
				url:"http://localhost/ccap/Notification/get_all_notification",
				method:"POST",
				data:{userid: id},  
				success:function(data) {  
					if (data != 0) {
			      $('#notif_message').html(data);
			    }
				}  
			}); 
	 
		}, 1000);

	</script>