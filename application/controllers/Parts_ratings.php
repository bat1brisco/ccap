<?php

	class Parts_ratings extends CI_Controller {
		public function createRating($parts_id) {
			$slug = $this->input->post('slug');
			// Insert Insert Car Ratings to Car MODEL *************************************************************************************************************
			$data['part'] = $this->partslisting_model->get_parts($slug);
			$data['comments'] = $this->parts_comment_model->get_comments($parts_id);
			
			$this->parts_rating_model->createRating($parts_id);
			// $this->form_validation->set_rules('name', 'Name', 'required');
			// $this->form_validation->set_rules('email', 'Email', 'required');
			//$this->form_validation->set_rules('email', 'Email', 'valid_email');
			// $this->form_validation->set_rules('body', 'Body', 'required');	
			redirect('partslisting/' . $slug);
		}
	}
