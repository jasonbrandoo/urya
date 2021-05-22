<?php
class Controller_news extends CI_Controller{
	/*INDEX FUNCTION*/
	public function index(){
		$data['title'] = 'Recent News';

		/*PAGINATION NEWS CONFIG*/
		$config['base_url'] = base_url('news/');
		$config['total_rows'] = $this->model_news->fetch_news();
		$config['per_page'] = 2;
		$config["uri_segment"] = 2;

		/*INITIALIZE PAGINATION*/
		$this->pagination->initialize($config);
		$page = $this->uri->segment(2);
		$data["results"] = $this->model_news->get_news($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		
		$this->load->view('templates/header');
		$this->load->view('templates/banner');
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer');
	}

	/*VIEW NEWS FUNCTION*/
	public function view($slug){
		$data['news_item'] = $this->model_news->view_news($slug);
		$news_id = $data['news_item']['id_news'];
		$data['comments'] = $this->model_comment->get_comment($news_id);

		if (empty($data['news_item'])) {
				# code...
			show_404();
		}

		/*GETTING COMMENT*/
		$data['title'] = $data['news_item']['title'];
		/*---------------*/

		$this->load->view('templates/header');
		$this->load->view('news/view',$data);
		$this->load->view('templates/footer');
	}

	/*CREATING NEWS FUNCTION*/
	public function create(){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}

		$data['title'] = 'Create Post';
		$data['categories'] = $this->model_news->get_categories();
		$username = $this->session->userdata('username');
		$data['user'] = $this->model_user->profile($username);

		/*GETTING USER ID*/
		$user_id = $data['user']['id'];
		/*---------------*/

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Body', 'required');

		/*UPLOAD PICTURES*/
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('news/create',$data);
			$this->load->view('templates/footer');
		} else {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '5048';
			$config['max_width'] = '0';
			$config['max_height'] = '0';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
				$errors = array('error' => $this->upload->display_errors());
				$post_image = 'mosh.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data('userfile'));
				$post_image = $_FILES['userfile']['name'];
			}

			$this->model_news->create_news($post_image);
			$this->model_user->total_post($user_id);
			$this->session->set_flashdata('news_created', 'Your news has been created');
			redirect('news');
		}
	}

	/*DELETE NEWS FUNCTION*/
	public function delete($id){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}

		$this->model_news->delete_news($id);
		$this->session->set_flashdata('news_deleted', 'Your news has been deleted');
		redirect('news');
	}

	/*EDIT NEWS FUNCTION*/
	public function edit($slug){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}

		$data['news_item'] = $this->model_news->view_news($slug);

		if($this->session->userdata('user_id') != $this->model_news->view_news($slug)['user_id']){
			redirect('news');
		}

		$data['categories'] = $this->model_news->get_categories();

		if (empty($data['news_item'])) {
				# code...
			show_404();
		}

		$data['title'] = 'Edit News';

		$this->load->view('templates/header');
		$this->load->view('news/edit',$data);
		$this->load->view('templates/footer');	
	}

	/*UPDATE NEWS FUNCTION*/
	public function update(){
		if(!$this->session->userdata('log_in')){
			redirect('users/login');
		}
		$this->model_news->update_news();
		$this->session->set_flashdata('news_updated', 'Your news has been updated');
		redirect('news');
	}
}