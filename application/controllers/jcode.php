<?php 

class Jcode extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('jcode_model');
	}

	function isAdmin(){
		$adminList = array('Jcode', 'haichongfu2003', 'zhcpzyjtx');
		$username = $this->session->userdata('username');
		return in_array($username, $adminList);
	}


	function index() {
		$data["show_ticket"] = false;
		if ($this->session->userdata('is_logged_in') == true)
			$data["show_ticket"] = true;
		for ($i = 1;$i <= 6;++$i) {
			$data["num"]["$i"] = $this->jcode_model->getTicketNum($i);
				$data["ticket"]["$i"] = $this->jcode_model->getAllTicket($i);
		}

		$this->load->view('includes/header');
		$this->load->view('jcode/index', $data);
		$this->load->view('includes/footer');
	}

	function getTicket() {
		$type = $_GET['ticket_type'];
		if ($this->session->userdata('is_logged_in') != true) {
			echo '请先登录哦~';
			return;
		}
		if ($this->jcode_model->hasGet()) {
			echo '今日已经领过了一张了，明天再来吧~~~~';
			return;
		}	
		if ($this->jcode_model->noRemain($type)) {
			echo '该券已经没有了~每天0点会重新补充哦~现在先换一种看看试试吧~~~~';
			return;
		}
		$ticket_id = $this->jcode_model->getTicket($type);
		echo '成功领取咯！号码为'."$ticket_id".". 请带着它前往jCode哈~~";
		return;
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
