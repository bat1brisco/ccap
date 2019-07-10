<?php

	/**
	 * 
	 */
	class MessageModel extends CI_Model
	{
		function get_messages($id){
			
			$result = $this->db->get_where('messages', array('message_id' => $id));
	    	
	    	return $result->result();
		}
		function get_users_messages($user_id){

			$result = $this->db->order_by('time_stamp', 'ASC')->get_where('messages', array('user_id' => $user_id));
			
			// var_dump($result);
			return $result->result();
			// return "Hi Roel";
		}

		function insert_message($chat_info){
			$result = $this->db->insert('messages', $chat_info);
			return $result;
		}

		function update_message(){
			
		}
	}