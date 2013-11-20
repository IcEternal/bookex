<?php

class Jcode_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function getTicketInfo($ticket_id){
		$result = $this->db->select('*')->from('jcode_ticket')->where('ticket_id', $ticket_id)->get();
		return $result;
	}

	function useTicket($ticket_id){
		$this->db->query("UPDATE jcode_ticket SET used_time = now() WHERE ticket_id = \"$ticket_id\"");
	}


}
