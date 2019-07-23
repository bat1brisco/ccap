

<div class="container">
	<h2>Parts Post History</h2>
	<hr>
	<div class="container-fluid">
		<table class="table table-striped table-hover" id="parts_history" style="width: 100%" >
									<thead>
										<th style="border-bottom:2px solid black;background-color: #00ADEF;color:white">Applicant Name</th>
										<th style="border-bottom:2px solid black;background-color: #00ADEF;color:white">Image</th>
										<th style="border-bottom:2px solid black;background-color: #00ADEF;color:white">Type of Parts</th>
										<th style="border-bottom:2px solid black;background-color: #00ADEF;color:white">Price</th>
										<th style="border-bottom:2px solid black;background-color: #00ADEF;color:white">Date Posted</th>
										<th style="border-bottom:2px solid black;background-color: #00ADEF;color:white">Status</th>
										<th  style="border-bottom:2px solid black;background-color: #00ADEF;color:white"><center>Action</th>
										
									</thead>
									<tbody>
											<?php 
												if($display_parts_history->num_rows() > 0){
													foreach ($display_parts_history->result() as $row){
														$date = $row->date_posted;
														$new_date = date('F-d-Y h:i:s A',strtotime($date));
														$new_price1 = $row->price;
														$new_price2 = number_format($new_price1);	
														?>
															<tr>
																<td><?php echo $row->fname ." ". $row->lname ?></td>
																<td><img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $row->post_image ?>" style='width: 70px' alt="" ></td>
																<td><?php echo $row->brand."<br>"."<b>". $row->category."<b>" ?></td>
																<td><span>&#8369;</span><?php echo $new_price2 ?></td>
																<td><?php echo $new_date ?></td>
																<td><?php echo $row->status ?></td>
																<td>
																	<center>
																	<a href="#" data-role = "view_parts_history_btn" data-id = "<?php echo $row->parts_id ?>"><button class="btn btn-info "><i class="fas fa-edit" style="margin-right: 3px"></i>View</button></a>
																	<a href="#" data-role = "del_parts_history_btn" data-id = "<?php echo $row->parts_id ?>"><button class="btn btn-warning text-white "><i class="fas fa-times" style="margin-right: 3px"></i>Cancel</button></a>
																	</center>
																</td>
															</tr>
														<?php
													}
												}
											 ?>
									</tbody>
									<tfoot>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white">Applicant Name</th>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white">Image</th>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white">Type of Parts</th>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white">Price</th>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white">Date Posted</th>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white">Status</th>
										<th style="border-top:2px solid black;background-color: #00ADEF;color:white"><center>Action</th>
										
									</tfoot>
								</table>							                      	
		
	</div>
	
</div>
<!-- View Parts History Modal -->
<div class="modal fade parts_history_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-eye" style="margin-right: 5px;color:#2A293E" ></i>View Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="parts_view_history"></div>
      <div class="modal-footer">
      	<input type='hidden' id='parts_save_id' name='parts_save_id' class='form-control'>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"  id="parts_save_changes_btn" name="parts_save_changes_btn">Save changes</button>
      </div>
    </div>
  </div>
</div>