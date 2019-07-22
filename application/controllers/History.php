<?php


	class History extends CI_Controller
	{
		public function history_cars_page(){
			$data['display_cars_history'] = $this->History_model->display_cars_history();
			$this->load->view('templates/header');
			$this->load->view('users/cars_history',$data);
			$this->load->view('templates/footer');
		}
		public function display_history(){
			if (isset($_POST['id'])) {
				$view_history = $this->History_model->view_history($_POST['id']);
				$output = ""; 	
				foreach ($view_history->result() as $row){
						 $new_price = $row->price;
						 $new_price1 = number_format($new_price);
						 $transmission = $row->transmission;
			        	
					?>
					<form action='#' method='POST' id='save_changes_form'>
						<div>
							<center><img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $row->post_image ?>" style='border:9px solid #A6ACAF;border-radius: 18px' width="300px" ></center>
						</div>
						<div class="form-group">
						    <center><label for="">Upload Image</label><br>
						    	<input type="file" name="car_upd_img" id="car_upd_img" value="Upload Images" style="margin-left: 230px">
							</center>
						</div>
	      				<hr>
	      				<div class='form-group row' class='text-center'>
						  <div class='col-xs-2'style='margin-left: 80px'>
						    <label for='ex1'><b>Make</b></label>
						    <input class='form-control' name='make' id='make' type='text' value='<?php echo $row->make ?>'>
						  </div>
						  <div class='col-xs-3' style='margin-left: 10px'>
						    <label for='ex2'><b>Model</b></label>
						    <input class='form-control' name='model' id='model' type='text' value='<?php echo $row->model ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px' >
						    <label for='ex3'><b>Year</b></label>
						    <input class='form-control' name='year' id='year' type='text' value='<?php echo $row->year ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Price</b></label>
						    <input class='form-control' name='price' id='price' type='text' value='<?php echo $row->price ?>'>
						  </div><br>
						  <div class='col-s-4' style='margin-left: 80px'>
						    <label for='ex3'><b>Transmission</b></label><br>
						   	<select id='transmission' name='transmission' class='form-control' style='width:202px'>
						   		<option form-control name='transmission' id='transmission' <?php if($transmission == 'Manual'){echo 'selected';} ?> value='Manual'>Manual</option>
						   		<option  form-control name='transmission' id='transmission'<?php if($transmission == 'Automatic'){echo 'selected';} ?> value='Automatic'>Automatic</option>
						   	</select>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Seating Capacity</b></label>
						    <input class='form-control' name='seating_capacity' id='seating_capacity' type='text' value='<?php echo $row->seating_capacity ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Body Style</b></label>
						    <select id='body_style' name='body_style' class='form-control' style='width:202px'>
						   		<option form-control name='body_style' id='body_style' 	<?php if($row->body_style == 'Sedan'){echo 'selected';} ?> value='Sedan'>Sedan</option>
						   		<option  form-control name='body_style'	id='body_style' <?php if($row->body_style == 'Pick-up'){echo 'selected';} ?> value='Pick-up'>Pick-up</option>
						   		<option  form-control name='body_style'	id='body_style' <?php if($row->body_style == 'Coupe'){echo 'selected';} ?> value='Coupe'>Coupe</option>
						   		<option  form-control name='body_style'	id='body_style' <?php if($row->body_style == 'SUV'){echo 'selected';} ?> value='SUV'>SUV</option>
						   		<option  form-control name='body_style'	id='body_style' <?php if($row->body_style == 'Hatchback'){echo 'selected';} ?> value='Hatchback'>Hatchback</option>
						   		<option  form-control name='body_style'	id='body_style' <?php if($row->body_style == 'Van'){echo 'selected';} ?> value='Van'>Van</option>
						   		<option  form-control name='body_style'	id='body_style' <?php if($row->body_style == 'Minivan'){echo 'selected';} ?> value='Minivan'>Minivan</option>
						   	</select>

						  </div>
						    <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Mileage</b></label>
						    <input class='form-control' name='mileage' id='mileage' type='text' value='<?php echo $row->mileage ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 80px'>
						    <label for='ex3'><b>Color</b></label>
						    <input class='form-control' name='color' id='color' type='text' value='<?php echo $row->color ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Cylinder Engine</b></label>
						    <input class='form-control' name='cylinder_engine' id='cylinder_engine' type='text' value='<?php echo $row->cylinder_engine ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Door</b></label>
						    <input class='form-control' name='door' id='door' type='text' value='<?php echo $row->door ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Drive Type</b></label>
						     <select id='drive_type' name='drive_type' class='form-control' style='width:202px'>
						   		<option form-control name='drive_type' id='drive_type' <?php if($row->drive_type == '4WD'){echo 'selected';} ?> value='4WD'>4WD</option>
						   		<option  form-control name='drive_type'	id='drive_type' <?php if($row->drive_type == 'AWD'){echo 'selected';} ?> value='AWD'>AWD</option>
						   		<option  form-control name='drive_type'	id='drive_type' <?php if($row->drive_type == 'FWD'){echo 'selected';} ?> value='FWD'>FWD</option>
						   		<option  form-control name='drive_type'	id='drive_type' <?php if($row->drive_type == 'RWD'){echo 'selected';} ?> value='RWD'>RWD</option>
						   	</select>
						  </div>
						  <div class='col-xs-4' style='margin-left: 80px'>
						    <label for='ex3'><b>Fuel Type</b></label>
						    <select id='fuel_type' name='fuel_type' class='form-control' style='width:202px'>
						   		<option form-control name='fuel_type' id='fuel_type' <?php if($row->fuel_type == 'Gasoline'){echo 'selected';} ?> value='Gasoline'>Gasoline</option>
						   		<option  form-control name='fuel_type' id='fuel_type' <?php if($row->fuel_type == 'Diesel'){echo 'selected';} ?> value='Diesel' value='Diesel'>Diesel</option>
						   		<option  form-control name='fuel_type' id='fuel_type' <?php if($row->fuel_type == 'Bio-diesel'){echo 'selected';} ?> value='Bio-diesel'	 value='diesel'>Bio-diesel</option>
						   		<option  form-control name='fuel_type' id='fuel_type' <?php if($row->fuel_type == 'LPG'){echo 'selected';} ?> value='LPG' value='LPG'>LPG</option>
						   		<option  form-control name='fuel_type' id='fuel_type' <?php if($row->fuel_type == 'Ethanol'){echo 'selected';} ?> value='Ethanol' value='Ethanol'>Ethanol</option>
						   	</select>
						  </div>
						   <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Description</b></label>
						    <textarea type='text' name='description'  id='description'  class='form-control' rows='1' cols='20'><?php echo $row->description ?></textarea>
						  </div>
						   <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Reason for Selling</b></label>
						    <textarea type='text' name='rfs'  id='rfs'  class='form-control' rows='1' cols='20'><?php echo $row->rfs ?></textarea>
						  </div>
						</div>
      				</form>
				<?php			
				}
				

			}
			
		}
		public function update_history(){
			if(isset($_POST['id'])){
					$this->History_model->update_history($_POST['id']);
			}
												
		}	
		public function delete_history(){
			if(isset($_POST['id'])){
				$this->History_model->delete_history($_POST['id']);
			}
		}
		public function history_parts_page(){
			$data['display_parts_history'] = $this->History_model->display_parts_history();
			$this->load->view('templates/header');
			$this->load->view('users/parts_history',$data);
			$this->load->view('templates/footer');
		}
		public function parts_view_history(){
			if(isset($_POST['id'])){
				$parts_view_history = $this->History_model->parts_view_history($_POST['id']);
				$output = ""; 	
				foreach ($parts_view_history->result() as $row) {
					 $new_price = $row->price;
						 $new_price1 = number_format($new_price);
			        	
					?>
					<form action='#' method='POST' id='save_changes_form'>
	      				 <img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $row->post_image ?>" style='width: 70px' alt="" >
	      				<hr>
	      				<div class='form-group row' class='text-center'>
						  <div class='col-xs-2'style='margin-left: 80px'>
						   	<label for='ex2'><b>Category</b></label>
						    <select id='category' name='category' class='form-control' style='width:202px'>
						   		<option form-control name='category' id='category' <?php if($row->category == 'Transmission'){echo 'selected';} ?> value='Transmission'>Transmission</option>
						   		<option  form-control name='category' id='category' <?php if($row->category == 'Wheels'){echo 'selected';} ?> value='Wheels'>Wheels</option>
						   		<option  form-control name='category' id='category' <?php if($row->category == 'Tires'){echo 'selected';} ?> value='Tires'>Tires</option>
						   		<option  form-control name='category' id='category' <?php if($row->category == 'Internal Accessories'){echo 'selected';} ?> value='Internal Accessories'>Internal Accessories</option>
						   		<option  form-control name='category' id='category' <?php if($row->category == 'External Accesories'){echo 'selected';} ?> value='External Accesories'>External Accesories</option>
						   		<option  form-control name='category' id='category' <?php if($row->category == 'Brakes'){echo 'selected';} ?> value='Brakes'>Brakes</option>
						   		<option  form-control name='category' id='category' <?php if($row->category == 'Engine'){echo 'selected';} ?> value='Engine'>Engine</option>
						   	</select>
						  </div>
						  <div class='col-xs-3' style='margin-left: 10px'>
						    <label for='ex2'><b>Brand</b></label>
						    <input class='form-control' name='brand' id='brand' type='text' value='<?php echo $row->brand ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px' >
						    <label for='ex3'><b>Model Name</b></label>
						    <input class='form-control' name='model_name' id='model_name' type='text' value='<?php echo $row->model_name ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Price</b></label>
						    <input class='form-control' name='price' id='price' type='text' value='<?php echo $row->price ?>'>
						  </div><br>
						  <div class='col-xs-4' style='margin-left: 80px'>
						    <label for='ex3'><b>Color</b></label>
						    <input class='form-control' name='color' id='color' type='text' value='<?php echo $row->color ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Quantity</b></label>
						    <input class='form-control' name='quantity' id='quantity' type='text' value='<?php echo $row->parts_quantity ?>'>
						  </div>
						  <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Description</b></label>
						    <textarea type='text' name='description'  id='description'  class='form-control' rows='1' cols='20'><?php echo $row->description ?></textarea>
						  </div>
						   <div class='col-xs-4' style='margin-left: 10px'>
						    <label for='ex3'><b>Reason for Selling</b></label>
						    <textarea type='text' name='rfs'  id='rfs'  class='form-control' rows='1' cols='20'><?php echo $row->rfs ?></textarea>
						  </div>
						   
						</div>
						 
      				</form>
					<?php
				}
				
			}
		}
		public function parts_update_history(){
			if(isset($_POST['id'])){
				$this->History_model->parts_update_history($_POST['id']);
			}
		}

		public function parts_delete_history(){
			if (isset($_POST['id'])) {
				$this->History_model->parts_delete_history($_POST['id']);
			}
		}
		

	}
 ?>
