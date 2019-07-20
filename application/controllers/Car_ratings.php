<?php

	class Car_ratings extends CI_Controller {
		public function createRating($car_id) {
			$slug = $this->input->post('slug');
			// Insert Insert Car Ratings to Car MODEL *************************************************************************************************************
			$data['car'] = $this->carslisting_model->get_cars($slug);
			$data['comments'] = $this->car_comment_model->get_comments($car_id);
			
			// Query to create car rating
			$this->car_rating_model->createRating($car_id);
			
			redirect('carslisting/' . $slug);
		}
	}
