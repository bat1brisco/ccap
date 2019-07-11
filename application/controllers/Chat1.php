<?php
	class Chat1 extends CI_Controller {
		public function index() {
			$data['title'] = 'CCAP Chat Application';

        
          $this->load->view('templates/header');
          $this->load->view('chat1/index', $data);
          $this->load->view('templates/footer');
        
			

    }
    
    public function fetch_user() {
      
      $this->load->model("chat1_model");
      $fetch_data = $this->chat1_model->make_datatables();
      $data = array();
        foreach($fetch_data as $row) {
          $sub_array = array();
          $sub_array[] = $row->fname;
          $sub_array[] = $row->lname;
          $sub_array[] = '<button type="button" name="viewprofile" data-touserid="'.$row->user_id.'" data-tofname="'.$row->fname.'" class="btn btn-warning btn-xs start-chat">View Profile</button>';
          $sub_array[] = '<button type="button" name="start-accept" data-touserid="'.$row->user_id.'" data-tofname="'.$row->fname.'" class="btn btn-warning btn-xs start-chat">Start Chat</button>';

          $data[] = $sub_array;
        }

      $output = array(
        "draw"                =>     intval($_POST["draw"]),
        "recordsTotal"        =>     $this->chat1_model->get_all_data(),
        "recordsFiltered"     =>     $this->chat1_model->get_filtered_data(),
        "data"                =>     $data
      );
      echo json_encode($output);
    
    
  }

	}