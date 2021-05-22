<?php
class Controller_user extends CI_Controller{

	/*REGISTER USER*/
	public function register(){
		$data['title'] = 'Sign Up';
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|callback_check_email_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		} else {
			$enc_password = md5($this->input->post('password'));
			$this->model_user->register($enc_password);
			$this->session->set_flashdata('user_registered', 'You are now registered and can log in');
			redirect('news');
		}
	}

	/*LOGIN FUNCTION*/
	public function login(){
		$data['title'] = 'Sign In';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$user_id = $this->model_user->login($username, $password);

			if($user_id){
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'log_in' => TRUE
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('user_loggedin', 'You are now logged in as ');
				redirect('news');
			} else {	
				$this->session->set_flashdata('login_failed', 'Invalid login');
				redirect('users/login');
			}
		}
	}

	/*DESTEROY USER SESSION*/
	public function logout(){
		$this->session->unset_userdata('log_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('user_loggedout', 'You are now logged out');
		redirect('news');
	}

	/*CHECK USERNAME*/
	public function check_username_exists($username){
		$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
		if($this->model_user->check_username_exists($username)){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*CHECK EMAIL*/
	public function check_email_exists($email){
		$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
		if($this->model_user->check_email_exists($email)){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*GET USER INFORMATION*/
	public function profile($username){
		$data['get_messages'] = $this->model_user->get_messages($username);
		$data['user'] = $this->model_user->profile($username);

		$this->load->view('templates/header');
		$this->load->view('users/profile', $data);
		$this->load->view('templates/footer');
	}

	/*MESSAGES FUNCTION*/
	public function messages($username){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}
		$data['messages'] = $this->model_user->messages($username);

		redirect('users/profile/'.$username);
	}

	/*UPLOAD FUNCTION*/
	public function upload(){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}

		$config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png|JPG';
		// $config['max_size'] = '50048';
		$config['max_width'] = '0';
		$config['max_height'] = '0';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			$errors = array('error' => $this->upload->display_errors());
			$post_image = 'noimage.jpg';
		} else {
			$data = array('upload_data' => $this->upload->data('userfile'));
			$post_image = $_FILES['userfile']['name'];
		}

		$this->model_user->upload($post_image);
		$this->session->set_flashdata('photo_uploaded', 'Your photo has been uploaded');
		redirect('users/profile/'.$this->session->userdata('username'));
	}

	/*EDIT USER INFORMATION*/
	public function edit($username){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}
		$data['user'] = $this->model_user->profile($username);
		if($this->session->userdata('username') != $this->model_user->profile($username)['username']){
			redirect('news');
		}

		$this->load->view('templates/header');
		$this->load->view('users/edit', $data);
		$this->load->view('templates/footer');
	}

	/*UPDATE FUNCTION*/
	public function update(){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}
		$this->model_user->update_profile();
		$this->session->set_flashdata('profile_updated', 'Your profile has been updated');
		redirect('users/profile/'.$this->session->userdata('username'));
	}
}