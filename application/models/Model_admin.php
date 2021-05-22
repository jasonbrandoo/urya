<?php
class Model_admin extends CI_Model{
	public function login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('admin');
		if($result->num_rows() == 1){
			return $result->row(0)->id;
		} else {
			return FALSE;
		}
	}

	public function get_total(){
		$query = $this->db->get('news');
		return $query->num_rows();
	}

	public function get_total_categories(){
		$query = $this->db->get('categories');
		return $query->num_rows();
	}

	public function get_total_comments(){
		$query = $this->db->get('comments');
		return $query->num_rows();
	}

	public function get_total_users(){
		$query = $this->db->get('users');
		return $query->num_rows();
	}

	public function get_news($slug = FALSE){
		if ($slug === FALSE) {
			$this->db->order_by('news.id_news','DESC');
			$this->db->join('categories', 'categories.id = news.category_id');
			$query = $this->db->get('news');
			return $query->result_array();
		}
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	public function create_category(){
		$data = array(
			'name' => $this->input->post('name')
		);
		return $this->db->insert('categories', $data);
	}

	public function get_category(){
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	public function get_users(){
		$this->db->order_by('name');
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function delete_category($id){
		$this->db->where('id', $id);
		$this->db->delete('categories');
		return true;
	}

	public function get_comment(){
		$this->db->join('news', 'comments.post_id = news.id_news');
		$query = $this->db->get('comments');
		return $query->result_array();
	}

	public function delete_news($id){
		$this->db->where('id_news', $id);
		$this->db->delete('news');
		return true;
	}

	public function create_news($post_image){
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'),
			'category_id' => $this->input->post('category_id'),
			'user_id' => $this->session->userdata('admin_id'),
			'post_image' => $post_image
		);
		return $this->db->insert('news', $data);
	}

	public function delete_user($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
		return true;
	}

	public function delete_comment($id){
		$this->db->where('id', $id);
		$this->db->delete('comments');
		return true;
	}
}