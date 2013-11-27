<?php

class Service_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function is_service_exist($book_id) {
		$this->db->where('id', $book_id);
		$query = $this->db->get('service');
		return $query->num_rows;
	}

	function get_service_infomation($book_id) {
		$this->db->where('id', $book_id);
		$query = $this->db->get('service')->result();
		return $query[0];
	}

	function getSubscribed($book_id, $username = "") {
		$this->load->model('user_model');
		if ($username == "") $username = $this->session->userdata('username');
		$id = $this->user_model->getUserIDByUsername($username);
		$this->db->where('service_id', $book_id);
		$this->db->where('buyer_id', $id);
		$this->db->where('finishtime', 0);
		$query = $this->db->get('service_trade');
		if ($query->num_rows() == 0) {
			return false;
		}
		return true;
	}

	function serviceCancel($book_id, $username = "") {
		$this->load->model('user_model');
		if ($username == "") $username = $this->session->userdata('username');
		$id = $this->user_model->getUserIDByUsername($username);
		$this->db->where('service_id', $book_id);
		$this->db->where('buyer_id', $id);
		$this->db->where('finishtime', 0);
		$query = $this->db->get('service_trade')->result();
		$id = $query[0]->id;
		$this->db->query("UPDATE service_trade set finishtime = now() WHERE id = $id");
		$this->db->query("UPDATE service set remain = remain + 1 WHERE id = $book_id");		
	}

	function update_subscriber($book_id, $new_sub) {
		$result = $this->db->select('*')->from("book")->where('id', $book_id)->get()->result();
		$old_sub = $result[0]->subscriber;
		if ($result[0]->discounted == 1 || $result[0]->freed == 1){
			$this->db->query("UPDATE user SET used_ticket = used_ticket - 1 WHERE username = \"$old_sub\";");
		}
		$arr = array(
			'subscriber' => $new_sub
		);
		if ($new_sub == 'N') {
			$arr['use_phone'] = false;
			$arr['discounted'] = 0;
			$arr['freed'] = 0;
		}
		$this->db->where('id', $book_id);
		$this->db->update('book', $arr);
		$this->db->query("UPDATE book SET subscribetime = now(), status = 0 WHERE id = \"$book_id\"");

		//delivery system
		/*
		$this->load->model('delivery_model','delivery');
		if($new_sub == 'N')
		{
			$query_submit = $this->db->query("SELECT * FROM delegation_list 
				WHERE book_id = $book_id ORDER BY create_time DESC");
			$row = $query_submit->first_row();
			$submit_id = $row->id;
			$this->delivery->user_cancel($submit_id);
		}
		else
		{
			$book_query = $this->db->query("SELECT * FROM book WHERE id = $book_id");
			$row = $book_query->first_row();
			$uploader = $row->uploader;
			$seller_id = $this->delivery->get_userid_from_username($uploader);
			$buyer_id = $this->delivery->get_userid_from_username($new_sub);
			$this->delivery->create_submit($buyer_id,$seller_id,$book_id);
		}
		*/
	}

	function use_phone($book_id) {
		$this->db->where('id', $book_id);
		$arr = array(
			'use_phone' => true
		);
		$this->db->update('book', $arr);

		//delivery system
		//use phone mean the delegation is canceled
		/*
		$this->load->model('delivery_model','delivery');
		$query_submit = $this->db->query("SELECT * FROM delegation_list 
				WHERE book_id = $book_id ORDER BY create_time DESC");
		$row = $query_submit->first_row();
		$submit_id = $row->id;
		$this->delivery->user_cancel($submit_id);
		*/
	}

	function add_service() {
		$new_service_insert_data = array(
			'name' => htmlspecialchars($this->input->post('bookname', true)),
			'price' => htmlspecialchars($this->input->post('price', true)),
			'remain' => htmlspecialchars($this->input->post('remain', true)),
			'description' => nl2br(htmlspecialchars($this->input->post('description'), true)),
			'uploader' => htmlspecialchars($this->input->post('uploader'), true),
			'hasimg' => false,
			'class' => htmlspecialchars($this->input->post('class'), true),
			'show_phone' => true
		);

		if ($_FILES['userfile']['error'] == 0) {
			$userfile_data = $_FILES['userfile']['tmp_name'];
			$data = fread(fopen($userfile_data, "r"), filesize($userfile_data));

			$new_book_insert_data['img'] = $data;
			$new_book_insert_data['hasimg'] = true;
		}

		$flag = $this->db->insert('service', $new_service_insert_data); 
		if ($flag) 
			return mysql_insert_id();
		else 
			return 0;
	}

	function get_book($id) {
		$this->db->where('id', $id);
		$query = $this->db->get('book')->result();

		return $query[0];
	}

	function update($id, $arr) {
		$this->db->where('id', $id);
		$this->db->update('book', $arr);
	}

	function book_delete($id) {
		$this->db->where('id', $id)->where('subscriber', 'N');
		$this->db->query("UPDATE book SET deltime = now() WHERE (id = \"$id\" and subscriber=\"N\")");
		$arr = array('del' => true);
		return $this->db->update('book', $arr);
	}

	function book_finish($id) {
		return $this->db->query("UPDATE book SET finishtime = now() WHERE id = \"$id\"");
	}

}
