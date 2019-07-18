<div class="container mb-2">
	<div class="row">
		<div class="col-md"><h4>Product Details and Requirements</h4></div>
		<div class="col-md pr-0"><a href="<?php echo base_url(); ?>mycars" class="btn btn-success float-right">Back to Dashboard</a></div>
	</div>

	<div class="row mt-3">
		<div class="col-md pl-0 pr-0">
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $car['post_image']; ?>" alt="" class="img-thumbnail cars-view">
		</div>

		<div class="col-md pt-4 pb-5 car-price">
			<h1 class="ml-3"><?php echo $car['year']; ?> <?php echo $car['make']; ?> <?php echo $car['model']; ?></h1>
			<h3 class="ml-3">Price: Php. <span><?php echo $car['price']; ?></span></h3>
			<h3 class="ml-3">Status: <span><?php echo $car['status']; ?></span></h3>
			
			<h3 class="mt-5 ml-3">Requirements / Documents</h3>	
			<h5 class="ml-3">Certificate of Vehicle Registration (Required)</h5>
			<h5 class="ml-3">Receipt of Registration (Required)</h5>
			<h5 class="ml-3">Notarized Deed of Sale (Required)</h5>
			<h5 class="ml-3">Endorsement from Insurance Company (Optional)</h5>
			<h5 class="ml-3">Maintenance Records (Optional)</h5>
				
		</div>
	</div>

	<div class="row text-center mt-4">
		<div class="col-md text-center">
			<h4>Requirements Status</h4>
		</div>
	</div>

	<div class="row mt-4 text-center">
		<div class="col-md"></div>
		
		<div class="col-md-8">
			<div class="alert alert-success" role="alert">
				Certificate of Vehicle Registration
			</div>

			<div class="alert alert-success" role="alert">
				Receipt of Registration
			</div>

			<div class="alert alert-success" role="alert">
				Notarized Deed of Sale
			</div>

			<div class="alert alert-success" role="alert">
				Insurance Company Endorsement
			</div>

			<div class="alert alert-success" role="alert">
				Maintenance Records
			</div>
		</div>
		
		<div class="col-md"></div>
	</div>
</div>
