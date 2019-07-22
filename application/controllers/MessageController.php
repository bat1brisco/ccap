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
		// INSERT MESSAGE TO DB
		function insert_message(){
			if($this->session->userdata('admin') == 'admin'){
				$message = array('from_user_id' => $this->session->userdata('user_id'), 'to_user_id' => 1, 'chat_message' => 'This is a test insert', 'from_admin' => 1 );
			}else{
				$message = array('from_user_id' => 1, 'to_user_id' => 1, 'chat_message' => 'This is a test insert', 'from_admin' => 1 );
			}
			$result = $this->MessageModel->insert_message($message);
			return $result;
		}
		// TestTest
		// New Message Controller for Kuha'g Messages
		function leave_message(){
			$message = $this->MessageModel->get_users_messages($this->session->userdata('user_id'));

			$this->load->view('templates/header');
			$this->load->view('message/index', array('messages' => $message));
			$this->load->view('templates/partsfooter');
		}
		function leave_message_admin($id){

			$message = $this->MessageModel->get_users_messages(intval($id));
			// var_dump($message);
			$this->load->view('templates/header');
			$this->load->view('message_admin/index', array('messages' => $message));
			$this->load->view('templates/partsfooter');
		}
		function update_message(){

			$result = $this->MessageModel->update_message();

			return $result;
		}
	}