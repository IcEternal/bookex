<?php 

class Test extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->auth->super_admin();
		$this->load->helper(array('form', 'url'));
	}

	function index() {
		$this->db->where('finishtime > 0 AND finishtime < "2013-9-15 22:00:00" AND subscriber != "N"');
		$arr = $this->db->get('book')->result();
		$tot = 0;
		$save = 0;
		$num = 0;
		foreach ($arr as $row) {
			$tot += $row->price;
			$save += $row->originprice - $row->price;
			$num++;
		}
		echo "total saved:  ".$save."!!<br/>";
		echo "total sold:  ".$tot."!!<br/>";
		echo "total sold:  ".$num."books!";
	}
	
	function initial_ticket() {
		$arr = array();
		$max = 2000000000;
		//generate_ticket
		for ($type = 1; $type <= 6;$type++) {
			for ($i = 0;$i < 1000;$i++) {
				$x = rand(0, $max);
				while (isset($arr["$x"])) {
					$x = rand(0, $max);
				}
				$arr["$x"] = true;
				$str = (string)dechex($x);
				$data = array(
					'ticket_id' => $str,
					'type' => $type
					);
				$this->db->insert('jcode_ticket', $data);
			}
		}
	}
	

	private $title = "博 · 易BookEx抵价券来啦~";
	private $title1 = "博 · 易BookEx免费兑书券来啦~";
	private $content = "同学你好！这是你的抵价券密码~请妥善保存~<br/>";
	private $content1 = "同学你好！这是你获得的免费兑书码~请妥善保存~<br/>";
	private $content2 = "<br/>详细的活动规则请<a href='http://acm.sjtu.edu.cn/bookex/index.php/welcome/act_detail'>点击此处</a>，感谢你参与此次活动~<br/>";
	private $content3 = "<br/><b>BookEx</b>今年5月份成立，还有很大的改善和发展空间。<br/>如果你认为自己在 <b>推广宣传</b> , <b>Web技术</b> 或者 <b>网站运营及模式</b> 方面有天赋或者想法，并且愿意静下心来认真做点事的话~欢迎报名加入BookEx团队。<br/>在这里你能体验到不同的成就感，
	你能看到你的计划、技术转化为实实在在的市场反应：用户基数的增加，成交量的上升，而不再是纸上谈兵。<br/>想加入的同学请直接回复此封邮件并简要介绍一下你自己~我们期待你的到来哈！<br/><br/> BookEx团队";

	function test_mail()
	{
		$to = 'devillaw_zhc@163.com';
		batch_mail($to,$this->title,$this->content.$this->content2.$this->content3);
	}

	//for 10/10 - 10/13 registered users
	function send_email_once() {
		$sent = 0;
		$data = $this->db->query('select id,email,register_ticket from user where registertime > "2013-10-10 00:00:00"')->result();
		foreach ($data as $row) {
			if ($sent == 100) return 0;
			echo $sent."<br/>";
			if ($row->register_ticket != true) {
				++$sent;
				if (batch_mail($row->email,$this->title, $this->content.$this->generate_ticket(1).$this->content2.$this->content3)) {
					$id = $row->id;
					$this->db->query("update user set register_ticket = true where id=$id");
				}
			}
		}
	}

	
}
