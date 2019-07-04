<?php

	class Likedislike_model extends CI_Model {
		public function __construct() {
			
			$this->load->database();
    }

    public function updateDownVote($carId) {
      $sql = "UPDATE cars SET down_vote = down_vote+1 WHERE car_id =?";
      $this->db->query($sql, array($carId));

      return $this->db->affected_rows();
    }

    public function updateUpVote($carId) {
      $sql = "UPDATE cars SET up_vote = up_vote+1 WHERE car_id =?";
      $this->db->query($sql, array($carId));

      return $this->db->affected_rows();
    }
  }  