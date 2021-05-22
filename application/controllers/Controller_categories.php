<?php
class Controller_categories extends CI_Controller{
	public function index(){
		$data['title'] = 'Category';

		$data['categories'] = $this->model_category->get_categories();

		$this->load->view('templates/header');
		$this->load->view('categories/index', $data);
		$this->load->view('templates/footer');

	}

	// public function create (){
	// 	if(!$this->session->userdata('log_in')){
	// 		redirect('users/login');
	// 	}
	// 	$data['title'] = 'Create Category';

	// 	$this->form_validation->set_rules('name', 'Name', 'Required');

	// 	if ($this->form_validation->run() === FALSE) {
	// 		$this->load->view('templates/header');
	// 		$this->load->view('categories/create', $data);
	// 		$this->load->view('templates/footer');
	// 	} else {
	// 		$this->model_category->create_category();
	// 		$this->session->set_flashdata('category_created', 'Your category has been created');
	// 		redirect('categories');
	// 	}
	// }
	
	public function posts($id){
		$data['title'] = $this->model_category->get_category($id)->name;

		$data['results'] = $this->model_news->get_news_by_category($id);

		$this->load->view('templates/header');
		$this->load->view('categories/sort', $data);
		$this->load->view('templates/footer');

	}
}