<?php
	class Chat extends CI_Controller {
		public function index() {
			$data['title'] = 'CCAP Chat Application';

        
          $this->load->view('templates/header');
          $this->load->view('chat/index', $data);
          $this->load->view('templates/footer');
        
			

		}

		public function fetch_admin() {
      
        $this->load->model("chat_model");
        $fetch_data = $this->chat_model->make_datatables();
        $data = array();
          foreach($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $row->fname;
            $sub_array[] = $row->lname;
            $sub_array[] = '<button type="button" name="start-accept" data-touserid="'.$row->user_id.'" data-tofname="'.$row->fname.'" class="btn btn-warning btn-xs start-chat">Start Chat</button>';

            $data[] = $sub_array;
          }

        $output = array(
          "draw"                =>     intval($_POST["draw"]),
          "recordsTotal"        =>     $this->chat_model->get_all_data(),
          "recordsFiltered"     =>     $this->chat_model->get_filtered_data(),
          "data"                =>     $data
        );
        echo json_encode($output);
    }

    public function fetch_user() {
      
      $this->load->model("chat1_model");
      $fetch_data = $this->chat1_model->make_datatables();
      $data = array();
        foreach($fetch_data as $row) {
          $sub_array = array();
          $sub_array[] = $row->fname;
          $sub_array[] = $row->lname;
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

    public function send_chat(){

      // $data = array(
      //   ':to_user_id'  => $_POST['to_user_id'],
      //   ':from_user_id'  => $_SESSION['user_id'],
      //   ':chat_message'  => $_POST['chat_message'],
      //   ':status'   => '1'
      //   );

        // $query = "
        // INSERT INTO chat_message 
        // (to_user_id, from_user_id, chat_message, message_status) 
        // VALUES (:to_user_id, :from_user_id, :chat_message, :status)
        // ";
        // $statement = $connect->prepare($query);
        if($this->session->userdata('admin') != 'admin'){
          $message = array('user_id' => $this->session->userdata('user_id'), 'chat_message' => $_POST['chat_message'], 'from_admin' => 1 );
          $result = $this->MessageModel->insert_message($message);
        }else{
          $message = array('user_id' => $_POST['user_id'], 'chat_message' => $_POST['chat_message'], 'from_admin' => 0 );
          $result = $this->MessageModel->insert_message($message);
        }

      }

        // if($result)
        // {
        //   // echo fetch_user_chat_history($this->session->userdata('user_id'), $_POST['to_user_id'], $connect);
        //   // echo fetch_chat($_POST['to_user_id']);

        // }else{
        //   echo "wrong move guyssess";
        // }

        public function fetch_chat(){
          // if ($this->session->userdata('user_type') == "admin") {
          // $from_user_id = $this->session->userdata('user_id');
          // $to_user_id = $_POST['to_user_id'];
          // }else{
          //   $from_user_id = $_POST['to_user_id'];
          //   $to_user_id = $this->session->userdata('user_id');
          // }
          // $messages = $this->MessageModel->get_users_messages($from_user_id, $to_user_id);
          // var_dump($messages);
          
        //   foreach($messages as $message){
        //     if($message->from_user_id == $from_user_id){
        //       echo "<div style='float:left;bakcground-color:lightblue'>";
        //       echo $message->chat_message;
        //       echo '<br>';
        //       echo $message->time_stamp;
        //       echo '<br>';
        //       echo "</div>";
        //     }else{
        //       echo "<div style='float:right'>";
        //       echo $message->chat_message;
        //       echo '<br>';
        //       echo $message->time_stamp;
        //       echo '<br>';
        //       echo "</div>";
        //     }
              
    
        //   }
        // }
    

    
    
    
    
    
    
    
    
    }
    }

    