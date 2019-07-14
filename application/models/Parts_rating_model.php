<?php

	class Parts_rating_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function createRating($parts_id) {
			$data = array(
				'parts_id' => $parts_id,
				'user_id' => $this->session->userdata('user_id'),
				'parts_rating' => $this->input->post('rating')
			);

			return $this->db->insert('parts_ratings', $data);
		}

		public function get_rating($parts_id) {
			$this->db->select('ROUND(AVG(parts_rating),1) as averageRating');
			$this->db->from('parts_ratings');
			$this->db->where('parts_id', $parts_id);
			$ratingquery = $this->db->get();
	       	
	    $postResult = $ratingquery->result_array();

	    $rating = $postResult[0]['averageRating'];
	       	
	    	if($rating == ''){
	       	$rating = 0;
	    	}

       	return $rating;
		}

		public function has_rated($parts_id, $user_id) {
			$this->db->select('parts_id, user_id');
			$this->db->from('parts_ratings');
			$this->db->where('parts_id', $parts_id);
			$this->db->where('user_id', $user_id);

			$hasratedquery = $this->db->get();

				if ($hasratedquery->num_rows() > 0) {
					return true;
				} else {
					return false;
				}
		}
	}
