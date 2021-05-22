<?php
class Controller_comments extends CI_Controller{
	public function create($news_id){
		$slug = $this->input->post('slug');
		$data['news_item'] = $this->model_news->get_news($slug);
		$data['title'] = $data['news_item']['title'];
		$data['comments'] = $this->model_comment->get_comment($news_id);
		$this->form_validation->set_rules('name', 'Name', 'required');
		// $this->form_validation->set_rules('email', 'Email', 'valid_email');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header');
			$this->load->view('news/view', $data);
			$this->load->view('templates/footer');
		} else {
			$this->model_comment->create_comment($news_id);
			redirect('news/'.$slug);
		}
	}
}