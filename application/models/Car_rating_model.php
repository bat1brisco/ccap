<?php

	class Car_rating_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function createRating($car_id) {
			$data = array(
				'car_id' => $car_id,
				'user_id' => $this->session->userdata('user_id'),
				'car_rating' => $this->input->post('rating')
			);

			return $this->db->insert('car_ratings', $data);
		}

		public function get_rating($car_id) {
			$this->db->select('ROUND(AVG(car_rating),1) as averageRating');
			$this->db->from('car_ratings');
			$this->db->where('car_id', $car_id);
			$ratingquery = $this->db->get();
	       	
	    $postResult = $ratingquery->result_array();

		$rating = $postResult[0]['averageRating'];
		
		$this->db->where('car_id', $car_id);
		$this->db->from('car_ratings');		
		$rates = $this->db->count_all_results();
		
		if($rates > 5 ){
			if($rating == ''){
				$rating = 0;
			 }
 
		}
	    	
       	return $rating;
		}

		public function has_rated($car_id, $user_id) {
			$this->db->select('car_id, user_id');
			$this->db->from('car_ratings');
			$this->db->where('car_id', $car_id);
			$this->db->where('user_id', $user_id);

			$hasratedquery = $this->db->get();

				if ($hasratedquery->num_rows() > 0) {
					return true;
				} else {
					return false;
				}
		}
	}
