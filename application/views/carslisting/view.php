<div class="container mb-2">
	<div class="row">
		<h4>Product Details</h4>
	</div>

	<div class="row">
		<div class="col-md pl-0 pr-0">
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $car['post_image']; ?>" alt="" class="img-thumbnail cars-view">
		</div>

		<div class="col-md pt-5 pb-5 car-price">
			<h1 class="ml-3"><?php echo $car['year']; ?> <?php echo $car['make']; ?> <?php echo $car['model']; ?></h1>
			<h3 class="ml-3">Price: Php. <span><?php echo $car['price']; ?></span></h3>
			<h5 class="ml-3">Description:</h5>
			<h5 class="ml-3"><?php echo $car['description']; ?></h5>
			
			<?php if($this->session->userdata('logged_in')) : ?>
			<div class="row">
				<div class="col-md text-center">
					<a class="btn btn-ccap btn-lg mt-5" href="<?php echo base_url(); ?>leave_message">Leave a message</a>
				</div>
			</div>
			<?php endif; ?>
			<?php
				$car_id = $car['car_id'];
				$user_id = $car['user_id']; 
				
				$retrieve_seller = $this->db->query("SELECT `fname`, `lname` FROM `users` WHERE `user_id` = $user_id");
				$name_of_seller = $retrieve_seller->row_array();
			?>
			<?php if(($this->session->userdata('logged_in')) && ($this->session->userdata('user_id') != $car['user_id'])) : ?>
				<?php echo form_open('/mycars/updateCarStatus/' . $car['car_id']); ?>
					<div class="row">
						<div class="col-md text-center">
							<input type="hidden" name="cars_buyer_id" value="<?php echo $this->session->userdata('user_id'); ?>">
							<input type="hidden" name="car_buyer_id" value="<?php echo $this->session->userdata('user_id'); ?>">
							<input type="hidden" name="slug" value="<?php echo $car['slug']; ?>">
							<input type="hidden" name="car_id" value="<?php echo $car['car_id']; ?>">
							<input type="hidden" name="car_seller_id" value="<?php echo $car['user_id']; ?>">
							<input type="hidden" name="car_make" value="<?php echo $car['make']; ?>">
							<input type="hidden" name="car_model" value="<?php echo $car['model']; ?>">
							<input type="hidden" name="post_image" value="<?php echo $car['post_image']; ?>">
							<input type="hidden" name="name_of_seller" value="<?php echo implode(" ", $name_of_seller); ?>">
							<input type="hidden" name="name_of_buyer" value="<?php echo $this->session->userdata('fname') . ' ' . $this->session->userdata('lname'); ?>">
							
							<button type="submit" class="btn btn-success btn-lg mt-2">Start Deal</button>
						</div>
					</div>
				</form>
			<?php endif; ?>
		</div>
	</div>

	<div class="row text-center mt-4">
		<div class="col-md text-center">
			<h4>Product Specifications</h4>
		</div>
	</div>

	<div class="row mt-4 text-center">
		<div class="col-md spec-panel-1 ml-1 mr-1 pt-3">
			<div class="row">
				<div class="col-md-6">
					<p>Make</p>
					<p>Model</p>
					<p>Year</p>
					<p>Body Style</p>
				</div>
				<div class="col-md-1">
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</div>
				<div class="col-md-5">
					<p><?php echo $car['make']; ?></p>
					<p><?php echo $car['model']; ?></p>
					<p><?php echo $car['year']; ?></p>
					<p><?php echo $car['body_style']; ?></p>
				</div>
			</div>
		</div>

		<div class="col-md spec-panel-1 ml-1 mr-1 pt-3">
			<div class="row">
				<div class="col-md-6">
					<p>Seating Capacity</p>
					<p>No. of Doors</p>
					<p>Color</p>
					<p>Transmission</p>
				</div>
				<div class="col-md-1">
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</div>
				<div class="col-md-5">
					<p><?php echo $car['seating_capacity']; ?></p>
					<p><?php echo $car['door']; ?></p>
					<p><?php echo $car['color']; ?></p>
					<p><?php echo $car['transmission']; ?></p>
				</div>
			</div>
		</div>

		<div class="col-md spec-panel-1 ml-1 mr-1 pt-3">
			<div class="row">
				<div class="col-md-6">
					<p>Fuel Type</p>
					<p>Drive Type</p>
					<p>Mileage</p>
					<p>Reason for Selling</p>
				</div>
				<div class="col-md-1">
					<p>:</p>
					<p>:</p>
					<p>:</p>
					<p>:</p>
				</div>
				<div class="col-md-5">
					<p><?php echo $car['fuel_type']; ?></p>
					<p><?php echo $car['drive_type']; ?></p>
					<p><?php echo $car['mileage']; ?></p>
					<p><?php echo $car['rfs']; ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
