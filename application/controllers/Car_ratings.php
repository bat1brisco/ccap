<?php

	class Car_ratings extends CI_Controller {
		public function createRating($car_id) {
			$slug = $this->input->post('slug');
			// Insert Insert Car Ratings to Car MODEL *************************************************************************************************************
			$data['car'] = $this->carslisting_model->get_cars($slug);
			$data['comments'] = $this->car_comment_model->get_comments($car_id);

			// $this->form_validation->set_rules('name', 'Name', 'required');
			// $this->form_validation->set_rules('email', 'Email', 'required');
			//$this->form_validation->set_rules('email', 'Email', 'valid_email');
			// $this->form_validation->set_rules('body', 'Body', 'required');
			
				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('carslisting/view', $data);
					$this->load->view('templates/footer');
				} else {
					$this->car_rating_model->createRating($car_id);
					redirect('carslisting/' . $slug);
				}

		}
	}
