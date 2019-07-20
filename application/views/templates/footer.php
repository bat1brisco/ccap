		
		<div class="footer">
		
			<div class="container-fluid">
				<div class="row">
					<div class="col-md">
					<h4 class="text-center footer-text"><span class="blue">CEBU</span> <span class="orange">CARS AND PARTS</span></h4>

						<h6 class="mt-4">About Us</h6>
						<!-- <hr class="border-white"> -->
						<p class="text-justify mt-3">
							Cebu Cars and Parts is an online web portal dedicated to Cebu buyers and sellers of cars and parts. Its main objective is to provide a user-friendly, secure, and interactive platform that enables buying and selling easier for its users, buyers and sellers alike. 
						</p>
					</div>

					<div class="col-md pt-1">
						<h6 class="mt-5 pt-4">Contact Us</h6>
						<hr class="border-white">
						<h6>Email</h6>
						<p>cebucarsandparts@gmail.com</p>

						<h6>Contact Number</h6>
						<p>(032) 244 - 9000</p>
						<p>0917 - 855 - 4752</p>

					</div>

					<div class="col-md pt-1">
						<p class="mt-5 pt-4">CARS</p>
						<p>PARTS</p>
						<p>BLOG</p>
						<p>REVIEWS</p>

						<h5>FOLLOW US ON SOCIAL MEDIA</h5>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md"><i class="fab fa-facebook fa-2x"></i></div>
								<div class="col-md"><i class="fab fa-instagram fa-2x"></i></div>
								<div class="col-md"><i class="fab fa-twitter fa-2x"></i></div>
								<div class="col-md"><i class="fab fa-youtube fa-2x"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<p class="text-center mt-5 pt-1">&copy; 2019 CEBU CARS AND PARTS</p>
		</div>

		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?= base_url() ?>assets/bootstrap-star-rating/js/star-rating.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/DataTables/DataTables1/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/DataTables/DataTables1/js/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo base_url(); ?>sweetalert2/package/dist/sweetalert2.all.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/effects.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/chat.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/chat1.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/rating.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/likedislike.js"></script>
		
		<script>
			$('#cars-table').DataTable({
				"autoWidth": false,
				"pageLength": 10,
				"filter": true,
				"deferRender": true
			});

			$('#users-table').DataTable({
				"autoWidth": false,
				"pageLength": 10,
				"filter": true,
				"deferRender": true
			});

			$('#parts-table').DataTable({
				"autoWidth": false,
				"pageLength": 10,
				"filter": true,
				"deferRender": true
			});

			$('input[type=radio]').on('change', function(e) {
				e.preventDefault();
				$(this).closest("form").submit();

			});

				$('#car_history').DataTable({
				"autoWidth": false,
				"pageLength": 10,
				"filter": true,
				"deferRender": true,

				"columnDefs": [
		            {
		                "targets": [ 2 ],
		                "visible": true,
		                "searchable": false
		            },
		            {
		                "targets": [ 3 ],
		                "visible": true
		            }
		        ]

			});

			$('#parts_history').DataTable({
				"autoWidth": false,
				"pageLength": 10,
				"filter": true,
				"deferRender": true,

				"columnDefs": [
		            {
		                "targets": [ 2 ],
		                "visible": true,
		                "searchable": false
		            },
		            {
		                "targets": [ 3 ],
		                "visible": true
		            }
		        ]

			});

			// display cars post history
			$(document).on('click','a[data-role=view_history_button]',function(){
					var id = $(this).data('id');
					$('#save_id').val(id);
					$.ajax({
						url:'http://localhost/ccap/History/display_history',
						method:'POST',
						data:{id:id},
						success:function(data){
							$('#view_history').html(data),
							$('.view_history_modal').modal('toggle');
						}

					});

			});	
			//update cars post history
				$('#save_changes_btn').on('click',function(event){
					 event.preventDefault();
					var id = $('#save_id').val();
					var make = $('#make').val();
					var model = $('#model').val();
					var year = $('#year').val();
					var price = $('#price').val();
					var transmission = $('#transmission').val();
					var seating_capacity = $('#seating_capacity').val();
					var body_style = $('#body_style').val();
					var mileage = $('#mileage').val();
					var color = $('#color').val();		
					var cylinder_engine = $('#cylinder_engine').val();
					var door = $('#door').val();
					var drive_type = $('#drive_type').val();
					var fuel_type = $('#fuel_type').val();
					var description = $('#description').val();
					var rfs = $('#rfs').val();

					 	$.ajax({
						url:'http://localhost/ccap/History/update_history',
						method:"POST",
						data:{id:id, make:make, model:model, year:year, price:price, transmission:transmission, seating_capacity:seating_capacity, body_style:body_style, mileage:mileage, color:color, cylinder_engine:cylinder_engine, door:door, drive_type:drive_type, fuel_type:fuel_type, description:description, rfs:rfs},
						success:function(data){
							
							$('.view_history_modal').modal('toggle');	
							
							Swal.fire({
								  position: 'center',
								  type: 'success',
								  title: 'Successfully updated!',
								  showConfirmButton: false,
								  timer: 1000
								})
									.then(function(){
		                          location.reload();
		                         });

							}
						});	
				});

				//delete cars post history
				$(document).on('click','a[data-role=delete_history_button]',function(){
					var id = $(this).data('id');

					Swal.fire({
					  title: 'Are you sure?',
					  text: "You want to delete this post!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!'
						})
					.then((result) => {
						if (result.value) {
								$.ajax({
								url:'http://localhost/ccap/History/delete_history',
								method:'POST',
								data:{id:id},
								success:function(data){
									 Swal.fire(
								      'Deleted!',
								      'Your post has been cancelled.',
								      'success'
								    )
									  .then(function(){
	                                  location.reload();
	                                          });
								}
							});

						}
					}) 
					
				});


					// display parts post history
			$(document).on('click','a[data-role=view_parts_history_btn]',function(){
					var id = $(this).data('id');
					$('#parts_save_id').val(id);
					$.ajax({
						url:'http://localhost/ccap/History/parts_view_history',
						method:'POST',
						data:{id:id},
						success:function(data){
							$('#parts_view_history').html(data),
							$('.parts_history_modal').modal('toggle');
						}

					});
					
			});	

					//update parts post history
				$('#parts_save_changes_btn').on('click',function(event){
					 event.preventDefault();
					var id = $('#parts_save_id').val();
					var category = $('#category').val();
					var brand = $('#brand').val();
					var model_name = $('#model_name').val();
					var price = $('#price').val();
					var color = $('#color').val();
					var quantity = $('#quantity').val();
					var description = $('#description').val();
					var rfs = $('#rfs').val();

					 	$.ajax({
						url:'http://localhost/ccap/History/parts_update_history',
						method:"POST",
						data:{id:id, category:category, brand:brand, model_name:model_name, price:price, color:color, quantity:quantity, description:description, rfs:rfs},
						success:function(data){
							
							$('.parts_history_modal').modal('toggle');	
							
							Swal.fire({
								  position: 'center',
								  type: 'success',
								  title: 'Successfully updated!',
								  showConfirmButton: false,
								  timer: 1000
								})
									.then(function(){
		                          location.reload();
		                         });

							}
						});	
				});


					//delete parts post history
				$(document).on('click','a[data-role=del_parts_history_btn]',function(){
					var id = $(this).data('id');

					Swal.fire({
					  title: 'Are you sure?',
					  text: "You want to delete this post!",
					  type: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!'
						})
					.then((result) => {
						if (result.value) {
								$.ajax({
								url:'http://localhost/ccap/History/parts_delete_history',
								method:'POST',
								data:{id:id},
								success:function(data){
									 Swal.fire(
								      'Deleted!',
								      'Your post has been cancelled.',
								      'success'
								    )
									  .then(function(){
	                                  location.reload();
	                                          });
								}
							});

						}
					}) 
					
				});


		</script>
	</body>
</html>