<?php if($this->session->userdata('user_id') == $car['user_id']): ?>
	
	<?php echo form_open('/carslisting/delete/'.$car['car_id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger float-right">
	</form>
	<a class="btn btn-warning float-right mr-2 text-white" href="<?php echo base_url(); ?>carslisting/edit/<?php echo $car['slug']; ?>">Edit</a>

<?php endif; ?>

</div>
		
<?php 
$session_user_id = intval($this->session->userdata('user_id'));
$user_id = intval($car['user_id']);

	if($session_user_id != $user_id){
	?>
		<div class="container star-container pt-2">

			<input type="hidden" id="carslug" name="slug" value="<?= $car['slug']; ?>"> 
			
		<!-- CAR RATINGS STARS ************************************************************************************************************* -->
		<!-- NEXT TO Car_ratings.php from Controller *************************************************************************************************************-->
			<?php	
				echo form_open('car_ratings/createRating/' . $car['car_id']); ?>
				<div class="container">
				<?php if($hasrated === TRUE): ?>
				<?php $inputclass="disabled starrating "; ?>
				<?php else : ?>
				<?php $inputclass="starrating "; ?>
					<div class="<?php echo $inputclass; ?>risingstar d-flex justify-content-center flex-row-reverse">
						<input type="radio" class="<?php echo $inputclass; ?>" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
						<input type="radio" class="<?php echo $inputclass; ?>" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
						<input type="radio" class="<?php echo $inputclass; ?>" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
						<input type="radio" class="<?php echo $inputclass; ?>" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
						<input type="radio" class="<?php echo $inputclass; ?>" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
					</div>
				<?php endif; ?>
						<input type="hidden" name="slug" value="<?php echo $car['slug']; ?>">
						<!-- <button type="submit" class="btn btn-ccap">Submit</button> -->
				</div>	

		</div>
	<?php } ?>
		<div class="container">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<h4 class="text-center text-white mt-5">RATING: <?= $rating; ?></h4>
				</div>
				<div class="col-sm-4"></div>
			</div>

		</div>
	</form>
<!-- ************************************************************************************************************* -->
<div class="container mb-5">
	<h3>Add Comment</h3>

<?php echo validation_errors(); ?>
<!-- CAR COMMENTS ************************************************************************************************************* -->
<?php echo form_open('car_comments/create/' . $car['car_id']); ?>
	<div class="form-group">
		<!-- Hidden input with the user's first and last name -->
		<input type="hidden" name="name" value="<?php echo $this->session->userdata('fname') .  " " . $this->session->userdata('lname'); ?>" class="form-control">
	</div>
	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>

	<!-- Hidden input for the car's slug value to be passed on Car comments controller upon submit -->
	<input type="hidden" name="slug" value="<?php echo $car['slug']; ?>">
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>



<div class="container mt-1 mb-5">
<h3>Comments</h3>
<!-- get_comments from car_comment_model runs upon page load -->
<?php if(!empty($comments)) { ?>
	<!-- If result of get_comments query is not zero or empty, run foreach loop -->
	<?php foreach($comments as $comment) : ?>
		<div class="well mt-1 pt-3 pr-5 pb-3 pl-5">
			<!-- Display the name of commenter -->
			<h5><strong><?php echo $comment['name']; ?></strong></h5>
			<!-- Display the comment -->
			<p><?php echo $comment['body']; ?></p>
			<!-- Display the date when the comment was created -->
			<small class="font-italic"><?php echo $comment['created_at']; ?></small>
		</div>
	<?php endforeach; ?>
	<!-- If comment is empty, contents under the else statement will be displayed -->
<?php }else{ ?>
	<p>No comments to display</p>
<?php } ?>
<hr>
</div>



