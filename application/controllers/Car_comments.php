<?php

	class Car_comments extends CI_Controller {
		// Controller for creating comments, redirected from comment form on carslisting/view page
		public function create($car_id) {
			$slug = $this->input->post('slug');
			$data['car'] = $this->carslisting_model->get_cars($slug);
			// Query for getting comments
			$data['comments'] = $this->car_comment_model->get_comments($car_id);

			// Validation rule for comment
			$this->form_validation->set_rules('body', 'Body', 'required');

				// Check if comment validation is FALSE, if FALSE redirect to view
				if ($this->form_validation->run() === FALSE) {
					$this->load->view('templates/header');
					$this->load->view('carslisting/view', $data);
					$this->load->view('templates/footer');
				} else {
					// If comment validation is successful and no errors query for creating comment is executed
					$this->car_comment_model->create_comment($car_id);
					// Redirect to carslisting view page after query execution
					redirect('carslisting/' . $slug);
				}

		}
	}
