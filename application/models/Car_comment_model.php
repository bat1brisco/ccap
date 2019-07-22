<?php

	class Car_comment_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		// Function for creating comment
		public function create_comment($car_id) {
			// data array for car_id, name, body to be inserted into database
			$data = array(
				'car_id' => $car_id,
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body')
			);

			// execute comment and return inserted data to be displayed on carslisting/view comments
			return $this->db->insert('car_comment', $data);
		}

		// Function for retrieving comments
		public function get_comments($car_id) {
			$query = $this->db->get_where('car_comment', array('car_id' => $car_id));

			//return comment data upon query execution
			return $query->result_array();
		}
	}
