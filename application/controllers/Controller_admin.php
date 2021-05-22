<?php
class Controller_admin extends CI_Controller{
	public function login(){
		$data['title'] = 'Sign In';
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('admin/login', $data);
			// $this->load->view('templates/footer');
		} else {
			$name = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$admin_id = $this->model_admin->login($name, $password);
			
			if($admin_id){
				$admin_data = array(
					'admin_id' => $admin_id,
					'username' => $name,
					'admin' => TRUE
				);
				$this->session->set_userdata($admin_data);
				$this->session->set_flashdata('admin_loggedin', 'You are now logged in as ');
				redirect('admin');
			} else {	
				$this->session->set_flashdata('login_failed', 'Invalid login');
				redirect('admin/login');
				print_r($admin_id);
			}
		}
	}

	public function logout(){
		$this->session->unset_userdata('admin');
		$this->session->unset_userdata('admin_id');
		$this->session->unset_userdata('username');
		$this->session->set_flashdata('admin_loggedout', 'You are now logged out');
		redirect('news');
	}

	public function index(){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$data['news'] = $this->model_admin->get_total();
		$data['categories'] = $this->model_admin->get_total_categories();
		$data['comments'] = $this->model_admin->get_total_comments();
		$data['users'] = $this->model_admin->get_total_users();
		$data['get_category'] = $this->model_admin->get_category();
		$data['get_news'] = $this->model_admin->get_news();
		$data['get_comment'] = $this->model_admin->get_comment();
		$data['get_users'] = $this->model_admin->get_users();
		

		$this->load->view('admin/index', $data);
	}

	public function create (){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$this->form_validation->set_rules('name', 'Name', 'Required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin', $data);
		} else {
			$this->model_admin->create_category();
			$this->session->set_flashdata('category_created', 'Your category has been created');
			redirect('admin');
		}
	}

	public function delete($id){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$this->model_admin->delete_category($id);
		$this->session->set_flashdata('news_deleted', 'Your news has been deleted');
		redirect('admin');
	}

	public function delete_news($id){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$this->model_admin->delete_news($id);
		$this->session->set_flashdata('news_deleted', 'Your news has been deleted');
		redirect('admin');
	}

	public function create_news(){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Body', 'required');

		if ($this->form_validation->run() === FALSE) {
				# code...
			$this->load->view('admin/index', $data);
		} else {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2048';
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

			$this->model_admin->create_news($post_image);
			$this->session->set_flashdata('news_created', 'Your news has been created');
			redirect('admin');
		}
	}

	public function delete_user($id){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$this->model_admin->delete_user($id);
		$this->session->set_flashdata('user_deleted', 'One user has been deleted');
		redirect('admin');
	}

	public function delete_comment($id){
		if(!$this->session->userdata('admin')){
			redirect('admin/login');
		}

		$this->model_admin->delete_comment($id);
		$this->session->set_flashdata('user_deleted', 'One user has been deleted');
		redirect('admin');
	}
}