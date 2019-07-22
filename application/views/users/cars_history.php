

<div class="container">
	<h3>Cars Post History</h3>
	<hr>
	<div class="container" id="table-container1">
                          <div class="containe-fluid" id="table-container1">	
															                      	
								<table class="table table-striped table-hover" id="car_history" style="width: 100%" >
									<thead>
										<th style="border-bottom:2px solid black;background-color: #2A293E;color:white">Applicant Name</th>
										<th style="border-bottom:2px solid black;background-color: #2A293E;color:white">Image</th>
										<th style="border-bottom:2px solid black;background-color: #2A293E;color:white">Type of Car</th>
										<th style="border-bottom:2px solid black;background-color: #2A293E;color:white">Price</th>
										<th style="border-bottom:2px solid black;background-color: #2A293E;color:white">Date Posted</th>
										<th style="border-bottom:2px solid black;background-color: #2A293E;color:white">Status</th>
										<th  style="border-bottom:2px solid black;background-color: #2A293E;color:white"><center>Action</th>
										
									</thead>
									<tbody>
										<?php 
											if ($display_cars_history->num_rows() > 0 ) {
												foreach ($display_cars_history->result() as $row ) {
														$date = $row->date_posted;
														$new_date = date('F-d-Y h:i:s A',strtotime($date));
														 $new_price1 = $row->price;
														 $new_price2 = number_format($new_price1, 2);	
													?>

														<tr id="<?php echo $row->car_id ?>">
															<td><?php echo $row->fname . " "  . $row->lname ?></td>
															<td><img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $row->post_image ?>" style='width: 70px' alt="" ></td>
															<td><?php echo $row->model."<br>"."<b>". $row->make."<b>" ?></td>
															<td><span>&#8369;</span><?php echo $new_price2 ?></td>
															<td><?php echo $new_date ?></td>
															<td><?php echo $row->status ?></td>
															<td data-target="updated_history" width="25%">
																<center>
																	<a href="#" data-role = "view_history_button" data-id = "<?php echo $row->car_id ?>"><button class="btn btn-info "><i class="fas fa-edit" style="margin-right: 3px"></i>View</button></a>
																	<a href="#" data-role = "delete_history_button" data-id = "<?php echo $row->car_id ?>"><button class="btn btn-info "><i class="fas fa-times" style="margin-right: 3px"></i>Cancel</button></a>
																</center>
															</td>
														</tr>
													<?php
												}
											}
										 ?>
									</tbody>
									<tfoot>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white">Applicant Name</th>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white">Image</th>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white">Type of Car</th>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white">Maker</th>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white">Date Posted</th>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white">Status</th>
										<th style="border-top:2px solid black;background-color: #2A293E;color:white"><center>Action</th>
										
									</tfoot>
								</table>							                      	
													                    
						</div>
</div>
 

<!-- View Cars History Modal -->
<div class="modal fade view_history_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye" style="margin-right: 5px;color:#2A293E" ></i>View Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="view_history"></div>
      <div class="modal-footer">
      	<input type='hidden' id='save_id' name='save_id' class='form-control'>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="save_changes_btn" name="save_changes_btn">Save changes</button>
      </div>
    </div>
  </div>
</div>
