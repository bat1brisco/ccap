
<div class="container mb-5">
	<div class="row">
		<h4>Product Details</h4>
	</div>

	<div class="row">
		<div class="col-md pl-0">
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $car['post_image']; ?>" alt="" class="img-thumbnail">
		</div>

		<div class="col-md pt-5 pb-5 car-price">
			<h1 class="ml-3"><?php echo $car['year']; ?> <?php echo $car['make']; ?> <?php echo $car['model']; ?></h1>
			<h3 class="ml-3">Price: Php. <span><?php echo $car['price']; ?></span></h3>
			<h5 class="ml-3">Description:</h5>
			<h5 class="ml-3"><?php echo $car['description']; ?></h5>
			<?php if($this->session->userdata('logged_in')) : ?>
			<div class="row">
				<div class="col-md text-center">
					<a class="btn btn-ccap btn-lg mt-5" href="<?php echo base_url(); ?>chat">Talk to a Middleman</a>
				</div>
			</div>
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
	
<?php if($this->session->userdata('user_id') == $car['user_id']): ?>
	<hr>
	<a class="btn btn-warning float-left mr-2" href="<?php echo base_url(); ?>carslisting/edit/<?php echo $car['slug']; ?>">Edit</a>
	<?php echo form_open('/carslisting/delete/'.$car['car_id']); ?>
		<input type="submit" value="Delete" class="btn btn-danger">
	</form>
<?php endif; ?>

</div>

<?php if($this->session->userdata('logged_in')): ?>
<div class="container star-container mt-5 mb-5 p-5">
	<!-- <h3 class="text-white">Rate this product</h3>
	<hr>
	<input class="rating ratingbar" value="2" data-min="0" data-max="5" data-step="1"> -->

	<!-- <span class="mr-5"><a id="<?= $car['car_id']; ?>_upvote" class="voteMe"><i class="fas fa-thumbs-up fa-2x"></i></a><span id="<?= $car['car_id']; ?>_upvote_result" class="like ml-2">5</span></span>
	<span><a id="<?= $car['car_id']; ?>_downvote" class="voteMe"><i class="fas fa-thumbs-down fa-2x"></i></a><span id="<?= $car['car_id']; ?>_downvote_result" class="dislike ml-2">4</span></span>

	<input type="hidden" id="carslug" name="slug" value="<?= $car['slug']; ?>"> -->
	<?php echo validation_errors(); ?>

	<?php echo form_open('car_ratings/createRating/' . $car['car_id']); ?>
		<div class="form-group">
			
			<div class="row">
			<?php if($hasrated == TRUE) :?>
				<?php $inputclass="disabled"; ?>
				<?php else : ?>
				<?php $inputclass="inputrating"; ?>
				<div class="col-sm"></div>
				
				<div class="col-sm-4">
				
				
				<label for="inputrating" class="<?= $inputclass; ?> text-center text-white">Rating :</label>
				
				<select class="form-control" name="rating">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
			<?php endif; ?>
			<div class="col-sm"></div>
			</div>

			<div class="row">
			<?php if($hasrated == TRUE) :?>
				<?php $inputclass="col-sm-4 disabled"; ?>
				<?php else : ?>
				<?php $inputclass="col-sm-4"; ?>
				<div class="col-sm"></div>
				<div class="<?= $inputclass; ?> text-center pt-4">
					<input type="hidden" name="slug" value="<?php echo $car['slug']; ?>">
					<button type="submit" class="btn btn-ccap">Submit</button>
				</div>
				<?php endif; ?>
				<div class="col-sm"></div>
			</div>

			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<h4 class="text-center text-white mt-5">RATING: <?= $rating; ?></h4>
				</div>
				<div class="col-sm-4"></div>
			</div>

		</div>

		
	</form>
</div>
<?php endif; ?>

<!-- <div class="container mt-5 mb-5">
<h3>Comments</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="well">
			<h5><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No comments to display</p>
<?php endif; ?>
<hr>

<h3>Add Comment</h3>

<?php echo validation_errors(); ?>

<?php echo form_open('car_comments/create/' . $car['car_id']); ?>
	<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control">
	</div>

	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control">
	</div>

	<div class="form-group">
		<label>Body</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $car['slug']; ?>">
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div> -->
