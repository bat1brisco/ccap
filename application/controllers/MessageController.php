<?php 

	/**
	 * 
	 */
	class MessageController extends CI_Controller
	{
		
		public function index(){

			$this->load->view('templates/header');
			$this->load->view('message/index');
			$this->load->view('templates/partsfooter');
		}
		function get_message($id){
			$message = $this->MessageModel->get_messages($id);
			
			
			
			return $message;
		}

		function insert_message(){
			if($this->session->userdata('admin') == 'admin'){
				$message = array('from_user_id' => 1, 'to_user_id' => 1, 'chat_message' => 'This is a test insert', 'from_admin' => 1 );

			}else{
				$message = array('from_user_id' => 1, 'to_user_id' => 1, 'chat_message' => 'This is a test insert', 'from_admin' => 1 );

			}

			$result = $this->MessageModel->insert_message($message);
			
			return $result;
		}

		function leave_message(){
			$message = $this->MessageModel->get_users_messages(4);


			$this->load->view('templates/header');
			$this->load->view('message/index', array('messages' => $message));
			$this->load->view('templates/partsfooter');
		}
		function update_message(){

			$result = $this->MessageModel->update_message();

			return $result;
		}
	}