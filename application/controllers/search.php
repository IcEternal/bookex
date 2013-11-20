<?php 
	class Search extends CI_Controller {
		
		function hasIllegal($key) {
			if (strpos($key, '"') !== false) return true;
			if (strpos($key, '\\') !== false) return true;
			if (strpos($key, ";") !== false) return true;
			return false;
		}

		function index(){
			$this->load->library('form_validation');
			$this->load->model('search_model');

			$page = 1;$key = '';
			if (array_key_exists('page', $_GET)) $page = $_GET['page'];
			if (array_key_exists('key', $_GET)) $key = $_GET['key'];
			if ($this->hasIllegal($key)) {
				echo('请不要输入可能影响到数据库的字符');
				return;
			}
			$data = $this->search_model->getResult();
			$data['data']['title'] = '搜索结果';
			$this->load->view('search_result', $data);
		}

	}
