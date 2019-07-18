<?php
	class Chat1 extends CI_Controller {
		public function index() {
      $data['title'] = 'CCAP Chat Application';
      
      $users = $this->user_model->get_users();
        // foreach($users->result() as $user){
          
        //   // $user_data[] = $user->email;
        //   // $user_data[] = $user->user_id;
        //   // $user_data[] = $user->fname;
        //   // $user_data[] = $user->lname;
        //   // $user_data[] = $user->contact;
        // }
      $data['user_data'] = $users->result();
      // array_push($data['user_data'], $user_data);

      // var_dump($data);
      
      
      // var_dump($user->row(2));
      // $user = 


      
          $this->load->view('templates/header');
          $this->load->view('chat1/index', $data);
          $this->load->view('templates/footer');
    }
    
  //   public function fetch_user() {
  //     $this->load->model("chat1_model");
  //     $fetch_data = $this->chat1_model->make_datatables();
  //     $data = array();
  //       foreach($fetch_data as $row) {
  //         $sub_array = array();
  //         $sub_array[] = $row->fname . " " . $row->lname;
          
  //         $sub_array[] = '<button type="button" name="start-accept" data-touserid="'.$row->user_id.'" data-tofname="'.$row->fname.'" class="btn btn-warning btn-xs start-chat">Start Chat</button>';

  //         $data[] = $sub_array;
  //       }
        

  //     $output = array(
  //       "draw"                =>     intval($_POST["draw"]),
  //       "recordsTotal"        =>     $this->chat1_model->get_all_data(),
  //       "recordsFiltered"     =>     $this->chat1_model->get_filtered_data(),
  //       "data"                =>     $data
  //     );
  //     echo json_encode($output);
    
    
  // }

	}