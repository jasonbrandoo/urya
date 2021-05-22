<?php
class Model_user extends CI_Model{

	/*INSERT USER TO USERS DB*/
	public function register($enc_password){
		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $enc_password,
		);
		return $this->db->insert('users', $data);
	}

	/*SELECT USER FROM USERS DB*/
	public function login($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('users');

		if($result->num_rows() == 1){
			return $result->row(0)->id;
		} else {
			return FALSE;
		}
	}

	/*CHECK IF USERNAME EXISTS*/
	public function check_username_exists($username){
		$query = $this->db->get_where('users', array('username' => $username));

		if(empty($query->row_array())){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*CHECK IF EMAIL EXISTS*/
	public function check_email_exists($email){
		$query = $this->db->get_where('users', array('email' => $email));

		if(empty($query->row_array())){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*SELECT USER INFORMATION FROM USERS DB*/
	public function profile($username){
		$query = $this->db->get_where('users', array('username' => $username));
		return $query->row_array();
	}

	/*INSERT MESSAGES TO MESSAGES DB*/
	public function messages($username){
		$data = array(
			'reciever_id' => $username,
			'sender_id' => $this->input->post('sender'),
			'body' => $this->input->post('text')
		);
		return $this->db->insert('messages', $data);
	}

	/*GET MESSAGES FROM MESSAGES DB*/
	public function get_messages($username){
		$this->db->order_by('id_message', 'DESC');
		$query = $this->db->get_where('messages', array('reciever_id' => $username));
		return $query->result_array();
	}

	/*INSERT PICTURE TO USERS DB*/
	public function upload($post_image){
		$data = array(
			'profile_picture' => $post_image
		);
		$this->db->where('id', $this->session->userdata('user_id'));
		return $this->db->update('users', $data);
	}

	/*GET TOTAL POST FROM USERS DB*/
	public function total_post($user_id){
		$this->db->set('total_post', 'total_post+1', FALSE);
		$this->db->where('id', $user_id);
		return $this->db->update('users');
	}

	/*UPDATE USER INFORMATION*/
	public function update_profile(){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'location' => $this->input->post('location'),
			'phone' => $this->input->post('phone'),
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter')
		);

		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('users', $data);
	}
}