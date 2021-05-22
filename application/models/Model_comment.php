<?php 
class Model_comment extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function create_comment($news_id){
		$data = array(
			'post_id' => $news_id,
			'username' => $this->input->post('name'),
			// 'email' => $this->input->post('email'),
			'body' => $this->input->post('text')
		);
		return $this->db->insert('comments', $data);
	}
	public function get_comment($news_id){
		$query = $this->db->get_where('comments', array('post_id' => $news_id));
		return $query->result_array();
	}
}