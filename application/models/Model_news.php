<?php
class Model_news extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	/*COUNT ALL NEWS FROM NEWS DB*/
	public function fetch_news(){
		return $this->db->count_all('news');
	}

	/*GET NEWS FROM NEWS DB AND JOIN IT WITH CATEGORIES DB*/
	public function get_news($config, $page){
		$this->db->order_by('news.id_news','DESC');
		$this->db->join('categories', 'categories.id = news.category_id');
		$this->db->limit($config, $page);
		$query = $this->db->get('news');

		if ($query->num_rows() > 0) {
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}

	/*GET NEWS ROW FROM NEWS DB*/
	public function view_news($slug){
		$this->db->join('users', 'users.id = news.user_id');
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}

	/*INSERT NEWS TO NEWS DB*/
	public function create_news($post_image){
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'),
			'category_id' => $this->input->post('category_id'),
			'user_id' => $this->session->userdata('user_id'),
			'post_image' => $post_image
		);
		return $this->db->insert('news', $data);
	}

	/*DELETE NEWS FROM NEWS DB*/
	public function delete_news($id){
		$this->db->where('id', $id);
		$this->db->delete('news');
		return true;
	}

	/*UPDATE NEWS FROM NEWS DB*/
	public function update_news(){
		$slug = url_title($this->input->post('title'));

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'),
			'category_id' => $this->input->post('category_id')
		);

		$this->db->where('id_news', $this->input->post('id'));
		return $this->db->update('news', $data);
	}

	/*GET CATEGORY FROM CATEGORIES DB*/
	public function get_categories(){
		$this->db->order_by('name');
		$query = $this->db->get('categories');
		return $query->result_array();
	}

	/*GET NEWS BY CATEGORY WHILE JOINING CATEGORIES AND NEWS DB*/
	public function get_news_by_category($category_id){
		$this->db->order_by('news.id_news','DESC');
		$this->db->join('categories', 'categories.id = news.category_id');
		$query = $this->db->get_where('news', array('category_id' => $category_id));
		return $query->result_array();
	}
}