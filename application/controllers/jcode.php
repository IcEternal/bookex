<?php 

class Jcode extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('jcode_model');
	}


	function isAdmin(){
		$adminList = array('JCode', 'haichongfu2003');
		$username = $this->session->userdata('username');
		return in_array($username, $adminList);
	}
	function admin(){
		if (!$this->isAdmin()) {
			echo '该账号不是JCode指定的账号。';
			return;
		}
		$this->load->view('includes/header');
		$this->load->view('jcode/admin');
		$this->load->view('includes/footer');
	}

	function getTicketInfo(){
		if (!$this->isAdmin()) {
			echo '该账号不是JCode指定的账号。';
			return;
		}
		$this->load->model('jcode_model');
		$ticket_id = $this->input->get('ticket_id');
		$result = $this->jcode_model->getTicketInfo($ticket_id);
		if ($this->input->get('use') == 1) {
			$this->jcode_model->useTicket($ticket_id);
			$result = $this->jcode_model->getTicketInfo($ticket_id);
		}
		if ($result->num_rows() == 0) {$data = null; $valid = false;}
		else {
			$res = $result->result();
			$data = $res[0];
			$valid = true;
		}
		$this->load->view('includes/header');
		$this->load->view('jcode/ticket_info', array('data' => $data, 'valid' => $valid));
		$this->load->view('includes/footer');
	}
}
