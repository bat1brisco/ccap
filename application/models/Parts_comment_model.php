<?php

	class Parts_comment_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		public function create_comment($parts_id) {
			$data = array(
				'parts_id' => $parts_id,
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body')
			);

			return $this->db->insert('parts_comment', $data);
		}

		public function get_comments($parts_id) {
			$query = $this->db->get_where('parts_comment', array('parts_id' => $parts_id));
			return $query->result_array();
		}
	}
