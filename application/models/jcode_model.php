<?php

class Jcode_model extends CI_Model {

	var $maxDiscountTicketNum = 10;
	var $maxFreeTicketNum = 1;

	function __construct() {
		parent::__construct();
	}

	function getEightAm() {
		$res = $this->db->query('SELECT now() as time')->result();
		$time = substr($res[0]->time, 0, 11);
		return $time."08:00:00";
	}

	function getTicketInfo($ticket_id){
		$result = $this->db->select('*')->from('jcode_ticket')->where('ticket_id', $ticket_id)->get();
		return $result;
	}

	function useTicket($ticket_id){
		$this->db->query("UPDATE jcode_ticket SET used_time = now() WHERE ticket_id = \"$ticket_id\"");
	}

	function getTicketNum($type) {
		$time = $this->getEightAm();
		$res = $this->db->query("SELECT COUNT(*) AS num FROM jcode_ticket WHERE activated_time >= '$time' AND type = $type")->result();
		if ($type <= 3) 
			$x = $this->maxDiscountTicketNum;
		else 
			$x = $this->maxFreeTicketNum;
		return $x - $res[0]->num;
	}

	function getAllTicket($type) {
		$username = $this->session->userdata('username');
		$res = $this->db->query("SELECT * from jcode_ticket WHERE activated_time >= 0 AND used_time = 0
		 AND username = '$username' AND type = $type")->result();
		return $res;
	}

	function hasGet() {
		$time = $this->getEightAm();
		$username = $this->session->userdata('username');
		$row_num = $this->db->query("SELECT * from jcode_ticket WHERE activated_time >= '$time' AND username = '$username'")->num_rows();
		return ($row_num > 0);
	}

	function noRemain($type) {
		return ($this->getTicketNum($type) <= 0);
	}

	function getTicket($type) {
		$res = $this->db->query("SELECT id, ticket_id FROM jcode_ticket WHERE activated_time = 0 AND type = $type")->result();
		$id = $res[0]->id;
		$username = $this->session->userdata('username');
		$this->db->query("UPDATE jcode_ticket SET activated_time = now() WHERE id = $id");
		$this->db->query("UPDATE jcode_ticket SET username = '$username' WHERE id = $id");
		return $res[0]->ticket_id;
	}

}
